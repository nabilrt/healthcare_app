<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
       <a href="" class="h5">AS Health Care App</a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1" id="men">
      <!-- Dashboard -->
      <li class="menu-item">
        <a href="{{ route('s_dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>




      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">USER</span>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Account Settings</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('s_profile') }}" class="menu-link">
              <div data-i18n="Account">Account</div>
            </a>
          </li>

        </ul>
      </li>


      <!-- Components -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Work</span></li>
      <!-- Cards -->
      <li class="menu-item">
        <a href="{{ route('earn') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-wallet-alt"></i>
          <div data-i18n="Basic">Earnings</div>
        </a>
      </li>
      <!-- User interface -->
      <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bxs-capsule"></i>
          <div data-i18n="User interface">Medicines</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('add_medicine') }}" class="menu-link">
              <div data-i18n="Accordion">Add Medicine</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('manage_med') }}" class="menu-link">
              <div data-i18n="Alerts">Manage Medicines</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('search') }}" class="menu-link">
              <div data-i18n="Alerts">Search Medicines</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- Extended components -->
      <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bxs-briefcase"></i>
          <div data-i18n="Extended UI">Workplace</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('orders') }}" class="menu-link">
              <div data-i18n="Perfect Scrollbar">Orders</div>
            </a>
          </li>
        </ul>
      </li>
        <li class="menu-item">
            <a href="{{route('s_notice')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-notification"></i>
                <div data-i18n="Basic">Notices</div>
            </a>
        </li>
    </ul>
  </aside>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $("#men li").click(function() {
            $("#men li").removeClass(" active");
            $(this).addClass(" active");
        });



    });
</script>
