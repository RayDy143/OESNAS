                
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <a href="javascript:history.back()" class="button bg-red fg-white" href=""><span class="mif-arrow-left mif-lg"></span> Go Back</a>
                    <ul class="breadcrumbs2">
                        <li><a href="<?php echo base_url('index.php/AdminStart'); ?>"><span class="icon mif-home"></span></a></li>
                        <li class="page-item"><a href="<?php echo base_url('index.php/AdminMasterfile');?>" class="page-link">Manage</a></li>
                        <li class="page-item"><a href="<?php echo base_url('index.php/MyProfile') ?>" class="page-link">My Profile</a></li>
                        <li class="page-item"><a href="#" class="page-link">Edit</a></li>
                    </ul>
                    <h1 class="text-light">Edit My Profile<span class="mif-user place-right"></span></h1>
                    <hr class="thin bg-light">
                    <div class="example">
                        <form method="POST" data-role="validator" action= "<?php echo base_url('index.php/EditMyProfile/edit') ?>">
                        <div class="grid">
                            <div class="row cell-auto-size">
                                <div class="cell">
                                    <div class="input-control modern text full-size" data-role="input">
                                        <input name="Firstname" data-validate-hint="This field can not be empty!" data-validate-func="required" type="text" value="<?php echo $_SESSION['Firstname']; ?>">
                                        <span class="informer">Please enter your firstname</span>
                                        <span class="placeholder">Firstname</span>
                                    </div>
                                </div>
                                <div class="cell">
                                    <div class="input-control modern text full-size" data-role="input">
                                        <input type="text" value="<?php echo $_SESSION['Middlename']; ?>" name="Middlename">
                                        <span class="informer">Please enter your middlename</span>
                                        <span class="placeholder">Middlename</span>
                                    </div>
                                </div>
                                <div class="cell">
                                    <div class="input-control modern text full-size" data-role="input" >
                                        <input data-validate-hint="This field can not be empty!" data-validate-func="required" type="text" value="<?php echo $_SESSION['Lastname']; ?>" name="Lastname">
                                        <span class="informer">Please enter your lastname</span>
                                        <span class="placeholder">Lastname</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row cell-auto-size">
                                <div class="cell">
                                    <div class="input-control modern text full-size" data-role="input">
                                        <input type="text" readonly value="<?php echo $_SESSION['Email']; ?>">
                                    </div>
                                </div>
                                <div class="cell">
                                    <div class="input-control modern text full-size" data-role="input">
                                        <input data-validate-hint="This field can not be empty!" data-validate-func="required" type="text" value="<?php echo $_SESSION['Address']; ?>" name="Address">
                                        <span class="informer">Please enter your Address</span>
                                        <span class="placeholder">Address</span>
                                    </div>
                                </div>
                                <div class="cell">
                                    <div class="input-control modern text full-size" data-role="datepicker">
                                        <input data-validate-hint="This field can not be empty!" data-validate-func="required" type="text" value="<?php echo $_SESSION['Birthdate']; ?>" name="Birthdate">
                                        <button class="button"><span class="mif-calendar"></span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row cell-auto-size">
                                <div class="cell">
                                    <div class="input-control text" data-role="select">
                                        <select name="Gender">
                                            <option value="Male" <?php if($_SESSION['Gender']=='Male') echo 'selected'; ?>>Male</option>
                                            <option value="Female" <?php if($_SESSION['Gender']=='Female') echo 'selected' ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="cell">
                                    <div class="input-control modern text full-size" data-role="input">
                                        <input data-validate-hint="This field can not be empty!" data-validate-func="required" type="text" value="<?php echo $_SESSION['ContactNumber']; ?>" name="ContactNumber">
                                        <span class="informer">Please enter your contact number</span>
                                        <span class="placeholder">Contact Number</span>
                                    </div>
                                </div>
                                <div class="cell"></div>
                            </div>
                            <div class="row cell-auto-size">
                                <div class="cell"></div>
                                <a href="<?php echo base_url('index.php/MyProfile'); ?>" class="cell button alert">Discard</a>
                                <button type="submit" class="cell button primary">Apply Changes</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

    </script>
</body>
</html>