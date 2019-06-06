
    @include('partials/header')
    
    <body>
        <div class="se-pre-con"></div>
        <div class="wrapper">


            <!-- Sidebar Holder -->
           
            @include('partials/sidebar')
            <!-- Page Content Holder -->


            @include('partials/menu')
                <!--// top-bar -->


                <!-- main-heading -->
                <h2 class="main-title-w3layouts mb-2 text-center">Subir documento</h2>
                <!--// main-heading -->
    
                <!-- Error Page Content -->
                <div class="blank-page-content">
    
                    <!-- Error Page Info -->
                    <div class="outer-w3-agile mt-3">
                            @if ($message = Session::get('Exitoso'))

                            <div class="alert alert-success alert-block">
          
                                <button type="button" class="close" data-dismiss="alert">×</button>
          
                                <strong>{{ $message }}</strong>
          
                            </div>
          
                        @endif
          
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Existe un error en la subida del archivo.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        


                            <!--// upload file -->

                            <form action="{{ route('documentos.store') }}" method="post"   files="true"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" class="form-control-file" accept="application/pdf"  name="file" id="exampleInputFile" aria-describedby="fileHelp">
                                    <br>
                                  <label for="exampleFormControlTextarea1">Descripción</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" name="Descripcion" rows="3"></textarea>      
                                  <br>
                                    <br>
                                  <small id="fileHelp" class="form-text text-muted">Por favor, solo suba archivos de 2MB o menos.</small>
                                    <br>
                                </div>
                                <button type="submit" class="btn btn-primary">Subir</button>
                            </form>



                           

                            








                        <p class="paragraph-agileits-w3layouts">        </p>
                    </div>
                    <!--// Error Page Info -->
    
                </div>
    
                <!--// Error Page Content -->
    

                
                
                <!-- Copyright -->

                @include('partials/footer')



                <!--// Copyright -->
            </div>
        </div>
    
    
        <!-- Required common Js -->
        <script src='js/jquery-2.2.3.min.js'></script>
        <!-- //Required common Js -->
        
        <!-- loading-gif Js -->
        <script src="js/modernizr.js"></script>
        <script>
            //paste this code under head tag or in a seperate js file.
            // Wait for window load
            $(window).load(function () {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");;
            });
        </script>
        <!--// loading-gif Js -->
    
        <!-- Sidebar-nav Js -->
        <script>
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
        <!--// Sidebar-nav Js -->
    
       
        <!-- profile-widget-dropdown js-->
        <script src="js/script.js"></script>
        <!--// profile-widget-dropdown js-->
    
       
    
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
        <script src="js/uploadfile.js"></script>
        <!-- //Js for bootstrap working -->
    
    </body>
    
 