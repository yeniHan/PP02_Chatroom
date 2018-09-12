<!-- <?php
$json = file_get_contents("php://input"); 
$assArr = json_decode($json, true);
$user_id = $assArr["user_id"];
$lastMsgId = $assArr["lastMsgId"];

if( isset($json) && ( $user_id !== "") && ($lastMsgId >= 0)){
    try{
        $dataConn = new PDO("mysql:host=localhost;dbname=chatroom;", "root", "");
        $sql = "UPDATE `users` SET `lastMsgId` = :lastMsgId WHERE `user_id` = :user_id";
        $sta = $dataConn -> prepare($sql);
        $sta -> execute([":lastMsgId" => $lastMsgId, ":user_id" => $user_id]);

		$dataConn = null;
		$sta = null;
			
    }catch(PDOException $e){
        echo "ERROR: PDO Exception. Failed to store the log_out data of the user.";
    }
}else{
    echo "ERROR: Failed to store the log_out data of the user.";    
}

?>
