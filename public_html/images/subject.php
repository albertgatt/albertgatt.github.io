<?php

//----------------------------------------------------------------------------------------------------
//Instantiates a subject class
//----------------------------------------------------------------------------------------------------

class Subject {
	var $id;
	var $group;
	var $dbLink;
	var $phase;
	var $nextPhase;
	var $nextWord;
	var $lastWord;
	var $sentence;
	var $type;

	//constructor: takes stage id and boolean "end" flag
	public function Subject() {
		$this->phase = $_POST['phase'];
		$this->openDB();
		$this->type = "none";

		if($this->phase == -5) {
			$this->getNewID();
			$this->getNewGroup();

		} else {
			$this->id = $_POST['id'];
			$this->group = $_POST['grp'];

			//check the current stage and update as required
			switch($this->phase) {

				//subject has entered personal info -- instructions next
				case -4:
					$this->enterLogData();
					$this->updateGroupCount();
					//$this->initResultsTable();
					break;

				case -3:
				case -2: //instructions
				case -1: //practice 1
				case 0: //practice 2
					break;

				default: //subject has chosen to continue
					$this->type = $_POST['type'];
					$this->lastWord = $_POST['word'];
					$this->sentence = $_POST['sentence'];
					$this->update();
					break;
			}
		}

		$this->nextPhase = $this->phase + 1;
		unset($_POST['id']);
		unset($_POST['group']);
	}


	//open link to DB
	private function openDB() {
		$link = mysql_connect( SERVER, USERNAME, PASSWORD );

		if ( !$link )
		{
			echo "<h1>Error reading database. Please try again later.</h1>";
			exit;
		}
		else
		{
			$this->dbLink = $link;
		}

		mysql_query("SET NAMES 'utf8'", $this->dbLink);
		mysql_select_db( DB, $this->dbLink )
		|| die( '<h1>Error connecting to database. Please try later.</h1>' );
	}


	//update subject row with demographics
	private function enterLogData()  {
		$gender = addslashes( $_POST['gender'] );
		$acad = addslashes( $_POST['acad'] );
		$date = date( 'Y-m-d H:i:s', time());
		$newSubjectQuery = "INSERT INTO " . LOG .
		" VALUES( " . $this->id . ", " .
		$this->group . ", '" .
		$date . "', '" .
		$gender . "', '" .
		$acad . "')";
		mysql_query( $newSubjectQuery, $this->dbLink )
		|| die( "Query failed: new subject not created: " . mysql_error() );
	}


	//get next word
	private function getNextWord() {
		unset($this->nextWord);
		$nextField = "word" . $this->nextPhase;
		$wordQuery = "SELECT " . $nextField . " FROM " . FORMS . " WHERE grp=" . $this->group;
		$wordResource = mysql_query($wordQuery, $this->dbLink);
		$this->nextWord = mysql_result($wordResource, 0);
		mysql_free_result($wordResource);
	}

	//set subject session vars so as to repeat the last stage
	private function repeatStage() {
		$this->phase = $_SESSION["stage"] - 1;
		$this->nextPhase = $_SESSION["stage"];
	}

	//assign new subject ID & group
	private function getNewID( ) {
		$toDateQuery =  "SELECT MAX(id) FROM " . LOG;
		$result = mysql_query( $toDateQuery, $this->dbLink );

		if( mysql_num_rows($result) == 0)
		{
			$this->id = 1;
		}
		else
		{
			$subjectsToDate = mysql_result( $result, 0 );
			$next = $subjectsToDate + 1;
			$this->id = $next;
		}

		mysql_free_result($result);
	}

	private function getNewGroup() {
		$grpQuery = "SELECT grp g, cnt c FROM " . GRPCNT. " GROUP BY g ORDER BY c ASC";
		$result = mysql_query($grpQuery, $this->dbLink);

		if(mysql_num_rows($result) == 0) {
			$this->group = 1;

		} else {
			$groups = mysql_fetch_array($result, MYSQL_NUM);
			$this->group = $groups[0];
		}

	}

	//select next action: trial or debriefing
	public function nextAction() {
		switch($this->nextPhase) {
			case -4: //enter subject data
				require("inc/newSubject.inc");
				break;

			case -3:
				require("inc/instructions.inc");
				break;

			case -2:
				require("inc/practice1.inc");
				break;

			case -1: //instructions
				require("inc/practice2.inc");
				break;

			case 0:
				require("inc/endPractice.inc");
				break;

			case 16: //finish
				require("inc/end.inc");
				$this->incrementGroupCount();
				break;
					
			default: //next trial
				if($_POST['type'] == 'trial') {
					require("inc/break.inc");

				} else {
					$this->getNextWord();

					if(fmod($this->nextPhase, 2) == 0) {
						require("inc/trial-even.inc");

					} else {
						require("inc/trial-odd.inc");
					}
				}
				break;
		}
	}

	private function incrementGroupCount() {
		$incrQuery = "UPDATE " . GRPCNT . " SET cnt=cnt+1 WHERE grp=" . $this->group;
		mysql_query($incrQuery, $this->dbLink) || die("<h1>Error updating group count</h1>" . mysql_error());
	}


	//update trial data
	private function update() {
		if($this->type == 'trial') {
			$sentence = addslashes($this->sentence);
			//		$field = "sentence" . $this->phase;
			//		$insertQuery = "UPDATE " . RESULTS .
			//		               " SET " . $field . "='" .
			//						$sentence . "' WHERE id=" . $this->id;
			$insertQuery = "INSERT INTO " . RESULTS . " VALUES($this->id, $this->phase, '$sentence')";
			mysql_query($insertQuery, $this->dbLink) || die("<h1>Error updating database</h1> " . mysql_error());
		}
	}

	private function initResultsTable() {
		$initQuery = "INSERT INTO " . RESULTS .
		" VALUES( " . $this->id . ", 0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
		mysql_query($initQuery, $this->dbLink) || die("<h1>Error initialising results table</h1>".mysql_error());
	}

	//udpate count of groups
	private function updateGroupCount() {
		$updateQuery = "UPDATE " . GRPCNT . " set cnt=cnt+1 WHERE grp=" . $this->group;
		mysql_query($updateQuery, $this->dbLink) || die("Update group count failed: " . mysql_error());
	}

	//debrief subject
	private function debrief() {
		setcookie(TERMINATION_COOKIE, 'END', time()+60*60*24*30);
		require( "inc/end.inc" );
	}


	//send instructions
	private function instruct() {
		require(  "inc/instructions.inc" );
	}

	//make a new trial for this subject
	private function makeNewTrial() {
		require("./inc/trial.inc");
	}

	//close DB connection
	public function closeDB() {
		mysql_close( $this->dbLink );
	}

} //END SUBJECT CLASS

?>







