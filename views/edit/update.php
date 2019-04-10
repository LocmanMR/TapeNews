<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/news/edit/">Панель управления</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <h4>Редактировать новость #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form method="post">

                        <p>Заголовок</p>
                        <input type="text" name="title" placeholder="" value="<?php echo $news['title']; ?>">

                        <p>Краткое описание</p>
                        <input type="text" name="short_content" placeholder="" value="<?php echo $news['short_content']; ?>">

                        <p>Новость</p>
                        <input type="text" name="content" placeholder="" value="<?php echo $news['content']; ?>">

                        <p>Автор</p>
                        <select name="author">
                            <?php if (is_array($authList)): ?>
                                <?php foreach ($authList as $auth): ?>
                                    <option value="<?php echo $auth['id']; ?>">
                                        <?php echo $auth['last_name']; ?>
                                        <?php echo $auth['first_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <p>Статус</p>
                        <select name="status">
                            <?php if (is_array($statusList)): ?>
                                <?php foreach ($statusList as $status): ?>
                                    <option value="<?php echo $status['id']; ?>">
                                        <?php echo $status['status']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

