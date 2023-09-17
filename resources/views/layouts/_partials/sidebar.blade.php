<div class="sidebar-wrapper">
   <div>
      <div class="logo-wrapper">
         <a href="index.html"><img class="img-fluid for-light" src="{{ asset('') }}assets/images/logo/small-logo.png" alt=""><img class="img-fluid for-dark" src="{{ asset('') }}assets/images/logo/small-white-logo.png" alt=""></a>
         <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('') }}assets/images/logo-icon.png" alt=""></a></div>
      <nav class="sidebar-main">
         <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
         <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
               <li class="back-btn">
                  <a href="index.html"><img class="img-fluid" src="{{ asset('') }}assets/images/logo-icon.png" alt=""></a>
                  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true">        </i></div>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav" href="{{ url('dashboard') }}">
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                           <g>
                              <path d="M7.30566 14.5743H16.8987" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 7.79836C2.5 5.35646 3.75 3.25932 6.122 2.77265C8.493 2.28503 10.295 2.4536 11.792 3.26122C13.29 4.06884 12.861 5.26122 14.4 6.13646C15.94 7.01265 18.417 5.69646 20.035 7.44217C21.729 9.26979 21.72 12.0755 21.72 13.8641C21.72 20.6603 17.913 21.1993 12.11 21.1993C6.307 21.1993 2.5 20.7288 2.5 13.8641V7.79836Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </g>
                        </g>
                     </svg>
                     <span>Dashboard</span>
                  </a>
               </li>
               @role('Admin')
               <li class="sidebar-list">
                  <label class="badge badge-light-primary"></label>
                  <a class="sidebar-link sidebar-title" href="#">
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                           <g>
                              <path d="M9.07861 16.1355H14.8936" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.3999 13.713C2.3999 8.082 3.0139 8.475 6.3189 5.41C7.7649 4.246 10.0149 2 11.9579 2C13.8999 2 16.1949 4.235 17.6539 5.41C20.9589 8.475 21.5719 8.082 21.5719 13.713C21.5719 22 19.6129 22 11.9859 22C4.3589 22 2.3999 22 2.3999 13.713Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </g>
                        </g>
                     </svg>
                     <span>Master Data</span>
                  </a>
                  <ul class="sidebar-submenu">
                     <li><a href="{{ url('admin/pengguna') }}">Pengguna</a></li>
                     <li><a href="{{ url('admin/dokumen-kewajiban') }}">Dokumen Kewajiban</a></li>
                     <li><a href="{{ url('admin/tahun') }}">Tahun</a></li>
                     {{-- <li><a href="crypto-dashboard.html">Crypto</a></li> --}}
                  </ul>
               </li>
               @endrole

               @role('User')
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav" href="{{ url('user/permohonan-dokumen') }}" >
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                           <g>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1601 8.3L14.4901 2.9C13.7601 2.8 12.9401 2.75 12.0401 2.75C5.75015 2.75 3.65015 5.07 3.65015 12C3.65015 18.94 5.75015 21.25 12.0401 21.25C18.3401 21.25 20.4401 18.94 20.4401 12C20.4401 10.58 20.3501 9.35 20.1601 8.3Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M13.9341 2.83276V5.49376C13.9341 7.35176 15.4401 8.85676 17.2981 8.85676H20.2491" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M14.3125 12.9807H9.41248" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M11.8633 15.4308V10.5308" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </g>
                        </g>
                     </svg>
                     <span>Permohonan Dokumen</span>
                  </a>
               </li>
               @endrole
               @role('Verificator')
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav" href="{{ url('verifikator/permohonan-dokumen') }}" >
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                           <g>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1601 8.3L14.4901 2.9C13.7601 2.8 12.9401 2.75 12.0401 2.75C5.75015 2.75 3.65015 5.07 3.65015 12C3.65015 18.94 5.75015 21.25 12.0401 21.25C18.3401 21.25 20.4401 18.94 20.4401 12C20.4401 10.58 20.3501 9.35 20.1601 8.3Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M13.9341 2.83276V5.49376C13.9341 7.35176 15.4401 8.85676 17.2981 8.85676H20.2491" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M14.3125 12.9807H9.41248" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M11.8633 15.4308V10.5308" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </g>
                        </g>
                     </svg>
                     <span>Permohonan Dokumen</span>
                  </a>
               </li>
               @endrole
               @role('Hso')
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav" href="{{ url('hso/permohonan-dokumen') }}" >
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                           <g>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1601 8.3L14.4901 2.9C13.7601 2.8 12.9401 2.75 12.0401 2.75C5.75015 2.75 3.65015 5.07 3.65015 12C3.65015 18.94 5.75015 21.25 12.0401 21.25C18.3401 21.25 20.4401 18.94 20.4401 12C20.4401 10.58 20.3501 9.35 20.1601 8.3Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M13.9341 2.83276V5.49376C13.9341 7.35176 15.4401 8.85676 17.2981 8.85676H20.2491" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M14.3125 12.9807H9.41248" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M11.8633 15.4308V10.5308" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </g>
                        </g>
                     </svg>
                     <span>Permohonan Dokumen</span>
                  </a>
               </li>
               @endrole
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav" href="#" target="_blank">
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                           <g>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1601 8.3L14.4901 2.9C13.7601 2.8 12.9401 2.75 12.0401 2.75C5.75015 2.75 3.65015 5.07 3.65015 12C3.65015 18.94 5.75015 21.25 12.0401 21.25C18.3401 21.25 20.4401 18.94 20.4401 12C20.4401 10.58 20.3501 9.35 20.1601 8.3Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M13.9341 2.83276V5.49376C13.9341 7.35176 15.4401 8.85676 17.2981 8.85676H20.2491" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M14.3125 12.9807H9.41248" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M11.8633 15.4308V10.5308" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </g>
                        </g>
                     </svg>
                     <span>Profil</span>
                  </a>
               </li>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
               </form>

               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav" href="javascript:void" onclick="$('#logout-form').submit();">
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <g>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1601 8.3L14.4901 2.9C13.7601 2.8 12.9401 2.75 12.0401 2.75C5.75015 2.75 3.65015 5.07 3.65015 12C3.65015 18.94 5.75015 21.25 12.0401 21.25C18.3401 21.25 20.4401 18.94 20.4401 12C20.4401 10.58 20.3501 9.35 20.1601 8.3Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M13.9341 2.83276V5.49376C13.9341 7.35176 15.4401 8.85676 17.2981 8.85676H20.2491" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M14.3125 12.9807H9.41248" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M11.8633 15.4308V10.5308" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </g>
                     </svg>
                     <span>Logout</span>
                  </a>
               </li>
            </ul>
            <div class="sidebar-img-section">
               <div class="sidebar-img-content">
                  <img class="img-fluid" src="{{ asset('') }}assets/images/side-bar.png" alt="">
                  <h4>Need Help ?</h4>
                  <a class="txt" href="https://pixelstrap.freshdesk.com/support/home">Raise ticket at "support@pixelstrap.com"</a><a class="btn btn-secondary" href="https://themeforest.net/user/pixelstrap/portfolio">Buy Now</a>
               </div>
            </div>
         </div>
         <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
   </div>
</div>