<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            @if (Auth::user()->role_id == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                        href="/dashboard">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('books', 'create-book', 'edit-book/{slug}', 'deleted-book', 'delete-book/{slug}') ? 'active' : '' }}"
                        href="/books">
                        <span data-feather="book"></span>
                        Books
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('categories', 'create-category', 'edit-category/{slug}', 'delete-category/{slug}', 'deleted-category') ? 'active' : '' }}"
                        href="/categories"<span data-feather="grid"></span>
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="/users">
                        <span data-feather="users"></span>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('rentlogs') ? 'active' : '' }}" href="/rentlogs">
                        <span data-feather="file-text"></span>
                        Rent Log
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="/profile">
                        <span data-feather="users"></span>
                        Profile
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
