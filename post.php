<link rel="stylesheet" href="stylesheet.css"/>
 <?php
$user = "epiz_31661084";
$password = "nonameNSI2";
$database = "epiz_31661084_noname";
$table = "messages";
$server = "sql109.epizy.com";
$db = new PDO("mysql:host=$server;dbname=$database", $user, $password);


# only allow letters and numbers and symbols
$filter = "/[^a-zA-Z0-9ç?!. ]+/";
$message_username=preg_replace($filter, "", $_POST["username"]); # Prevents sql injection through regex
$message_content=preg_replace($filter, "", $_POST["content"]); # Prevents sql injection through regex

if(isset($_POST['username']) && isset($_POST['content'])) {
    $exec = $db->prepare("INSERT INTO messages (content, username) VALUES(?,?)");
    $exec->execute(array($message_content,$message_username));

    if($exec){
        include 'list.php';
    } else {
        echo "Ca beug";
    }
}
