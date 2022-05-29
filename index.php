<?php
include 'head.php';
?>
<html style="">
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <title>
        NoName Chat - login
        </title>
    </head>
<body style="height: 100%;">
  <div style="text-align: center;">
    <img src="nachat.svg" alt="noname_chat_logo" class="nonamechat_logo"></img>
	 <h1 style="text-align: center;">Acceder à votre compte N/A chat</h1>
  </div>
  <br/>
	<div class="div-account">
	<input class="input-account" autocomplete="false" placeholder="Nom d'utilisateur" id="account_username"></input>
	<input class="input-account" autocomplete="false" title="votre mot de passe est enregistré de façon sécurisée, nous n'avons pas accès à votre mot de passe" type="password" placeholder="Mot de passe" id="account_password"></input>
	<button class="account_interaction" onclick="loginAccount();">Login</button> <button class="account_interaction" onclick="registerAccount();">Register</button>
	</div>

<div class="github-div" style="text-align: center; margin-top: 10%; bottom: 2px;">
   N/A chat est open-source ! <img src="github.svg" alt="github_logo" title="Voir le code source" onclick="window.open('https://github.com/Sarlay/noname-chat', '_blank');"></img>
</div>
</body>
</html>
