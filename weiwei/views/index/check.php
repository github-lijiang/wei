<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="./assets/js/commonss.css">
    <link rel="stylesheet" type="text/css" href="./assets/js/mainss.css">
    <script type="text/javascript" src="./assets/js/modernizrss.js"></script>
</head>
<body>

<div class="container clearfix">
    <include file="Public:left" />
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="index.php?r=index/checks" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th><i class="require-red">*</i>呢称：</th>
                            <td>
                                <input class="common-text required" id="title" name="niname" size="50" value="<?php echo $arr['niname']?>" type="text" placeholder="请输入呢称">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>微信号：</th>
                            <td>
                                <input class="common-text required" id="title" name="weixin" size="50" value="<?php echo $arr['weixin']?>" type="text" placeholder="请输入微信号">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>appid：</th>
                            <td>
                                <input class="common-text required" id="title" name="appid" size="50" value="<?php echo $arr['appid']?>" type="text" placeholder="请输入appid">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>appsecret：</th>
                            <td>
                                <input class="common-text required" id="title" name="appsecret" size="50" value="<?php echo $arr['appsecret']?>" type="text" placeholder="请输入appsecret">
                            </td>
                        </tr>

                        <tr>
                            <th></th>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $arr['id']?>" />
                                <input class="btn btn-primary btn6 mr10" value="修改" id="button" type="submit">
                                <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button" >
                            </td>
                        </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
<script src="jq.js">

</script>
<script >
    // $("#button").click(function(){
    //     var ip=$("#title").val();
    //     $.ajax({
    //         url:"index.php?r=index/add",
    //         type:"POST",
    //         data:{
    //             ip:ip
    //         },
    //         success:function(data){
    //             if(data == 1){
    //                 alert("已经添加过这个IP了")
    //             }else{
    //                 alert("添加成功")
    //             }
    //         }
    //     })
    // })
</script>