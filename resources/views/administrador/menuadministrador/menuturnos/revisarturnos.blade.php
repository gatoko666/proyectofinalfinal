 
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
                    <h4 class="tittle-w3-agileits mb-4">Mis Turnos</h4>
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
                            Fecha     
                            <form action="{{ route('buscarturnos') }}" method="POST">
                                    @csrf         

                                    <input name="NumeroSemanaAno"  value="NumeroSemanaAno" type="week"> 
                                    <button type="submit" class="btn btn-primary ">Buscar</button>
                            </form>    
                            </div>                      
                            <br>
                            <h4 class="tittle-w3-agileits mb-4">Semana </h4>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre Trabajador</th>
                                <th class="text-center">
                                    Tipo de turno
                                    <br>                                  
                                </th>
                                <th class="text-center">
                                    Semana Asociada
                                    <br>                                   
                                </th>
                                <th class="text-center">
                                    Día de semana asignado
                                    <br>                                    
                                </th>                               
                            </tr>
                        </thead>
                        
                        <tbody>                      
                            <tr>
                                     
                                    
                                            <form action="{{ route('editarTurno')}}" method="POST">
                                                    @csrf

                                            <button type="submit"class="btn btn-primary">Editar turnos</button> <br>

                                    @foreach ($turnoOperadorlunes as $item)   

                                    
                                <th class="text-nowrap"    value="{{$item->NombreOperador}}"  scope="row">{{$item->NombreOperador}}</th>  
                                <input type="hidden"  name="NombreOperador[]" class="form-control" value="{{$item->NombreOperador}}"  >
                                <td   class="text-nowrap" scope="row">{{$item->AbreviacionTurno}}</td>  
                                <input type="hidden"  name="AbreviacionTurno[]" class="form-control" value="{{$item->AbreviacionTurno}}"  >
                                <td  onload="firstDayOfWeek()"  class="text-nowrap" id="numerosemana" scope="row">{{$item->NumeroSemanaAno}} 
                                        <input type="hidden"  name="NumeroSemanaAno[]" class="form-control" value="{{$item->NumeroSemanaAno}}"  >
                                <p onload="test()"  id="d"></p>                                    
                                </td> 
                                <td   class="text-nowrap" scope="row">{{$item->DiaSemana }}</td>  
                                <input type="hidden"  name="DiaSemana[]" class="form-control" value="{{$item->DiaSemana}}"  >                               
                            </tr>          
                            @endforeach    
                        </tbody>
                    </table>
                    <br>
                   
   
                </div>
            </form>

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
    
 