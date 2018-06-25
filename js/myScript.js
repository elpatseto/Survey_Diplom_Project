//Глобални променливи
var txtAreaIndex = 1;
var q = 1;
var isAnswerField = false;
var choose = '';
var strText = '';
var countMethod = 0;
var brCheckNum = 0;
var brRadioNum = 0;

//Създаване на текстово поле
function createTextArea() {
    scroll();
    if (onlyOneOptionTxt() == false) {
        countMethod++;
        choose = "addTextField";
        isAnswerField = true;
        txtAreaIndex++;
        $('#section' + q + '').append('<div id="row' + txtAreaIndex + '">' +
            '<div class="row">' +
            '<div class=" col-md-8 col-xs-8">' +
            '<textarea disabled rows="2" name="name' + txtAreaIndex + '" class="form-control txtArea" id="txtField' + txtAreaIndex + '"></textarea></div>' +
            '<div class=" col-md-4 col-xs-4"><button type="button" id="' + txtAreaIndex + '" class="btn btn-danger btn_remove" onclick="deleteTxtArea(this.id)">X</button></div>' +
            '</div>' +
            '</div>');
    } else {
        swaEmptyOnlyOneMethodAloewd();
    }
}

//Създаване на отметки
function createCheckBox() {
    scroll();
    if (onlyOneOptionCheckBox() == false) {
        countMethod++;
        choose = "addCheckBox";
        isAnswerField = true;
        brCheckNum++;
        $('#section' + q + '').append('<div id="rowCheck' + brCheckNum + '">' +
            '<div class="row">' +
            '<div class="col-md-2 col-sm-6 col-xs-6">' +
            '<div class="form-check form-check-inline">' +
            '<label class="checkbox-inline ck_btn">' +
            '<input class="form-check-input big-checkbox" type="checkbox" name="quest[options][' + brCheckNum + ']" id="Checkbox' + brCheckNum + '" value="">' +
            '<input type="text" class="form-control " id="checkText' + brCheckNum + '">' +
            '</label>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2 col-sm-6 col-xs-6"><button type="button" id="' + brCheckNum + '" class="btn btn-danger btn_remove_chkB" onclick="deleteCheckBox(this.id)">X</button>' +
            '</div>' +
            '</div>');
    } else {
        swaEmptyOnlyOneMethodAloewd();
    }
}

//Създаване на радио бутони
function createRadio() {
    scroll();
    if (onlyOneOptionRadio() == false) {
        countMethod++;
        choose = "addRadio";
        isAnswerField = true;
        brRadioNum++;
        $('#section' + q + '').append('<div id="rowRadio' + brRadioNum + '">' +
            '<div class="row">' +
            '<div class="col-md-2 col-sm-6 col-xs-6">' +
            '<div class="form-check form-check-inline">' +
            '<div class="radio-inline rd_btn">' +
            '<label class="radio-inline"><input type="radio" name="optradio" id="radioBtn' + brRadioNum + '">' +
            '<input type="text" class="form-control radioTxt" id="radioText' + brRadioNum + '">' +
            '</label>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2 col-sm-6 col-xs-6">' +
            '<button type="button" id="' + brRadioNum + '" class="btn btn-danger btn_remove_radio" onclick="deleteRadio(this.id)">X</button>' +
            '</div>' +
            '</div>' +
            '</div>');
    } else {
        swaEmptyOnlyOneMethodAloewd();
    }
}

//Добавяне на нов въпрос
function createQuestion() {
    q++;
    isAnswerField = false;
    countMethod = 0;

    $('#newQuestion').append(
        '<div id="rowQuest' + q + '">' +
        '<hr>' +
        '<div class="row">' +
        '<div class="col-md-8 col-sm-8 col-xs-8">' +
        '<label class="questLabel" id="questLabel' + q + '">' + q + '.</label>' +
        '<input type="text" name="questName"  id="questName' + q + '" class="form-control"></div>' +
        '<div class="col-md-12 col-sm-12 col-xs-12">\n' +
        '<input type="checkbox" class="form-check-input" id="isRequired' + q + '">\n' +
        '<label class="label required-answer" id="labelAnswer' + q + '">Задължителен отговор</label>\n' +
        '</div>' +
        '</div>' +
        '<span id="section' + q + '"> </span>' +
        '</div>');
}

//Проверява дали е избана опция за отговор
function checkCountMethodValue() {
    if (countMethod == 0) {
        isAnswerField = false;
    }
}


//Изтриване на текстов отговор
function deleteTxtArea(clicked_id) {
    $('#row' + clicked_id + '').remove();
    countMethod--;
    checkCountMethodValue();
}

//Изтриване на отметки
function deleteCheckBox(clicked_id) {
    $('#rowCheck' + clicked_id + '').remove();
    countMethod--;
    checkCountMethodValue();
}

//Изтриване на радио
function deleteRadio(clicked_id) {
    $('#rowRadio' + clicked_id + '').remove();
    countMethod--;
    checkCountMethodValue();

}

//Изтриване на отметка за задължителен отговор
function deleteCheckboxForAnswer() {
    $('#isRequired' + q).remove();
    $('#labelAnswer' + q).remove();
}

//Проверка за избор на задължителен отговор
function answerRequired() {
    var x = document.getElementById("isRequired" + q).checked;
    var star = "*";
    var final = star.fontcolor("red");

    if (x == true) {
        $('#questName' + q + '').replaceWith(final + strText);
    } else {
        $('#questName' + q + '').replaceWith(' ' + strText);
    }

}

//Обработка на текстов отговор
function replaceTextFiled() {
    $('#' + txtAreaIndex + '').remove();
    answerRequired();
    deleteCheckboxForAnswer();
}

//Обработка на чекбокс отговор
function replaceCheckText() {
    for (var i = 1; i <= brCheckNum; i++) {
        try {
            var strCheckBox = document.getElementById('checkText' + i + '').value;
            var checkBoxImg = document.createElement("IMG");
            checkBoxImg.setAttribute("src", "../images/checkBoxImg.jpg");
            $('#checkText' + i + '').replaceWith(' ' + strCheckBox);
            $('#Checkbox' + i + '').replaceWith(checkBoxImg);
        } catch (err) {

        }
    }
    for (var i = 1; i <= brCheckNum; i++) {
        $('#' + i + '').remove();
    }
    answerRequired();
    deleteCheckboxForAnswer();
}

//Обработка на радио отоговор
function replaceRadio() {

    for (var i = 1; i <= brRadioNum; i++) {
        try {
            var strCheckBox = document.getElementById('radioText' + i + '').value;
            var radioImg = document.createElement("IMG");
            radioImg.setAttribute("src", "../images/radioImg.jpg");

            $('#radioBtn' + i + ' ').replaceWith(radioImg);
            $('#radioText' + i + '').replaceWith(' ' + strCheckBox);

        } catch (err) {

        }
    }
    for (var i = 1; i <= brRadioNum; i++) {
        $('#' + i + '').remove();
    }
    answerRequired();
    deleteCheckboxForAnswer();
}

//Проверка за празен текст на въпрос
function checkEmptyQuestion() {
    strText = document.getElementById('questName' + q + '').value;
    if (strText != '' && choose == 'addTextField' || strText != '' && choose == '') {
        if (isAnswerField == true) {
            saveQuestionRequest();
            replaceTextFiled();
            createQuestion();
        } else {
            swaEmptyAnswerTypе();
        }
    } else if (strText != '' && choose == 'addCheckBox') {
        if (isAnswerField == true) {
            saveQuestionRequest();
            checkCheckBoxForEmptyFields();
        } else {
            swaEmptyAnswerTypе();
        }
    } else if (strText != '' && choose == 'addRadio') {
        if (isAnswerField == true) {
            saveQuestionRequest();
            checkRadioForEmptyFields();
        } else {
            swaEmptyAnswerTypе();
        }
    } else {
        swaEmptyField();
    }
}

//Проверява дали са попълнени полетата на чекбоксите
function checkCheckBoxForEmptyFields() {
    var flagSuccess = false;
    for (var i = 1; i <= brCheckNum; i++) {
        try {
            var chBText = document.getElementById('checkText' + i + '').value;
        } catch (err) {

        }
        if (chBText == '') {
            swaEmptyOptionInput();
            flagSuccess = true;
        }
    }
    if (flagSuccess == false) {
        replaceCheckText();
        createQuestion();
    }
}

//Проверява дали са попълнени полетата на радиото
function checkRadioForEmptyFields() {
    var flagSuccess = false;
    for (var i = 1; i <= brRadioNum; i++) {
        try {
            var radioText = document.getElementById('radioText' + i + '').value;
        } catch (err) {

        }
        if (radioText == '') {
            swaEmptyOptionInput();
            flagSuccess = true;
        }
    }
    if (flagSuccess == false) {
        replaceRadio();
        createQuestion();
    }
}

//Проверка за само избор на само една опция - текст
function onlyOneOptionTxt() {
    if (countMethod > 0 && isAnswerField == true) {
        return true;
    }
    return false;
}

//Проверка за само избор на само една опция - чекбокс
function onlyOneOptionCheckBox() {
    if (countMethod > 0 && isAnswerField == true && choose != "addCheckBox") {
        return true;
    }
    return false;
}

//Проверка за само избор на само една опция - радио
function onlyOneOptionRadio() {
    if (countMethod > 0 && isAnswerField == true && choose != "addRadio") {
        return true;
    }
    return false;
}

//
function saveQuestionRequest() {
    var chkAnswers = [];
    var chkOptions = [];

    for (var i = 0; i < document.forms[0].elements.length; i++) {
        var currentElement = document.forms[0].elements[i];
        if ((currentElement.id.substr(0, 9) == "checkText") || (currentElement.id.substr(0, 9) == "radioText")) {
            chkOptions.push(currentElement.value);
        }
        if ((currentElement.id.substr(0, 8) == "Checkbox") || (currentElement.id.substr(0, 8) == "radioBtn")) {
            chkAnswers.push(currentElement.checked);
        }
        if (currentElement.id.substr(0, 8) == "txtField") {
            txtField = currentElement.value;
        }

        if (document.getElementById("isRequired" + q).checked == false) {
            var required = 0;
        } else {
            required = 1;
        }

        var question = {
            qType: document.getElementById("qtype").value,
            surveyId: document.getElementById("surveyId").value,
            title: document.getElementById("questName" + q).value,
            required: required,
            options: chkOptions,
            correctAnswers: chkAnswers
        };
    }

    $.post("saveQuestion.php", question,
        function (data, status) {
            //alert("Data: " + data + "\nStatus: " + status);
        });
}

function setSurveyUrl() {

    if (q > 1) {
        checkEmptyQuestion();
        var url = "index.php";
        var object = {
            sId: document.getElementById("surveyId").value
        };

        $.post("saveQuestion.php", object,
            function (data) {

            });

        swal("Поздравления", "Успешно създадохте анкета!", "success");
        setTimeout(function () {
            window.location = url;
        }, 2000);
    } else {
        swaNeedOneQuestio();
    }
}

function swaNeedOneQuestio() {
    sweetAlert({
        title: "ВНИМАНИЕ!",
        text: "Необходимо е да въведете поне 1 въпрос!",
        type: "warning"
    });
}

//Известие за празно поле на въпрос
function swaEmptyField() {
    sweetAlert({
        title: "ВНИМАНИЕ!",
        text: "Полето за въпрос не може да бъде празно!",
        type: "warning"
    });
}

//Известие за избор на опция за отговор
function swaEmptyAnswerTypе() {
    sweetAlert({
        title: "ВНИМАНИЕ!",
        text: "Необходимо е да изберете начин за отговор!",
        type: "warning"
    });
}

//Известие попълване на поле за отговор
function swaEmptyOptionInput() {
    sweetAlert({
        title: "ВНИМАНИЕ!",
        text: "Полето за възможна опция не може да бъде празно!",
        type: "warning"
    });
}

//Известие за избор само една опция за отговор
function swaEmptyOnlyOneMethodAloewd() {
    sweetAlert({
        title: "ВНИМАНИЕ!",
        text: "Може да избирате само един вид опция за отговор!",
        type: "warning"
    });
}

//Моля пъпълнете задължителните въпроси
function swaFillRequiredQuestion() {
    sweetAlert({
        title: "ВНИМАНИЕ!",
        text: "Въпросите със звездичка изискват задължителен отговор!",
        type: "warning"
    });
}

function swaWrongUser() {
    sweetAlert({
        title: "ВНИМАНИЕ!",
        text: "Невалидно потребителско име или парола!",
        type: "warning"
    });
}

function swaDelete(sId) {
    swal({
            title: "Сигурни ли сте?",
            text: "Анкетата ще бъде изтрита!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Да, изтриване!",
            cancelButtonText: "Не, размислих!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {
            if (isConfirm) {
                var url = "deleteSurvey.php?surveyID=" + sId;
                window.location.href = url;
            } else {
                swal("Отменено!", "Анкетата е спасена :)", "error");
                return false;
            }
        });
}

function swaDeleteUser(user) {
    swal({
            title: "Сигурни ли сте?",
            text: "Този потребител ще бъде изтрит от системата!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Да, изтриване!",
            cancelButtonText: "Не, размислих!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {
            if (isConfirm) {
                var url = "deleteUser.php?username=" + user;
                window.location.href = url;
            } else {
                swal("Отменено!", "Този потребител оцеля! :)", "error");
                return false;
            }
        });
}

function getUrl(surveyUrl) {
    var url = "http://localhost/Survey_Diplom_Project/includes/" + surveyUrl;
    swal({
        title: "Изпращане на линк",
        text: url,
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        inputPlaceholder: "someone@yahoo.com"
    }, function (email) {
        if (email === false) return false;
        if (email === "") {
            swal.showInputError("Необходимо е да въвдете имейл адрес!");
            return false
        }
        window.location = 'mailto:' + email + '?subject=' + 'Анкета' +
            '&body=' + 'Моля попълнете анкетата - ' + url;
        swal( email , "Очаква вашата анкета!", "success");
    });
}

function SaveScrollXY() {
    document.forms.ScrollX.value = document.body.scrollLeft;
    document.forms.ScrollY.value = document.body.scrollTop;
}

function ResetScrollPosition() {
    var hidx, hidy;
    hidx = document.forms.ScrollX;
    hidy = document.forms.ScrollY;
    if (typeof hidx != "undefined" && typeof hidy != "undefined") {
        window.scrollTo(hidx.value, hidy.value);
    }
}

function scroll() {
    $('html, body').animate({
        scrollTop: $("#qtype").offset().top
    }, 1000);
}


function swaSuccessfullyFillTest() {
    swal("Благодарим Ви!",
        "Вашите отговори са отчетени!", "success")
}

function swaHelloNewUser() {
    swal("Благодарим Ви за регистрацията!",
        "Вече може да се логнете!", "success")
}

function swaHelloUser() {
    swal("Здравейте !",
        "Желаем Ви приятни емоции в сайта!", "success")
}

function changeCSSWrong(current) {
    var changeStyle = document.getElementById(current);
    changeStyle.style.color = "red";
    changeStyle.style.backgroundColor = "#f2c1c1";
    changeStyle.style.borderRadius = "7px";
}

function changeCSSGood(current) {
    var changeStyle = document.getElementById(current);
    changeStyle.style.backgroundColor = "#d0d0d0";
    changeStyle.style.color = "black";
}

function submitSurvey() {
    for (var i = 0; i < reqQuest.length; i++) {
        if (reqQuest_types[i] == 1) {
            if (document.forms[0].elements['question[' + reqQuest[i] + ']'].value == "") {
                changeCSSWrong('q' + reqQuest[i]);
                swaFillRequiredQuestion();
                return false;
            } else {
                changeCSSGood('q' + reqQuest[i]);
            }
        } else if (reqQuest_types[i] == 3) {
            var radioGroup = document.forms[0].elements['question[' + reqQuest[i] + ']'];
            var flag = false;

            for (var j = 0; j < radioGroup.length; j++) {
                if (radioGroup[j].checked) {
                    flag = true;
                    break;
                }
            }
            if (!flag) {
                changeCSSWrong('q' + reqQuest[i]);
                swaFillRequiredQuestion();
                return false;
            } else {
                changeCSSGood('q' + reqQuest[i]);
            }
        } else if (reqQuest_types[i] == 2) {
            var checkGroup = document.forms[0].elements['question[' + reqQuest[i] + '][]'];
            var flag = false;

            for (var k = 0; k < checkGroup.length; k++) {
                if (checkGroup[k].checked) {
                    flag = true;
                    break;
                }
            }
            if (!flag) {
                changeCSSWrong('q' + reqQuest[i]);
                swaFillRequiredQuestion();
                return false;
            } else {
                changeCSSGood('q' + reqQuest[i]);
            }
        }
    }
    document.forms[0].submit();
}

function deleteSurvey() {
    swaDelete();
}

function showAnswer() {
    document.getElementById("show-answers").submit();

}

function goBackToAnswers() {
    var url = "userAnswers.php";
    window.location = url;
}


$(document).ready(function () {
    $("#usershide").click(function () {
        $("#users").fadeToggle(500);
    });
});

$(document).ready(function () {
    $("#hidesurvey").click(function () {
        $("#survey").fadeToggle(500);
    });
});

$(document).ready(function () {
    $("#hideother").click(function () {
        $("#other").fadeToggle(500);
    });
});











