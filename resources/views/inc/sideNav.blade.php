<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{{Request::is('dashboard') ? 'active' : ''}}}">
                    <a href="/dashboard">
                        <i class="fas fa-chart-bar"></i>Dashboard</a>
                </li>
                <li class="{{{Request::is('expenses') ? 'active' : ''}}} has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Expense</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/expensestype/create">Add Expense Category</a>
                        </li>
                        <li>
                            <a href="/expensestype">Manage Expense Category</a>
                        </li>
                        <li>
                            <a href="/expenses/create">Add Expense</a>
                        </li>
                        <li>
                            <a href="/expenses">Manage Expense</a>
                        </li>
                    </ul>
                </li>
                <li class="{{{Request::is('employees') ? 'active' : ''}}} has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-users"></i>Employees</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/employees/create">Add Employee</a>
                        </li>
                        <li>
                            <a href="/employees">Manage Employee</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/loan">
                        <i class="fas fa-dollar"></i>Loan</a>
                </li>
                @if (Auth::user()->role !== 'user')

                <li>
                        <a href="/users">
                            <i class="fas fa-users"></i>Users</a>
                    </li>
                @endif
                
                <li>
                    <a href="/setting">
                        <i class="fas fa-cogs"></i>Setting</a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="fas fa-table"></i>Tables</a>
                </li>
                <li>
                    <a href="form.html">
                        <i class="far fa-check-square"></i>Forms</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                </li>
                <li>
                    <a href="map.html">
                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>UI Elements</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="button.html">Button</a>
                        </li>
                        <li>
                            <a href="badge.html">Badges</a>
                        </li>
                        <li>
                            <a href="tab.html">Tabs</a>
                        </li>
                        <li>
                            <a href="card.html">Cards</a>
                        </li>
                        <li>
                            <a href="alert.html">Alerts</a>
                        </li>
                        <li>
                            <a href="progress-bar.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="modal.html">Modals</a>
                        </li>
                        <li>
                            <a href="switch.html">Switchs</a>
                        </li>
                        <li>
                            <a href="grid.html">Grids</a>
                        </li>
                        <li>
                            <a href="fontawesome.html">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="typo.html">Typography</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>