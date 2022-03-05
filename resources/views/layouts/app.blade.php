<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

    @yield('styles')
    <style>
        #toast-container > div {
            opacity: 1 !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">
                <nav class="mt-4">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('todos.index') }}" class="nav-link active">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Todo List
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        @yield('content')
        <footer class="main-footer">
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({
                placement: 'right'
            })
        })
        toastr.options.showMethod = 'slideDown';
        toastr.options.hideMethod = 'slideUp';
        toastr.options.closeMethod = 'slideUp'
        toastr.options.timeOut = 2000;
        toastr.options.progressBar = true;
        toastr.options.closeButton = true;
        @if(flash()->message && flash()->class == 'success')
            toastr.success('{{ flash()->message }}');
        @endif
    </script>
    @yield('scripts')
</body>

</html>
