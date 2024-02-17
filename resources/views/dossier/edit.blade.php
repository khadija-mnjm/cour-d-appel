<!-- edit.blade.php -->
@extends('includes.layoute')
@section('content') 
<main id="main" class="main">
    @if($dossier->isModified())
        <div class="alert alert-danger" role="alert">
            This dossier has already been modified and cannot be edited again.
        </div>
    @else
        <form class="row g-3" action="{{ route('dossier.update', $dossier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h2>Détails du Dossier {{ $dossier->numeroD }} </h2>
        <div>
            <table class="table table-bordered mt-5 ml-4">
                <tbody>
                    <tr>
                        <th scope="row"> date de dossier </th>
                        <td>
                        <input type="date" class="form-control" id="dateDossier " name="dateDossier" value="{{ $dossier->dateDossier }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Nom D'Avocat</th>
                        <td>
                        <input type="text" class="form-control" id="avocat_id " name="avocat_id" value="{{ $dossier->avocat_id }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Prix</th>
                        <td>
                        <input type="text" class="form-control" id="prix " name="prix" value=" {{ $dossier->prix }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Reference Juridique</th>
                        <td>
                        <input type="text" class="form-control" id="refJuridique " name="refJuridique" value=" {{ $dossier->refJuridique }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Refernece de Decision</th>
                        <td>
                        <input type="text" class="form-control" id="refDecision " name="refDecision" value=" {{ $dossier->refDecision }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Type de tribunale</th>
                        <td>
                        <input type="text" class="form-control" id="tribunale_id " name="tribunale_id" value=" {{ $dossier->tribunale_id }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Nom de Benificier</th>
                        <td>
                        <input type="text" class="form-control" id="benificier_idx " name="benificier_id" value=" {{ $dossier->benificier_id }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">validate</th>
                        <td>
                        <input type="text" class="form-control" id="validate " name="validate" value=" {{ $dossier->validate }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">dateAideJustice</th>
                        <td>
                        <input type="date" class="form-control" id="dateAideJustice " name="dateAideJustice" value=" {{ $dossier->dateAideJustice }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Reference de Perfermance</th>                
                        <td>
                        <input type="text" class="form-control" id="refPerfermance " name="refPerfermance" value=" {{ $dossier->refPerfermance }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Reference d'Engagement</th>
                        <td>
                        <input type="text" class="form-control" id="refEngagement " name="refEngagement" value=" {{ $dossier->refEngagement }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Rference d'Editions</th>
                        <td>
                        <input type="text" class="form-control" id="refEditions " name="refEditions" value=" {{ $dossier->refEditions }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">date_ds_aide_etat</th>
                        <td>
                        <input type="date" class="form-control" id="date_ds_aide_etat " name="date_ds_aide_etat" value=" {{ $dossier->date_ds_aide_etat }}">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>Dossier 2</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
            <div class="text-center"><!-- Dans edit.blade.php -->
                <button type="submit" class="btn btn-success" @if($dossier->isModified) disabled @endif>Modifier</button>
                
            </div>
        </form>
    @endif

</main>
