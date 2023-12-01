<?php
require_once('db.php');

function user_login($username, $password){
    $conneciton = get_connection();
    $sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
    $result = mysqli_query($conneciton, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        return true;
    }else{
        return false;
    }
}

function create_user($user_data){
    $conneciton = get_connection();
    $sql = "INSERT INTO users (username, password, name, contact_no)
    VALUES ('{$user_data['username']}', '{$user_data['password']}', '{$user_data['name']}', '{$user_data['contact']}')";
    $result = mysqli_query($conneciton, $sql);
    return $result;
}

//check whether username already exists
function user_name_exists($username){

    $conneciton = get_connection();
    $sql = "SELECT username FROM users WHERE username = '{$username}'";
    $result = mysqli_query($conneciton, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1){
        return true;
    }else{
        return false;
    }

}




?>