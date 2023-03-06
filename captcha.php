<?php
	session_start();
	
	$random = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
	
	$_SESSION['captcha'] = $random;
	
	$captcha = imagecreatefromjpeg("imgs/cap/la.jpg");
	$color = imagecolorallocate($captcha, 0, 0, 0);
	$font = realpath('fonts/Rambutan Days.ttf');
	imagettftext($captcha, 20, 2, 50, 30, $color, $font, $random );
	imagepng($captcha);
	imagedestroy($captcha);
?>