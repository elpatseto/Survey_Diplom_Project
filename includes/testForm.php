<?php
include 'header.php';
if (!isUserLogged()) {
    header("Location: userLogin.php");
}
$currentPage = "testForm";
$dropDownChoice = "Анкета";
if (isUserLogged() == 1) {
    require_once 'nav-admin.php';
} else {
    require_once 'nav-login.php';
}
?>

<section class="testForm" id="questionTitle">

    <div class="container">
        <fieldset class="fieldset">
                <legend class="title-bold"> Създаване на анкета</legend>
                <form action="createQuestion.php" id="survey-headers" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="org">Заглавие </label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="instruction">Инструкции при попълване
                                    <h6><em>* Въвеждането на инструкции не е задължително!</em></h6>
                                </label>
                                <textarea class="form-control textarea" name="instruction"
                                          style="height: 100px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" text-center">
                            <input type="submit" class="btn btn-default" value="Премини към въпрoсите">
                        </div>
                    </div>
                </form>
        </fieldset>
    </div>
</section>

<?php
require_once 'footer.php';
?>
