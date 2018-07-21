
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <a href="javascript:history.back()" class="button bg-red fg-white" href=""><span class="mif-arrow-left mif-lg"></span> Go Back</a>
                    <ul class="breadcrumbs2">
                        <li><a href="<?php echo base_url('index.php/AdminStart'); ?>"><span class="icon mif-home"></span></a></li>
                        <li class="page-item"><a href="<?php echo base_url('index.php/AdminMasterfile');?>" class="page-link">Masterfile</a></li>
                        <li class="page-item"><a href="<?php echo base_url('index.php/NAS') ?>" class="page-link">NAS</a></li>
                        <li class="page-item"><a href="#" class="page-link">NAS Profile</a></li>
                    </ul>
                    <h1 class="text-light"><?php echo $data->Firstname.' '.$data->Middlename.' '.$data->Lastname.'\'s'; ?> Profile<span class="mif-user place-right"></span></h1>
                    <hr class="thin bg-grayLight">
                    <div class="tabcontrol" data-role="tabcontrol">
                        <ul class="tabs">
                            <li><a href="#InfoFrame">Info</a></li>
                            <li><a href="#ScheduleFrame">Schedule</a></li>
                            <li><a href="#GradeFrame">Grade</a></li>
                            <li><a href="#AttendanceFrame">Attendance</a></li>
                        </ul>
                        <div class="frames">
                            <div class="frame bg-white" id="InfoFrame">
                                <div class="example">
                                    <div class="grid">
                                        <div class="row cell8 cell-auto-size">
                                            <div class="cell">
                                                <h4>ID Number : <?php echo $data->IDNumber ?></h4>
                                                <h4>Name : <?php echo $data->Firstname.' '.$data->Middlename.' '.$data->Lastname; ?></h4>
                                                <h4>Email : <?php echo $data->Email ?></h4>
                                                <h4>Address : <?php echo $data->Address ?></h4>
                                                <h4>Contact Number : <?php echo $data->ContactNumber ?></h4>
                                                <h4>Birthdate : <?php echo $data->Birthdate ?></h4>
                                                <h4><?php echo $data->DepartmentName ?> Department</h4>
                                                <button class="button primary">Edit Info</button>
                                            </div>
                                            <div class="cell colspan3">
                                                <div class="cell">
                                                    <div class="row">
                                                        <div class="cell image-container bordered handing ani image-format-hd">
                                                            <div class="frame">
                                                                <img src="<?php echo base_url('assets/uploads/NasPicture/').$data->Filename ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row"><button class="cell button primary">Change Picture</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="frame" id="ScheduleFrame">2</div>
                            <div class="frame" id="GradeFrame">1</div>
                            <div class="frame" id="AttendanceFrame">2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

    </script>
</body>
</html>