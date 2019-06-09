
    @include('partialsoperador/header')
    
    <body>
        <div class="se-pre-con"></div>
        <div class="wrapper">


            <!-- Sidebar Holder -->
           
            @include('partialsoperador/sidebar')
            <!-- Page Content Holder -->


            @include('partialsoperador/menu')
                <!--// top-bar -->


         <section class="grids-section bd-content">
                <!-- Grids Info -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Listado de documentos</h4>
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
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                                <tr>
                                        
                                        <th class="text-center">
                                             
                                            <br>
                                           
                                        </th>
                                        <th class="text-center">
                                             
                                                <br>
                                               
                                            </th>
                                      
                                       
                                       
                                        <th class="text-center">
                                             
                                            <br>
                                        
                                        </th>
                                        <th class="text-center">

                                           

 
                                                <br>
                                            
                                            </th>                                      
                                    </tr>


                            <tr>
                                
                                <th class="text-center">
                                    Nombre
                                    <br>
                                   
                                </th>
                                <th class="text-center">
                                    Descripción
                                    <br>
                                  
                                </th>
                                <th class="text-center">
                                    Fecha Subida
                                    <br>
                                   
                                </th>
                               
                                <th class="text-center">
                                    Acción
                                    <br>
                                
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody>

                                @foreach($detalledocumentos as $dd)
                                <tr>
                                    <th class="text-nowrap" scope="row">{{$dd->NombreDocumento}}</th>
                                    <td>{{$dd->Descripcion}}</td>
                                    <td>{{$dd->created_at}}</td>                                
                                    <td>          
                                
                                                                                  
                                          <a href="{{ url('descargadocumentos/'. $dd->IdDocumento)}}" class="btn btn-info">Descargar</a>   
                                         
                                               
                                </td>       
                                </tr>                                   
                                @endforeach      
                            </tr>                         
                        </tbody>
                    </table>
                  
                </div>

         </section>      


       
                     
                     
                
                        <!-- Modal -->
                        <div class="modal fade" id="fee-details1" tabindex="-1" role="dialog" aria-labelledby="fee-details-label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-xl">
                                <div class="modal-content">
                                    
                                    <div class="modal-body">
                                      
                                            <section class="grids-section bd-content">
                                                    <!-- Grids Info -->
                                                    <div class="outer-w3-agile mt-3">
                                                        <h4 class="tittle-w3-agileits mb-4">Listado de documentos</h4>
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th class="text-center">
                                                                        Nombre
                                                                        <br>
                                                                       
                                                                    </th>
                                                                    <th class="text-center">
                                                                        Descripción
                                                                        <br>
                                                                      
                                                                    </th>
                                                                    <th class="text-center">
                                                                        Fecha Subida
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
                                                                    <th class="text-nowrap" scope="row">Documento 1</th>
                                                                    <td>Manual de  usuario</td>
                                                                    <td>05/05/2015</td>
                                                                    <td>
                                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
                                                                                    Guardar Cambio
                                                                            </button>
                                    
                                                                    </td>
                                                                     
                                                                </tr>
                                                            
                                    
                                                                
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                    
                                             </section>
                                             <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                 
                                                  </div>      
                                    
                                    
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->









 




















   
                <!--// Countdown -->
                <!-- Copyright -->

                @include('partialsoperador/footer')



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
    
 
        <!-- Bar-chart -->
        <script src="js/rumcaJS.js"></script>
        <script src="js/example.js"></script>
        <!--// Bar-chart -->
 
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
    
 