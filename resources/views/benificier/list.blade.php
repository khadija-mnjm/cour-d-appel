@include('includes.layoute')
    @section('content')
            <main id="main" class="main">
                
                <div class="pagetitle" >
                    <div class="text-center mt-3">
                        <a href="{{ route('ajouterbenificier') }}" class="btn btn-success btnaddbenificier">
                            Ajouter un Benificier
                        </a>
                    </div>
                    
                </div>
                <div class="container1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card2">
                                <div class="card-body1">
                                    <h5 class="card-title">Listes des benificiers</h5>
                                   
                                    <table class="table datatable" id="benificiersTable">
                                        <thead>
                                            <tr>
                                                <th><b>N</b>umero</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Ville</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($benificiers as $benificier)
                                                <tr>
                                                    <td>{{ $benificier->id }}</td>
                                                    <td>{{ $benificier->nomB }}</td>
                                                    <td>{{ $benificier->prenomB }}</td>
                                                    <td>{{ $benificier->villeB }}</td>
                                                    <td>
                                                        <a href="">
                                                            <i class="bi bi-trash"></i>
                                                        </a> 
                                                        &nbsp; &nbsp;
                                                        <a href="">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                        &nbsp; &nbsp;
                                                        <a href="">
                                                            <i class="bi bi-file-earmark-pdf " style="color: red"></i>
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
            </main>
        </div>
    </footer>

    <!-- Export Buttons Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const table = new simpleDatatables.DataTable("#benificiersTable");

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

    
</body>
</html>
