<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
  <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
    <i class="fe fe-x"><span class="sr-only"></span></i>
  </a>
  <nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
        {{-- <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
          <g>
            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
          </g>
        </svg> --}}
        {{-- <img src="{{ asset('img/font.png') }}" width="50" alt=""> --}}
        <h3>IAD</h3>
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      {{-- <li class="nav-item dropdown">
        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-home fe-16"></i>
          <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
          <li class="nav-item active">
            <a class="nav-link pl-3" href="./index.html"><span class="ml-1 item-text">Default</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="./dashboard-analytics.html"><span class="ml-1 item-text">Analytics</span></a>
          </li>
        </ul>
      </li> --}}
      <li class="nav-item w-100">
        <a class="nav-link" href="home">
          <i class="fe fe-home fe-16"></i>
          <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Reference</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#warehouse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-truck fe-16"></i>
          <span class="ml-3 item-text">Warehouse</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="warehouse">
          <li class="nav-item">
            <a class="nav-link pl-3" href="vehicle"><span class="ml-1 item-text">Vehicle</span></a>
            <a class="nav-link pl-3" href="driver"><span class="ml-1 item-text">Driver</span></a>
          </li>
        </ul>
      </li>
      {{-- <li class="nav-item w-100">
        <a class="nav-link" href="#">
          <i class="fe fe-users fe-16"></i>
          <span class="ml-3 item-text">Employee</span>
        </a>
      </li> --}}
      <li class="nav-item w-100">
        <a class="nav-link" href="customer">
          <i class="fe fe-award fe-16"></i>
          <span class="ml-3 item-text">Customer</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="destination">
          <i class="fe fe-compass fe-16"></i>
          <span class="ml-3 item-text">Destination</span>
        </a>
      </li>
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Daily</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#spk" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-shopping-bag fe-16"></i>
          <span class="ml-3 item-text">SPK CPO</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="spk">
          <li class="nav-item">
            <a class="nav-link pl-3" href="pembayaran"><span class="ml-1 item-text">Pembayaran</span></a>
            <a class="nav-link pl-3" href="resume"><span class="ml-1 item-text">Resume</span></a>
          </li>
        </ul>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="bpu">
          <i class="fe fe-shopping-cart fe-16"></i>
          <span class="ml-3 item-text">Perbaikan Unit</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="pb">
          <i class="fe fe-life-buoy fe-16"></i>
          <span class="ml-3 item-text">Pemakaian Ban</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="pu">
          <i class="fe fe-tag fe-16"></i>
          <span class="ml-3 item-text">Pendapatan Unit</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="bbm">
          <i class="fe fe-coffee fe-16"></i>
          <span class="ml-3 item-text">BBM & Makan</span>
        </a>
      </li>
    </ul>
    <div class="btn-box w-100 mt-4 mb-1">
      <a target="_blank" class="btn mb-2 btn-primary btn-lg btn-block text-white" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
        <i class="fe fe-log-out fe-12 mx-2"></i><span class="small">Logout</span>
      </a>
    </div>
  </nav>
</aside>