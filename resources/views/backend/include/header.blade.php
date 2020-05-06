<header>
     <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
          <a class="navbar-brand col-sm-3 col-md-2 mr-0 h2" href="#">{{$title}}</a>
          <input class="form-control form-control-dark w-100" {{$search}} type="text" name="search" id="search" value="{{$key}}" placeholder="Search" aria-label="Search">
          <ul class="navbar-nav px-3">
               <li class="nav-item text-nowrap">
                    <a class="nav-link search" {{$search}}>查詢</a>
               </li>
          </ul>
     </nav>
</header>

