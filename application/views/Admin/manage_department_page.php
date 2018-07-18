
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <ul class="breadcrumbs2">
                        <li><a href="#"><span class="icon mif-home"></span></a></li>
                        <li class="page-item"><a href="#" class="page-link">Manage</a></li>
                        <li class="page-item"><a href="#" class="page-link">Department</a></li>
                    </ul>
                    <h1 class="text-light">Department<span class="mif-user place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
                    <button class="button primary" onclick="metroDialog.open('#AddDepartmentDialog')" id="btnNewUser"><span class="mif-plus"></span>New Department</button>
                    <hr class="thin bg-grayLighter">
                    <table id="tblDepartment" class="dataTable border bordered hovered">
                        <thead>
                        <tr>
                            <td style="width: 20px;">ID</td>
                            <td class="sortable-column">Department Name</td>
                            <td style="width: 100px;">Action</td>
                        </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div data-role="dialog" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" class="padding20" id="AddDepartmentDialog">
        <h3>Add new department</h3>
        <div class="example">
            <form id="frmDepartment" data-on-submit="AddDepartmentSubmit" data-on-error-input="notifyOnErrorInput" data-role="validator" method="POST" action="javascript:void(0)">
                <div class="grid">
                    <div class="row">
                        <label>Department</label>
                        <div class="input-control text full-size">
                            <input data-validate-hint-mode="line" data-validate-hint-position="bottom" data-validate-func="required" data-validate-hint="This field is required!" type="text" name="Department">
                        </div>
                    </div>
                    <div class="row cells3">
                        <button type="button" onclick="metroDialog.toggle('#AddDepartmentDialog')" class="cell offset1 button alert">Cancel</button>
                        <button type="submit" class="cell button primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div data-role="dialog" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" class="padding20" id="EditDepartmentDialog">
        <h3>Edit department</h3>
        <div class="example">
            <form id="frmEditDepartment" data-on-submit="EditDepartmentSubmit" data-on-error-input="notifyOnErrorInput" data-role="validator" method="POST" action="javascript:void(0)">
                <div class="grid">
                    <div class="row">
                        <input type="hidden" id="txtDepartmentID" name="DepartmentID">
                        <label>Department</label>
                        <div class="input-control text full-size">
                            <input data-validate-hint-mode="line" data-validate-hint-position="bottom" data-validate-func="required" data-validate-hint="This field is required!" type="text" id="txtEditDepartment" name="Department">
                        </div>
                    </div>
                    <div class="row cells3">
                        <button type="button" onclick="metroDialog.toggle('#EditDepartmentDialog')" class="cell offset1 button alert">Cancel</button>
                        <button type="submit" class="cell button primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function AddDepartmentSubmit(){
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/ManageDepartment/AddDepartment") ?>',
                async:false,
                dataType:'json',
                data:$("#frmDepartment").serialize(),
                success: function(response){
                        getAllDepartment();
                        metroDialog.close("#AddDepartmentDialog");
                },
                error:function(){
                    $.Notify({
                        caption: 'Error',
                        content: "Add of Department has encountered an error",
                        type: 'alert'
                    });
                }
            });
        }
        function getAllDepartment(){
            $.ajax({
                    type: 'ajax',
                    method:'POST',
                    url: '<?php echo base_url();?>index.php/ManageDepartment/getAllDepartment',
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        var html = '';
                        var i;
                        for(i=0; i<response.length; i++){
                            gDeparment=response;
                            html +='<tr>'+
                                        '<td>'+response[i].DepartmentID+'</td>'+
                                        '<td>'+response[i].DepartmentName+'</td>'+
                                        '<td>'+
                                            '<div data-button-style="class"><button class="button primary edit" id="EditDepartment'+response[i].DepartmentID+'"><span class="mif-info"></span></button><button id="DeleteDepartment'+response[i].DepartmentID+'" class="button delete alert"><span class="mif-bin"></span></button></div>'+
                                        '</td>'+
                                    '</tr>';
                        }
                        if ($.fn.DataTable.isDataTable("#tblDepartment")) {
                          $('#tblDepartment').DataTable().clear().destroy();
                        }
                        $('#tblDepartment tbody').html(html);
                        $('#tblDepartment').DataTable();
                    },
                    error: function(){
                        alert('Could not get Data from Database');
                    }
                });
        }
                $(document).ready(function(){

                    var gDeparment=[];
                    $('#tblDepartment').DataTable();
                    $("#sidebarDepartment").attr('class','active');
                    getAllDepartment();
                    function notifyOnErrorInput(input){
                            var message = input.data('validateHint');
                            $.Notify({
                                caption: 'Error',
                                content: message,
                                type: 'alert'
                            });
                    }
                    
                    function EditDepartmentSubmit(){
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/ManageDepartment/AddDepartment") ?>',
                            async:false,
                            dataType:'json',
                            data:$("#frmDepartment").serialize(),
                            success: function(response){
                                if(response.data){
                                    metroDialog.close("#AddDepartmentDialog");
                                }
                            },
                            error:function(){

                            }
                        });
                    }
                    
                    $("#tblDepartment tbody").on("click","button.delete",function(){
                        var _stringId=$(this).attr("id");
                        var _id=_stringId.split('DeleteDepartment')[1];
                       /* var _index=gUser.findIndex(i=>i.UserID===_id);
                        var _info=gUser[_index];*/
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
                                            url:'<?php echo base_url("index.php/ManageDepartment/deleteUser"); ?>',
                                            data: {ID:_id},
                                            dataType:'json',
                                            success:function(response){
                                                if(response.success){
                                                    $.Notify({
                                                        caption: 'Deleting Department.',
                                                        content: 'Deleting Department was been successful',
                                                        type:'success'
                                                    });
                                                    getAllDepartment();
                                                    $(el).data('dialog').close();
                                                }
                                            },
                                            error: function()
                                            {
                                                $.Notify({
                                                    caption: 'Deleting Department.',
                                                    content: 'Deleting department was not successful',
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
                    $("#tblDepartment tbody").on("click","button.edit",function(){
                        var _stringId=$(this).attr("id");
                        var _id=_stringId.split('EditDepartment')[1];
                        var _index=gDeparment.findIndex(i=>i.DepartmentID===_id);
                        var _info=gDeparment[_index];
                        if(_info.Department==""){
                            //alert('User has not verified yet!');
                        }else{
                            $('#txtDepartmentID').val(_info.DepartmentID);
                            $('#txtEditDepartment').val(_info.Department);
                            metroDialog.open('#EditDepartmentDialog');
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