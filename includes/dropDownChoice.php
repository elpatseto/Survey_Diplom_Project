<?php
$query = "SELECT id,input_type_name FROM input_types";

if (!$result = $DBH->query($query)) {
    print $DBH->error;
    exit;
}

while ($row = $result->fetch_assoc()) {
    if ($row['id'] == 1) {
        $textFiled = $row['input_type_name'];
    } else if ($row['id'] == 2) {
        $checkBox = $row['input_type_name'];
    } else if ($row['id'] == 3) {
        $radio = $row['input_type_name'];
    } else if ($row['id']==4){
        $scale = $row['input_type_name'];
    }else if ($row['id']==5){
        $picture = $row['input_type_name'];
    }else if ($row['id']==6){
        $sound = $row['input_type_name'];
    }else if ($row['id']==7){
        $video = $row['input_type_name'];
    }
}
echo '<ul class="dropdown-menu" >';
echo '<li ><a href = "#" class="glyphicon glyphicon-pencil" id = "addTextField"
        onclick = "createTextArea(); document.forms[0].elements[\'qtype\'].value = 1" " > -' . $textFiled . '</a ></li>';
echo '<li ><a href = "#" class="glyphicon glyphicon-check" id = "addCheckBox"
        onclick = "for (var i = 0; i <= 2; i++){createCheckBox();i++;}; document.forms[0].elements[\'qtype\'].value = 2" > -' . $checkBox . '</a ></li >';
echo '<li ><a href = "#" class="glyphicon glyphicon-screenshot" 
        onclick = "for (var i = 0; i <= 2; i++){createRadio();i++; }; document.forms[0].elements[\'qtype\'].value = 3" " > -' . $radio . '</a ></li >';
echo '<li ><a href = "#" class="glyphicon glyphicon-resize-horizontal" id = "addScale"
        onclick = "document.forms[0].elements[\'qtype\'].value = 4" " > -' . $scale. '</a ></li>';
echo '<li ><a href = "#" class="glyphicon glyphicon-picture" id = "addScale"
        onclick = "document.forms[0].elements[\'qtype\'].value = 5" " > -' . $picture. '</a ></li>';
echo '<li ><a href = "#" class="glyphicon glyphicon-sound-stereo" id = "addScale"
        onclick = "document.forms[0].elements[\'qtype\'].value = 6" " > -' . $sound. '</a ></li>';
echo '<li ><a href = "#" class="glyphicon glyphicon-hd-video" id = "addScale"
        onclick = "document.forms[0].elements[\'qtype\'].value = 7" " > -' . $video. '</a ></li>';
echo '</ul >';
$result->free();
?>
