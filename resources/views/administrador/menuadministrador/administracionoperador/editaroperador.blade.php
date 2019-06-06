
@include('partials/header')    
<body>
    <div class="se-pre-con"></div>
    <div class="wrapper">
        <!-- Sidebar Holder -->           
        @include('partials/sidebar')
        <!-- Page Content Holder -->
        @include('partials/menu')
            <!--// top-bar -->


            

     <section class="grids-section bd-content">
            <!-- Grids Info -->
            <div class="outer-w3-agile mt-3">
                <h4 class="tittle-w3-agileits mb-4">Editar  Operador </h4>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                  <br>
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
              @endif     
                <br>
                <form method="post" action="{{ route('administracionoperador.update', $operador->RutOperador) }}">
                        <div class="form-group">
                            @csrf
                            @method('PATCH')
                            <label for="name">Nombre Operador :</label>
                            <input type="text" class="form-control" name="NombreOperador" value="{{$operador->NombreOperador}}"/>
                        </div>
                      
                        <div class="form-group">
                                <label for="price">Correo Operador  :</label>
                                <input type="mail" class="form-control" name="Correo" value="{{$operador->Correo}}"/>
                            </div>

                            <div class="form-group">
                                <label for="price">Teléfono Operador  :</label>
                                <input type="text" class="form-control" name="TelefonoOperador" size="10" value="{{$operador->TelefonoOperador}}"/>
                            </div>                            

                            
                            <div class="form-group">
                                    <label for="price">Localización Operador  :</label>
                                    <input type="text" class="form-control" name="LocalizacionOperador" value="{{$operador->LocalizacionOperador}}"/>
                                </div>
                              
                         
                        <button type="submit" class="btn btn-primary">Actualizar Operador Externo</button>
                    </form>
               
            </div>
     </section>      




                   
                                </div><!-- /.modal-content -->                                    
                            </div><!-- /.modal-dialog -->
                            @include('partials/footer')
                        </div><!-- /.modal -->   
            <!--// Countdown -->
            <!-- Copyright -->
        </div>          
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

