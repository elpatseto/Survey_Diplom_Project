<?php
$query = 'SELECT survey_name, instructions, survey_headers.id 
          FROM survey_headers, users 
          WHERE users.username = survey_headers.users_id 
          AND username = ?';

if (!$stmt = $DBH->prepare($query)) {
    print $DBH->error;
    exit;
}

if (!$stmt->bind_param("s", $_SESSION['user'])) {
    print("Не се байндва!");
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

while ($row = $result->fetch_assoc()) {

    $surveyId = $row['id'];
    $title = $row['survey_name'] . ' ';
    $instruction = $row ['instructions'];
}

