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

$query = "SELECT survey_name, survey_url, date_created, survey_headers.id, number_answered
          FROM survey_headers, users 
          WHERE username = users_id 
          AND username = '$username'
          ORDER BY date_created DESC";

if (!$stmt = $DBH->prepare($query)) {
    print $DBH->error;
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
global $rowNumber;
$rowNumber = 0;
$surveyName = "";

include 'userTestTableUp.php';
while ($row = $result->fetch_assoc()) {

    $rowNumber++;

    $tpl->set("number", $rowNumber);
    $tpl->set("rowNumber", $rowNumber);
    $tpl->set("survey_name", $row['survey_name']);
    $tpl->set("survey_url", $row['survey_url']);
    $tpl->set("date_created", $row['date_created']);
    $tpl->set("number_answered", $row['number_answered']);
    $tpl->set("surveyID", $row['id']);
    print $tpl->fetch('templateUserSurveyTable.html');
}

require_once 'userTestTableDown.php';
require_once 'footer.php';
