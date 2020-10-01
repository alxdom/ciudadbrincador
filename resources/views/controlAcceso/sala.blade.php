@extends('layouts.app', ['pageSlug' => 'sala'])

<script type="application/javascript">
  // Establece la fecha hasta la que estamos contando
  var countdowns = [
  @foreach ($tiempos as $tiempo)
    {
      id: {{$tiempo->id}},
      date: new Date("<?php echo date('M j, Y H:i:s', strtotime($tiempo->descripcion));?>").getTime()
    },
    @endforeach
  ];
  
  // Actualiza la cuenta hacia atrás cada 1 segundo
  var timer = setInterval(function() {
    // Obtiene la fecha y hora de hoy
    var now = Date.now();
  
    var index = countdowns.length - 1;
  
    // Tenemos que hacer un bucle hacia atrás, ya que eliminaremos las cuentas atrás cuando terminen
    while(index >= 0) {
      var countdown = countdowns[index];
  
      // Encuentra la distancia entre now y el date del arreglo countdowns
      var distance = countdown.date - now;
  
      // Calcular tiempo para días, horas, minutos y segundos
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
      var timerElement = document.getElementById("contador" + countdown.id);
  
      // Si el tiempo termina, escribimos que ha expirado 
      if (distance < 0) {
        timerElement.innerHTML = "EXPIRED";
        // El contador terminó, lo removemos
        countdowns.splice(index, 1);
      } else {
        timerElement.innerHTML =  hours + "h " + minutes + "m " + seconds + "s "; 
      }
  
      index -= 1;
    }

    // Si todos los contadores han terminado, detenemos la variable timer 
    if (countdowns.length < 1) {
      clearInterval(timer);
    }
  }, 1000);

</script>

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
            <div class="card-header">
            Prueba contadores individuales
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tbody>
                        @foreach ($tiempos as $tiempo)
                            <tr>
                                <td><b>{{$tiempo->orden}}</b></td> {{-- Aquí en "orden" sólo hardcodeé nombres de morros--}}
                                <td><div id="contador{{$tiempo->id}}"></td></div> {{--Aquí se mostrará el tiempo de cada contador--}}
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
@endsection