<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
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
      ini_set('display_errors', 1);
      error_reporting(E_ALL);
      $user = "epiz_31661084";
      $server = "sql109.epizy.com";
      $password = ""; #REPLACE getenv("") with your password
      $database = "epiz_31661084_noname";
      $table = "messages";
        $db = new PDO("mysql:host=$server;dbname=$database", $user, $password);
        echo "<ol>";
        foreach($db->query("SELECT * FROM $table") as $row) { 
          echo "<li class='username'>" . $row['username'] . "</li>".  "<text class='message_line'>" . $row['content'] . "</text>";

        }
        echo "</ol>";
      ?>
    </div>
    <div>
    <h2>Add a new message:</h2>
        <form target="post_iframe" action="post.php" method="post">
          <input type="text" name="username" placeholder="Nom d'utilisateur"><br/><br/>
          <input type="text" name="content" placeholder="Contenu du message"><br/><br/>
          <button type="submit">Envoyer</button>
        </form>
        <iframe style="" name="post_iframe" id="post_iframe"></iframe>
    </div>
    </body>
</html>


