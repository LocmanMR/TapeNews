<?php


class News
{
    const SHOW_BY_DEFAULT = 10;

    public static function getNewsList(int $count = self::SHOW_BY_DEFAULT): array
    {
        $db = Db::getConnection();
        $sql = 'SELECT n.id as id_news, n.title, n.content, n.date, n.short_content, n.author, n.status,  nt.*
                  FROM news_tag_relation AS ntr
                  JOIN (SELECT * FROM news ORDER BY `date` DESC limit :count) 
                  AS n  ON ntr.id_news = n.id
                  JOIN news_tag AS nt ON ntr.id_tag = nt.id';

        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        $newsList = [];
        while ($row = $result->fetch()) {
            $newsId = $row['id_news'];
            $newsList[$newsId]['id'] = $row['id_news'];
            $newsList[$newsId]['title'] = $row['title'];
            $newsList[$newsId]['short_content'] = $row['short_content'];
            $newsList[$newsId]['content'] = $row['content'];
            $newsList[$newsId]['date'] = $row['date'];
            $newsList[$newsId]['tags'][] = $row['tag'];
            $newsList[$newsId]['author'] = $row['author'];
            $newsList[$newsId]['status'] = $row['status'];
        }
        return $newsList;
    }

    public static function getNewsByTag(string $tag, int $count = self::SHOW_BY_DEFAULT): array
    {
        $db = Db::getConnection();
        $sql = 'SELECT n.id as id_news, n.title, n.content, n.date,  nt.*
                  FROM news_tag AS nt
                  JOIN news_tag_relation AS ntr ON nt.id = ntr.id_tag
                  JOIN (SELECT * FROM news ORDER BY date DESC limit :count)
                  AS n ON ntr.id_news = n.id
                  WHERE tag = :tag';

        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->bindParam(':tag', $tag);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        $newsByTag = [];
        while ($row = $result->fetch()) {
            $newsId = $row['id_news'];
            $newsByTag[$newsId]['title'] = $row['title'];
            $newsByTag[$newsId]['content'] = $row['content'];
            $newsByTag[$newsId]['date'] = $row['date'];
            $newsByTag[$newsId]['tag'] = $row['tag'];
        }
        return $newsByTag;
    }

    public static function getNewsById(int $id): array
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM news WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function getNewsListAll(): array
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM news ORDER BY `date` DESC');

        $newsListAll = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $newsListAll[$i]['id'] = $row['id'];
            $newsListAll[$i]['title'] = $row['title'];
            $newsListAll[$i]['short_content'] = $row['short_content'];
            $newsListAll[$i]['content'] = $row['content'];
            $newsListAll[$i]['date'] = $row['date'];
            $newsListAll[$i]['author'] = $row['author'];
            $newsListAll[$i]['status'] = $row['status'];
            $i++;
        }
        return $newsListAll;
    }

    public static function addNews(array $options)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO news (title, short_content, content, author, status) 
                        VALUES (:title, :short_content, :content, :author, :status)';

        $result = $db->prepare($sql);

        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':author', $options['author'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function addTagRelation(int $idNews, int $idTag)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO news_tag_relation (id_news, id_tag)
                         VALUES (:id_news, :id_tag)';

        $result = $db->prepare($sql);

        $result->bindParam(':id_news', $idNews, PDO::PARAM_INT);
        $result->bindParam(':id_tag', $idTag, PDO::PARAM_INT);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function upNews(int $id, array $options)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `news` SET `title`= :title, `short_content`= :short_content,
                                  `content`= :content, `author`= :author, `status`= :status WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':author', $options['author'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function delNews(int $id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM news WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function delTagRelation(int $id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM news_tag_relation WHERE id_news = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


}