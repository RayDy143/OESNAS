<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />

    <title>Login form ::OES</title>

     <link href="<?php echo base_url(); ?>assets/metro/css/metro.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/metro/css/metro-icons.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/metro/css/metro-responsive.css" rel="stylesheet">

     <script src="<?php echo base_url(); ?>assets/metro/js/jquery-3.1.1.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/metro/js/metro.js"></script>
 
    <style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

    <script>
        function submitLoginForm(){
            $.ajax({
                type: 'ajax',
                method:'POST',
                url: '<?php echo base_url() ?>index.php/Login/authenticate',
                async: false,
                dataType: 'json',
                data: $("#frmLogin").serialize(),
                success: function(data){
                    if(data.success){
                        if(data.Status=="Verified"){
                            window.location.replace("<?php echo base_url();?>index.php/AdminStart");
                        }else{
                            /*$.Notify({
                                caption: 'Login failed!',
                                content: 'It looks like the credendtials you\'ve entered was not verified.',
                                type: 'alert'
                            });*/
                           /* window.location.replace("<?php echo base_url();?>index.php/FirstTimeLogin");*/
                            metroDialog.open('#VerifyDialog');
                        }
                    }else{
                        $.Notify({
                            caption: 'Login failed!',
                            content: 'It looks like the credendtials you\'ve entered was not registered.',
                            type: 'alert'
                        });
                    }
                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });
        }
        function notifyOnErrorInput(input){
                var message = input.data('validateHint');
                $.Notify({
                    caption: 'Error',
                    content: message,
                    type: 'alert'
                });
        }
        /*
        * Do not use this is a google analytics fro Metro UI CSS
        * */
        if (window.location.hostname !== 'localhost') {

            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-58849249-3', 'auto');
            ga('send', 'pageview');

        }


        $(function(){
            $('#btnVerify').click(function(){
                $.ajax({
                    type: 'ajax',
                    method:'POST',
                    url: '<?php echo base_url() ?>index.php/Login/checkCodeValidity',
                    async: false,
                    dataType: 'json',
                    data: {Code:$("#txtCode").val()},
                    success: function(data){
                        if(data.success){
                            window.location.replace("<?php echo base_url();?>index.php/FirstTimeLogin");
                        }else{
                            $.Notify({
                                caption: 'Verification failed!',
                                content: 'It looks like the credendtials you\'ve entered was not registered.',
                                type: 'alert'
                            });
                        }
                    },
                    error: function(){
                        alert('Could not get Data from Database');
                    }
                });
            });
            var form = $(".login-form");
            
            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
        
    </script>
</head>
<body class="bg-dark">
    <div data-role="appbar"></div>
    <div data-role="dialog" class="ani-horizontal" data-close-button="true" data-overlay="true" style="padding: 30px;" id="VerifyDialog">
        <h1>Verify Account</h1>
            <div class="grid">
              <form data-hint-mode="line" data-role="validator" action="javascript:void(0)" data-on-error-input="notifyOnErrorInput" method="POST" id="frmAddUser">
               <div class="row">
                   <div class="cell">
                    <h5>We have sent a verification code to your email</h5>
                       <label>Enter verification code</label>
                       <div class="input-control text full-size">
                           <input id="txtCode" data-validate-hint-position="bottom" type="text" data-validate-func="required" name="Code">
                       </div>
                   </div>
               </div>
               <div class="row">
                   <button id="btnVerify" type="submit" class="cell button primary">Verify Account</button>
               </div>
                  </form>
            </div>
    </div>
    <div class="login-form padding20 block-shadow">
        <form action="javascript:void(0)" id="frmLogin" data-on-submit="submitLoginForm" data-role="validator" data-on-error-input="notifyOnErrorInput">
            <h1 class="text-light">Login to OES</h1>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="txtEmail">User email:</label>
                <span class="input-state-error mif-warning"></span>
                <input placeholder="Email" data-validate-hint="Email is required and has to be valid!" data-validate-func="required,email" type="text" name="Email" id="txtEmail">
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br/>
            <br/>
            <div class="input-control password full-size" data-role="input">
                <label for="txtPassword">User password:</label>
                <input placeholder="Password" data-validate-hint="Password is required!" data-validate-func="required" type="password" name="Password" id="txtPassword">
                <span class="input-state-error mif-warning"></span>
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            <br />
            <br />
            <div class="form-actions">
                <button type="submit" id="btnLogin" class="button primary">Login</button>
                <button type="button" class="button link">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>