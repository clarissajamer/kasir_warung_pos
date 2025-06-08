<style>
  /* Sidebar fixed width */
  .sidebar {
    width: 16rem; /* sama dengan w-64 (64 * 0.25rem) */
    background-color: white; /* sesuaikan kalau mau dark mode */
    border-radius: 1.5rem; /* rounded-2xl */
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05); /* shadow-xl */
    padding: 1rem; /* p-4 */
    margin: 1.5rem; /* kasih jarak dari semua sisi (24px) */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  /* Background warna container */
  body, .main-container {
    background-color:rgba(255, 255, 255, 0); /* bg-gray-100 */
    min-height: 100vh;
    display: flex;
  }

  /* Konten utama fleksibel */
  .main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  main {
    padding: 1.5rem; /* p-6 */
  }
</style>

<div class="main-container">
  <aside class="sidebar">
    <!-- Logo -->
    <div>
      <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:2rem;padding-left:0.5rem;">
        <img src="{{ asset('assets/logo.png') }}" alt="Logo" style="height:2rem;width:auto;">
        <h1 style="font-size:1.125rem; font-weight:600; color:#1f2937;">Aplikasi kasir karin</h1>
      </div>

      <!-- Navigasi -->
      <nav style="display:flex; flex-direction: column; gap:0.5rem;">
        @php
          $links = [];
          if (Auth::user()->role === 'admin') {
            $links = [
              ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊'],
              ['route' => 'user.index', 'label' => 'User', 'icon' => '👤'],
              ['route' => 'produk.index', 'label' => 'Produk', 'icon' => '📦'],
              ['route' => 'stok.index', 'label' => 'Stok', 'icon' => '📈'],
            ];
          } elseif (Auth::user()->role === 'petugas') {
            $links = [
              ['route' => 'produk.index', 'label' => 'Produk', 'icon' => '📦'],
              ['route' => 'stok.index', 'label' => 'Stok', 'icon' => '📈'],
              ['route' => 'pembelian.index', 'label' => 'Pembelian', 'icon' => '🛒'],
            ];
          }
        @endphp

        @foreach ($links as $link)
          <a href="{{ route($link['route']) }}" 
             style="
              display:flex; align-items:center; gap:0.5rem;
              padding:0.5rem 1rem; 
              border-radius:0.75rem;
              color:#374151;
              text-decoration:none;
              font-weight: {{ request()->routeIs($link['route'].'*') ? '600' : '400' }};
              background-color: {{ request()->routeIs($link['route'].'*') ? '#e5e7eb' : 'transparent' }};
             "
          >
            <span>{{ $link['icon'] }}</span>
            <span>{{ __($link['label']) }}</span>
          </a>
        @endforeach
      </nav>
    </div>

  </aside>

 
    <main>
      @yield('content')
    </main>
  
</div>
