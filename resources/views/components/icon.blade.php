@props(['icon', 'class'])

@php
    $icons = [
        'shopping-cart' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M8 16H15.2632C19.7508 16 20.4333 13.1808 21.261 9.06908C21.4998 7.88311 21.6192 7.29013 21.3321 6.89507C21.045 6.5 20.4947 6.5 19.3941 6.5H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M8 16L5.37873 3.51493C5.15615 2.62459 4.35618 2 3.43845 2H2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M8.88 16H8.46857C7.10522 16 6 17.1513 6 18.5714C6 18.8081 6.1842 19 6.41143 19H17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <circle cx="10.5" cy="20.5" r="1.5" stroke="currentColor" stroke-width="1.5" />
            <circle cx="17.5" cy="20.5" r="1.5" stroke="currentColor" stroke-width="1.5" />
        </svg>',
        'search' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M17.5 17.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C15.9706 20 20 15.9706 20 11Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
        </svg>',
        'user-circle' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
            <path d="M7.5 17C9.8317 14.5578 14.1432 14.4428 16.5 17M14.4951 9.5C14.4951 10.8807 13.3742 12 11.9915 12C10.6089 12 9.48797 10.8807 9.48797 9.5C9.48797 8.11929 10.6089 7 11.9915 7C13.3742 7 14.4951 8.11929 14.4951 9.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>',
        'arrow-right' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'arrow-left' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M15 6C15 6 9.00001 10.4189 9 12C8.99999 13.5812 15 18 15 18" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'store' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M2.9668 10.4961V15.4979C2.9668 18.3273 2.9668 19.742 3.84548 20.621C4.72416 21.5001 6.13837 21.5001 8.9668 21.5001H14.9668C17.7952 21.5001 19.2094 21.5001 20.0881 20.621C20.9668 19.742 20.9668 18.3273 20.9668 15.4979V10.4961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M14.9668 16.9932C14.2827 17.6004 13.1936 17.9932 11.9668 17.9932C10.74 17.9932 9.65089 17.6004 8.9668 16.9932" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            <path d="M10.1038 8.41848C9.82182 9.43688 8.79628 11.1936 6.84777 11.4482C5.12733 11.673 3.82246 10.922 3.48916 10.608C3.12168 10.3534 2.28416 9.53872 2.07906 9.02952C1.87395 8.52032 2.11324 7.41706 2.28416 6.96726L2.96743 4.98888C3.13423 4.49196 3.5247 3.31666 3.92501 2.91913C4.32533 2.5216 5.13581 2.5043 5.4694 2.5043H12.4749C14.2781 2.52978 18.2209 2.48822 19.0003 2.50431C19.7797 2.52039 20.2481 3.17373 20.3848 3.45379C21.5477 6.27061 22 7.88382 22 8.57124C21.8482 9.30456 21.22 10.6873 19.0003 11.2955C16.6933 11.9275 15.3854 10.6981 14.9751 10.2261M9.15522 10.2261C9.47997 10.625 10.4987 11.4279 11.9754 11.4482C13.4522 11.4686 14.7273 10.4383 15.1802 9.92062C15.3084 9.76786 15.5853 9.31467 15.8725 8.41848" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'facebook' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.18182 10.3333C5.20406 10.3333 5 10.5252 5 11.4444V13.1111C5 14.0304 5.20406 14.2222 6.18182 14.2222H8.54545V20.8889C8.54545 21.8081 8.74951 22 9.72727 22H12.0909C13.0687 22 13.2727 21.8081 13.2727 20.8889V14.2222H15.9267C16.6683 14.2222 16.8594 14.0867 17.0631 13.4164L17.5696 11.7497C17.9185 10.6014 17.7035 10.3333 16.4332 10.3333H13.2727V7.55556C13.2727 6.94191 13.8018 6.44444 14.4545 6.44444H17.8182C18.7959 6.44444 19 6.25259 19 5.33333V3.11111C19 2.19185 18.7959 2 17.8182 2H14.4545C11.191 2 8.54545 4.48731 8.54545 7.55556V10.3333H6.18182Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
        </svg>',
        'instagram' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
            <path d="M16.5 12C16.5 14.4853 14.4853 16.5 12 16.5C9.51472 16.5 7.5 14.4853 7.5 12C7.5 9.51472 9.51472 7.5 12 7.5C14.4853 7.5 16.5 9.51472 16.5 12Z" stroke="currentColor" stroke-width="1.5" />
            <path d="M17.5078 6.5L17.4988 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'x' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M3 21L10.5484 13.4516M21 3L13.4516 10.5484M13.4516 10.5484L8 3H3L10.5484 13.4516M13.4516 10.5484L21 21H16L10.5484 13.4516" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'start' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M13.7276 3.44418L15.4874 6.99288C15.7274 7.48687 16.3673 7.9607 16.9073 8.05143L20.0969 8.58575C22.1367 8.92853 22.6167 10.4206 21.1468 11.8925L18.6671 14.3927C18.2471 14.8161 18.0172 15.6327 18.1471 16.2175L18.8571 19.3125C19.417 21.7623 18.1271 22.71 15.9774 21.4296L12.9877 19.6452C12.4478 19.3226 11.5579 19.3226 11.0079 19.6452L8.01827 21.4296C5.8785 22.71 4.57865 21.7522 5.13859 19.3125L5.84851 16.2175C5.97849 15.6327 5.74852 14.8161 5.32856 14.3927L2.84884 11.8925C1.389 10.4206 1.85895 8.92853 3.89872 8.58575L7.08837 8.05143C7.61831 7.9607 8.25824 7.48687 8.49821 6.99288L10.258 3.44418C11.2179 1.51861 12.7777 1.51861 13.7276 3.44418Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'plus' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'minus' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'delete' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M3 5.5H21M16.0557 5.5L15.3731 4.09173C14.9196 3.15626 14.6928 2.68852 14.3017 2.39681C14.215 2.3321 14.1231 2.27454 14.027 2.2247C13.5939 2 13.0741 2 12.0345 2C10.9688 2 10.436 2 9.99568 2.23412C9.8981 2.28601 9.80498 2.3459 9.71729 2.41317C9.32164 2.7167 9.10063 3.20155 8.65861 4.17126L8.05292 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M9.5 16.5L9.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M14.5 16.5L14.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>',
        'user-info' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M14 9H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M14 12.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <rect x="2" y="3" width="20" height="18" rx="5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
            <path d="M5 16C6.20831 13.4189 10.7122 13.2491 12 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10.5 9C10.5 10.1046 9.60457 11 8.5 11C7.39543 11 6.5 10.1046 6.5 9C6.5 7.89543 7.39543 7 8.5 7C9.60457 7 10.5 7.89543 10.5 9Z" stroke="currentColor" stroke-width="1.5" />
        </svg>',
        'payment' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M13.5 15H6C4.11438 15 3.17157 15 2.58579 14.4142C2 13.8284 2 12.8856 2 11V7C2 5.11438 2 4.17157 2.58579 3.58579C3.17157 3 4.11438 3 6 3H18C19.8856 3 20.8284 3 21.4142 3.58579C22 4.17157 22 5.11438 22 7V12C22 12.9319 22 13.3978 21.8478 13.7654C21.6448 14.2554 21.2554 14.6448 20.7654 14.8478C20.3978 15 19.9319 15 19 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M14 9C14 10.1045 13.1046 11 12 11C10.8954 11 10 10.1045 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M13 17C13 15.3431 14.3431 14 16 14V12C16 10.3431 17.3431 9 19 9V14.5C19 16.8346 19 18.0019 18.5277 18.8856C18.1548 19.5833 17.5833 20.1548 16.8856 20.5277C16.0019 21 14.8346 21 12.5 21H12C10.1362 21 9.20435 21 8.46927 20.6955C7.48915 20.2895 6.71046 19.5108 6.30448 18.5307C6 17.7956 6 16.8638 6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
    ];

    $iconSvg = $icons[$icon] ?? null;

    if ($iconSvg) {
        $iconSvg = str_replace('<svg ', '<svg class="' . $class . '" ', $iconSvg);
    }

@endphp


@if ($iconSvg)
    {!! $iconSvg !!}
@endif
