
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
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                    
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
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
                                                        <a href="#fee-details2" data-toggle="modal">Subir documento</a>
                            
                                                        
                                                      </button> 
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
                                
                                          <a href="{{ url('eliminardocumentos/'. $dd->IdDocumento)}}" class="btn btn-danger">Eliminar</a>  
                                          
                                          <a href="{{ url('descargadocumentos/'. $dd->IdDocumento)}}" class="btn btn-info">Descargar</a>   
                                         
                                               
                                </td>       
                                </tr>                                   
                                @endforeach   


                         
                          

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Modal 1
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Modal 2 -->
                                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Confirmación</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Eliminar
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>


 
                               
                            </tr>                         
                        </tbody>
                    </table>
                    {{ $detalledocumentos->links() }}
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

   <div class="modal fade" id="fee-details2" tabindex="-1" role="dialog" aria-labelledby="fee-details-label" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-xl">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            
                                          
                                                <section class="grids-section bd-content">
                                                        <!-- Grids Info -->
                                                        <div class="outer-w3-agile mt-3">
                                                            <h4 class="tittle-w3-agileits mb-4">Tipos de turnos</h4>

                                                            <div class="container">
                                                                    <form action="{{ route('documentos.store') }}" method="post"   files="true"  enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <input type="file" class="form-control-file" accept="application/pdf"  name="userfile" id="exampleInputFile" aria-describedby="fileHelp">
                                                                            <br>
                                                                            <label for="exampleFormControlTextarea1">Nombre Archivo</label>
                                                                            <input type="text" class="form-control" id="exampleFormControlTextarea1" maxlength="20" name="NombreDocumento" rows="3"></input>  
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
                                                             
                                                            </div> 
                                                        </div>                                        
                                                 </section>
                                                 <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>                                                     
                                                      </div>     
                                        </div>                                        
                                    </div><!-- /.modal-content -->                                    
                                </div><!-- /.modal-dialog -->







 




















   
                <!--// Countdown -->
                


                <!--// Copyright -->
            </div>

            <!-- Copyright -->

                @include('partials/footer')

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
    
 