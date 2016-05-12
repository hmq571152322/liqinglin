<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<!--
<h1>login/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>-->

<div class="row">
<div class="col-lg-9">
<?php $form = ActiveForm::begin(['action' => ['login/selectlogin'],'method'=>'post']); ?>
<?= $form->field($model, 'l_name')->input('text')->label('用户名') ?>
<?= $form->field($model, 'l_pwd')->input('password')->label('密码') ?>
<!--密码：<br/><br/><input type="password" name="l_pwd" value="<?php echo $data[0]['pwd']?>">-->

<input type="radio" value="1" name="l_mm"/>  记住密码
<div class="form-group">
    <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
</div>
