<section class="testForm">
    <div class="container">
        <fieldset class="fieldset">
            <form method="post" id="save-answer" action="saveAnswers.php">
                <legend>
                    <div class="title-bold"><?php echo $title ?></div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-xs-6">
                            <h5><?php echo $instruction ?></h5>
                        </div>
                        <div class="col-sm-6 col-md-6 col-xs-6">
                            <h5 class="text-right"> автор: <strong class="text-uppercase"><?php print $autor ?></strong>
                            </h5>
                        </div>
                    </div>
                </legend>
                <input type="hidden" name="title" value="<?php echo $title; ?>">


