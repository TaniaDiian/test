<?php

include 'Model.php';

class UserModel extends Model
{
    private $tableName = "users";

    public function selectAll()
    {
        $sqlSelect = "SELECT * FROM " . $this->tableName;
        return $this->fetch($sqlSelect);
    }

    public function deleteUsers($ids)
    {
        $ids_str = implode(',', $ids);
        $sqlSelect = "DELETE FROM `$this->tableName` WHERE `$this->tableName`.`uid` IN ($ids_str);";
        return $this->fetch($sqlSelect);
    }

    public function insertUsers($usersArray)
    {
        $array_new = [];

        foreach ($usersArray as $item) {

            $itemStr =  '(';
            foreach ($item as $key => $value){
                if($key === 'uid'){
                    $itemStr.= "'$value'";
                }else{
                    $itemStr.= ", '$value'";
                }
            }
            $itemStr .= ')';

            $array_new[] = $itemStr;

        }

        $usersArrayStr = implode(',', $array_new);

        $sqlSelect = "INSERT INTO `$this->tableName` 
        (`uid`, `firstName`, `lastName`, `birthDay`, `dateChange`, `description`) 
        VALUES $usersArrayStr ON DUPLICATE KEY UPDATE
        firstName = VALUES(firstName),
        lastName = VALUES(lastName), 
        birthDay = VALUES(birthDay),
        dateChange = VALUES(dateChange),
        description = VALUES(description);";
        return $this->fetch($sqlSelect);
    }


}
