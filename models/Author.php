<?php

class Author
{
    public static function getAuthList(): array
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id, last_name, first_name FROM author ORDER BY id ASC');

        $authList = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $authList[$i]['id'] = $row['id'];
            $authList[$i]['last_name'] = $row['last_name'];
            $authList[$i]['first_name'] = $row['first_name'];
            $i++;
        }
        return $authList;
    }
}