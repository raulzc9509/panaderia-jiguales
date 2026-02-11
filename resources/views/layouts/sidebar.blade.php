<aside class="w-64 min-h-screen bg-jig-sidebar text-white flex flex-col">
    <div class="p-6 flex items-center gap-3">
    <img
        src="{{ asset('img/logo2.png') }}"
        alt="Panadería Jiguales"
        class="h-10 w-auto"
    >
    <div class="leading-tight">
        <div class="font-semibold">Panadería</div>
        <div class="font-semibold">Jiguales</div>
    </div>
</div>


    <nav class="px-4 space-y-2 flex-1">
        @php
            $linkBase = "flex items-center gap-3 px-4 py-3 rounded-xl transition";
            $linkIdle = "text-white/80 hover:text-white hover:bg-white/10";
            $linkActive = "bg-jig-accent text-white shadow";
        @endphp

        <a href="{{ route('dashboard') }}"
           class="{{ $linkBase }} {{ request()->routeIs('dashboard') ? $linkActive : $linkIdle }}">
            <span>Panel</span>
        </a>

        @if(auth()->user()?->role === 'ADMIN')
        <a href="{{ route('productos.index') }}"
           class="{{ $linkBase }} {{ request()->routeIs('productos.*') ? $linkActive : $linkIdle }}">
            <span>Productos</span>
        </a>
        @endif

        <a href="{{ route('inventario.index') }}"
           class="{{ $linkBase }} {{ request()->routeIs('inventario.*') ? $linkActive : $linkIdle }}">
            <span>Inventario</span>
        </a>

        <a href="{{ route('stock.bajo') }}"
           class="{{ $linkBase }} {{ request()->routeIs('stock.bajo') ? $linkActive : $linkIdle }}">
            <span>Bajo stock</span>
        </a>

        <div class="pt-4 text-white/60 text-xs px-4">Reportes (pendiente)</div>
        <a href="#" class="{{ $linkBase }} {{ $linkIdle }} opacity-50 pointer-events-none">
            <span>Reportes</span>
        </a>
    </nav>

    <div class="p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full bg-jig-accent hover:opacity-90 text-white px-4 py-3 rounded-xl">
                Logout
            </button>
        </form>
    </div>
</aside>
