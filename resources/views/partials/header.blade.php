<!--
    Author: Gabriel M
    Author URL:  
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->
    <!DOCTYPE>
    <html lang="es">
    
    <head>
        <title>Adturn</title>
        <!-- Meta Tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="keywords" content=" " />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);
    
            function hideURLbar() {
                window.scrollTo(0, 1);
            }


            function checkRut(rut) {
                // Despejar Puntos
                var valor = rut.value.replace('.','');
                // Despejar Guión
                valor = valor.replace('-','');
                
                // Aislar Cuerpo y Dígito Verificador
                cuerpo = valor.slice(0,-1);
                dv = valor.slice(-1).toUpperCase();
                
                // Formatear RUN
                rut.value = cuerpo + '-'+ dv
                
                // Si no cumple con el mínimo ej. (n.nnn.nnn)
                if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
                
                // Calcular Dígito Verificador
                suma = 0;
                multiplo = 2;
                
                // Para cada dígito del Cuerpo
                for(i=1;i<=cuerpo.length;i++) {
                
                    // Obtener su Producto con el Múltiplo Correspondiente
                    index = multiplo * valor.charAt(cuerpo.length - i);
                    
                    // Sumar al Contador General
                    suma = suma + index;
                    
                    // Consolidar Múltiplo dentro del rango [2,7]
                    if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
              
                }
                
                // Calcular Dígito Verificador en base al Módulo 11
                dvEsperado = 11 - (suma % 11);
                
                // Casos Especiales (0 y K)
                dv = (dv == 'K')?10:dv;
                dv = (dv == 0)?11:dv;
                
                // Validar que el Cuerpo coincide con su Dígito Verificador
                if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
                
                // Si todo sale bien, eliminar errores (decretar que es válido)
                rut.setCustomValidity('');
            }


            function test(){


                var x = document.getElementById("numerosemana").value;

                document.getElementById("demo").innerHTML = x;
            }

            function firstDayOfWeek (year, week) {

                // Jan 1 of 'year'
                var d = new Date(year, 0, 1),
                    offset = d.getTimezoneOffset();
            
                // ISO: week 1 is the one with the year's first Thursday 
                // so nearest Thursday: current date + 4 - current day number
                // Sunday is converted from 0 to 7
                d.setDate(d.getDate() + 4 - (d.getDay() || 7));
            
                // 7 days * (week - overlapping first week)
                d.setTime(d.getTime() + 7 * 24 * 60 * 60 * 1000 
                    * (week + (year == d.getFullYear() ? -1 : 0 )));
            
                // daylight savings fix
                d.setTime(d.getTime() 
                    + (d.getTimezoneOffset() - offset) * 60 * 1000);
            
                // back to Monday (from Thursday)
                d.setDate(d.getDate() - 3);
            
                return d;
            }


           


        </script>

        
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'week'});
webshims.polyfill('forms forms-ext');
</script>
        <!-- //Meta Tags -->
    
        <!-- Style-sheets -->
        <!-- Bootstrap Css -->
        <link href=" {{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- Bootstrap Css -->
        <!-- Bars Css -->
        <link rel="stylesheet" href="{{ asset('css/bar.css') }}">
        <!--// Bars Css -->
        <!-- Calender Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pignose.calender.css') }}" />
        <!--// Calender Css -->
        <!-- Common Css -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!--// Common Css -->
        <!-- Nav Css -->
        <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
        <!--// Nav Css -->
        <!-- Fontawesome Css -->
        <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">
        <!--// Fontawesome Css -->
        <!--// Style-sheets -->
    
        <!--web-fonts-->
        <link href="{{ asset('//fonts.googleapis.com/css?family=Poiret+One') }}" rel="stylesheet">
        <link href="{{ asset('//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }}">
         
        <script src="{{ asset('https://code.jquery.com/jquery-1.12.4.js') }}"></script>
        <script src="{{ asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}"></script>
        <!--//web-fonts-->
    </head>