<?php
	class Password
	{
		public function __construct()
		{
			self::checkBlowfish();
		}

		public function checkBlowfish()
		{
			if(!defined("CRYPT_BLOWFISH")&&!CRYPT_BLOWFISH) 
			{
				echo "Algoritmo Blowfish no soportado";
				die();
			}
		}
		
		static public function getPassword($password)
		{ //Comparación
			$option = array("cost"=>7);
			return password_hash($password, PASSWORD_BCRYPT, $option);
		}
		
		static public function passwordVerify($pass1, $pass2)
		{ //Verificación
			if(password_verify($pass1, $pass2))
			{
				return true;
			}
			return false;
		}
	}

	$password1 = 12345;
	$password2 = 12345;

	$hash = Password::getPassword($password1);
	/*echo sha1($password1);
	echo "<br>";
	echo md5($password1);
	echo "<br>";
	echo $hash;
	echo "<br>";*/

	/*if (Password::passwordVerify($password2, $hash))
	{
		echo "Contraseñas validas";
	}
	else
	{
		echo "Contraseñas invalidas";
	}*/
?>