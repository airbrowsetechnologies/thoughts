# Thoughts
An open source comments system written in PHP/AJAX
Made by AirBrowse Technologies

### Main Files 
<hr>
**addcomment.php** - Used to make AJAX calls to add a comment

**comments.html - main file. Contains comments as well as the form to add a comment. Put this in an iFrame to embed Thoughts**

**comments.txt** - comment storage *NOTE: In your web server, make sure that the permissions on this file are 6,0,0 (which protects it from being read directly)*

**index.php** - Returns the styled comment list. This is embedded in comments.html.

**users.txt** - user storage for tagging  *NOTE: In your web server, make sure that the permissions on this file are 6,0,0 (which protects it from being read directly)*

**getusers.php** - Returns a list of users (called through AJAX)


### Project Guidelines / Features
<hr>
Modern, materialish design

Simple, ease of use

Easy to embed

User tagging based on "@" + usernames (i.e. @Fred)

**FUTURE: Send an email to the admin with comment for validation, who then can accept or reject the comment. If comment is accepted, call addcomment.php from email**



Please leave credit where credit is due.
AirBrowse Technologies 2015
