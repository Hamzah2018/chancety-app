
 <nav class="navbar navbar-expand-lg sticky-top ">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{URL::asset('assets/mydesign/imgs/logo.png')}}"  width="100px;" height="60px" alt="" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#main"
        aria-controls="main"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fa-solid fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="main">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          {{-- <li class="nav-item">
            <a class="nav-link p-2 p-lg-3 active" aria-current="page" href="#">الرئيسية</a>
          </li> --}}
          @foreach ($catogries as $category)
          <li class="nav-item">
            <button class="nav-link p-2 p-lg-3" href="" wire:click="$emit('connected', {{ $category->id }} )" >{{$category->name}}</button>
            {{-- <a href="{{route('page.sub_show',$category->id)}}" class="btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a> --}}
          </li>
          @endforeach
        <div></div>
        <div class=" ps-3 pe-3 d-none d-lg-block">
          <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
        </div>


      </div>

    </div>

  </nav>
  {{-- <select wire:model= "catograyId" id="{{$catograyId}}">
    <option value="">Select</option>
    @foreach($catogries as $catogry)
      <option vlaue="{{$catogry->id}}">{{$catogry->name}}</option>
    @endforeach
 </select> --}}
  <table class="table table-success table-striped">
    <thead>
       <thead>
           <tr>
            <th>الاصناف الفرعيه</th>
           </tr>
         </thead>
   </thead>
   <tbody>
    {{-- wire:change="update({{$row->id}} --}}
       @foreach (wire:change="update({{$sub_catograies}}) as $sub )
       <tr>
           <td>{{ $sub->name}}</td>
       </tr>
       @endforeach
   </tbody>
 </table>
