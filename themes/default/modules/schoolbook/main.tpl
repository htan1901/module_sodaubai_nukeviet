<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}/themes/default/css/schoolbook_main.css">
<div class="table-responsive" style="margin-bottom: 10%;background-color: azure;">
    <!-- BEGIN: error -->
    <div class="alert alert-danger">{ERROR}</div>
    <!-- END: error -->
    <h1 style="padding-top: 12px; color: red;text-align: center;">{LANG.app_name}</h1>
    <form action="{URL_ACTION}" method="post" style="text-align: left; padding-top: 16px;">
        <div style="display: flex; flex-direction: column; align-items: center; padding: 0 10% 0 10%; ">
            <label>{LANG.username}: </label>
            <input class="input-text" placeholder="Tên đăng nhập..." type="text" name="input_username"
                value="{USERNAME}">
            <br>
            <label>{LANG.password}: </label>
            <input placeholder="Mật khẩu..." class="input-text" type="password" name="input_password" value="{PASSWORD}">
            <br>
            <input type="submit" name="login" id="loginbtn" value="{LANG.login}">
        </div>

    </form>
    <style>
       
    </style>
</div>
<!-- END: main -->