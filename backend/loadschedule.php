<?php  
	header("Access-Control-Allow-Origin: *");
	if(isset($_POST['pnr']) && isset($_POST['period'])){
		$pnr = $_POST['pnr'];
		$period = $_POST['period'];
		$day = $_POST['day'];

		$url = "http://www.novasoftware.se/ImgGen/schedulegenerator.aspx?format=png&schoolid=85420/sv-se&type=3&id=".$pnr."&period=".$period."&week=&mode=0&printer=0&colors=1&head=1&clock=1&foot=1&day=".$day."&width=500&height=800&count=1&decrypt=0";
	}
?>

<br><img src="<?php echo $url ?>">