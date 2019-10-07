<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="dashboard">
            <img src="{{asset('images/icon/logo.png')}}" alt="Cool Admin" />
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
            </ul>
        </nav>
    </div>
</aside>