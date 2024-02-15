@include('includes.layoute');
    @section('content');
    <footer>
        <main id="main" class="main">
          <h5 class="titredesign">
             <span >Ministère de la Justice,</span><br/>Enregistre les sommes dues aux avocats commis <br/>d'office dans le cadre  de l'aide judiciaire, qui sont 
             <br/>détenues par le donneur d'ordre du déboursement des assistants.
            </h5>
            <div class="pagetitle">
                <div class="text-center mt-3">
                  <a href="{{ route('add') }}" class="btn btn-success">
                     Ajouter Dossier
                  </a></div>
                 
            </div>
            
            <div class="container1">
            
      <div class="row">
        <div class="col-lg-12">

          <div class="card2">
            <div class="card-body1">
              <h5 class="card-title">Listes des Dossiers</h5>
              
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>umero 
                    </th>
                    <th>nom Avocat</th>
                    <th data-type="date" data-format="YYYY/DD/MM">date</th>
                    <th>RefJuridique</th>
                    <th>RefDecission</th>
                    <th>Tribunale </th>
                    <th>Prix</th>
                    <th>Benificier</th>
                    <th>Validate</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dossiers as $dossier)
                      <tr>
                          <td>{{ $dossier->numeroD }}</td>
                          <td>{{ $dossier->avocat->nomV }}</td>
                          <td>{{ $dossier->dateDossier }}</td>
                          <td>{{ $dossier->refJuridique }}</td>
                          <td>{{ $dossier->refDecision }}</td>
                          <td>{{ $dossier->tribunale->typeTribunale }}</td>
                          <td>{{ $dossier->prix }}</td>
                          <td>{{ $dossier->benificier->nomB }} {{ $dossier->benificier->prenomB }}</td>
                          <td>{{ $dossier->validate }}
                            <a href="{{ route('dossier.show', $dossier->id) }}" class="btn btn-sm " title="Afficher les détails">
                              <i class="bi bi-eye" style="font-size: 20px; color: blue;"></i>

                          </a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
    </div>