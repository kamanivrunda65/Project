<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Booking tdata</title>
</head>
<body>
    <main>
        <div class="container">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Day</th>
                    <th scope="col">Slot</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($bookingdata as $data)
                    <tr>
                        <td>{{$data->username}}</td>
                        <td>{{date('d M,Y', strtotime($data->booking_date))}}</td>
                        @if($data->day_type=="full_day")
                        <td>Full Day</td>
                        <td>---</td>
                        @else
                        <td>Half Day</td>
                        <td>{{$data->slot}}</td>
                        @endif
                       
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </main>
</body>
</html>