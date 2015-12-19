<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $myfile = fopen("users.txt","r");
 $users = explode(PHP_EOL,fread($myfile,filesize("users.txt")));
  for ($i = 0; $i < count($users); ++$i) {
    $users[$i] = explode('|',$users[$i])[0];
    echo $users[$i] . "\r\n";
  }
} else {
 exit("Invalid request");
}
?>