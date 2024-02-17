<style>
    .custom-alert {
    width: 60%;
    
}
.card5{
    width: 90%
}
#slider {
  width: 600px;
  display: flex;
  gap: 15px;
  font-size: 30px;
}

#sliderValue {
  display: flex;
  color: #B99470;
    font-weight: 700;
    align-items: center;
    margin-left: 40%;
    margin-bottom: 20px;
}

.start {
  opacity: 0;
}

.animation {
  animation: fade .3s forwards;
}


@keyframes fade {
  0%{
    opacity: 0;
    transform: translateY(20px);
  }
  100%{
    opacity: 1;
    transform: translateY(0px);
  }
}

.holder-animation {
  animation: holder 4s;
}

@keyframes holder {
  0%{
    opacity: 1;
  }
  95%{
    opacity: 1;
  }
  100%{
    opacity: 0;
  }
}
.custom-frame {
        background-color: #EFDFCC; /* Couleur de fond */
        border: 1px solid #d0b28f; /* Bordure */
        padding: 15px; /* Espace intérieur */
        margin-bottom: 20px;
        border-radius: 5px; 
        margin-left: 46px;
        
    }

    .custom-frame p {
        font-size: 16px;
        color: #495057; 
        margin: 0;
    }
    .btn-email{
      color: whitesmoke;
      border: 1px solid  white;
      border-radius: 10px;
      background-color: #ff0b48;
      height: 50px;
      width: 140px;
      margin-left: 40px;
    }
    .alert{
      margin: 30px 4% ;
      margin-right: 6%;
    }
    h6{
      margin-left: 50px;
    }
</style>
@extends('Electrique.layoute1')

@section('content')
<main id="main" class="main container mt-4">
    <div class="card5 mt-5">
      <div id="slider">
        <div class="span"> </div>
        <div class="span" id="sliderValue"></div>
    </div>




    <div class="row">
      <div class="col-md-5 custom-frame">
          <div class="row">
              <p>Moyenne: {{ $moyenne }}</p>
          </div>
      </div>
  
      <div class="col-md-5 custom-frame">
          <div class="row">
              <p>Seuil Detection: {{ $seuilDetection }}</p>
          </div>
      </div>
  </div>
  <h6 >Situations :</h6>
    <p>
      @if ($valeurSaisie > $seuilDetection)
      <div class="alert alert-danger" role="alert">
        Fuite détectée ! La valeur saisie est anormalement élevée.
        
      </div>
      <form method="post" action="{{ url('notifications_email') }}">
        {{csrf_field() }}
        <button type="submit" class="btn-email"> e-mail <i class="bi bi-envelope-at-fill"></i></button>
       
      </form>
      <button type="submit" class="btn-email">Retour List <i class="bi bi-envelope-at-fill"></i></button>
    @else
      <div class="alert alert-success" role="alert">
        Consommation normale.
        
    @endif
    </p>
    </div>
</main>
<script>
    
  var sliderCounter = 0;
  var sliderContent = [
    "Situations  de consommation",
    "Detection de fuit ",
    "Situations normales",
  ];
  var slider = document.querySelector("#slider");
  var sliderValue = document.querySelector("#sliderValue");
  
  function slide() {
    if (sliderCounter >= sliderContent.length) {
      sliderCounter = 0;
    }
  
    sliderValue.innerHTML = "";
    
    sliderValue.classList.remove("holder-animation");
    void sliderValue.offsetWidth;
    sliderValue.classList.add("holder-animation");
    
    for (i = 0; i < sliderContent[sliderCounter].length; i++) {
      let letterDiv = document.createElement("div");
      letterDiv.innerHTML = sliderContent[sliderCounter][i];
  
      if (letterDiv.innerHTML == " ") {
        letterDiv.innerHTML = "&nbsp;";
      }
      letterDiv.classList.add("start");
      letterDiv.classList.add("animation");
      letterDiv.style.animationDelay = i / 10 + "s";
      sliderValue.appendChild(letterDiv);
    }
  
    sliderCounter++;
  }
  
  slide();
  setInterval(slide, 4000);
  
  </script>   
@endsection