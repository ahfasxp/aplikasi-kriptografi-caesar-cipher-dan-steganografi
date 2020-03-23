<?php 
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "kriptografi";
	var $koneksi;
 
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}
 
 
	function register($nama,$username,$password)
	{	
		$insert = mysqli_query($this->koneksi,"insert into users values ('','$nama','$username','$password','Belum diatur','Belum diatur','')");
		return $insert;
	}
 
	function login($username,$password,$remember)
	{
		$query = mysqli_query($this->koneksi,"select * from users where username='$username'");
		$users = $query->fetch_array();
		if(password_verify($password,$users['password']))
		{
			
			if($remember)
			{
				setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
				setcookie('nama', $users['nama'], time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $users['name'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}
 
	function relogin($username)
	{
		$query = mysqli_query($this->koneksi,"select * from users where username='$username'");
		$users = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $users['name'];
		$_SESSION['is_login'] = TRUE;
	}

	function tampil_data()
	{
		$data = mysqli_query($this->koneksi,"select * from users");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

	function delete_data($id)
	{
		$query = mysqli_query($this->koneksi,"delete from users where id='$id'");
	}

	function get_by_id($id)
	{
		$query = mysqli_query($this->koneksi,"select * from users where id='$id'");
		return $query->fetch_array();
	}

	function update_data($name,$username,$address,$phone,$id)
	{
		$query = mysqli_query($this->koneksi,"update users set name='$name',username='$username',address='$address',phone='$phone' where id='$id'");
	}
}
?>