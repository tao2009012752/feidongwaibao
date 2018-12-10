<html>
    <head>
        <title>登录界面</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    </head>
    <body>
            个人登陆
            <form action="" data-url="<{:url('account/user_login')}>" id="userData" method="post">
                <input type="text" name="account" id="account" value="" placeholder="用户名"/><br><br>
                <input type="password" name="pwd" id="pwd"  value="" placeholder="密码"/><br><br>
                <input type="button" id="user_login"  value="登陆" />
            </form>
            <hr>

            企业登录
            <form action=""  data-url="<{:url('account/company_login')}>" id="companyData" method="post">
                <input type="text" name="account" id="com_account" value="" placeholder="用户名"/><br><br>
                <input type="password" name="pwd" id="com_account" value="" placeholder="密码"/><br><br>
                <input type="button" id="company_login" value="登陆" />
            </form>


            <script>
                //个人登录
                $('#user_login').click(function(){
                    var account = $('#account').val(),
                        pwd = $('#pwd').val(),
                        data_url = $('#userData').attr('data-url');

                    if(account == '' || !account){
                        alert('账号名不能为空!');return false;
                    }

                    if(pwd == '' || !pwd){
                        alert('密码不能为空!');return false;
                    }

                    $.ajax({
                        url: data_url,
                        data: {
                            'account': account,
                            'pwd': pwd
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(res){
                            if(res.code == 0){
                                alert(res.msg);
                                location.href = "<{:url('index/index')}>";
                            }
                            alert(res.msg);
                        }
                    });
                })


                //企业登录
                $('#company_login').click(function(){
                    var account = $('#com_account').val(),
                        pwd = $('#com_account').val(),
                        data_url = $('#companyData').attr('data-url');

                    if(account == '' || !account){
                        alert('账号名不能为空!');return false;
                    }

                    if(pwd == '' || !pwd){
                        alert('密码不能为空!');return false;
                    }

                    $.ajax({
                        url: data_url,
                        data: {
                            'account': account,
                            'pwd': pwd
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(res){
                            if(res.code == 0){
                                alert(res.msg);
                                location.href = "<{:url('index/index')}>";
                            }
                            alert(res.msg);
                        }
                    });
                })
            </script>
    </body>
</html>

