<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tes2</title>
</head>
<body>
	<script>
		<?php 
			$abcd= [1,2,3,4];
		?>
		//Array 1 dimensi
		var ar = <?php echo '["' . implode('", "', $abcd) . '"]' ?>;

		//Array 2 dimensi
		<?php
			$sampleArray = array(
			        0 => "Geeks", 
			        1 => "for", 
			        2 => "Geeks", 
			);
		?>
		var passedArray = <?php echo json_encode($sampleArray); ?>

	</script>
</body>
</html>