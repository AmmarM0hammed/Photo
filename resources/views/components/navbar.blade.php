<!-- Navbar -->
<nav class="navbar navbar-expand-lg scrolling-navbar " >
    <!-- Container wrapper -->
    <div class="container">
      <!-- Navbar brand -->
      <a class="navbar-brand me-2" href="/">
        <img
          src="{{asset('assets/image/websitelogo.png')}}"
          height="64"
          alt=" Logo"
          loading="lazy"
          style="margin-top: -1px;"
        />

        <span style="font-weight: bold;text-transform: uppercase"> {{config('app.name')}}</span>
      </a>
  
      <!-- Toggle button -->
     
  
      <!-- Collapsible wrapper -->
      <div class="" id="navbarButtonsExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li> --}}
        </ul>
        <!-- Left links -->
    
    <div class="d-flex align-items-center "">
       <!-- Notifications -->
       @if(auth()->check())
     
      <!-- Avatar -->
      <div class="dropdown me-1">
        <a class="dropdown-toggle d-flex align-items-center hidden-arrow " data-mdb-offset="10,10" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false"
        >
          <img src="{{asset('profile_image/'.auth()->user()->image)}}" class="rounded-circle" height="42" alt="Black and White Portrait of a Man" loading="lazy"
          />
        </a>
        <ul class="dropdown-menu " 
        >
          <li>
            <a class="dropdown-item" href="{{ route('profile.index',["username"=>auth()->user()->username]) }}">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('profile.edit') }}">Settings</a>
          </li>
          <li><hr class="dropdown-divider" /></li>

          <li>
            <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
          </li>
        </ul>
      </div>
@endif
     @if(!auth()->user())
          @if($loginBtn)
          <a href="#" type="button" class="btn btn-danger ">
            Login
          </a>
          @endif
      @endif

        </div>
     
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->