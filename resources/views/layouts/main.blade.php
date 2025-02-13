    @include('partials.head')
    @include('partials.navbar')
    <div id="layoutSidenav">
        @include('partials.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('container')
                </div>
            </main>
            @include('partials.copyright')
        </div>
    </div>
