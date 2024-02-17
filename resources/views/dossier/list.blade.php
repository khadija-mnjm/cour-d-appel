@include('includes.layoute');
    @section('content');
    <footer>
        <main id="main" class="main">
          <h5 class="titredesign">
             <span >Ministère de la Justice,</span><br/>Enregistre les sommes dues aux avocats commis <br/>d'office dans le cadre  de l'aide judiciaire, qui sont 
             <br/>détenues par le donneur d'ordre du déboursement des assistants.
            </h5>
            <br><br>
            <div class="pagetitle">
              <div class="text-center ">
                  <a href="{{ route('add') }}" class="btn btn-success">
                      Ajouter Dossier
                  </a>
              </div>
              
          </div>
            
            <div class="container1">
            
      <div class="row">
        <div class="col-lg-12">

          <div class="card2">
            <div class="card-body1">
              <h5 class="card-title">Listes des Dossiers</h5>
              
              <table class="table datatable" id="AvocatTable">
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
                          <td>{{ $dossier->dateDossier }}</td>
                          <td>{{ $dossier->refJuridique }}</td>
                          <td>{{ $dossier->refDecision }}</td>
                          <td>{{ $dossier->tribunale->typeTribunale }}</td>
                          <td>{{ $dossier->prix }}</td>
                          <td>{{ $dossier->benificier->nomB }} {{ $dossier->benificier->prenomB }}</td>
                          <td>{{ $dossier->validate }}
                            <a href="{{ route('dossier.show', $dossier->id) }}" class="btn btn-sm " title="Afficher les détails">
                              <i class="bi bi-eye" style="font-size: 20px; color: blue;">
                              </i>
                            </a>
                            <i class="bi bi-eye" style="font-size: 10px; color: blue;"></i>
                          </a>
                        &nbsp; &nbsp;
                        
                        <a href="{{route('dossier.edit',$dossier->id)}}">
                            <i class="bi bi-pencil-square"></i>
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

    <script>
      document.addEventListener('DOMContentLoaded', function () {
          const table = new simpleDatatables.DataTable("#AvocatTable");

          document.getElementById("export-csv").addEventListener("click", () => {
              exportCSV(table, {
                  download: true,
                  lineDelimiter: "\n",
                  columnDelimiter: ";"
              });
          });

          document.getElementById("export-sql").addEventListener("click", () => {
              exportSQL(table, {
                  download: true,
                  tableName: "export_table"
              });
          });

          document.getElementById("export-txt").addEventListener("click", () => {
              exportTXT(table, {
                  download: true
              });
          });

          document.getElementById("export-json").addEventListener("click", () => {
              exportJSON(table, {
                  download: true,
                  space: 3
              });
          });

          document.getElementById("export-custom").addEventListener("click", () => {
              exportCustomCSV(table, {
                  download: true
              });
          });
      });
  </script>