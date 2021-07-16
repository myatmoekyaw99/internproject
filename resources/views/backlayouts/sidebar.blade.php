<div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="/admin" class="@yield('active')">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Home
                                    </a>
                                </li>

                                <li>
                                    <a href="/adminshow" class="@yield('adminactive')">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                        Admins
                                    </a>
                                </li>

                                <li>
                                    <a href="/showcustomer" class="@yield('customeractive')">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                        Customers
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-note"></i>
                                        Category
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/categories">
                                                <i class="metismenu-icon"></i>
                                                Add Category
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/categories/create">
                                                <i class="metismenu-icon">
                                                </i>Show Category
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                

                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-shopbag"></i>
                                        Items
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/items">
                                                <i class="metismenu-icon"></i>
                                                Add Items
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/items/create">
                                                <i class="metismenu-icon">
                                                </i>Show Items
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="/showorder" class="@yield('orderactive')">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                        Orders
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>