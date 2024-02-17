<script src="https://cdn.lordicon.com/lordicon.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofNol+hCv9LXRSe++9dC5u80+6bZ1egUtW" crossorigin="anonymous">

@include('includes.layoute')
    @section('content')
  <main id="main" class="main">
    <div class="pagetitle13">
      <h1>les statistiques </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Acceuil</a></li>
          <li class="breadcrumb-item active">Statistiaue </li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <div class="row">
        
        <!-- First Row: Dossiers Today -->
        <div class="col-xxl-4 col-md-6">
          
          <div class="card info-card sales-card">
            <div class="card-body1">
              <div class="filter">
                <a class="icon" href="{{ route('plus') }}">
                  <lord-icon
                      src="https://cdn.lordicon.com/hqymfzvj.json"
                      trigger="hover"
                      style="width:30px;height:30px;color:blue;">
                  </lord-icon>
              </a>
                
              </div>
              <h5 class="card-title">Dossiers <span> |{{$targetYear}}</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <lord-icon src="https://cdn.lordicon.com/lyrrgrsl.json" trigger="hover" style="width:100px;height:100px"></lord-icon>
                </div>
                <div class="ps-3">
                  <h6>{{ $nombreTotalDossiers }}</h6>
                  <span class="text-success small pt-1 fw-bold">{{ $pourcentageDossiers }}%</span>
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
                  Montant total <span>| |{{$targetYear}}</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <lord-icon src="https://cdn.lordicon.com/mdmniuqr.json" trigger="hover" style="width:250px;height:250px"></lord-icon>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalAmount }}</h6>
                    <span class="text-success small pt-1 fw-bold">{{ $targetYear }}: {{ $totalAmountForYear }}</span>
                    <span class="text-muted small pt-2 ps-1">augmenter</span>
                  </div>
                </div>
              </div>
            </div>
          
        </div>
        <!-- End First Row -->

        <!-- Second Row: Total Amount Année -->
        <div class="col-xxl-12">
          <div class="card info-card customers-card">
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
              <h5 class="card-title">Total Avocat <span>| {{ $targetYear }}</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <lord-icon
                  src="https://cdn.lordicon.com/dxjqoygy.json" 
                  trigger="hover"
                  style="width:100px; height:100px"
                  class="icon-preview"
                  trigger="sequence"
                  sequence="delay:first:500,delay:last:1500,play">
              </lord-icon>
             </div>
             <div class="ps-3">
              <h6>{{ $totalAvocats }}</h6>
              <span class="text-muted small pt-2 ps-1">Total Avocats</span>
          </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Second Row -->

        <!-- Third Row: Dossiers Today (Repeated for illustration, adjust as needed) -->
        
          <!-- Third Row: Benificiers Today -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body1">
                    <h5 class="card-title">Benificiers <span>|{{ $targetYear }}</span></h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $totalBeneficiaries }}</h6>
                        <span class="text-success small pt-1 fw-bold">{{ $totalBeneficiaries }}%</span>
                        <span class="text-muted small pt-2 ps-1">Augmenter</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-xxl-4 col-md-6">
                <div class="card info-card verifier-card">
                  <div class="card-body1">
                    <h5 class="card-title">DSValides | NonValides  <span>| {{ $targetYear }}</span></h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <lord-icon
                        src="https://cdn.lordicon.com/oqdmuxru.json"
                        trigger="hover"
                        style="width:250px;height:250px">
                    </lord-icon>
                      </div>
                      <div class="ps-32">
                        <h6 class="h61">{{$totalDossiersValides}}</h6>  <span class="text-muted small pt-2 ps-1">Valides</span>
                        <h6>{{$totalDossiersNonValides}}</h6> <span class="text-muted small pt-2 ps-1">Non Valides</span>
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
      // Get the selected year
      var selectedYear = this.value;

      // Redirect to the same page with the selected year as a query parameter
      window.location.href = '?annee=' + selectedYear;
    });
  </script>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="bi bi-arrow-up-short"></i></a>
</footer>
