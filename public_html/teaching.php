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
				<img src="./img/blackboard.jpg" class="img-thumbnail img-responsive" alt="teaching" width="110" height="350">
			</center>
			<?php require('./inc/left.inc'); ?>
		</div>

		<div class="col-sm-7 text-left"> 
			<h2>teaching materials</h2>
			<P>
				For my classes at the University of Malta, see <a href="https://www.um.edu.mt/profile/albertgatt" target=_blank>my UM profile</a>.
				Below are some links to more advanced or general courses I've taught recently  and not so recently in other places. 
			</P>

			<UL>
				<LI><a href="http://nlgsummer.github.io" target=_blank>Natural Language Generation: Microplanning and Realisation</a>: Lectures deslivered
				as part of the <strong>Summer School on Natural Language Generation, Summarisation and Dialogue Systems</strong>, University of Aberdeen, UK, 10-24th July, 2015.
				</LI>
				<LI><a href="./corpora2014/">Using corpora</a>: staff seminar on hands-on techniques for corpus search and analysis.</LI>
				<LI><a href="./refnet2014/multimodal.html">Multimodal
						Reference: Models and Corpora</a>: postgraduate course delivered at
					the <a
					href="http://homepages.abdn.ac.uk/k.vdeemter/pages/RefNet/sus-courses.html"
					target=_blank>RefNet Summer School, Edinburgh, August 2014</a>. In
						collaboration with Ielka van der Sluis (University of Groningen)
						and Paul Piwek (Open University).</LI>
				<li>Algorithms for Referring Expression Generation</a>: postgraduate course delivered at
					the <a
					href="http://homepages.abdn.ac.uk/k.vdeemter/pages/RefNet/sus-courses.html"
					target=_blank>RefNet Summer School, Edinburgh, August 2014</a>. In
						collaboration with Kees van Deemter (University of Aberdeen).</li>
				<LI><a href="./hit-msra2012">Data-to-Text Natural Language
						Generation and Evaluation</a>: advanced postgraduate course delivered
					at the <a href="http://mitlab.hit.edu.cn/2012summerschool/"
					target=_blank>HIT-MSRA Summer School On Human Language
						Technology</a>, Harbin, China, July 2012.</LI>
			
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
