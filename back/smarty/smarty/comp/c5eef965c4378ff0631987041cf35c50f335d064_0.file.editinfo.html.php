<?php
/* Smarty version 3.1.33, created on 2019-07-26 09:03:40
  from 'C:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\login\editinfo.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3aa5cc4832d4_59626717',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5eef965c4378ff0631987041cf35c50f335d064' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\login\\editinfo.html',
      1 => 1564124616,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d3aa5cc4832d4_59626717 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>留言版註冊</title>
    <meta charset="utf-8">
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
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 915px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }

        #title {
            text-align: center
        }

        .errorred {
            color: darkred;
        }

        #user {
            font-size: 15px;
            color: white;
            position: relative;
            top: 15px;
            left: 800%;
            cursor: default;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../back/controller/index.php">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($_smarty_tpl->tpl_vars['loginflag']->value) {?>
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
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <form class="form-horizontal" action='../../back/controller/reg.php' method='post' id='editinfoform'>
                    <fieldset>
                        <!-- Form Name -->
                        <legend id='title'>
                            <h2>會員資料修改</h2>
                        </legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">姓名</label>
                            <div class="col-md-4">
                                <input id="userName" name="userName" type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['userName'];?>
"
                                    placeholder="" class="form-control input-md">
                                <span class="help-block">請輸入姓&nbsp&nbsp名最大字數限制20個字</span>
                                <span class='errorred' id='userNameInfo'>&nbsp</span>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">email</label>
                            <div class="col-md-4">
                                <input id="email" name="email" type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['email'];?>
" placeholder=""
                                    class="form-control input-md">
                                <span class="help-block">ex:example@com</span>
                                <span class='errorred' id='emailInfo'>&nbsp</span>
                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-8">
                                <button id="regsend" type='button' class="btn btn-info">確認修改</button>
                                <a href='./editreg.php'><button type='button' class="btn btn-danger">取消</button></a>
                                <span class='errorred' id='errorInfo'>&nbsp</span>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-sm-2 sidenav">
            </div>
        </div>

        <?php echo '<script'; ?>
>
            /*必須將contentType選項設置為false，強制jQuery不Content-Type為您添加標題，否則，邊界字符串將丟失。
            必須將processData標誌設置為false，否則，jQuery將嘗試將FormData轉換為字符串，將失敗。*/
            $("#regsend").click(function () {
                let userName = $('#userName').val();
                let email = $('#email').val();
                if (userName === "" || email === "") {
                    $('#errorInfo').html("還有欄位未填");
                    return false;
                }

                if (userName.length > 20) {
                    $('#userNameInfo').html("超過字數上限");
                    return false;
                }

                let emailpatt = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
                if (email.search(emailpatt) === -1) {
                    $('#emailInfo').html("請輸入正確的eamil");
                    return false;
                }

                let editinfoform = document.getElementById('editinfoform')
                let fd = new FormData(editinfoform);
                let res = ['email', 'userName', 'error'];
                for (error of res) {
                    $('#' + error + 'Info').html("&nbsp");
                }
                $.ajax({
                    url: "../../back/controller/editinfoback.php",
                    type: "POST",
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    data: fd,
                    success: function (result) {
                        if (typeof (result) == 'object') {
                            for (error of res) {
                                $('#' + error + 'Info').html(result[error]);
                            }
                        } else if (result == 1) {
                            alert('修改成功');
                            $(window).attr('location', './editreg.php');
                        } else if (result == 2) {
                            alert('請先登入會員');
                            $(window).attr('location', './login.php');
                        } else {
                            alert('修改失敗');
                        }
                    }
                });
            });
        <?php echo '</script'; ?>
>
</body>

</html><?php }
}
