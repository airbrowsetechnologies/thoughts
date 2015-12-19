<!DOCTYPE html>
<html>

<head>
    <title>Thoughts</title>
    <link href="main.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--script src="comment.js"></script-->
    <!--script src="main.js"></script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style>

    </style>
</head>

<body>
    <div id="main-comments">
        <?php 
        $filename = "comments.txt";
        $myfile = fopen($filename, "r") or die("Unable to load comments!");
        
        $readfile;
       if (is_readable($filename) && filesize($filename)) {
        try {
          $readfile = fread($myfile,filesize($filename));
        } catch (Exception $e) {
        }
       }

        if (empty($readfile)){
          echo '<div class="commentmain">No comments posted yet. Be the first!</div>';
        }


        $commarray = explode(PHP_EOL,$readfile);
        for ($i = count($commarray) - 1; $i >= 0; $i--) {
          if (empty($commarray[$i])) {
            continue;
          } else {
          $carr = explode('|',$commarray[$i]);
          $comment = $carr[0];
          $name = $carr[2];
          $email = $carr[1];
          $datestr = $carr[3];
          echo '<div class="commentmain"><div class="commentname">' . $name. ' said...</div><div class="commentdate">' . $datestr . '</div><br>' . $comment .'</div>';
          }
        }
            
        fclose($myfile);
        ?>
    </div>
</body>

</html>