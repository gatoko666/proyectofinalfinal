
    @include('partials/header')

    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
    
            @include('partials/sidebar')
    
            <!-- Page Content Holder -->
            <div id="content">
                <!-- top-bar -->
                @include('partials/menu')
    
    
                <!--// top-bar -->
    
                <!-- main-heading -->
                <h2 class="main-title-w3layouts mb-2 text-center">Notificaciones</h2>
                <!--// main-heading -->
    
                <!-- Inbox Page -->
                <!-- Inbox topnav -->
                <nav class="inbox-nav-w3ls p-3 bg-dark text-white">
                    <div class="row">
                        <div class="inbox-topl col-6">
                            <ul class="d-flex justify-content-between">
                                <li>
                                    <a href="#" class="email-menu">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="email-type">Notificaciones</a>
                                </li>
                                <li class="right">
                                    <a href="#">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="inbox-topr col-6">
                            <ul class="right d-flex justify-content-end">
                                <li>
                                    <a href="#">
                                        <i class="fas fa-archive"></i>
                                    </a>
                                </li>
                                <li class="mx-4">
                                    <a href="#">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-envelope"></i>
                                    </a>
                                </li>
                                <li class="ml-4">
                                    <a href="#">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Inbox topnav -->
    
                <!-- Inbox content -->
                <!--// Inbox content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="index-lcontent col-xl-6">
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- left-strip -->
                                    <div class="inbox-side-strip-w3-agileits px-2 py-3 col-3">
                                        <ul class="text-center">
                                            <li>
                                                <img src="images/profile.jpg" class="img-fluid rounded-circle" alt="Responsive image">
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-inbox"></i>
                                                </a>
                                                Entrada
                                                <span class="badge">4</span>
                                            </li>
                                            
                                            <li>
                                                <a href="#">
                                                    <i class="far fa-share-square"></i>
                                                    Leidos
                                                </a>
                                                
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                                Eliminados
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- //left-strip -->
    
                                    <!-- right-strip -->
    
                                    <div class="email-list col-9">
                                        <ul class="collection">
                                            <li class="collection-item d-flex justify-content-between">
                                                <i class="fas fa-partialss text-primary align-self-center mr-3"></i>
                                                <div class="mid-cn">
                                                    <span class="email-title">Social</span>
                                                    <p class="paragraph-agileits-w3layouts">You have Google+ request from john doe.</p>
                                                </div>
                                                <a href="#" class="ml-2">
                                                    <span class="badge badge-secondary bg-primary">4 New</span>
                                                </a>
                                            </li>
                                            <li class="collection-item d-flex justify-content-between">
                                                <i class="fas fa-tag text-success mr-3"></i>
                                                <div class="mid-cn">
                                                    <span class="email-title">Promotions</span>
                                                    <p class="paragraph-agileits-w3layouts">Amazon, Flipkart 50% off on summer sale.</p>
                                                </div>
                                                <a href="#" class="secondary-content">
                                                    <span class="badge badge-secondary bg-success">5 New</span>
                                                </a>
                                            </li>
                                            <li class="collection-item d-flex justify-content-between">
                                                <i class="fas fa-exclamation-circle text-warning mr-3"></i>
                                                <div class="mid-cn">
                                                    <span class="email-title">Updates</span>
                                                    <p class="paragraph-agileits-w3layouts">Google play application updates for your mobile.</p>
                                                </div>
                                                <a href="#" class="secondary-content">
                                                    <span class="badge badge-secondary bg-warning">2 New</span>
                                                </a>
                                            </li>
                                            <li class="collection-item d-flex justify-content-between">
                                                <span class="circle mr-3">A</span>
                                                <div class="mid-cn">
                                                    <span class="email-title">Amazon.com</span>
                                                    <p class="paragraph-agileits-w3layouts">Summer sale is now going on.</p>
                                                </div>
                                                <a href="#" class="email-time">
                                                    <small class="text-primary">12:10 am</small>
                                                </a>
                                            </li>
                                            <li class="collection-item selected d-flex justify-content-between">
                                                <img src="images/profile.jpg" alt="" class="img-fluid mr-3">
                                                <div class="mid-cn">
                                                    <span class="email-title">Andy Brown</span>
                                                    <p class="paragraph-agileits-w3layouts">Hay Joe, we have next project for this summer.</p>
                                                </div>
                                                <a href="#" class="email-time">
                                                    <i class="mdi-editor-attach-file attach-file"></i>
                                                    <small class="text-secondary">12:10 am</small>
                                                </a>
                                            </li>
                                            <li class="collection-item d-flex justify-content-between">
                                                <span class="circle mr-3">T</span>
                                                <div class="mid-cn">
                                                    <span class="email-title">Tuts+</span>
                                                    <p class="paragraph-agileits-w3layouts">Update your code skill, free tutorial for web development.</p>
                                                </div>
                                                <a href="#" class="email-time">
                                                    <small class="text-primary">2:05 am</small>
                                                </a>
                                            </li>
                                            <li class="collection-item d-flex justify-content-between">
                                                <span class="circle mr-3 bg-primary">F</span>
                                                <div class="mid-cn">
                                                    <span class="email-title">Facebook.com</span>
                                                    <p class="paragraph-agileits-w3layouts">You have new friend request from emy nelson.</p>
                                                </div>
                                                <a href="#" class="email-time">
                                                    <small class="text-primary">1:15 pm</small>
                                                </a>
                                            </li>
                                            <li class="collection-item d-flex justify-content-between">
                                                <span class="circle mr-3 bg-dark">T</span>
                                                <div class="mid-cn">
                                                    <span class="email-title">Twitter</span>
                                                    <p class="paragraph-agileits-w3layouts">You have 5 new followers today,  ck it out.</p>
                                                </div>
                                                <a href="#" class="email-time">
                                                    <small class="text-primary">8:30 pm</small>
                                                </a>
                                            </li>
                                            <li class="collection-item d-flex justify-content-between">
                                                <span class="circle mr-3">E</span>
                                                <div class="mid-cn">
                                                    <span class="email-title">Envato Studio</span>
                                                    <p class="paragraph-agileits-w3layouts">Envato Studio Provider News : Score the new stuff.</p>
                                                </div>
                                                <a href="#" class="email-time">
                                                    <small class="text-primary">5:18 am</small>
                                                </a>
                                            </li>
                                            <li class="collection-item d-flex justify-content-between">
                                                <span class="circle mr-3">G</span>
                                                <div class="mid-cn">
                                                    <span class="email-title">Gmail</span>
                                                    <p class="paragraph-agileits-w3layouts">You have 5 new mail today.</p>
                                                </div>
                                                <a href="#" class="email-time">
                                                    <small class="text-primary">6:38 am</small>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- right-strip -->
                                </div>
                            </div>
                        </div>
                        <div class="index-rcontent col-xl-6 mt-xl-0 mt-3">
                            <div class="outer-w3-agile">
                                <p class="paragraph-agileits-w3layouts font-weight-bold">New app design for iPhone
                                    <mark>inbox</mark>
                                    <mark>projects
                                    </mark>
                                    <i class="mdi-action-star-rate yellow-text text-darken-3 right"></i>
                                </p>
                                <hr class="grey-text text-lighten-2">
                                <div class="email-content-wrap">
                                    <div class="row">
                                        <div class="col-9">
                                            <ul class="collection">
                                                <li class="collection-item selected d-flex justify-content-between">
                                                    <img src="images/profile.jpg" alt="" class="rounded-circle mr-3">
                                                    <div class="mid-cn">
                                                        <span class="email-title">Andy Brown</span>
                                                        <br>
                                                        <small class="text-primary">To me, John Doe</small>
                                                        <br>
                                                        <small class="text-primary">Yesterday</small>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-3 email-actions d-flex justify-content-end">
                                            <a href="#" class="mr-4">
                                                <i class="fas fa-reply"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="email-content">
                                        <p class="paragraph-agileits-w3layouts">Hi Mike,</p>
                                        <p class="paragraph-agileits-w3layouts">Sed ut perspiciatis unde omnis iste natus error.</p>
                                        <p class="paragraph-agileits-w3layouts">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                        <p class="paragraph-agileits-w3layouts font-weight-normal">Cheers!
                                            <br>Andy Brown</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="email-content-wrap">
                                    <div class="row">
                                        <div class="col-9">
                                            <ul class="collection">
                                                <li class="collection-item d-flex justify-content-between">
                                                    <span class="circle mr-3">M</span>
                                                    <div class="mid-cn">
                                                        <span class="email-title">Mike Parker</span>
                                                        <br>
                                                        <small class="text-primary">To Andy Brown</small>
                                                        <br>
                                                        <small class="text-primary">6:10 pm</small>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-3 email-actions d-flex justify-content-end">
                                            <a href="#" class="mr-3">
                                                <i class="fas fa-reply"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="email-content">
                                        <p class="paragraph-agileits-w3layouts">Hi Andy,</p>
                                        <p class="paragraph-agileits-w3layouts">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                        <p class="paragraph-agileits-w3layouts">Regards,
                                            <br>Mike Parker</p>
                                    </div>
                                </div>
                                <div class="email-reply mt-4">
                                    <div class="row">
                                        <div class="col text-center">
                                            <a href="#">
                                                <i class="fas fa-reply"></i>
                                            </a>
                                            <small class="d-block text-secondary">Reply</small>
                                        </div>
                                        <div class="col text-center">
                                            <a href="#">
                                                <i class="fas fa-reply-all"></i>
                                            </a>
                                            <small class="d-block text-secondary">Reply all</small>
                                        </div>
                                        <div class="col text-center">
                                            <a href="#">
                                                <i class="fas fa-forward"></i>
                                            </a>
                                            <small class="d-block text-secondary">Forward</small>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
                <!--// Inbox Page -->
                <!-- Copyright -->
             @include('partials/footer')
                <!--// Copyright -->
            </div>
        </div>
    
    
        <!-- Required common Js -->
        <script src='js/jquery-2.2.3.min.js'></script>
        <!-- //Required common Js -->
    
        <!-- Sidebar-nav Js -->
        <script>
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
        <!--// Sidebar-nav Js -->
    
        <!-- dropdown nav -->
        <script>
            $(document).ready(function () {
                $(".dropdown").hover(
                    function () {
                        $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                        $(this).toggleClass('open');
                    },
                    function () {
                        $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                        $(this).toggleClass('open');
                    }
                );
            });
        </script>
        <!-- //dropdown nav -->
    
        <!-- Js for bootstrap working-->
        <script src="js/bootstrap.min.js"></script>
        <!-- //Js for bootstrap working -->
    
    </body>
    
    </html>