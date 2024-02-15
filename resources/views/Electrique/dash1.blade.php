
<link href="{{ asset('assets/css/dash1.css') }}" rel="stylesheet">
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

.card-bodydash {
    padding: 0 20px 20px 20px;
    width: 987px;
    padding-left: 20px;
}
</style>
@include('Electrique.layoute1')
@section('content')
<main id="main" class="main">
  <div class="pagetitle13">
    <h1>Tableau de Board</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('statistique') }}">Statistique </a></li>
        <li class="breadcrumb-item active">Acceuil </li>
      </ol>
    </nav>
  </div>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">Totlaes des Consomations  <span id="targetYear">|{{$anneeActuelle}}</span></h5>
                  <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <lord-icon src="https://cdn.lordicon.com/lyrrgrsl.json" trigger="hover" style="width:100px;height:100px"></lord-icon>
                      </div>
                      <div class="ps-3">
                          <h6>{{ $nombreTotalMoyennes }} </h6>
                          <span class="text-success small pt-1 fw-bold">{{$nombreTotalTribunaux}} Tribunales</span>
                          <span class="text-muted small pt-2 ps-1"></span>
                      </div>
                  </div>
              </div>

              </div>
            </div>

            
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-cardR">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filtre</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                    <li><a class="dropdown-item" href="#">Mois</a></li>
                    <li><a class="dropdown-item" href="#">Année</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title"> Total Fuites  <span>| {{$anneeActuelle}}</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-ban"></i>
                      </div>
                    </div>
                    <div class="ps-3">
                      <h6>{{$nombreFuitesAnneeActuelle}}</h6>
                      <span class="text-success small pt-1 fw-bold">Fuits</span> 

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                    <li><a class="dropdown-item" href="#">Mois</a></li>
                    <li><a class="dropdown-item" href="#">Année</a></li>
                  </ul>
                </div>

                <div class="card-bodydash">
                  <h5 class="card-title">Compteurs D'électricité <span>|{{$anneeActuelle}}</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-device-ssd"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$nombreCompteursElectricite}}</h6>
                      <span class="text-danger small pt-1 fw-bold">Compteurs </span>

                    </div>
                  </div>

                </div>
              </div>

            </div>

        
         <!-- End Reports -->
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        
         <!-- Right side columns -->
         <div class="col-lg-4">

            <div class="card">
            
    
                <div class="card-bodydash pb-0">
                  <h5 class="card-title">Situations Consomation  <span>| {{$anneeActuelle}}</span></h5>
    
                  <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
    
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const trafficChart = echarts.init(document.querySelector("#trafficChart"));
                
                        const categories = ['Fuites ', 'Normale'];
                
                        const data = [
                                { value: {{ $nombreCompteursElectricite }}, name: 'Fuites' },
                                { value: {{ $nombreConsommationsNormalesAnneeActuelle }}, name: 'Normale' },
                            ];
                
                        trafficChart.setOption({
                            tooltip: {
                                trigger: 'item'
                            },
                            legend: {
                                top: '5%',
                                left: 'center'
                            },
                            series: [{
                                name: 'Access From',
                                type: 'pie',
                                radius: ['40%', '70%'],
                                avoidLabelOverlap: false,
                                label: {
                                    show: false,
                                    position: 'center'
                                },
                                emphasis: {
                                    label: {
                                        show: true,
                                        fontSize: '18',
                                        fontWeight: 'bold'
                                    }
                                },
                                labelLine: {
                                    show: false
                                },
                                data: data
                            }]
                        });
                    });
                </script>
    
                </div>
              </div><!-- End Website Traffic -->
    
              
    <!-- End Budget Report -->
            </div><!-- End Recent Activity -->
  
            <!-- Budget Report -->
            
  
            <!-- Website Traffic -->
           
              </div>
            </div>
            </div>
  
            
  
          </div>

      </div>

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
            <div>
                <h5 class="card-title">Graphes <span>| {{$anneeActuelle}}</span></h5>
  
            <div id="container" style="height: 400px"></div>
           <script>
                $(function () {
                $('#container').highcharts({
                title: {
                        text: 'Titre du graphe'
                    },
                    tooltip: {
                        positioner: function () {
                            return { x: 80, y: 50 };
                        },
                        shadow: false,
                        borderWidth: 0,
                        backgroundColor: 'rgba(255,255,255,0.8)'
                    },

                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    series: [{
                        data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
                    }, {
                        data: [194.1, 95.6, 54.4, 29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4]
                    }]
                });
            });
        </script>
            
        </div>
        </div>
      </div>


      </div>

    </section>
               
             
  </main>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>