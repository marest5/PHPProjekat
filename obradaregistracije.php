<?php 
	
if(isset($_POST['submitregistar'])) {
if(isset($_POST['usernameregistar'])&& isset($_POST['emailregistar']) && isset($_POST['passwordregistar'])) {
if(isset($_POST['g-recaptcha-response']) && isset($_POST['g-recaptcha-response']))	{

$secretkey="6Lcx4Q4UAAAAANLh0iC71hXMPwnwsxKi3ny10U7w";
$ip=$_SERVER['REMOTE_ADDR'];
$captcha=$_POST['g-recaptcha-response'];
$rsp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

$arr=json_decode($rsp,TRUE);
$email=$_POST['emailregistar'];
$username=$_POST['usernameregistar'];
$password=($_POST['passwordregistar']);
$status=2;
$zasluga=3;

include "konekcija.php";
$sql="SELECT * from korisnik";
$rezultat = $mysqli->query($sql);
if($rezultat->num_rows==0){

	$stmt =$mysqli->prepare("INSERT INTO korisnik (username,password,email,idStatus,idzasluge) values (?,?,?,?,?)");
 	$stmt->bind_param('sssdd',$username,$password, $email,$status,$zasluga);

$stmt->execute();

$result = $stmt->get_result();

if(!$result){
	header("refresh:1;url='index.php'");
		echo "Uspesno ste se registrovali!";
		} else {
			 echo "<script>
	alert('Doslo je do greske prilikom registracije!');
	window.location.href='registracija.php';
	</script>";		
		}		
	} else {
	while ($red=$rezultat->fetch_object()) {

		
		
	if($red->username==$username) {
	 echo "<script>
	alert('Username vec postoji!');
	window.location.href='registracija.php';
	</script>";	
		}
	}

if(empty($username) || empty($password) || empty($email)){
		echo "<script>
	alert('Morate uneti sve parametre!');
	window.location.href='registracija.php';
	</script>";
	} elseif($arr['success']){
	$stmtt =$mysqli->prepare("INSERT INTO korisnik (username,password,email,idStatus,idzasluge) values (?,?,?,?,?)");
		 $stmtt->bind_param('sssdd',$username,$password, $email,$status,$zasluga);
	
	$stmtt->execute();
	
	$resultt = $stmtt->get_result();	
	
	if(!$resultt){
	header("refresh:1;url='index.php'");
		echo "Uspesno ste se registrovali!";
		}

	} else{
		echo "<script>
		alert('Captcha nije uredno uradjena!!!');
	window.location.href='registracija.php';
	</script>";
	}		
	}	
	}
}$mysqli->close();
}
?>


