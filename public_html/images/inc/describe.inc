		<?php
		echo "<h1>" . $Data[0] . "</h1>";
		// f the two objects are the same, number them
		$o1 = trim($Data[3]);
		$o2 = trim($Data[8]);
		$o1_mt = $TYPES [$o1] [0];
		$o1_mt_gen = $TYPES [$o1] [1];
		$art1_mt = $TYPES [$o1] [2];
		$o2_mt = $TYPES [$o2] [0];
		$o2_mt_gen = $TYPES [$o2] [1];
		$art2_mt = $TYPES [$o2] [2];
		
		if ($o1_mt == $o2_mt) {
			$o1_mt = $o1_mt . "_1";
			$o2_mt = $o2_mt . "_2";
		}
		
		$Data [3] = $o1_mt;
		$Data [8] = $o2_mt;
		
		$verb = "jinsab";
		
		if ($o1_mt_gen == "fem") {
			$verb = "tinsab";
		}
		
		$imgfile = $IMAGE_DIR . "/" . $Data [0];
		?>

<div class="col-md-6">
	<h2 style="color: blue">Ħares sew lejn iż-żewġ oġġetti mmarkati f'din
		l-istampa.</h2>
	<!-- Define Canvas -->
	<canvas id="myCanvas" width="<?= $CANVAS_WIDTH ?>"
		height="<?= $CANVAS_HEIGHT ?>"
		style="border: 0px solid #000000; background-color: #333"> </canvas>
</div>


<div class="col-md-5">
	<h2 style="color: blue">Agħżel l-aħjar kelma għaż-żewġ oġġetti</h2>

	<form method="post" id="prepform" action="index.php" class="form-inline">
				<input type="hidden" name="subject" value="<?=$subject?>"/>
				<input id="page" type="hidden" name="page" value="experiment"/>
				<input type="hidden" name="imageid" value="<?=$imageid?>"/>
				
				<div class="form-group">
				<?php shuffle($PREPS); array_unshift($PREPS,'Agħżel waħda')?>
				<label><?=ucfirst($o1_mt)?> <?=$verb?>
				<select class="form-control" id="preposition" name="preposition" required>					
					<?php foreach($PREPS as $p):?>
						<option><?=$p?></option>
					<?php endforeach ?>					
				</select>
				<?=$o2_mt?>
				</label>
				</div>
				<br/>
				 
				<br /> <br /> 
		
		<input type="submit" class="btn btn-primary" value="ara stampa oħra"></input> 
		<input type="submit" class="btn btn-primary" value="ieqaf hawn" onClick="document.getElementById('page').value='terminate'"></input>
	</form>

</div>


<script>
<!-- Pass the Data array to the js function as a json-encoded object -->
	window.onload = drawPic("<?php echo $imgfile ?>", <?php echo json_encode($Data) ?>, <?php echo $CANVAS_WIDTH ?>);
</script>

