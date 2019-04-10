<?php include ROOT . '/views/layouts/header.php'; ?>
<body>
<div id="content">
    <?php foreach ($newsList as $newsItem):?>
        <div class="post">
            <h2 class="title"><a><?php echo $newsItem['title'];?></a></h2>
            <p class="meta">Дата публикации: <a><?php echo $newsItem['date'];?></p>

            <div class="entry">
                <p><?php echo $newsItem['content'];?></p>
            </div>
        </div>
        <?php foreach ($newsItem['tags'] as $value):?>
            <a href="http://testtape/news/<?php echo $value;?>/" class="permalink">
            <?php echo($value); ?>
            </a>
        <?php endforeach;?>
    <?php endforeach;?>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>

