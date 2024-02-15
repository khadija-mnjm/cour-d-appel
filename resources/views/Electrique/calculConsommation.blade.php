<style>
    .card5{
        width: 90%;
        padding: 20px;
    }
    #slider {
  width: 600px;
  display: flex;
  gap: 15px;
  font-size: 30px;
}

#sliderValue {
  display: flex;
  color: #436850;
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

button {
  position: relative;
  display: inline-block;
  margin: 15px;
  padding: 15px 30px;
  text-align: center;
  font-size: 18px;
  letter-spacing: 1px;
  text-decoration: none;
  color:  #B99470;
  background: transparent;
  cursor: pointer;
  transition: ease-out 0.5s;
  border: 2px solid  #B99470;
  border-radius: 20px;
  box-shadow: inset 0 0 0 0 #B99470;
  margin-left: 30%;
}
.button{
    border-radius: 20px;
    margin-left:30%;
    width: 30%;  
}

button:hover {
  color: white;
  box-shadow: inset 0 -100px 0 0  #B99470;
}

button:active {
  transform: scale(0.9);
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
    <form  class="row g-4" method="post" action="{{ route('suivi_consommation.methode2') }}" onsubmit="return calculerEtComparer()">
        @csrf
        <div class="col-md-6">
        
            <label for="date_debut">Date de Début:</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="date_fin">Date de Fin:</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control" required>
        </div>

        <div class="col-md-12">
            <label for="pourcentage">Pourcentage </label>
            <select name="pourcentage" id="pourcentage" class="form-control" required>
                <option value="10">10%</option>
                <option value="20">20%</option>
                <option value="30">30%</option>
                <option value="40">40%</option>
                <option value="50">50%</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="tribunal" class="form-label">Type tribunale  :</label>
            <select class="form-select" id="tribunal" name="tribunale_id">
                <option value="" selected disabled>----------</option>
                @foreach ($tribunaux as $tribunal)
                    <option value="{{ $tribunal->id }}">{{ $tribunal->nomT }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="compteur_id" class="form-label">Type de Compteur :</label>
            <select class="form-select" id="compteur_id" name="compteur_id">
                <option value="" selected disabled>---------</option>
                @foreach ($typecmpts as $typecmpt)
                    <option value="{{ $typecmpt->id }}">{{$typecmpt->type }}</option>
    
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <label for="valeur_saisie">Valeur de Compteur:</label>
            <input type="number" name="valeur_saisie" id="valeur_saisie" class="form-control" required>
        </div>
        <div class="col-md-12">
        <button type="submit" class="button">Situations</button>
        </div>
    </form>

    </div>
</main>
<script>
    
var sliderCounter = 0;
var sliderContent = [
  "la consomations ",
  " calcule de Moyenne ",
  "Detection de fuit "
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
<script>
    function ajouterInformations() {
        // Collect form data
        var formData = {
            _token: '{{ csrf_token() }}',
            date_debut: $('#date_debut').val(),
            date_fin: $('#date_fin').val(),
            pourcentage: $('#pourcentage').val(),
            tribunal_id: $('#tribunal').val(),
            compteur_id: $('#compteur_id').val(),
            valeur_saisie: $('#valeur_saisie').val(),
        };

        // Perform AJAX request
        $.ajax({
            type: 'POST',
            url: '{{ route('moyennes.store') }}',
            data: formData,
            success: function (data) {
                // Handle success response
                console.log(data);
            },
            error: function (error) {
                // Handle error response
                console.log(error);
            }
        });
    }
</script>

@endsection
