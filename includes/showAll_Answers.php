<?php
require_once 'header.php';

if (!isUserLogged()) {
    header("Location: login.php");
}

require_once "../modules/template.php";
$currentPage = "";
$dropDownChoice = "Създай";
require_once 'nav-login.php';

$username = $_SESSION['user'];
$surveyID = $_GET['sId'];
$questNumber = 0;

// Задаваме пътя до директориите на шаблоните
$path = '../templates/';

//Създаваме инстанция на класа
$tpl = new Template($path);

$queryHeader = "SELECT instructions, id, first_name, last_name, survey_name
                FROM survey_headers, users
                WHERE id = ?
                AND users.username = survey_headers.users_id";

if (!$stmt = $DBH->prepare($queryHeader)) {
    print("Грешна заявка: $queryHeader");
    exit;
}

if(!$stmt -> bind_param("i", $surveyID)) {
    print("Не се байндва! " . $DBH->error);
    exit;
}

if (!$stmt->execute()) {
    print("Не се изпълнява заявката! " . $DBH->error);
    exit;
}

if (!$result = $stmt->get_result()) {
    print("Не взема резултат!" . $DBH->error);
    exit;
}

while ($row = $result->fetch_assoc()) {
    $autor = $row['first_name'].' '.$row['last_name'] ;
    $instruction = $row ['instructions'];
    $surveyName = $row['survey_name'];
    $surveyID = $row['id'];
}

include 'sectionUPshow.php';


$query = "SELECT * from questions WHERE survey_headers_id = ?";

if (!$stmt = $DBH->prepare($query)) {
    print("Грешна заявка: $query");
    exit;
}
if(!$stmt -> bind_param("i", $surveyID)) {
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
    $questionID = $row['id'];

    if ($row['input_type_id'] == 1) {
        $questNumber++;
        $tpl->set("questNumber", $questNumber);
        $tpl->set("questionName", $row['question_name']);
        print $tpl->fetch('templateShowQuestion.html');

        $queryText = "SELECT answer  
                      FROM text_answers, users
                      WHERE users.username = text_answers.user_id
                      AND text_answers.question_id = $questionID";

        if (!$result_text = $DBH->query($queryText)) {
            print("Не взема резултат! " . $DBH->error);
            exit;
        }
        print '<div class="answer-title"><em> Отговор: </em></div>';
        while ($row_text = $result_text->fetch_assoc()) {
            $tpl->set("answer", $row_text['answer']);
            print $tpl->fetch("templateShowAnswer.html");
        }
        print '<hr>';
    }
    if (($row['input_type_id'] == 2) or ($row['input_type_id'] == 3)) {

        $questNumber++;
        $tpl->set("questNumber", $questNumber);
        $tpl->set("questionName", $row['question_name']);
        print $tpl->fetch('templateShowQuestion.html');

        $query_choices = "SELECT option_choices.option_choice_name, option_choices.correct 
                          FROM option_choices, answers, users
                          WHERE answers.question_option_id = option_choices.id
                          AND users.username = answers.user_id
                          AND option_choices.question_id = $questionID";


        if (!$result_choices = $DBH->query($query_choices)) {
            print("Не взема резултат! " . $DBH->error);
            exit;
        }
        print '<div class="answer-title"><em> Отговор: </em></div>';
        while ($row_choices = $result_choices->fetch_assoc()) {
            //$correct = $row_choices['correct'];
            if ($row['input_type_id'] == 2) {
                $tpl->set("answer", $row_choices['option_choice_name']);
                print $tpl->fetch("templateShowAnswer.html");

            } elseif ($row['input_type_id'] == 3) {
                $tpl->set("answer", $row_choices['option_choice_name']);
                print $tpl->fetch("templateShowAnswer.html");
            }
        }
        print '<hr>';
    }
}

include 'sectionDownshowAll.php';

require_once 'footer.php';
