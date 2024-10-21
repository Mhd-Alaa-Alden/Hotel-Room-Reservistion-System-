 <nav id="sidebar" class="sidebar js-sidebar">
     <div class="sidebar-content js-simplebar">
         <a class="sidebar-brand" href="{{ route('home') }}">
             <span class="align-middle">Admin Dashboard</span>
         </a>

         <ul class="sidebar-nav">

             <li class="sidebar-item">
                 <a class="sidebar-link" href="{{ route('rooms.index') }}">
                     <i class="align-middle" data-feather="inbox"></i> <span class="align-middle">Rooms</span>
                 </a>
             </li>

             <li class="sidebar-item">
                 <a class="sidebar-link" href="{{ route('book.index') }}">
                     <i class="align-middle" data-feather="book"></i> <span class="align-middle">Reversations</span>
                 </a>
             </li>


         </ul>

     </div>
 </nav>
