<?php
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $myfile = fopen("comments.txt", "a") or die("Unable to open file!");
        $txt    = str_replace('|', '', htmlspecialchars($_POST['comment']));
        $email  = str_replace('|', '', htmlspecialchars($_POST['email']));
        $name   = str_replace(' ','',str_replace('|', '', htmlspecialchars($_POST['name'])));
        $alltxt = $txt . "|" . $email . "|" . $name . "|" . date("F d, Y");
        if (empty($txt) || empty($name) || empty($email)) {
            echo "You cannot have a blank field!";
            http_response_code(500);
        } else {
           //Continue posting comment
            
            
            $filename = "users.txt";  //open user file
            if (is_readable($filename) && filesize($filename)) {
                try {
                    $myjsonfile = fopen($filename, "r+");  //was JSON at one point, just ignore
                    $readfile   = fread($myjsonfile, filesize($filename));
                    $users      = array_map('strtolower', explode(PHP_EOL,$readfile)); //all lowercase to remove case sensitivity
                    $lcusername = strtolower($name); //lower case username
            
                    
                    $words = explode(' ',$txt); //split into words
                    for ($i = 0;$i < count($words);$i++) { //loop through words
                    	if (strpos($words[$i],'@') == 0) { //word is a tag!
                    	    $taggedname = strtolower(str_replace('@','',$words[$i])); //remove '@' symbol
                    	    for ($i2=0;$i2<count($users);$i2++){ //loop through usernames
                    	    	if (explode('|',$users[$i2])[0] == $taggedname) { //see if taggedname is a username
                    	    	    $taggedemail = explode('|',$users[$i2])[1]; 
                    	    	    $sitename = "Thoughts"; //CHANGE FOR YOUR SITE
                    	    	    $siteurl = "http://airbrowse.x10host.com/projects/thoughts";
                    	    	    $subject = "Yo