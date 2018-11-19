<?php
include 'header.php';

if (!isUserLogged()) {
    header("Location: login.php");
}

$currentPage = "testForm";
$dropDownChoice = "Анкета";

if (isUserLogged() == 1) {
    require_once 'nav-admin.php';
} else {
    require_once 'nav-login.php';
}

if (!empty($_POST)) {
    $data = $_POST;
} else {
    print ("Няма предадени данни!");
}

if (!empty($data['title'])) {
    $user_id = $_SESSION['user'];
    $surveyCreateDT = date("Y-m-d H:i:s", time());
    $query = "INSERT into survey_headers(users_id, survey_name, instructions ,date_created)
          VALUE (?,?,?,?)";

    if (!$stmt = $DBH->prepare($query)) {
        print("Грешна заявка: $query");
        exit;
    }

    if (!$stmt->bind_param("ssss", $user_id, $data['title'],
        $data["instruction"], $surveyCreateDT)) {
        print("Не се байндва!");
        exit;
    }

    if (!$stmt->execute()) {
        print("Не се изпълнява заявката! " . $DBH->error);
        exit;
    }
}
include 'surveyHedersQuery.php';
?>
<section class="testForm">
    <div class="container">
        <fieldset class="fieldset">
            <legend class="title-bold">
                <?php echo $title ?>
                <h5><?php echo $instruction ?></h5>
            </legend>
            <input type="hidden" value="<?php echo $surveyId; ?>" id="surveyId">
            <div class="form-group">
                <form method="post" action="saveQuestion.php">
                    <div id="newQuestion" class="testForm questions">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <label class="questLabel" id="questLabel1">1. </label>
                                <input type="text" name="questName[]" id="questName1" class="form-control" placeholder="Въведете заглавие на въпрос">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="checkbox" class="form-check-input" id="isRequired1">
                                <label class="label required-answer text-right" id="labelAnswer1">Задължителен
                                    отговор</label>
                            </div>
                            <!-- START button EDIT

                            <div class="btn-group col-md-1 col-sm-1 col-xs-1">
                                <button type="button" id="quest_edit_1"
                                        class="btn btn-info dropdown-toggle glyphicon glyphicon-cog"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="edit">
                                        <a class="dropdown-item glyphicon glyphicon-edit" href="#"> Редакция</a>
                                    </li>
                                    <li class="trash">
                                        <a class="dropdown-item glyphicon glyphicon-trash" href="#"> Изтриване</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END button EDIT -->
                        </div>
                        <span id="section1"> </span>
                    </div>

                    <div id="dropdown" class="dropdown">

                        <button type="button" class="btn btn-info drop" id="button1">
                            <a href="#" class="glyphicon glyphicon-plus " data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false"> ТИП <span class="caret"></span>
                            </a>
                            <?php
                            include 'dropDownChoice.php';
                            ?>
                        </button>
                        <h4 style="display: inline;"><a id="trigger-alert" class="glyphicon glyphicon-info-sign" title="Информация за типовете"
                                                        onclick="help();"></a></h4>
                    </div>

                    <input type="hidden" value="" id="qtype">
                    <button type="button" id="nextQuest" class="btn btn-info new_quest"
                            onclick="checkEmptyQuestion();">
                        НОВ ВЪПРОС
                    </button>
                    <input type="button" class="btn btn-default center-block submit-test" value="ГОТОВО"
                           onclick="setSurveyUrl();">
                </form>
            </div>
        </fieldset>
    </div>
</section>

<?php
include 'footer.php';
?>
