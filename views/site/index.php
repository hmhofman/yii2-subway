<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Welcome!</h1>

        <p class="lead">In this site you can order your sandwitch from the Subway Restaurant...</p>
        <img src="https://www.subway.com/-/media/Base_English/Images/Branding/subway-logo-new.png?h=44&iar=0&w=222&hash=CDB124300E029828BEC5C9C3D48FB55D">
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-12 text-center">
            </div>
            <div class="col-lg-12">
                Hi <?= (Yii::$app->user->isGuest) ? 'Guest' : Yii::$app->user->identity->username; ?>, <br />
                Do you want something to eat?
                <?php if (Yii::$app->user->isGuest) : ?>
                <a href="/index.php?r=site%2Flogin">login</a> and
                <?php else : ?>Please
                <?php endif; ?>register your meal here:
                <a class="btn btn-outline-secondary" href="/index.php?r=order/index">Register my meal &raquo;</a></p>

            </div>
        </div>
    </div>
</div>
