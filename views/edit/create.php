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


            <h4>Добавить новость</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form method="post">

                        <p>Заголовок</p>
                        <input type="text" name="title" placeholder="" value="">

                        <p>Краткое описание</p>
                        <input type="text" name="short_content" placeholder="" value="">

                        <p>Контент</p>
                        <input type="text" name="content" placeholder="" value="">

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

                        <p>Id Новости</p>
                        <input type="text" name="idNews" placeholder="" value="">

                        <p>Id тега</p>
                        <select name="idTag">
                            <?php if (is_array($tagList)): ?>
                                <?php foreach ($tagList as $tag): ?>
                                    <option value="<?php echo $tag['id']; ?>">
                                        <?php echo $tag['tag']; ?>
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

