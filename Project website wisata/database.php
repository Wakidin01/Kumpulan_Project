<?php
class database{

	var $host = "localhost";
	var $user = "root";
	var $pass = "";
	var $db = "wisata";
	var $koneksi = "";

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
	}

//------------- login----------
function login_user($username, $password){
	$data = mysqli_query($this->koneksi, "Select * from user where username='$username' AND password='$password'");
	$row = mysqli_num_rows($data);

	if($row > 0){
		$login = mysqli_fetch_assoc($data);

		if($login['status']=="Administrator"){
			session_start();
			$_SESSION['namauser'] = $login['username'];
			$_SESSION['passuser'] = $login['password'];

			echo"<script language = 'JavaScript'>
			confirm('Login Berhasil');
			document.location='Administrator/index.php';
			</script>";
		}

	}
	else{
            echo"<script language = 'JavaScript'>
            document.location='index.php?pesan=gagal';
            </script>";
        }
}


}
?>