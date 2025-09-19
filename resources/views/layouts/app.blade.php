<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'PayWiz')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { font-family: Inter, sans-serif; background:#f9fafc; }

   
    .sidebar {
      width:240px; height:100vh; background:#f5f8ff;
      border-right:1px solid #e5e9f2; position:fixed; top:0; left:0;
      padding:20px 16px; overflow-y:auto;
    }
    .brand { display:flex; align-items:center; gap:10px; font-weight:700; font-size:18px; margin-bottom:30px; color:#1762F2;}
    .brand-logo { width:34px;height:34px;border-radius:8px;background:#1762F2; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700;}

    .nav-item {
      display:flex; 
      align-items:center; 
      gap:8px; 
      font-size:14px; 
      font-weight:600; 
      padding:6px 12px; 
      border-radius:6px; 
      color:#344767; 
      cursor:pointer; 
      margin-bottom:4px;
      justify-content:flex-start;
    }
    .nav-item:hover { background:#eaf1ff; }
    .nav-item.active { background:#1762F2; color:#fff; }

    .submenu {
      margin-left:0;
      margin-top:2px;
      display:none; 
      flex-direction: column;
    }
    .submenu .nav-item { 
      font-weight:500; 
      font-size:13px; 
      color:#555; 
      padding:6px 12px; 
      margin-bottom:2px; 
      justify-content:flex-start;
    }
    .submenu .nav-item i { margin-right:8px; }
    .submenu .nav-item.active { background:#eaf1ff; color:#1762F2; }

    .logout { position:absolute; bottom:20px; left:16px; color:#e74c3c; font-weight:600; cursor:pointer; }

   
    .content { margin-left:240px; padding:20px 30px; }

    .page-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
    .search-box { width:250px; }
    .btn-add { background:#1762F2; color:#fff; }

    table thead th { font-size:13px; font-weight:600; color:#5f6b7d; background:#f1f4f9; border-bottom:0; }
    .table-empty { text-align:center; padding:60px 0; color:#95a0b8; }
    .table-empty i { font-size:48px; color:#1762F2; margin-bottom:8px; }

    .pagination { margin:16px; }
    .pagination .page-link { border:none; color:#1762F2; }
    .pagination .page-link:hover { background:#eaf1ff; border-radius:6px; }
  </style>
</head>
<body>
  <div class="sidebar">
    <div class="brand">
      <div class="brand-logo">W</div>
      PayWiz
    </div>

    <div>
      <!-- Master Data -->
      <div class="nav-item menu-toggle" data-target="masterDataSubmenu">
        <span style="display:flex; align-items:center; gap:6px;"><i class="bi bi-folder"></i> Master Data</span>
        <i class="bi bi-caret-down-fill toggle-icon"></i>
      </div>
      <div class="submenu" id="masterDataSubmenu">
        <div class="nav-item active"><i class="bi bi-people"></i> Pegawai</div>
        <div class="nav-item"><i class="bi bi-diagram-3"></i> Bagian</div>
        <div class="nav-item"><i class="bi bi-clock"></i> Shift</div>
        <div class="nav-item"><i class="bi bi-bank"></i> Bank</div>
      </div>

      
      <div class="nav-item menu-toggle" data-target="absensiSubmenu">
        <span style="display:flex; align-items:center; gap:6px;"><i class="bi bi-calendar-check"></i> Absensi</span>
        <i class="bi bi-caret-down-fill toggle-icon"></i>
      </div>
      <div class="submenu" id="absensiSubmenu">
        <div class="nav-item"><i class="bi bi-person-check"></i> Laporan Absensi</div>
      </div>

<div class="nav-item">
    <i class="bi bi-cash"></i> Uang Makan
</div>

<div class="nav-item">
    <i class="bi bi-credit-card"></i> Hutang
</div>
      <div class="nav-item menu-toggle" data-target="payrollSubmenu">
        <span style="display:flex; align-items:center; gap:6px;"><i class="bi bi-currency-dollar"></i> Payroll</span>
        <i class="bi bi-caret-down-fill toggle-icon"></i>
      </div>
      <div class="submenu" id="payrollSubmenu">
        <div class="nav-item"><i class="bi bi-receipt"></i> Laporan Payroll</div>
      </div>

      <div class="nav-item menu-toggle" data-target="settingSubmenu">
        <span style="display:flex; align-items:center; gap:6px;"><i class="bi bi-gear"></i> Setting</span>
        <i class="bi bi-caret-down-fill toggle-icon"></i>
      </div>
      <div class="submenu" id="settingSubmenu">
        <div class="nav-item"><i class="bi bi-sliders"></i> Pengaturan</div>
      </div>
    </div>

    <div class="logout"><i class="bi bi-box-arrow-right"></i> Logout</div>
  </div>

  <div class="content">
    <div class="page-header">
      <h4 class="mb-0">@yield('page-title', 'Master Data')</h4>
      <div class="d-flex gap-2">
        <div class="input-group search-box">
          <input type="text" class="form-control" placeholder="Cari data...">
          <button class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
        </div>
        <a href="{{ route('pegawai.create') }}" class="btn btn-add">+ Data Pegawai</a>
      </div>
    </div>

    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const toggles = document.querySelectorAll('.menu-toggle');
      toggles.forEach(toggle => {
        const targetId = toggle.dataset.target;
        const submenu = document.getElementById(targetId);
        const icon = toggle.querySelector('.toggle-icon');

        toggle.addEventListener('click', () => {
          if (submenu.style.display === 'flex') {
            submenu.style.display = 'none';
            icon.classList.remove('bi-caret-up-fill');
            icon.classList.add('bi-caret-down-fill');
          } else {
            submenu.style.display = 'flex';
            icon.classList.remove('bi-caret-down-fill');
            icon.classList.add('bi-caret-up-fill');
          }
        });
      });
    });
  </script>
</body>
</html>
