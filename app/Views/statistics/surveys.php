<?php foreach($surveys as $survey): ?>
<div class="card mb-5">
    <div class="card-header">
        <?= $survey['title'] ?>
    </div>
    <div class="card-body">
        <?php foreach($questions as $question): ?>
        <h4 class="font-weight-bold mb-3"><?= $question['question'] ?></h4>

        <?php foreach($answers as $answer): ?>
        <?php if($question['id'] == $answer['question_id']): ?>

        <h4 class="small font-weight">
            <?= $answer['answer'] ?>
            <span class="float-right">
                <?php foreach($user_answers as $key => $value): ?>
                <?= $answer['id'] == $key ? $value : null ?>
                <?php endforeach ?> 
            </span>
        </h4>
        <div class="progress mb-4">
            <?php foreach($user_answers as $key => $value): ?>
            <div class="progress-bar" role="progressbar" style="width:
                <?= $answer['id'] == $key ? $value / count($answers) * 100 : null ?>%
            " aria-valuemin="0" aria-valuemax="100"></div>
            <?php endforeach ?>
        </div>

        <?php endif ?>
        <?php endforeach ?>

        <?php endforeach ?>
    </div>
</div>
<?php endforeach ?>