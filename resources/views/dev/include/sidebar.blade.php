<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{route('dashboard')}}" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{route('dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- Project -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Projects</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('dashboard')}}" class="menu-link">
              <div data-i18n="Without menu">List Project</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-without-navbar.html" class="menu-link">
              <div data-i18n="Without navbar">Manage Project</div>
            </a>
          </li>
          
        </ul>
      </li>
      <!-- Reports -->
      <li class="menu-item">
        <a href="{{route('dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Reports</div>
        </a>
      </li>

    </ul>
  </aside>