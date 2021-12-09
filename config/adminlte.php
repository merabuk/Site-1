<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'title' => 'ДІНАМОТО',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'logo' => '<b>ДІНАМОТО</b>',
    'logo_img' => 'favicon.ico',
    'logo_img_class' => 'brand-image', // img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'ДІНАМОТО',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => false,
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'enabled_laravel_mix' => true,
    'laravel_mix_css_path' => 'css/backend.css',
    'laravel_mix_js_path' => 'js/backend.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [
        /*[
            'text' => 'search',
            'search' => true,
            'topnav' => true,
        ],[
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],*/

        //Панель управления
        [
            'text' => 'Панель керування',
            'url'  => '/home',
            'icon' => 'fas fa-fw fa-tachometer-alt',
        ],
        //Управление пользователями
        [
            'text'    => 'Користувачі',
            'icon'    => 'fas fa-fw fa-users',
            'submenu' => [
                [
                    'text' => 'Всі',
                    'url'  => '/home/users?scope=all',
                    'icon' => 'fas fa-fw fa-user-friends',
                ],
                [
                    'text' => 'Адміністратори',
                    'url'  => '/home/users?scope=admins',
                    'icon' => 'fas fa-fw fa-user-cog',
                ],
                [
                    'text' => 'Менеджери',
                    'url'  => '/home/users?scope=managers',
                    'icon' => 'fas fa-fw fa-user-shield',
                ],
                [
                    'text' => 'Ділери',
                    'url'  => '/home/users?scope=dealers',
                    'icon' => 'fas fa-fw fa-user-lock',
                ],
                [
                    'text' => 'Покупці',
                    'url'  => '/home/users?scope=buyers',
                    'icon' => 'fas fa-fw fa-user-tag',
                ],
            ],
        ],
        //Каталог
        [
            'text'    => 'Каталог',
            'icon'    => 'fas fa-folder',
            'submenu' => [
                [
                    'text' => 'Категорії',
                    'url'  => '/home/categories',
                    'icon' => 'fas fa-tags',
                ],
                [
                    'text' => 'Бренди',
                    'url'  => '/home/brands',
                    'icon' => 'fas fa-copyright',
                ],
                [
                    'text' => 'Товари',
                    'url'  => '/home/products',
                    'icon' => 'fas fa-tag',
                ],
                [
                    'text' => 'Фільтри',
                    'url'  => '/home/filters',
                    'icon' => 'fas fa-filter',
                ],
            ],
        ],
        //Заказы
        [
            'text'    => 'Замовлення',
            'icon'    => 'fas fa-cash-register',
            'submenu' => [
                [
                    'text' => 'Всі',
                    'url'  => '/home/orders?scope=all',
                    'icon' => 'fas fa-shopping-cart',
                ],
                [
                    'text' => 'Нові',
                    'url'  => '/home/orders?scope=new',
                    'icon' => 'fas fa-cart-plus',
                ],
                [
                    'text' => 'У обробці',
                    'url'  => '/home/orders?scope=working',
                    'icon' => 'fas fa-cart-arrow-down',
                ],
                [
                    'text' => 'Сплачені',
                    'url'  => '/home/orders?scope=payed',
                    'icon' => 'fab fa-cc-visa',
                ],
                [
                    'text' => 'Готуються до відправки',
                    'url'  => '/home/orders?scope=preparing',
                    'icon' => 'fas fa-dolly-flatbed',
                ],
                [
                    'text' => 'Відправлені',
                    'url'  => '/home/orders?scope=shipped',
                    'icon' => 'fas fa-shipping-fast',
                ],
                [
                    'text' => 'Повернені',
                    'url'  => '/home/orders?scope=placed',
                    'icon' => 'fas fa-undo',
                ],
                [
                    'text' => 'Завершені',
                    'url'  => '/home/orders?scope=finished',
                    'icon' => 'fas fa-check-square',
                ],
            ],
        ],
        //Заказі в один клик
        [
            'text' => 'Замовлення в один клік',
            'url'  => '/home/order-oneclicks',
            'icon' => 'fas fa-mouse-pointer',
        ],
        //Статичные страницы
        [
            'text' => 'Сторінки',
            'url'  => '/home/front-pages',
            'icon' => 'fas fa-book',
        ],


        /*['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ],*/

        //ссылка на магазин
        ['header' => 'До магазину'],
        [
            'text' => 'Дінамото',
            'url'  => '/',
            'icon' => 'fas fa-store',
            'target' => '_blank',
        ],

        /*['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],*/
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/backend/plugins/datatables/datatables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/backend/plugins/datatables/row_show.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '/css/backend/plugins/datatables/datatables.min.css',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/backend/plugins/sweetalerts/sweetalert2.all.min.js',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/backend/plugins/select2/select2.full.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/backend/plugins/select2/select2.uk.lang.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/css/backend/plugins/select2/select2.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/css/backend/plugins/select2/select2-bootstrap4.min.css',
                ],
            ],
        ],
        'Datepicker' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/backend/plugins/datepicker/moment-with-locales.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/backend/plugins/datepicker/tempusdominus-bootstrap-4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/css/backend/plugins/datepicker/tempusdominus-bootstrap-4.min.css',
                ],
            ],
        ],
        'FileInputs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/backend/plugins/fileinput/bs-custom-file-input.min.js',
                ],
            ],
        ],
        'Summernote' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/backend/plugins/summernote/summernote-bs4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/backend/plugins/summernote/lang/summernote-uk-UA.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/css/backend/plugins/summernote/summernote-bs4.min.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
