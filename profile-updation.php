<?php
session_start();
$now = time();

if($now > $_SESSION['expire'])
{
    session_destroy();
    ?>
     <h1 style="text-align:center; color:blue">Your Session has expired ! <br><br></h1>
     <h2 style="text-align:center; color:red">Away For More Than 15min's </h2>
     <h1 style="text-align:center"><a href='login.html'>Log In</a></h1>
    <?php
}
define('DB_SERVER','127.0.0.1');
define('DB_USER','Tanooj');
define('DB_PASS','Tan@2000ooj');
define('DB_NAME','cloud_ott_db');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if (mysqli_connect_errno())
{
    echo "Faild to connect Please Check Your Internet ";
}
$name=htmlentities(trim($_POST['name1'])); 
$dob=htmlentities(trim($_POST['dob']));
$gender=htmlentities(trim($_POST['gen']));
$query=mysqli_query($con,"UPDATE `ott` SET `DOB`='$dob',`Gender`='$gender' WHERE `Name`='$name'");
//$num=mysqli_fetch_array($query);
//$row_num=mysqli_num_rows($query);
//if($row_num > 0)
//{
$_SESSION['login']=$_POST['exampleInputEmail1'];
$_SESSION['sname']=$num['SName'];
$_SESSION['start'] = time();
$_SESSION['expire'] = $_SESSION['start'] + (60*15);
header("location:manage-profile.html");
/*}
else
{
    $_SESSION['errmsg']="Please Enter Vallid Details";
    echo "<script> alert('Please Enter Vallid Details')</script>";
    header("location:manage-profile.html");
    exit;
}*/
?>