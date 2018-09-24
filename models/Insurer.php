<?php

class Insurer {

    /**
     * @param int $id
     */
    public function update($id) {

        $link = DB::getInstance()->connect();

        $escpdId = $link->real_escape_string($id);

        $query = "UPDATE insurers SET policy_holder_id='$escpdId' WHERE policy_holder_id IS NULL";

        $result = $link->query($query);

        if ($result !== TRUE) {

            echo "Error updating record: " . $link->error;
        }

        $link->close();
    }

}
