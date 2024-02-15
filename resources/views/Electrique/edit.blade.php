

@extends('Electrique.layoute1')
@section('content')
<main id="main" class="main">
    <div class="card5">
        <h5>Modifier le Compteur : {{ $compteur->refCompteur }}</h5>

        <form action="{{ route('compteurs.update', $compteur->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="refCompteur" class="form-label">Ref Compteur</label>
                <input type="text" class="form-control" id="refCompteur" name="refCompteur" value="{{ old('refCompteur', $compteur->refCompteur) }}">
            </div>

            <div class="mb-3">
                <label for="tribunale_id" class="form-label">Type tribunale :</label>
                <select class="form-select" id="tribunale_id" name="tribunale_id">
                    @foreach ($tribunaux as $tribunal)
                        <option value="{{ $tribunal->id }}" {{ ($tribunal->id == old('tribunale_id', $compteur->tribunale_id)) ? 'selected' : '' }}>
                            {{ $tribunal->nomT }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date Compteur</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $compteur->date) }}">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" id="type" name="type">
                    <option value="eau" {{ (old('type', $compteur->type) == 'eau') ? 'selected' : '' }}>Eau</option>
                    <option value="electrique" {{ (old('type', $compteur->type) == 'electrique') ? 'selected' : '' }}>Electrique</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="valeur" class="form-label">Valeurs</label>
                <input type="number" class="form-control" id="valeur" name="valeur" placeholder="Saisir la valeur" value="{{ old('valeur', $compteur->valeur) }}">
            </div>

           
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>
</main>
@endsection
