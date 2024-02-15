
<link href="{{ asset('assets/css/dash1.css') }}" rel="stylesheet">
<script src="https://cdn.lordicon.com/lordicon.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofNol+hCv9LXRSe++9dC5u80+6bZ1egUtW" crossorigin="anonymous">

@include('includes.layoute')
@section('content')
<main id="main" class="main">

  <div class="pagetitle13">
    <h1>DashBoard </h1>
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

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#" data-filter="aujourd'hui">Aujourd'hui</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="mois">Mois</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="annee">Année</a></li>
                </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Dossiers <span id="targetYear">|{{$targetYear}}</span></h5>
                  <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <lord-icon src="https://cdn.lordicon.com/lyrrgrsl.json" trigger="hover" style="width:100px;height:100px"></lord-icon>
                      </div>
                      <div class="ps-3">
                          <h6>{{ $nombreTotalDossiers }}</h6>
                          <span class="text-success small pt-1 fw-bold">{{ $pourcentageDossiers }}%</span>
                          <span class="text-muted small pt-2 ps-1">augmenter</span>
                      </div>
                  </div>
              </div>

              </div>
            </div>

            
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card1">

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
                  <h5 class="card-title">Montant Total <span>| {{$targetYear}}</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <lord-icon src="https://cdn.lordicon.com/mdmniuqr.json" trigger="hover" style="width:250px;height:250px"></lord-icon>
                      </div>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalAmount}}</h6>
                      <span class="text-success small pt-1 fw-bold">DH</span> 

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
                  <h5 class="card-title">Benificier <span>|{{$targetYear}}</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalBeneficiaries}}</h6>
                      <span class="text-danger small pt-1 fw-bold">Benificiers</span>

                    </div>
                  </div>

                </div>
              </div>

            </div>

            
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                    <li><a class="dropdown-item" href="#">Mois</a></li>
                    <li><a class="dropdown-item" href="#">Années</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title"> Rapports <span>/Aujourd'hui</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <!-- Reports -->
                
            <div class="col-12">
              
                  <div id="chartContainer" style="height: 300px;"></div>
          
                  <script>
                      document.addEventListener("DOMContentLoaded", () => {
                          // Initialiser le graphique avec les données par défaut (nombre de dossiers)
                          const defaultData = {!! json_encode(['dossiers' => $dossiersCount, 'avocats' => $avocatsCount, 'beneficiaires' => $beneficiairesCount]) !!};
                          updateChart(defaultData);
          
                          // Ajouter un écouteur d'événements pour détecter les changements dans la sélection
                          document.getElementById('selectData').addEventListener('change', function () {
                              const selectedValue = this.value;
                              // Mettre à jour le graphique en fonction de la valeur sélectionnée
                              const newData = { [selectedValue]: defaultData[selectedValue] };
                              updateChart(newData);
                          });
          
                          // Fonction pour mettre à jour le graphique
                          function updateChart(data) {
                              new ApexCharts(document.querySelector("#chartContainer"), {
                                  series: [{
                                      data: Object.values(data),
                                      colors: ['#43766C', '#F8FAE5', '#B19470'], // Ajouter vos couleurs ici
                                  }],
                                  chart: {
                                      type: 'bar',
                                      height: 350,
                                  },
                                  xaxis: {
                                      categories: Object.keys(data),
                                  },
                              }).render();
                          }
                      });
                  </script>
              </div>
          </div>
          

              </div>
            </div><!-- End Reports -->
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <div class="card">
            
            <div class="card-bodydash pb-0">
              <h5 class="card-title">Budget Report <span>| This Month</span></h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['Allocated Budget', 'Actual Spending']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: 'Sales',
                          max: 6500
                        },
                        {
                          name: 'Administration',
                          max: 16000
                        },
                        {
                          name: 'Information Technology',
                          max: 30000
                        },
                        {
                          name: 'Customer Support',
                          max: 38000
                        },
                        {
                          name: 'Development',
                          max: 52000
                        },
                        {
                          name: 'Marketing',
                          max: 25000
                        }
                      ]
                    },
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [{
                          value: [4200, 3000, 20000, 35000, 50000, 18000],
                          name: 'Allocated Budget'
                        },
                        {
                          value: [5000, 14000, 28000, 26000, 42000, 21000],
                          name: 'Actual Spending'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Budget Report -->
          </div><!-- End Recent Activity -->

          <!-- Budget Report -->
          

          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-bodydash pb-0">
              <h5 class="card-title">Trafic des Prix <span>| {{$targetYear}}</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const trafficChart = echarts.init(document.querySelector("#trafficChart"));
            
                    const categories = ['Prix 2000', 'Prix 3000', 'Prix 2500', 'Prix 3500'];
            
                    const data = [
                        { value: {{ $dossiers2000->count() }}, name: 'Prix 2000' },
                        { value: {{ $dossiers3000->count() }}, name: 'Prix 3000' },
                        { value: {{ $dossiers2500->count() }}, name: 'Prix 2500' },
                        { value: {{ $dossiers3500->count() }}, name: 'Prix 3500' },
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

          

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterSelect = document.getElementById('filterSelect');
        const targetYearSpan = document.getElementById('targetYear');
        const dossierCountSpan = document.getElementById('dossierCount');

        filterSelect.addEventListener('change', function () {
            const selectedFilter = filterSelect.value;

            // Update targetYear based on the selected filter
            switch (selectedFilter) {
                case 'aujourd\'hui':
                    targetYearSpan.innerText = new Date().getFullYear();
                    break;
                case 'mois':
                    const currentMonth = new Date().toLocaleString('default', { month: 'long' });
                    targetYearSpan.innerText = currentMonth;
                    break;
                case 'annee':
                    // Replace this with the logic to get the selected year from your data
                    // For example, you might have a separate variable like selectedYear
                    // that gets updated when the user selects a specific year.
                    // targetYearSpan.innerText = selectedYear;
                    break;
                // Add more cases if needed for additional filters
            }

            // Fetch and update dossier count based on the selected filter
            updateDossierCount(selectedFilter);
        });

        // Function to fetch and update dossier count
        function updateDossierCount(filter) {
            // Replace the URL with the actual endpoint to fetch dossier count based on the filter
            const apiUrl = '/api/getDossierCount?filter=' + filter;

            // Use fetch API to get the count
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    dossierCountSpan.innerText = data.count;
                })
                .catch(error => {
                    console.error('Error fetching dossier count:', error);
                });
        }
    });
</script>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="bi bi-arrow-up-short"></i></a>

