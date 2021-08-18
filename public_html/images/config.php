<?php
$CANVAS_WIDTH=550;
$CANVAS_HEIGHT=550;
$IMAGE_DIR="./jpg";

$TYPES = array(
	"boat" => array("dgħajsa", "fem", "id-"),
	"aeroplane" => array("ajruplan", "masc", "l-"),		
	'bicycle' => array('rota', 'fem', 'ir-'),
	'bird' => array('għasfur', 'masc', 'l-'),
	'bottle' => array('flixkun', 'masc', 'il-'),
	'bus' => array('karozza tal-linja', 'fem', 'ix-'),
	'car' => array('karozza', 'fem', 'il-'),
	'cat' => array('qattus', 'masc', 'il-'),
	'chair' => array('siġġu', 'masc', 'is-'),
	'cow' => array('baqra', 'fem', 'il-'),
	'diningtable' => array('mejda', 'fem', 'il-'),
	'dog' => array('kelb', 'masc', 'il-'),
	'horse' => array('żiemel', 'masc', 'iż-'),
	'motorbike' => array('mutur', 'masc', 'il-'),
	'person' => array('persuna', 'fem', 'il-'),
	'pottedplant' => array('qasrija', 'fem', 'il-'),
	'sheep' => array('nagħġa', 'fem', 'il-'),
	'sofa' => array('sufan', 'masc', 'is-'),
	'train' => array('ferrovija', 'fem', 'il-'),
	'tvmonitor' => array('televixin', 'masc', 'it-'));


$PREPS = array("fuq", "biswit", "wara", "taħt", "maġenb", "lil hinn", "quddiem", "viċin", "ħdejn", "'il bogħod minn", "ġo", "fi", "faċċata ta'", "barra minn", "bejn", "qrib");

$PAGE_TITLE = "Studju dwar l-istampi"; 

define( "SERVER", "webhost-sql");
define ("USERNAME", "agat1-sql");
define("PASSWORD", "alb479");
define("DB", "agat1-db");
#define("SERVER", "localhost");
#define("USERNAME", "root");
#define("PASSWORD", "root");
#define("DB", "prepositions");
define ("LOG", "log");
define("IMAGES", "images");
define("RESULTS", "results");

?>
