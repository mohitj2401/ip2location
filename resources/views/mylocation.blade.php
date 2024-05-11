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

    <title>My Location | Ip2Loaction</title>
</head>

<body>
    <div class="container-md pt-5">
        <div class="text-center h4">


            My Location
            <a class="btn btn-sm btn-primary float-end" href="{{ url('/') }}">
                Go Back
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">IP Address</div>
                    <div class="col-6">{{ $log->ip_address }}</div>
                </div>
                <div class="row">
                    <div class="col-6">City</div>
                    <div class="col-6">{{ $log->city }}</div>
                </div>
                <div class="row">
                    <div class="col-6">Region</div>
                    <div class="col-6">{{ $log->region }}</div>
                </div>
                <div class="row">
                    <div class="col-6">Country</div>
                    <div class="col-6">{{ $log->country }}</div>
                </div>
                <div class="row">
                    <div class="col-6">Longitude</div>
                    <div class="col-6">{{ $log->longitude }}</div>
                </div>
                <div class="row">
                    <div class="col-6">Latitude</div>
                    <div class="col-6">{{ $log->latitude }}</div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>
