<?php
require_once 'header.php';

if (!isUserLogged()){
    header("Location: login.php");
}

if (!empty($_POST)) {
    $data = $_POST;
} else {
    print ("Няма предадени данни!");
}

//Генериране на линк за направената анкета/тест
if (!empty($data['sId'])) {

    $url = 'fillSurvey.php?surveyId=' . $data['sId'];
    //print 'Generating url - '. $url;
    $username = $_SESSION['user'];

    $query = 'UPDATE survey_headers SET survey_url = ?, date_created = ? 
              WHERE survey_headers.id =' . $data['sId'];
    if (!$stmt = $DBH->prepare($query)) {
        print("Грешна заявка: $query");
        exit;
    }

    $currentTime = date("Y-m-d H:i:s", time());

    if (!$stmt->bind_param("ss", $url, $currentTime)) {
        print("Не се байндва!");
        exit;
    }

    if (!$stmt->execute()) {
        print("Не се изпълнява заявката! " . $DBH->error);
        exit;
    }
}

//Запис на въпросите в таблицата
$query = "INSERT INTO questions(input_type_id, survey_headers_id, question_name, answer_required_yn) 
          VALUES (?,?,?,?)";

print_r($data);

if (!$stmt = $DBH->prepare($query)) {
    print("Грешна заявка: $query");
    exit;
}

if (!$stmt->bind_param("iisi", $data["qType"], $data["surveyId"], $data["title"], $data["required"])) {
    print("Не се байндва!");
    exit;
}

if (!$stmt->execute()) {
    print("Не се изпълнява заявката! " . $DBH->error);
    exit;
}

//
$question_id = $DBH->insert_id;

if (!empty($data["options"])) {
    $query = 'INSERT INTO option_choices(question_id, option_choice_name, correct) 
              VALUES (?, ?, ?)';
    if (!$stmt = $DBH->prepare($query)) {
        print("Грешна заявка: $query");
        exit;
    }

    foreach ($data["options"] as $option_id => $option_text) {
        if (strtolower($data['correctAnswers'][$option_id]) == "true") {
            $data['correctAnswers'][$option_id] = 1;
        } else {
            $data['correctAnswers'][$option_id] = 0;
        }
        print $data['correctAnswers'][$option_id];

        if (!$stmt->bind_param("isi", $question_id, $option_text, $data['correctAnswers'][$option_id])) {
            print("Не се байндва!");
            exit;
        }
        if (!$stmt->execute()) {
            print("Не се изпълнява заявката! " . $DBH->error);
            exit;
        }
    }
}

