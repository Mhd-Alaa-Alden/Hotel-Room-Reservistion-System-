 <nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-2 shadow-sm sticky-top navnav">
     <div class="container-fluid">
         <a class="navbar-brand fw-bold fs-3 h-font  me-5 " href="{{ route('home') }}">ANS Hotel</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                     <a class="nav-link active me-5" aria-current="page" href="{{ route('home') }}">Home</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link active me-5" aria-current="page" href="{{ route('rooms.index') }}">Rooms</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link active me-5" aria-current="page" href="{{ route('about') }}">About</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link active me-5" aria-current="page" href="{{ route('contact') }}">Contact Us</a>
                 </li>
             </ul>
             @if (Route::has('login'))
                 <div class="d-flex">
                     <div class="me-5 mt-2">
                         {{-- @include('room.search-results') --}}
                     </div>

                     <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                     @auth
                     <div class="navbar-collapse collapse">
                        <ul class="navbar-nav navbar-align">
                            
                                
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                    <i class="align-middle" data-feather="settings"></i>
                                </a>
              
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                    <img src="{{ asset('storage/uploadimg/' . Auth::user()->filename) }}"
                                        class="avatar img-fluid rounded me-1" alt="{{ Auth::user()->name }}" />
                                    <span class="text-dark">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
              
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="align-middle me-1"
                                            data-feather="settings"></i>Profile Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              
              
                                        {{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                     @else
                         <a class="btn btn-outline-primary me-2" type="submit"
                             href="{{ route('login') }}">{{ __('login') }}</a>
                         @if (Route::has('register'))
                             <a class="btn btn-outline-dark me-2" type="submit"
                                 href="{{ route('register') }}">{{ __('register') }}</a>
                         @endif
                     @endauth
                 </div>
             @endif

         </div>
     </div>

 </nav>
