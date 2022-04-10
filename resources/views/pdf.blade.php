<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body onload="window.print()">
    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Month</th>
                <th scope="col">Day</th>
                <th scope="col">Date</th>
                <th scope="col">Employee Id</th>
                <th scope="col">Employee name</th>
                <th scope="col">Department</th>
                <th scope="col">First In Time</th>
                <th scope="col">Last Out Time</th>
                <th scope="col">Hour of Work</th>
            </tr>
        </thead>
        <tbody>
            @foreach($works as $key=>$work)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$work->month}}</td>
                <td>{{$work->day}}</td>
                <td>{{$work->date->format('Y-m-d')}}</td>
                <td>{{$work->employee_id}}</td>
                <td>{{$work->employee_name}}</td>
                <td>{{$work->department}}</td>
                <td style="{{ ($in_time && ($work->first_in_time->format('H:i') > $in_time)) ? 'color: red' : ''}}">{{$work->first_in_time->format('H:i')}} ( {{$work->first_in_time->format('h:i A')}})</td>
                <td style="{{ ($out_time && ($work->last_out_time->format('H:i') < $out_time)) ? 'color: orange' : ''}}">{{$work->last_out_time->format('H:i')}} ( {{$work->last_out_time->format('h:i A')}})</td>
                <td>{{$work->hour_of_work}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>