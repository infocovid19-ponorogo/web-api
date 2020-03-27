<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-item nav-dropdown {{
                active_class(Active::checkUriPattern('admin/kecamatan*'), 'open')
            }}">
                <a class="nav-link nav-dropdown-toggle {{
                    active_class(Active::checkUriPattern('admin/kecamatan*'))
                }}" href="#">
                    <i class="nav-icon far fa-user"></i>
                    Kecamatan
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/kecamatan'))
                        }}" href="{{ route('admin.kecamatan.index') }}">
                            Daftar Kecamatan
                        </a>
                    </li>
                    @if ($logged_in_user->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/kecamatan/create'))
                        }}" href="{{ route('admin.kecamatan.create') }}">
                            Tambah Kecamatan
                        </a>
                    </li>
                    @endif
                </ul>
            </li>


            <li class="nav-item nav-dropdown {{
                active_class(Active::checkUriPattern('admin/provinsi*'), 'open')
            }}">
                <a class="nav-link nav-dropdown-toggle {{
                    active_class(Active::checkUriPattern('admin/provinsi*'))
                }}" href="#">
                    <i class="nav-icon far fa-user"></i>
                    Provinsi
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/provinsi'))
                        }}" href="{{ route('admin.provinsi.index') }}">
                            Provinsi
                        </a>
                    </li>
                    @if ($logged_in_user->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/provinsi/create'))
                        }}" href="{{ route('admin.provinsi.create') }}">
                            Tambah
                        </a>
                    </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item nav-dropdown {{
                active_class(Active::checkUriPattern('admin/news*'), 'open')
            }}">
                <a class="nav-link nav-dropdown-toggle {{
                    active_class(Active::checkUriPattern('admin/news*'))
                }}" href="#">
                    <i class="nav-icon far fa-user"></i>
                    Berita
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/news'))
                        }}" href="{{ route('admin.news.index') }}">
                            Daftar Berita
                        </a>
                    </li>
                    @if ($logged_in_user->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/news/create'))
                        }}" href="{{ route('admin.news.create') }}">
                            Tambah Berita
                        </a>
                    </li>
                    @endif
                </ul>
            </li>

            <li class="nav-title">
                @lang('menus.backend.sidebar.system')
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('admin/auth*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Active::checkUriPattern('admin/auth*'))
                    }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('admin/auth/user*'))
                            }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('admin/auth/role*'))
                            }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
