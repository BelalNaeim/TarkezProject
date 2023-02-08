 @php
     $websitesetting = DB::table('websitesettings')->first();
     $social = DB::table('socials')->first();
 @endphp
 <footer>
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-lg-6">
                 <div class="logo-img">
                     <p>{{ $websitesetting->address_en }}</p>
                     <img src="{{ $websitesetting->logo }}" alt="">
                 </div>
                 <div class="social-icon">
                     <ul>
                         <li>
                             <a href="{{ $social->youtube }}"><i class="fa-brands fa-youtube"></i></a>
                         </li>
                         <li>
                             <a href="{{ $social->snapchat }}"><i class="fa-brands fa-snapchat"></i></a>
                         </li>
                         <li>
                             <a href="{{ $social->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                         </li>
                         <li>
                             <a href="{{ $social->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                         </li>
                         <li>
                             <a href="{{ $social->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                         </li>

                     </ul>
                 </div>
                 <div class="msin-links">
                     <ul class="main-menu">
                         <li><a href="">الرئيسيه</a></li>
                         <li><a href="about-us.html">من نحن</a></li>
                         <li><a href="projects.html">المشاريع</a></li>
                         <li><a href="">الصور</a></li>
                         <li><a href="contactus.html">اتصل بنا</a></li>
                     </ul>
                 </div>

             </div>
         </div>
     </div>
     <div class="sub-footer text-center">
         <p> الحقوق محفوظه | {{ $websitesetting->address_ar }} </p>
     </div>
 </footer>
