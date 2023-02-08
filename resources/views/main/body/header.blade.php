 @php
     $websitesetting = DB::table('websitesettings')->first();
 @endphp
 <nav>
     <div class="container">
         <div class="row justify-content-between">

             <div class="col-lg-2 col-6">
                 <div class="d-flex">
                     <div class="d-lg-none menu-icon" onclick="openNav()">
                         <div class="line line-1"></div>
                         <div class="line line-2"></div>
                         <div class="line line-3"></div>
                     </div>
                     <div class="logo">
                         <img src="{{ $websitesetting->logo }}" alt="" style="height:50px">
                     </div>
                 </div>

             </div>

             <div class="col-7 menu">

                 <ul class="main-menu">
                     <li><a href="{{ route('home') }}">
                             الرئيسيه
                         </a></li>
                     <li><a href="{{ route('about-us') }}">
                             من نحن</a></li>
                     <li><a href="{{ route('projects') }}">المشاريع</a></li>
                     <li><a href="{{ route('gallery') }}">الصور</a></li>
                     <li><a href="{{ route('contact.page') }}"> اتصل بنا </a></li>
                 </ul>
             </div>
             <div class="col-3">
                 <div class="icons">
                     <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                     <a href=""><i class="fa-solid fa-user"></i></a>
                 </div>
             </div>
         </div>
     </div>
 </nav>
