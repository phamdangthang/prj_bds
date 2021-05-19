<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('modules/admin/images/icon/logo.png') }}" alt="Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">Dashboard 4</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->segment(2) === 'category' ? 'active' : '' }}">
					<a href="{{ route('admin.category.index') }}">
						<i class="fa fa-copyright"></i>
						<span>Danh mục</span>
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
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->