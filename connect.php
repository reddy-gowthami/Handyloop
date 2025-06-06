<?php
$username=$_POST['username'];
$password=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];
$age=$_POST['age'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$country=$_POST['country'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
//Database connection
$conn = new mysqli('localhost:4000','root','','test');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(username,password,confirmpassword,age,email,gender,country,state,pincode)
    values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss",$username,$password,$confirmpassword,$age,$email,$gender,$country,$state,$pincode);
    $stmt->execute();
    echo"Registration Successfull";
    $stmt->close();
    $conn->close();
}
?>