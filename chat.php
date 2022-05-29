<?php
include 'head.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <title>
        NoName Chat
        </title>
    </head>

    <body>

        <header class="header">

                <div><img src="nachat.svg" alt="noname_chat_logo" class="nonamechat_logo_send_page"></img><h4 class="logged_in_as_username">Nom d'utilisateur: <?php echo $_SESSION["username"]; ?></h4></div>
        </header>
    <h2>Messages:</h2>
    <div class="messages_list" id="message_list">

    </div>
    <div>
    <h2>Envoyer un message:</h2>
          <div><input type="text" required="required" class="input_content" autocomplete="off" id="input_content" name="content" placeholder="Contenu du message"></input><button class="hide_text" id="submit" onclick="sendMessage();"></button></div>
    </div>

    <script>
    document.getElementById("input_content")
        .addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
            document.getElementById("submit").click();
        }
    });
    </script>
    </script>
    </body>
</html>
