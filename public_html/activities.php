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
				<img src="./img/coffee.jpg" class="img-thumbnail img-responsive" alt="activities" width="110" height="350">
			</center>
			<?php require('./inc/left.inc'); ?>
		</div>

		<div class="col-sm-7 text-left"> 
			<h2>what's keeping me busy</h2>
			
			<?php
				$activities = explode('---', file_get_contents('./inc/activities.txt'));
				$count = sizeof($activities);

				if($count > 5):					
			?>				
					<div>
						<?php foreach (array_slice($activities, 0, 5) as $a): ?>
							<p><?=$a?></p>
						<?php endforeach ?>
					</div>

					<p><span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
  						<a data-toggle="collapse" href="#actolder" aria-expanded="false" aria-controls="actolder">older</a> 
  					</p>

					<div class="collapse" id="actolder">
					 <!-- <div class="card card-block"> -->
					    <?php foreach(array_slice($activities, 5) as $a): ?>
					    	<p><?=$a?></p>
						<?php endforeach ?>
					  <!-- </div> -->
					</div>

				<?php else: ?>
					<?php foreach ($activities as $a): ?>
							<p><?=$a?></p>
						<?php endforeach ?>

				<?php endif ?>
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
