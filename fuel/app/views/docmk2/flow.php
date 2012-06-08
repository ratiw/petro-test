<style>
.flow-box {
	position: relative;
	height: 210px;
	padding: 0px 10px;
	border: 1px solid #ccc;
}
.flow {
	margin: 0px 5px;
	padding: 4px 10px;
	width: 100px;
	display: block;
	text-align: center;
}
.big {
	height: 70px;
}
div.flow-group {
	float: left;
	height: 80px;
	margin-top: 15px;
}
.flow-arrow {
	margin-top: 12px;
}
.flow-data {
	font-weight: bold;
}
.btn{cursor:pointer;display:inline-block;background-color:#e6e6e6;background-repeat:no-repeat;background-image:-webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), color-stop(25%, #ffffff), to(#e6e6e6));background-image:-webkit-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);background-image:-moz-linear-gradient(top, #ffffff, #ffffff 25%, #e6e6e6);background-image:-ms-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);background-image:-o-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);background-image:linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);padding:5px 14px 6px;text-shadow:0 1px 1px rgba(255, 255, 255, 0.75);color:#333;font-size:13px;line-height:normal;border:1px solid #ccc;border-bottom-color:#bbb;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;-webkit-box-shadow:inset 0 1px 0 rgba(255, 255, 255, 0.2),0 1px 2px rgba(0, 0, 0, 0.05);-moz-box-shadow:inset 0 1px 0 rgba(255, 255, 255, 0.2),0 1px 2px rgba(0, 0, 0, 0.05);box-shadow:inset 0 1px 0 rgba(255, 255, 255, 0.2),0 1px 2px rgba(0, 0, 0, 0.05);-webkit-transition:0.1s linear all;-moz-transition:0.1s linear all;-ms-transition:0.1s linear all;-o-transition:0.1s linear all;transition:0.1s linear all;}.btn:hover{background-position:0 -15px;color:#333;text-decoration:none;}
.btn:focus{outline:1px dotted #666;}
.btn.primary{color:#ffffff;background-color:#0064cd;background-repeat:repeat-x;background-image:-khtml-gradient(linear, left top, left bottom, from(#049cdb), to(#0064cd));background-image:-moz-linear-gradient(top, #049cdb, #0064cd);background-image:-ms-linear-gradient(top, #049cdb, #0064cd);background-image:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #049cdb), color-stop(100%, #0064cd));background-image:-webkit-linear-gradient(top, #049cdb, #0064cd);background-image:-o-linear-gradient(top, #049cdb, #0064cd);background-image:linear-gradient(top, #049cdb, #0064cd);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#049cdb', endColorstr='#0064cd', GradientType=0);text-shadow:0 -1px 0 rgba(0, 0, 0, 0.25);border-color:#0064cd #0064cd #003f81;border-color:rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);}
.btn:active{-webkit-box-shadow:inset 0 2px 4px rgba(0, 0, 0, 0.25),0 1px 2px rgba(0, 0, 0, 0.05);-moz-box-shadow:inset 0 2px 4px rgba(0, 0, 0, 0.25),0 1px 2px rgba(0, 0, 0, 0.05);box-shadow:inset 0 2px 4px rgba(0, 0, 0, 0.25),0 1px 2px rgba(0, 0, 0, 0.05);}
.btn.disabled{cursor:default;background-image:none;filter:progid:DXImageTransform.Microsoft.gradient(enabled = false);filter:alpha(opacity=65);-khtml-opacity:0.65;-moz-opacity:0.65;opacity:0.65;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;}
.btn[disabled]{cursor:default;background-image:none;filter:progid:DXImageTransform.Microsoft.gradient(enabled = false);filter:alpha(opacity=65);-khtml-opacity:0.65;-moz-opacity:0.65;opacity:0.65;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;}
.btn.large{font-size:15px;line-height:normal;padding:9px 14px 9px;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;}
.btn.small{padding:7px 9px 7px;font-size:11px;}
</style>
<div class="flow-box">
	<div class="flow-group">
		<button class="flow btn big" disabled="disabled">Doc MK <br/><span class="flow-data"><?php echo $docmk->mk_no; ?></span></button>
	</div>
	<div class="flow-group">
		 <?php echo Asset::img('arrow_right_48.png', array('class' => 'flow-arrow')); ?>
	</div>
	<div class="flow-group">
<?php if (isset($mk011)): ?>
		<a href="<?php echo Uri::base().'docmk011/edit/'.$docmk->id; ?>" class="flow btn big">สั่งตัดสต็อค</a><br/>
<?php else: ?>
		<a href="<?php echo Uri::base().'docmk011/create/'.$docmk->id; ?>" class="flow btn">สั่งตัดสต็อค</a><br/>
		<a href="<?php echo Uri::base().'docmk010/create/'.$docmk->id; ?>" class="flow btn" style="clear:both;margin-top:8px">สั่งผลิต (PR)</a>
<?php endif; ?>
	</div>
<?php if ( !isset($mk011)): ?>
	<div class="flow-group">
		 <?php echo Asset::img('arrow_right_48.png', array('class' => 'flow-arrow')); ?>
	</div>
	<div class="flow-group">
		<button class="btn big" disabled="disabled">ตัด/ประกบ <br/><span class="flow-data">dd/mm/yy</span></button>
	</div>
	<div class="flow-group">
		 <?php echo Asset::img('arrow_right_48.png', array('class' => 'flow-arrow')); ?>
	</div>
	<div class="flow-group">
		<button class="btn big" disabled="disabled">เคลือบผิว <br/><span class="flow-data">dd/mm/yy</span></button>
	</div>
	<div class="flow-group">
		 <?php echo Asset::img('arrow_right_48.png', array('class' => 'flow-arrow')); ?>
	</div>
	<div class="flow-group">
		<button class="btn big" disabled="disabled">อบ<br/> <span class="flow-data">dd/mm/yy</span></button>
	</div>
	<div class="flow-group">
		<hr/>
	</div>
<?php endif; ?>
	<div class="flow-group">
		 <?php echo Asset::img('arrow_right_48.png', array('class' => 'flow-arrow')); ?>
	</div>
	<div class="flow-group">
		<button class="btn big" disabled="disabled">ต่อกลม/QC <br/><span class="flow-data">dd/mm/yy</span></button>
	</div>
	<div class="flow-group">
		 <?php echo Asset::img('arrow_right_48.png', array('class' => 'flow-arrow')); ?>
	</div>
	<div class="flow-group">
		<button class="btn big" disabled="disabled">ส่ง <br/><span class="flow-data">dd/mm/yy</span></button>
	</div>
</div>
<br/>