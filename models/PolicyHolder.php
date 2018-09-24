<?php

class PolicyHolder {

    /**
     * @return array Array of associative arrays that represent rows
     */
    public function fetchAll() {

        $link = DB::getInstance()->connect();

        $query = "SELECT `policy_holders`.`id`, 
                  CONCAT(`policy_holders`.`name`, ' ', `policy_holders`.`surname`) as policy_holder,
                 `policy_holders`.`email`, `policy_holders`.`phone`,
                 `policy_holders`.`policy` as type_of_travel,
                 `policy_holders`.`departure_date`, `policy_holders`.`return_date`,
                  CONCAT(`insurers`.`name`, ' ', `insurers`.`surname`) as insurers_group, 
                 `policy_holders`.`created_at`
                  FROM `policy_holders`
                  LEFT JOIN `insurers` ON `policy_holders`.`id`=`insurers`.`policy_holder_id` ORDER BY `policy_holders`.`created_at` DESC";

        $result = $link->query($query);

        //print_r($result);

        if ($result->num_rows > 0) {

            $array = $result->fetch_all(MYSQLI_ASSOC);
        } else {

            echo "Error: " . $query . "<br>" . $link->error;
        }

        $result->free();

        $link->close();

        return $array;
    }

    /**
     * @param string $name
     * @param string $surname
     * @param string $email
     * @param string $phone
     * @param string $policy
     * @param string $departureDate
     * @param string $returnDate
     * @return int Last insert id
     */
    public function insert($name, $surname, $email, $phone, $policy, $departureDate, $returnDate) {

        $createdAt = date('Y-m-d H:i:s');

        $link = DB::getInstance()->connect();

        $escpdName = $link->real_escape_string($name);
        $escpdSurname = $link->real_escape_string($surname);
        $escpdEmail = $link->real_escape_string($email);
        $escpdPhone = $link->real_escape_string($phone);
        $escpdPolicy = $link->real_escape_string($policy);
        $escpdDeparture = $link->real_escape_string($departureDate);
        $escpdReturn = $link->real_escape_string($returnDate);
        $escpdCrtdAt = $link->real_escape_string($createdAt);

        $query = "INSERT INTO policy_holders (name, surname, email, phone, policy, departure_date, return_date, created_at) "
                . "VALUES ('$escpdName', "
                . "'$escpdSurname', "
                . "'$escpdEmail', "
                . "'$escpdPhone', "
                . "'$escpdPolicy', "
                . "'$escpdDeparture', "
                . "'$escpdReturn', "
                . "'$escpdCrtdAt')";

        $result = $link->query($query);

        if ($result === TRUE) {

            $lastId = $link->insert_id;
        } else {

            echo "Error: " . $query . "<br>" . $link->error;
        }

        $link->close();

        return $lastId;
    }

}
