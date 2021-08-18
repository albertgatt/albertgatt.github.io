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
				<img src="./img/pencil.jpg" class="img-thumbnail img-responsive" alt="writing" width="110" height="350">
			</center>
			<br/>
			<p>
				<span class="glyphicon glyphicon-hand-right"></span>
			  	<a href="https://scholar.google.com/citations?user=uF5HKZQAAAAJ&hl=en" target=_blank>Google Scholar</a>
 			</p>
 			<p>
				<span class="glyphicon glyphicon-hand-right"></span>
			  	<a href="http://aclanthology.info/people/albert-gatt" target=_blank>ACL Anthology</a>
 			</p>

			<p>
				<span class="glyphicon glyphicon-hand-right"></span>
			  	<a href="https://www.semanticscholar.org/author/Albert-Gatt/1700894" target=_blank>SemanticScholar</a>
 			</p>


			<p>
				<span class="glyphicon glyphicon-hand-right"></span>
			  	<a href="https://www.um.edu.mt/library/oar/browse?value=Gatt%2C+Albert&type=author" target=_blank>OAR@UoM (open access repo)</a>
 			</p>

 			<p>
				<span class="glyphicon glyphicon-hand-right"></span>
			  	<a href="https://malta.academia.edu/AlbertGatt" target=_blank>Academia.edu</a>
 			</p>
 			<p>
				<span class="glyphicon glyphicon-hand-right"></span>
			  	<a href="https://orcid.org/0000-0001-6388-8244" target=_blank>ORCiD</a>
 			</p>
 			<p>
				<span class="glyphicon glyphicon-hand-right"></span>
			  	<a href="https://dblp.uni-trier.de/pers/hd/g/Gatt:Albert" target=_blank>DBLP</a>
 			</p>

		</div>

		<div class="col-sm-7 text-left"> 
			<h2>publications</h2>

			<?php
				if(isset($_GET['kw'])) {
					$kw = htmlspecialchars($_GET['kw']);
					unset($_GET['kw']);
					echo("<p><a>Publications with the keyword: <i>" . $kw . '</i></a></p>');
					echo('<p><a href="./publications.php">View all publications</a></h4></p>');
					$_GET['keywords'] = $kw;
				}

				$_GET['bib']='./inc/agatt.bib';
				$_GET['all']=1;
				#$_GET['academic'] = 1;

				include( './bibtexbrowser.php' );				
			?>	
		</div>

		<div class="col-sm-3 sidenav">
			<div class='well'>
				<?php 
					include('CLOUD.PHP');
					$keywords = $main->getDb()->tagIndexWithFrequencies();

					$cloud = new PTagCloud(count($keywords));
					$cloud->setBackgroundColor('#F4F4F4');
					$cloud->setSearchUrl('./publications.php?kw=');
					$colours = array(9=>'#C0B283', 8=>'#A89C73', 7=>'#908562', 6=>'#786F52', 5=>'#605942', 4=>'#484331', 3=>'#302C21', 2=>'#181610', 1=>'#302C21', 0=>'#181610');

					// $colours = array(9=>'#C0B283', 8=>'#887844', 7=>'#665a33', 6=>'#443c22', 5=>'#221e11', 4=>'#221e11', 3=>'#221e11', 2=>'#221e11', 1=>'#000000', 0=>'#000000');
					$cloud->setTextColors($colours);

					foreach($keywords as $k=>$f) {
						$cloud->addTag($k, $useCount = $f);
					}

					echo($cloud->emitCloud());

				?>
			</div>

<!-- 			<br/><br/>
			<div class="dropdown">
  				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Browse by keyword
  				<span class="caret"></span></button>
  				<ul class="dropdown-menu" role="menu" style="height: auto;max-height: 200px; overflow-x: hidden;">
					<?php				
						#$news = explode('---', file_get_contents('./inc/news.txt'));
						$keywords = $main->getDB()->tagIndex();
						foreach($keywords as $k):
					?>
							<li><a href="./publications.php?kw=<?=$k?>"><?=$k?></a></li>
					<?php endforeach ?>
				</ul>
			</div> -->
		</div>
	</div>

</body>
</html>

