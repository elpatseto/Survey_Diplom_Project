<?php
require_once 'connectDB.php';
require_once 'header.php';
$dropDownUser = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
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
                <li class="dropdown <?php if ($currentPage == 'testForm') {
                    echo 'active';
                } ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><?php echo $dropDownChoice ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="<?php if ($currentPage == 'testForm') {
                            echo 'active';
                        } ?>">
                            <a href="testForm.php">Анкета</a>
                        </li>
                        <li ><a href="#">Тест</a></li>
                        <li><a href="#">Викторина</a></li>
                    </ul>
                </li>
                <li class="<?php if ($currentPage == 'contact_form') {
                    echo 'active';
                } ?>">
                    <a href="contact_form.php">Контакти</a>
                </li>

                <li class="<?php if ($currentPage == 'userTests') {
                    echo 'active';
                } ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><span
                                class="glyphicon glyphicon-knight"></span><?php print ' ' . $dropDownUser ?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="userTests.php"> Моите анкети </a></li>
                        <li><a href="userAnswers.php"> Моите отговри </a></li>
                        <li><a href="logout.php"> Изход <span class="glyphicon glyphicon-log-out"></span></a></li>
                    </ul>
                </li>
            </ul><!-- End of navi -->
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>
<body onload="ResetScrollPosition();">
