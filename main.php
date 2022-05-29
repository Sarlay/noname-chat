<?php
session_start();
class Chat{
    private $user = "sarlay";
    private $password = "ANYI1v7%Cm-]%8C0<0*yDx~o:<OD%L";
    private $server = "localhost";
    private $database = "data";
    private $table = "messages";
    private $dbConnect = false;

    public function __construct(){ // initilaise the database 
      if(!$this->dbConnect){
        $db = new PDO("mysql:host=$this->server;dbname=$this->database", $this->user, $this->password);
        if($db){
            $this->dbConnect = $db;
        } else {
            die("error");
        }
      }
    }



  function insertChat($message_username, $chat_message) {
    echo "received insert main !!";
    if (isset($message_username) && isset($chat_message) && $message_username !== "" && $chat_message !== "" ) {
        $exec = $this->dbConnect->prepare("INSERT INTO messages (content, username) VALUES(?,?)");
        $exec->execute(array($chat_message,$message_username));
        if($exec){
            echo "ok"; #  everyting is fine
        } else {
            echo ('Error in query: '. mysqli_error());
        }
    } else {
      echo "not enough arguments !!! username:", $account_username, " password : ", $account_password;
    }
  }

  function list_messages() {
        $db = new PDO("mysql:host=$this->server;dbname=$this->database", $this->user, $this->password);
        $message_list = "<ul id='ul_messages_list'>";
        foreach($db->query("SELECT * FROM $this->table") as $row) {
          $message_list .= "<li><text class='username'>" . $row['username'] . ": </text>".  "<text class='message_line'>" . $row['content'] . "</text></li>";
        }
        $message_list .= "<li id='last_li'></li>";
        $message_list .= "</ul>";
    	  return $message_list;
  }

  function create_account($account_username, $account_password) {
    if (isset($account_username) && isset($account_password) && $account_username !== "" && $account_password !== "" ) {
        $account_password_hashed = password_hash($account_password, PASSWORD_DEFAULT);
        $exec = $this->dbConnect->prepare("INSERT INTO users (username, password) VALUES(?,?)");
        $exec->execute(array($account_username, $account_password_hashed));
        if($exec){
            $_SESSION["username"] = $account_username;
            header("HTTP/1.1 200 OK");
        } else {
            echo ('Error in query: '. mysqli_error());
            header("HTTP/1.1 406 Not Acceptable");
        }
    } else {
      header("HTTP/1.1 406 Not Acceptable");
      echo "not enough arguments !!! username:", $account_username, " password : ", $account_password;
    }
  }

  function login_account($account_username, $account_password) {
    if (isset($account_username) && isset($account_password) && $account_username !== "" && $account_password !== "" ) {
        $exec = $this->dbConnect->prepare("SELECT password FROM users WHERE username = (?) LIMIT 1");
        $exec->execute([$account_username]);
        $hashed_password = $exec->fetchColumn();
        if (password_verify($account_password, $hashed_password)) {
            $_SESSION["username"] = $account_username;
            header("HTTP/1.1 200 OK");
        } else {
            header("HTTP/1.1 401 Unauthorized");
        }
    } else {
        header("HTTP/1.1 401 Unauthorized");
    }
  }
}
?>
