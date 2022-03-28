
<!DOCTYPE html>
<html lang="en" dir="ltr">

<?= view("/backend/template/head");?>

<body>


    <!-- pre-loader start -->
    <!-- <div class="loader-wrapper">
        <img src="./assets/images/loader/loader.gif" alt="loader gif">
    </div> -->
    <!-- pre-loader End -->

    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper modern-type" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">

                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid main-logo"
                                src="./assets/images/logo/logo.png" alt="logo">
                            <img class="img-fluid white-logo" src="./assets/images/logo/logo-white.png" alt="logo"></a>
                    </div>
                    <!-- <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                            data-feather="align-center"></i>
                    </div> -->
                </div>

                <!-- <form class="form-inline search-full col " action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Rica .." name="q" title="" autofocus>
                                <i class="close-search" data-feather="x"></i>
                                <div class="spinner-border Typeahead-spinner" role="status"><span
                                        class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form> -->
                <!-- <div class="nav-right col-4 pull-right right-header p-0">
                    <ul class="nav-menus">

                        <li> <span class="header-search"><i data-feather="search"></i></span></li>
                        <li class="onhover-dropdown">
                            <div class="notification-box"><i class="fa fa-bell-o"> </i><span
                                    class="badge rounded-pill badge-theme">4 </span></div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li><i data-feather="bell"></i>
                                    <h6 class="f-18 mb-0">Notitications</h6>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-primary"> </i>Delivery processing <span
                                            class="pull-right">10
                                            min.</span></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-success"></i>Order Complete<span
                                            class="pull-right">1 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-info"></i>Tickets Generated<span
                                            class="pull-right">3 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-danger"></i>Delivery Complete<span
                                            class="pull-right">6
                                            hr</span></p>
                                </li>
                                <li><a class="btn btn-primary" href="#">Check all notification</a></li>
                            </ul>
                        </li>

                        <li>
                            <div class="mode"><i class="fa fa-moon-o" aria-hidden="true"></i>
                            </div>
                        </li>

                        <li class="onhover-dropdown"><i data-feather="message-square"></i>
                            <ul class="chat-dropdown onhover-show-div">
                                <li><i data-feather="message-square"></i>
                                    <h6 class="f-18 mb-0">Message Box </h6>
                                </li>
                                <li>
                                    <div class="media"><img class="img-fluid rounded-circle me-3"
                                            src="./assets/images/user/1.jpg" alt="user1">
                                        <div class="status-circle online"></div>
                                        <div class="media-body"><span>Erica Hughes</span>
                                            <p>Lorem Ipsum is simply dummy...</p>
                                        </div>
                                        <p class="f-12 font-success">58 mins ago</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="media"><img class="img-fluid rounded-circle me-3"
                                            src="./assets/images/user/2.jpg" alt="user2">
                                        <div class="status-circle online"></div>
                                        <div class="media-body"><span>Kori Thomas</span>
                                            <p>Lorem Ipsum is simply dummy...</p>
                                        </div>
                                        <p class="f-12 font-success">1 hr ago</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="media"><img class="img-fluid rounded-circle me-3"
                                            src="./assets/images/user/4.jpg" alt="user3">
                                        <div class="status-circle offline"></div>
                                        <div class="media-body"><span>Ain Chavez</span>
                                            <p>Lorem Ipsum is simply dummy...</p>
                                        </div>
                                        <p class="f-12 font-danger">32 mins ago</p>
                                    </div>
                                </li>
                                <li class="text-center"> <a class="btn btn-primary" href="#">View All </a></li>
                            </ul>
                        </li>
                        <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a></li>
                        <li class="profile-nav onhover-dropdown pe-0 me-0">
                            <div class="media profile-media">
                                <img class="user-profile rounded-circle" src="./assets/images/users/4.jpg"
                                    alt="profile-picture">
                                <div class="user-name-hide media-body"><span>Emay Walter</span>
                                    <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                                <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
                                <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
                                <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li>
                                <li><a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        href="javascript:void(0)"><i data-feather="log-out"> </i><span>Log
                                            out</span></a></li>

                            </ul>
                        </li>
                    </ul>
                </div> -->
                <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
        </script>
                <script class="empty-template"
                    type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
            </div>
        </div>
        <!-- Page Header Ends -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div>
                    <div class="logo-wrapper">
                        <span class="back">Back</span>
                        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
                            </i></div>
                    </div>
                    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                                src="./assets/images/logo/logo-icon.png" alt=""></a></div>
                    <?= view("/backend/template/menu");?>
                </div>
            </div>
            <!-- Page Sidebar Ends-->
            <div class="page-body">

                <!-- Container-fluid starts-->
                
                <?= $this->renderSection('container-fluid');?>
                <!-- Container-fluid Ends-->

               
            </div>
        </div>

    </div>
    <!-- Modal -->
    <!-- <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="button-box">
                        <button type="button" class="btn btn--no " data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn  btn--yes btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="customizer-links"></div> -->


    <!-- latest jquery-->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="./assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="./assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="./assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="./assets/js/scrollbar/simplebar.js"></script>
    <script src="./assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="./assets/js/config.js"></script>


    <!-- tooltip init js  start-->
    <script src="./assets/js/tooltip-init.js"></script>
    <!-- tooltip init js  end-->

    <!-- slick js start -->
    <script src="./assets/js/slick.js"></script>
    <!-- slick js end -->

    <!-- Plugins JS start-->
    <script src="./assets/js/sidebar-menu.js"></script>
    <!-- <script src="./assets/js/notify/bootstrap-notify.min.js"></script> -->


    <script src="./assets/js/notify/index.js"></script>
    <script src="./assets/js/typeahead/handlebars.js"></script>
    <script src="./assets/js/typeahead/typeahead.bundle.js"></script>
    <script src="./assets/js/typeahead/typeahead.custom.js"></script>
    <script src="./assets/js/typeahead-search/handlebars.js"></script>
    <script src="./assets/js/typeahead-search/typeahead-custom.js"></script>
    <!-- Plugins JS Ends-->

    <script src="./assets/js/datepicker/date-picker/datepicker.js"></script>

    <script src="./assets/js/datepicker/date-picker/datepicker.en.js"></script>

    <script src="./assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <!-- Apexchar js start -->

    <script src="./assets/js/chart/apex-chart/moment.min.js"></script>
    <script src="./assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="./assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="./assets/js/chart/apex-chart/chart-custom.js"></script>
    <!-- Apexchar js start -->
    <!-- ratio start  -->
    <script src="./assets/js/ratio.js"></script>
    <!-- vector map start -->
    <!-- customizer js start  -->
    <script src="./assets/js/customizer.js"></script>
    <!-- customizer js start  -->
    <script src="./assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="./assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
    <script src="./assets/js/vector-map/map-vector.js"></script>
    <!-- vector map end -->
    <!-- Theme js-->
    <script src="./assets/js/script.js"></script>

    <!-- login js-->
    <!-- Plugin used-->
    <!-- vue js -->
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qs/6.10.3/qs.min.js" integrity="sha512-juaCj8zi594KHQqb92foyp87mCSriYjw3BcTHaXsAn4pEB1YWh+z+XQScMxIxzsjfM4BeVFV3Ij113lIjWiC2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?=$this->renderSection('lastScript')?>
</body>

</html>