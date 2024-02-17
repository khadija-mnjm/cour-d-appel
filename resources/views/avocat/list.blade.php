@include('includes.layoute')
    @section('content')
    <script>
        function deleteAvocat(id) {
            if (confirm('Are you sure you want to delete this avocat?')) {
                // Send an AJAX request to delete the avocat
                fetch(/avocats/${id}, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    // Add additional options if needed
                })
                .then(response => response.json())
                .then(data => {
                    // Optionally handle success response
                    console.log(data);
                    // Reload the page or update the table without refreshing if necessary
                    location.reload(); // This will reload the page
                })
                .catch(error => {
                    // Optionally handle error response
                    console.error(error);
                });
            }
        }
    </script>
    
        <div class="container2">
            <main id="main" class="main">
                <div class="pagetitle">
                    <div class="text-center mt-3">
                        <a href="{{ route('ajouteravocat') }}" class="btn btn-success btnadd">
                            Ajouter un avocat
                        </a>
                    </div>
                </div>
                <div class="container1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card2">
                                <div class="card-body1">
                                    <h5 class="card-title">Listes des Avocats</h5>
                                   
                                    <table class="table datatable" id="AvocatTable">
                                        <thead>
                                            <tr>
                                                <th><b>N</b>umero</th>
                                                <th>Nom</th>
                                                <th>ville d'avocact</th>
                                                <th>Adresse </th>
                                                <th>Actions  </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($avocats as $avocat)
                                                <tr>
                                                    <td>{{ $avocat->id }}</td>
                                                    <td>{{ $avocat->nomV }}</td>
                                                    <td>{{ $avocat->villeV }}</td>
                                                    <td>{{ $avocat->adresseV }}</td>
                                                    <td>
                                                        @if ($avocat->active == 'non')
                                                            <a href="{{ route('avocat.destroy', $avocat->id) }}" class="text-danger" onclick="return confirmDelete()">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                                </svg>
                                                            </a>
                                                        @else
                                                            <a href="#" class="text-secondary disabled" aria-disabled="true">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                                </svg>
                                                            </a>
                                                        @endif
                                                        
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
                                            <script>
                                                function confirmDelete() {
                                                    return confirm('Êtes-vous sûr de vouloir supprimer cet avocat ?');
                                                }
                                            </script>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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