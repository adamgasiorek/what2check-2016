<?php
include('../funkcje/polaczenia.php');

if (isset($_POST['login'])) 
{
	$username = $_POST['login'];
	$password = $_POST['password'];

	$operacja = $polaczenie->prepare("SELECT id_uzytkownika FROM uzytkownika_konta WHERE login=:login AND 
	haslo=:haslo LIMIT 1");
	$operacja->execute(array(':login' => $username,':haslo' => $password));
	$rows = $operacja -> rowCount();
	
	if ($rows == 1){
		$wyniki = $operacja->fetch();
		$_SESSION["ID_USER"] = $wyniki['id_uzytkownika'];
		header("location: ../index.php");
	} 
	else {
		header("location: ../login.php?error=1");
	}


}

?>