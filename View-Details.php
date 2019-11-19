<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>House Listing</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>
<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT Fullname,Bhk,Price,Mobile,Address,Advance,AdDescription,Image1,Image2,Image3 from rentinsertion where id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;}}  
?>  

<section id="listing_img_slider">
  <div><img src="img/houseimages/<?php echo htmlentities($result->Image1);?>" class="img-responsive" alt="image" width="250" height="200"></div>
  <div><img src="img/houseimages/<?php echo htmlentities($result->Image2);?>" class="img-responsive" alt="image" width="250" height="200"></div>
  <div><img src="img/houseimages/<?php echo htmlentities($result->Image3);?>" class="img-responsive" alt="image" width="250" height="200"></div>
</section>
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h2><?php echo htmlentities($result->AdDescription);?> , Name : <?php echo htmlentities($result->Fullname);?></h2>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p><i class="fa fa-rupee" aria-hidden="true"></i><?php echo htmlentities($result->Price);?> </p>Per Month
         
        </div>
      </div>
      <div class="col-md-9">
        <div class="price_info">
          <p>#<?php echo htmlentities($result->Address);?> </p>Location
         
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
          
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->Advance);?></h5>
              <p>Advance</p>
            </li>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->Bhk);?></h5>
              <p>No. Of Bedrooms</p>
            </li>
       
            <li> 
              <h5><?php echo htmlentities($result->Mobile);?></h5>
              <p>Phone Number</p>
            </li>
          </ul>
        </div>
        </div>
    </div>
</div>
</section>
</body>
</html>