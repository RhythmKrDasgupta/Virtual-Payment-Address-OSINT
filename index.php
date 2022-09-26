<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UPI checker</title>
</head>

<body>

<table>
<form action="" method="post">
<tr>
<td> Enter Phone Number: </td><td><input type="text" name="name"></td>
</tr>

<tr>
<td><input name="submit" type="submit" /></td></tr>

</form>
</table>

<?php
 if (isset($_POST['submit'])) {
 $NAME = $_POST["name"];
  echo "UPI lookup : ". $NAME .'</br></p>';
}


$arr = array();
$arr[0] =$NAME ."@ybl";
$arr[1] =$NAME ."@apl";
$arr[2] =$NAME ."@ybl";
$arr[3] =$NAME ."@oksbi";
$arr[4] =$NAME ."@okhdfcbank";
$arr[5] =$NAME ."@axl";
$arr[6] =$NAME ."@paytm";
$arr[7] =$NAME ."@ibl";
$arr[8] =$NAME ."@upi";
$arr[9] =$NAME ."@icici";
$arr[10] =$NAME ."@sbi";
$arr[11] =$NAME ."@kotak";
$arr[12] =$NAME ."@postbank";
$arr[13] =$NAME ."@axisbank";
$arr[14] =$NAME ."@okicici";
$arr[15] =$NAME ."@okaxis";
$arr[16] =$NAME ."@dbs";
$arr[18] =$NAME ."@barodampay";
$arr[19] =$NAME ."@idfcbank";
$arr[20] =$NAME ."@ybl";


foreach ($arr as $value) {
    #echo "$value <br>";
    $url = "https://upibankvalidator.com/api/upiValidation?upi=".$value;

	$cURL = curl_init();
	curl_setopt($cURL, CURLOPT_URL,$url);
	curl_setopt($cURL, CURLOPT_HEADER,false);
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($cURL, CURLOPT_POST, true);
	curl_setopt($cURL, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($cURL);
	curl_close($cURL);
	#echo "<p> $value: $response </p>";

	$obj = json_decode($response); 
	$dis = $obj->isUpiRegistered;
	$nam = $obj->name;

	if ($dis == 1) {	
	  echo "<p> UPI address: $value, Banking Name: $nam </p>";
	}

}



 ?>

</body>
</html>
