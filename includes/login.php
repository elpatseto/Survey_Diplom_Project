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
                print '<script type="text/javascript"> swaWrongUser(); </script>';
            }
            ?>
            <fieldset>
                <legend class="title-bold">Вход в системата</legend>

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

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning">Вход <span
                                    class="glyphicon glyphicon-log-in"></span></button>
                    </div>
                </div>
                <hr>
                <!-- Ако не сте регистриран -->
                <div class="form-group">
                    <label class="col-md-4 control-label"> Ако не сте регистриран потребител </label>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-default" onclick="location='register.php'">
                            Регистрирация
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
require_once 'footer.php';
?>
