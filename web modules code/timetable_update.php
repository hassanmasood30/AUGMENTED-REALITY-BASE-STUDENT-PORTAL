<?php

$aname = $_POST['aname']; //session_id (eg: FA16)
$bname = $_POST['bname']; //program_id (eg: bcs)
$cname = $_POST['cname']; //section
$dname = $_POST['dname']; //course_id (e.g: 111)
$ename = $_POST['ename']; //day_id
$fname = $_POST['fname']; //room_id
$gname = $_POST['gname']; //slot_id


$db_username = 'root';
$db_password = '';
$dsn = 'mysql:host=localhost;dbname=test';


try
{
    $sql = "UPDATE `timetable` SET `room_id`='$fname',`slots_id`='$gname',`day_id`='$ename' WHERE 'section' ='$cname' and 'course_id' = '$dname'";
    $db = new PDO($dsn, $db_username, $db_password);

    $row = $db->exec($sql);
    if($row){
    header('location:New Rec7.php');
    }
    else{
        header('location:FAKE REC.php');  
    }
}
catch(Exception $e){
    $err = $e->getMessage();
}


if(isset($err)){
    echo $err;
}
  ?>