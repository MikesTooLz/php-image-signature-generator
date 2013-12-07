<?php

if (!isset($_POST['submit'])) {
    header('Location: /');
}

ob_start (); 

	$img = imagecreatefromjpeg('images/signature-background.jpg');
	$regular = 'fonts/Roboto-Regular.ttf';
	$bold = 'fonts/Roboto-Bold.ttf';
	$color = imagecolorallocate($img, 0, 0, 0);

	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$web = $_POST['web'];
	$title = $_POST['title'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$phone = 'T: ' . $_POST['phone'];
	$extension = $_POST['extension'];
	$fax = 'F: ' . $_POST['fax'];
	$email = $_POST['email'];

	if ($_POST['extension']) {
		$phone = $phone . ' / ' . $extension;
	}

	$name = $name . ' ' . $surname;

	imagettftext($img, 10, 0, 14, 116, $color, $regular, $address1);
	imagettftext($img, 10, 0, 73, 137, $color, $regular, $address2);
	imagettftext($img, 10, 0, 31, 158, $color, $bold, $web);
	imagettftext($img, 11, 0, 258, 58, $color, $bold, $title);
	imagettftext($img, 12, 0, 258, 85, $color, $regular, $name);
	imagettftext($img, 10, 0, 258, 116, $color, $regular, $phone);
	imagettftext($img, 10, 0, 258, 137, $color, $regular, $fax);
	imagettftext($img, 10, 0, 258, 158, $color, $bold, $email);

	imagejpeg($img);

	$image_data = ob_get_contents (); 

ob_end_clean ();

$image = base64_encode($image_data);
echo $image;

?>