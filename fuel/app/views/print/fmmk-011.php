<!DOCTYPE html>
<html>
<head>
	<title>Print Document</title>
	<style>
		*
		{
			margin:0;
			padding:0;
			font-size:10pt;
			color:#000;
		}
		body
		{
			width:100%;
			font-size:10pt;
			margin:0;
			padding:0;
		}
		
		p
		{
			margin:0;
			padding:0;
		}
		
		#wrapper
		{
			width:190mm;
			margin:0 15mm;
		}
		
		.page
		{
			height:297mm;
			width:210mm;
			page-break-after:always;
		}

		table.heading
		{
			height:45mm;
			margin-top:8mm;
		}
		table.heading td
		{
			border:0;
		}
		
		h1.heading
		{
			font-size:14pt;
			color:#000;
			font-weight:bold;
		}
		
		h2.heading
		{
			font-size:9pt;
			color:#000;
			font-weight:normal;
		}
		
		h1.doc_name 
		{
			font-size:14pt;
			color:#000;
			font-weight:bold;
		}
		
		h2.doc_code
		{
			font-size:8pt;
			color:#000;
			font-weight:normal;
		}
		
		hr
		{
			color:#ccc;
			background:#ccc;
		}
		
		hr.line
		{
			margin-top:5mm;
			width:98%;
		}

		.left
		{
			text-align:left;
		}
		.right
		{
			text-align:right;
		}
		.center
		{
			text-align:center;
		}
		
		.data
		{
			font-weight:bold;
		}
		
		.page_header
		{
		}
		
		.page_content
		{
			height: 120mm;
			padding:0;
		}
		
		.page_content
		{	
			width:100%;
		}
		.page_content table
		{
			width:100%;
			border-left: 1px solid #ccc;
			border-top: 1px solid #ccc;
			border-spacing:0;
			border-collapse: collapse; 
			margin-top:3mm;
		}
		.page_content table td
		{
			font-size:9pt;
			border-right: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
			padding: 2mm;
		}

		.page_content table table
		{
			margin-top:1mm;
			margin-bottom:1mm;
		}
		
		.page_content table table tr.belt_data td 
		{
			font-size:12pt;
			font-weight:bold;
		}
		
		.sign_box
		{
			height: 30mm;
			float: right;
			border: 1px solid #ccc;
		}
		.sign_box div
		{
			padding: 1mm;
			border-bottom: 1px solid #ccc;
		}
		.sign_box div p
		{
			font-size: 8pt;
			font-weight: bold;
		}
		.sign_box div.sign_box_position
		{
			text-align: center;
			margin: 0mm 1mm;
			font-size: 8pt;
			font-weight: bold;
			border: 0;
		}
		.sign_box p.sign_box_dummy
		{
			width:15mm;
			font-size: 8pt;
			color: #aaa;
			margin:1mm 2mm;
		}

		.footer
		{	
			width:180mm;
			margin:0 15mm;
			padding-bottom:3mm;
		}
		.footer table
		{
			width:100%;
			border-left: 1px solid #ccc;
			border-top: 1px solid #ccc;
			
			background:#eee;
			
			border-spacing:0;
			border-collapse: collapse; 
		}
		.footer table td
		{
			width:25%;
			text-align:center;
			font-size:9pt;
			border-right: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
		}
		</style>
</head>
<body>

<div id="wrapper">

	<div class="page_header">
		<table class="heading" style="width:100%">
			<tr>
				<td style="width:20mm;align:center;"><?php echo Asset::img('logo/logo_mui.png', array('width' => '70')); ?></td>
				<td style="width:75mm;">
					<p style="font-size:12pt">บริษัท เอ็ม ยู ไอ รับเบอร์เบลท์ จำกัด<br />
					M U I Rubber Belt Co., Ltd.</p>
				</td>
				<td style="text-align:right;">
					<h1 class="doc_name" style="font-weight:bold; text-align:right;"><?php echo $doc_name; ?></h1>
					<h2 class="doc_code"><?php echo $doc_code; ?></h2>
				</td>
			</tr>
		</table>
	</div>

	<div class="page_content">
		
		<table style="width:100%">
			<tr>
				<td colspan="2"><p style="font-weight:bold; color:red;">[ สำหรับฝ่ายผลิตเท่านั้น ]</p></td>
				<td>เลขที่ </td>
				<td class="data"><?php echo $docmk['mk_no']; ?></td>
			</tr>
			<tr>
				<td style="width:25mm;">ชื่อลูกค้า</td>
				<td class="data"><?php echo $docmk['client']; ?></td>
				<td style="width:25mm;">วันที่แจ้งผลิต</td>
				<td class="data"><?php echo $docmk['mk_date']; ?></td>
			</tr>
			<tr>
				<td>P/O No.</td>
				<td class="data"><?php echo $docmk['client_po']; ?></td>
				<td>กำหนดส่งมอบ</td>
				<td class="data"><?php echo $docmk['delivery_date']; ?></td>
			</tr>
		</table>
		
		<table style="width:100%;">
			<tr>
				<td><p>รายละเอียดสินค้า</p></td>
			</tr>
			<tr>
				<td>
					<table style="text-align:center;">
						<tr>
							<td style="width:30mm;">ชนิดสายพาน</td>
							<td style="width:20mm;">สี</td>
							<td style="width:30mm;">หน้ากว้าง</td>
							<td style="width:20mm;">ชั้น</td>
							<td style="width:20mm;">EP</td>
							<td style="width:40mm;">ความหนา</td>
							<td style="width:25mm;">เกรด</td>
						</tr>
						<tr class="belt_data">
							<td><?php echo $docmk['belt_type']; ?></td>
							<td><?php echo $docmk['belt_color']; ?></td>
							<td><?php echo $docmk['belt_width']; ?></td>
							<td><?php echo $docmk['belt_ply']; ?></td>
							<td><?php echo $docmk['belt_ep']; ?></td>
							<td><?php echo $docmk['belt_thick']; ?></td>
							<td><?php echo $docmk['belt_grade']; ?></td>
						</tr>
					</table>
					<table style="text-align:center">
						<tr>
							<td style="width:40mm">ความยาว</td>
							<td style="width:25mm;">ยาว/กลม</td>
							<td style="width:25mm;">จำนวน</td>
							<td style="width:95mm;">คำสั่งพิเศษ</td>
						</tr>
						<tr class="belt_data">
							<td><?php echo $docmk['belt_length']; ?></td>
							<td><?php echo $docmk['belt_end']; ?></td>
							<td><?php echo $docmk['belt_qty']; ?></td>
							<td><?php echo $docmk['remark']; ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<div style="width:100%; float:left; margin-top:3mm;">
			<div style="width:100mm; height:30mm; float:left;">
				<div style="margin:2mm">
					<p style="font-size:8pt;font-weight:bold">หมายเหตุ</p>
					<hr class="line"/>
					<hr class="line"/>
					<hr class="line"/>
				</div>
			</div>
			<div class="sign_box" style="width:40mm;">
				<div>
					<p>ผู้รับทราบ</p>
				</div>
				<p class="sign_box_dummy" style="float:left;"> Sign.</p>
				<p class="sign_box_dummy" style="float:right;text-align:right">dd/mm/yy</p>
				<div style="height:10mm">&nbsp;</div>
				<div class="sign_box_position">ผู้จัดการฝ่ายผลิต</div>
			</div>
			<div class="sign_box" style="width:40mm; margin-right:2mm;">
				<div>
					<p>ผู้แจ้งผลิต</p>
				</div>
				<p class="sign_box_dummy" style="float:left;"> Sign.</p>
				<p class="sign_box_dummy" style="float:right;text-align:right">dd/mm/yy</p>
				<div style="height:10mm">&nbsp;</div>
				<div class="sign_box_position">จนท.ประสานงานขาย</div>
			</div>
		</div>
		<hr />
	
	</div>

	<div class="page_header">
		<table class="heading" style="width:100%">
			<tr>
				<td style="width:20mm;align:center;"><?php echo Asset::img('logo/logo_mui.png', array('width' => '70')); ?></td>
				<td style="width:75mm;">
					<p style="font-size:12pt">บริษัท เอ็ม ยู ไอ รับเบอร์เบลท์ จำกัด<br />
					M U I Rubber Belt Co., Ltd.</p>
				</td>
				<td style="text-align:right;">
					<h1 class="doc_name" style="font-weight:bold; text-align:right;"><?php echo $doc_name; ?></h1>
					<h2 class="doc_code"><?php echo $doc_code; ?></h2>
				</td>
			</tr>
		</table>
	</div>
	
	<div class="page_content">
		
		<table style="width:100%">
			<tr>
				<td colspan="2"><p style="font-weight:bold; color:green;">[ สำหรับฝ่ายขายเท่านั้น ]</p></td>
				<td>เลขที่</td>
				<td class="data"><?php echo $docmk['mk_no']; ?></td>
			</tr>
			<tr>
				<td style="width:25mm;">ชื่อลูกค้า</td>
				<td class="data"><?php echo $docmk['client']; ?></td>
				<td style="width:25mm;">วันที่แจ้งผลิต</td>
				<td class="data"><?php echo $docmk['mk_date']; ?></td>
			</tr>
			<tr>
				<td>P/O No.</td>
				<td class="data"><?php echo $docmk['client_po']; ?></td>
				<td>กำหนดส่งมอบ</td>
				<td class="data"><?php echo $docmk['delivery_date']; ?></td>
			</tr>
		</table>
		
		<table style="width:100%;">
			<tr>
				<td><p>รายละเอียดสินค้า</p></td>
			</tr>
			<tr>
				<td>
					<table style="text-align:center;">
						<tr>
							<td style="width:30mm;">ชนิดสายพาน</td>
							<td style="width:20mm;">สี</td>
							<td style="width:30mm;">หน้ากว้าง</td>
							<td style="width:20mm;">ชั้น</td>
							<td style="width:20mm;">EP</td>
							<td style="width:40mm;">ความหนา</td>
							<td style="width:25mm;">เกรด</td>
						</tr>
						<tr class="belt_data">
							<td><?php echo $docmk['belt_type']; ?></td>
							<td><?php echo $docmk['belt_color']; ?></td>
							<td><?php echo $docmk['belt_width']; ?></td>
							<td><?php echo $docmk['belt_ply']; ?></td>
							<td><?php echo $docmk['belt_ep']; ?></td>
							<td><?php echo $docmk['belt_thick']; ?></td>
							<td><?php echo $docmk['belt_grade']; ?></td>
						</tr>
					</table>
					<table style="text-align:center">
						<tr>
							<td style="width:40mm">ความยาว</td>
							<td style="width:25mm;">ยาว/กลม</td>
							<td style="width:25mm;">จำนวน</td>
							<td style="width:95mm;">คำสั่งพิเศษ</td>
						</tr>
						<tr class="belt_data">
							<td><?php echo $docmk['belt_length']; ?></td>
							<td><?php echo $docmk['belt_end']; ?></td>
							<td><?php echo $docmk['belt_qty']; ?></td>
							<td><?php echo $docmk['remark']; ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<div style="width:100%; float:left; margin-top:3mm;">
			<div style="width:100mm; height:30mm; float:left;">
				<div style="margin:2mm">
					<p style="font-size:8pt;font-weight:bold">หมายเหตุ</p>
					<hr class="line"/>
					<hr class="line"/>
					<hr class="line"/>
				</div>
			</div>
			<div class="sign_box" style="width:40mm;">
				<div>
					<p>ผู้รับทราบ</p>
				</div>
				<p class="sign_box_dummy" style="float:left;"> Sign.</p>
				<p class="sign_box_dummy" style="float:right;text-align:right">dd/mm/yy</p>
				<div style="height:10mm">&nbsp;</div>
				<div class="sign_box_position">ผู้จัดการฝ่ายผลิต</div>
			</div>
			<div class="sign_box" style="width:40mm; margin-right:2mm;">
				<div>
					<p>ผู้แจ้งผลิต</p>
				</div>
				<p class="sign_box_dummy" style="float:left;"> Sign.</p>
				<p class="sign_box_dummy" style="float:right;text-align:right">dd/mm/yy</p>
				<div style="height:10mm">&nbsp;</div>
				<div class="sign_box_position">จนท.ประสานงานขาย</div>
			</div>
		</div>
	
	</div>
	
	<div class="page_footer">
	</div>
	
</div>
</body>
</html>