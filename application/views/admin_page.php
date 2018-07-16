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

    <title>OESNAS-Admin</title>

     <link href="<?php echo base_url(); ?>assets/metro/css/metro.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/metro/css/metro-icons.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/metro/css/metro-responsive.css" rel="stylesheet">
     <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

     <script src="<?php echo base_url(); ?>assets/metro/js/jquery-3.1.1.min.js"></script>
     <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/metro/js/metro.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <style>
        html, body {
            height: 100%;
        }
        body {
        }
        .page-content {
            padding-top: 3.125rem;
            min-height: 100%;
            height: 100%;
        }
        .table .input-control.checkbox {
            line-height: 1;
            min-height: 0;
            height: auto;
        }

        @media screen and (max-width: 800px){
            #cell-sidebar {
                flex-basis: 52px;
            }
            #cell-content {
                flex-basis: calc(100% - 52px);
            }
        }
    </style>

    <script>
        var gUser=[];
        function getAllUser(){
                    $.ajax({
                        type: 'ajax',
                        url: '<?php echo base_url() ?>index.php/Admin/getAllUsers',
                        async: false,
                        dataType: 'json',
                        success: function(response){
                            var html = '';
                            var i;
                            for(i=0; i<response.length; i++){
                                gUser=response;
                                html +='<tr>'+
                                            '<td>'+response[i].UserID+'</td>'+
                                            '<td>'+response[i].Email+'</td>'+
                                            '<td>'+response[i].Type+'</td>'+
                                            '<td>'+response[i].DepartmentName+'</td>'+
                                            '<td>'+response[i].Status+'</td>'+
                                            '<td>'+
                                                '<div data-button-style="class"><button class="button primary"><span class="mif-info"></span></button><button id="DeleteUser'+response[i].UserID+'" class="button delete alert"><span class="mif-bin"></span></button></div>'+
                                            '</td>'+
                                        '</tr>';
                            }
                            if ($.fn.DataTable.isDataTable("#tblUsers")) {
                              $('#tblUsers').DataTable().clear().destroy();
                            }
                            $('#tblUsers tbody').html(html);
                            $('#tblUsers').DataTable();
                        },
                        error: function(){
                            alert('Could not get Data from Database');
                        }
                    });
            }
        function getUserByType(){
                    $.ajax({
                        type: 'ajax',
                        method:'POST',
                        url: '<?php echo base_url();?>index.php/Admin/getUserByType',
                        data:{ID:$("#cmbUserType").val()},
                        async: false,
                        dataType: 'json',
                        success: function(response){
                            var html = '';
                            var i;
                            for(i=0; i<response.length; i++){
                                gUser=response;
                                html +='<tr>'+
                                            '<td>'+response[i].UserID+'</td>'+
                                            '<td>'+response[i].Email+'</td>'+
                                            '<td>'+response[i].Type+'</td>'+
                                            '<td>'+response[i].DepartmentName+'</td>'+
                                            '<td>'+response[i].Status+'</td>'+
                                            '<td>'+
                                                '<div data-button-style="class"><button class="button primary"><span class="mif-info"></span></button><button id="DeleteUser'+response[i].UserID+'" class="button delete alert"><span class="mif-bin"></span></button></div>'+
                                            '</td>'+
                                        '</tr>';
                            }
                            if ($.fn.DataTable.isDataTable("#tblUsers")) {
                              $('#tblUsers').DataTable().clear().destroy();
                            }
                            $('#tblUsers tbody').html(html);
                            $('#tblUsers').DataTable();
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
        function submitAddUserForm(){
            $.ajax({
                method:'POST',
                type:'ajax',
                url:'<?php echo base_url("index.php/Admin/AddNewUser"); ?>',
                data: {Email:$("#txtEmail").val(),cmbDepartment:$("#seDepartment").val(),UserTypeID:$("#cmbUserType").val()},
                dataType:'json',
                success:function(response){
                    if(response.success){
                        $.Notify({
                            caption: 'Adding user.',
                            content: 'Adding user was been successful',
                            type:'success'
                        });
                        metroDialog.close('#NewUserDialog');
                        if($("#cmbUserType").val()==""){
                            getAllUser();
                        }else{
                            getUserByType();
                        }
                    }
                },
                error: function()
                {
                    $.Notify({
                        caption: 'Adding user.',
                        content: 'Adding user was not successful',
                        type:'alert'
                    });
                }
            });
        }
        $(document).ready(function(){
            $('#tblUsers').DataTable();
            getAllUser();
            $("#cmbUserType").change(function(){
                if($("#cmbUserType").val()==""){
                    getAllUser();
                }else{
                    getUserByType();
                }
            });
            $("#btnNewUser").click(function(){
                if($("#cmbUserType").val()==""){
                    $.Notify({
                        caption: 'Usertype not selected',
                        content: 'You have to choose a type of user to create a user!',
                        type:'alert'
                    });
                    $('#cmbUserType').select2('open');
                }else{
                    metroDialog.open('#NewUserDialog');
                }
            });
            $("#btnImport").click(function(){
            });
            $("#tblUsers tbody").on("click","button.delete",function(){
                var _stringId=$(this).attr("id");
                var _id=_stringId.split('DeleteUser')[1];
                var _index=gUser.findIndex(i=>i.UserID===_id);
                var _info=gUser[_index];
                metroDialog.create({
                    title: "Confirm Deletion",
                    content: "Warning!This cant be undone!",
                    actions: [
                        {
                            title: "Ok",
                            onclick: function(el){
                                $.ajax({
                                    method:'POST',
                                    type:'ajax',
                                    url:'<?php echo base_url("index.php/Admin/deleteUser"); ?>',
                                    data: {UserID:_info.UserID},
                                    dataType:'json',
                                    success:function(response){
                                        if(response.success){
                                            $.Notify({
                                                caption: 'Deleting user.',
                                                content: 'Deleting user was been successful',
                                                type:'success'
                                            });
                                            getAllUser();
                                            $(el).data('dialog').close();
                                        }
                                    },
                                    error: function()
                                    {
                                        $.Notify({
                                            caption: 'Adding user.',
                                            content: 'Adding user was not successful',
                                            type:'alert'
                                        });
                                    }
                                });
                               
                            }
                        },
                        {
                            title: "Cancel",
                            cls: "js-dialog-close"
                        }
                    ],
                    options: { 
                        type:"alert",
                        overlay:"true",
                        overlayColor:"op-dark"
                    }
                });
            });
            $('.sidebar').on('click', 'li', function(){
                if (!$(this).hasClass('active')) {
                    $('.sidebar li').removeClass('active');
                    $(this).addClass('active');
                }
            });
        });
    </script>
</head>
<body>
   <div data-role="dialog" data-close-button="true" data-overlay="true" style="padding: 30px;" id="NewUserDialog">
       <h1>Add new user</h1>
           <div class="grid">
             <form data-hint-mode="line" data-role="validator" data-on-submit="submitAddUserForm" action="javascript:void(0)" data-on-error-input="notifyOnErrorInput" method="POST" id="frmAddUser">
              <div class="row">
                  <div class="cell">
                      <label>Enter Email</label>
                      <div class="input-control text full-size">
                          <input id="txtEmail" data-validate-hint-position="bottom" type="email" data-validate-hint="Email is required and has to be valid!" data-validate-func="required,email" placeholder="Example:(alfeche492@gmail.com)" name="Email">
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="cell">
                      <label>Enter Department</label>
                      <div class="input-control text full-size">
                          <select id="seDepartment" data-role="select" name="cmbDepartment">
                                <?php 
                                    foreach ($deps as $key) {
                                        echo "<option value='".$key['DepartmentID']."'>".$key['DepartmentName']."</option>";
                                    }
                                 ?>
                                 <option class="bg-red">Manage Departments</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <button id="btnAddUser" type="submit" class="cell button primary">Add</button>
              </div>
                 </form>
           </div>
   </div>
    <div class="app-bar fixed-top" data-role="appbar">
        <a class="app-bar-element branding">Online Evaluation System Non-Academic Scholars of ACT</a>
        <span class="app-bar-divider"></span>
        <ul class="app-bar-menu">
            <li><a href="">Home</a></li>
            <li>
                <a href="" class="dropdown-toggle">Project</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="">New project</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="" class="dropdown-toggle">Reopen</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="">Project 1</a></li>
                            <li><a href="">Project 2</a></li>
                            <li><a href="">Project 3</a></li>
                            <li class="divider"></li>
                            <li><a href="">Clear list</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="">Security</a></li>
            <li><a href="">System</a></li>
            <li>
                <a href="" class="dropdown-toggle">Help</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="">ChatOn</a></li>
                    <li><a href="">Community support</a></li>
                    <li class="divider"></li>
                    <li><a href="">About</a></li>
                </ul>
            </li>
        </ul>

        <div class="app-bar-element place-right">
            <span class="dropdown-toggle"><span class="mif-cog"></span></span>
            <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
                <h5 class="text-dark">Raymundo R. Alfeche</h5>
                <ul class="unstyled-list fg-dark">
                    <li><a href="" class="fg-white1 fg-hover-yellow">Profile</a></li>
                    <li><a href="" class="fg-white2 fg-hover-yellow">Security</a></li>
                    <li><a href="<?php echo base_url('index.php/Login/Logout'); ?>" class="fg-white3 fg-hover-yellow">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
                <div class="cell size-x300" id="cell-sidebar">
                    <ul class="sidebar2 dark">
                        <li class="title">Masterfile</li>
                        <li class="active"><a href="#"></span>User Account</a></li>
                        <li class="stick bg-red"><a href="#"></span>NAS</a></li>
                        <li class="stick bg-red"><a href="#"></span>Evaluation Question</a></li>

                        <li class="title">Evaluation Components</li>
                        <li><a href="#">Attendance</a></li>
                        <li><a href="#">Grade</a></li>
                        <li><a href="#">Head Evaluation Results</a></li>

                        <li class="title">Reports</li>
                        <li><a href="#">Allowance</a></li>
                        <li><a href="#">Renewal Remarks</a></li>
                        <li><a href="#">Units to be taken</a></li>

                        <li class="title">My Account</li>
                        <li><a href="#">Edit Account Info</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">User Accounts<span class="mif-user place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
                    <button class="button primary" id="btnNewUser"><span class="mif-plus"></span>New User</button>
                    <button class="button success" id="btnImport"><span class="mif-upload"></span>Import from file</button>
                    <div class="input-control select" data-role="select">
                        <select id="cmbUserType">
                            <option value="">All</option>
                            <option value="1">Admin</option>
                            <option value="2">Evaluator</option>
                        </select>
                    </div>
                    <hr class="thin bg-grayLighter">
                    <table id="tblUsers" class="dataTable border bordered hovered" data-role="datatable" data-auto-width="false">
                        <thead>
                        <tr>
                            <td style="width: 20px">ID</td>
                            <td class="sortable-column">Email</td>
                            <td class="sortable-column">User Type</td>
                            <td class="sortable-column">Department</td>
                            <td class="sortable-column">Status</td>
                            <td class="sortable-column">Action</td>
                        </tr>
                        </thead>
                        <tbody>
                           <!--  <?php 
                                foreach ($datas as $user) {
                                    echo "<tr>";
                                    echo "<td>".$user['UserID']."</td>";
                                    echo "<td>".$user['Email']."</td>";
                                    echo "<td>".$user['Status']."</td>";
                                    echo '<td><div data-role="group" data-group-type="one-state" data-button-style="class"><button class="button primary">EDIT</button><button class="button alert">DELETE</button></div></td>';
                                    echo "</tr>";
                                }
                             ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            
            /*$("#btnAddUser").click(function(){
                $.ajax({
                    method:'POST',
                    type:'ajax',
                    url:'<?php echo base_url("index.php/Admin/AddNewUser"); ?>',
                    data: $("#frmAddUser").serialize(),
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            $.Notify({
                                caption: 'Adding user.',
                                content: 'Adding user was been successful',
                                type:'success'
                            });
                            metroDialog.close('#NewUserDialog');
                            getAllUser();
                        }
                    },
                    error: function()
                    {
                        $.Notify({
                            caption: 'Adding user.',
                            content: 'Adding user was not successful',
                            type:'alert'
                        });
                    }
                });
            });*/
        });
    </script>
</body>
</html>