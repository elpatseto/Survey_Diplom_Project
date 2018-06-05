<?php
include 'header.php';
$currentPage = "userTests";
$dropDownChoice = "Създай";

if (isUserLogged() == 1) {
    require_once 'nav-admin.php';
} else {
    require_once 'nav-login.php';
}
require_once "../modules/template.php";

if (!isUserLogged()) {
    header("Location: login.php");
}

// Задаваме пътя до директориите на шаблоните
$path = '../templates/';

//Създаваме инстанция на класа
$tpl = new Template($path);

//....
$surveyID = $_GET['sId'];
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

$labels = '';
$data = '';

while ($row = $result->fetch_assoc()) {
    $questNumber++;

    $tpl->set("questId", $row['id']);

    if ($row['answer_required_yn'] == 0) {
        $reqQ = "";
    } else {
        $reqQ = ' <span style = "color:#eb3812">*</span>';
    }

    $tpl->set("questNumber", $questNumber);
    $tpl->set("questionName", $row['question_name']);

    if ($row['input_type_id'] == 1) {

        $query = "SELECT answer 
                  FROM text_answers 
                  WHERE question_id = $row[id]";
        if (!$result_text_answers = $DBH->query($query)) {
            print("Не взема резултат! " . $DBH->error);
            exit;
        }
        $temp = "";
        $answerNumber = 1;
        while ($row_text_answers = $result_text_answers->fetch_assoc()) {
            if (empty($row_text_answers['answer'])) continue;
            $tpl->set("answerNumber", $answerNumber);
            $tpl->set("answerText", $row_text_answers['answer']);
            $answerNumber++;
            $temp = $temp . $tpl->fetch("templateTextchart_row.html");
        }
        $tpl->set("answers", $temp);

        print $tpl->fetch('templateTextchart.html');
    }
    // end textchart

    if (($row['input_type_id'] == 2) or ($row['input_type_id'] == 3)) {
        //Заявка за извличане на възможните отговори
        $query_choices = 'SELECT COUNT(answers.id) broi, option_choice_name
                               FROM option_choices, answers
                               WHERE question_id = ' . $row['id'] . '
                               AND option_choices.id = answers.question_option_id 
                               GROUP BY option_choice_name';

        if (!$result_choices = $DBH->query($query_choices)) {
            print("Не взема резултат! " . $DBH->error);
            exit;
        }
        $labels = "";
        $data = "";
        while ($row_choices = $result_choices->fetch_assoc()) {
            if (empty($row_choices['option_choice_name'])) continue;
            $labels = $labels . ', "' . mb_substr($row_choices['option_choice_name'], 0, 30, "utf-8") . '"';
            $data = $data . ', ' . $row_choices['broi'];
        }
        $labels = substr($labels, 1);
        $data = substr($data, 1);

        $tpl->set("labels", $labels);
        $tpl->set("data", $data);

        if ($row['input_type_id'] == 2) {
            print $tpl->fetch('templateBarchart.html');
        } else {
            print $tpl->fetch('templatePiechart.html');
        }
    }


}


//....
/*
$tpl->set("", "");
print $tpl->fetch("templateBarchart.html");
print $tpl->fetch("templatePiechart.html");
print $tpl->fetch("templateTextchart.html");
*/
include 'charts-DOWN-section.php';
include 'footer.php';


