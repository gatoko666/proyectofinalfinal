
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
                    <h4 class="tittle-w3-agileits mb-4">Turnos</h4>
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
                    <div class="container">
                           
                            <form action="{{route('actualizarturno')}}" method="POST">
                                    @csrf                                       
    
                            </div>
                            <div class="container">
                                  </div>
                            <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Trabajadores</th>
                                <input   name="TipoTurnoActual[]"  value="RutOperador"  type="hidden"  >
                                <th name="TipoTurnoActual[]" value="RutOperador" class="text-center">
                                     Tipo de turno Actual                                    
                                    <br>                                    
                                </th><input   name="TipoTurnoCambiar"  value="lunes"  type="hidden"  >
                                <th name="TipoTurnoCambiar[]" value="RutOperador" class="text-center">
                                        Tipo de turno a Cambiar  
                                       <br>                                       
                                   </th><input   name="SemanaAsociada"  value="lunes"  type="hidden"  >
                                <th name="SemanaAsociada[]" value="lunes" class="text-center">
                                        Semana Asociada                                     
                                    <br>                                    
                                </th> <input   name="DiaDeLaSemanaAsignado"  value="lunes"  type="hidden"  >
                                <th name="DiaDeLaSemanaAsignado[]" value="lunes" class="text-center">
                                        Dia de semana                                    
                                    <br>                                    
                                </th> 
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($turnoOperadorlunes as $op) 
                                <tr>
                                 <input   name="NombreTrabajadori[]"  value="{{$op->NombreOperador}}"  type="hidden"  >  
                                <th class="text-nowrap" name="NombreOperador[]"   scope="row">{{$op->NombreOperador}}</th> 
                                <input type="hidden"  name="RutOperador[]" class="form-control" value="{{$op->RutOperador}}"  >
                                <input type="hidden"  name="CorreoOp[]" class="form-control" value="{{$op->Correo}}"  >
                                <input type="hidden"  name="NombreOperador[]" class="form-control" value="{{$op->NombreOperador}}"  >
                                <input type="hidden"  name="IdDetalleTipoTurnoActual[]" class="form-control" value="{{$op->IdDetalleTipoTurno}}"  >
                                <input type="hidden"  name="AbreviacionTurno[]" class="form-control" value="{{$op->AbreviacionTurno}}"  >
                                <td class="text-nowrap" name="AbreviacionTurno[]"   scope="row">{{$op->AbreviacionTurno}}  
                                        <td>
                                                <p align="justify">
                                                <select name="tipodeTurnoCambiar[]" >

                                                     


                                                            

                                                        @foreach($detalletiposdeturnos as $dtt)   

                                                      
                                                             
                                                            @if ($op->IdDetalleTipoTurno==$dtt->IdDetalleTipoTurno)                                                            
                                                            <option value="{{$op->IdDetalleTipoTurno}}"  selected>                                                           
                                                                    {{$op->AbreviacionTurno}}
                                                                    
                                                        </option> 
                                                                                         
                                                        
                                                            @else   
                                                            <option value="{{$dtt->IdDetalleTipoTurno}}">{{$dtt->AbreviacionTurno}}  </option>  
                                                                                                                                      
                                                            @endif                                                          
                                                           
                                                          
                                                        
                                                        
                                                        
                                                        @endforeach        
                                                        
                                                        



                                                        </select> 
                                                </p>                                                        
                                           </td>      
                                </td>   
                                <input type="hidden"  name="NumeroSemanaAno[]" class="form-control" value="{{$op->NumeroSemanaAno}}"  >    
                                <td class="text-nowrap" name="NumeroSemanaAno[]"   scope="row">{{$op->NumeroSemanaAno}}</td> 
                                <input type="hidden"  name="DiaSemana[]" class="form-control" value="{{$op->DiaSemana}}"  >
                                <td class="text-nowrap" name="DiaSemana[]"   scope="row">{{$op->DiaSemana}}</td> 
                            </tr>
                                @endforeach 
                        </tbody>                      
                    </table>
                    <button type="submit"class="btn btn-primary">Actualizar turnos</button>                   
                </form>
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
    
     
        <!-- Bar-chart -->
        <script src="js/rumcaJS.js"></script>
        <script src="js/example.js"></script>
        <!--// Bar-chart -->
        <!-- Calender -->
        <script src="js/moment.min.js"></script>
        <script src="js/pignose.calender.js"></script>
     
    
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
        <!-- //Js for bootstrap working -->
    


 



            
    </body>
    
 