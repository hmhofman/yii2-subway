<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-4">
                <h2>Login</h2>

                <p>In order to utalize this application, you have to login.
                2 logins are allready available; <span class='code'>admin</span> (password: <span class='code'>admin</span>) and <span class='code'>herman</span> (password: <span class='code'>herman</span>). For more information on creating users checkout <span class='code'>controllers/SiteControlller:actionAddAdmin</span><br >
                <a class="btn btn-outline-secondary" href="/index.php?r=site/add-admin">Create users &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Work In Progress</h2>

                <p>I started this demonstration project to show/test my skills. Never did anything with Yii before. The layout of the MVC project is simulart (nog equal) to that of Laravel. I'm still lokking for feature I miss. Laraval seems to be leaning much more towards client-side functionality (with VueJS), while Yii is more basic: a DIY project.
                <br />
                The demo's I've read all push the models into a single directory. Cluttering that same folder with models for forms. Personally, I'd like to destinguish more within the models, seperating them by namespace and/or file hierarchy. And I'm not sure the forms definitions belong with the models.I guess it would nbe easier to split form functionality from the database model, but If that's the way to go, maybe create e new namespace: user\forms?
                <br />
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Final words</h2>

                <p>I'm not done yet, so... no final words yet. </p>

                <!--<p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
            </div>
        </div>
</div>
