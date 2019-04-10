<?php

class Status
{
    public static function getStatusList(): array
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM news_status ORDER BY id ASC');

        $statusList = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $statusList[$i]['id'] = $row['id'];
            $statusList[$i]['status'] = $row['status'];
            $i++;
        }
        return $statusList;
    }
}