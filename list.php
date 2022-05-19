<html>
<link rel="stylesheet" href="stylesheet.css"/>

<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  $user = "epiz_31661084";
  $server = "sql109.epizy.com";
  $password = "";
  $database = "epiz_31661084_noname";
  $table = "messages";
    $db = new PDO("mysql:host=$server;dbname=$database", $user, $password);
    echo "<ol>";
    foreach($db->query("SELECT * FROM $table") as $row) { 
      echo "<li><text class='username'>" . $row['username'] . "</text></li>".  "<text class='message_line'>" . $row['content'] . "</text>";

    }
    echo "</ol>";
?>
</html>
