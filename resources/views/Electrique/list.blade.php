<script src="https://cdn.lordicon.com/lordicon.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofNol+hCv9LXRSe++9dC5u80+6bZ1egUtW" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofNol+hCv9LXRSe++9dC5u80+6bZ1egUtW" crossorigin="anonymous">
<link href="{{ asset('assets/css/dash.css') }}" rel="stylesheet">
<style>
    /* Custom CSS to minimize the width of input filters */
    input.column-filter {
        width: 180px;
        border-radius:10px;
        border: 1px solid rgb(0, 219, 160)
        text-align: center  /* Adjust the width as needed */
    }
    .column-filter{
        padding: 5px;
        align-items: center;
    }
    .dataTables_filter label {
    font-size: 16px;
    margin-right: -136px;
    
}
</style>
@include('Electrique.layoute1')
@section('content')
<main id="main" class="main">
  
    <table id="example" class="table" >
        <div class="filters">
            <label for="tribunalFilter">Tribunal:</label>
            <select id="tribunalFilter" class="column-filter">
                <!-- Options will be populated dynamically using JavaScript -->
            </select>
        
            <label for="typeFilter">Type Cmpt:</label>
            <select id="typeFilter" class="column-filter">
               
            </select>
        </div>
        <thead class="thead-light">
            <tr>
                <th><b>R</b>ef Compteurs </th>
                <th>Tribunale</th>
                <th data-type="date" data-format="YYYY/DD/MM">date</th>
                <th>valeur</th>
                <th>Type Cmpt</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compteurs as $compteur)
            <tr>
               <td>{{ $compteur->refCompteur }}</td>
               <td>{{ $compteur->tribunale->nomT }}</td>
               <td>{{ $compteur->date }}</td>
               <td style="background-color: {{ $compteur->etat ? '#FF8080' : '#99BC85' }}">
                {{ $compteur->valeur }}
            </td>
               <td>{{ $compteur->type }}</td>
               <td>
                <a href="{{ route('compteurs.edit', $compteur->id) }}" class="btn ">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('compteurs.destroy', $compteur->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn " onclick="return confirm('Are you sure you want to delete this compteur?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
         </tbody>
    
    </table>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
<script>
        $(document).ready(function () {
    // Initialize the DataTable
    var table = $('#example').DataTable({
        "order": [[2, 'desc']], 
    });

    var tribunalFilterOptions = Array.from(new Set(table.column(1).data().toArray()));
    $('#tribunalFilter').append('<option value="">All Tribunals</option>');
    tribunalFilterOptions.forEach(function (option) {
        $('#tribunalFilter').append('<option value="' + option + '">' + option + '</option>');
    });

    var typeFilterOptions = Array.from(new Set(table.column(4).data().toArray()));
    $('#typeFilter').append('<option value="">All Types</option>');
    typeFilterOptions.forEach(function (option) {
        $('#typeFilter').append('<option value="' + option + '">' + option + '</option>');
    });

    // Handle changes in the tribunal filter
    $('#tribunalFilter').on('change', function () {
        var value = $(this).val();
        table.column(1).search(value).draw();
    });

    // Handle changes in the type filter
    $('#typeFilter').on('change', function () {
        var value = $(this).val();
        table.column(4).search(value).draw();
    });
});

</script>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="bi bi-arrow-up-short"></i></a>
