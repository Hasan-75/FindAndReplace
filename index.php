<?php
	
	require 'findAndRep.php';

	$finalText = "";
	function searchAndReplace(){
		global $finalText;
		return findAndReplace($finalText);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Find|Replace</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container-fluid col-lg-9 col-md-10 col-sm-12 align-self-center" style="background-image: url('img/frame.png'); background-repeat: no-repeat; height: 600px; background-size: 35% 100%; background-position: center;">
		<div class="container col-4 pt-5">
			<h3><?php echo searchAndReplace(); ?></h3>
			<hr>
			<form action="./index.php" method="post">
				<div class="form-group row">
					<!--label for="text" class="col-2">Text:</label-->
					<textarea name="text" class="form-control offset-1 col-10" rows="8" placeholder="Text..."><?php echo $finalText; ?></textarea>
				</div>
				<div class="form-group row">
					<!--label for="searchText" class="col-2">Search:</label-->
					<input type="text" name="searchText" placeholder="Search" class="form-control offset-1 col-10" value="<?php echo $searchText; ?>">
				</div>
				<div class="form-group row">
					<!--label for="replaceText" class="col-2">Replace:</label-->
					<input type="text" name="replaceText" placeholder="Replace" class="form-control offset-1 col-10" value="<?php echo $replaceText; ?>">
				</div>
				<button type="submit" class="btn btn-primary form-group align-items-center ml-3">Search & Replace</button>
			</form>
		</div>
	</div>

</body>
</html>