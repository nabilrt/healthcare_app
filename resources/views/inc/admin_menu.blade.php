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
        <li class="menu-item" id="dash">
            <a href="{{route('a_dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>




        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">USER</span>
        </li>
        <li class="menu-item" id="acc">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
            </a>
            <ul class="menu-sub" id="su">
                <li class="menu-item">
                    <a href="{{route('a_profile')}}" class="menu-link">
                        <div data-i18n="Account">Account</div>
                    </a>
                </li>

            </ul>
        </li>


        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Work</span></li>
        <!-- Cards -->
        <li class="menu-item">
            <a href="{{route('tot_earn')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-wallet"></i>
                <div data-i18n="Basic">Earnings</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('memb')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                <div data-i18n="Basic">Membership</div>
            </a>
        </li>
        <!-- User interface -->
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-plus-medical"></i>
                <div data-i18n="User interface">Doctors</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('ma_doc')}}" class="menu-link">
                        <div data-i18n="Accordion">Manage Doctors</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('bl_doc')}}" class="menu-link">
                        <div data-i18n="Alerts">Blocked Doctors</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="User interface">Patients</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('ma_pa')}}" class="menu-link">
                        <div data-i18n="Accordion">Manage Patients</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('bl_pa')}}" class="menu-link">
                        <div data-i18n="Alerts">Blocked Patients</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Extended components -->
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-credit-card"></i>
                <div data-i18n="Extended UI">Expense</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('create_exp')}}" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">Create Expense</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('manage_expenses')}}" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">Manage Expenses</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-message-dots"></i>
                <div data-i18n="Extended UI">Notice</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('notice')}}" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">Create Notice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('manage_notices')}}" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">Manage Notices</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Feedback</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Review</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('feedbacks') }}" class="menu-link">
                        <div data-i18n="Basic Inputs">Check Feedbacks</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{route('malicious_activities')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-block"></i>
                <div data-i18n="Basic">Reports</div>
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
