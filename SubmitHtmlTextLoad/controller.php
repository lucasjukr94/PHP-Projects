<?php
if(isset($_POST["indexPostSubmit"])){
	$Home = new HomeController;
	$Home->indexPost($_POST["htmlText"]);
}
class BaseController{
	
}

class HomeController extends BaseController{
	function indexGet(){
	
	}

	function indexPost(htmlText){
		header("Location: http://www.yourwebsite.com/user.php");
		exit();
	}
}
?>