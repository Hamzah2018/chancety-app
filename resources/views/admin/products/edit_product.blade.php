@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    تعديل فاتورة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المتج</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل المتج</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('product.update',$products->id)}}" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">رقم المنتج</label>
                                <input type="hidden" name="id" value="{{ $products->id }}">
                                <input type="text" class="form-control" id="inputName" name="id"
                                    title="يرجي ادخال رقم المنتج" value="{{ $products->id }}" required>
                            </div>

                            <div class="col">
                                <label>إسم المنتج</label>
                                <input class="form-control" name="name" placeholder="Name:"
                                    type="text" value="{{ $products->name }}" required>
                            </div>

                            <div class="col">
                                <label>وحدة المنتج</label>
                                <input class="form-control" name="unity"
                                    type="text" value="{{ $products->unity}}" required>
                            </div>
                            {{-- <div class="col">
                                <label>is Active </label>
                                <input class="form-control" name="active"
                                    type="text" value="{{ $products->active  }}" required>
                            </div> --}}
                            <div class="col form-group">
                                <select name="active"  id="active" class="form-control select2-no-search" value="{{1}}" >

                                    <option  label="تفعيل"  value="{{1}}">تفيل</option>
                                    <option label="إلغاء التفعيل" value=" {{0}} ">
                                         الغاء التفعيل
                                    </option>
                                </select>
                                </div>


                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">الصنف</label>
                                <select name="Category" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value=" {{ $products->Category->id }}">
                                        {{ $products->Category->name }}
                                    </option>
                                    @foreach ($categories  as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col">
                                <label for="inputName" class="control-label">الصنف الفرعي</label>
                                <select id="sub_catogry" name="sub_catogry" class="form-control">
                                </select>
                            </div> --}}
                             <div class="col">
                                <label for="inputName" class="control-label">التصنيف الفرعي</label>
                                <select id="sub_catogry" name="sub_catogry" class="form-control">
                                    {{-- Sub_category --}}
                                    <option value="{{ $products->sub_category_id }}"> {{ $products->Sub_category->name }}</option> 
                                </select>
                            </div>
                            <div class="col">
                                <label>رقم sku </label>
                                <input class="form-control" name="sku"
                                    type="number" value="{{ $products->sku }}" required>
                            </div>
                        </div>


                        {{-- 3 --}}

                        <div class="row">
                            <div class="col">
                                <label>سعر الشراء</label>
                                <input class="form-control" name="sale_price"
                                    type="number" value="{{ $products->sale_price}}" required>
                            </div>

                            <div class="col">
                                <label>سعر البيع</label>
                                <input class="form-control" name="buy_price"
                                    type="number" value="{{ $products->buy_price}}" required>
                            </div>
                        </div>

                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('select[name="Category"]').on('change', function() {
                var CategoryId = $(this).val();
                if (CategoryId) {
                    $.ajax({
                        url: "{{ URL::to('catogray') }}/" + CategoryId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_catogry"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_catogry"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });

    </script>

@endsection
