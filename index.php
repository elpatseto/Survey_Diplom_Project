<?php
include 'header.php';
$currentPage = "index";
$dropDownChoice = "Създай";

if (isUserLogged()) {
    if(isUserLogged() == 1){
        require_once 'nav-admin.php';
        $createSurvey = "testForm.php";
    }else{
        require_once 'nav-login.php';
        $createSurvey = "testForm.php";
    }
} else {
    require_once 'nav.php';
    $createSurvey = "login.php";
}
?>

<!-- Header -->
<header>
    <div class="header-content">
        <div class="header-content-inner">
            <h1>МавериК</h1>
            <p>Създайте собсвен тест, анкета или викторина</p>
            <a href="#row promo" class="btn btn-primary btn-lg">Старт</a>
        </div>
    </div>
</header>

<!-- Intro Section -->
<section class="intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <span class="glyphicon glyphicon-ok" style="font-size: 60px"></span>
                <h2 class="section-heading">Направете собствено проучване и вижте какви са резултатите.</h2>
                <p class="text-light">Като истински професионалист създавате тестове, анкети или викторини.
                    Лесно изпращате към вашите абонати и получавате резултатите във вид на графика. </p>
            </div>
        </div>
    </div>
</section>

<!-- Content 1 -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="img-responsive img-circle center-block" src="../images/tipo-test.jpg" alt="">
            </div>
            <div class="col-sm-6">
                <h2 class="section-header">Тест</h2>
                <p class="lead text-muted">Създавате своите тестове като конструирате въпросите си избирайки от
                    множеството опции, които ще откриете.
                    Добрата новина е, че може да маркирате верните отговори, като по този начин обикновеният тест се
                    превръща в изпитен вариант. </p>
                <a href="#"
                   class="btn btn-primary btn-lg">Създайте ТЕСТ</a>
            </div>
        </div>
    </div>
</section>

<!-- Content 2 -->
<section class="content content-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="section-header">Викторина</h2>
                <p class="lead text-light">Създайте забавна, научна или просто каквато желаете викторина, споделете
                    приятели и се забавлявайте на остроумни отговори</p>
                <a href="#" class="btn btn-default btn-lg">Създайте ВИКТОРИНА</a>
            </div>
            <div class="col-sm-6">
                <img class="img-responsive img-circle center-block" src="../images/victorina.jpg" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Content 3 -->
<section class="content-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="img-responsive img-circle center-block" src="../images/anketa.jpg" alt="">
            </div>
            <div class="col-sm-6">
                <h2 class="section-header">Анкета</h2>
                <p class="lead text-muted">Проучвайте общественото мнение чрез събиране на сведения по предварително
                    съставен въпросник. </p>
                <a href="<?php print $createSurvey ?>" class="btn btn-primary btn-lg">Създайте АНКЕТА</a>
            </div>
        </div>
    </div>
</section>

<!-- Promos -->
<div class="container-fluid" id="row promo">
    <div class="row promo">
        <a href="#">
            <div class="col-md-4 promo-item item-1">
                <h3>Тест</h3>
            </div>
        </a>
        <a href="<?php print $createSurvey ?>">
            <div class="col-md-4 promo-item item-3">
                <h3>Анкета</h3>
            </div>
        </a>
        <a href="#">
            <div class="col-md-4 promo-item item-2">
                <h3>Викторина</h3>
            </div>
        </a>
    </div>
</div><!-- /.container-fluid -->

<?php include 'footer.php'; ?>
