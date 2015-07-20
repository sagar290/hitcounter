<?php

require 'connect.inc.php';


 $user_ip = $_SERVER['REMOTE_ADDR'];

function ip_exists($ip){
    global $user_ip;
    $query = "SELECT `ip` FROM `hits_ip` WHERE `ip` = '$user_ip'";
    $query_run = mysql_query($query);
    $query_num_rows = mysql_num_rows($query_run);
    if($query_num_rows == 0) {
        return false;
    } else if($query_num_rows >= 1) {
        return true;
    }
    
}


function ip_add($ip) {

    $ipquery = "INSERT INTO `hits_ip` VALUES ('$ip')";
    $ipquery_run = mysql_query($ipquery);

}



function update_cunt() {

    $query = "SELECT `count` FROM `hits_count`";
    if(@$query_run = mysql_query($query)) {
       $count = mysql_result($query_run, 0, 'count');
       $count_inc = $count + 1;
        
        $query_update = "UPDATE `hits_count` SET `count` = '$count_inc' ";
        if ($query_update = mysql_query($query_update)) {
            echo '
            
            <h4>total view : '. $count_inc .'</h4>
            
            ';
        }
    }

}



if(!ip_exists($user_ip)) {

    update_cunt();
    ip_add($user_ip);


}else {
    echo 'your ip address is allready in  our database';
}


?>

<h1>My website</h1>



















