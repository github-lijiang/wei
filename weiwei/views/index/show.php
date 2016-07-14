<!DOCTYPE html>
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" style=""><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>后台管理</title>
</head>
<body>
<div class="container clearfix">
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="file:///jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">IP管理</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="index.php?r=index/add"><i class="icon-font"></i>新增公众号</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tbody>

                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>ID</th>
                            <th>昵称</th>
                            <th>微信号</th>
                            <th>APPID</th>
                            <th>APPSECRET</th>
                            <th><center>操作</center></th>
                        </tr>
                        <?php
                        foreach($arr as $val) {
                            ?>
                            <tr>
                                <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                                <td><?php echo $val['id'] ?></td>
                                <td><?php echo $val['niname'] ?></td>
                                <td><?php echo $val['weixin'] ?></td>
                                <td><?php echo $val['appid'] ?></td>
                                <td><?php echo $val['appsecret'] ?></td>

                                <td><center>
                                        <a class="link-del" href="index.php?r=index/del&id=<?php echo $val['id'] ?>" >删除&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;<a class="link-del" href="index.php?r=index/check&id=<?php echo $val['id'] ?>" >修改</a>
                                    </center>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                        </tbody></table>

                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body></html>
