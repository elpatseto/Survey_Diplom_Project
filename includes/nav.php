<?php
require_once 'connectDB.php';
require_once 'header.php';
if (!isUserLogged()) {
    $createSurvey = "login.php";
} else {
    $createSurvey = "testForm.php";
}
?>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- Navigation -->
<nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Logo and responsive toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <span class="glyphicon glyphicon-king"></span>
                МавериК
                <span class="glyphicon glyphicon-king"></span>
            </a>
        </div>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="<?php if ($currentPage == 'index') {
                    $dropDownChoice = "Създай";
                    echo 'active';
                } ?>">
                    <a href="index.php">Начало</a>
                </li>
                <li class="<?php if ($currentPage == 'howItWorks') {
                    echo 'active';
                } ?>"><a href="howItWorks.php">Как работи</a></li>
                <li class="dropdown <?php if ($currentPage == 'testForm') {
                    echo 'active';
                } ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><?php echo $dropDownChoice ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="<?php if ($currentPage == 'testForm') {
                            echo 'active';
                        } ?>">
                            <a href="<?php print $createSurvey; ?>">Анкета</a>
                        </li>
                        <li><a href="#">Тест</a></li>
                        <li><a href="#">Викторина</a></li>
                    </ul>
                </li>
                <li class="<?php if ($currentPage == 'contact_form') {
                    echo 'active';
                } ?>">
                    <a href="contact_form.php">Контакти</a>
                </li>
                <li class="<?php if ($currentPage == 'register') {
                    echo 'active';
                } ?>"><a href="register.php"><span class="glyphicon glyphicon-user"></span>
                        Регистрация</a>
                </li>
                <li class="<?php if ($currentPage == 'login') {
                    echo 'active';
                } ?>">
                    <a href="login.php"><span class="glyphicon glyphicon-log-in"></span>
                        Вход
                    </a>
                </li>
            </ul><!-- End of navi -->

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>
<body onload="ResetScrollPosition();">
