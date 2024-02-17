
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo1 d-flex align-items-center">
      <img src="{{ asset('assets/img/logo.png')}}" alt="">
      <span class="textlogo">Cour<br/> d’Appel</span>
    </a>
   
  </div><!-- End Logo -->
  <div class="search-bar">
    <i class="bi bi-list toggle-sidebar-btn"></i>
    <form class="search-form d-flex align-items-center" action="{{ route('searchM') }}" method="post" id="searchForm">
        @csrf
        <input type="text" name="search" id="searchInput" placeholder="Recherche par..." title="Enter search keyword">
        <button type="submit" id="searchButton"><i class="bi bi-search"></i></button>
    </form>
</div>
<!-- End Search Bar -->
  <nav class="header-nav ms-auto">
    
      <ul class="d-flex align-items-center">
        
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
      
            
              <li class="nav-item dropdown">
                
                <li class="nav-item dropdown">
                  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-bell"></i>
                      <span class="badge bg-primary badge-number"> {{ app('App\Http\Controllers\MoyenneController')->getNotificationsCount() }}</span>
                  </a><!-- End Notification Icon -->
              
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                      <li class="dropdown-header">
                        <p>Nombre de notifications dans la session : {{ app('App\Http\Controllers\MoyenneController')->getNotificationsCount() }}</p>
                          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
              
                      @if (session('notifications'))
                      <!-- Récupérer les informations de la session -->
                      @php
                          $notifications = session('notifications');
                      @endphp
                  
                      @foreach ($notifications as $notification)
                          <li class="notification-item">
                              @if ($notification['type'] === 'danger')
                                  <i class="bi bi-exclamation-circle text-danger"></i>
                                  <div>
                                      <div class="small text-gray-500">{{ now()->toDateString() }}</div>
                                      <h4>Fuite détectée</h4>
                                      <p>{{ $notification['message'] }}</p>
                                  </div>
                              @elseif ($notification['type'] === 'info')
                                  <i class="bi bi-check-circle text-success"></i>
                                  <div>
                                      <div class="small text-gray-500">{{ now()->toDateString() }}</div>
                                      <h4>Consommation normale</h4>
                                      <p>{{ $notification['message'] }}</p>
                                  </div>
                              @endif
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                      @endforeach
                  @endif
                      <!-- Autres notifications (si nécessaire) -->
              
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li class="dropdown-footer">
                          <a href="#">Show all notifications</a>
                      </li>
                  
                  </ul>
        </li>
       
        <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" style="margin-right: 10px;">
          <img src="{{ session('user')->image }}" alt="Profile" class="rounded-circle" style="width: 40px; height: 50px;">
          <span class="d-none d-md-block dropdown-toggle ps-2">
              @if(session('user'))
                  {{ session('user')->nom }} 
              @endif
          </span>
      </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> @if(session('user'))
                {{ session('user')->nom }} {{ session('user')->prenom }} 
            @endif</h6>
              <span> {{ session('user')->typeUtilisateur }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
                <i class="bi bi-person"></i>
                <span>
                  Mon profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Déconexion</span>
              </a>
            </li>

          </ul>
        </li> 

      </ul>
    </nav><!-- End Icons Navigation -->
</header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
      // Stocker la valeur de l'input lors du clic sur le bouton
      $('#searchButton').on('click', function () {
          var inputValue = $('#searchInput').val();
          localStorage.setItem('lastSearchValue', inputValue);
      });

      // Charger la dernière valeur de recherche au chargement de la page
      var lastSearchValue = localStorage.getItem('lastSearchValue');
      if (lastSearchValue) {
          $('#searchInput').val(lastSearchValue);
      }
  });
</script>