<?php

class Tag
{
    public static function getTagList(): array
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id, tag FROM news_tag ORDER BY id ASC');

        $tagList = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $tagList[$i]['id'] = $row['id'];
            $tagList[$i]['tag'] = $row['tag'];
            $i++;
        }
        return $tagList;
    }
}