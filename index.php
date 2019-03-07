<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 22/02/2019
 * Time: 20:51
 */
require_once 'class/Message.php';
require_once 'class/GuestBook.php';
/** @var TYPE_NAME $error */
$error = null;
$success = false;
$guestbook = new  GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messagess');
if (isset($_POST['username'], $_POST['message'])) {
    $message = new  Message($_POST['username'], $_POST['message']);
    if ($message->isValid()) {
        $guestbook->addMessage($message);
        $success = true;
        $_POST = [];
    } else {
        $error = $message->getErrors();
    }
}
$messages = $guestbook->getMessages();
/** @var TYPE_NAME $title */
$title = "Livre d'or";
require_once 'template/header.php';
?>

<div class="container" style="margin-top: 5%;">
    <div class="row">
        <div class="col-lg-5 col-md-5">
            <h2 class="mt-2 text-center">Messages</h2>
            <hr>
            <div class="card example-1 scrollbar-ripe-malinka" style="height: 440px;">
                <div class="card-body">
                    <?php if (!empty($messages)) : ?>
                    <?php foreach ($messages as $message) : ?>
                    <?= $message->toHTML() ?>
                    <?php endforeach ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-7">
            <h2 class="text-center text-uppercase">Livre d'or</h2>
            <hr>
            <!-- Default form register -->
            <div class="mt-2">
                <?php if (!empty($error)) : ?>
                <div class="alert alert-danger">
                    Formulaire invalide
                </div>
                <?php endif ?>
                <?php if ($success) : ?>
                <div class="alert alert-success">
                    votre message est poster.
                </div>
                <?php endif ?>
            </div>
            <form class="text-center border border-light p-5" action="" method="post">
                <div class="form-row mb-4">
                    <div class="col-lg-12">
                        <!-- First name -->
                        <input type="text" value="<?= htmlentities($_POST['username'] ?? '') ?>" name="username" class="form-control <?php isset($error['username']) ? 'is-invalid' : '' ?>" placeholder="First name">
                        <?php if (isset($error['username'])) : ?>
                        <div class="alert alert-warning mt-1">
                            <?= $error['username'] ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <!-- First name -->
                        <textarea name="message" rows="2" class="form-control <?php isset($error['message']) ? 'is-invalid' : '' ?>" placeholder="votre message"><?= htmlentities($_POST['message'] ?? '') ?></textarea>
                        <?php if (isset($error['message'])) : ?>
                        <div class="alert alert-warning mt-1 ">
                            <?= $error['message'] ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-danger rounded">Send <i class="fa fa-send"></i></button>
                    </div>
                </div>
            </form>
            <!-- Default form register -->
        </div>
    </div>
</div>


<?php require_once 'template/footer.php' ?> 