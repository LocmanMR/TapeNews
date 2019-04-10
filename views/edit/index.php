<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/news/edit/">Панель управления</a></li>
                    <li class="active">Управление лентой новостей</li>
                </ol>
            </div>

            <a href="/news/edit/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить новость</a>
            <a href="/news/tag" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить тег новость</a>
            
            <h4>Список новостей</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Дата публикации</th>
                    <th>Краткое описание</th>
                    <th>Контент</th>
                    <th>Автор Id</th>
                    <th>Статус Id</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($newsListAll as $list): ?>
                    <tr>
                        <td><?php echo $list['id']; ?></td>
                        <td><?php echo $list['title']; ?></td>
                        <td><?php echo $list['date']; ?></td>
                        <td><?php echo $list['short_content']; ?></td>
                        <td><?php echo $list['content']; ?></td>
                        <td><?php echo $list['author']; ?></td>
                        <td><?php echo $list['status']; ?></td>
                        <td><a href="/news/edit/update/<?php echo $list['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/news/edit/delete/<?php echo $list['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
