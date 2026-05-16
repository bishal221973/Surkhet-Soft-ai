 <aside class="app-sidebar  shadow" style="background-color: #789EC3" data-bs-theme="dark">
     <div class="" style="height: 100px">
         <a href="./index.html" class="brand-link">
             <img src="{{ asset('logo.jpg') }}" alt="AdminLTE Logo" class="" style="height: 100px" />
             {{-- <span class="brand-text fw-light">Surkhet Soft</span> --}}
         </a>
     </div>
     <div class="sidebar-wrapper">
         <nav class="mt-2">
             <!--begin::Sidebar Menu-->
             <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                 aria-label="Main navigation" data-accordion="false" id="navigation">

                 <li class="nav-item">
                     <a href="{{ route('home') }}"
                         class="nav-link {{ request()->route()->getName() == 'home' ? 'active' : '' }}">
                         <i class="nav-icon bi bi-speedometer"></i>
                         <p>Home</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('leading-brands.index') }}"
                         class="nav-link {{ request()->route()->getName() == 'leading-brands.index' ? 'active' : '' }}">
                         <i class="nav-icon bi bi-speedometer"></i>
                         <p>Leading Brands</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-box-seam-fill"></i>
                         <p>
                             Brandings
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('branding-services.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Brand Services</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('brand-category.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Categories</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('brand-portfolio.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Projects</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-box-seam-fill"></i>
                         <p>
                             Print and Design
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                        
                         <li class="nav-item">
                             <a href="{{ route('print-category.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Categories</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('print-design.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Projects</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-box-seam-fill"></i>
                         <p>
                             Development
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                        
                         <li class="nav-item">
                             <a href="{{ route('development-category.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Categories</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('developmentProject.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Projects</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-box-seam-fill"></i>
                         <p>
                             Content Production
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         
                         <li class="nav-item">
                             <a href="{{ route('content-category.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Categories</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('content-image.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Images</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('team.index') }}"
                         class="nav-link {{ request()->route()->getName() == 'team.index' ? 'active' : '' }}">
                         <i class="nav-icon bi bi-speedometer"></i>
                         <p>Teams</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-box-seam-fill"></i>
                         <p>
                             Marketing
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         
                         <li class="nav-item">
                             <a href="{{ route('marketting-category.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Categories</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('marketing.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Marketing</p>
                             </a>
                         </li>

                     </ul>
                 </li>

             </ul>
             <!--end::Sidebar Menu-->
         </nav>
     </div>
     <!--end::Sidebar Wrapper-->
 </aside>
