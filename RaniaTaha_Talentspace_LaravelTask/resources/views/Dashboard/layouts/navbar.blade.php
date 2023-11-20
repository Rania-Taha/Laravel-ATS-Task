<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div>
      <a class="navbar-brand brand-logo" href="index.html">
        <img src="{{asset('Frontend/img/talentspace_logo1.png')}}" style="width: 50px" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="index.html">
        <img src="{{asset('Frontend/img/talentspace_logo1.png')}}" style="width: 200px" alt="logo" />
      </a>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-top"> 
    
    <ul class="navbar-nav ms-auto" >
      <li>    <a href="profile"> <button type="button" data-bs-toggle="offcanvas"> Profile</button></a>
      </li>
      <li style="margin-right: 5px"> <a href="{{ route('logout')}}">  <button type="button" data-bs-toggle="offcanvas"> Logout</button> </a>
      </li>
      
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>