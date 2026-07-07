<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle"></i> 
                {{ Auth::user()->nama ?? 'Guest' }}
                <span class="badge badge-info ml-1">
                    {{ Auth::user()->level->level_nama ?? 'Pengguna' }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <span class="dropdown-item text-muted">
                    <i class="fas fa-id-badge"></i> 
                    Role: {{ Auth::user()->level->level_nama ?? '-' }}
                </span>
                <span class="dropdown-item text-muted">
                    <i class="fas fa-user"></i> 
                    {{ Auth::user()->nama ?? '-' }}
                </span>
                <div class="dropdown-divider"></div>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>