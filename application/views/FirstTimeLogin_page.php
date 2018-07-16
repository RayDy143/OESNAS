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
        function submintForm(){
            if($('#txtPassword').val()==$('#txtConfirmPassword').val()){
                $.ajax({
                    type: 'ajax',
                    method:'POST',
                    url: '<?php echo base_url() ?>index.php/FirstTimeLogin/InsertInfo',
                    async: false,
                    dataType: 'json',
                    data: $("#frmInfo").serialize(),
                    success: function(data){
                        if(data.success){
                            window.location.replace("<?php echo base_url();?>index.php/Login");
                        }else{
                            $.Notify({
                                caption: 'Sumbit failed!',
                                content: 'It looks like it failed.',
                                type: 'alert'
                            });
                        }
                    },
                    error: function(){
                        alert('Could not get Data from Database');
                    }
                });
            }else{
                $.Notify({
                    caption: 'Error!',
                    content: 'Password dont match',
                    type: 'alert'
                });
            }
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
            
            
        });
        
    </script>
</head>
<body class="bg-blue" style="padding:30px;">
    <div class="container bg-white padding20 block-shadow">
        <form action="javascript:void(0)" id="frmInfo" data-role="validator" data-on-submit="submintForm">
        <h4>It seems like it is your first time logging in. You must provide the following information in order to proceed.</h4>
        <div class="example" data-text="">
            <div class="grid">
                <div class="row cells2">
                    <div class="cell">
                        <label>First name</label>
                        <div class="input-control text full-size">
                            <input name="Firstname" data-validate-hint-position="bottom" data-validate-hint="This field is required" data-validate-func="required" type="text">
                        </div>
                    </div>
                    <div class="cell">
                        <label>Middlename</label>
                        <div class="input-control text full-size">
                            <input name="Middlename" data-validate-hint-position="bottom" data-validate-hint="This field is required" type="text" data-validate-func="required">
                        </div>
                    </div>
                </div>
                <div class="row cells2">
                    <div class="cell">
                        <label>Lastname</label>
                        <div class="input-control text full-size">
                            <input name="Lastname" data-validate-hint-position="bottom" data-validate-hint="This field is required" type="text" data-validate-func="required">
                        </div>
                    </div>
                    <div class="cell">
                        <h5>Address</h5>
                        <div class="input-control textarea full-size" data-role="input" data-text-auto-resize="true">
                            <textarea name="Address" data-validate-hint-position="bottom" data-validate-hint="This field is required" data-validate-func="required"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row cells2">
                    <div class="cell">
                        <h5>Birthdate</h5>
                        <div class="input-control text full-size" data-role="datepicker">
                            <input name="Birthdate" data-validate-hint-position="bottom" data-validate-hint="This field is required" type="text" data-validate-func="required">
                            <button class="button"><span class="mif-calendar"></span></button>
                        </div>
                    </div>
                    <div class="cell">
                        <h5>Gender</h5>
                        <label class="input-control radio">
                            <input name="Gender" value="Male" checked type="radio">
                            <span class="check"></span>
                            <span class="caption">Male</span>
                        </label>
                        <label class="input-control radio">
                            <input name="Gender" value="Female" type="radio">
                            <span class="check"></span>
                            <span class="caption">Female</span>
                        </label>
                    </div>
                </div>
                <div class="row cells2">
                    <div class="cell">
                        <label>Contact Number</label>
                        <div class="input-control number full-size">
                            <input name="ContactNumber" data-validate-hint-position="bottom" data-validate-hint="This field is required" type="number" data-validate-func="required">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h4>Provide a strong and memorable password.</h4>
        <div class="example">
            <div class="grid">
                <div class="row cells2">
                    <div class="cell">
                        <label>Password</label>
                        <div class="input-control password full-size" data-role="input">
                            <input id="txtPassword" name="Password" data-validate-hint-position="bottom" data-validate-hint="This field is required" type="password" data-validate-func="required">
                            <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                        </div>
                    </div>
                    <div class="cell">
                        <label>Retype Password</label>
                        <div class="input-control password full-size" data-role="input">
                            <input id="txtConfirmPassword" name="ConfirmPassword" data-validate-hint-position="bottom" data-validate-hint="This field is required" type="password" data-validate-func="required">
                            <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid">
            <div class="row cells4">
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell"><a href="<?php echo base_url('index.php/Login/Logout');?>" class="button alert full-size">Cancel</a></div>
                <div class="cell"><button type="Submit" class="button primary full-size">Proceed</button></div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>