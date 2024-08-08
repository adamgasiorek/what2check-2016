<?php
include('../funkcje/polaczenia.php');

if (isset($_POST['login'])) 
{
	$username = $_POST['login'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$operacja = $polaczenie->prepare("SELECT id_uzytkownika FROM uzytkownika_konta WHERE login=:login OR 
	email=:email LIMIT 1");
	$operacja->execute(array(':login' => $username,':haslo' => $password,':email' => $email));
	$rows = $operacja -> rowCount();


	if ($rows == 0){
		$operacja = $polaczenie->prepare("INSERT INTO uzytkownika_konta(login,haslo,email) VALUES(:login,:haslo,:email)");
		$operacja->execute(array(':login' => $username,':haslo' => $password,':email' => $email));

		header("location: ../login.php?error=3");
	} 
	else {
		header("location: ../rejestracja.php?error=1");
	}


}

?>