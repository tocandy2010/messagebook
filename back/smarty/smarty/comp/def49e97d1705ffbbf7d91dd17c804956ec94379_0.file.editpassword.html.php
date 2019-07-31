<?php
/* Smarty version 3.1.33, created on 2019-07-30 08:41:33
  from 'C:\xampp\htdocs\MessageBook\back\smarty\smarty\temp\login\editpassword.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3fe69df2b583_28543475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'def49e97d1705ffbbf7d91dd17c804956ec94379' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MessageBook\\back\\smarty\\smarty\\temp\\login\\editpassword.html',
      1 => 1564468892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\MessageBook\\back\\public\\header.html' => 1,
  ),
),false)) {
function content_5d3fe69df2b583_28543475 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:\xampp\htdocs\MessageBook\back\public\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'會員密碼修改'), 0, false);
?>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <form class="form-horizontal">
                    <fieldset>
                        <!-- Form Name -->
                        <legend id='title'>
                            <h2>會員密碼修改</h2>
                        </legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">舊密碼</label>
                            <div class="col-md-4">
                                <input id="oldpassword" name="oldpassword" type="password" placeholder=""
                                    class="form-control input-md">
                                <span class="help-block">請輸入舊密碼</span>
                                <span class='errorred' id='oldpasswordInfo'>&nbsp</span>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">新密碼</label>
                            <div class="col-md-4">
                                <input id="password" name="password" type="password" placeholder=""
                                    class="form-control input-md">
                                <span class="help-block">請輸入6~20位數 英文或數字&nbsp&nbsp&nbsp禁止輸入任何符號</span>
                                <span class='errorred' id='passwordInfo'>&nbsp</span>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="">確認新密碼</label>
                            <div class="col-md-4">
                                <input id="repassword" name="repassword" type="password" placeholder=""
                                    class="form-control input-md">
                                <span class="help-block">與新密碼相同</span>
                                <span class='errorred' id='repasswordInfo'>&nbsp</span>
                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-8">
                                <button id="regsend" type='button' class="btn btn-info">確認修改</button>
                                <a href='./editreg.php'><button type='button' class="btn btn-danger">取消</button></a>
                                <span class='errorred' class id='regerror'>&nbsp</span>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-sm-2 sidenav"></div>
        </div>
    </div>

    <?php echo '<script'; ?>
>

        $().ready(function () {
            $('#oldpassword').focus();
        })
        
        $("#regsend").click(function (event) {
            let oldpassword = $('#oldpassword').val();
            let password = $('#password').val();
            let repassword = $('#repassword').val();
            let res = ['oldpassword', 'password', 'repassword'];
            // let sendajax = true;

            res.every((item) => {
                if ($("#" + item).val() === '') {
                    $("#" + item).focus();
                    return false;
                } else {
                    return true
                }
            })

            if (oldpassword === "" || password === "" || repassword === "") {
                $('#regerror').html("還有欄位沒填");
                return false
            } 

            // 循環檢查所有欄位
            // res.forEach((item) => {
            //     if ($("#" + item).val() === '') {
            //         $("#" + item).focus();
            //         sendajax = false;
            //         alert(item)
            //         return false
            //     }
            // })



            // 有欄位為空則阻止ajax請求
            // if(sendajax === false) {
            //     return false;
            // }

            $.ajax({
                url: "./editpasswordback.php",
                type: "POST",
                dataType: "json",
                data: {
                    oldpassword : oldpassword,
                    password : password,
                    repassword : repassword,
                },
                success: function (result) {
                    if (result.success) {
                        alert(result.success);
                        $(window).attr('location', './editreg.php');
                    } else if (result.notlogin) {
                        alert(result.notlogin)
                        $(window).attr('location', './login.php');
                    } else if (result) {
                        for (error of res) {
                            $('#' + error + 'Info').html(result[error]);
                        }
                    } else {
                        alert('修改失敗');
                    }
                }
            });
        });

        let oldpasswordflag = true;
        let passwordflag = true;
        let repasswordflag = true;

        $('#oldpassword').blur(function () {
            
            let str = $(this).val();
            if (str === '') {
                oldpasswordflag = false;
                $(this).next().attr('style', 'color:darkred')
            } else {
                oldpasswordflag = true;
                $(this).next().attr('style', "color:gray")
            }
            luckButton(oldpasswordflag, passwordflag, repasswordflag);
        })

        $('#oldpassword').keyup(function() {
            $('#oldpasswordInfo').html('&nbsp');
            $('#regsend').attr('disabled', false);
        })

        $('#password').keyup(function () {
            let patt = /[^a-zA-Z0-9]/;
            let str = $(this).val();
            if (patt.test(str) || !(str.length >= 6) || !(str.length <= 20)) {
                passwordflag = false;
                $(this).next().attr('style', 'color:darkred')
            } else {
                passwordflag = true;
                $(this).next().attr('style', "color:gray")
            }
            luckButton(oldpasswordflag, passwordflag, repasswordflag);
        })

        $('#repassword').keyup(function(){
            let password = $('#password').val();
            let repassword = $('#repassword').val();
            if (password !== repassword) {
                repasswordflag = false;
                $('#repasswordInfo').html("確認密碼與密碼不相同");
            } else {
                repasswordflag = true;
                $('#repasswordInfo').html("&nbsp");
            }
            luckButton(oldpasswordflag, passwordflag, repasswordflag);
        })

        function luckButton(oldpasswordflag, passwordflag, repasswordflag) {
            $('#regerror').html("&nbsp");
            if (oldpasswordflag && passwordflag && repasswordflag) {
                $('#regsend').attr('disabled', false);
            } else {
                $('#regsend').attr('disabled', true);
            }
        }


    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
