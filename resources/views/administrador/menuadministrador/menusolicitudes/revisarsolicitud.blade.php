 
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
                    <h4 class="tittle-w3-agileits mb-4">Mis Solicitudes</h4>
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
                           


                            <br>
                            <h4 class="tittle-w3-agileits mb-4">Solicitudes </h4>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                    <th>Id de Solicitud</th>
                                <th>Tipo de Solicitud</th>
                                <th class="text-center">
                                        Estado Solicitud
                                    <br>                                  
                                </th>
                                <th class="text-center">
                                   Desde 
                                    <br>                                   
                                </th>
                                <th class="text-center">
                                    Hasta
                                    <br>                                    
                                </th>  
                                
                                <th class="text-center">
                                       Comentario
                                        <br>                                    
                                    </th>  

                                    <th class="text-center">
                                            Acción
                                             <br>                                    
                                         </th>  
                                    
                            </tr>
                        </thead>
                        <tbody>                      
                            <tr>
                                    @foreach ($listadoSolicitud as $item)                                   
                                <th class="text-nowrap" scope="row">{{$item->IdSolicitud}}</th>
                                <td   class="text-nowrap" scope="row">
                                
                                        @if (($item->TipoSolicitud) ==='DiaLibre')
                                        Solicitud Día libre
                                           @elseif  (($item->TipoSolicitud) ==='Vacacion')
                                                Solicitud Vacaciones
                                           @elseif  (($item->TipoSolicitud) ==='DiaAdministrativo')
                                           Solicitud Día Administrativo
                                           @elseif  (($item->TipoSolicitud) ==='InformarLicencia')
                                           Solicitud Informar Licencia
                                           @elseif  (($item->TipoSolicitud) ==='InformarAusencia')
                                           Solicitud Ausencia
                                        
                                        @endif

                                </td>    
                                <td   class="text-nowrap" scope="row">{{$item->EstadoSolicitud}}</td>  
                                <td    class="text-nowrap" id="numerosemana" scope="row">{{$item->DesdeSolicitud}} 
                                                            
                                </td>
                                <td   class="text-nowrap" scope="row">{{$item->HastaSolicitud}}</td>   
                                <td   class="text-nowrap" scope="row">{{$item->Comentario}}</td>   

                                <input type="hidden" name="created_at" value="{{$item->created_at}}">
                                            <input type="hidden" name="RutOperador" value="{{$item->RutOperador}}">
                                            <input type="hidden" name="RutAdministrador" value="{{$item->RutAdministrador}}">
                                            <input type="hidden" name="idSolicitud" value="{{$item->IdSolicitud}}">
                                            
                                <td>       

                                         @if ($item->EstadoSolicitud=='Pendiente')

                                         <form action="{{ route('aprobarsolicitud') }}" method="post">
                                                @csrf
                                             <button type="submit" class="btn btn-info" value="Aprobar Solicitud">Aprobar Solicitud</button>  
                                             <input type="hidden" name="created_at" value="{{$item->created_at}}">
                                            <input type="hidden" name="RutOperador" value="{{$item->RutOperador}}">
                                            <input type="hidden" name="RutAdministrador" value="{{$item->RutAdministrador}}">
                                            <input type="hidden" name="idSolicitud" value="{{$item->IdSolicitud}}">
                                              
                                        </form>    
                                        <form action="{{ route('rechazarsolicitud') }}" method="post">
                                                @csrf         
                                             <button type="submit" class="btn btn-danger" value="Rechazar Solicitud" class="btn btn-primary">Rechazar Solicitud</button>
                                          
                                            <input type="hidden" name="created_at" value="{{$item->created_at}}">
                                            <input type="hidden" name="RutOperador" value="{{$item->RutOperador}}">
                                            <input type="hidden" name="RutAdministrador" value="{{$item->RutAdministrador}}">
                                            <input type="hidden" name="RutAdministrador" value="{{$item->TipoSolicitud}}">
                                            
                                              
                                        </form>                                     
                                      
                                         @else

                                         <p>Solicitud Sin acción pendiente</p>
                                             
                                         @endif


                                          
                                       
                                             
                              </td>                                   
                            </tr>          
                            @endforeach    
                        </tbody>
                    </table>
                    <br>
                   
   
                </div>

         </section>      


   
                <!--// Countdown -->
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
    
 