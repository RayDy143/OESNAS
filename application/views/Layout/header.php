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
     <link href="<?php echo base_url(); ?>assets/metro/css/metro-schemes.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/metro/css/metro-colors.css" rel="stylesheet">
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
</head>
<body>
   
    <div class="app-bar red fixed-top" data-role="appbar">
        <a class="app-bar-element branding">Online Evaluation System for Non-Academic Scholars of ACT</a>
        <span class="app-bar-divider"></span>
        <ul class="app-bar-menu">
            <li><a href="<?php echo base_url('index.php/AdminStart'); ?>">Home</a></li>
            <li>
                <a href="" class="dropdown-toggle">Import</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="">Users</a></li>
                    <li>
                        <a href="" class="dropdown-toggle">Evaluation Components</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="">Attendance</a></li>
                            <li><a href="">Grades</a></li>
                            <li><a href="">Evaluation Question</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="" class="dropdown-toggle">Monitor</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="">User Logs</a></li>
                    <li><a href="">Evaluation</a></li>
                </ul>
            </li>
            <li>
                <a href="" class="dropdown-toggle">Download Excel Format</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="">UserAccounts</a></li>
                    <li><a href="">NAS</a></li>
                    <li><a href="">Attendance</a></li>
                    <li><a href="">Grade</a></li>
                    <li><a href="">Evaluation Question</a></li>
                </ul>
            </li>
        </ul>

        <div class="app-bar-element place-right">
            <span class="dropdown-toggle"></span>
            <span><img style="height: 30px;" src="<?php echo base_url('assets/uploads/ProfilePicture/').$_SESSION['Filename']; ?>"></span>
            <?php echo $_SESSION['Email']; ?>
            <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-white" data-role="dropdown" data-no-close="true" style="width: 220px">
                <h5 class="text-white"><?php echo $_SESSION['Firstname'].' '.$_SESSION['Lastname']; ?></h5>
                <ul class="unstyled-list">
                    <li>
                        <div class="image-container bordered cycle image-format-hd">
                            <div class="frame">
                                <img src="<?php echo base_url('assets/uploads/ProfilePicture/').$_SESSION['Filename']; ?>">
                            </div>
                            <div class="image-overlay">
                                <h2>Change Picture</h2>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?php echo base_url('index.php/MyProfile') ?>" class="fg-white fg-hover-dark">My Profile</a></li>
                    <li><a href="<?php echo base_url('index.php/Login/Logout'); ?>" class="fg-white fg-hover-dark">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div style="overflow: auto;" class="page-content">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
                <div class="cell size-x300" id="cell-sidebar" style="overflow: auto;overflow-x: hidden;">
                    <ul class="sidebar2 dark">
                        <li class="title">Masterfile</li>
                        <li id="sidebarUserAccount"><a href="<?php echo base_url('index.php/UserAccounts'); ?>">User Account</a></li>
                        <li id="sidebarNAS"><a href="<?php echo base_url('index.php/NAS'); ?>">NAS</a></li>
                        <li>
                            <a class="dropdown-toggle" href="#">Evaluation Components</a>
                            <ul class="d-menu" data-role="dropdown">
                                <li><a href="">Attendance</a></li>
                                <li><a href="">Grade</a></li>
                                <li><a href="">Evaluation Questions</a></li>
                            </ul>
                        <li class="title">Manage</li>
                        <li id="sidebarDepartment"><a href="<?php echo base_url('index.php/ManageDepartment') ?>">Department</a></li>
                        <li><a href="#">Imported Excel Files</a></li>
                        <li><a href="#">NAS Schedule</a></li>
                        <li><a href="<?php echo base_url('index.php/MyProfile') ?>">My Profile</a></li>

                        <li class="title">Reports</li>
                        <li><a href="#">Head Evaluation Result</a></li>
                        <li><a href="#">Overall Evaluation Result</a></li>
                        <li><a href="#">Allowance</a></li>

                    </ul>
                </div>