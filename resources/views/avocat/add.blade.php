@include('includes.layoute')
    @section('content')
        <main id="main" class="main">
            <div class="pagetitle1">
                <div class="cardadd">
                    <div class="card-bodyadd">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h5 class="card-title">Saisir les informations d'avocat :</h5>
                        
                        <form class="row g-3" action="{{ route('avocat.store') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <input type="text" class="form-control" name="nomV" placeholder="Nom d'avocat" required>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" name="villeV" placeholder="Ville d'avocat " required>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" name="adresseV" placeholder="Adresse du bureau " required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Ajouter avocat</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>