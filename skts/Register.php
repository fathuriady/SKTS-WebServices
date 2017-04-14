<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
		if($nama == '' || $username == '' || $password == '' || $email == ''){
			echo 'Tolong diisi semua kolom!';
		}else{
			require_once('DBConnect.php');
			$sql = "SELECT * FROM user WHERE username='$username' OR email='$email'";
			
			$check = mysqli_fetch_array(mysqli_query($con,$sql));
			
			if(isset($check)){
				echo 'username atau email sudah ada';
			}else{				
				$sql = "INSERT INTO user (nama,username,password,email) VALUES('$nama','$username','$password','$email')";
				if(mysqli_query($con,$sql)){
					echo 'Berhasil terdaftar';
					}else{
					echo 'Gagal! Coba lagi!';
				}
			}
			mysqli_close($con);
		}
}else{
echo 'error';
}