<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="row">
<div class="col-lg-9">
<?php $form = ActiveForm::begin(['action' => ['login/insertform'],'options' => ['enctype' => 'multipart/form-data'],'method'=>'post']); ?>
<?= $form->field($model, 'c_title')->input('text')->label('标题') ?>
<?= $form->field($model, 'c_content')->textarea()->label('内容') ?>
<?= $form->field($model, 'c_photo')->fileInput()->label('图片') ?>
<?= $form->field($model, 'c_j')->textInput()->label('优先级') ?>
<div class="form-group">
    <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
</div>
<h1>欢迎<?php
$session = Yii::$app->session;
echo $session['name']?>登录</h1>
<!--<h1>欢迎<?php echo $_COOKIE['name']?>登陆</h1>-->
<table border="1">
    <tr>
        <td><input type="checkbox" /></td>
        <td>标题</td>
        <td>内容</td>
        <td>状态</td>
        <td>图片</td>
        <td>操作</td>
    </tr>
    <?php foreach($data as $v){?>
    <tr>
        <td><input type="checkbox"/></td>
        <td><?php echo $v['c_title']?></td>
        <td><?php echo $v['c_content']?></td>
        <td>
		<?php 
			if($v['c_lock']==1){
		?>
		审核已通过
		<?php
			}elseif($v['c_lock']==2){
		?>
		未审核
		<?php	
			}
		?>
		</td>
        <td>
			<img src="http://www.php.com/yiitest/backend/web/uploads/<?php echo $v['c_photo']?>" width="100">
		</td>
        <td><a href="<?= Yii::$app->UrlManager->createUrl(['login/delete'])?>&id=<?= $v['c_id']?>">删除</a>||<a href="<?= Yii::$app->UrlManager->createUrl(['login/update'])?>&id=<?= $v['c_id']?>">修改</a></td>
    </tr>
    <?php }?>
</table>