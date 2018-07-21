                
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <a href="javascript:history.back()" class="button bg-red fg-white" href=""><span class="mif-arrow-left mif-lg"></span> Go Back</a>
                    <ul class="breadcrumbs2">
                        <li><a href="<?php echo base_url('index.php/AdminStart'); ?>"><span class="icon mif-home"></span></a></li>
                        <li class="page-item"><a href="<?php echo base_url('index.php/AdminMasterfile');?>" class="page-link">Manage</a></li>
                        <li class="page-item"><a href="<?php echo base_url('index.php/NAS') ?>" class="page-link">My Profile</a></li>
                    </ul>
                    <h1 class="text-light">My profile<span class="mif-user place-right"></span></h1>
                    <hr class="thin bg-light">
                    <div class="example bg-navy">
                        <div class="grid">
                            <div class="row cell-auto-size">
                                <div class="cell colspan4 example">
                                    <div style="width: 100%" class="image-container bordered image-format-hd">
                                        <div class="frame">
                                            <img src="<?php echo base_url('assets/uploads/ProfilePicture/').$_SESSION['Filename']; ?>">
                                        </div>
                                    </div>
                                    <button class="button primary full-size">Change Picture</button>
                                </div>
                                <div class="cell example">
                                    <h4>Name : <?php echo $_SESSION['Firstname'].' '.$_SESSION['Middlename'].' '.$_SESSION['Lastname'] ?></h4>
                                    <h4>Email : <?php echo $_SESSION['Email'] ?></h4>
                                    <h4>Address : <?php echo $_SESSION['Address'] ?></h4>
                                    <h4>Brithdate : <?php echo $_SESSION['Birthdate'] ?></h4>
                                    <h4>Gender : <?php echo $_SESSION['Gender'] ?></h4>
                                    <h4>ContactNumber : <?php echo $_SESSION['ContactNumber'] ?></h4>
                                    <h4>Department : </h4>
                                        <a href="<?php echo base_url('index.php/EditMyProfile'); ?>" class="button primary">Edit Profile</a>
                                    </div>
                                </div>
                            </div>
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