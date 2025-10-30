
            <!-- <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                <span class="badge rounded-pill bg-danger ms-auto">5</span>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="index.html" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Analytics</div>
                  </a>
                </li>
              </ul>
            </li> -->

            <!-- Dashboard Route -->
             <li class="menu-item {{ request()->routeIs('dashboard') ? 'active open':'' }}">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
              </a>
            </li>

            <!-- Category Route -->
               <li class="menu-item {{ request()->routeIs('category.index') ? 'active open':'' }}">
              <a href="{{ route('category.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Category</div>
              </a>
            </li>

            <!-- Product Route -->
             <li class="menu-item {{ request()->routeIs('product.*') ? 'active open':'' }}">
              <a href="{{ route('category.index') }}" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Products</div>
              </a>
               <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('product.create') ? 'active':'' }}">
                  <a href="{{ route('product.create') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Add Product</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->routeIs('product.index') ? 'active':'' }}">
                  <a href="{{ route('product.index') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Product Lists</div>
                  </a>
                </li>
              </ul>
            </li>

              <li class="menu-item">
              <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Banners</div>
              </a>
            </li>


              <!-- Order Route -->
             <li class="menu-item {{ request()->routeIs('order.*') ? 'active open':'' }}">
              <a href="{{ route('category.index') }}" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Orders</div>
              </a>
               <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('order.index') ? 'active':'' }}">
                  <a href="{{ route('order.index') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">All Orders</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->routeIs('order.pending') ? 'active':'' }}">
                  <a href="{{ route('order.pending') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Pending</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->routeIs('order.confirm') ? 'active':'' }}">
                  <a href="{{ route('order.confirm') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Confirmed</div>
                  </a>
                </li>
                 <li class="menu-item {{ request()->routeIs('order.deliver') ? 'active':'' }}">
                  <a href="{{ route('order.deliver') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Deliverd</div>
                  </a>
                </li>
                 <li class="menu-item {{ request()->routeIs('order.complete') ? 'active':'' }}">
                  <a href="{{ route('order.complete') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Complete</div>
                  </a>
                </li>
              </ul>
            </li>

             <!-- Product Route -->
             <li class="menu-item {{ request()->routeIs('customer.*') ? 'active open':'' }}">
              <a href="{{ route('customer.list') }}" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Customers</div>
              </a>
               <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('customer.list') ? 'active':'' }}">
                  <a href="{{ route('customer.list') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Customer Lists</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Product Route -->
             <li class="menu-item {{ request()->routeIs('admin.*') ? 'active open':'' }}">
              <a href="{{ route('admin.list') }}" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Admin</div>
              </a>
               <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.list') ? 'active':'' }}">
                  <a href="{{ route('admin.list') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Admin Lists</div>
                  </a>
                </li>
              </ul>
            </li>


             <!-- Product Route -->
             <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Marketing Tools</div>
              </a>
               <ul class="menu-sub">
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Tag Manager</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Facebook pixels</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Visitor Reports</div>
                  </a>
                </li>
              </ul>
            </li>


              <!-- Product Route -->
             <li class="menu-item active open">
              <a href="{{ route('chace') }}" class="menu-link">
                <div class="text-truncate ms-3" data-i18n="Dashboards">Cache Clear</div>
              </a>
            </li>