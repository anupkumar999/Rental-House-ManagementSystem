<?php
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$dob=$_POST['dob'];
$mobileno=$_POST['mobileno'];
$emailid=$_POST['emailid'];
$con=mysql_connect("localhost","root","");
mysql_select_db('p6signup');
$res=mysql_query("Insert into signup values('$firstname','$lastname','$dob','$mobileno','$emailid')");
echo "New record created successfully";
?>