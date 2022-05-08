<link rel="stylesheet" href="stylesheet.css"/>
 <?php
$user = "epiz_31661084";
$password = "";
$database = "epiz_31661084_noname";
$table = "messages";
$server = "sql109.epizy.com";
$db = new PDO("mysql:host=$server;dbname=$database", $user, $password);


# only allow letters and numbers
$message_username=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST["username"]); # Prevents sql injection through regex
$message_content=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST["content"]); # Prevents sql injection through regex


$exec = $db->prepare("INSERT INTO messages (content, username) VALUES(?,?)");
$exec->execute(array($message_content,$message_username));

if($exec){
    echo "Message envoyé avec succès";
}else{
    echo "Ca beug";
}
