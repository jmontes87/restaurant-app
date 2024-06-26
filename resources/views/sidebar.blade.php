  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <span class="brand-text font-weight-light">Restaurant App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Montes Jose Manuel</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">FOODS</li>
          <li class="nav-item">
            <a href="{{ route('food.index') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Foods
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('ingredient.index') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Ingredients
              </p>
            </a>
          </li>
          <li class="nav-header">LISTS</li>
          <li class="nav-item">
            <a href="{{ route('price_list.index') }}"  class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Price lists</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>