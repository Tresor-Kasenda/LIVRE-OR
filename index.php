<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 22/02/2019
 * Time: 20:51
 */
    require_once 'class/Message.php';
    /** @var TYPE_NAME $error */
    $error = null;
    if (isset($_POST['username'], $_POST['message'])){
        $message = new  Message($_POST['username'], $_POST['message']);
        if ($message->isValid()){

        } else {
            $error = 'Formulaire invalide';
        }

    }
    /** @var TYPE_NAME $title */
    $title = "Livre d'or";
    require_once 'template/header.php';
 ?>

    <div class="container mt-3">
        <h2 class="text-center text-uppercase">Livre d'or</h2>
        <hr>
        <!-- Default form register -->
        <div class="mt-2">
            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif ?>
        </div>
        <form class="text-center border border-light p-5" action="" method="post">
            <div class="form-row mb-4">
                <div class="col-lg-12">
                    <!-- First name -->
                    <input type="text" name="username" class="form-control" placeholder="First name">
                </div>
                <div class="col-lg-12 mt-3">
                    <!-- First name -->
                    <textarea name="message" rows="3" class="form-control" placeholder="votre message"></textarea>
                </div>
                <div class="text-left">
                    <button type="submit" class="btn btn-primary rounded">Send <i class="fa fa-send"></i></button>
                </div>
            </div>
        </form>
        <!-- Default form register -->
    </div>


<?php require_once 'template/footer.php' ?>
