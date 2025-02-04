 <aside>
     <div class="sidenav position-sticky d-flex flex-column justify-content-between">
         <a class="navbar-brand" href="{{ route('blog.home') }}" class="logo">
             <img src="{{ asset('img/logo.png') }}" alt="Logo">
         </a>
         <div class="navbar navbar-dark my-4 p-0 font-primary">
             <ul class="navbar-nav w-100">
                 <li class="nav-item {{ request()->routeIs('blog.home') ? 'active' : '' }}">
                     <a class="nav-link text-white px-0 pt-0" href="{{ route('blog.home') }}">Accueil</a>
                 </li>
                 <li class="nav-item {{ request()->routeIs('blog.posts') ? 'active' : '' }}">
                     <a class="nav-link text-white px-0" href="{{ route('blog.posts') }}">Articles</a>
                 </li>
                 <li class="nav-item {{ request()->routeIs('blog.search') ? 'active' : '' }}">
                     <a class="nav-link text-white px-0" href="{{ route('blog.search') }}">Rechercher</a>
                 </li>
                 <li class="nav-item {{ request()->routeIs('blog.about') ? 'active' : '' }} ">
                     <a class="nav-link text-white px-0" href="{{ route('blog.about') }}">A Propos</a>
                 </li>
                 <li class="nav-item {{ request()->routeIs('blog.contact') ? 'active' : '' }}">
                     <a class="nav-link text-white px-0" href="{{ route('blog.contact') }}">Contact</a>
                 </li>
             </ul>
         </div>
         <ul class="list-inline ml-2">
             <x-social-links />
         </ul>


     </div>
 </aside>
