<?php
require_once 'header.php';

if (!isUserLogged()) {
    header("Location: login.php");
}

require_once "../modules/template.php";
$currentPage = "userTests";
$dropDownChoice = "Създай";

if (isUserLogged() == 1) {
    require_once 'nav-admin.php';
} else {
    require_once 'nav-login.php';
}

// Задаваме пътя до директориите на шаблоните
$path = '../templates/';

//Създаваме инстанция на класа
$tpl = new Template($path);

$username = $_SESSION['user'];

$query = "SELECT DISTINCT survey_headers.survey_name, date_answered, date_created, survey_headers.id
          FROM survey_headers, questions
          LEFT JOIN text_answers
          ON questions.id = text_answers.question_id
          LEFT JOIN option_choices  
          ON questions.id = option_choices.question_id
          LEFT JOIN answers 
          ON option_choices.id=answers.question_option_id 
          WHERE survey_headers.id = questions.survey_headers_id
          AND (text_answers.answer is not null OR answers.question_option_id > 0)
          AND survey_headers.users_id = ?
          ORDER BY date_answered DESC";

if (!$stmt = $DBH->prepare($query)) {
    print $DBH->error;
    exit;
}
if (!$stmt->bind_param("s", $username)) {
    print("Не се байндва! " . $DBH->error);
    exit;
}

if (!$stmt->execute()) {
    print $DBH->error;
    exit;
}
if (!$result = $stmt->get_result()) {
    print $DBH->error;
    exit;
}
$rowNumber = 0;

include 'userAnswerTableUpMySurvey.php';
while ($row = $result->fetch_assoc()) {

    $surveyName = $row['survey_name'];
    $surveyID = $row['id'];
    $dateAnswer = $row['date_answered'];
    $dateCreated = $row['date_created'];

    $queryFindAutor = "SELECT users.username
                       FROM users, survey_headers 
                       WHERE users.username = survey_headers.users_id
                       AND survey_headers.survey_name ='$surveyName'";

    if (!$result_autor = $DBH->query($queryFindAutor)) {
        print("Не взема резултат! " . $DBH->error);
        exit;
    }

    while ($row_autors = $result_autor->fetch_assoc()) {
        $autor = $row_autors['username'];

        $rowNumber++;
        $tpl->set("rowNumber", $rowNumber);
        $tpl->set("survey_name", $surveyName);
        $tpl->set("surveyID", $surveyID);
        $tpl->set("username", $autor);
        $tpl->set("date_created", $dateCreated);
        $tpl->set("date_answered", $dateAnswer);
        print $tpl->fetch('templateMyAnswerAll.html');
    }
}
include 'userAnswerTableDownMySurvey.php';
require_once 'footer.php';
