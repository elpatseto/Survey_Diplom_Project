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

require_once "../modules/template.php";

// Задаваме пътя до директориите на шаблоните
$path = '../templates/';

//Създаваме инстанция на класа
$tpl = new Template($path);

$query = "SELECT survey_name, survey_url, username, date_created, number_answered
          FROM survey_headers, users 
          WHERE username = users_id 
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
$rowNumber = 0;

include 'userTestTableUpAll.php';
while ($row = $result->fetch_assoc()) {

    $rowNumber++;

    $tpl->set("rowNumber", $rowNumber);
    $tpl->set("survey_url", $row['survey_url']);
    $tpl->set("survey_name", $row['survey_name']);
    $tpl->set("username", $row['username']);
    $tpl->set("date_created", $row['date_created']);
    $tpl->set("number_answered", $row['number_answered']);


    print $tpl->fetch('templateUserSurveyTableAll.html');
}

include 'userTestTableDownAll.php';
require_once 'footer.php';
