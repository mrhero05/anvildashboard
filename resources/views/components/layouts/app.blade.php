<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Anvil Awards Dashboard' }}</title>
        <!-- Favicon icon-->
        <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
        <!-- Core Css -->
        <link rel="stylesheet" href="{{ asset('spiketheme/assets/css/theme.css') }}" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css"> --}}
    </head>
    <body class=" bg-surface bg-prsp-blu2">
        <main>
            <!--start the project-->
            <div id="main-wrapper" class=" flex p-5 xl:pr-0">
                <livewire:layout.admin.sidebar>
                <div class=" w-full page-wrapper xl:px-6 px-0">
                    <!-- Main Content -->
                    <main class="h-full  max-w-full">
                        <div class="container full-container p-0 flex flex-col gap-6">
                            <livewire:layout.admin.header>
                                {{ $slot }}
                        </div>
                    </main>
                    <!-- Main Content End -->
                </div>
            </div>
            <!--end of project-->
        </main>
        <script src="{{ asset('spiketheme/assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('spiketheme/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
        <script src="{{ asset('spiketheme/assets/libs/iconify-icon/dist/iconify-icon.min.js') }}"></script>
        <script src="{{ asset('spiketheme/assets/libs/@preline/overlay/index.js') }}"></script>
        <script src="{{ asset('spiketheme/assets/js/sidebarmenu.js') }}"></script>
        <script src="{{ asset('spiketheme/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('spiketheme/assets/js/dashboard.js') }}"></script>
        <script src="{{ asset('prsp/js/script.js?v=').time() }}"></script>
        <!--Datatables CDN-->
        {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script> --}}
        <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
        {{-- <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script> --}}
    </body>
</html>
