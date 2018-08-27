<html>
<head></head>
<body>
	<form method="post" action="/Projects/SubmitHtmlTextLoad/index.php">
		<textarea name="htmlText" style="width:500px;height:300px;"></textarea>
		<button type="submit" name="indexPostSubmit">Submit</button>
	</form>
	<div style="background-color:lightgray;color:black;width:500px;height:300px;">
	<?php 
		//error_reporting(0);
		$htmlText = $_POST["htmlText"];
		echo $htmlText;
	?>
	</div>
</body>
</html>