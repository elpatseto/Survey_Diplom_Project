<?php
require_once "connectDB.php";

$valid = true;

switch ($_POST['type']) {

    case 'userNoadmin':
        $username = mysqli_real_escape_string($DBH, $_POST['userNoadmin']);

        $doseExistUser = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($DBH, $doseExistUser);
        if (mysqli_num_rows($result) < 1) {
            $valid = false;
        }
        break;

    case 'userforadmin':
        $username = mysqli_real_escape_string($DBH, $_POST['userforadmin']);

        $doseExistUser = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($DBH, $doseExistUser);
        if (mysqli_num_rows($result) < 1) {
            $valid = false;
        }
        break;

    case 'title':
        $surveyName = mysqli_real_escape_string($DBH, $_POST['title']);

        $isExistSurveyName = "SELECT * FROM survey_headers WHERE survey_name = '$surveyName'";
        $result = mysqli_query($DBH, $isExistSurveyName);

        if (mysqli_num_rows($result) >= 1) {
            $valid = false;
        }
        break;

    case 'email':
        $email = mysqli_real_escape_string($DBH, $_POST['email']);
        $isExistEmail = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($DBH, $isExistEmail);

        if (mysqli_num_rows($result) >= 1) {
            $valid = false;
        }
        break;

    case 'username':
    default:
        $newUser = mysqli_real_escape_string($DBH, $_POST['username']);

        $isExistUser = "SELECT * FROM users WHERE username = '$newUser'";
        $result = mysqli_query($DBH, $isExistUser);

        if (mysqli_num_rows($result) >= 1) {
            $valid = false;
        }
        break;
}
//Return json
echo json_encode(array(
    'valid' => $valid,
));





