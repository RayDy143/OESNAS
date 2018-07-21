
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <a href="javascript:history.back()" class="button bg-red fg-white" href=""><span class="mif-arrow-left mif-lg"></span> Go Back</a>
                    <ul class="breadcrumbs2">
                        <li><a href="<?php echo base_url('index.php/AdminStart'); ?>"><span class="icon mif-home"></span></a></li>
                        <li class="page-item"><a href="<?php echo base_url('index.php/AdminMasterfile');?>" class="page-link">Masterfile</a></li>
                        <li class="page-item"><a href="#" class="page-link">User Accounts</a></li>
                    </ul>
                    <h1 class="text-light">User Accounts<span class="mif-user place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
                    <button class="button primary" id="btnNewUser"><span class="mif-plus"></span>New User</button>
                    <button class="button alert" id="btnImport"><span class="mif-upload"></span>Import from file</button>
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
                                    echo '<td><div data-role="group" data-group-type="one-state" data-button-style="class"><button class="button bg-dark">EDIT</button><button class="button alert">DELETE</button></div></td>';
                                    echo "</tr>";
                                }
                             ?> -->
                        </tbody>
                    </table>
                    <div data-role="dialog" class="padding20" data-close-button="true" data-overlay="true" data-background="bg-white" data-overlay-color="op-dark" data-overlay-click-close="true" id="EditInfoDialog">
                        <div style="width: 100px;" class="image-container bordered handing ani image-format-hd">
                            <div class="frame">
                                <img id="ProfPic" src="">
                            </div>
                        </div>
                        <div class="example">
                            <div class="grid">
                                <div class="row cells2">
                                    <div class="cell">
                                        <label>Firstname</label>
                                        <div class="input-control text full-size">
                                            <input type="text" id="txtFname" readonly name="">
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <label>Middlename</label>
                                        <div class="input-control text full-size">
                                            <input type="text" id="txtMname" readonly name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row cells2">
                                    <div class="cell">
                                        <label>Lastname</label>
                                        <div class="input-control text full-size">
                                            <input type="text" id="txtLname" readonly name="">
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <label>Email</label>
                                        <div class="input-control text full-size">
                                            <input type="text" id="txtInfoEmail" readonly name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="cell">
                                        <label>Address</label>
                                        <div class="input-control textarea full-size">
                                            <textarea id="txtAddress" readonly></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row cells2">
                                    <div class="cell">
                                        <label>Birthdate</label>
                                        <div class="input-control text full-size">
                                            <input id="dpBirthdate" readonly type="text">
                                            <button class="button"><span class="mif-calendar"></span></button>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <label>Gender</label>
                                        <div class="input-control text full-size">
                                            <input id="txtGender" type="text" readonly name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row cell">
                                    <div class="cell">
                                        <label>Contact Number</label>
                                        <div class="input-control text full-size">
                                            <input id="txtContact" type="text" readonly name="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-role="dialog" data-overlay-color="op-dark" data-close-button="true" data-overlay="true" style="padding: 30px;" id="NewUserDialog">
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
                                       <div class="input-control full-size" data-role="select">
                                           <select id="seDepartment" name="cmbDepartment">
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
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var gUser=[];
                function getAllUser(){
                            $.ajax({
                                type: 'ajax',
                                url: '<?php echo base_url() ?>index.php/UserAccounts/getAllUsers',
                                async: false,
                                dataType: 'json',
                                success: function(response){
                                    var html = '';
                                    var i;
                                    gUser=response;
                                    for(i=0; i<response.length; i++){
                                        html +='<tr>'+
                                                    '<td>'+response[i].UserID+'</td>'+
                                                    '<td>'+response[i].Email+'</td>'+
                                                    '<td>'+response[i].Type+'</td>'+
                                                    '<td>'+response[i].DepartmentName+'</td>'+
                                                    '<td>'+response[i].Status+'</td>'+
                                                    '<td>'+
                                                        '<div data-button-style="class"><button class="button primary edit" id="EditUser'+response[i].UserID+'"><span class="mif-info"></span></button><button id="DeleteUser'+response[i].UserID+'" class="button delete alert"><span class="mif-bin"></span></button></div>'+
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
                                url: '<?php echo base_url();?>index.php/UserAccounts/getUserByType',
                                data:{ID:$("#cmbUserType").val()},
                                async: false,
                                dataType: 'json',
                                success: function(response){
                                    var html = '';
                                    var i;
                                    gUser=response;
                                    for(i=0; i<response.length; i++){
                                        html +='<tr>'+
                                                    '<td>'+response[i].UserID+'</td>'+
                                                    '<td>'+response[i].Email+'</td>'+
                                                    '<td>'+response[i].Type+'</td>'+
                                                    '<td>'+response[i].DepartmentName+'</td>'+
                                                    '<td>'+response[i].Status+'</td>'+
                                                    '<td>'+
                                                        '<div data-button-style="class"><button class="button primary edit" id="EditUser'+response[i].UserID+'"><span class="mif-info"></span></button><button id="DeleteUser'+response[i].UserID+'" class="button delete alert"><span class="mif-bin"></span></button></div>'+
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
                        url:'<?php echo base_url("index.php/UserAccounts/AddNewUser"); ?>',
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
                    $("#sidebarUserAccount").attr('class','active');
                    $('#tblUsers').DataTable();
                    getAllUser();
                    $("#cmbUserType").change(function(){
                        if($("#cmbUserType").val()==""){
                            getAllUser();
                        }else{
                            getUserByType();
                        }
                    });
                    $("#seDepartment").change(function(){                
                        if($('#seDepartment').val()=="Manage Departments"){
                            window.location.replace("<?php echo base_url();?>index.php/ManageDepartment");
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
                                            url:'<?php echo base_url("index.php/UserAccounts/deleteUser"); ?>',
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
                                                    caption: 'Deleting User.',
                                                    content: 'Deleting user was not successful',
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
                    $("#tblUsers tbody").on("click","button.edit",function(){
                        var _stringId=$(this).attr("id");
                        var _id=_stringId.split('EditUser')[1];
                        var _index=gUser.findIndex(i=>i.UserID===_id);
                        var _info=gUser[_index];
                        if(_info.Status=="Unverified"){
                            alert('User has not verified yet!');
                        }else{
                            $.ajax({
                                    type: 'ajax',
                                    method:'POST',
                                    url: '<?php echo base_url();?>index.php/UserAccounts/getUserInfo',
                                    data:{ID:_id},
                                    dataType: 'json',
                                    success: function(response){
                                        $('#txtFname').val(response[0].Firstname);
                                        $('#txtMname').val(response[0].Middlename);
                                        $('#txtLname').val(response[0].Lastname);
                                        $('#txtInfoEmail').val(response[0].Email);
                                        $('#txtAddress').val(response[0].Address);
                                        $('#dpBirthdate').val(response[0].Birthdate);
                                        $('#txtGender').val(response[0].Gender);
                                        $('#txtContact').val(response[0].ContactNumber);
                                        $('#ProfPic').attr('src','<?php echo base_url('assets/uploads/ProfilePicture/') ?>'+response[0].Filename);
                                        metroDialog.open('#EditInfoDialog');
                                    },
                                    error: function(){
                                        alert('Could not get Data from Database');
                                    }
                                });
                        }
                        
                    });
                    $('.sidebar').on('click', 'li', function(){
                        if (!$(this).hasClass('active')) {
                            $('.sidebar li').removeClass('active');
                            $(this).addClass('active');
                        }
                    });
                });
    </script>
</body>
</html>