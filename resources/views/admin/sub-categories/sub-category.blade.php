@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@section('title')
الاصناف الفرعيه
@stop

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاقسام</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
				<div class="row">
	<!--div-->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary rounded-pill" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> إضافة تصنيف فرعي</a>

                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table key-buttons text-md-nowrap">
                        <thead >
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">رقم التصنيف الفرعي </th>
                                <th class="wd-15p border-bottom-0">اسم التصنيف الفرعي</th>
                                <th class="wd-15p border-bottom-0">اسم التصنيف الرئيسي</th>
                                <th class="wd-15p border-bottom-0">وصف التصنيف الفرعي</th>
                                <th class="wd-15p border-bottom-0">مفعل او لا</th>
                                <th class="w-25 border-bottom-0"> العمليات </th>
                                {{-- <th class="w-25 border-bottom-0">  </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            @endphp
                            @foreach ($subcats as $subcat)
                                @php
                                $i++
                                @endphp
                            <tr id={{$subcat->id}}>
                                <td>{{$i}}</td>
                                <td>{{ $subcat->id }}</td>
                                <td>{{ $subcat->name }}</td>
                                <td>{{ $subcat->Category->name }}</td>
                                {{-- {{ $apartment->user->name }} --}}
                                <td> {{ $subcat->description }}</td>
                                <td  style="min-width: 100px;">
                                    <select name="{{$subcat->active}}" class="form-control select2-no-search w-100 d-flex " >
                                    @switch($subcat->active)
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
                                    {{-- <a href="{{route('setting.edit', $setting->id )}}" class ="modal-effect btn btn-outline-success rounded-pill">Edit</a> --}}
                                    {{-- <a href="" class ="modal-effect btn btn-outline-danger rounded-pill">delete</a> --}}
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                    data-id="{{$subcat->id}}"
                                    data-name="{{ $subcat->name}}"
                                    data-description="{{ $subcat->description}}"
                                    data-active="{{ $subcat->active}}"
                                    data-parent_id="{{ $subcat->parent_id }}"
                                    data-toggle="modal" href="#exampleModal2"
                                    title="تعديل"><i class="las la-pen"></i></a>
                                     <button class="btn btn-outline-danger btn-sm"
                                                data-id="{{$subcat->id}}"
                                                data-name="{{ $subcat->name }}" data-toggle="modal"
                                                data-description="{{ $subcat->description }}" data-toggle="modal"
                                                data-active="{{ $subcat->active }}" data-toggle="modal"
                                                data-target="#modaldemo9">حذف</button>
                                                {{-- <a href="{{route('category.show',$category->id)}}" class="btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a> --}}
                                            </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
    <!--/div-->
		<!-- Basic modal -->
		<div class="modal" id="modaldemo8">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
                    <div class="card  box-shadow-0">
					<div class="modal-header">
                        {{-- <div class="card-header"> --}}
                            {{-- <h4 class="card-title mb-1">Default Form</h4> --}}
                            {{-- <p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p> --}}
                        {{-- </div> --}}
						<h6 class="modal-title">إضافة تصنيف فرعي
                            </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
							<div class="card-body pt-0">


                                <form action="{{route('sub-catogray.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                    {{-- {{ csrf_feild()}} --}}
                                    @csrf
                                    <div class="form-group">
                                    {{-- <p class="mg-b-10">نوع الشقه</p> --}}
                                    <div class="form-group">
										{{-- <input type="number" class="form-control" id="inputName" name="id" placeholder="رقم التصنيف" required> --}}
										<input type="text" class="form-control" id="inputName" name="name" placeholder="اسم التصنيف" required>
										<input type="text" class="form-control" id="inputName" name="description" placeholder="وصف التصنيف" required>
										{{-- <input type="text" class="form-control" id="inputName" name="user_type" placeholder="نوع المستخدم"> --}}
										{{-- <input type="number" class="form-control" id="inputName" name="active" placeholder="هل التصنيف مفعل؟" required> --}}
                                        <div class="form-group">
                                            <select class="form-control select2-no-search" name="parent_id">
                                                    @foreach($categories as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                            </select>
                                            </div>
                                        <div class="form-group">
                                            <select name="active" class="form-control select2-no-search my-3">
                                                <option value="1">
                                                            مفعل
                                                </option>
                                                <option value="0">
                                                        غير مفعل
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for=""><h6>صوره التصنيف<span class ="text-danger">*</span> </h6></label>
                                                <input type="file" id="img" name="image" accept="image/*">
                                        </div>
									</div>
                                    {{-- <div class="form-group">
										<input type="text" class="form-control" id="inputName" name="" placeholder="Name">
									</div> --}}
                                <button type="submit" class="btn btn-primary rounded">حفظ</button>
							</div>
						</div>
					</div>
					<div class="modal-footer">
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                {{-- <button type="submit" class="btn btn-secondary">إلغاء</button> --}}
                            </div>
                        </div>

					</div>
				</div>
			</div>
        </form>
		</div>
		<!-- End Basic modal -->

				</div>
				<!-- row closed -->

			</div>
  <!-- edit -->
  {{-- id="exampleModal2" --}}

  <div class="modal fade"  id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body" >

             <form action="sub-catogray/update" method="post" autocomplete="off">
                 {{method_field('patch')}}
                 {{csrf_field()}}
                 <div class="form-group">
                        <input type="hidden" name="id"  id="id">
                        <input type="text" class="form-control" name="name" id="name">
                        <input type="text" class="form-control" name="description" id="description">
                        {{-- <input type="text" class="form-control" name="active" id="active"> --}}
                        <div class="form-group">
                            <select class="form-control select2-no-search" name="parent_id">
                                  @foreach($categories as $cat)
                                         <option value="{{$cat->id}}">{{$cat->name}}</option>
                                  @endforeach
                           </select>
                         </div>
                        <div class="form-group">
                            <select name="active"  id="active" class="form-control select2-no-search" value="{{1}}" >

                                <option  label="تفعيل"  value="{{1}}">تفيل</option>
                                <option label="إلغاء التفعيل" value=" {{0}} ">
                                     الغاء التفعيل
                                </option>
                            </select>
                            </div>
                 </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
 </div>
			<!-- Container closed -->

		</div>
          <!-- delete -->
          <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف الحقل</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                    type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="sub-catogray/destroy" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <div class="modal-body">
                            <p>هل انت متاكد من الصنف الحقل ؟</p><br>
                            {{-- description --}}
                            <input type="hidden" name="id" id="id" value="id">
                            <input type="text" class="form-control" name="name" id="name" readonly>
                            <input type="text" class="form-control" name="description" id="description" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                </div>
                </form>
            </div>
        </div>



		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
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
        var description = button.data('description')
        var active = button.data('active')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #description').val(description);
        modal.find('.modal-body #active').val(active);
    })
</script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
{{-- <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script> --}}
 <script>
   $(document).ready(function () {
        $('#datatable').DataTable();
   });
</script>
@endsection

