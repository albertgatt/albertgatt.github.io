<?php

class DBUtils {

	//open link to DB
	static public function open_db($server, $user, $pw, $db) {
		$mysqli = new mysqli($server, $user, $pw, $db);
		return $mysqli;
	}
	
	public static function get_new_id($mysqli, $table) {
		$query = "SELECT MAX(subjectid) FROM " . $table;
		$result = $mysqli->query($query);
		$subject = 0;
		
		if($result->num_rows > 0) {
			$arr = $result->fetch_array();
			$subject = $arr[0] + 1;
		} 
		$result->free();
		return $subject;		
	}
	
	// update subject row with demographics
	public static function enter_log_data($id, $table, $mysqli) {
		$gender = addslashes ( $_POST ['gender'] );
		$age = addslashes ( $_POST ['age'] );
		$acad = addslashes ( $_POST ['student'] );
		$newSubjectQuery = "INSERT INTO " . $table . " VALUES( " . $id . ", '" . $gender . "', '" . $age . "', '" . $acad . "')";
		if(!$mysqli->query($newSubjectQuery)) {
			die("<h1>Error inserting new subject</h1>");
		}		
	}
	
	public static function update_data($mysqli, $image, $results) {
		$subject = $_POST['subject'];
		$imageid = $_POST['imageid'];
		$preposition = addslashes($_POST['preposition']);
		
		$q1 = "INSERT INTO " . $results . " VALUES( " . $subject . ", " . $imageid . ", '" . $preposition . "' );";
		
		if(!$mysqli->query($q1)) {
			die("<h1>Error updating result</h1>" . mysqli_error($mysqli));
		}
		
		$q2 = "UPDATE " . $image . " SET numdesc = numdesc+1 WHERE idimages=" . $imageid;
		
		if(!$mysqli->query($q2)) {
			die("<h1>Error incrementing description count</h1>" . mysqli_error($mysqli));
		}
		
		
	}
	
	public static function next_image($mysqli, $imgtable, $subject, $restable) {
		$q = "SELECT * FROM " . $imgtable . " WHERE idimages NOT IN (SELECT image FROM " . $restable . " WHERE subject=" . $subject . ") ORDER BY numdesc asc, RAND() limit 1;";
		
		if($result = $mysqli->query($q)) {
			$imagedata = $result->fetch_array(MYSQLI_NUM);
			$result -> free();
			return $imagedata;
		} else {
			die("<h1>Error retrieving next image</h1>");
		}
	}
}

?>
