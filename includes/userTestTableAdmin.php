<section class="testForm" id="questionTitle">
    <div class="container">
        <input type="hidden" value="<?php echo $surveyId; ?>" id="surveyId">
        <fieldset class="fieldset">
            <legend class="title-bold">
                <a id="hidesurvey">
                    <h4 class="glyphicon glyphicon-book"></h4> Потребителски анкети <span class="caret"></span></a>
            </legend>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group" id="survey">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col"><span class="glyphicon glyphicon-star"></span></th>
                                <th scope="col"><span class="glyphicon glyphicon-book"></span> Заглавие</th>
                                <th scope="col"><span class="glyphicon glyphicon-user"></span> Автор</th>
                                <th scope="col" class="text-center"><span class="glyphicon glyphicon-calendar"></span> Дата на създаване</th>
                                <th scope="col" class="text-center"><span class="glyphicon glyphicon-ok"></span> Брой попълвания</th>
                                <th scope="col" class="text-center"><span class="glyphicon glyphicon-signal"></span> Графика</th>
                                <th scope="col"><span class="glyphicon glyphicon-erase"></span> Изтриване</th>
                            </tr>
                            </thead>
                            <tbody>

