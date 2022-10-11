<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('assets/mydesign/css/bootsrap_rtl.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/mydesign/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('assets/mydesign/css/mainstyle.css')}}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>
<body>

    <table class="table table-success table-striped">
         <thead>
            <thead>
                <tr>
                 <th>الاصناف الفرعيه</th>
                </tr>
              </thead>
        </thead>
        <tbody>
            @foreach ($sub_categories as $sub )


            <tr>
                <td>{{ $sub->name}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>


    <script src="{{URL::asset('assets/mydesign/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('assets/mydesign/js/all.min.js')}}"></script>
</body>
</html>
