<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    
                </form>
                <div class="header-button">
                    <div class="noti-wrap">
                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-comment-more"></i>
                            <span class="quantity">1</span>
                            <div class="mess-dropdown js-dropdown">
                                <div class="mess__title">
                                    <p>You have 2 news message</p>
                                </div>
                                <div class="mess__item">
                                    <div class="image img-cir img-40">
                                        <img src="{{ asset('modules/admin/images/icon/avatar-06.jpg') }}" alt="Michelle Moreno" />
                                    </div>
                                    <div class="content">
                                        <h6>Michelle Moreno</h6>
                                        <p>Have sent a photo</p>
                                        <span class="time">3 min ago</span>
                                    </div>
                                </div>
                                <div class="mess__footer">
                                    <a href="#">View all messages</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{ asset('modules/admin/images/icon/avatar-01.jpg') }}" alt="" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ auth()->guard('admin')->user()->name }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="{{ asset('modules/admin/images/icon/avatar-01.jpg') }}" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="javascript:void(0)">{{ auth()->guard('admin')->user()->name }}</a>
                                        </h5>
                                        <span class="email">{{ auth()->guard('admin')->user()->email }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{ route('admin.profile') }}">
                                            <i class="zmdi zmdi-account"></i>
                                            Thông tin cá nhân
                                        </a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{ route('admin.logout') }}">
                                        <i class="zmdi zmdi-power"></i>
                                        Đăng xuất
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->

<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="#">
                    <img src="{{ asset('modules/admin/images/icon/logo.png') }}" alt="Admin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="{{ request()->segment(2) === 'dashboard' ? 'active' : '' }}">
					<a href="{{ route('admin.dashboard') }}">
						<i class="fas fa-tachometer-alt"></i>
						<span>Trang chủ</span>
					</a>
				</li>
                <li class="{{ request()->segment(2) === 'category' ? 'active' : '' }}">
					<a href="{{ route('admin.category.index') }}">
						<i class="fa fa-copyright"></i>
						<span>Danh mục</span>
					</a>
				</li>
                <li class="{{ request()->segment(2) === 'project' ? 'active' : '' }}">
					<a href="{{ route('admin.project.index') }}">
						<i class="fe-package"></i>
						<span>Dự án</span>
					</a>
				</li>
                <li class="{{ request()->segment(2) === 'blog' ? 'active' : '' }}">
					<a href="{{ route('admin.blog.index') }}">
						<i class="fa fa-newspaper"></i>
						<span>Tin tức</span>
					</a>
				</li>
                <li class="{{ request()->segment(2) === 'member' ? 'active' : '' }}">
					<a href="{{ route('admin.member.index') }}">
						<i class="fa fa-user"></i>
						<span>Thành viên</span>
					</a>
				</li>
                <li class="{{ request()->segment(2) === 'role' ? 'active' : '' }}">
					<a href="{{ route('admin.role.index') }}">
						<i class="fa fa-key"></i>
						<span>Vai trò</span>
					</a>
				</li>
                <li class="{{ request()->segment(2) === 'permission' ? 'active' : '' }}">
					<a href="{{ route('admin.permission.index') }}">
						<i class="fa fa-user-secret"></i>
						<span>Quyền hạn</span>
					</a>
				</li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->