<?php
require_once 'header.php';

if (!isUserLogged()) {
    header("Location: login.php");
}

$dropDownChoice = "Създай";
if (isUserLogged() == 1) {
    require_once 'nav-admin.php';
} else {
    require_once 'nav-login.php';
}
?>
    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>МавериК</h1>
                <p>Създай собсвен тест, анкета или викторина</p>
                <a href="#row promo" class="btn btn-primary btn-lg">Старт</a>
            </div>
        </div>
    </header>
<?php

$title = $_POST['title'];
$query = "UPDATE survey_headers  SET date_answered = ?, number_answered = number_answered + 1
              WHERE survey_name ='$title'";

if (!$stmt = $DBH->prepare($query)) {
    print("Грешна заявка: $query");
    exit;
}

$currentTime = date("Y-m-d H:i:s", time());

if (!$stmt->bind_param("s", $currentTime)) {
    print("Не се байндва!");
    exit;
}

if (!$stmt->execute()) {
    print("Не се изпълнява заявката! " . $DBH->error);
    exit;
}

function saveData($data)
{
    global $DBH;
    //print_r($data);
    $username = $_SESSION['user'];

    foreach ($data as $questionId => $value) {
        $type = getQuestionType($questionId);

        if ($type == 1) {
            $queryText = "INSERT INTO text_answers (user_id, question_id, answer ) VALUES (?,?,?)";

            if (!$stmt = $DBH->prepare($queryText)) {
                print("Грешна заявка: $queryText");
                exit;
            }

            if (!$stmt->bind_param("sis", $username, $questionId, $value)) {
                print("Не се байндва!");
                exit;
            }

            if (!$stmt->execute()) {
                print("Не се изпълнява заявката! " . $DBH->error);
                exit;
            }
        }

        if ($type == 2) {
            $queryCheck = "INSERT INTO answers (user_id, question_option_id) VALUES (?,?)";

            if (!$stmt = $DBH->prepare($queryCheck)) {
                print("Грешна заявка: $queryCheck");
                exit;
            }

            foreach ($value as $option_id) {

                if (!$stmt->bind_param("si", $username, $option_id)) {
                    print("Не се байндва!");
                    exit;
                }

                if (!$stmt->execute()) {
                    print("Не се изпълнява заявката! " . $DBH->error);
                    exit;
                }
            }
        }

        if ($type == 3) {
            $queryRadio = "INSERT INTO answers (user_id, question_option_id) VALUES (?,?)";
            if (!$stmt = $DBH->prepare($queryRadio)) {
                print("Грешна заявка: $queryRadio");
                exit;
            }

            if (!$stmt->bind_param("si", $username, $value)) {
                print("Не се байндва!");
                exit;
            }

            if (!$stmt->execute()) {
                print("Не се изпълнява заявката! " . $DBH->error);
                exit;
            }
        }
    }
}

function getQuestionType($questId)
{
    global $DBH;

    $query = "SELECT input_type_id FROM questions WHERE id = ? ";

    if (!$stmt = $DBH->prepare($query)) {
        return 0;
    }

    if (!$stmt->bind_param("i", $questId)) {
        return 0;
    }

    if (!$stmt->execute()) {
        return 0;
    }

    if (!$result = $stmt->get_result()) {
        return 0;
    }

    if ($row = $result->fetch_assoc()) {
        return $row['input_type_id'];
    } else {
        return 0;
    }
}
saveData($_POST['question']);


print '<body><script type="text/javascript">
    var url = "index.php";
    swaSuccessfullyFillTest();
    setTimeout(function () {
        window.location = url;
    }, 1500);
</script></body>';







