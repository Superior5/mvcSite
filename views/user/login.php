<?php require_once(ROOT . '/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4">
                    <?php if (isset($errors) && is_array($errors)) : ?>
                        <ul>
                            <?php foreach ($errors  as $error) : ?>
                                <li> - <?php echo $error; ?> </li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Вход!</h2>
                        <form action="#" method="POST">
                            <input type="email" name="email" placeholder="Email Address" value="<?php echo $email; ?>" />
                            <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" />
                            <input type="submit" name="submit" class = "btn btn-default" value="Отправить">
                        </form>
                    </div>
                    <!--/sign up form-->
            </div>


        </div>
    </div>
</section>

<?php require_once(ROOT . '/views/layouts/footer.php'); ?>
