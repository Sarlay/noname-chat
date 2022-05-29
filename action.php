<?php
// this file is a bridge between script.js and main.php
session_start();
include ('main.php'); // integrates with main.php, where functions are stored
$chat = new Chat();

if($_POST['action'] == 'add_message') {
	echo "received action.php using username", $_SESSION["username"];
	$chat->insertChat($_SESSION["username"], $_POST['content']);
}
if($_POST['action'] == 'update_user_chat') {
	$conversation = $chat->list_messages();
	$data = array(
		"conversation" => $conversation
	);
	echo json_encode($data);
}
if($_POST['action'] == 'create_account') {
	$chat->create_account($_POST["username"], $_POST["password"]);
}
if($_POST['action'] == 'login_account') {
	$chat->login_account($_POST["username"], $_POST["password"]);
}
?>
