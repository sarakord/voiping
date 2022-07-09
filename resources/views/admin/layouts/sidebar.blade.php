<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{ asset('back/assets/images/faces/face8.jpg') }}" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">کاربر تست</p>
                    <p class="designation">مدیریت سایت</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">منوی اصلی</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">کنترل پنل</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">صفحات</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.user.index') }}">کاربران</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.contact.index') }}">مخاطب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.call.index') }}">تماس </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.call.search') }}">جستجوی تماس کاربران </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
