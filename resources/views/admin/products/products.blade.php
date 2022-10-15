@extends('layouts.master')
@section('title')
    قائمة المنتجات
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    المتوفره</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('delete_product'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف المنتج بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif


    <!-- row -->
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <a href="product/create" class="modal-effect btn btn-outline-primary rounded-pill"  >إضافة منتج</a>
                                {{-- @can('اضافة منتج')
                                <a href="products/create" class="modal-effect btn btn-outline-primary rounded-pill" style="color:red"><i
                                        class="fas fa-plus"></i>&nbsp; اضافة منتج</a>
                            @endcan --}}
                            </div>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Striped Rows.. <a href="">Learn more</a></p> --}}
                    </div>


                    @can('تصدير EXCEL')
                        <a class="modal-effect btn btn-sm btn-primary" href="{{ url('export_products') }}"
                            style="color:white"><i class="fas fa-file-download"></i>&nbsp;تصدير اكسيل</a>
                    @endcan

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">رقم المنتج</th>
                                    <th class="border-bottom-0"> أسم المنتج</th>
                                    <th class="border-bottom-0">سعر الشراء</th>
                                    <th class="border-bottom-0">سعر البيع</th>
                                    <th class="border-bottom-0">رقم sku</th>
                                    <th class="border-bottom-0">الوحده</th>
                                    <th class="border-bottom-0">هل المنتج مفعل</th>
                                    <th class="border-bottom-0">الصنف</th>
                                    <th class="border-bottom-0">الصنف الفرعي</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($products as $product)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $product->id}} </td>
                                        <td>{{ $product->name}}</td>
                                        <td>{{ $product->sale_price }}</td>
                                        <td>{{ $product->buy_price }}</td>
                                        <td>{{ $product->sku}}</td>
                                        <td  style="min-width: 100px;">
                                            <select name="{{$product->unity }}" class="form-control select2-no-search w-100 d-flex " >
                                            @switch($product->unity )
                                            @case('item')
                                            <option value="item" label="حبه" class="mx-5 w-100  d-block">
                                                حبه
                                            </option>
                                                @break
                                            @case('cartoon')
                                            <option value="cartoon" label="كرتون"  class="mx-5 w-100  d-block">
                                                كرتون
                                            </option>
                                                @break
                                                @case('dozen')
                                            <option value="dozen" label="درزن"  class="mx-5 w-100  d-block">
                                                درزن
                                            </option>
                                                @break
                                                @case('gram')
                                            <option value="gram" label="جرام"  class="mx-5 w-100  d-block">
                                                    جرام
                                            </option>
                                                @break
                                            @default
                                            <option value="kilogram" label="كيلو جرام"  class="mx-5 w-100  d-block">
                                                كيلو جرام
                                            </option>
                                        @endswitch
                                            </select>
                                             </td>
                                        {{-- <td><a
                                                href="{{ url('productsDetails') }}/{{ $product->id }}">{{ $product->category->category_name }}</a>
                                        </td> --}}
                                        {{-- <td>{{ $product->active }}</td> --}}
                                           <td  style="min-width: 100px;">
                                    <select name="{{$product->active}}" class="form-control select2-no-search w-100 d-flex " >
                                    @switch($product->active)
                                    @case('1')
                                    <option value="1" label="مفعل" class="mx-5 w-100  d-block">
                                        مفعل
                                    </option>
                                        @break
                                    @default
                                    <option value="0" label="غير مفعل"  class="mx-5 w-100  d-block">
                                       غير مفعل
                                    </option>
                                @endswitch
                                    </select>
                                     </td>
                                        <td>{{ $product->Category->name }}</td>
                                        <td>{{ $product->Sub_Category->name }}</td>
                                        <td>
                                            {{-- {{url('edit_product') }}/{{ $product->id }} --}}
                                            <a
                                            href="  {{route('product.edit',$product->id)}}" " class="modal-effect btn btn-sm btn-info" role="button" aria-pressed="true" >تعديل<i class="las la-pen"></i>
                                            </a>
                                            <button class="btn btn-outline-danger btn-sm"
                                                data-id="{{$product->id}}"
                                                data-name="{{ $product->name}}" data-toggle="modal"
                                                data-target="#modaldemo9">حذف</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
           <!-- delete -->
           <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف الحقل</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                    type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="product/destroy" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <div class="modal-body">
                            <p>هل انت متاكد من الحقل الحقل ؟</p><br>
                            {{-- description --}}
                            <input type="hidden" name="id" id="id" value="id">
                            <input type="text" class="form-control" name="name" id="name" readonly>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!--/div-->
    </div>





    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var description = button.data('description')
            var active = button.data('active')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #active').val(active);
        })
    </script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var unity = button.data('unity')
        var sale_price = button.data('sale_price')
        var buy_price = button.data('buy_price')
        var sku = button.data('sku')
        var active = button.data('active')
        var category_id = button.data('category_id')
        var sub_category_id = button.data('sub_category_id')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #unity').val(unity);
        modal.find('.modal-body #sale_price').val(sale_price);
        modal.find('.modal-body #buy_price').val(buy_price);
        modal.find('.modal-body #sku').val(sku);
        modal.find('.modal-body #category_id').val(category_id);
        modal.find('.modal-body #sub_category_id').val(sub_category_id);
    })
</script>


@endsection
