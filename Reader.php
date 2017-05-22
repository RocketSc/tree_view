<?php

include_once __DIR__ . '/User.php';
include_once __DIR__ . '/UsersCollection.php';

class Reader
{
    public function getAllUsers() : UsersCollection
    {
        $users = new UsersCollection;

        //Reading file line by line. Creating and adding users to collection
        $handle = @fopen(__DIR__ . '/users.txt', 'rb');
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                $userString = preg_split("/[\t]/", $buffer);

                //skip the first line (ID	NAME	PARENT)
                if ($userString[0] === 'ID') {
                    continue;
                }

                $users->add( new User($userString[0], $userString[1], $userString[2]) );
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);
        }

        return $users;
    }
}