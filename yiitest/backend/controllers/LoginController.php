<?php

namespace backend\controllers;
use Yii;
use backend\models\Login;
use backend\models\Content;

use yii\web\UploadedFile;





class LoginController extends \yii\web\Controller
{
	/*显示登录表单*/
    public function actionIndex()
    {
		$model=new Login();
		$arr=$model->find()->asArray()->all();
		$cookies=Yii::$app->request->cookies;
		$sk=$cookies->getValue('name');
		$sks=unserialize($sk);
		$pwd=$sks[0]['pwd'];
		$model->l_pwd=$sks[0]['pwd'];
		$model->l_name=$sks[0]['name'];
        return $this->render('index',[
			'model'=>$model,
			'arr'=>$arr,
			'data'=>$sks,
			]);
    }
	/*验证登录*/
	public function actionSelectlogin(){
		$arr=Yii::$app->request->post("Login");
		$name=$arr['l_name'];
		$pwd=$arr['l_pwd'];
		$mm=isset($_POST['l_mm'])?$_POST['l_mm']:"";
		$db=Yii::$app->db;
		$st=$db->createCommand("select *from login where l_name='$name' and l_pwd='$pwd'")->queryOne();
		/*用户名存session*/
		$session = Yii::$app->session;
		$session->open();
		$session->set('name', $name);
		$cookies = Yii::$app->response->cookies;
		$num=$cookies->getvalue($name."pwd",0);
		if($st){
			//记住密码设置cookie
			if($mm==1){
				$ck[]=array('pwd'=>$pwd,'name'=>$name);
				$cks=serialize($ck);
				$cookies -> add(new \yii\web\Cookie([
					'name'=>'name',
					'value'=>$cks,
					'expire'=>time()+3600*12
				]));
			}
			return $this->redirect("index.php?r=login%2Flist");
		}else{
			$num++;
			$cookies->add(new \yii\web\Cookie([
			    'name' => $name."pwd",
			    'value' => $num,
			]));
			if($num<=3){
				echo "<script>alert('密码错误。账号锁定');location.href='index.php?r=login%2Findex'</script>";
			}else{
				echo "<script>alert('密码错误');location.href='index.php?r=login%2Findex'</script>";
			}
		}
		
	}
	/*表单提交面展示*/
	public function actionInsertform(){
		$arr=Yii::$app->request->post("Content");
		$title=$arr['c_title'];
		$content=$arr['c_content'];
		$j=$arr['c_j'];
		
		//图片上传
		$model = new Content();
        if (Yii::$app->request->isPost) {
            $re=$model->c_photo = UploadedFile::getInstances($model, 'c_photo');
            if ($model->upload()) {
                // 文件上传成功
                return;
            }
        }
		$photo=$re[0]->name;
		$db=Yii::$app->db;
		$st=$db->createCommand("insert into content(c_title,c_content,c_photo,c_j) values('$title','$content','$photo','$j')")->execute();
		if($st){
			return $this->redirect("index.php?r=login%2Flist");
		}		
		
	}
	/*展示列表*/
	public function actionList(){
		/*$db=Yii::$app->db;
		$st=$db->createCommand("select *from content")->queryAll();*/
		$model=new Content;
		$st=$model->find()->asArray()->all();
		return $this->render('list',[
			"model"=>$model,
			"data"=>$st,
		]);
	}
	/*删除记录*/
	public function actionDelete(){
		$id=$_GET['id'];
		$db=Yii::$app->db;
		$re=$db->createCommand()->delete('content', "c_id = '$id'")->execute();
		if($re){
			return $this->redirect("index.php?r=login%2Flist");
		}else{
			echo "删除失败";
		}
	}
	/*修改内容*/
	public function actionUpdate(){
		$id=$_GET['id'];
		$db=Yii::$app->db;
		$re=$db->createCommand()->update('content', ['c_id' => "$id"])->execute();
		
	}
}
