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

                        <h5 class="card-title">Saisir les informations de benificier :</h5>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="row g-3" action="{{ route('benificier.store') }}" method="post">
                        @csrf
                        <div class="col-12">
                            <input type="text" class="form-control" name="nomB" placeholder="Nom de Benificer " required>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" name="prenomB" placeholder="Prenom de Benifisier " required>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" name="villeB" placeholder="ville De Benificiers " required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Ajouter Benificier</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </main>
    </footer>
</body>
</html>