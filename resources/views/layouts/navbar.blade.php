<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">MAS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'pages.home' ? 'active' : '' }}" aria-current="page" href="{{ route('pages.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'pages.doc' ? 'active' : '' }}" href="{{ route('pages.doc') }}">Doctors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'pages.schedules' ? 'active' : '' }}" href="{{ route('pages.schedules') }}">Schedules</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'pages.contact' ? 'active' : '' }}" href="{{ route('pages.contact') }}">Contact</a>
          </li>
        </ul>
        @auth
            
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">My Appointments</a></li>
              <li><a class="dropdown-item" href="#">My Bookings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="dropdown-item" type="submit">Log Out</button>
              </form>
            </li>
            </ul>
        </div>
        @else
        <div class="nav-item">
            <a class="btn btn-outline-primary" href="/login">Log In</a>
        </div>
        @endauth

      </div>
    </div>
  </nav>
