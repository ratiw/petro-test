<?php

class BeltInfo
{
	protected static $unit_symbols = array(
		'นิ้ว' => '"',
		'มม' => 'mm.',
		'ซม' => 'cm.',
		'ชั้น' => 'P',
		'ฟุต' => "'",
		'เมตร' => 'm.',
		'in' => '"',
	);
	
	protected static $ply_thick = array(
		'2' => array('normal' => 6, 'use' => 4),
		'3' => array('normal' => 7, 'use' => 5),
		'4' => array('normal' => 9, 'use' => 7),
		'5' => array('normal' => 10, 'use' => 8),
		
	);

	public static function unit_symbol($unit)
	{
		return static::$unit_symbols[$unit];
	}
	
	public static function short($data)
	{
		$out = Petro_Lookup::get('belt.type', $data->belt_type);
		$out .= ' '.$data->belt_width;
		$out .= static::unit_symbol(Petro_Lookup::get('belt.w.unit', $data->belt_width_unit));
		$out .= ' x '.$data->belt_ply;
		$out .= ' ('. ($data->belt_color == 3 ? $data->belt_color_other : Petro_Lookup::get('belt.color', $data->belt_color)).') ';
		$out .= Petro_Lookup::get('belt.grade', $data->belt_grade);
		$out .= ' - '.Petro_Lookup::get('belt.ep', $data->belt_ep);
		$out .= ', '.\Lang::get('belt_thick_abbr').$data->belt_thick;
		$out .= ', '.\Lang::get('belt_length_abbr').$data->belt_length;
		$out .= ''.Petro_Lookup::get('belt.l.unit', $data->belt_length_unit);
		$out .= ', '.Petro_Lookup::get('belt.end', $data->belt_end);
		
		return $out;
	}

	public static function long($data)
	{
		$out = Petro_Lookup::get('belt.type', $data->belt_type);
		$out .= ' '.$data->belt_width;
		$out .= static::unit_symbol(Petro_Lookup::get('belt.w.unit', $data->belt_width_unit));
		$out .= ' x '.$data->belt_ply;
		$out .= ' (สี'. ($data->belt_color == 3 ? $data->belt_color_other : Petro_Lookup::get('belt.color', $data->belt_color)).') ';
		$out .= 'เกรด '.Petro_Lookup::get('belt.grade', $data->belt_grade);
		$out .= ' - '.Petro_Lookup::get('belt.ep', $data->belt_ep);
		$out .= ', หนา&nbsp;'.$data->belt_thick.' ('.$data->belt_top_thick.' + '.$data->belt_bot_thick.') ';

		
		return $out;
	}
	
	public static function calc_price($data)
	{
		// convert belt width to inch unit
		$info['width'] = static::_convert_width($data->belt_width, $data->belt_width_unit);
		// convert belt length to meter
		$info['length'] = static::_convert_length($data->belt_length, $data->belt_length_unit);
		
		// add 1 meter for endless type
		$info['extra_length'] = ($data->belt_end == 2) ? 1 : 0;
		// add another 1 meter for width > 40
		$data->belt_width >= 40 and $info['extra_length']++;
		
		// determin the usual total thickness of the given number of ply
		$info['usual_thick'] = static::$ply_thick[$data->belt_ply]['normal'];
		
		// compare it to the given total thickness
		if ($data->belt_thick > $info['usual_thick'])
		{
			$info['thick_multiplier'] = round($data->belt_thick - $data->belt_ply, 4);
		}
		else
		{
			$info['thick_multiplier'] = static::$ply_thick[$data->belt_ply]['use'];
		}
		
		// determine price multiplier using the given grade, type, color, and EP
		$info['ep'] = Petro_Lookup::get('belt.ep', $data->belt_ep);
		$result = DB::select($info['ep'])->from('price_table')
					->where('belt_grade', $data->belt_grade)
					->and_where('belt_type', $data->belt_type)
					->and_where('belt_color', $data->belt_color)
					->as_object()->execute();
					
		$result = $result->current();
		
		$info['price_multiplier'] = $result->$info['ep'];
		$info['standard_price'] = 
				$info['width'] * $info['thick_multiplier'] * $info['price_multiplier'] 
				* 3.28 * ($info['length'] + $info['extra_length']);
		
		return $info;
	}
	
	private static function _convert_width($width, $wunit)
	{
		switch ($wunit)
		{
			case 1:	// inch.
				return $width;
			case 2:	// mm.
				return $width / 25;
			case 3:	// cm.
				return $width / 2.5;
			default:
				throw new Exception('Invalid width unit! "'.$wunit.'"');
		}
	}
	
	private static function _convert_length($length, $lunit)
	{
		switch ($lunit)
		{
			case 1:	// meter
				return $length;
			case 2:	// feet
				return $length / 3.28;
			case 3:	// inch
				return $length * 2.5 / 100;
			case 4:	// mm.
				return $length / 1000;
			default:
				throw new Exception('Invalid length unit! "'.$lunit.'"');
		}
	}
}