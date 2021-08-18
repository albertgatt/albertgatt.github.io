<?php
//session_start ();
#error_reporting ( E_ALL );
#header ( 'Cache-control: private' );
ini_set ( 'display_errors', '1' );
#echo phpversion();
$page = 'start';

if (isset ( $_POST ['page'] )) {
	$page = $_POST ['page'];
} elseif(isset($_GET['page'])) {
	$page = $_GET['page'];
}

//$_SESSION ['page'] = $page;

// contains parameters we need
require ('config.php');
require('dbinterface.php');

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?= $PAGE_TITLE?></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="./css/bootstrap.min.css" />
<script src="./js/images.js"></script>
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/cursor.js"></script>

</head>

<body>
	<div class="container" role="main">
		<h1 style="color: navy">Studju dwar il-pożizzjoni tal-oġġetti
			fir-ritratti</h1>
	
	
<?php
// db connection using params in config.php
$link = DBUtils::open_db(SERVER, USERNAME, PASSWORD, DB);

switch ($page) {
	case 'start' :
		require ('inc/startpage.inc');
		break;
	case 'newsubject' :
		$subject = DBUtils::get_new_id($link, LOG);
		$imagedata = DBUTils::next_image($link, IMAGES, $subject, RESULTS);
		$imageid = $imagedata[0];
		$Data = array_slice($imagedata, 1, 13);
		DBUtils::enter_log_data($subject, LOG, $link);
		require ('inc/describe.inc');
		break;
	case 'experiment':
		$subject = $_POST['subject'];
		DBUtils::update_data($link, IMAGES, RESULTS);
		$imagedata = DBUTils::next_image($link, IMAGES, $subject, RESULTS);
		
		if (count($imagedata) == 0) {
			require('inc/endpage.inc');
		} else {
			$imageid = $imagedata[0];
			$Data = array_slice($imagedata, 1, 13);
			require('inc/describe.inc');
		}
		break;
	case 'terminate':
		DBUtils::update_data($link, IMAGES, RESULTS);
		require ('inc/endpage.inc');
		break;
	default :
		require ('inc/startpage.inc');
		break;
}

$link->close();
?>

</div>




</body>
</html>