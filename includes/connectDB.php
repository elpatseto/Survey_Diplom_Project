
<?php
// Задаваме хост, потребителско име, парола и име на БД
$host = '127.0.0.1';
$user = 'root';
$password = '';
$db_name = 'survey_plamen';


// Създаване на връзка към MySQL.
// В $DBH се съхранява обект от клас mysqli.
$DBH = new mysqli($host, $user, $password, $db_name);
if ($DBH->connect_errno) {
    // В случай на неуспешно свързване се извежда съобщението
    // за грешка, върнато от MySQL.
    print $DBH->connect_error;
    // Прекратява изпълнението на програмата.
    exit;
}

// Задава кодиране на връзката между php и mysql –
// кодова таблица utf8
// (същата като тази, използвана от клиента)
$DBH->query("SET NAMES utf8");


//Таен ключ
$secretKey = "el_patseto";
$session_timeout = 3600;

