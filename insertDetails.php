<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['submit']))
  {
  $yourname=$_POST['Fullname'];
  $ad=$_POST['AdDescription'];
  $address=$_POST['Address'];
  $price=$_POST['Price'];
  $advance=$_POST['Advance'];
  $rooms=$_POST['Bhk'];
  $mobile=$_POST['Mobile'];
  $image1=$_FILES["img1"]["name"];
  $image2=$_FILES["img2"]["name"];
  $image3=$_FILES["img3"]["name"];
  move_uploaded_file($_FILES["img1"]["tmp_name"],"img/houseimages/".$_FILES["img1"]["name"]);
  move_uploaded_file($_FILES["img2"]["tmp_name"],"img/houseimages/".$_FILES["img2"]["name"]);
  move_uploaded_file($_FILES["img3"]["tmp_name"],"img/houseimages/".$_FILES["img3"]["name"]);
  $sql="INSERT into rentinsertion(Fullname,AdDescription,Address,Price,Advance,Bhk,Mobile,Image1,Image2,Image3) VALUES(:yourname,:ad,:address,:price,:advance,:rooms,:mobile,:image1,:image2,:image3)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':yourname',$yourname,PDO::PARAM_STR);
  $query->bindParam(':ad',$ad,PDO::PARAM_STR);
  $query->bindParam(':address',$address,PDO::PARAM_STR);
  $query->bindParam(':price',$price,PDO::PARAM_STR);
  $query->bindParam(':advance',$advance,PDO::PARAM_STR);
  $query->bindParam(':rooms',$rooms,PDO::PARAM_STR);
  $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
  $query->bindParam(':image1',$image1,PDO::PARAM_STR);
  $query->bindParam(':image2',$image2,PDO::PARAM_STR);
  $query->bindParam(':image3',$image3,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Details posted successfully";
}
else 
{
$error="Something went wrong. Please try again";


}

}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>House Rent</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>
        
<!--Header-->
<?php include('includes/header.php');?> 
<body>
  <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
    <div class="content-wrapper">
      <div class="container-fluid">

        
          <div class="col-md-12">
          
          

            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                  <div class="panel-body">
<form  method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
  <h3 align="center">Enter details</h3>
<label class="col-sm-2 control-label">Full Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="Fullname" class="form-control" required>
</div>


</div>
                      
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Ad description<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="AdDescription" rows="2" required></textarea>
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Address<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="Address" rows="2" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Rent(per month)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="Price" class="form-control" required>
</div>
<label class="col-sm-2 control-label">No. of bedrooms<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="Bhk" required>
<option value=""> Select </option>

<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Safety deposit(Advance)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="Advance" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Mobile number<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="Mobile" class="form-control" required>
</div>
</div>
  
<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
  <br></br>
<h3 align="center">Upload Images</h3>
</div>
</div>


<div class="form-group" align="center">
<div class="col-sm-4">
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
Image 2<span style="color:red">*</span><input type="file" name="img2" required>
</div>
<div class="col-sm-4">
Image 3<span style="color:red">*</span><input type="file" name="img3" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-8 col-sm-offset-2">
<button class="btn btn-default" type="reset">Cancel</button>
<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
</div>
</div>
</div>
<div class="hr-dashed"></div>                 
</div>
</div>
</div>
</form> 
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div> 
<?php include('includes/login.php');?>
<!--/Login-Form --> 
<?php include('includes/registration.php');?>
<!--/Register-Form --> 
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 
<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>

