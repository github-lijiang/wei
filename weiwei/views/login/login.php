<?php
use yii\helpers\Url;
$ad_src=Yii::$app->request->baseUrl.'/../';
?>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="<?=$ad_src?>public/js/jq.js"></script>
    <script type="text/javascript" src="<?=$ad_src?>public/js/login.js"></script>
    <link href="<?=$ad_src?>/public/css/login2.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        var add="<?=Url::toRoute('site/login');?>";
        var ad_index="<?=Url::toRoute('user/index');?>";
        var ad_code="<?=Url::toRoute('site/verify');?>";
        var ad_error="<?php echo isset(Yii::$app->session['error'])?Yii::$app->session['error']:0;?>"
    </script>
</head>
<body>
<h1>微信公众<sup>2016</sup></h1>
<div class="login" style="margin-top:50px;">
    <div class="web_qr_login" id="web_qr_login" style="display: block; height: 235px;">
        <!--登录-->
        <div class="web_login" id="web_login">
            <div class="login-box">
                <div class="login_form">
                    <form action="index.php?r=login/login" name="loginform" accept-charset="utf-8" id="login_form" class="loginForm" method="post">
                        <input type="hidden" name="did" value="0"/>
                        <input type="hidden" name="to" value="log"/>
                        <div id="userGue" class="gue"></div>
                        <div class="uinArea" id="uinArea">
                            <div class="inputOuter" id="uArea">
                                <input type="text" id="u" name="username" class="inputstyle" placeholder="支持用户名/邮箱/手机号登录"/>
                            </div>
                        </div>
                        <div class="pwdArea" id="pwdArea">
                            <div class="inputOuter" id="pArea">
                                <input type="password" id="p" name="password" class="inputstyle" placeholder="密码"/>
                            </div>
                        </div>
                        <div style="padding-left:50px;margin-top:20px;"><input type="submit" value="登 录" id="btn" style="width:150px;" class="button_blue"/></div>
                    </form>
                </div>
            </div>
        </div>
        <!--登录end-->
    </div>

</div>
<div class="jianyi">本项目最终解释权归OneTeam微信开发团队所有</div>
</body></html>