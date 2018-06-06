<?php
require_once 'header.php';
$currentPage = "login";
$dropDownChoice = "Създай";
require_once 'nav.php';
?>

<section class="testForm">
    <div class="container">
        <form class="well form-horizontal" action="userLogin.php" method="post" id="login_form">
            <?php
            if (!empty($_GET['error']) && $_GET['error'] == 1) {
                // print 'Невалидно потребителско име или парола!';
                print '<script type="text/javascript"> swaWrongUser(); </script>';
            }
            ?>
            <fieldset>
                <legend class="title-bold">Вход в системата!</legend>

                <!-- Потребителско име-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Потребителско име</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="username" class="form-control" id="username" type="text">
                        </div>
                    </div>
                </div>

                <!-- Парола-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Парола</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input name="password" class="form-control" type="password">
                        </div>
                    </div>
                </div>

                <!-- Success message -->
                <div class="alert alert-success" role="alert" id="success_message">Добре дошъли!
                    <i class="glyphicon glyphicon-thumbs-up"></i>
                    <br> Желаем Ви приятни могове в сайтa!
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning">Вход <span
                                    class="glyphicon glyphicon-log-in"></span></button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
require_once 'footer.php';
?>
