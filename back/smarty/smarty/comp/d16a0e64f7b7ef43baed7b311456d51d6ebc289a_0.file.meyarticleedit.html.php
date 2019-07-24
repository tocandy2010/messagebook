<?php
/* Smarty version 3.1.33, created on 2019-07-24 16:28:41
  from 'D:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\message\meyarticleedit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d386b1983d1d4_68928527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd16a0e64f7b7ef43baed7b311456d51d6ebc289a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\message\\meyarticleedit.html',
      1 => 1563978439,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d386b1983d1d4_68928527 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>留言版</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <style>
        #title {
            text-align: center
        }

        .errorred {
            color: darkred;
        }

        #contenttext {
            resize: none;
            overflow-Y: scroll;
        }

        .lenerror {
            display: none;
            color: darkred;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../../back/controller/index.php">首頁</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($_smarty_tpl->tpl_vars['loginflag']->value) {?>
                    <li><a href=''><span></span>歡迎登入&nbsp<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['userName'];?>
</a></li>;
                    <li><a href='../../back/controller/newarticle.php'><span></span>發佈文章</a></li>;
                    <li><a href='../../back/controller/myarticle.php'><span></span>已發佈文章</a></li>;
                    <li><a href='../../back/controller/editreg.php'><span></span>修改會員</a></li>;
                    <li><a href='../../back/controller/logout.php'><span></span>登出</a></li>;
                    <?php } else { ?>
                    <li><a href='../../back/controller/login.php'><span></span>登入</a></li>;
                    <li><a href='../../back/controller/reg.php'><span></span>註冊</a></li>;
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav> 
    <form class="form-horizontal" action='' method='' id='articleeditform'>
        <fieldset>
            <!-- Form Name -->
            <legend id='title'>
                <h2>修改文章</h2>
            </legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="title">標題</label>
                <div class="col-md-4">
                    <input id="titletext" name="title" spellcheck="false" type="text" placeholder="" class="form-control input-md" value ='<?php echo $_smarty_tpl->tpl_vars['contentinfo']->value['content'];?>
'>
                    <span class="help-block">文字上限&nbsp:&nbsp<span id='titlelength'>10</span><span class='lenerror' id="titlelenerror">已到達文字上限</span></span>
                    <span class='errorred' id="titleInfo"></span>
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="content">文章內容</label>
                <div class="col-md-4">
                    <textarea class="form-control" spellcheck="false" id="contenttext" rows="25" name="content"><?php echo $_smarty_tpl->tpl_vars['contentinfo']->value['content'];?>
</textarea>
                    <span class="help-block">文字上限&nbsp:&nbsp<span id='contentlength'>10</span><span class='lenerror' id="contentlenerror">已到達文字上限</span></span>
                    <span class='errorred' id="contentInfo"></span>
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for=""></label>
                <div class="col-md-8">
                    <button id="articlesend" type='button' class="btn btn-success">修改</button>
                    <a href='./myarticle.php'><button id="" type='button' class="btn btn-danger">取消</button></a>
                </div>
            </div>
        </fieldset>
    </form>
    </div>
    <?php echo '<script'; ?>
>
        $().ready(function() {
            let res = ['title', 'content'];

            function getUrlParam(name) {
                var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
                var r = window.location.search.substr(1).match(reg);
                if (r != null) return decodeURI(r[2]);
                return null;
            }
            getconid = getUrlParam('conid');

        });
        
        $("#articlesend").click(function() {
            let articleeditform = document.getElementById('articleeditform')
            let fd = new FormData(articleeditform);
            fd.append('editconid', getconid);
            let res = ['title', 'content', 'error'];
            for (error of res) {
                $('#'+error+'Info').html("");
            }
            $.ajax({
                url: "../../back/controller/myarticleeditback.php",
                type: "post",
                dataType: "json",
                contentType: false,
                processData: false,
                data: fd,
                success: function(result) {
                    if (typeof(result) == 'object') {
                        for (error of res) {
                           $('#'+error+'Info').html(result[error]);
                        }
                    } else if (result == 1) {
                        alert('修改成功');
                        $(window).attr('location', '../../back/controller/myarticle.php');
                    } else {
                        alert('修改失敗');
                        $(window).attr('location', '../../back/controller/index.php');
                    }
                }
            });
        });
        let titleflag = true;
        let contentflag = true;
        $('#titletext').keyup(function() {
            let inplen = $('#titletext').val();
            if (inplen.length <= 10) {
                $('#titlelength').html(10 - inplen.length);
                $('#titlelenerror').attr("style", 'display:none');
                titleflag = true;
            } else {
                $('#titlelength').html(0);
                $('#titlelenerror').attr("style", 'display:inline-block');
                titleflag = false;
            }
            checkwordlen(titleflag, contentflag);
        })

        $('#contenttext').keyup(function() {
            let inplen = $('#contenttext').val();
            if (inplen.length <= contentmaxlen) {
                $('#contentlength').html(contentmaxlen - inplen.length);
                $('#contentlenerror').attr("style", 'display:none');
                contentflag = true;
            } else {
                $('#contentlength').html(0);
                $('#contentlenerror').attr("style", 'display:inline-block');
                contentflag = false;
            }
            checkwordlen(titleflag, contentflag);
        })

        function checkwordlen(a, b) {
            if ((titleflag === true) && (contentflag === true)) {
                $('#articlesend').attr("disabled", false);
            } else {
                $('#articlesend').attr("disabled", true);
            }
        }
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}