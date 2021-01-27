<?php require_once(ROOT . '/views/layouts/header.php'); ?>

<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">

            <div class="col-sm-4">
                    <?php if($result): ?>
                        <p>Данные отправлены!</p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)) : ?>
                            <ul>
                                <?php foreach ($errors  as $error) : ?>
                                    <li> - <?php echo $error; ?> </li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif; ?>
                        <div class="signup-form">
                        <h2>Обратная связь</h2>
                        <h5>Есть вопрос? Напишите нам!</h5>
                            <!--sign up form-->
                            <form action="#" method="POST">
                                <h3> Ваша почта </h3>
                                <input type="email" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>" />
                                <h3> Сообщение </h3>
                                <input type="text" name="userText" placeholder="Сообщение" value="<?php echo $userText; ?>" />
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