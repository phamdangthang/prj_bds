<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ route('home') }}" target="_blank">
            <img src="{{ asset('modules/admin/images/icon/logo.png') }}" alt="Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list font-weight-bold">
                {{-- <li class="{{ request()->segment(2) === 'dashboard' ? 'active' : '' }}">
					<a href="{{ route('admin.dashboard') }}">
						<i class="fas fa-tachometer-alt"></i>
						<span>Trang chủ</span>
					</a>
				</li> --}}
				@if(auth('admin')->user()->can('category_manager'))
				<li class="{{ request()->segment(2) === 'category' ? 'active' : '' }}">
					<a class="font-size-menu-admin" href="{{ route('admin.category.index') }}">
						<i class="fa fa-copyright"></i>
						<span>Danh mục</span>
					</a>
				</li>
				@endif
				@if(auth('admin')->user()->can('project_manager'))
				<li class="{{ request()->segment(2) === 'project' ? 'active' : '' }}">
					<a class="font-size-menu-admin" href="{{ route('admin.project.index') }}">
						<i class="fe-package"></i>
						<span>Dự án</span>
					</a>
				</li>
				@endif
				@if(auth('admin')->user()->can('contract_manager'))
				<li class="{{ request()->segment(2) === 'contract' ? 'active' : '' }}">
					<a class="font-size-menu-admin" href="{{ route('admin.contract.index') }}">
						<i class="fa fa-file-contract"></i>
						<span>Hợp đồng</span>
					</a>
				</li>
				@endif
				@if(auth('admin')->user()->can('transaction_manager'))
				<li class="{{ request()->segment(2) === 'transaction' ? 'active' : '' }}">
					<a class="font-size-menu-admin" href="{{ route('admin.transaction.index') }}">
						<i class="fe-truck"></i>
						<span>Giao dịch</span>
					</a>
				</li>
				@endif
				@if(auth('admin')->user()->can('statistic_manager'))
				{{-- <li class="{{ request()->segment(2) === 'statistic' ? 'active' : '' }}">
					<a class="font-size-menu-admin" href="{{ route('admin.statistic.index') }}">
						<i class="fa fa-chart-bar"></i>
						<span>Thống kê</span>
					</a>
				</li> --}}
				<li class="has-sub {{ request()->segment(2) === 'statistic' ? 'active' : '' }}">
					<a class="js-arrow" href="#">
						<i class="fa fa-chart-bar"></i>Thống kê</a>
						<ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
							<li>
								<a class="font-size-menu-admin" href="{{ route('admin.statistic.index') }}">
									<i class="fa fa-chart-bar"></i>
									<span>Doanh thu nhân viên</span>
								</a>
							</li>
							<li>
								<a class="font-size-menu-admin" href="{{ route('admin.statistic.category') }}">
									<i class="fa fa-chart-bar"></i>
									<span>Thống kê danh mục dự án</span>
								</a>
							</li>
							<li>
								<a class="font-size-menu-admin" href="{{ route('admin.statistic.overdue-contract') }}">
									<i class="fa fa-chart-bar"></i>
									<span>Thống kê hợp đồng quá hạn</span>
								</a>
							</li>
						</ul>
					</li>
				@endif
				@if(auth('admin')->user()->can('news_manager'))
				<li class="{{ request()->segment(2) === 'blog' ? 'active' : '' }}">
					<a class="font-size-menu-admin" href="{{ route('admin.blog.index') }}">
						<i class="fa fa-newspaper"></i>
						<span>Tin tức</span>
					</a>
				</li>
				@endif
				@if(auth('admin')->user()->can('staff_manager'))
				<li class="{{ request()->segment(2) === 'customer' ? 'active' : '' }}">
					<a class="font-size-menu-admin" href="{{ route('admin.customer.index') }}">
						<i class="fa fa-users"></i>
						<span>Khách hàng</span>
					</a>
				</li>
				<li class="{{ request()->segment(2) === 'member' ? 'active' : '' }}">
					<a class="font-size-menu-admin" href="{{ route('admin.member.index') }}">
						<i class="fa fa-user"></i>
						<span>Nhân viên</span>
					</a>
				</li>
				@endif
				@if(auth('admin')->user()->can('role_manager'))
				<li class="{{ request()->segment(2) === 'role' ? 'active' : '' }}">
					<a class="font-size-menu-admin" href="{{ route('admin.role.index') }}">
						<i class="fa fa-key"></i>
						<span>Phòng ban</span>
					</a>
				</li>
				@endif
				@if(auth('admin')->user()->can('permission_manager'))
				<li class="{{ request()->segment(2) === 'permission' ? 'active' : '' }}">
					<a class="font-size-menu-admin" href="{{ route('admin.permission.index') }}">
						<i class="fa fa-user-secret"></i>
						<span>Quyền hạn</span>
					</a>
				</li>
				@endif
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->