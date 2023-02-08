  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item">
                      <a href="{{ route('dashboard') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('all.messages') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Contact Us
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Projects
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('projects.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List Projects</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('projects.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>create Projects</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Settings
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('social.setting') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Social settings</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('website.setting') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Site Settings</p>
                              </a>
                          </li>

                      </ul>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Main services
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('mains.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List all Services</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('mains.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>add Main service</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tree"></i>
                          <p>
                              About Us
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('abouts.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List all Abouts</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('abouts.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>add About Us section</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                              Galley
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('galleries.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List all Galleries</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('galleries.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>add Gallery</p>
                              </a>
                          </li>

                      </ul>
                  </li>



              </ul>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
