<?php
include "db.php";

$user = new db();

// $user = $user->select("password, email", "users")->where("id", "=", "3")->andWhere("name","=","sara8")->getRow();
// echo "<pre>";

// print_r($user);

// echo "</pre>";


//-------=======================Insert & Update=======================
$data = [
    'name' => "Ahmed123",
    'email' => "ahmed@gmanil.com",
    'password' => 12345
];

echo $user->update_insert("users", $data,"update")->where("id", "=", 8)->exec();


// =========================== Delete ========

// echo $user->delete("users")->where("id","=","2")->exec();