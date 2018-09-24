<?php

require_once __DIR__ . '/models/DB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $array = $_POST;

    foreach ($array as $a) {

        //print_r($a[1]['name']);

        $count = count($a);

        for ($i = 0; $i < $count; $i++) {

            $link = DB::getInstance()->connect();

            $createdAt = date('Y-m-d H:m:s');

            $name = $link->real_escape_string(trim($a[$i]['name']));
            $surname = $link->real_escape_string(trim($a[$i]['surname']));
            $email = $link->real_escape_string(trim($a[$i]['email']));
            $birthday = $link->real_escape_string(trim($a[$i]['birthday']));
            $crtdAt = $link->real_escape_string($createdAt);

            $query = "INSERT INTO insurers (name, surname, email, birthday, created_at) "
                    . "VALUES ('$name',"
                    . " '$surname',"
                    . " '$email',"
                    . " '$birthday', "
                    . "'$crtdAt')";

            $result = $link->query($query);
        }

        echo "You have successfully added insurers";

        $link->close();
    }
}

