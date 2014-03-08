<?php 
	require 'connect.php';

	$post = json_decode(json_encode($_POST));

	var_dump($post);

	if(isset( $post->fname,  $post->lname,  $post->ssn, $post->sex, $post->arskurs, $post->adress1, $post->city, $post->telnr1, $post->email )  && !empty($post->fname) && !empty($post->lname) && !empty($post->ssn) && !empty($post->sex) && !empty($post->arskurs) && !empty($post->adress1) && !empty($post->city) && !empty($post->telnr1) && !empty($post->email))
	{
		if(is_numeric(intval($post->ssn)) && (strlen($post->ssn) == 10 || strlen($post->ssn) == 12)){
			$checkpnr = mysql_query("SELECT * FROM medlemmar WHERE persnr='$post->ssn'");
			$checkpnr = mysql_num_rows($checkpnr);
			if($checkpnr == 0){
				if(filter_var($post->email, FILTER_VALIDATE_EMAIL)){
					if(!$post->telnr2){
						$post->telnr2 = "-";
					}
					if(!$post->adress2){
						$post->adress2 = "-";
					}
					$sql = "INSERT INTO medlemmar VALUES ('$post->fname', '$post->lname', '$post->ssn', '$post->email', '$post->arskurs', '$post->telnr1', '$post->adress2', '$post->adress1', '$post->city', '$post->telnr2', '$post->sex')";
					if(mysql_query($sql)){
						die('Du är nu medlem!');
					}else{
						die('Systemfel, kontakta administratören');
					}
				}else{
					die('Felaktig email');
				}
			}else{
				die('Du är redan medlem!');
			}
		}else{
			die('Felaktigt Personnummer (YYMMDDXXXX eller YYYYMMDDXXXX)');
		}
	}else
	{
		die('Fyll i alla fält');
	}
	die();
	/*$fname = 	mysql_real_escape_string($_POST['fornamn']);
	$lname = 	mysql_real_escape_string($_POST['efternamn']);
	$pnr = 		mysql_real_escape_string($_POST['persnr']);
	$email = 	mysql_real_escape_string($_POST['email']);
	$arskurs = 	mysql_real_escape_string($_POST['arskurs']);
	$telnr = 	mysql_real_escape_string($_POST['telnr']);
	$co = 		mysql_real_escape_string($_POST['co']);
	$adress = 	mysql_real_escape_string($_POST['adress']);
	$ort =		mysql_real_escape_string($_POST['ort']);
	$alttelnr = mysql_real_escape_string($_POST['alttelnr']);
	$kon = 		mysql_real_escape_string($_POST['kon']);


	if($co == null){
		$co = "-";
	}
	if($alttelnr == null){
		$alttelnr = "-";
	}

	mysql_query("SET NAMES 'utf8'");
	$sql = "INSERT INTO medlemmar VALUES ('$fname', '$lname', '$pnr', '$email', '$arskurs', '$telnr', '$co', '$adress', '$ort', '$alttelnr', '$kon')";
	$sql2= "SELECT * FROM medlemmar WHERE persnr='$pnr'";

	$checkpnr = mysql_num_rows(mysql_query($sql2));

	if($fname != null && $lname != null){
		if (is_numeric($pnr) && (strlen($pnr) == 10)) {
			if($checkpnr == 0){
				if(is_numeric($telnr)){
					if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
						if ($adress != null) {
							if ($ort != null) {
								if ($kon != "man" || $kon != "kvinna") {
									if (mysql_query($sql)) {
										die("Du är nu medlem!");
									}else{
										die("Final: " . mysql_error());
									}
								}else{
									die("Du måste välja kön!");
								}
							}else{
								die("Du måste fylla i ort!");
							}
						}else{
							die("Du måste fylla i adress!");
						}
					}else{
						die('Du måste fylla i din email!');
					}
				}else{
					die("Felaktigt telefonnr");
				}
			}else{
				die("Du är redan inskriven! "+ $checkpnr);
			}
		}else {
			die('Personnummer måste vara i YYMMDDXXXX-format!');
		}
	}else{
		die('Du måste fylla i förnamn/efternamn!');
	}*/
?>