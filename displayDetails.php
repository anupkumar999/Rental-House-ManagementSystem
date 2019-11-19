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
<title>House Rental Portal | House Listing</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
        
<!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">-->
</head>
<body>
<?php include('includes/header.php');?> 
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>HouseListing</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>House Listing</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
<?php 
$sql = "SELECT id from rentinsertion";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<p><span><?php echo htmlentities($cnt);?> Listings</span></p>
</div>
</div>

<?php 
$sql = "SELECT id,Fullname,Bhk,Price,AdDescription,Image1 from rentinsertion";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="img/houseimages/<?php echo htmlentities($result->Image1);?>" class="img-responsive" alt="Image" /> </a> 
          </div>

          <div class="product-listing-content">
            <h4><?php echo htmlentities($result->AdDescription);?></h4>
            
            <ul>
              <li><i class="fa fa-rupee" aria-hidden="true"></i><?php echo htmlentities($result->Price);?> per month</li>
              
              <li><i class="fa fa-home" aria-hidden="true"></i><?php echo htmlentities($result->Bhk);?> rooms</li>
            </ul>
            <a href="View-Details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
      <?php }} ?>
         </div>
            <!--Side-Bar-->
      <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your House </h5>
          </div>
          <div class="sidebar_filter">
            <form  method="post">
              <div class="form-group select">
                <select class="form-control" onchange="fun()" id="bhk" name="Bhk">
                  <option>No. of rooms</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="form-group select">
                <select class="form-control" onchange="funn()" id="price" name="Price">
                  <option>Select price range</option>
                    <option value="1">Less than 10000</option>
                    <option value="2">10000-20000</option>
                    <option value="3">Greater than 30000</option>
<script>
  var a;
  function fun() {
     a=document.getElementById("bhk").value; 
  }
  function funn(){
  var b=document.getElementById("price").value;
    var c=a+b; 
    var i = parseInt(c, 10);
    window.location.href = "searchHouseDetails.php?pri=" + i;
    } 
</script>

                </select>
              </div>
             
              <div class="form-group">
                <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search House</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</section>
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<?php include('includes/login.php');?>
<?php include('includes/registration.php');?>
<?php include('includes/forgotpassword.php');?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/js/bootstrap-slider.min.js"></script>  
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
