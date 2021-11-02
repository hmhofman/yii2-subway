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

                <p>For a detailed derscription oif the technical challenge, check the <span class="code">README.md</span> file in the root of this project.
                <br />
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Final words</h2>

                <p>Let's say our prayers and... </p>
                <div class="alert alert-info" role="alert">Bon Appetit.</div>

                <!--<p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
            </div>
        </div>
</div>
