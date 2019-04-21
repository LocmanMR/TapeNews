<div class="page-buffer"></div>
</div>

<footer id="footer" class="page-footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">MyPHP © 2019</p>
                <p class="pull-right">ИРР</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->


<script src="/template/js/jquery.js"></script>
<script src="/template/js/script.js"></script>

<script>

    window.addEventListener("scroll", function(){

        var block = document.getElementById('content');
        var counter = 1;

        var contentHeight = block.offsetHeight;      // 1) высота блока контента вместе с границами
        var yOffset       = window.pageYOffset;      // 2) текущее положение скролбара
        var window_height = window.innerHeight;      // 3) высота внутренней области окна документа
        var y             = yOffset + window_height;

        // если пользователь достиг конца
        if(y >= contentHeight)
        {
            //загружаем новое содержимое в элемент
            block.innerHTML = block.innerHTML + "<div id=\"content\">\n" +
                "    <?php foreach ($newsList as $newsItem):?>\n" +
                "        <div class=\"post\">\n" +
                "            <h2 class=\"title\"><a><?php echo $newsItem['title'];?></a></h2>\n" +
                "            <p class=\"meta\">Дата публикации: <a><?php echo $newsItem['date'];?></p>\n" +
                "\n" +
                "            <div class=\"entry\">\n" +
                "                <p><?php echo $newsItem['content'];?></p>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <?php foreach ($newsItem['tags'] as $value):?>\n" +
                "            <a href=\"http://testtape/news/<?php echo $value;?>/\" class=\"permalink\">\n" +
                "            <?php echo($value); ?>\n" +
                "            </a>\n" +
                "        <?php endforeach;?>\n" +
                "    <?php endforeach;?>\n" +
                "</div>";
        }
    });

</script>

</body>
</html>