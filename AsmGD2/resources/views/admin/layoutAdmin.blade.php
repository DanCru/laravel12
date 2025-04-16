
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/side3Admin.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
</head>
<body>
        <aside class="sidebar sidebar--collapsed">
                <div class="sidebar__header">
                        <div class="sidebar__logo">Admin</div>
                        <button class="sidebar__toggle">☰</button>
                </div>
                <div class="sidebar__menu">
                        <li class="sidebar__item">
                                <a href="/admin" class="sidebar__link ">
                                        <span class="sidebar__icon"><i class="fa-solid fa-code"></i></span>
                                        <span class="sidebar__text">Dashboard</span>
                                </a>
                        </li>
                        <li class="sidebar__item">
                                <a href="/admin/product/list" class="sidebar__link ">
                                        <span class="sidebar__icon"><i class="fa-solid fa-box"></i></span>
                                        <span class="sidebar__text">Products</span>
                                </a>
                        </li>
                        <li class="sidebar__item">
                                <a href="#" class="sidebar__link">
                                        <span class="sidebar__icon"><i class="fa-solid fa-circle-user"></i></span>
                                        <span class="sidebar__text">Customers</span>
                                </a>
                        </li>
                        <li class="sidebar__item">
                                <a href="/admin/product/list" class="sidebar__link">
                                        <span class="sidebar__icon"><i class="fa-solid fa-truck"></i></span>
                                        <span class="sidebar__text">Orders</span>
                                </a>
                        </li>
                        <li class="sidebar__item">
                                <a href="/" class="sidebar__link">
                                        <span class="sidebar__icon"><i class="fa-solid fa-house"></i></span>
                                        <span class="sidebar__text">Home</span>
                                </a>
                        </li>
                        <li class="sidebar__item logout-admin">
                                <a href="/logout" class="sidebar__link">
                                        <span class="sidebar__icon"><i class="fa-solid fa-power-off"></i></span>
                                        <span class="sidebar__text">Logout</span>
                                </a>
                        </li>
                </div>
        </aside>
        @yield('news')
</body>
<script src="{{ asset('js/side3Admin.js') }}"></script>