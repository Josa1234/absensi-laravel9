<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3">
        <i class="fas fa-bars"></i>
    </button>

    <form class="d-none d-sm-inline-block form-inline me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </form>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mx-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </form>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle"
                    src="data:image/png;base64,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">
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Pengaturan
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Log Aktivitas
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>
</nav>
