<?php 
	require 'connect.php';

	$post = json_decode(json_encode($_POST));

	var_dump($post);
	foreach($post->data as $field){
		$name = $field->name;
		$val = $field->value;

		$sql = mysql_query("INSERT INTO medlemmar2 ('".$name."') VALUES('".$val."')");
		if(!$sql){
			echo "Failed.";
			break;
		}
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