<script src="https://cdn.lordicon.com/lordicon.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofNol+hCv9LXRSe++9dC5u80+6bZ1egUtW" crossorigin="anonymous">

@include('Electrique.layoute1')
@section('content')
<main id="main" class="main">
    <div class="card5">
       <h5>Les informations de Consomations :  </h5>
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
            <form class="row g-3" action="{{ route('compteurs.store') }}" method="POST">
              @csrf
            <div class="col-md-6">
              <label for="refCompteur" class="form-label">Ref Compteurs</label>
              <input type="text" class="form-control" id="refCompteur" name="refCompteur">
            </div>
            <div class="col-md-6">
              <label for="tribunal" class="form-label">Type tribunale  :</label>
              <select class="form-select" id="tribunal" name="tribunale_id">
                 <option value="" selected disabled>Choisir tribunale :</option>
                 @foreach ($tribunaux as $tribunal)
                    <option value="{{ $tribunal->id }}">{{ $tribunal->nomT }}</option>
                 @endforeach
              </select>
           </div>
            <div class="col-md-6">
              <label for="dateCompteur" class="form-label">Date Compteurs</label>
              <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="col-md-6">
              <label for="type" class="form-label">Type</label>
              <select class="form-select" id="type" name="type">
                  <option value="eau">Eau</option>
                  <option value="electrique">Electrique</option>
              </select>
          </div>
          
            <div class="col-md-6">
              <label for="valeur" class="form-label">Valeurs</label>
              <input type="number" class="form-control" id="valeur" name="valeur" placeholder=" Saiser la valeur">
            </div>
         
            </div>
            <div class="col-12">
              <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
          </div>
          </form>

        </div>
     
    </div>
</main>
