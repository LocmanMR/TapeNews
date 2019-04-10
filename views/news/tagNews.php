<?php include ROOT . '/views/layouts/header.php'; ?>
<body>
<div id="content">
    <?php foreach ($newsByTag as $newsItem):?>
        <div class="post">
            <h2 class="title"><a><?php echo $newsItem['title'];?></a></h2>
            <p class="meta">Дата публикации: <a><?php echo $newsItem['date'];?></p>

            <div class="entry">
                <p><?php echo $newsItem['content'];?></p>
            </div>
            <a href="#" class="permalink"><?php echo $newsItem['tag'];?>  </a>
        </div>
    <?php endforeach;?>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>