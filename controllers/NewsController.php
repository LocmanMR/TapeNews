<?php


Class NewsController
{

    public function actionIndex(): bool
    {
        $newsList = News::getNewsList(10);

        require_once ROOT . '/views/news/index.php';
        return true;
    }

    public function actionTags(string $tag): bool
    {

        $newsByTag = News::getNewsByTag($tag, 10);

        require_once ROOT . '/views/news/tagNews.php';

        return true;
    }

    public function actionEdit(): bool
    {
        $newsListAll = News::getNewsListAll();

        require_once(ROOT . '/views/edit/index.php');
        return true;
    }

    public function actionCreate(): bool
    {
        $authList = Author::getAuthList();
        $statusList = Status::getStatusList();
        $tagList = Tag::getTagList();
        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['author'] = $_POST['author'];
            $options['status'] = $_POST['status'];
            $options['idNews'] = $_POST['idNews'];
            $options['idTag'] = $_POST['idTag'];

            $errors = false;

            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поля';
            }
            News::addNews($options);
            News::addTagRelation($options['idNews'], $options['idTag']);

            header("Location: /news/edit");
        }
        require_once(ROOT . '/views/edit/create.php');
        return true;
    }

    public function actionUpdate(int $id): bool
    {
        $authList = Author::getAuthList();
        $statusList = Status::getStatusList();
        $news = News::getNewsById($id);

        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['author'] = $_POST['author'];
            $options['status'] = $_POST['status'];

            News::upNews($id, $options);

            header("Location: /news/edit");
        }
        require_once(ROOT . '/views/edit/update.php');
        return true;
    }

    public function actionDelete(int $id): bool
    {

        if (isset($_POST['submit'])) {
            News::delTagRelation($id);
            News::delNews($id);
            header("Location: /news/edit");
        }
        require_once(ROOT . '/views/edit/delete.php');
        return true;
    }

    public function actionTag(): bool
    {
        $tagList = Tag::getTagList();

        if (isset($_POST['submit'])) {
            $options['idNews'] = $_POST['idNews'];
            $options['idTag'] = $_POST['idTag'];

            $errors = false;

            if (!isset($options['idNews']) || empty($options['idNews'])) {
                $errors[] = 'Заполните поля';
            }
            News::addTagRelation($options['idNews'], $options['idTag']);

            header("Location: /news/tag");
        }
        require_once(ROOT . '/views/edit/createRelation.php');
        return true;

    }
}