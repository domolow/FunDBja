<?PHP
	session_start();
	//if(empty($_SESSION['ID']) || empty($_SESSION['NAME']) || empty($_SESSION['SURNAME'])){
	//	echo '<script>window.location = "Login.php";</script>';
	//}
	$conn = oci_connect("system", "123456789", "//localhost/XE");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	}
?>

<?PHP
	if(isset($_POST['submit_repassword'])){
		$username = $_SESSION['USERNAME'];
		echo $username;
		$password = $_SESSION['PASSWORD'];
		$repassword = trim($_POST['repassword']);
		$query = "UPDATE AA_LOGIN SET PASSWORD = '$repassword' WHERE username='$username' and password='$password'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		echo "RePassword success";
		//break;
	};
	oci_close($conn);
?>

Member page
<hr>
<?PHP
	echo "ID : ".$_SESSION['ID']."<br>";
	echo "NAME : ".$_SESSION['NAME']."<br>";
	echo "SURNAME : ".$_SESSION['SURNAME']."<br>";
	echo "USERNAME : ".$_SESSION['USERNAME']."<br>";
	echo "PASSWORD : ".$_SESSION['PASSWORD']."<br>";
	echo "<a href='Logout.php'>Logout</a>";
	//echo var_dump($_SESSION['PASSWORD']);
	//break;
	//echo "password : ".$_SESSION['password']."<br>";
?>

<form action='MemberPage.php' method='post'>
<br><br>
	RePassword<br>
	<input name='repassword' type='number'><br><br>
	<input name='submit_repassword' type='submit' value='repassword'><br>
</form>