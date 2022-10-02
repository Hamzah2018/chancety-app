@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاعدات</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <form enctype="multipart/form-data" method="post" action="{{route('setting.update','test')}}">
                                    @csrf @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 border-right-2 border-right-blue-400">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label font-weight-semibold">اسم الموقع<span class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <input name="website_name" value="{{ $setting['website_name'] }}" required type="text" class="form-control" placeholder="Name of Website">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="current_session" class="col-lg-2 col-form-label font-weight-semibold">العام الحالي<span class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <select data-placeholder="Choose..." required name="current_session" id="current_session" class="select-search form-control">
                                                        <option value=""></option>
                                                        @for($y=date('Y', strtotime('- 3 years')); $y<=date('Y', strtotime('+ 1 years')); $y++)
                                                            <option {{ ($setting['current_session'] == (($y-=1).'-'.($y+=1))) ? 'selected' : '' }}>{{ ($y-=1).'-'.($y+=1) }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label font-weight-semibold">اسم الموقع المختصر</label>
                                                <div class="col-lg-9">
                                                    <input name=" website_title" value="{{ $setting['website_title'] }}" type="text" class="form-control" placeholder="Website Acronym">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label font-weight-semibold">الهاتف</label>
                                                <div class="col-lg-9">
                                                    <input name="phone" value="{{ $setting['phone'] }}" type="text" class="form-control" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label font-weight-semibold">البريد الالكتروني</label>
                                                <div class="col-lg-9">
                                                    <input name="business_email " value="{{ $setting['business_email'] }}" type="email" class="form-control" placeholder="Business Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label font-weight-semibold">عنوان الموقع<span class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <input required name="address" value="{{ $setting['address'] }}" type="text" class="form-control" placeholder="Business Address">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label font-weight-semibold"> الشعار  </label>
                                                <div class="col-lg-9">
                                                    <input name="Banner" value="{{ $setting['Banner'] }}" type="text" class="form-control date-pick" placeholder="Banner">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label font-weight-semibold"> الهدف</label>
                                                <div class="col-lg-9">
                                                    <input name="Slogan" value="{{ $setting['Slogan'] }}" type="text" class="form-control date-pick" placeholder="Slogan">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label font-weight-semibold">شعار الموقغ</label>
                                                <div class="col-lg-9">
                                                    <div class="mb-3">
                                                        <img style="width: 100px" height="100px" src="{{ URL::asset('attachments/logo/'.$setting['logo']) }}" alt="">
                                                    </div>
                                                    <input name="logo" accept="image/*" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                                </form>
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
@endsection
