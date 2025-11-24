<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Akademik - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body { overflow-x: hidden; background-color: #f8f9fa; }
        #wrapper { display: flex; width: 100%; align-items: stretch; }
        #sidebar-wrapper { min-width: 250px; max-width: 250px; background-color: #343a40; color: #fff; transition: all 0.3s; min-height: 100vh;}
        #sidebar-wrapper .sidebar-heading { padding: 1.5rem; font-size: 1.2rem; text-align: center; border-bottom: 1px solid #4b545c; }
        #sidebar-wrapper .list-group-item { padding: 1rem; background-color: #343a40; color: #cfd8dc; border: none; }
        #sidebar-wrapper .list-group-item:hover { background-color: #495057; color: #fff; text-decoration: none; }
        #sidebar-wrapper .list-group-item.active { background-color: #007bff; color: #fff; }
        #sidebar-wrapper .list-group-item i { margin-right: 10px; }
        
        #page-content-wrapper { width: 100%; }
        
        .navbar-custom { background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,.08); padding: 0.8rem 1rem; }
        .profile-img { width: 35px; height: 35px; border-radius: 50%; background-color: #ccc; display: inline-block; object-fit: cover; }
        
        #wrapper.toggled #sidebar-wrapper { margin-left: -250px; }
    </style>
</head>
<body>

    <div class="d-flex" id="wrapper">
        <div id="sidebar-wrapper">
            <div class="sidebar-heading fw-bold">SI AKADEMIK</div>
            <div class="list-group list-group-flush mt-3">
                <a href="/dashboard" class="list-group-item list-group-item-action {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                
                {{-- MENU ADMIN --}}
                @if(Auth::user()->role == 'Admin')
                    <a href="/dosen" class="list-group-item list-group-item-action {{ request()->is('dosen*') ? 'active' : '' }}">
                        <i class="bi bi-person-video3"></i> Dosen
                    </a>
                    <a href="/mahasiswa" class="list-group-item list-group-item-action {{ request()->is('mahasiswa*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i> Mahasiswa
                    </a>
                    <a href="/prodi" class="list-group-item list-group-item-action {{ request()->is('prodi*') ? 'active' : '' }}">
                        <i class="bi bi-building"></i> Prodi
                    </a>
                    <a href="/matakuliah" class="list-group-item list-group-item-action {{ request()->is('matakuliah*') ? 'active' : '' }}">
                        <i class="bi bi-book-half"></i> Mata Kuliah
                    </a>
                    <a href="/nilai" class="list-group-item list-group-item-action {{ request()->is('nilai*') ? 'active' : '' }}">
                        <i class="bi bi-clipboard-data"></i> Nilai
                    </a>

                {{-- MENU DOSEN --}}
                @elseif(Auth::user()->role == 'Dosen')
                    {{-- Dosen tidak ada menu Dosen & Prodi (sesuai request: Mahasiswa, MK, Nilai) --}}
                    <a href="/mahasiswa" class="list-group-item list-group-item-action {{ request()->is('mahasiswa*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i> Mahasiswa
                    </a>
                    <a href="/matakuliah" class="list-group-item list-group-item-action {{ request()->is('matakuliah*') ? 'active' : '' }}">
                        <i class="bi bi-book-half"></i> Mata Kuliah
                    </a>
                    <a href="/nilai" class="list-group-item list-group-item-action {{ request()->is('nilai*') ? 'active' : '' }}">
                        <i class="bi bi-clipboard-data"></i> Nilai
                    </a>

                {{-- MENU MAHASISWA --}}
                @elseif(Auth::user()->role == 'Mahasiswa')
                    <a href="/mahasiswa" class="list-group-item list-group-item-action {{ request()->is('mahasiswa*') ? 'active' : '' }}">
                        <i class="bi bi-person-circle"></i> Biodata Saya
                    </a>
                    <a href="/nilai" class="list-group-item list-group-item-action {{ request()->is('nilai*') ? 'active' : '' }}">
                        <i class="bi bi-clipboard-data"></i> Nilai Saya
                    </a>
                @endif
                
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-light me-3" id="menu-toggle"><i class="bi bi-list fs-4"></i></button>
                        {{-- Search --}}
                        <form class="d-none d-md-flex input-group input-group-sm" style="width: 200px;">
                            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                            <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                        </form>
                    </div>

                    <div class="d-flex align-items-center gap-3">

                        {{-- Notif --}}
                        <a href="#" class="text-secondary position-relative">
                            <i class="bi bi-bell fs-5"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1"><span class="visually-hidden">unread</span></span>
                        </a>

                        {{-- Profile --}}
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff" alt="mdo" class="profile-img me-2">
                                <span class="d-none d-md-block text-dark small fw-bold">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="/logout">Logout</a></li>
                            </ul>
                        </div>
                        <a href="#" class="text-secondary"><i class="bi bi-three-dots-vertical fs-5"></i></a>
                    </div>
                </div>
            </nav>

            <div class="container-fluid p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");
        toggleButton.onclick = function () { el.classList.toggle("toggled"); };
    </script>
</body>
</html>