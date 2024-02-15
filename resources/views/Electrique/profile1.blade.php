@include('Electrique.layoute1')
@section('content')
    <footer>
        <main id="main" class="main">

        <div class="cardadd">
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card1">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ session('user')->image }}" alt="Profile" class="rounded-circle">
              <h2>@if(session('user'))
                {{ session('user')->nom }} {{ session('user')->prenom }} 
            @endif</h2>
              <h3>{{ session('user')->typeUtilisateur }}</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/feed/?trk=registration-frontend" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card1">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Aperçu</button>
                </li>
                <li class="nav-item1">
                    <a class="edit" href="{{ route('edit-profile1') }}">Modifier Profile</a>
                </li>
                
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                  <h5 class="card-title3">Detailles de profile </h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom </div>
                    <div class="col-lg-9 col-md-8">{{ session('user')->nom }} </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Prenom </div>
                    <div class="col-lg-9 col-md-8">{{ session('user')->prenom }} </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Type </div>
                    <div class="col-lg-9 col-md-8">{{ session('user')->typeUtilisateur }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Pays</div>
                    <div class="col-lg-9 col-md-8">Maroc</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">Ouarzazte Ville</div>
                  </div>

                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ session('user')->login }}</div>
                  </div>

                </div>

               

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
    
    </div>
    </div>
        </main>
    </footer>
</body>
</html>