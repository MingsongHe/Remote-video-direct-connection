<!-- This php script accepts the base 64 encoded image string that consists of -->
<!-- the strings of 30 images, separated by a '*' -->

<!-- The script splits up the string into its 30 parts and decodes each of the  -->
<!-- strings into an image -->

<!-- It then stores each of the 30 images with a different name (using frame number) -->
<!-- in our /images directory -->
<!--
此 php 脚本接受 base 64 编码的图像字符串，该字符串由 30 个图像的字符串组成，由“*”分隔
该脚本将字符串分成 30 个部分，并将每个字符串解码为一个图像，然后将 30 个图像中的每一个以不同的名称（使用帧编号）存储在我们的 /images 目录中
-->
<?php

	$encodedString = str_replace(' ','+',$_POST['image']);
	$decoded_array = explode("*", $encodedString);             # explode() 函数将一个字符串转换为一个数组
/*	
	// Splitting the string between the '*'
	// Each of the strings are in an array
	// We take each element, decode it, and store it through a temporary image file
    在'*'之间拆分字符串每个字符串都在一个数组中我们获取每个元素，对其进行解码并通过临时图像文件存储它
*/	
	$count = 0;
	foreach($decoded_array as $imd)
	{
		$decoded = base64_decode($imd);
		$decoded = imagecreatefromstring($decoded);
		imagejpeg($decoded, "temp.jpeg");
		copy("temp.jpeg","iot_images/webcam_base64_".$count.".jpeg");
		$count+=1;
	}
?>