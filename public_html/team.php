<!DOCTYPE html>
<html lang="en">
<head>
	<title>Albert Gatt's personal homepage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="./default.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="JavaScript1.2" src="./scripts/utilities.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
	<?php require('./inc/header.inc'); ?>
</nav>
	
<div class="container-fluid text-center">    
	
	<div class="row content">
		
		<div class="col-sm-2 sidenav">
			<center>
				<img src="./img/factory.jpg" class="img-thumbnail img-responsive" alt="students" width="110" height="350">
			</center>
			<?php require('./inc/left.inc'); ?>
		</div>

		<div class="col-sm-7 text-left"> 
			<h2>past and current team members</h2>
			
			<?php
				$phd = explode('---', file_get_contents('./inc/currentstudents.txt'));
				$former = explode('---', file_get_contents('./inc/formerstudents.txt'));
				$ra = explode('---', file_get_contents('./inc/ra.txt'));
			?>

				<h3>research assistants and postdocs</h3>
				<?php foreach ($ra as $r): 					
						list($name, $year, $url, $topic) = explode("|", $r);
						$ustring = '<a target=_blank href="' . $url . '">' . $name . '</a>';

						if(strlen(trim($url)) == 0) {
							$ustring = '<a href="#">' . $name . '</a>';
						} 
					?>
						<p>
							<?=$ustring?> (<?=$year?>). <strong><?=$topic?></strong>
						</p>

					<?php endforeach ?>

				<h3>research students</h3>
					<?php foreach ($phd as $p): 
						list($name, $year, $url, $topic) = explode("|", $p);
						$ustring = '<a target=_blank href="' . $url . '">' . $name . '</a>';

						if(strlen(trim($url)) == 0) {
							$ustring = '<a href="#">' . $name . '</a>';
						} 
					?>
						<p>
							<?=$ustring?> (<?=$year?>). <strong><?=$topic?></strong>
						</p>

					<?php endforeach ?>

					<h3>former students</h3>
					<?php foreach ($former as $f): 
						list($name, $year, $url, $topic) = explode("|", $f);		
						$ustring = '<a target=_blank href="' . $url . '">' . $name . '</a>';

						if(strlen(trim($url)) == 0) {
							$ustring = '<a href="#">' . $name . '</a>';
						} 
					?>
						<p>
							<?=$ustring?> (<?=$year?>). <strong><?=$topic?></strong>
						</p>
					<?php endforeach ?>
		</div>

		<!-- <div class="col-sm-3 sidenav">
			<?php
				$news = explode('---', file_get_contents('./inc/news.txt'));

				foreach($news as $n):
			?>
				<div class="well">
					<p><?=$n?></p>
				</div>
			<?php endforeach ?>
		</div> -->

	</div>

</body>
</html>
