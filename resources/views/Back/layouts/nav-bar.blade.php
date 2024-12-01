 <nav class="topnav navbar navbar-light">
     <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
         <i class="fe fe-menu navbar-toggler-icon"></i>
     </button>
     <form class="form-inline mr-auto searchform text-muted">
         <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
             placeholder="Type something..." aria-label="Search">
     </form>
     <ul class="nav">
         <li class="nav-item">
             <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
                 <i class="fe fe-sun fe-16"></i>
             </a>
         </li>

         <li class="nav-item align-content-center dropdown mr-30 ml-2">
             <div class="dropdown  nav-itemd-none d-md-flex">
                 <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                     {!! LaravelLocalization::getCurrentLocaleNative() == 'English'
                         ? '<img src="' . asset('flags/GB.png') . '" alt="GB Flag">'
                         : '<img src="' . asset('flags/EG.png') . '" alt="YE Flag">' !!}
                     <span class="ml-1 dropdown-item" style="margin-top: -25px;"> {{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                     @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                         <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                             href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                             @if ($properties['native'] == 'English')
                                 <img src="{{ asset('flags/GB.png') }}" alt="">
                             @elseif($properties['native'] == 'العربية')
                                 <img src="{{ asset('flags/EG.png') }}" alt="">
                             @endif
                             {{ $properties['native'] }}
                         </a>
                     @endforeach
                 </div>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                 <span class="fe fe-grid fe-16"></span>
             </a>
         </li>
         <li class="nav-item nav-notif">
             <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                 <span class="fe fe-bell fe-16"></span>
                 <span class="dot dot-md bg-success"></span>
             </a>
         </li>
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                 role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="avatar avatar-sm mt-2">
                     <img src="{{ asset('back-assets') }}/assets/avatars/face-1.jpg" alt="..."
                         class="avatar-img rounded-circle">
                 </span>
             </a>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                 <a class="dropdown-item" href="#">Profile</a>
                 <a class="dropdown-item" href="#">Settings</a>
                 <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('form-logout').submit()" href="javascript;;">Log out</a>
                 <form action="{{ route('admin.logout') }}" method="post" id="form-logout">
                    @csrf
                 </form>
             </div>
         </li>



     </ul>
 </nav>
