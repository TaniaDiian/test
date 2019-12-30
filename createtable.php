<?php

include 'config.php';
$tableName = 'users';
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
        uid INT(6) UNSIGNED PRIMARY KEY,
        firstName VARCHAR(30) NOT NULL,
        lastName VARCHAR(30) NOT NULL,
        birthDay  date  NOT NULL,
        dateChange date  NOT NULL,
        description LONGTEXT,
        UNIQUE (uid)
)";
$link = mysqli_connect($host, $user, $password, $database);
if ($link->query($sql) !== TRUE) {
    echo "Error creating table: " . $link->error;
} else {
    echo "Table created";
}

exit();