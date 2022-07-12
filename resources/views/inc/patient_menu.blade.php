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
            <a href="{{ route('p_dashboard') }}" class="menu-link">
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
                    <a href="{{route('p_profile')}}" class="menu-link">
                        <div data-i18n="Account">Account</div>
                    </a>
                </li>

            </ul>
        </li>


        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Work</span></li>
        <!-- Cards -->
        <li class="menu-item">
            <a href="{{ route('p_inbox') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-inbox"></i>
                <div data-i18n="Basic">Inbox</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('member')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-id-card"></i>
                <div data-i18n="Basic">Membership</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('docs') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-plus-medical"></i>
                <div data-i18n="Basic">Doctors</div>
            </a>
        </li>
        <!-- Extended components -->
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
                <div data-i18n="Extended UI">Shop</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('med_shop') }}" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">Pharmacy</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('p_search') }}" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">Search Medicines</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('cart')}}" class="menu-link">
                        <div data-i18n="Text Divider">Cart</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('order_his')}}" class="menu-link">
                        <div data-i18n="Text Divider">Order History</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="{{route('p_notice')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-notification"></i>
                <div data-i18n="Basic">Notices</div>
            </a>
        </li>

        <!-- Forms & Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Feedback</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Review</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('cr_fd')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">Give Feedback</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('old_fd')}}" class="menu-link">
                        <div data-i18n="Input groups">Previous Feedbacks</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-block"></i>
                <div data-i18n="Form Elements">Report</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('rep_act')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">Report Activity</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('ck_rep')}}" class="menu-link">
                        <div data-i18n="Input groups">Previous Reports</div>
                    </a>
                </li>
            </ul>
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

        $("#men li a:active").click(function() {
            $("#men li a:active").removeClass(" active");
            $(this).addClass(" active");
        });

    });
</script>
