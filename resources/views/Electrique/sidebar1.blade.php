<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
  <style>
  
  </style>
</head>

<body>
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
    
          <li class="nav-item">
            <a class="nav-link "  href="{{ route('resElectrique.dashbord1') }}">
              <i class="bi bi-grid"></i>
              <span>Tableau de bord</span>
            </a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Consomations </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('list-moyennes') }}">
                  <i class="bi bi-circle"></i><span>Listes Des Consomations </span>
                </a>
              </li>
            
              <li>
                <a href="{{ route('compteurs') }}">
                  <i class="bi bi-circle"></i><span>Ajouter Concomations  </span>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed"  data-bs-target="#components-nav"  href="{{ route('calculations') }}">
              <i class="bi bi-calculator-fill"></i>
              <span>Calcule de Moyenne   </span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link collapsed"  data-bs-target="#components-nav"  href="{{ route('statistiquesAnnuelles') }}">
              <i class="bi bi-bar-chart-steps"></i>
              <span>Statistiques </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav"  href="{{route('message')}}">
              <i class="bi bi-chat-left-text-fill"></i>
              <span>Messages </span>
            </a>
        </li>
          <li class="nav-item">
            <a class="nav-link collapsed"  data-bs-target="#components-nav"  href="{{ route('profile') }}">
              <i class="bi bi-person-bounding-box"></i>
              <span>Profile </span>
            </a>
          </li>
    
         
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav"  href="{{ route('logout') }}">
              <i class="bi bi-box-arrow-up-left"></i>
            <span>Déconexion </span>
          </a>
        </li>
        </ul>
    
      </aside>
    
    
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</body>
</html>