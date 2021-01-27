<?php require_once(ROOT . '/views/layouts/header.php'); ?>

<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">

            <div class="col-sm-4">
                    <?php if($result): ?>
                        <p>Данные отредактированы!</p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)) : ?>
                            <ul>
                                <?php foreach ($errors  as $error) : ?>
                                    <li> - <?php echo $error; ?> </li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif; ?>
                        <div class="signup-form">
                            <!--sign up form-->
                            <h2>Редактирование данных.!</h2>
                            <form action="#" method="POST">
                                <h3> Имя </h3>
                                <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" />
                                <h3> Пароль </h3>
                                <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" />
                                <input type="submit" name="submit" class="btn btn-default" value="Отправить">
                            </form>
                        </div>
                    <?php endif; ?>
                    <!--/sign up form-->
            </div>

        </div>
    </div>
</section>
<!--/form-->

<?php require_once(ROOT . '/views/layouts/footer.php'); ?>