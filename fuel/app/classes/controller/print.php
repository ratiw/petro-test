<?php

class Controller_Print extends Controller 
{
	protected function create_doc()
	{
		$pdf = MyDoc::forge('mpdf')->init('th','A4','','garuda' , -5 , 0 , 10 , 0 , 0 , 0, 'P');
	
		$pdf->set_display_mode('fullpage');
		$pdf->list_indent_first_level = 0;

		return $pdf;
	}

	public function get_docmk($id)
	{
		$data = array();
		
		if ($docmk = Model_DocMK::find($id))
		{
			$data['mk_no'] 		= $docmk->mk_no;
			$data['mk_date'] 		= Petro::to_app_date($docmk->mk_date);
			$data['client'] 		= Petro_Lookup::get(null, $docmk->client_id, 'clients', 'id', 'name');
			$data['client_po'] 	= $docmk->client_po;
			$data['delivery_date'] = Petro::to_app_date($docmk->delivery_date);
			$data['belt_type'] 	= Petro_Lookup::get('belt.type', $docmk->belt_type);
			$data['belt_color'] 	= Petro_Lookup::get('belt.color', $docmk->belt_color);
			$data['belt_width'] 	= $docmk->belt_width.' '.Petro_Lookup::get('belt.w.unit', $docmk->belt_width_unit);
			$data['belt_ply'] 	= $docmk->belt_ply.' '.'ชั้น';
			$data['belt_ep'] 		= Petro_Lookup::get('belt.ep', $docmk->belt_ep);
			$data['belt_thick'] 	= $docmk->belt_thick.' ('.$docmk->belt_top_thick.' + '.$docmk->belt_bot_thick.')';
			$data['belt_grade'] 	= Petro_Lookup::get('belt.grade', $docmk->belt_grade)
										.' ('.$docmk->belt_top_grade.'/'.$docmk->belt_bot_grade.')';
			$data['belt_length']	= $docmk->belt_length.' '.Petro_Lookup::get('belt.l.unit', $docmk->belt_length_unit);
			$data['belt_end'] 	= Petro_Lookup::get('belt.end', $docmk->belt_end);
			$data['belt_qty'] 	= $docmk->belt_qty.' '.'เส้น';
			$data['remark'] 		= $docmk->remark;
		}
		
		return ($docmk) ? $data : false;
	}

	public function action_mk($id = null)
	{
		if ($docmk = Model_DocMK::find($id))
		{
			// echo "Document found, this should output some html here.";
			// $pdf = MyDoc::forge('mpdf')->init('th','A4','','garuda' , -5 , 0 , 10 , 0 , 0 , 0, 'P');
		
			// $pdf->set_display_mode('fullpage');
			// $pdf->list_indent_first_level = 0;
			$pdf = $this->create_doc();

			$data['doc_name'] 	= 'ใบแจ้งผลิตสินค้า';
			$data['doc_code'] 	= 'FMMK-010 REV:2-27/01/51';
			$data['mk_no'] 		= $docmk->mk_no;
			$data['mk_date'] 		= Petro::to_app_date($docmk->mk_date);
			$data['client'] 		= Petro_Lookup::get(null, $docmk->client_id, 'clients', 'id', 'name');
			$data['client_po'] 	= $docmk->client_po;
			$data['delivery_date'] = Petro::to_app_date($docmk->delivery_date);
			$data['belt_type'] 	= Petro_Lookup::get('belt.type', $docmk->belt_type);
			$data['belt_color'] 	= Petro_Lookup::get('belt.color', $docmk->belt_color);
			$data['belt_width'] 	= $docmk->belt_width.' '.Petro_Lookup::get('belt.w.unit', $docmk->belt_width_unit);
			$data['belt_ply'] 	= $docmk->belt_ply.' '.'ชั้น';
			$data['belt_ep'] 		= Petro_Lookup::get('belt.ep', $docmk->belt_ep);
			$data['belt_thick'] 	= $docmk->belt_thick.' ('.$docmk->belt_top_thick.' + '.$docmk->belt_bot_thick.')';
			$data['belt_grade'] 	= Petro_Lookup::get('belt.grade', $docmk->belt_grade)
										.' ('.$docmk->belt_top_grade.'/'.$docmk->belt_bot_grade.')';
			$data['belt_length']	= $docmk->belt_length.' '.Petro_Lookup::get('belt.l.unit', $docmk->belt_length_unit);
			$data['belt_end'] 	= Petro_Lookup::get('belt.end', $docmk->belt_end);
			$data['belt_qty'] 	= $docmk->belt_qty.' '.'เส้น';
			$data['remark'] 		= $docmk->remark;
			
			$content = View::forge('print/fmmk-010', $data)->render();
			$pdf->write_html($content);
			$pdf->output();
		}
		else
		{
			echo "Document not found!";
		}
	}

	public function action_mk011($id = null)
	{
		if ($mk011 = Model_DocMK011::find($id))
		{
			$docmk = $this->get_docmk($mk011->mk_id);
			
			$pdf = $this->create_doc();

			$data['doc_name'] 	= 'ใบสั่งตัดสต็อค';
			$data['doc_code'] 	= 'FMMK-011 REV:1-14/02/50';
			
			$data['suggest_roll'] = $mk011->suggest_roll;
			$data['length'] = $mk011->length;
			$data['remark'] = $mk011->remark;
			$data['docmk'] = $docmk;
			
			$content = View::forge('print/fmmk-011', $data)->render();
			// return $content;
			$pdf->write_html($content);
			$pdf->output();
		}
		else
		{
			echo "Document not found!";
		}
	}
}
