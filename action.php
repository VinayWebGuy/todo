<?php
require "config.php";
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['action']) || $_GET['action']){
    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    else{
        $action = $_GET['action'];
    }
    if($action == "add-task"){
        if(isset($_POST['task']) && isset($_POST['type'])){
            $task = mysqli_real_escape_string($conn, $_POST['task']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $date = date('Y-m-d H:i:s');
            $res = mysqli_query($conn, "INSERT INTO todos (task, type, date) VALUES ('$task','$type','$date')");
            echo "Done";
        }
    }
    else if($action == "update-task"){
        if(isset($_POST['task']) && isset($_POST['type'])){
            $id = $_POST['id'];
            $task = mysqli_real_escape_string($conn, $_POST['task']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $date = date('Y-m-d H:i:s');
            $res = mysqli_query($conn, "UPDATE todos set task = '$task', type = '$type', date = '$date' where id = '$id'");
            echo "Done";
        }
    }
    else if($action == "blocks") {
        $res = mysqli_query($conn, "SELECT * FROM todos WHERE status = 1 ORDER BY date DESC");
        $rows = array(); // Initialize an array to store all rows
        while ($row = mysqli_fetch_assoc($res)) {
            $rows[] = $row; // Add each row to the array
        }
        echo json_encode($rows); // Encode the whole array as JSON
    }
    else if($action == "move") {
        if(isset($_POST['id']) && $_POST['type']){
            $type = $_POST['type'];
            $id = $_POST['id'];
            $on = "";
            if($type == "i") $on = "initial";
            else if($type == "p") $on = "progress";
            else if($type == "c") $on = "completed";
            $date = date('Y-m-d H:i:s');
            $res = mysqli_query($conn, "UPDATE todos SET type = '$on', date='$date' where id = '$id'");
            echo "Done";
        }
    }
    else if($action == "edit") {
        $id = $_GET["id"];
        $res = mysqli_query($conn, "SELECT * FROM todos WHERE id = '$id'");
        $row = mysqli_fetch_assoc($res);
        echo json_encode($row);
    }
    else if($action == "delete") {
        $id = $_GET["id"];
        $res = mysqli_query($conn, "DELETE FROM todos WHERE id = '$id'");
        echo "Done";
    }
}
?>