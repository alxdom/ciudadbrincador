@extends('layouts.lay_sala', ['pageSlug' => 'sala'])
<script>
  var refrescar = setInterval(function(){
    location.reload();
  }, 30000);
</script>
<script type="application/javascript">
  // Establece la fecha hasta la que estamos contando
  //Crea un arreglo donde almacena cada registro obtenido con los datos que necesita el contador
  var countdowns = [
    @foreach($tiempos as $tiempo) 
    {
        id: {{$tiempo->idUsuarioTiempo}},
        ip: "{{$tiempo->ip}}",
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
      //si el contador es menor a 30 segundos, la tarjeta será amarilla
      if (distance < 30000 ) {
        var x = document.getElementById("card" + countdown.id);
        x.style.background = "yellow"; 
        x.style.color = "black";
        timerElement.style.color = "black";
        //sólo si el contador es mayor a 29 pero menor que 30 envía la orden amarillo
        if (distance > 29000) {  //este if anidado permite evitar el bucle de ordenes
          console.log("Enviar orden AMARILLO a : "+countdown.ip); 
          //fetch('/fetch/'+countdown.ip);
        }
      }
      // Si el tiempo termina, escribimos que ha expirado
      if (distance < 0) {
        timerElement.innerHTML = "EXPIRED";
        expired = timerElement.textContent;
        var x = document.getElementById("card" + countdown.id);
        x.style.background = "red"; 
        x.style.color = "white";
        timerElement.style.color = "black";
        console.log("Enviar LED ROJO a: " +countdown.ip);
        //fetch('/fetch/'+countdown.ip);
        /***************INTENTO PARA "DESVINCULAR"*******************/
        var url = '/desvincular?id=myid&ip=myip'
        //var url = '/desvincular/"id"/"ip"';
        url = url.replace('myid', countdown.id);
        url = url.replace('myip', countdown.ip);
        fetch(url, {
          method: 'GET'
        });
        /**************TERMINA INTENTO PARA DESVINCULAR**************/
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

  <div class="container">Sala de espera
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            @foreach ($tiempos as $tiempo)
            <div class="col-3 col-mb-6">
              <div class="card" id="card{{$tiempo->idUsuarioTiempo}}">
                <div class="card-body">
                  <img class="card-img-top" src="https://www.nailseatowncouncil.gov.uk/wp-content/uploads/blank-profile-picture-973460_1280.jpg" alt="Profile pic">
                  <p class="card-title">{{$tiempo->nombre . " " . $tiempo->apellidoP . " " . $tiempo->apellidoM}}</p>
                  <p class="card-title" style="color: black">{{$tiempo->ip}}</p>
                  <p class="card-text"><small class="text-muted">Llegada: {{$tiempo->created_at}}</small></p>
                  <h2 class="card-title text-center"><div id="contador{{$tiempo->idUsuarioTiempo}}"></div></h2>
                </div>
              </div>
            </div>
          @endforeach
  </div>
</div>

@endsection