<?php
include 'header.php';
$currentPage = "howItWorks";
$dropDownChoice = "Създай";
if (!isUserLogged()) {
    require_once 'nav.php';
} else if (isUserLogged() == 1) {
    require_once 'nav-admin.php';
} else {
    require_once 'nav-login.php';
}
?>

<section class="testForm" id="questionTitle">
    <div class="container">
        <fieldset class="fieldset">
            <legend class="title-bold"> Как работи</legend>
            <p class="text-center"><em> Изпитни тестове, маркетинг проучвания, удоволетвореност на служители или просто
                    забавани анкети и
                    викторини.<br><strong>"МавериК"</strong> е онлайн платформа, която ще задоволи вашите нужди и ще
                    направи работата Ви по-лесна и ефективна.</em></p>
            <hr>
            <div class="row">
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <img class="img-responsive" src="../images/how_1.png">
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <h4><strong>Създайте собствен формуляр</strong></h4>
                    Навигирайте до падащото менюто <strong>"Създай"</strong> и изберете типа на формуляра, който желаете
                    да създадете.
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <h4><strong>Задайте заглавие и инструкции</strong></h4>
                    Въвведете вашето заглавие и инструкции, след което
                    натиснете бутона <strong>ПРЕМИНИ КЪМ ВЪПРОСИТЕ</strong>. <br><br><em>Моля обърнете внимание, че не е
                        задължително
                        да въвеждате инструкции към вашата анкета!</em>
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <img class="img-responsive" src="../images/how_2.png">
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <img class="img-responsive" src="../images/how_3.png">
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <h4><strong>Конфигурирайте вашите въпроси</strong></h4>
                    Създавайте динамично неограничен брой въпроси и избирайте из между многобройни
                    опции за отговор.
                </div>

            </div>
            <hr>

            <div class="row">
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <h4><strong>Изпратете формуляр</strong></h4>
                    Споделяйте вашите формуляри с приятели, колеги, познати и събирайте отговори,
                    които да анализирате по-късно.
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <img class="img-responsive" src="../images/how_4.png">
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <img class="img-responsive" src="../images/how_5.png">
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <h4><strong>Прегледайте формуляр</strong></h4>
                    Преглеждайте и попълвайте формуляри, ваши и на други потребители за да дадете вашият приност към
                    каузата на други като вас.
                </div>

            </div>
            <hr>

            <div class="row">
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <h4><strong>Анализирайте отговорите</strong></h4>
                    Направете бърз и лесен анализ на отговорите на вашите фомуляри, чрез прекрасни графики.
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <img class="img-responsive" src="../images/how_6.png">
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="right">
                    <input type="button" class="btn btn-warning" id="go-back" value="Назад"
                           onclick="location.href='index.php';">
                </div>
            </div>
        </fieldset>
    </div>
</section>

<?php
require_once 'footer.php';
?>


