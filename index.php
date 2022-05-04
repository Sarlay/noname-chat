
<!DOCTYPE HTML>
<link rel="stylesheet" href="truc.css" type="text/css" media="screen" />
<html>
    <head>
        <title>
NoName
        </title>
    </head>
    <body>
<?php
$user = "sarlay";
$password = getenv("MY_SQL_PASSWORD"); #REPLACE getenv("") with your password
$database = "messages";
$table = "messages";
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>Messages:</h2><ol>";
  foreach($db->query("SELECT * FROM $table") as $row) {
      
    echo "<li>" . $row['content'] . "</li>", "<text> écrit par: " . $row['username'] . "</text>";

  }
  echo "</ol>";
?>
    </body>
</html>


