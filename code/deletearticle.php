<?php
session_start();
include("config.php");
include("lib/db.php");

$aid = $_GET['aid'];
#echo "aid=".$aid."<br>";

//add role base access control (RBAC)
//get the article info
$result = get_article($dbconn, $aid);
$articleInfo = pg_fetch_array($result,0);

//get the current role info
$userResult = get_author($dbconn, $_SESSION['id']);
$userInfo = pg_fetch_array($userResult, 0);
//echo "Current role: ". $userInfo['role']. "<br>";

//if current role is admin -> delete, not current role -> article author id == current user ID
if ($userInfo['role'] == "admin"){
    delete_article($dbconn, $aid);
}else{
    if($articleInfo['id'] == $_SESSION['id']){
        delete_article($dbconn, $aid);
    }else{
        //echo "you are not authorize to do the action";
    }
}

//----add activity to log
$content = "username: " . $_SESSION['username'] . "  delete article. Article title: " . $articleInfo['title'];
addLog($dbconn, "delete article", $content);

//$result = delete_article($dbconn, $aid);
#echo "result=".$result."<br>";
# Check result
header("Location: /admin.php");

?>
