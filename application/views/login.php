<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TS Fire Login</title>
<meta name="generator" content="WYSIWYG Web Builder 16 Trial Version - https://www.wysiwygwebbuilder.com">
<link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/css/login_page.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/css/login page php.css" rel="stylesheet">
</head>
<body>
<div id="container">
  <div id="wb_Image1" style="position:absolute;left:116px;top:69px;width:779px;height:518px;z-index:1;"> <img src="<?php echo base_url()?>assets/img/fire vehicle 11.png" id="Image1" alt="" width="779" height="520"></div>
  <div id="wb_Image2" style="position:absolute;left:130px;top:86px;width:130px;height:128px;z-index:2;"> <img src="<?php echo base_url()?>assets/img/ep31mnxph4.png" id="Image2" alt="" width="130" height="128"></div>
  <div id="wb_Image3" style="position:absolute;left:760px;top:77px;width:110px;height:147px;z-index:3;"> <img src="<?php echo base_url()?>assets/img/iby5uve1hy.png" id="Image3" alt="" width="110" height="147"></div>
  <div id="wb_Image4" style="position:absolute;left:379px;top:137px;width:252px;height:144px;z-index:4;"> <img src="<?php echo base_url()?>assets/img/fmrqs7sr5h.png" id="Image4" alt="" width="252" height="145"></div>
  <form action="<?php echo base_url(); ?>login/check_login" method="post"> 
  
  
  
  <div id="wb_Text1" style="position:absolute;left:380px;top:284px;width:101px;height:19px;z-index:5;"> <span style="color:#00008B;font-family:Tahoma;font-size:16px;">User Name</span></div>
  <input type="text" id="Editbox1" style="position:absolute;left:465px;top:281px;width:140px;height:17px;z-index:6;" name="username" value="" spellcheck="false" placeholder="Please enter Username">
  <input type="password" id="Editbox2" style="position:absolute;left:466px;top:311px;width:139px;height:17px;z-index:7;" name="password" value="" spellcheck="false" placeholder="Please enter Password">
  <div id="wb_Text2" style="position:absolute;left:388px;top:319px;width:83px;height:19px;z-index:8;"> <span style="color:#00008B;font-family:Tahoma;font-size:16px;">Password</span></div>
  <div id="wb_IconFont1" style="position:absolute;left:476px;top:393px;width:65px;height:53px;text-align:center;z-index:9;">
    <div id="IconFont1"><button type="submit" name="submitLogin"><i class="fa fa-unlock-alt"></i></button></div>
  </div>
  <?php if($this->session->flashdata('error_message')!=''){
						?>
					<div class="alert alert-danger">
					  <strong> <?php echo  $this->session->flashdata('error_message');?></strong>
					</div>
					<?php }
					?>
  <div id="wb_Checkbox1" style="position:absolute;left:472px;top:351px;width:27px;height:17px;z-index:10;">
    <input type="checkbox" id="Checkbox1" name="Checkbox1" value="Remember me" style="position:absolute;left:0;top:0;">
    <label for="Checkbox1"></label>
  </div>
  <div id="wb_Text3" style="position:absolute;left:499px;top:350px;width:101px;height:18px;z-index:11;"> <span style="color:#000000;font-family:Tahoma;font-size:15px;">Remember me</span></div>
  <div id="wb_Shape1" style="position:absolute;left:815px;top:438px;width:67px;height:24px;z-index:12;"> <img src="<?php echo base_url()?>assets/img/img0001.png" id="Shape1" alt="" style="width:67px;height:24px;"></div>
  </form>
</div>
</body>
</html>
