@extends('layouts.app', ['pageSlug' => 'sala'])
<script>
  var refrescar = setInterval(function(){
    location.reload();
  }, 20000);
</script>
<script type="application/javascript">
  // Establece la fecha hasta la que estamos contando
  var countdowns = [
  @foreach ($tiempos as $tiempo)
    {
      id: {{$tiempo->id}},
      date: new Date("<?php echo date('M j, Y H:i:s', strtotime($tiempo->hora_salida));?>").getTime()
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
        var x = document.getElementById("card" + countdown.id);
        x.style.background = "red"; 
        x.style.color = "white"; 
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




  <div class="container">Prueba contadores individuales
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
      
        
          
            @foreach ($tiempos as $tiempo)
              
            <div class="col-3 mb-4">
              <div class="card" id="card{{$tiempo->id}}">
                <div class="card-body">
                  <img class="card-img-top" src="http://lorempixel.com/400/200/people/" alt="Card image cap">
                  
                  <p class="card-title">{{$tiempo['usuario']->nombre . " " . $tiempo['usuario']->apellidoP . " " . $tiempo['usuario']->apellidoM}}</p>
                  <p class="card-text"><small class="text-muted">Tiempo de llegada: {{$tiempo->created_at}}</small></p>
                  <h2 class="card-title text-center"><div id="contador{{$tiempo->id}}"></div></h2>
                </div>
              </div>
            </div>

          @endforeach
        
      
  </div>
</div>



@endsection