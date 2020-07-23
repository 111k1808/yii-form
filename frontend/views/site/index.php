<?php

/* @var $this yii\web\View */
/**@var $msg*/

$this->title = 'Feedback form';
?>
<main>
    <h1 class="main-title"><?=$this->title?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="/echo" method="post" oninput="daysoutput.value=dayscount.value">
                    <fieldset>
                        <legend>Review</legend>
                        <textarea id="4" rows="5" cols="60">Write something!</textarea>
                    </fieldset>
                    <div class="buttons">
                        <input type="submit" value="Оценить">
                        <input type="reset" value="Сбросить">
                    </div>
                </form>
            </div>
            <div class="col-md-6">

                <div class="row">
                    <?php foreach ($msg as $comment):  ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?=$comment->user->avatar?>" alt="avatar" width="50" height="50">
                                <p><?=$comment->creation_time?></p>
                            </div>
                            <div class="col-md-6">
                                <h3><?=$comment->user->username?></h3>
                                <p><?=$comment->comment?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>

            </div>
        </div>
    </div>
</main>
