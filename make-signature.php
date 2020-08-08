<?php

if (!isset($_POST['submit'])) {
    header('Location: /');
}

ob_start (); 

	$img = imagecreatefromjpeg('images/signature-background.jpg');
	$regular = 'fonts/Roboto-Regular.ttf';
	$bold = 'fonts/Roboto-Bold.ttf';

$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$green = imagecolorallocate($img, 0, 255, 0);
$red = imagecolorallocate($img, 255, 0, 0);
$grey = imagecolorallocate($img, 175, 175, 175);
$blue = imagecolorallocate($img, 0, 0, 150);

	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$web = $_POST['web'];
	$title = $_POST['title'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	
	$extension = $_POST['extension'];
	if ($_POST['desk']) {
		$desk = 'Desk: ' . $_POST['desk'];
	}
	if ($_POST['phone']) {
		$phone = 'Mobile: ' . $_POST['phone'];
	}
	
	$email = $_POST['email'];

	if ($_POST['extension']) {
		$desk = $desk . ' / ' . $extension;
	}

	$name = $name . ' ' . $surname;

	imagettfborder($img, 10, 0, 258, 90, $white, $regular, $address1, 2);
	imagettftext($img, 10, 0, 258, 90, $black, $regular, $address1);
	
	imagettfborder($img, 10, 0, 14, 65, $white, $regular, $address2, 2);
	imagettftext($img, 10, 0, 14, 65, $black, $regular, $address2);
	
	imagettfborder($img, 10, 0, 258, 110, $white, $bold, $web, 2);
	imagettftext($img, 10, 0, 258, 110, $blue, $bold, $web);
	
	imagettfborder($img, 11, 0, 14, 30, $white, $bold, $name, 2);
	imagettftext($img, 11, 0, 14, 30, $blue, $bold, $name);
	
	imagettfborder($img, 12, 0, 14, 50, $white, $regular, $title, 2);
	imagettftext($img, 12, 0, 14, 50, $black, $regular, $title);
	
	imagettfborder($img, 10, 0, 258, 136, $white, $bold, $email, 2);
	imagettftext($img, 10, 0, 258, 136, $blue, $bold, $email);
	
	imagettfborder($img, 10, 0, 258, 157, $white, $regular, $phone, 2);
	imagettftext($img, 10, 0, 258, 157, $black, $regular, $phone);
	
	imagettfborder($img, 10, 0, 258, 178, $white, $regular, $desk, 2);
	imagettftext($img, 10, 0, 258, 178, $black, $regular, $desk);


	imagejpeg($img);

	$image_data = ob_get_contents (); 

ob_end_clean ();

$image = base64_encode($image_data);
echo $image;

function imagettfborder($im, $size, $angle, $x, $y, $color, $font, $text, $width) {
	// top
	imagettftext($im, $size, $angle, $x-$width, $y-$width, $color, $font, $text);
	imagettftext($im, $size, $angle, $x, $y-$width, $color, $font, $text);
	imagettftext($im, $size, $angle, $x+$width, $y-$width, $color, $font, $text);
	// bottom
	imagettftext($im, $size, $angle, $x-$width, $y+$width, $color, $font, $text);
	imagettftext($im, $size, $angle, $x, $y+$width, $color, $font, $text);
	imagettftext($im, $size, $angle, $x-$width, $y+$width, $color, $font, $text);
	// left
	imagettftext($im, $size, $angle, $x-$width, $y, $color, $font, $text);
	// right
	imagettftext($im, $size, $angle, $x+$width, $y, $color, $font, $text);
	for ($i = 1; $i < $width; $i++) {
		// top line
		imagettftext($im, $size, $angle, $x-$i, $y-$width, $color, $font, $text);
		imagettftext($im, $size, $angle, $x+$i, $y-$width, $color, $font, $text);
		// bottom line
		imagettftext($im, $size, $angle, $x-$i, $y+$width, $color, $font, $text);
		imagettftext($im, $size, $angle, $x+$i, $y+$width, $color, $font, $text);
		// left line
		imagettftext($im, $size, $angle, $x-$width, $y-$i, $color, $font, $text);
		imagettftext($im, $size, $angle, $x-$width, $y+$i, $color, $font, $text);
		// right line
		imagettftext($im, $size, $angle, $x+$width, $y-$i, $color, $font, $text);
		imagettftext($im, $size, $angle, $x+$width, $y+$i, $color, $font, $text);
	}
}
?>
