@extends('includes.layoute')

@section('content')
<main id="main" class="main">
    <div class="container">
        <h2>Modifier un bénéficiaire</h2>
        <form action="{{ route('benificier.update', $benificier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nomB">Nom</label>
                <input type="text" class="form-control" id="nomB" name="nomB" value="{{ $benificier->nomB }}">
            </div>
            <div class="form-group">
                <label for="prenomB">Prénom</label>
                <input type="text" class="form-control" id="prenomB" name="prenomB" value="{{ $benificier->prenomB }}">
            </div>
            <div class="form-group">
                <label for="villeB">Ville</label>
                <input type="text" class="form-control" id="villeB" name="villeB" value="{{ $benificier->villeB }}">
            </div>
            <!-- Ajoutez d'autres champs du bénéficiaire selon vos besoins -->
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</main>
@endsection