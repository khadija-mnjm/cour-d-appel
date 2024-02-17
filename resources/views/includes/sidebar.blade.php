<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofGJl5z8EVOlH6HIbbV7b6vA/x1KVoq1Sk" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>

      /* Votre style CSS actuel */
      .sidebar-nav .nav-item.active {
          background-color: #007bff;
          color: #fff;
      }
  </style>
</head>
<body>
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
    
          <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed " href="{{ route('avocat') }}">
              <i class="ri-group-line"></i>
              <span>List Avocat</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed " href="{{ route('benificiers') }}">
              <i class="ri-group-line"></i>
              <span>List Benificier</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('list-dossiers') }}">
              <i class="ri-list-check"></i>
              <span>List Dossiers</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('statistique') }}">
              <i class="bi bi-bar-chart"></i>
              <span>Statistique</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link collapsed" href="">
              <i class="bi bi-printer"></i>
              <span>Imprimer</span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link collapsed"  href="{{ route('logout') }}">
              <i class="bi bi-box-arrow-left bi-2x"></i>

              <span>Déconexion </span>
            </a>
          </li>
          
        </ul>
    
      </aside>
      <script>
        // Script pour gérer le changement d'état au clic
        document.addEventListener('DOMContentLoaded', function () {
            var sidebarNav = document.getElementById('sidebar-nav');
            var navItems = sidebarNav.getElementsByClassName('nav-item');

            for (var i = 0; i < navItems.length; i++) {
                navItems[i].addEventListener('click', function () {
                    for (var j = 0; j < navItems.length; j++) {
                        navItems[j].classList.remove('active');
                        navItems[j].classList.remove('collapsed');
                    }

                    this.classList.add('active');
                    this.classList.add('collapsed');
                });
            }
        });
    </script>
</body>
</html>