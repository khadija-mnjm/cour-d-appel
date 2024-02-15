@include('includes.layoute')
@section('content')
<main id="main" class="main">
        <div class="cardadd">
            <section class="section profile">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                <img src="{{ session('user')->image }}" alt="Profile" class="rounded-circle">
                                <h2>@if(session('user')) {{ session('user')->nom }} {{ session('user')->prenom }} @endif</h2>
                                <h3>{{ session('user')->typeUtilisateur }}</h3>
                                <div class="social-links mt-2">
                                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <div class="card">
                                <ul class="nav nav-tabs nav-tabs-bordered">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"> Aperçu</button>
                                    </li>
                                    <li class="nav-item1">
                                        <a class="edit" href="{{ route('edit-profile') }}">Modifier Profile </a>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2">
                                    <h5 class="card-title">Profile Details</h5>
                                    <form action="{{ route('update-profile') }}" method="post">
                                        @csrf
                                        <div class="row mb-6">
                                            <div class="col-md-8 col-lg-9">
                                                <img class="image22" src="{{ session('user')->image }}" alt="Profile">
                                                <div class="pt-2">
                                                    <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="fullName" class="col-md-6 col-lg-6 col-form-label">Nom</label>
                                            <div class="col-md-12 col-lg-12">
                                                <input name="fullName" type="text" class="form-control" id="fullName" value="{{ session('user')->nom }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="company" class="col-md-6 col-lg-6 col-form-label">Prenom</label>
                                            <div class="col-md-12 col-lg-12">
                                                <input name="company" type="text" class="form-control" id="company" value="{{ session('user')->prenom }}">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="row g-6">
                                        <div class="col-md-6">
                                            <label for="Job" class="col-md-6 col-lg-6 col-form-label">Type</label>
                                            <div class="col-md-12 col-lg-12">
                                                <input name="job" type="text" class="form-control" id="Job" value="{{ session('user')->typeUtilisateur }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-12 col-lg-12">
                                                <input name="email" type="email" class="form-control" id="Email" value="{{ session('user')->login }}">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="row g-6">
                                        <div class="col-md-6">
                                            <label for="Phone" class="col-md-8 col-lg-8 col-form-label">Nouvelle Mot de Passe</label>
                                            <div class="col-md-12 col-lg-12">
                                                <input name="password" type="password" class="form-control" id="Password" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ConfirmPassword" class="col-md-6 col-lg-8 col-form-label">Confirmation Motpass</label>
                                            <div class="col-md-12 col-lg-12">
                                                <input name="password_confirmation" type="password" class="form-control" id="ConfirmPassword" value="">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="text-center">
                                            <button type="submit" class="BtnSave">Modifier </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
        </main>
    </footer>
</body>
</html>