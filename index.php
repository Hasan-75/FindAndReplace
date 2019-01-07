<?php
	
	require 'findAndRep.php';
    require 'download_file.php';

	$finalText = "";

	function searchAndReplace(){
		global $finalText;
		return findAndReplace($finalText);
	}

	if(isset($_POST['downloadBtn'])){
	    download_file();
	    //sleep(2);
	    //header("Location: ./index.php");
    }
    else{
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

	<div class="container-fluid col-lg-3 col-md-5 col-sm-11 col-11 align-self-center" style="height: 700px; background-size: 100% 100%; background: url(./img/frame.png) no-repeat center;">
		<div class="container col-12 pt-5">
			<p class="pt-5 mb-0"><?php echo searchAndReplace(); ?></p>
            <?php include_once 'upload_form.php'; ?>
			<hr>
			<form action="./index.php" method="post">
				<div class="form-group row">
					<!--label for="text" class="col-2">Text:</label-->
                    <?php
                    if($st==1){
                        $txt = readTxtFromFile();
                        echo '<textarea name="text" class="form-control offset-1 col-10" rows="5" placeholder="Text...">'.$txt.'</textarea>';
                    }else{
                        echo '<textarea name="text" class="form-control offset-1 col-10" rows="5" placeholder="Text...">'.$finalText.'</textarea>';
                    }
                    ?>
				</div>
				<div class="form-group row">
					<!--label for="searchText" class="col-2">Search:</label-->
					<input type="text" name="searchText" placeholder="Search" class="form-control offset-1 col-10" value="<?php echo $searchText; ?>">
				</div>
				<div class="form-group row">
					<!--label for="replaceText" class="col-2">Replace:</label-->
					<input type="text" name="replaceText" placeholder="Replace" class="form-control offset-1 col-10" value="<?php echo $replaceText; ?>">
				</div>
				<button type="submit" class="btn btn-primary btn-sm form-group align-items-center ml-3">Search & Replace</button>
                <button type="submit" class="btn btn-dark form-group btn-sm align-items-center ml-3" name="downloadBtn">Download</button>
			</form>
            <?php
            echo '<b>'.$status[$st].'</b>';
            ?>
		</div>
	</div>
</body>
</html>