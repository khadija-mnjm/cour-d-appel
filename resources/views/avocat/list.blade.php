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
                <div class="pagetitle1">
                    <div class="text-center mt-3">
                        <a href="{{ route('ajouteravocat') }}" class="btnadd">
                            Ajouter un avocat
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
                                                       
                                                        <a href="{{route('avocat.destroy',$avocat->id)}}"><lord-icon
                                                            src="https://cdn.lordicon.com/skkahier.json"
                                                            trigger="hover"
                                                            style="width:50px;height:50px;color:green;">
                                                        </lord-icon></a>

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