<?php
return [
    // 'FRONT_END_DOMAIN'   => env('FRONT_END_DOMAIN', null),
    // 'ADMIN_DOMAIN'  => env('ADMIN_DOMAIN', null),
    // 'FRONT_END_MEMBER_DOMAIN'  => env('FRONT_END_MEMBER_DOMAIN', null),
    // 'LANGCODE' => ['en','vi'],
    // 'DEFAULT_LANGCODE' => 'vi',
    // 'LANG_CODE_EN' => 'en',
    // 'LANGUAGES' => [
    //     'en' => 'English',
    //     'vi' => 'Vietnamese'
    // ],
    // 'LANGUAGES_ID' => [
    //     1 => 'English',
    //     2 => 'Vietnamese',
    // ],
    'PREFIX_TABLE' => 'fls_',
    'CODE_SUCCESS' => '1',
    'CODE_NO_ERROR' => '0',
    'CODE_HAS_ERROR' => '-1',
    'EXCHANGE_RATE_POINT_TO_MONEY' => 0.01,  // 100 Point = 1$
    'EXPIRY_15_DAY' => 15,
    'CUSTOMER_TRIAL' => 'trial',
    'CUSTOMER_TURN_OF_MAIL' => [
        'off' => 0,
        'on' => 1,
    ],
    'CUSTOMER_STATUS' => [
        'active' => 1,
        'inactive' => 2,
        'deleted' => 3,
    ],
    'CUSTOMER_STATUS_TEXT' => [
        1 => 'Active',
        2 => 'InActive',
        3 => 'Delete'
    ],
    'USER_STATUS' => [
        'active' => 1,
        'inactive' => 2,
        'draft' => 3,
        'deleted' => 4,
    ],
    'CATEGORY_NAME_TEXT' => [
        1 => 'Electronic',
        2 => 'Phone',
        3 => 'Laptop',
        4 => 'Accessory'
    ],
    'CATEGORY_NAME' => [
        'electronic'=>1,
        'phone' => 2 ,
        'laptop' => 3,
        'accessory' => 4
    ],
    'PRODUCT_STATUS' => [
        'active' => 1,
        'inactive' => 2,
        'deleted' => 3,
    ],
    'PRODUCT_STATUS_TEXT' => [
        1 => 'Active',
        2 => 'InActive',
        3 => 'Delete'
    ],
    'ROLE_ID' => [
        'admin' => 1,
        'customer' => 2,
        // 'deleted' => 3,
    ],
    'ROLE_ID_TEXT' => [
        1 => 'Admin',
        2 => 'Customer',
        // 3 => 'Delete'
    ],
    'PRODUCT_DEFAULT_IDS' => [
        'product_1' => 1
    ],
    'PRODUCT_TYPE' => [
        'library' => 1,
        'premium' => 2,
        'landing' => 3
    ],
    'PRODUCT_TYPE_TEXT' => [
        1 => 'Library',
        2 => 'Premium',
        3 => 'Landing'
    ],
    'PRODUCT_FOR_TRIAL' => [
        'No' => 0,
        'Yes' => 1,
    ],
    'PRODUCT_FOR_TRIAL_TEXT' => [
        0 => 'No',
        1 => 'Yes',
    ],
    'TYPE_LINK' => [
        1 => 'Youtube',
        2 => 'Vimeo',
        3 => 'Other url'
    ],
    'TYPE_LINK_TEXT' => [
        'youtube' => 1,
        'vimeo' => 2,
        'url' => 3
    ],
    'VIDEO_LINK_METHOD' => 1,
    // Memberships
    'MEMBERSHIPS_TYPE' => [
        'month' => 1,
        'year'  => 2,
        'trial' => 3,
    ],
    'MEMBERSHIPS_TYPE_TEXT' => [
        1 => 'Month',
        2 => 'Year',
        3 => 'Trial',
    ],
    'NUMBER_DATE_IN_MONTH' => 30,
    'NUMBER_DATE_IN_YEAR' => 365,
    'NUMBER_DATE_IN_TRIAL' => 365,

    'MEMBERSHIPS_STATUS' => [
        'active' => 1,
        'inactive' => 2,
        'deleted' => 3,
    ],
    'MEMBERSHIPS_STATUS_TEXT' => [
        1 => 'Active',
        2 => 'InActive',
        3 => 'Delete'
    ],
    // Memberships setting
    'MEMBERSHIPS_SETTING_TYPE' => [
        'percent' => 1,
        'fixed_price'  => 2,
    ],
    'MEMBERSHIPS_SETTING_TYPE_TEXT' => [
        1 => 'Percent',
        2 => 'Fixed price',

    ],

    'MEMBERSHIPS_SETTING_STATUS' => [
        'active' => 1,
        'inactive' => 2,
        'deleted' => 3,
    ],
    'MEMBERSHIPS_SETTING_STATUS_TEXT' => [
        1 => 'Active',
        2 => 'InActive',
        3 => 'Delete'
    ],
    // Banner
    'BANNER_STATUS' => [
        'active' => 1,
        'inactive' => 2,
        'deleted' => 3,
    ],
    'BANNER_STATUS_TEXT' => [
        1 => 'Active',
        2 => 'InActive',
        3 => 'Delete'
    ],
    'BANNER_TYPE_OPEN_PAGE' => [
        'current_page' => 1,
        'new_page' => 2
    ],
    'BANNER_TYPE_OPEN_PAGE_TEXT' => [
        1 => 'Open current tab',
        2 => 'Open new tab'
    ],
    // === Video ===
    'IS_DEFAULT_MENTOR' => 1,
    'MENTOR_BOOK' => [
        'Not_book' => 1,
        'Book' => 2,
    ],
    'MENTOR_TYPE' => [
        'All' => 1,
        'Multi' => 2,
    ],
    'MENTOR_BOOK_TEXT' => [
        1 => 'Not Book',
        2 => 'Book',
    ],
    'MENTOR_TYPE_TEXT' => [
        1 => 'All',
        2 => 'Multi',
    ],
    'VIDEO_START' => 1,
    'VIDEO_STATUS' => [
        'active' => 1,
        'inactive' => 2,
        'deleted' => 3,
    ],
    'VIDEO_STATUS_TEXT' => [
        1 => 'Active',
        2 => 'InActive',
        3 => 'Delete'
    ],
    // Event
    'EVENT_STATUS' => [
        'active' => 1,
        'inactive' => 2,
        'deleted' => 3,
    ],
    'EVENT_STATUS_TEXT' => [
        1 => 'Active',
        2 => 'InActive',
        3 => 'Delete'
    ],

    'VIDEO_TYPE' => [
        0 => 'Premium Video',
        1 => 'Trial Video',
    ],
    'USER_VIDEO_TRACKING_TYPE' => [
        'trial' => 1,
        'normal' => 2,
    ],
    'USER_VIDEO_TRACKING_STATUS' => [
        'completed' => 1,
        'in_progress' => 2,
    ],

    'CUSTOMER_ACCOUNT_TYPE' => [
        'trial_learn' => 1,
        'user' => 2,
        'mentor' => 3
    ],
    'CUSTOMER_ACCOUNT_TYPE_TEXT' => [
        1 => 'Trial learn',
        2 => 'User',
        3 => 'Mentor'
    ],
    'PATH_VIDEO' => 'storage/videos/',
    'PATH_THUMB_VIDEO' => 'storage/videos/',
    'MENTOR_BOOK_STATUS' => [
        'new' => 1,
        'waitting_approve' => 2,
        'approved' => 3,
        'waitting_review' => 4,
        'reviewed' => 5,
        'expired' => 6
    ],
    'MENTOR_BOOK_STATUS_TEXT' => [
        1 => "Trống",// vừa được tạo
        2 => "Chờ xác nhận",//được user book
        3 => "Đã hẹn",// mentor đã duyệt
        4 => "Hoàn tất",// mentor đã gặp member
        5 => "Hoàn tất",// member đã đánh giá cuôc hẹn
        6 => "Quá hạn" // cuôc hẹn tự hủy sau 24h
    ],
    'MENTOR_BOOK_STATUS_CLASS' => [
        1 => "",// vừa được book, chờ phản hồi
        2 => "text-green-500",//Đã xác nhận
        3 => "text-red-500", // Mentor đề nghị chọn thời gian khác => member chọn lại thời gian
        4 => "text-green-500", //Mentor không phản hồi sau 24 giờ
        5 => "text-secondary-500", // Mentor xác nhận hoàn tất cuộc hẹn , chờ member đánh giá
        6 => "text-green-500" // Hoàn tất
    ],
    'MEMBER_BOOK_REQUEST_STATUS' => [
        'new' => 1,// vừa được book, chờ phản hồi
        'approved' => 2,//Đã xác nhận
        'change_slot' => 3, // Mentor đề nghị chọn thời gian khác => member chọn lại thời gian
        'expired' => 4, //Mentor không phản hồi sau 24 giờ
        'waitting_review' => 5, // Mentor xác nhận hoàn tất cuộc hẹn
        'finished' => 6 // Hoàn tất
    ],
    'MEMBER_BOOK_REQUEST_STATUS_TEXT' => [
        1 => 'Waiting_for_response',// vừa được book, chờ phản hồi
        2 => 'Confirmed',//Đã xác nhận
        3 => 'Select_other_time', // Mentor đề nghị chọn thời gian khác => member chọn lại thời gian
        4 => 'Reject', //Mentor không phản hồi sau 24 giờ
        5 => 'Wait_for_review', // Mentor xác nhận hoàn tất cuộc hẹn
        6 => 'Success' // Hoàn tất
    ],
    'MENTOR_BOOK_REQUEST_STATUS_TEXT' => [
        1 => "Waiting_for_response",// vừa được book, chờ phản hồi
        2 => "Confirmed",//Đã xác nhận
        3 => "Select_other_time", // Mentor đề nghị chọn thời gian khác => member chọn lại thời gian
        4 => "expired", //Mentor không phản hồi sau 24 giờ
        5 => "Wait_for_review", // Mentor xác nhận hoàn tất cuộc hẹn
        6 => "Finished" // Hoàn tất
    ],
    'MEMBER_BOOK_REQUEST_STATUS_CLASS' => [
        1 => "",// vừa được book, chờ phản hồi
        2 => "text-green-500",//Đã xác nhận
        3 => "text-red-500", // Mentor đề nghị chọn thời gian khác => member chọn lại thời gian
        4 => "text-red-500", //Mentor không phản hồi sau 24 giờ
        5 => "text-secondary-500", // Mentor xác nhận hoàn tất cuộc hẹn
        6 => "text-green-500" // Hoàn tất
    ],
    'MENTOR_BOOK_REQUEST_SEND_MAIL' => [
        'send' => 1,
        'not_send' => 2,
    ],
    'BOOKING_SLOTS' => [
        '00:01 - 02:00',
        '02:00 - 04:00',
        '04:00 - 06:00',
        '06:00 - 08:00',
        '08:00 - 10:00',
        '10:00 - 12:00',
        '12:00 - 14:00',
        '14:00 - 16:00',
        '16:00 - 18:00',
        '18:00 - 20:00',
        '20:00 - 22:00',
        '22:00 - 00:00'
    ],
    'MEMBER_VOTE_ENUM' => [
        1 => 'Không hài lòng',
        2 => 'Hài lòng',
        3 => 'Rất hài lòng'
    ],
    'LIST_TIMEZONE' => [
        'Pacific/Midway'       => "(GMT-11:00) Midway Island",
        'US/Samoa'             => "(GMT-11:00) Samoa",
        'US/Hawaii'            => "(GMT-10:00) Hawaii",
        'US/Alaska'            => "(GMT-09:00) Alaska",
        'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
        'America/Tijuana'      => "(GMT-08:00) Tijuana",
        'US/Arizona'           => "(GMT-07:00) Arizona",
        'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
        'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
        'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
        'America/Mexico_City'  => "(GMT-06:00) Mexico City",
        'America/Monterrey'    => "(GMT-06:00) Monterrey",
        'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
        'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
        'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
        'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
        'America/Bogota'       => "(GMT-05:00) Bogota",
        'America/Lima'         => "(GMT-05:00) Lima",
        'America/Caracas'      => "(GMT-04:30) Caracas",
        'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
        'America/La_Paz'       => "(GMT-04:00) La Paz",
        'America/Santiago'     => "(GMT-04:00) Santiago",
        'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
        'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
        'Greenland'            => "(GMT-03:00) Greenland",
        'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
        'Atlantic/Azores'      => "(GMT-01:00) Azores",
        'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
        'Africa/Casablanca'    => "(GMT) Casablanca",
        'Europe/Dublin'        => "(GMT) Dublin",
        'Europe/Lisbon'        => "(GMT) Lisbon",
        'Europe/London'        => "(GMT) London",
        'Africa/Monrovia'      => "(GMT) Monrovia",
        'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
        'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
        'Europe/Berlin'        => "(GMT+01:00) Berlin",
        'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
        'Europe/Brussels'      => "(GMT+01:00) Brussels",
        'Europe/Budapest'      => "(GMT+01:00) Budapest",
        'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
        'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
        'Europe/Madrid'        => "(GMT+01:00) Madrid",
        'Europe/Paris'         => "(GMT+01:00) Paris",
        'Europe/Prague'        => "(GMT+01:00) Prague",
        'Europe/Rome'          => "(GMT+01:00) Rome",
        'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
        'Europe/Skopje'        => "(GMT+01:00) Skopje",
        'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
        'Europe/Vienna'        => "(GMT+01:00) Vienna",
        'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
        'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
        'Europe/Athens'        => "(GMT+02:00) Athens",
        'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
        'Africa/Cairo'         => "(GMT+02:00) Cairo",
        'Africa/Harare'        => "(GMT+02:00) Harare",
        'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
        'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
        'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
        'Europe/Kiev'          => "(GMT+02:00) Kyiv",
        'Europe/Minsk'         => "(GMT+02:00) Minsk",
        'Europe/Riga'          => "(GMT+02:00) Riga",
        'Europe/Sofia'         => "(GMT+02:00) Sofia",
        'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
        'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
        'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
        'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
        'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
        'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
        'Europe/Moscow'        => "(GMT+03:00) Moscow",
        'Asia/Tehran'          => "(GMT+03:30) Tehran",
        'Asia/Baku'            => "(GMT+04:00) Baku",
        'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
        'Asia/Muscat'          => "(GMT+04:00) Muscat",
        'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
        'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
        'Asia/Kabul'           => "(GMT+04:30) Kabul",
        'Asia/Karachi'         => "(GMT+05:00) Karachi",
        'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
        'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
        'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
        'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
        'Asia/Almaty'          => "(GMT+06:00) Almaty",
        'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
        'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
        'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
        'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
        'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
        'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
        'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
        'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
        'Australia/Perth'      => "(GMT+08:00) Perth",
        'Asia/Singapore'       => "(GMT+08:00) Singapore",
        'Asia/Taipei'          => "(GMT+08:00) Taipei",
        'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
        'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
        'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
        'Asia/Seoul'           => "(GMT+09:00) Seoul",
        'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
        'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
        'Australia/Darwin'     => "(GMT+09:30) Darwin",
        'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
        'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
        'Australia/Canberra'   => "(GMT+10:00) Canberra",
        'Pacific/Guam'         => "(GMT+10:00) Guam",
        'Australia/Hobart'     => "(GMT+10:00) Hobart",
        'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
        'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
        'Australia/Sydney'     => "(GMT+10:00) Sydney",
        'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
        'Asia/Magadan'         => "(GMT+12:00) Magadan",
        'Pacific/Auckland'     => "(GMT+12:00) Auckland",
        'Pacific/Fiji'         => "(GMT+12:00) Fiji",
    ],

    'TIMEZONE' => [
        '-11' => 'Pacific/Midway',
        '-10' => 'US/Hawaii',
        '-09' => 'US/Alaska',
        '-08' => 'US/Pacific',
        '-07' => 'US/Arizona',
        '-06' => 'America/Mexico_City',
        '-05' => 'US/Eastern',
        '-4.5' => 'America/Caracas',
        '-04' => 'Canada/Atlantic',
        '-3.5' => 'Canada/Newfoundland',
        '-3' => 'America/Buenos_Aires',
        '-2' => 'Atlantic/Stanley',
        '-1' => 'Atlantic/Azores',
        '1' => 'Europe/Amsterdam',
        '2' => 'Europe/Bucharest',
        '3' => 'Asia/Kuwait',
        '4' => 'Europe/Volgograd',
        '4.5' => 'Asia/Karachi',
        '5' => 'Asia/Tashkent',
        '5.5' => 'Asia/Kathmandu',
        '5.75' => 'Asia/Yekaterinburg',
        '6' => 'Asia/Almaty',
        '7' => 'Asia/Bangkok',
        '8' => 'Asia/Chongqing',
        '9' => 'Asia/Seoul',
        '9.5' => 'Australia/Darwin',
        '10' => 'Australia/Brisbane',
        '11' => 'Asia/Magadan',
        '12' => 'Pacific/Auckland',
    ],
    // === End Video ===
    // === Promotion ===
    'WAS_EXPIRED' => ' was expired !',
    'OUT_OF_PROMO_CODE' => ' out of promotion code !',
    'PROMOTION_NOT_EXISTS' => 'Promotion not exists !',
    'PROMOTION_TYPE' => [
        'percent' => 1,
        'money' => 2,
    ],
    'PROMOTION_TYPE_TEXT' => [
        1 => 'Percent',
        2 => 'Money',
    ],
    'PROMOTION_STATUS' => [
        'active' => 1,
        'inactive' => 2,
        'deleted' => 3,
    ],
    'PROMOTION_STATUS_TEXT' => [
        1 => 'Active',
        2 => 'InActive',
        3 => 'Delete'
    ],
    // === End Promotion ===
    'MODULE_LIST' => [
        'dash_board' => [
            'module_name' => 'Dashboard',
            'module_url' => 'admin.dashboard',
            'icon' => '<i class="bx bx-store"></i>',
            'url_active' => ''
        ],
        'product' => [
            'module_name' => 'Course',
            'module_url' => 'admin.product',
            'icon' => '<i data-feather="layout"></i>',
            'url_active' => 'admin.product.*'
        ],
        'memberships' => [
            'module_name' => 'Memberships',
            'module_url' => 'admin.memberships',
            'icon' => '<i data-feather="box"></i>',
            'url_active' => 'admin.memberships.*'
        ],
        'banner' => [
            'module_name' => 'Banner',
            'module_url' => 'admin.banner',
            'icon' => '<i data-feather="columns"></i>',
            'url_active' => 'admin.banner.*'
        ],
        'video' => [
            'module_name' => 'Video',
            'module_url' => 'admin.video',
            'icon' => '<i data-feather="video"></i>',
            'url_active' => 'admin.video.*'
        ],
        'promotion' => [
            'module_name' => 'Promotion',
            'module_url' => 'admin.promotion',
            'icon' => '<i data-feather="gift"></i>',
            'url_active' => 'admin.promotion.*'
        ],
        'customers' => [
            'module_name' => 'Customers',
            'module_url' => 'admin.customers',
            'icon' => '<i data-feather="user-check"></i>',
            'url_active' => 'admin.customers.*'
        ],
        'customers_referral' => [
            'module_name' => 'Referral History',
            'module_url' => 'admin.customers_referral',
            'icon' => '<i data-feather="box"></i>',
            'url_active' => 'admin.customers_referral.*'
        ],
        'order' => [
            'module_name' => 'Orders',
            'module_url' => 'admin.order',
            'icon' => '<i data-feather="credit-card"></i>',
            'url_active' => 'admin.order.*'
        ],
        'role' => [
            'module_name' => 'Roles',
            'module_url' => 'admin.role.user_group',
            'icon' => '<i data-feather="users"></i>',
            'url_active' => 'admin.role.*'
        ],
        'user' => [
            'module_name' => 'Users',
            'module_url' => 'admin.user.member.list',
            'icon' => '<i data-feather="user"></i>',
            'url_active' => 'admin.user.*'
        ],
        'setting' => [
            'module_name' => 'Setting',
            'module_url' => 'admin.setting',
            'icon' => '<i data-feather="settings"></i>',
            'url_active' => 'admin.setting.*'
        ],
        // 'comission' => [
        //     'module_name' => 'Commission',
        //     'module_url' => 'admin.commission',
        //     'icon' => '<i data-feather="trending-down"></i>',
        //     'url_active' => 'admin.commission.*'
        // ],
        'video_tracking' => [
            'module_name' => 'Video tracking',
            'module_url' => 'admin.video_tracking',
            'icon' => '<i data-feather="crosshair"></i>',
            'url_active' => 'admin.video_tracking.*'
        ],
        'request_money' => [
            'module_name' => 'Request money',
            'module_url' => 'admin.request_money',
            'icon' => '<i data-feather="dollar-sign"></i>',
            'url_active' => 'admin.request_money.*'
        ],
        'booking' => [
            'module_name' => 'Customer Booking',
            'module_url' => 'admin.customer_booking',
            'icon' => '<i data-feather="book"></i>',
            'url_active' => 'admin.customer_booking.*'
        ],
        'template_mail' => [
            'module_name' => 'Template Mail',
            'module_url' => 'admin.template_mail',
            'icon' => '<i data-feather="mail"></i>',
            'url_active' => 'admin.template_mail.*'
        ],
        'event' => [
            'module_name' => 'Events',
            'module_url' => 'admin.event',
            'icon' => '<i data-feather="calendar"></i>',
            'url_active' => 'admin.event.*'
        ],
        'notification' => [
            'module_name' => 'Notification',
            'module_url' => 'admin.notification',
            'icon' => '<i data-feather="bell"></i>',
            'url_active' => 'admin.notificaiton.*'
        ],
        'log_send_mail' => [
            'module_name' => 'Log send mail',
            'module_url' => 'admin.log_send_mail',
            'icon' => '<i data-feather="clipboard"></i>',
            'url_active' => 'admin.log_send_mail.*'
        ],
        'history_paid_commission' => [
            'module_name' => 'History paid commission',
            'module_url' => 'admin.history_paid_commission',
            'icon' => '<i data-feather="align-justify"></i>',
            'url_active' => 'admin.history_paid_commission.*'
        ],
        'free_lead_setting' => [
            'module_name' => 'Free lead setting',
            'module_url' => 'admin.free_lead_setting',
            'icon' => '<i data-feather="settings"></i>',
            'url_active' => 'admin.free_lead_setting.*'
        ],
        'customer_sale' => [
            'module_name' => 'Customer sale',
            'module_url' => 'admin.customer_sale',
            'icon' => '<i data-feather="user"></i>',
            'url_active' => 'admin.customer_sale.*'
        ],

    ],
    'PERMISSION_VIEW' => 'view',
    'PERMISSION_ADD' => 'add',
    'PERMISSION_EDIT' => 'edit',
    'PERMISSION_DELETE' => 'delete',
    'PERMISSION_DOWNLOAD' => 'download',
    'TYPE_ADMIN'    => 1,
    'FROM_FLS_MAIL' => env('MAIL_FROM_ADDRESS', 'nguyenhoangphuong1991@gmail.com'),
    'FROM_FLS_NAME' => 'VivaNow',
    'USER_STATUS_TEXT' => [
        '1' => 'Active',
        '2' => 'InActive',
        '3' => 'Deleted'
    ],
    'SETTING_TYPE_LIST' => [
        'text' => 'Text',
        'on_off' => 'On/Off',
        'image' =>'Image',
        'source' => 'Source'
    ],
    'PAYMENT_TYPE' => [
        '1' => 'Register',
        '2' => 'Extend Expired',
        '3' => 'Gift',
        '4' => 'Combo'
    ],
    'PAYMENT_TYPE_KEY' => [
        'register' => 1,
        'expired' => 2,
        'gift' => 3,
        'combo' => 4
    ],
    'PAYMENT_STATUS' => [
        '1' => 'Wait for pay',
        '2' => 'Paid',
      //  '3' => 'Refunded',
        '4' => 'Failed',
        '5' => 'Wait for main order pay',
        '6' => 'Timeout',
        '7' => 'Wait for main order pay failed',
       // '8' => 'Request refund'
    ],

    'PAYMENT_STATUS_WAIT' => 1,
    'PAYMENT_STATUS_PAID' => 2,
    'PAYMENT_STATUS_REFUNDED' => 3,
    'PAYMENT_STATUS_FAIL' => 4,
    'PAYMENT_STATUS_WAIT_REFER' => 5,
    'PAYMENT_STATUS_TIMEOUT' => 6,
    'PAYMENT_STATUS_WAIT_REFER_FAIL' => 7,
    'PAYMENT_STATUS_REQUEST_REFUND' => 8,

    'PAYMENT_GATEWAY' => [
        'paypal' => 'paypal',
        'none' => 'none'
    ],
    'CURRENCY' => 'USD',
    'COMMISSION_TYPE' => [
        1 => 'Percent',
        2 => 'Money',
    ],
    'COMMISSION_TYPE_KEY' => [
        'Percent' => 1,
        'Money' => 2
    ],

    'STEP_REGISTER' => [
        0 => 'TÔI MUỐN',
        1 => 'KHÔNG - 1',
        2 => 'KHÔNG - 2',
        3 => 'KHÔNG - 3',
        4 => 'KHÔNG - 4',
    ],
    'MAX_DAY_REFUNDS_MONEY' => 35,
    'LIST_LANDING' => [
        'landing-page-1' => 'Landing Page 1',
        'landing-page-2' => 'Landing Page 2',
        'landing-page-3' => 'Landing Page 3',
        'landing-page-4' => 'Landing Page 4',
        'landing-page-5' => 'Landing Page 5',
    ],

    'REWARD_TYPE' => [
        'point' => 1,
        'money' => 2
    ],

    'REWARD_REASON_TYPE' => [
        'watch_video' => 1,
        'referal' => 2,
        'training' => 3,
        'discount' => 4,
        'rollback' => 5,
        'request_money' => 6
    ],
    'TIME_OUT_PAYMENT' => 1800,
    'REQUEST_MONEY_PAYMENT_TYPE' => [
        1 => 'Bank',
        2 => 'Paypal',
    ],
    'REQUEST_MONEY_PAYMENT_TYPE_TEXT' => [
        'Bank' => 1,
        'Paypal' => 2,
    ],
    'REQUEST_MONEY_STATUS' => [
        1 => 'Request',
        2 => 'Processing',
        3 => 'Success',
        4 => 'Reject',
    ],
    'REQUEST_MONEY_STATUS_TEXT' => [
        'Request' => 1,
        'Processing' => 2,
        'Success' => 3,
        'Reject' => 4,
    ],
    'DAY_PAID_DOWNLINE' => 16,
    'MAIL_CATEGORY' => [
        1 => 'Register',
        2 => 'Course',
        3 => 'Booking',
        4 => 'Membership',
    ],
    'MAIL_TEMPLATE_STATUS' => [
        1 => 'Active',
        2 => 'Inactive'
    ],
    // notification
    'NOTIFICATION_SEND_TYPE' => [
        1 => 'Email',
        2 => 'Message'
    ],
    'NOTIFICATION_TYPE' =>[
        1 => 'System',
        2 => 'Custom'
    ],
    'TYPE_OF_NOTIFICATION' => [
        1 => 'Normal',
        2 => 'Event'
    ],
    'NOTIFICATION_STATUS' => [
        1 => 'Active',
        2 => 'Inactive'
    ],
    'MESSAGE_NOTIFY_STATUS' => [
        1 => 'Unread',
        2 => 'Read'
    ],
    'MESSAGE_NOTIFY_STATUS_TEXT' => [
        'Unread' => 1,
        'Read' => 2,
    ],
    // notification
    'NOTIFICATION_SEND_TYPE' => [
        1 => 'Email',
        2 => 'Message'
    ],
    'NOTIFICATION_SEND_TYPE_KEY' => [
        'email' => 1,
        'message' => 2
    ],
    'NOTIFICATION_TYPE_KEY' =>[
        'system' => 1,
        'custom' => 2
    ],
    'TYPE_OF_NOTIFICATION' => [
        1 => 'Normal',
        2 => 'Event'
    ],
    'TYPE_OF_NOTIFICATION_KEY' => [
        'normal' => 1,
        'event' => 2
    ],
    'NOTIFICATION_STATUS' => [
        1 => 'Active',
        2 => 'Inactive'
    ],
    'NOTIFICATION_STATUS_KEY' => [
        'active' => 1,
        'inactive' => 2
    ],
    'NOTIFICATION_CUSTOMER_GROUP' => [
        1 => 'Toàn hệ thống',
        2 => 'Các member thuộc hành trình', // show filter product
        8 => 'Cho tất cả member (không bao gồm mentor)',
        3 => 'Các mentor', // show mentor
        4 => 'Các tài khoản sắp hết hạn ( 7 ngày)',
        5 => 'Các tài khoản sắp hết hạn ( 15 ngày)',
        6 => 'Các tài khoản sắp hết hạn ( 30 ngày)',
        7 => 'Tất cả các member đang dùng thử'
    ],
    'NOTIFICATION_CUSTOMER_GROUP_KEY' => [
        'all' => 1,
        'member_of_product' => 2, // show filter product
        'mentor' => 3, // show mentor
        'customer_7_day' => 4,
        'customer_15_day' => 5,
        'customer_30_day' => 6,
        'trial_member' => 7,
        'member' => 8 // show member
    ],


    'NOTIFICATION_RECURRING_TYPE' => [
        1 => 'Gửi 1 lần',
        2 => 'Gửi định kỳ'
    ],
    'NOTIFICATION_RECURRING_TYPE_KEY' => [
        'once_times' => 1,
        'recurring' => 2
    ],
    'NOTIFICATION_RECURRING' => [
        1 => 'Mỗi ngày',
        3 => '3 ngày'
    ],
    'NOTIFICATION_TIME_SEND_EVENT' => [
        1 => 'Trước 1 ngày',
        2 => 'Trước 1 giờ',
    ],
    'NOTIFICATION_TIME_SEND_EVENT_KEY' => [
        'before_one_day' => 1,
        'before_one_hour' => 2,
    ],
    'NOTIFICATION_RECURRING_TYPE_RECURRING' => 2,
    'NOTIFICATION_CUSTOMER_GROUP_PRODUCT' => 2,
    'NOTIFICATION_CUSTOMER_GROUP_MENTOR' => 3,
    'EVENT_CUSTOMER_GROUP' => [
        1 => 'Các member thuộc hành trình',
        2 => 'Các mentor',
        3 => 'Các member đang dùng thử',
    ],
    'EVENT_CUSTOMER_GROUP_PRODUCT' => 1,
    'EVENT_CUSTOMER_GROUP_MENTOR' => 2,
    'FIREBASE_SERVER_KEY' => 'AAAApFV1BMw:APA91bFuyvIY9yGBSUItYbjdFkB5HStejeIc_2gcY0BpBKq-LA2OszR91PkGpAc1NEpVAbSFWL0q8jKNCzl-mx0GZ97TwSZajf37GD298JIL2r9q-unJO69sVtK06OhEw3YmJTJaW1uE',
    'CRON_STATUS' => [
        'created' => 1,
        'running' => 2,
        'completed' => 3,
        'fail' => 4,
        'cancel' => 5
    ],
    'LIMIT_USER_PER_PAGE_PUSH' => 100,
    'ROOT_PATH' => env('HOME_PATH', '/var/www/html/fls_dev'),
    'CRON_MANAGER_TYPE' => [
        'push_notify' => 1,
        'remind_event_one_hour' => 2,
        'remind_event_one_day' => 3,
        'remind_video_three_day' => 4,
        'remind_user_expired' => 5
    ],
    'REGISTER_EVENT_STATUS' => [
        'success' => 1,
        'cancel' => 2,
    ],
    'REGISTER_EVENT_STATUS_TEXT' => [
        1 => 'Success',
        2 => 'Cancel',
    ],
    'EVENT_DETAIL_STATUS' => [
        1 => 'Active',
        2 => 'Delete',
    ],
    'EVENT_DETAIL_STATUS_TEXT' => [
        'active' => 1,
        'delete' => 2,
    ],
    'BUY_ENAGIC' => [
        1 => 'Yes',
        2 => 'No',
    ],
    'BUY_ENAGIC_TEXT' => [
        'Yes' => 1,
        'No' => 2,
    ],
    'ACCOUNT_ENAGIC' => [
        1 => 'Yes',
        2 => 'No',
    ],
    'ACCOUNT_ENAGIC_TEXT' => [
        'Yes' => 1,
        'No' => 2,
    ],
    'TYPE_EVENT_LOG_SEND_MAIL' => [
        'trigger_01' => 'Khi member đăng ký thành công',
        'trigger_02' => 'Gửi cho upline khi có downline mới',
        'trigger_03' => 'Gửi cho member khi nhận được điểm thưởng',
        'trigger_04' => 'Gửi cho member khi nhận được tiền thưởng',
        'trigger_05' => 'Gửi cho mentor khi có yêu cầu đặt hẹn mới',
        'trigger_06' => 'Gửi thông tin lịch hẹn khi mentor xác nhận đặt hẹn',
        'trigger_07' => 'Khi mentor xác nhận hoàn tất coaching, hệ thống gửi noti',
        'trigger_08' => 'Khi member không xem video, mỗi 3 ngày sẽ gửi 1 noti cho user đến khi user xem video',
        'trigger_09' => 'Nhắc lịch hẹn gặp mentor',
        'trigger_10' => 'Thông báo cho người bảo trợ khi downline mua sản phẩm',
        'trigger_11' => 'Thông báo cho hệ thống khi mỗi Member ra quyết định mua sản phẩm',
        'trigger_12' => 'Các sự kiện sắp diễn ra (lịch zoom/ sự kiện offline/ webinar…)',
        'trigger_14' => 'Hết hạn thành viên trước',
    ],
    'FREE_LEAD_LOG_STATUS' =>[
        1 => 'normal',
        2 => 'is_lead',
        3 => 'cancel'
    ],
    'FREE_LEAD_LOG_STATUS_TEXT' =>[
        'normal' => 1 ,
        'is_lead' => 2 ,
        'cancel' => 3
    ],
    'HISTORY_PAID_COMMISSION_TYPE' =>[
        1 => 'System (Pool)',
        2 => 'Customer',
        3 => 'Wait Upline Payment',
        4 => 'Freeze',
        5 => 'Out of date 72h ( Pool)'
    ],
    'HISTORY_PAID_COMMISSION_TYPE_TEXT' =>[
        'System' => 1,
        'Customer' => 2,
        'Wait_upline' => 3,
        'Freeze' => 4,
        'Out_date' => 5
    ],
    'BRANCH_COMMISSION' => [
        'new_member' => 0,
        'v1' => 1,
        'v2' => 2,
        'v3' => 3,
        'v4' => 4
    ],
    'BRANCH_COMMISSION_TEXT' => [
        0 => 'new_member',
        1 => 'v1',
        2 => 'v2',
        3 =>'v3',
        4 => 'v4',
    ],
    'LEVEL_COMMISSION' => [
        'trial' => 0,
        'user' => 1,
        'md' => 2,
        'ceo' => 3,
        'founder' => 4,
    ],
    'LEVEL_COMMISSION_TEXT' => [
        0 => 'Trial user',
        1 => 'User',
        2 => 'MD',
        3 => 'CEO',
        4 => 'FOUNDER'
    ],
    'MAX_SALE_DIRECT_V1' => 2,
    'RANGE_SALE' => [
        'v2' => [
            'min' => 3,
            'max' => 49//49
        ],
        'v3' => [
            'min' => 50,//50,
            'max' => 99//99
        ],
        'v4' => [
            'min' => 100,//100
        ]
    ],
    'VIRTUAL_TITLE' => [
        0 => 'None',
        2 => 'Bronze',
        3 => 'Silver',
        4 => 'Gold'
    ],
    'VIRTUAL_TITLE_TEXT' => [
        'none' => 0,
        'bronze' => 2,
        'silver' => 3,
        'gold' => 4
    ],
    'VIRTUAL_SALE' => [
        2 => 49,
        3 => 99,
        4 => 100,
    ],
    'CONDITION_MD' => 2,
    'CONDITION_SEO' => 2,
    'TOTAL_COMMISSION' => 24,
    'TOTAL_COMMISSION_FOUNDER' => 26,
    'COMMISSION_FEE_DIRECT' => 20,
    'COMMISSION_FEE' => [
        'new_member' => 0,
        'v1' => 5,
        'v2' => 10,
        'v3' => 15,
        'v4' => 20,
        'md' => 2,
        'ceo' => 4,
        'founder' => 6
    ],
    'MAIL_CRON_MANAGER_TYPE' => [
        'reminder_view_video_trial' => 1,
        'reminder_view_video_trial_no_login' => 2,
        'reminder_expired_membership' => 3,
        'reminder_view_video' => 4,
        'reminder_view_video_viewing' => 5,
        'reminder_booking_mentor' => 6,
    ],
    'MAIL_CRON_MANAGER_TIME_TYPE' => [
        '3_day' => 1,
        '7_day' => 2,
        '1_day' => 3,
        '1_hour' => 4,
    ],

];
