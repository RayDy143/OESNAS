
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <a href="javascript:history.back()" class="button bg-red fg-white" href=""><span class="mif-arrow-left mif-lg"></span> Go Back</a>
                    <ul class="breadcrumbs2">
                        <li><a href="<?php echo base_url('index.php/AdminStart'); ?>"><span class="icon mif-home"></span></a></li>
                        <li class="page-item"><a href="<?php echo base_url('index.php/AdminMasterfile');?>" class="page-link">Masterfile</a></li>
                        <li class="page-item"><a href="#" class="page-link">NAS</a></li>
                    </ul>
                    <h1 class="text-light">Non-Academic Scholars<span class="mif-user place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
                    <button class="button primary" onclick="metroDialog.open('#NewNasDialog')">Add</button>
                    <button class="button primary">Import</button>
                    <hr class="thin bg-grayLighter">
                    <table id="tblNAS" class="datatable border bordered">
                        <thead>
                            <tr>
                                <td>ID Number</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    <div data-role="dialog" data-windows-style="true" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" class="padding20" id="NewNasDialog">
                        <form data-role="validator" action="javascript:(0)" data-on-submit="submitAddNasForm" data-on-error-input="notifyOnErrorInput" method="POST" id="frmAddNas">
                        <div class="grid">
                            <h2>Add new Non-Academic Scholar</h2>
                            <div class="example">
                                <div class="row cells6">
                                    <div class="cell colspan5">
                                        <div class="row cells3">
                                            <div class="cell">
                                                <div class="input-control modern text full-size" data-role="input">
                                                    <input type="text" name="IDNumber" data-validate-func="required" data-validate-hint="ID number is required!"/>
                                                    <span class="label">ID Number</span>
                                                    <span class="informer">Please enter ID Number.</span>
                                                    <span class="placeholder">Input ID Number</span>
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="input-control modern text full-size" data-role="input">
                                                    <input type="text" name="Firstname" data-validate-func="required" data-validate-hint="Firstname is required!"/>
                                                    <span class="label">Firstname</span>
                                                    <span class="informer">Please enter firstname</span>
                                                    <span class="placeholder">Input Firstname</span>
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="input-control modern text full-size" data-role="input">
                                                    <input type="text" name="Middlename" data-validate-func="required" data-validate-hint="Middlename is required!">
                                                    <span class="label">Middlename</span>
                                                    <span class="informer">Please enter middlename.</span>
                                                    <span class="placeholder">Input Middlename</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row cells3">
                                            <div class="cell">
                                                <div class="input-control modern text full-size" data-role="input">
                                                    <input name="Lastname" type="text" data-validate-func="required" data-validate-hint="Lastname is required!">
                                                    <span class="label">Lastname</span>
                                                    <span class="informer">Please enter lastname.</span>
                                                    <span class="placeholder">Input lastname</span>
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="input-control modern email full-size" data-role="input">
                                                    <input type="email" name="Email" data-validate-func="required,email" data-validate-hint="Email is required and must be valid!">
                                                    <span class="label">Email</span>
                                                    <span class="informer">Please enter Email.</span>
                                                    <span class="placeholder">Input Email</span>
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="input-control modern text full-size" data-role="input">
                                                    <input type="text" name="Address" data-validate-func="required" data-validate-hint="Address is required!">
                                                    <span class="label">Address</span>
                                                    <span class="informer">Please enter address.</span>
                                                    <span class="placeholder">Input Address</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row cells3">
                                            <div class="cell">
                                                <div class="input-control modern text full-size" data-role="datepicker">
                                                    <input name="Birthdate" type="text" data-validate-func="required" data-validate-hint="Birthdate is required!">
                                                    <span class="label">Birthdate</span>
                                                    <span class="informer">Please enter birthdate.</span>
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="input-control modern text full-size" data-role="input">
                                                    <input type="text" name="ContactNumber" data-validate-func="required" data-validate-hint="Contact number is required!">
                                                    <span class="label">Contact Number</span>
                                                    <span class="informer">Please enter contact number.</span>
                                                    <span class="placeholder">Input Contact Number</span>
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <div class="input-control select full-size" data-role="select">
                                                    <select name="DepartmentID" data-validate-func="required" data-validate-hint="This field is required!">
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
                                        <div class="row cells2">
                                            <div class="input-control file full-size" data-role="input">
                                                <input name="NasPicture" id="uploadImage" onchange="PreviewImage()" type="file">
                                                <button class="button"><span class="mif-folder"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="image-container bordered handing ani image-format-hd" style="width:100%">
                                            <div class="frame">
                                                <img id="uploadPreview" src="<?php echo base_url('assets/uploads/ProfilePicture/DPZYwfBUMAIstfn.jpg'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row cells4">
                                <div class="cell offset3">
                                    <button type="submit" class="button primary">Add</button>
                                    <button type="button" class="button alert">Cancel</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function notifyOnErrorInput(input){
                var message = input.data('validateHint');
                $.Notify({
                    caption: 'Error',
                    content: message,
                    type: 'alert'
                });
        }
        function getAllNas(){
            $.ajax({
                type:'ajax',
                url:'<?php echo base_url("index.php/NAS/getAllNas") ?>',
                dataType:'json',
                success:function(response){
                    if(response.success){
                        gNas=response.data;
                        var data=response.data;
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){

                            gUser=response;
                            html +='<tr>'+
                                        '<td>'+data[i].IDNumber+'</td>'+
                                        '<td>'+data[i].Firstname+' '+data[i].Middlename+' '+data[i].Lastname+'</td>'+
                                        '<td>'+data[i].Email+'</td>'+
                                        '<td>'+
                                            '<div data-button-style="class"><a href="<?php echo base_url(); ?>index.php/NasProfile/profile/'+data[i].NasID+'" class="button primary edit" id="EditNas"><span class="mif-info"></span></a><button id="DeleteNas'+data[i].NasID+'" class="button delete alert"><span class="mif-bin"></span></button></div>'+
                                        '</td>'+
                                    '</tr>';
                        }
                        if ($.fn.DataTable.isDataTable("#tblNAS")) {
                          $('#tblNAS').DataTable().clear().destroy();
                        }
                        $('#tblNAS tbody').html(html);
                        $('#tblNAS').DataTable();
                    }
                },
                error:function(){

                }
            });
        }
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
        function submitAddNasForm(){
            var formData = new FormData( $("#frmAddNas")[0] );
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url('index.php/NAS/AddNas'); ?>',
                dataType:'json',
                data:formData,
                processData: false,
                contentType: false,
                success:function(data){
                    if(data.success){
                        $.Notify({
                            caption: 'success',
                            content:"Adding successful!",
                            type: 'success'
                        });
                        getAllNas();
                        metroDialog.close("#NewNasDialog");
                    }
                },
                error:function(){
                    $.Notify({
                        caption: 'Error',
                        content:"Please contact the system administrator!",
                        type: 'alert'
                    });
                }
            });
        }
        $(document).ready(function(){
            var formData = new FormData( $("#frmAddNas")[0] );
            var gNas=[];
            getAllNas();
            $("#tblNAS tbody").on("click","button.delete",function(){
                var _stringId=$(this).attr("id");
                var _id=_stringId.split('DeleteNas')[1];
                var _index=gNas.findIndex(i=>i.NasID===_id);
                var _info=gNas[_index];
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
                                    url:'<?php echo base_url("index.php/NAS/deleteNas"); ?>',
                                    data: {ID:_id},
                                    dataType:'json',
                                    success:function(response){
                                        if(response.success){
                                            $.Notify({
                                                caption: 'Deleting NAS.',
                                                content: 'Deleting NAS was been successful',
                                                type:'success'
                                            });
                                            getAllNas();
                                            $(el).data('dialog').close();
                                        }
                                    },
                                    error: function()
                                    {
                                        $.Notify({
                                            caption: 'Deleting NAS.',
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
            $("#tblNAS").dataTable();
            $("#sidebarNAS").attr('class','active');
        });
    </script>
</body>
</html>