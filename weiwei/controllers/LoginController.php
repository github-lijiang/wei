<?php
namespace app\controllers;
use yii\web\Controller;
class LoginController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionLogin()
    {

        $request=\Yii::$app->request;
        $db=\Yii::$app->db;
        if ($request->isPost){

            //结值方式
            $username=$request->post("username");
            $password=md5($request->post("password"));
            //sql语句

            $arr=$db->createCommand("select * from user where username= '$username'and password='$password'")->queryAll();


            // $ip=$_SERVER["REMOTE_ADDR"];

            if($arr)
            {
                $session = \Yii::$app->session;
                $session->open();
                $session->set('username', $arr[0]['username']);

                return $this->redirect("index.php?r=index/index");

            }
            else
            {
                echo "<script>alert('登陆失败');location.href='index.php?r=login/login'</script>";

            }


            //return $this->redirect("index.php?r=index/index");
        }else{
            return $this->renderPartial('login');
        }
    }
        public function actionRemove(){
        $session =\ Yii::$app->session;
        $session->open();
        $session->remove('username');
        return $this->redirect("index.php?r=login/login");
    }




}