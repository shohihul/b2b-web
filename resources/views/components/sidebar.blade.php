@php
$links = [
    [
        "section" => [
            [
                "icon" => "fas fa-fire",
                "section_text" => "Dashboard",
                "href" => "dashboard"
            ],
        ],
        "text" => "Dashboard",
        "is_multi" => false,
    ],
    [
        "href" => [
            [
                "icon" => "fas fa-user",
                "section_text" => "User",
                "section_list" => [
                    ["href" => "user", "text" => "Data User"],
                    ["href" => "user.new", "text" => "Buat User"]
                ]
            ]
        ],
        "text" => "User",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "icon" => "fas fa-store",
                "section_text" => "Bisnis",
                "section_list" => [
                    ["href" => "shop", "text" => "Data"],
                    ["href" => "shop.create", "text" => "Tambah Data"]
                ]
            ],
        ],
        "text" => "Bisnis",
        "is_multi" => true,
    ],
    [
        "section" => [
            [
                "icon" => "fas fa-tags",
                "section_text" => "Kategori Bisnis",
                "href" => "business-category"
            ],
        ],
        "text" => "Pengaturan",
        "is_multi" => false,
    ],
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
                @foreach ($link->section as $section)
                    <li class="{{ Request::routeIs($section->href) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route($section->href) }}"><i class="{{ $section->icon }}"></i><span>{{ $section->section_text }}</span></a>
                    </li>
                @endforeach
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $section->icon }}"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
