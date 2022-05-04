<!DOCTYPE HTML>
<link rel="stylesheet" href="stylesheet.css" type="text/css" media="screen" />
<html>
    <head>
        <title>
        NoName Chat
        </title>
    </head>



    <body>

        <header class="header">
         
                <a class="website_title">N/A Chat</a>

        </header>
    <div class="messages_list">
      <h2>Messages:</h2>
      <?php
      $user = "sarlay";
      $password = "password"; #REPLACE getenv("") with your password
      $database = "messages";
      $table = "messages";
        $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
        echo "<ol>";
        foreach($db->query("SELECT * FROM $table") as $row) {
            
          echo "<li>" . $row['content'] .  "<text class='username'>" . $row['username'] . "</text>", "</li>";

        }
        echo "</ol>";
      ?>
    </div>
    <div>
    <h2>Add a new message:</h2>
        <form method="post">
          <input type="text" name="username">
          <input type="text" name="content">
          <button type="submit">Envoyer</button>
        </form>
    </div>
    </body>
</html>


