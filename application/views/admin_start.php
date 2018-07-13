<!DOCTYPE html>
<html lang="en">
<head>
	<title>OES-Admin</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Metro 4 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/metro/css/metro-all.css');?>">
    <style type="text/css">
        .ani-swoopInTop {
          animation-name: swoopInTop;
          animation-duration: 0.5s;
        }
        .ani-swoopOutTop {
          animation-name: swoopOutTop;
          animation-duration: 0.5s;
        }
        @keyframes swoopInTop {
          0% {
            opacity: 0;
            animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
            transform: scaleY(1.5) translate3d(0, -400px, 0);
          }
          40% {
            opacity: 1;
            animation-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
            transform: scaleY(1.2) translate3d(0, 0, 0);
          }
          65% {
            transform: scaleY(1) translate3d(0, 20px, 0);
          }
          100% {
            animation-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
            transform: scaleY(1) translate3d(0, 0, 0);
          }
        }
        @keyframes swoopOutTop {
          0% {
            animation-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
            transform: scaleY(1) translate3d(0, 0, 0);
          }
          40% {
            opacity: 1;
            transform: scaleY(1) translate3d(0, 20px, 0);
          }
          60% {
            animation-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
            transform: scaleY(1.2) translate3d(0, 0, 0);
          }
          100% {
            opacity: 0;
            animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
            transform: scaleY(1.5) translate3d(0, -400px, 0);
          }
        }
        .ani-rollInLeft {
          animation-name: rollInLeft;
          animation-duration: .5s;
        }
        @keyframes rollInLeft {
          0% {
            animation-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
            transform: translateX(-400px) rotate(445deg);
            opacity: 0;
          }
          30% {
            opacity: 1;
          }
          50% {
            transform: translateX(20px) rotate(20deg);
          }
          100% {
            animation-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
            transform: translateX(0) rotate(0deg);
          }
        }
        .ani-rollOutRight {
          animation-name: rollOutRight;
          animation-duration: .5s;
        }
        @keyframes rollOutRight {
          0% {
            opacity: 1;
            animation-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
            transform: translateX(0) rotate(0deg);
          }
          40% {
            opacity: 1;
            transform: translateX(-20px) rotate(20deg);
          }
          100% {
            opacity: 0;
            animation-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
            transform: translateX(400px) rotate(445deg);
          }
        }
    }
    .start-screen {
      min-width: 100%;
      height: 100%;
      position: relative;
      padding-bottom: 20px;
    }
    .start-screen-title {
      position: fixed;
      top: 20px;
      left: 80px;
      display: none;
    }
    [class*=tile-] {
      transform: scale(0.8);
    }
    .tiles-group {
      margin-left: 0;
      margin-top: 50px;
    }
    @media all and (min-width: 768px) {
      .start-screen-title {
        display: block;
      }
      .start-screen {
        padding: 140px 80px 0 0;
      }
      .tiles-group {
        left: 100px;
      }
      .tiles-group {
        margin-left: 80px;
      }
    }
    </style>
</head>
<body class="h-vh-100 bg-dark">
    <!--
    <div class="pos-fixed fixed-top app-bar-wrapper z-top">
        <header class="pos-relative app-bar-expand-md bg-red
        fg-white" data-role="appbar">
            <a href="#" class="brand no-hover fg-white-hover order-1 text-ellipsis" id="lblBrand" style="font-weight: bold;">ONLINE EVALUATION SYSTEM FOR NON-ACADEMIC SCHOLARS OF ACT</a>
            <ul class="app-bar-menu order-2 ml-auto">
                <li><a href="#" style="font-weight: bold;">Home</a></li>
                <li>
                    <a href="#" class="dropdown-toggle marker-light" style="font-weight: bold;">Masterfile</a>
                    <ul class="d-menu bg-red fg-white" data-role="dropdown">
                        <li><a href="#">User Accounts</a></li>
                        <li><a href="#">NAS</a></li>
                        <li><a href="#">Evaluation Question</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle marker-light" style="font-weight: bold;">Evaluation Components</a>
                    <ul class="d-menu bg-red fg-white" data-role="dropdown">
                        <li><a href="#">Grade</a></li>
                        <li><a href="#">Attendance</a></li>
                        <li><a href="#">Evaluation</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle marker-light" style="font-weight: bold;">Reports</a>
                    <ul class="d-menu place-right bg-red fg-white" data-role="dropdown">
                        <li><a href="#">Evaluation Results</a></li>
                        <li><a href="#">List of NAS Allowance</a></li>
                        <li><a href="#">List of NAS with renewal remarks</a></li>
                        <li><a href="#">List of NAS with number of units to be taken</a></li>
                    </ul>
                </li>
            </ul>

            <div class="app-bar-container order-3 order-sm-4">
                <a href="#" class="app-bar-item"><span class="mif-bell"></span></a>

                <div class="app-bar-container">
                    <a class="app-bar-item dropdown-toggle marker-light" href="#"><span class="mif-upload"></span></a>
                    <ul class="d-menu place-right bg-red fg-white" data-role="dropdown">
                        <li><a href="">New user</a></li>
                        <li><a href="">Import Attendance</a></li>
                        <li><a href="">Import Grade</a></li>
                        <li><a href="">Import Evaluation question</a></li>
                        <li class="divider"></li>
                        <li><a href="">New issue</a></li>
                    </ul>
                </div>

                <div class="app-bar-container">
                    <a class="app-bar-item dropdown-toggle marker-light pl-1 pr-5" href="#">
                        <img class="rounded" data-role="gravatar" data-email="sergey@pimenov.com.ua" data-size="25">
                    </a>
                    <ul class="v-menu place-right bg-red fg-white" data-role="dropdown">
                        <li><a href="">Signed as <strong>Username</strong></a></li>
                        <li class="divider"></li>
                        <li><a href="">My profile</a></li>
                        <li><a href="">Change password</a></li>
                        <li class="divider"></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
    </div>-->
        <div class="container-fluid start-screen no-overflow">
            <h1 class="start-screen-title fg-white">Online Evaluation System for Non-Academic Scholars of ACT</h1>
                <div class="tiles-area">
                    <div class="tiles-grid tiles-group size-2 fg-white" style="font-weight: bold" data-group-title="Masterfile">
                        <a href="https://github.com/olton/Metro-UI-CSS" data-role="tile" class="bg-indigo fg-white">
                            <span class="branding-bar">User Accounts</span>
                            <span class="badge-bottom">30</span>
                        </a>
                        <div data-role="tile" class="bg-cyan fg-white">
                            <span class="branding-bar">NAS</span>
                            <span class="badge-bottom">10</span>
                        </div>
                        <div data-role="tile" class="bg-orange fg-white" data-size="wide">
                            <span class="branding-bar">Evaluation Question</span>
                        </div>
                    </div>

                    <div class="tiles-grid tiles-group size-2 fg-white" style="font-weight: bold" data-group-title="Evaluation Components">
                        <div data-role="tile" data-cover="../../images/me.jpg">
                            <span class="branding-bar">Grades</span>
                        </div>
                        <div data-role="tile" data-effect="animate-fade" data-effect-duration="1000">
                            <span class="branding-bar">Attendance</span>
                        </div>
                        <div data-role="tile" data-size="wide">
                            <span class="branding-bar">Evaluation</span>
                        </div>
                    </div>

                    <div class="tiles-grid tiles-group size-1 fg-white" style="font-weight: bold" data-group-title="Import files">
                        <div id="UserTile" data-role="tile" data-size="small">
                            <span class="branding-bar">User</span>
                        </div>
                        <div id="NASTile" data-role="tile" data-size="small" class="bg-brown">
                            <span class="branding-bar">NAS</span>
                        </div>
                        <div data-role="tile" id="GradeTile" data-size="small" class="bg-green">
                            <span class="branding-bar">Grade</span>
                        </div>
                        <div data-role="tile" data-size="small" class="bg-red">
                            <span class="branding-bar">Attendance</span>
                        </div>
                    </div>

                    <div class="tiles-grid tiles-group size-2 fg-white" style="font-weight: bold" data-group-title="Reports">
                        <div data-role="tile" data-cover="../../images/Battlefield_4_Icon.png">
                            <span class="branding-bar">NAS Allowance</span>
                        </div>
                        <div data-role="tile" class="bg-green">
                            <img src="../../images/x-box.png" class="icon">
                            <span class="branding-bar">Evaluation Results</span>
                        </div>
                        <div data-role="tile" data-size="wide" data-cover="../../images/x-box.png">
                            <span class="branding-bar">NAS No. of Units</span>
                            <span class="badge-top">5</span>
                        </div>
                        <div data-role="tile" data-size="wide" data-cover="../../images/x-box.png">
                            <span class="branding-bar">NAS Renewal Remarks</span>
                            <span class="badge-top">5</span>
                        </div>
                    </div>
                </div>
            </div>
	<!-- jQuery first, then Metro UI JS -->
	<script type="text/javascript" src="<?php echo base_url('assets/metro/js/jquery-3.2.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/metro/js/metro.js');?>"></script>
	<script>
        /*
        $(document).ready(function() {
            if($(window).width() <= 1000) {
                $('#lblBrand').text("OES");
            }else{
                $('#lblBrand').text("ONLINE EVALUATION SYSTEM FOR NON-ACADEMIC SCHOLARS OF ACT");
            }
            $(window).resize(function(){
                if($(window).width() <= 1000) {
                    $('#lblBrand').text("OES");
                }else{
                    $('#lblBrand').text("ONLINE EVALUATION SYSTEM FOR NON-ACADEMIC SCHOLARS OF ACT");
                }
            });
        });
        var toast = Metro.toast.create;
        function invalidForm(){
            var form  = $(this);
            form.addClass("ani-ring");
            setTimeout(function(){
                form.removeClass("ani-ring");
            }, 1000);
        }
        function validateForm(){
            $(".login-form").animate({
                opacity: 0
            });
        }
        function openNewUserDialogActions(){
                Metro.dialog.create({
                    title: "Create new user",
                    content: "<div><form><div class='form-group'><label>Enter email</label><input type='email' placeholder='Example:alfeche492@gmail.com' data-role='input'></div><div class='form-group'><label>Select Department</label><select data-role='select'><option>CCS</option><option>CASP</option><option>CBM<option class='bg-red'>Manage Department</option></select></div></form></div>",
                    onShow: function(el){
                               el.addClass("ani-swoopInTop");
                               setTimeout(function(){
                                   el.removeClass("ani-swoopInTop");
                               }, 500);
                           },
                    actions: [
                        {
                            caption: "Create",
                            cls: "js-dialog-close alert",
                            onclick: function(){
                                toast("User has been successfully created",null,5000,'info');
                            }
                        },
                        {
                            caption: "Cancel",
                            cls: "js-dialog-close"
                        }
                    ],
                    onHide: function(el){
                               el.addClass("ani-swoopOutTop");
                               setTimeout(function(){
                                   el.removeClass("ani-swoopOutTop");
                               }, 500);
                           }
                });
            }
            function openImportNasDialogActions(){
                Metro.dialog.create({
                    title: "Import NAS from excel file",
                    content: '<div><input type="file" data-role="file" data-caption="Upload excel file"></div>',
                    onShow: function(el){
                               el.addClass("ani-swoopInTop");
                               setTimeout(function(){
                                   el.removeClass("ani-swoopInTop");
                               }, 500);
                           },
                    actions: [
                        {
                            caption: "Import",
                            cls: "js-dialog-close alert",
                            onclick: function(){
                                toast("Imported successfully",null,5000,'info');
                            }
                        },
                        {
                            caption: "Cancel",
                            cls: "js-dialog-close"
                        }
                    ],
                    onHide: function(el){
                               el.addClass("ani-swoopOutTop");
                               setTimeout(function(){
                                   el.removeClass("ani-swoopOutTop");
                               }, 500);
                           }
                });
            }*/
            $.StartScreen = function(){
                var plugin = this;
                var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

                plugin.init = function(){
                    setTilesAreaSize();
                    if (width >= 768) addMouseWheel();
                };

                var setTilesAreaSize = function(){
                    var groups = $(".tiles-group");
                    var tileAreaWidth = 80;
                    $.each(groups, function(i, t){
                        if (width <= 768) {
                            tileAreaWidth = width;
                        } else {
                            tileAreaWidth += $(t).outerWidth() + 80;
                        }
                    });
                    $(".tiles-area").css({
                        width: tileAreaWidth
                    });
                };

                var addMouseWheel = function (){
                    $("body").mousewheel(function(event, delta, deltaX, deltaY){
                        var page = $(".start-screen");
                        var scroll_value = delta * 50;
                        page.scrollLeft(page.scrollLeft() - scroll_value);
                        return false;
                    });
                };

                plugin.init();
            };

            $.StartScreen();

            $.each($('[class*=tile-]'), function(){
                var tile = $(this);
                setTimeout(function(){
                    tile.css({
                        opacity: 1,
                        "transform": "scale(1)",
                        "transition": ".3s"
                    }).css("transform", false);

                }, Math.floor(Math.random()*500));
            });

            $(".tiles-group").animate({
                left: 0
            });

            $(window).on(Metro.events.resize + "-start-screen-resize", function(){
                $.StartScreen();
            });
            $(document).ready(function(){
                $("#UserTile").click(function(){
                    Metro.dialog.create({
                                title: "Import user from excel file.",
                                content: '<strong class="fg-red">Note :</strong>Make sure that the excel has the same format with this example <strong><a class="fg-red" href="#">(Click here)</a></strong>.<input type="file" data-role="file" data-caption="Choose file">',
                                actions: [
                                    {
                                        caption: "Import",
                                        cls: "js-dialog-close primary",
                                        onclick: function(){
                                            alert("You clicked Agree action");
                                        }
                                    },
                                    {
                                        caption: "Cancel",
                                        cls: "js-dialog-close",
                                        onclick: function(){
                                            alert("You clicked Disagree action");
                                        }
                                    }
                                ]
                            });
                });
                $("#GradeTile").click(function(){
                    Metro.dialog.create({
                                title: "Import grade from excel file.",
                                content: '<strong class="fg-red">Note :</strong>Make sure that the excel has the same format with this example <strong><a class="fg-red" href="#">(Click here)</a></strong>.<input type="file" data-role="file" data-caption="Choose file">',
                                actions: [
                                    {
                                        caption: "Import",
                                        cls: "js-dialog-close primary",
                                        onclick: function(){
                                            alert("You clicked Agree action");
                                        }
                                    },
                                    {
                                        caption: "Cancel",
                                        cls: "js-dialog-close",
                                        onclick: function(){
                                            alert("You clicked Disagree action");
                                        }
                                    }
                                ]
                            });
                });
                $("#NASTile").click(function(){
                    Metro.dialog.create({
                                title: "Import NAS from excel file.",
                                content: '<strong class="fg-red">Note :</strong>Make sure that the excel has the same format with this example <strong><a class="fg-red" href="#">(Click here)</a></strong>.<input type="file" data-role="file" data-caption="Choose file">',
                                actions: [
                                    {
                                        caption: "Import",
                                        cls: "js-dialog-close primary",
                                        onclick: function(){
                                            alert("You clicked Agree action");
                                        }
                                    },
                                    {
                                        caption: "Cancel",
                                        cls: "js-dialog-close",
                                        onclick: function(){
                                            alert("You clicked Disagree action");
                                        }
                                    }
                                ]
                            });
                });
            });
            
    </script>
</body>
</html>
</body>
</html>