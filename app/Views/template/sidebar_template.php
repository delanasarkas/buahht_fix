<!-- <nav>
    <ul>
      <li><a href="/">Dashboard</a></li>
      <li><a href="/karyawan">Karyawan</a></li>
      <li><a href="/presensi">Presensi</a></li>
      <li><a href="/laporan">Laporan</a></li>
      <li>
        <a href="#">Settings</a>
        <ul>
          <li><a href="/settings/ip">IP Address</a></li>
        </ul>
      </li>
    </ul>
</nav> -->
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-heading">Menus</li>

    <li class="nav-item">
      <a class="nav-link <?= uri_string() == '/' ? null : 'collapsed' ?>" href="/">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link <?= uri_string() == 'karyawan' ? null : 'collapsed' ?>" href="/karyawan">
        <i class="bi bi-person"></i>
        <span>Karyawan</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= uri_string() == 'presensi' ? null : 'collapsed' ?>" href="/presensi">
        <i class="bi bi-calendar-range"></i>
        <span>Presensi</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= uri_string() == 'laporan' ? null : 'collapsed' ?>" href="/laporan">
        <i class="bi bi-file-bar-graph"></i>
        <span>Laporan</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?= uri_string() == 'settings' ? null : 'collapsed' ?>" data-bs-target="#settings" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="settings" class="nav-content collapse ">
        <li>
          <a href="/settings/ip">
            <i class="bi bi-circle"></i><span>IP Address</span>
          </a>
        </li>
      </ul>
    </li>

  </ul>

</aside><!-- End Sidebar-->