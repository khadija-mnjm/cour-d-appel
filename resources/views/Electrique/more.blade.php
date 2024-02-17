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
    </style>
    @extends('Electrique.layoute1')

    @section('content')
<main id="main" class="main">
    <div class="pagetitle13">
        <h1>Détailles de dossiers </h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('statistique') }}">Statistique </a></li>
            <li class="breadcrumb-item active">detaills </li>
          </ol>
        </nav>
      </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th><b>N</b>umero </th>
                <th>Nom Avocat</th>
                <th data-type="date" data-format="YYYY/DD/MM">date</th>
                <th>Prix</th>
                <th>Benificier</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dossiers as $dossier)
            <tr>
               <td>{{ $dossier->numeroD }}</td>
               <td>{{ $dossier->avocat?->nomV }}</td>
               <td>{{ $dossier->dateDossier }}</td>
               <td>{{ $dossier->prix }}</td>
               <td>{{ $dossier->benificier->nomB }} {{ $dossier->benificier->prenomB }}</td>
            </tr>
            @endforeach
         </tbody>
        <tfoot>
            <tr>
                <th><b>N</b>umero </th>
                <th>Nom Avocat</th>
                <th>date</th>
                <th>Prix</th>
                <th>Benificier</th>
            </tr>
        </tfoot>
    </table>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function () {
                var api = this.api();

                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" class="column-filter" placeholder="' + title + '" />');

                        // On every keypress in this input
                        $(
                            'input.column-filter',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('change', function (e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})';

                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function (e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                            });
                    });
            },
        });

        // Initialize simple-datatables
        document.addEventListener('DOMContentLoaded', function () {
            new simpleDatatables.DataTable('#example', {
                // Add any configuration options for simple-datatables here
            });
        });
    });
</script>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="bi bi-arrow-up-short"></i></a>


