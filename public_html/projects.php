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
				<img src="./img/communication.jpg" class="img-thumbnail img-responsive" alt="writing" width="110" height="350">
			</center>
			<?php require('./inc/left.inc') ?>
		</div>

		<div class="col-sm-7 text-left"> 
			<h2>current and ongoing projects</h2>
				
				<?php
					$projects = explode('---', file_get_contents('./inc/projects.txt'));

					foreach ($projects as $p): 					
						list($name, $thumb, $url, $funding, $description) = explode("|", $p);
						$url = strlen($url) > 0 ? $url : "#";
						$ustring = '<a target=_blank href="' . $url . '">' . $name . '</a>';

						if(substr_compare($thumb, 'svg', -strlen('svg')) === 0) {
							$imgstring = '<img class="img-thumbnail" style="background: #ffffff" width="100em" src="./img/' . $thumb . '" alt="project 	logo"/>';	

						} else {
							$imgstring = '<img class="img-thumbnail" width="100em" src="./img/' . $thumb . '" alt="project logo"/>';

						}

														
				?>

						<div class="row">
							<div class="col-md-3">
								<?=$imgstring?>
							</div>
							<div class="col-md-9">
								<h3><?=$ustring?></h3>
								<p>
									<h4>Description</h4>
									<?=$description?>
								</p>
								<p>
									<h4>Funding</h4>
									<?=$funding?>
								</p>
							</div>
						</div>
						<hr/>

				<?php endforeach; ?>


				<p><br/>						
						<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
  						<a data-toggle="collapse" href="#projolder" aria-expanded="false" aria-controls="actolder">older projects</a> 
  						
  					</p>

				<div class="collapse" id="projolder">
					<h3>past projects</h3>
					<ul>
					<li><a target=_blank href="http://typo.uni-konstanz.de/parseme/">PARSEME (PARSing and Multi-word Expressions):</a> Towards linguistic precision and computational efficiency in natural language processing. An EU COST Initiative.</li>
					<li><a target=_blank href="http://homepages.abdn.ac.uk/k.vdeemter/pages/RefNet/index.html">REFNET: Linking Research on Reference</a> An interdisciplinary research network on reference and related problems.</li>
							<LI><a href="http://bridging.uvt.nl/" target=_BLANK>Bridging
								the gap between psycholinguistics and computational linguistics:
								The case of referring expressions</a> (Visiting Reearch Fellow;
							Tilburg Centre for Communication and Cognition)</LI>
						<LI><a
							href="http://www.abdn.ac.uk/ncs/computing/research/nlg/projects/previous/babytalk/"
							target=_BLANK>BabyTalk: Generating textual summaries of
								clinical temporal data</a> (Research Fellow; Aberdeen)</LI>
						<LI><a
							href="http://www.abdn.ac.uk/ncs/computing/research/nlg/projects/previous/tuna/"
							target=_BLANK>TUNA: Towards a UNified Algorithm for the
								Generation of Referring Expressions</a> (PhD Student; Aberdeen)</LI>
					</ul>
				</div>
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