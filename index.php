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
      <iframe name="post_iframe" id="post_iframe" src="list.php">
      <?php
      include 'list.php';
      ?>
      </iframe>
    </div>
    <div>
    <h2>Envoyer un message:</h2>
        <form target="post_iframe" action="post.php" method="post">
          <input type="text" required="required" name="username" placeholder="Nom d'utilisateur"><br/><br/>
          <div><input type="text" required="required" class="input_content" name="content" placeholder="Contenu du message"></input><input class="hide_text" type="submit"></input></div>
        </form>
    </div>
    </body>
</html>
