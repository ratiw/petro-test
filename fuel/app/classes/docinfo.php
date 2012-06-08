<?php

class DocInfo 
{

	// pattern sample : MKYYMM###
	// where, 'MK' is user's text
	//        'YY' will be replaced by Thai 2-digit year 
	//        'MM' will be replaced by 2-digit month
	//        '###' will be replaced by number starting from 001

	public static function get_next($type)
	{
		// get the last_docno of the given type
		$docinfo = Model_DocInfo::find()->where('type', strtoupper($type))->get_one();
		
		if ( !isset($docinfo) )
		{
			return '';
		}
		
		// break down the pattern
		// - find out the number part position in the pattern
		$start	= strpos($docinfo->pattern, '#');
		$end 	= strrpos($docinfo->pattern, '#', $start+1);
		$count	= $end - $start + 1;
		$num_part = str_repeat('#', $count);
		
		// - remove the number part from the pattern, the remainder will be used for 
		//   comparison
		$patt = static::replace_tokens(str_replace($num_part, '', $docinfo->pattern));
		
		$last = '';
		$last_no = 0;
		if ( isset($docinfo->last_docno) )
		{
			$last  = substr($docinfo->last_docno, 0, $start); //left side
			$last .= substr($docinfo->last_docno, $end + 1, strlen($docinfo->last_docno) - $end);	// right side
			$last_no = substr($docinfo->last_docno, $start, $count);
		}
		
		// echo "<br>".$patt;
		// echo "<br>".$last;
		// echo "<br>".$last_no;
		
		// - compare the last_docno with the reminding pattern
		if ( $patt == $last )
		{
			// - if nothing's changed, increment the number
			$new_no = str_repeat('0', $count) . (string)($last_no + 1);
		}
		else
		{
			// - if there's a change (month's changed or year's changed), reset the 
			//   number to 1
			$new_no = str_repeat('0', $count) . (string)1;
		}
		
		$new_no = substr($new_no, strlen($new_no)-$count, $count);
		$new_no = str_replace($num_part, $new_no, static::replace_tokens($docinfo->pattern));
		
		// - return the new doc_no
		return array('last' => $docinfo->last_docno, 'next' => $new_no);
	}

	public static function replace_tokens($pattern)
	{
		$now	= getdate();
		$year_en = (string) $now['year'];
		$year_th = (string) ($now['year'] + 543);
		$month	= '0' . ((string) $now['mon']);
		$month	= substr($month, strlen($month)-2, 2);
		$day 	= '0' . ((string) $now['mday']);
		$day 	= substr($day, strlen($day)-2, 2);

		$pattern = str_replace('YYYY', $year_th, $pattern);
		$pattern = str_replace('yyyy', $year_en, $pattern);
		$pattern = str_replace('YY', substr($year_th, 2, 2), $pattern);
		$pattern = str_replace('yy', substr($year_en, 2, 2), $pattern);
		$pattern = str_replace('MM', $month, $pattern);
		$pattern = str_replace('DD', $day, $pattern);

		return $pattern;
	}
}