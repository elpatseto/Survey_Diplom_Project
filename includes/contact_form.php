<?php
require_once 'header.php';
$currentPage = "contact_form";
$dropDownChoice = "Създай";
if (isUserLogged()) {
    if (isUserLogged() == 1) {
        require_once 'nav-admin.php';
    } else {
        require_once 'nav-login.php';
    }
} else {
    require_once 'nav.php';
}

?>
    <section class="testForm">
        <div class="container">
            <form class="well form-horizontal" action="" method="post" id="contact_form">
                <fieldset>

                    <!-- Form Name -->
                    <legend class="title-bold">Моля попълненте формата!
                        <h5 style="color: crimson"><span class="glyphicon glyphicon-star"></span> - задължителни полета!</h5>
                    </legend>


                    <!-- Text input-->

                    <div class="form-group">
                        <label class="col-md-4 control-label">Име<span style="color: crimson">*</span></label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="first_name" placeholder="Иван" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group">
                        <label class="col-md-4 control-label">Фамилия<span style="color: crimson">*</span></label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="last_name" placeholder="Петров" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">E-Mail<span style="color: crimson">*</span></label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="email" placeholder="ivan_petrov@gmail.com" class="form-control"
                                       type="text">
                            </div>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Телефон <span> </span></label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="phone" placeholder="0888 123 456" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Text area -->

                    <div class="form-group">
                        <label class="col-md-4 control-label">Съобщение<span style="color: crimson">*</span></label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <textarea class="form-control txt-contact" name="comment"
                                          placeholder="Здравейте..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Success message -->
                    <div class="alert alert-success" role="alert" id="success_message">Съобщението е изпратено успешно!
                        <i class="glyphicon glyphicon-thumbs-up"></i>
                        <br> Благодарим Ви, че се свързахте с нас. Ще се свържем с Вас възможно най-скоро!
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-warning">Изпрати <span
                                        class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        </div><!-- /.container -->
    </section>
<?php
require_once 'footer.php';
?>
