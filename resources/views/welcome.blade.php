<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ip2Loaction</title>
</head>

<body>
    <div class="container-md pt-5">
        <div class="text-center h4">

            Geolocation Logs
            <a class="btn btn-primary float-end" href="{{ route('mylocation') }}">
                My Location
            </a>
        </div>
        <table id="myTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>IP Address</th>
                    <th>Country</th>
                    <th>Resion</th>
                    <th>City</th>
                    <th>Langitude</th>
                    <th>Latitude</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($geolocationLogs as $item)
                    <tr>
                        <td>
                            {{ $item->id }}
                        </td>
                        <td>
                            {{ $item->ip_address }}
                        </td>
                        <td>
                            {{ $item->country }}
                        </td>
                        <td>
                            {{ $item->resion }}
                        </td>
                        <td>
                            {{ $item->city }}
                        </td>
                        <td>
                            {{ $item->latitude }}
                        </td>
                        <td>
                            {{ $item->longitude }}
                        </td>
                        <td>
                            <a href="javascript:void(0)" data-url="{{ route('delete.geolocation', $item->id) }}"
                                class="btn btn-danger delete-log">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $(document).on('click', '.delete-log', function() {

                var logUrl = $(this).data('url');
                console.log(logUrl);
                var trObj = $(this);

                if (confirm("Are you sure you want to delete this log?") == true) {
                    $.ajax({
                        url: logUrl,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {

                            trObj.parents("tr").remove();
                        }
                    });
                }

            });

        });
    </script>
</body>

</html>
