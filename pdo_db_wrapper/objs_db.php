<?php

include "database.php";

/* ======================== Insert =======================*/

// $db = new Database();
// $db->query("INSERT INTO users (name, email) VALUES (:name, :email)");
// $db->bind(':name', 'John Doe');
// $db->bind(':email', 'johndoe@example.com');
// $db->execute();
// echo "Inserted ID: " . $db->lastInsertId();



/* ======================== Update =======================*/


// $db->query("UPDATE users SET email = :email WHERE id = :id");
// $db->bind(':email', 'newemail@example.com');
// $db->bind(':id', 1);
// $db->execute();
// echo "Updated Rows: " . $db->rowCount();




/* ======================== Delete =======================*/


// $db->query("DELETE FROM users WHERE id = :id");
// $db->bind(':id', 1);
// $db->execute();
// echo "Deleted Rows: " . $db->rowCount();





/* ======================== Select Single Record  =======================*/


// $db->query("SELECT * FROM users WHERE id = :id");
// $db->bind(':id', 1);
// $user = $db->single();
// print_r($user);



/* ======================== Select Multiple Record  =======================*/


// $db->query("SELECT * FROM users");
// $users = $db->resultSet();
// foreach ($users as $user) {
//     echo $user['name'] . "<br>";
// }

