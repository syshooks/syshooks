<?php

abstract class BaseController {
	
	static public function Create() {
		AJAX::Response("json",  call_user_func(array(static::TYPE, "Create"), $_POST));
	}

	static public function Get() {
		$return = array();
		$objName = static::TYPE;
		$start = isset($_GET["start"]) ? $_GET["start"] : 0;
		$end = isset($_GET["end"]) ? $_GET["end"] : 0;
		$limit = isset($_GET["limit"]) ? $_GET["limit"] : 0;

		$db = MySQLConnector::getHandle();

		try {
			$statement = $db->prepare("SELECT `id` FROM `". $objName::_TABLE ."`");
	
			$statement->execute();

			$items = $statement->fetchAll(PDO::FETCH_ASSOC);

			foreach($items as $item){
				$Item = new $objName($item);
				$return[$Item->id] = $Item->GetValues();
			}
		} catch (PDOException $e) {
			return AJAX::Response("json", array(), 2, $e->getMessage());
		}

		AJAX::Response("json", $return);
	}

	static public function Update() {

	}

	static public function Delete() {

	}

	static public function Search() {

	}
}

// abstract class one {
// public function alright(){
// echo "going to " . static::$WIN;
// $b = new static::$WIN;
// echo $b->yup;
// }
// }
// abstract class two extends one {
// public static $WIN = "three";
// }
// class three {
// public $yup = "good!";
// }
// two::alright();
