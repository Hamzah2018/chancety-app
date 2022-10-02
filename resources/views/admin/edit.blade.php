@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
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
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
                                                {{-- <h6></h6><span></span> --}}
												<h5 class="main-profile-name">{{Auth::user()->name}}</h5>
												<p class="main-profile-name-text">{{Auth::user()->email}}</p>
											</div>
										</div>

                                        <form class="form-horizontal" action="{{ route('users.update',auth::user()->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                {{-- <label for="tag">الاسم:</label> --}}
                                                <input type="text" class="form-control" id="inputName" name="name" value="{{auth()->user()->name}}">
                                            </div>
                                            <div class="form-group">
                                                {{-- <label for="tag">الاسم:</label> --}}
                                                <input type="text" class="form-control" id="inputName"  name="user_description" value="{{auth()->user()->user_description}}">
                                            </div>
                                            {{-- <div class="form-group"> --}}
                                                {{-- <label for="tag">الايمل:</label> --}}
                                                {{-- <input type="email" class="form-control" id="inputEmail3" placeholder="Email"> --}}
                                            {{-- </div> --}}
                                            <div class="form-group">
                                                {{-- <label for="tag">كلمة ا:</label> --}}
                                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" name="user_description" value="{{auth()->user()->user_description}}">
                                            </div>
                                            {{-- <div class="form-group">

                                                <textarea placeholder="ملاحظة اخرى تخصص الشقه" id="w3review" name="apartment_description" rows="4" cols="50"></textarea>
                                            </div> --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label for=""> الصوره الشخصيه<span class ="text-danger"> <i class="la la-camera"></i></li></span>
                                                    {{-- <input type="file" accept= "image/*" name="photo[]" multiple> --}}
                                                    <input type="file" id="img" name="images[]" accept="image/*" multiple >
                                            </div>
                                            {{-- <div class="form-group mb-0 justify-content-end">
                                                <div class="checkbox">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                        <label for="checkbox-2" class="custom-control-label mt-1">Check me Out</label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="form-group mb-0 mt-3 justify-content-end">
                                                <div>
                                                    <button type="submit" class="btn btn-primary">تعديل</button>
                                                    {{-- <button type="submit" class="btn btn-secondary">Cancel</button> --}}
                                                </div>
                                            </div>
                                        </form>
										</div>
										<!--skill bar-->
									</div><!-- main-profile-overview -->
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
@endsection
