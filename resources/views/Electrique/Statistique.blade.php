<script src="https://cdn.lordicon.com/lordicon.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofNol+hCv9LXRSe++9dC5u80+6bZ1egUtW" crossorigin="anonymous">
<style>
    .bi-device-hdd-fill {
        font-size: 40px;
    }
    .bi-bank {
        font-size: 38px;
    }
    .bi-device-ssd{
        font-size: 40px;

    }
    
</style>

@include('Electrique.layoute1')
@section('content')
  <main id="main" class="main">
    <div class="pagetitle13">
      <h1>les statistiques </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a  href="{{ route('resElectrique.dashbord1') }}">Acceuil</a></li>
          <li class="breadcrumb-item active">Statistique </li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <div class="row">
        
        <div class="col-xxl-4 col-md-6">
          
          <div class="card info-card sales-card">
            <div class="card-body1">
              <div class="filter">
                <a class="icon" href="more.html">
                  <lord-icon
                      src="https://cdn.lordicon.com/hqymfzvj.json"
                      trigger="hover"
                      style="width:30px;height:30px;color:blue;">
                  </lord-icon>
              </a>
                
              </div>
              <h5 class="card-title">Consomations  <span> |{{$anneeActuelle}}</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-device-hdd-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$nombreTotalMoyennes}}</h6>
                  <span class="text-success small pt-1 fw-bold"></span>
                  <span class="text-muted small pt-2 ps-1">Augmenter</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filtre</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                  <li><a class="dropdown-item" href="#">Ce mois</a></li>
                  <li><a class="dropdown-item" href="#">Cette année</a></li>
                </ul>
              </div>
  
              <div class="card-body">
                <h5 class="card-title">
                    Total Tribunales <span>|{{$anneeActuelle}}</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-bank"></i>
                     </div>
                     <div class="ps-3">
                      <h6>{{$nombreTotalTribunaux}}</h6>
                      <span class="text-muted small pt-2 ps-1">Total Des Tribunles </span>
                  </div>
                </div>
              </div>
            </div>
          
        </div>
        <!-- End First Row -->

        

        <!-- Third Row: Dossiers Today (Repeated for illustration, adjust as needed) -->
        
          <!-- Third Row: Benificiers Today -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card verifier-card">
                  <div class="card-body1">
                    <h5 class="card-title">Consomations Normale <span>|{{$anneeActuelle}}</span></h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <lord-icon
                        src="https://cdn.lordicon.com/oqdmuxru.json"
                        trigger="hover"
                        style="width:250px;height:250px">
                    </lord-icon>
                      </div>
                      <div class="ps-3">
                        <h6>{{$nombreConsommationsNormalesAnneeActuelle}}</h6>
                        <span class="text-muted small pt-2 ps-1">Normales </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-cardR">
                  <div class="card-body1">
                    <h5 class="card-title">Totales Des Fuits <span>| {{$anneeActuelle}}</span></h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-ban"></i>
                      </div>
                      <div class="ps-32">
                        <h6 class="h61">{{$nombreFuitesAnneeActuelle}}</h6>  <span class="text-muted small pt-2 ps-1">Fuites </span>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
        <!-- End Third Row -->




          <!-- Third Row: Dossiers Today (Repeated for illustration, adjust as needed) -->
        
          <!-- Third Row: Benificiers Today -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card1">
              <div class="card-body1">
                <h5 class="card-title">Compteurs D'eau <span>|{{$anneeActuelle}}</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <lord-icon
                        src="https://cdn.lordicon.com/zmfqjksp.json"
                        trigger="hover"
                        colors="primary:#121331,secondary:#9cc2f4,tertiary:#ebe6ef,quaternary:#4bb3fd"
                        style="width:60px;height:60px">
                    </lord-icon>
                  </div>
                  <div class="ps-3">
                    <h6>{{$nombreCompteursEau}} <span class="text-muted small pt-2 ps-1"> Eau  </span> </h6>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card1">
              <div class="card-body1">
                <h5 class="card-title">Compteurs D'Electrique  <span>| {{$anneeActuelle}}</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-device-ssd"></i>
                  </div>
                  <div class="ps-32">
                    <h6 class="h61">{{$nombreFuitesAnneeActuelle}}</h6>  <span class="text-muted small pt-2 ps-1">Electricitées  </span>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
    <!-- End Third Row -->
      </div>
      
    </section>
  </main>
  <script>
    document.getElementById('annee').addEventListener('change', function () {
      
      var selectedYear = this.value;
      window.location.href = '?annee=' + selectedYear;
    });
  </script>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="bi bi-arrow-up-short"></i></a>
</footer>
