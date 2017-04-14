<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
 $username = $_POST['username'];
 $password = $_POST['password'];
 
 require_once('DBConnect.php');
 
 $sql = "select * from user where username='$username' and password='$password'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$sql));
 
 if(isset($check)){
 echo "Sukses";
 }else{
 echo "Salah Username atau Password";
 }
 
 }else{
 echo "error coba lagi";
 }