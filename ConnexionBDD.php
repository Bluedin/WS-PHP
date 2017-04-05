<?php 

	final class singleton{

		private static $PDOInstance = null; //Instance de PDO

		private static $dsn = null; //String dsn pour la connexion

		private static $username = null; //Nom d'utilisateur pour la connexion

		private static $password = null; //Mot de passe pour la connexion

		private static $options = array( //Option du pilote 
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

		private function __construct() //Constructeur privé
		{ 

		}

		public static function getInstance()
		{

			if(self::$PDOInstance == null)
			{
				self::$PDOInstance = new PDO(self::$dsn, self::$username, self::$password);
			}
			else
			{
				
			}

			return self::$PDOInstance;

		}

		public static function setConfig($dsn, $username, $password)//Configuration de connexion à la base
		{ 

			self::$dsn = $dsn;
			self::$username = $username;
			self::$password = $password;

		}

		private static function configDone() //Vérification de la configuration de connexion
		{ 
			if(self::$PDOInstance == null)
			{
				return false;
			}
			else
			{
				return true;
			}
		}

	}

?>