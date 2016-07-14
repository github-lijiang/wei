<?php
namespace app\controllers;
use yii\web\Controller;
use yii\data\Pagination;
class IndexController extends Controller
{
    public $layout="menu.php";
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $session = \Yii::$app->session;
        $session->open();
        $username=  $session->get('username');
        return $this->render('index',[
            'username' => $username
        ]);
    }
    public function actionAdd()
    {
        $request=\Yii::$app->request->method;
        $requests=\Yii::$app->request;
        $db=\Yii::$app->db;
        if ($request!="POST") {
            return $this->render("add");
        } else {

            $atoken=md5(rand(1,9));
            $niname=$requests->post('niname');
            $weixin=$requests->post('weixin');
            $appid=$requests->post('appid');

            $appsecret=$requests->post('appsecret');

            //print_r($aname);
            $db->createCommand()->insert('gongzhonghao', ['niname'=>$niname,'weixin'=>$weixin,'appid'=>$appid,'appsecret'=>$appsecret,'atoken'=>$atoken])->execute();

            return $this->redirect("index.php?r=index/show");
        }
    }
    public function actionShow()
    {

        $db=\Yii::$app->db;
        $query=  $db->createCommand("select * from gongzhonghao")->queryAll();
        //print_r($query);die;
//        $pagination = new Pagination([
//            'defaultPageSize' => 5,
//            'totalCount' => $query->count(),
//        ]);
//
//        $arr = $query->orderBy('aname')
//            ->offset($pagination->offset)
//            ->limit($pagination->limit)
//            ->all();

        return $this->render('show',
        [
        'arr' => $query,
        ]);

    }
    public function actionDel(){
        $requests=\Yii::$app->request;
        $db=\Yii::$app->db;
        $id=$requests->get("id");
        //echo $id;die;
        $db->createCommand()->delete('gongzhonghao',['id'=>$id])->execute();
        return $this->redirect("index.php?r=index/show");
    }
    public function actionCheck()
    {
        $requests=\Yii::$app->request;
        $db=\Yii::$app->db;
        //结值方式
        $id=$requests->get("id");

        $sql="select * from gongzhonghao where id='$id'";
        $arr=$db->createCommand($sql)->queryOne();

        // print_r($arr);die;
         return $this->render('check',['arr'=>$arr]);

    }
    public function actionChecks()
    {
        $request=\Yii::$app->request->method;
        $requests=\Yii::$app->request;
        $db=\Yii::$app->db;
        //var_dump($_POST);die;
        $id=$requests->post("id");

        //print_r($id);die;
        $niname=$requests->post('niname');

        $weixin=$requests->post('weixin');

        $appid=$requests->post('appid');

        $appsecret=$requests->post('appsecret');

        //sql语句
        $db->createCommand()->update('gongzhonghao',['niname'=>$niname,'weixin'=>$weixin,'appid'=>$appid,'appsecret'=>$appsecret],['id'=>$id])->execute();

        return $this->redirect("index.php?r=index/show");

    }
}