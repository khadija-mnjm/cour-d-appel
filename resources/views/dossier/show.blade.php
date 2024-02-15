@include('includes.layoute')
    @section('content') 
    <main id="main" class="main">
        <h2>Détails du Dossier {{ $dossier->numeroD }} </h2>
        <div>
            <table class="table table-bordered mt-5 ml-4">
                <tbody>
                    <tr>
                        <th scope="row"> date de dossier </th>
                        <td>{{ $dossier->dateDossier }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nom D'Avocat</th>
                        <td>{{ $dossier->avocat_id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Prix</th>
                        <td>{{ $dossier->prix }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Reference Juridique</th>
                        <td>{{ $dossier->refJuridique }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Refernece de Decision</th>
                        <td>{{ $dossier->refDecision }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Type de tribunale</th>
                        <td>{{ $dossier->tribunale_id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nom de Benificier</th>
                        <td>{{ $dossier->benificier_id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">validate</th>
                        <td>{{ $dossier->validate }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Reference de Perfermance</th>
                        <td>{{ $dossier->refPerfermance }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Reference d'Engagement</th>
                        <td>{{ $dossier->refEngagement }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Rference d'Editions</th>
                        <td>{{ $dossier->refEditions }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>Dossier 2</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('list-dossiers') }}" class="btn btn-secondary mb-6 custom-btn">Retour à la liste</a>
    </div>
</main>