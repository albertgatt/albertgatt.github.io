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
				<img src="./img/resources.jpg" class="img-thumbnail img-responsive" alt="resources" width="110" height="350">
			</center>
			<?php require('./inc/left.inc'); ?>
		</div>

		<div class="col-sm-7 text-left"> 
			<h2>some useful resources</h2>
			<p>From time to time I put up some stuff I've done
				that might be useful to others.</p>

			<h3>code</h3>
			<ul>
				<li><a href="https://mlrs.research.um.edu.mt/index.php?page=demos" target=_BLANK>Tools for Maltese NLP</a>:
					Various tools (including POS Tagger, tokeniser, phonetic transcriber) for Maltese. Mostly written in Python. Hosted on the Maltese Language Resource Server.</li>

				<li><a href="https://github.com/simplenlg" target=_BLANK>SimpleNLG</a>:
					a java library for morphological generation and syntactic
					realisation. This used to be hosted on Google Code, but is now on Github.</li>
			</ul>

			<h3>language resources</h3>

			<ul>
				<li><a href="https://github.com/claudiogreco/coling18-gte" target=_BLANK>Grounded Textual Entailment dataset</a>: a version of the SNLI dataset by <a href="https://nlp.stanford.edu/pubs/snli_paper.pdf" target=_blank>Bowman et al (2015)</a>, linked to the images which ground the premises. Papers related to this work can be found <a href="https://staff.um.edu.mt/albert.gatt/publications.php?kw=textual+entailment">here</a>.
				</li>
				<li><a href="http://mlrs.research.um.edu.mt/" target="_BLANK">The
						Maltese Language Resource Server (MLRS)</a>: a server for language
					resources and tools in Maltese. Currently hosts a corpus of ca.
					100m tokens of Maltese text. This is continuously being updated.</li>

				<li>The <a
					href="https://sites.google.com/site/genchalrepository/"
					target=_BLANK>GenChal Repository</a>: an online repository of
					datasets related to the Generation Challenges, a series of Shared
					Task challenges organised since 2007.
				</li>
				

				<li><a href="http://www.abdn.ac.uk/ncs/departments/computing-science/corpus-496.php"
					target="_BLANK">The TUNA Corpus of Referring Expressions</a>, a
					semantically transparent, annotated corpus of references to objects
					in visual domains. This corpus has been used in three Shared Task
					Evaluations since its development.</li>

				<li>Experiment on temporal structure in narrative: I've
					recently run this experiment, and have collected a large corpus of
					narratives that I'll make available once annotation is complete.
					Meantime, you can read a summary <a
					href="./resources/storyCorpus.html">here</a>.
				</li>
				<li class="text"><a
					href="http://www.abdn.ac.uk/ncs/departments/computing-science/tunabibl-495.php"
					target="_BLANK"> Annotated bibliography on the generation of
						referring expressions (and related problems)</a> <br> A
						collection of publications on reference and its computational
						treatment in generation, compiled as part of the TUNA Project. Not up to date at all!</li>
			</ul>

		<!-- 	<h3>other nlg links</h3>
			<ul>
				<LI><a href="http://bridging.uvt.nl/" target=_BLANK>Bridging
						the gap between psycholinguistics and computational linguistics:
						The case of referring expressions</a></LI>
				<li class="text"><a href="http://inf.abdn.ac.uk/research/nlg/"
					target="_BLANK">Natural Language Generation Group @ Aberdeen</a></li>
				<li class="text"><a href="http://inf.abdn.ac.uk/research/tuna/"
					target="_BLANK">TUNA: Towards a UNified Algorithm for the
						Generation of Referring Expressions</a> (home of the TUNA Project)
					<li class="text"><a
						href="http://inf.abdn.ac.uk/research/babytalk/" target="_BLANK">BabyTalk:
							Generating Textual Summaries of Temporal Clinical Data</a> (home of
						the BabyTalk Project)</li>
					<li class="text"><a href="http://www.aclweb.org"
						target="_BLANK">Association for Computational Linguistics
							(ACL) </a></li>
					<li class="text"><a href="http://www.siggen.org"
						target="_BLANK">SIGGEN: ACL Special Interest Group in
							Generation</a></li>
			</ul> -->
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
