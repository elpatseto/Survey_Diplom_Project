<?php
require_once 'header.php';
$currentPage = "register";
$dropDownChoice = "Създай";
if (isUserLogged()) {
    require_once 'nav-login.php';
} else {
    require_once 'nav.php';
}
require_once "connectDB.php";
?>

<section class="testForm">
    <div class="container">
        <form class="well form-horizontal" action="regUser.php" method="post" id="registration_form">
            <fieldset>

                <legend class="title-bold">Регистриране на нов потребител!</legend>

                <!-- Име-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Име</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="first_name" id="first_name" placeholder="Иван" class="form-control"
                                   type="text">
                        </div>
                    </div>
                </div>

                <!-- Фамилия -->

                <div class="form-group">
                    <label class="col-md-4 control-label">Фамилия</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="last_name" id="last_name" placeholder="Петров" class="form-control"
                                   type="text">
                        </div>
                    </div>
                </div>

                <!-- Емейл -->

                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="email" id="email" placeholder="ivan_petrov@gmail.com" class="form-control"
                                   type="text">
                        </div>
                    </div>
                </div>

                <!-- Потребителско име-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Потребителско име</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="username" id="username" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <!-- Парола-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Парола</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input name="password" id="password" class="form-control" type="password">
                        </div>
                    </div>
                </div>

                <!-- Confirm Парола-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Потвърдете паролата</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input name="confirm_password" id="confirm_password" class="form-control" type="password">
                        </div>
                    </div>
                </div>


                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" id="submit_button">
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
