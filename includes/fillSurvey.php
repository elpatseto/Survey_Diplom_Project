<?php
require_once 'header.php';

if (!isUserLogged()) {
    header("Location: login.php");
}

$currentPage = "userTests";
$dropDownChoice = "Създай";
if (isUserLogged() == 1) {
    require_once 'nav-admin.php';
} else {
    require_once 'nav-login.php';
}

require_once "connectDB.php";
require_once "../modules/template.php";

$surveyID = $_GET['surveyId'];
$autor = $_SESSION['user'];

$queryHeader = "SELECT survey_name, instructions
                FROM survey_headers, users
                WHERE id = ?";

if (!$stmt = $DBH->prepare($queryHeader)) {
    print("Грешна заявка: $queryHeader");
    exit;
}
if (!$stmt->bind_param("i", $surveyID)) {
    print("Не се байндва! " . $DBH->error);
    exit;
}

if (!$stmt->execute()) {
    print("Не се изпълнява заявката! " . $DBH->error);
    exit;
}

if (!$result = $stmt->get_result()) {
    print("Не взема резултат! " . $DBH->error);
    exit;
}

while ($row = $result->fetch_assoc()) {


    $title = $row['survey_name'] . ' ';
    $instruction = $row ['instructions'];
}

require_once 'sectionUP.php';

$questNumber = 0;
$checkOption = 0;
$radioOption = 0;

// Задаваме пътя до директориите на шаблоните
$path = '../templates/';

//Създаваме инстанция на класа
$tpl = new Template($path);

//Заявака за извиличане на въпросите
$query = 'SELECT * from questions WHERE survey_headers_id = ?';

if (!$stmt = $DBH->prepare($query)) {
    print("Грешна заявка: $query");
    exit;
}

if (!$stmt->bind_param("i", $surveyID)) {
    print("Не се байндва!");
    exit;
}

if (!$stmt->execute()) {
    print("Не се изпълнява заявката! " . $DBH->error);
    exit;
}

if (!$result = $stmt->get_result()) {
    print("Не взема резултат! " . $DBH->error);
    exit;
}

$required_questions = '';
$required_questions_types = '';

while ($row = $result->fetch_assoc()) {
    $questNumber++;

    $tpl->set("questId", $row['id']);

    if ($row['answer_required_yn'] == 0) {
        $reqQ = "";
    } else {
        $required_questions_types .= ", $row[input_type_id]";
        $required_questions .= ", $row[id]";
        $reqQ = ' <span style = "color:#eb3812">*</span>';
    }
    print "<div id = \"q$row[id]\"> $questNumber. $reqQ $row[question_name]</div>";

    if ($row['input_type_id'] == 1) {
        //$tpl->set('questionNumber',$questNumber);
        print $tpl->fetch('templateTextField.html');
    }
    if (($row['input_type_id'] == 2) or ($row['input_type_id'] == 3)) {
        //Заявка за извличане на възможните отговори
        $query_choices = 'SELECT * FROM option_choices WHERE question_id = ' . $row['id'];

        if (!$result_choices = $DBH->query($query_choices)) {
            print("Не взема резултат! " . $DBH->error);
            exit;
        }
        while ($row_choices = $result_choices->fetch_assoc()) {
            //$checkOption++;
            $tpl->set('chkOptions', $row_choices['option_choice_name']);
            $tpl->set('checkOptionId', $row_choices['id']);

            if ($row['input_type_id'] == 2) {
                print $tpl->fetch('templateCheckBox.html');

            } elseif ($row['input_type_id'] == 3) {
                print $tpl->fetch('templateRadio.html');
            }
        }
    }
    print '<hr>';
}

$required_questions = substr($required_questions, 1);
$required_questions_types = substr($required_questions_types, 1);
print '<script type = "text/javascript">

reqQuest = new Array(' . $required_questions . '); 
reqQuest_types = new Array(' . $required_questions_types . '); 

</script>';
require_once 'sectionDown.php';
require_once 'footer.php';

