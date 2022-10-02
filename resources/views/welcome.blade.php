<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- ✅ Load CSS file for DataTables  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"
      integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- ✅ load jQuery ✅ -->
    {{-- <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script> --}}

    <!-- ✅ load DataTables ✅ -->
    {{-- <script
      src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
      integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script> --}}

    {{-- <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" /> --}}

    {{-- <link rel="stylesheet" type="text/css" href="assets/custom/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/custom/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/custom/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/custom/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/custom/css/style.css"> --}}

    <title>Beautiful Tables</title>
</head>

<body class="container">
<h1 class="text-center">Sample DataTables Project</h1>
                    <table class="table text-md-nowrap" id="myTable">
                        <thead >
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">رقم العميل </th>
                                <th class="wd-15p border-bottom-0"> الاسم الاول  </th>
                                <th class="wd-15p border-bottom-0">  الاسم الثاني/الصفه </th>
                                <th class="wd-15p border-bottom-0">   نوع الاحساب</th>
                                <th class="wd-15p border-bottom-0"> الايمل</th>
                                <th class="wd-15p border-bottom-0"> الايمل الثاني</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            @endphp
                            @foreach ($customers as $customer)
                                @php
                                $i++
                                @endphp
                            <tr id={{$customer->id}}>
                                <td>{{$i}}</td>
                                <td>{{ $customer->id }}</td>
                                <td> {{ $customer->fname }}</td>
                                <td> {{ $customer->lname }}</td>
                                <td> {{ $customer->user_type }}</td>
                                <td> {{ $customer->password }}</td>
                                <td> {{ $customer->email }}</td>
                                <td> {{ $customer->second_email }}</td>
                                    {{-- <a href="{{route('setting.edit', $setting->id )}}" class ="modal-effect btn btn-outline-success rounded-pill">Edit</a> --}}
                                    {{-- <a href="" class ="modal-effect btn btn-outline-danger rounded-pill">delete</a> --}}
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                    data-id="{{$customer->id}}"
                                    data-fname="{{ $customer->fname}}"
                                    data-lname="{{ $customer->lname}}"
                                    data-email="{{ $customer->email}}"
                                    data-second_email="{{ $customer->second_email}}"
                                    data-toggle="modal" href="#exampleModal2"
                                    title="تعديل"><i class="las la-pen"></i></a>
                                     <button class="btn btn-outline-danger btn-sm"
                                                 data-id="{{$customer->id}}"
                                                data-fname="{{ $customer->fname }}" data-toggle="modal"
                                                data-lname="{{ $customer->lname }}" data-toggle="modal"
                                                data-email="{{ $customer->email }}" data-toggle="modal"
                                                data-second_email="{{ $customer->second_email }}" data-toggle="modal"
                                                data-target="#modaldemo9">حذف</button>
                                                {{-- <a href="{{route('setting.show',$setting->id)}}" class="btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a> --}}
                                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> --}}
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

 {{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --}}
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
 {{-- <script src="{{URL::asset('assets/js/jquery-3.6.1.min.js')}}" type="text/javascript"></script> --}}
 {{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --}}
 {{-- <script src="{{URL::asset('assets/js/jquery.dataTables.js')}}" type="text/javascript"></script> --}}
 {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
 {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}
 {{-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> --}}
 {{-- <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script> --}}

 {{-- <script>
 $(document).ready( function () {
     $('#example2').DataTable();
     "pageLength": 3
 } );
 </script> --}}
{{-- <scrip>
    $(document).ready(function () {
        $('#tb').DataTable({
           "pagingType": "full_numbers",
         });
    }); --}}

{{-- <script type="text/javascript" src="assets/custom/js/jquery-2.2.4.min.js"></script> --}}
{{-- <script type="text/javascript" src="assets/custom/js/jquery.dataTables.min.js"></script> --}}
{{-- <script type="text/javascript" src="assets/custom/js/dataTables.buttons.min.js"></script> --}}
{{-- <script type="text/javascript" src="assets/custom/js/jszip.min.js"></script>
<script type="text/javascript" src="assets/custom/js/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/custom/js/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/custom/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="assets/custom/js/buttons.print.min.js"></script>
<script type="text/javascript" src="assets/custom/js/app.js"></script>
<script type="text/javascript" src="assets/custom/js/jquery.mark.min.js"></script>
<script type="text/javascript" src="assets/custom/js/datatables.mark.js"></script>
<script type="text/javascript" src="assets/custom/js/buttons.colVis.min.js"></script> --}}
{{-- <footer>For documentation and licensing visit <a href="https://datatables.net/">DataTables</a></footer> --}}
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
<script src="assets/resource/tiny_mce.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
$('#myTable').DataTable();
table.search( this.value ).draw();

}        );
</script>
</body>
</html>
