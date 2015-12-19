<?php
$myfile = fopen("comments.txt", "r") or die("Unable to open file!");
$readfile = fread($myfile,filesize("comments.txt"));
echo $readfile;
?>