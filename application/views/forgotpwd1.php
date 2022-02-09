<?php
//session_start();
$error = 0;
if( isset($_POST['submit']) )
{
	include_once 'classes/Database.php';
	include_once 'classes/Login.php';
	$database = new Database();
	$db = $database->getConnection();
 
	// prepare objects
	//$product = new Product($db);
	//$category = new Category($db);
	$adminObj = new Login($db);
	$adminObj->username = $_POST["username"];
	$adminObj->password = $_POST["password"];
	$result = $adminObj->readOne();
	if(!empty($result))
	{
		//print_r($result);
		$_SESSION["admin_id"] = $result["id"];
		header("location:index.php");
		die;
	}
	else
	{
		$error = 1;
	}
	
}
// include database and object files

?>
<!DOCTYPE html>
<html style="background-color:#fff" 	>
    <head>
        <meta charset="UTF-8">
        <title>CMC Medic Center</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url()?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
	<style>
	.footer {
    padding: 10px 20px;
    background: none !important;
    color: #444;
}
	</style>
    <body style="background-color:#fff"  >

        <div class="form-box" id="login-box">
            <div class="header">Forgot Password?</div>
             <form id="adminpro-form" method="POST" class="adminpro-form" action="<?php echo base_url(); ?>login/check_forgotpwd">
                <div class="body bg-gray">
					
					<?php if($this->session->flashdata('error_message')!=''){
						?>
					<div class="alert alert-danger">
					  <strong> <?php echo  $this->session->flashdata('error_message');?></strong>
					</div>
					<?php }
					?>
					
                    <div class="form-group">
                        <input type="text" type="email" name="email" id="email" required  class="form-control" placeholder="IC NUMBER"/>
                    </div>
                       
                  
                </div>
                <div class="footer" style="background-color:#fff">                                                               
                    <button type="submit" name="submit" class="btn bg-olive btn-block">Submit</button>  
                    
                   
                    
                    <a href="<?php echo base_url()?>login" class="text-center">Login</a>
                </div>
            </form>

            <!--<div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>-->
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>