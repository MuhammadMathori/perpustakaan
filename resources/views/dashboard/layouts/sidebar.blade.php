<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            @if (Auth::user())
                @if (Auth::user()->role_id == 1)
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                            href="/dashboard">
                            <i class="bi bi-house"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('books', 'create-book', 'deleted-book', 'edit-book*', 'delete-book*') ? 'active' : '' }}"
                            href="/books">
                            <i class="bi bi-book"></i>
                            Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('categories', 'create-category', 'edit-category*', 'delete-category*', 'deleted-category') ? 'active' : '' }}"
                            href="/categories"<span data-feather="grid"></span>
                            <i class="bi bi-grid"></i>
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('users', 'user-registered', 'detail-user*', 'acc-user', 'ban-user*', 'destroy-user') ? 'active' : '' }}"
                            href="/users">
                            <i class="bi bi-people"></i>
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('rentLogs') ? 'active' : '' }}" href="/rentLogs">
                            <i class="bi bi-list-task"></i>
                            Rent Log
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('bookRent') ? 'active' : '' }}" href="/bookRent">
                            <i class="bi bi-journal-arrow-up"></i>
                            Book Rent
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('bookReturn') ? 'active' : '' }}" href="/bookReturn">
                            <i class="bi bi-journal-arrow-down"></i>
                            Book Return
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="/profile">
                            <i class="bi bi-person"></i>
                            Profile
                        </a>
                        <a class="nav-link {{ Request::is('book-list') ? 'active' : '' }}" href="/book-list">
                            <i class="bi bi-list-task"></i>
                            Book List
                        </a>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</nav>
