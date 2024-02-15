@include('includes.layoute')
    @section('content')
            <main id="main" class="main">
                <div class="pagetitle1">
                    <div class="text-center mt-3">
                        <a href="{{ route('ajouterbenificier') }}" class="btnaddbenificier">
                            Ajouter un Benificier
                        </a>
                    </div>
                </div>
                <div class="btnExport">
                    <button id="export-csv" class="btn btn-primary">Export CSV</button>
                    <button id="export-sql" class="btn btn-primary">Export SQL</button>
                    <button id="export-txt" class="btn btn-primary">Export TXT</button>
                    <button id="export-json" class="btn btn-primary">Export JSON</button>
                    <button id="export-custom" class="btn btn-primary">Export Custom CSV</button>
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
                                                <!-- Add more columns as needed -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($benificiers as $benificier)
                                                <tr>
                                                    <td>{{ $benificier->id }}</td>
                                                    <td>{{ $benificier->nomB }}</td>
                                                    <td>{{ $benificier->prenomB }}</td>
                                                    <td>{{ $benificier->villeB }}</td>
                                                    <!-- Add more columns as needed -->
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

    <!-- Set DataTable Language to French -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const dataTable = $('#benificiersTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/French.json'
                },
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
</body>
</html>
