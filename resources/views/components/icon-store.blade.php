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
        'shopping-cart-add' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M8 16H15.2632C19.7508 16 20.4333 13.1808 21.261 9.06904C21.4998 7.88308 21.6192 7.2901 21.3321 6.89503C21.1034 6.58036 20.7077 6.51633 20 6.5033" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M9 6.5H17M13 10.5V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M8 16L5.37873 3.51493C5.15615 2.62459 4.35618 2 3.43845 2H2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M8.88 16H8.46857C7.10522 16 6 17.1513 6 18.5714C6 18.8081 6.1842 19 6.41143 19H17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <circle cx="10.5" cy="20.5" r="1.5" stroke="currentColor" stroke-width="1.5" />
            <circle cx="17.5" cy="20.5" r="1.5" stroke="currentColor" stroke-width="1.5" />
        </svg>',
        'search' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M17.5 17.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C15.9706 20 20 15.9706 20 11Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
        </svg>',
        'arrow-right' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'arrow-left' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M15 6C15 6 9.00001 10.4189 9 12C8.99999 13.5812 15 18 15 18" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'arrow-down' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>',
        'store' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M2.9668 10.4961V15.4979C2.9668 18.3273 2.9668 19.742 3.84548 20.621C4.72416 21.5001 6.13837 21.5001 8.9668 21.5001H14.9668C17.7952 21.5001 19.2094 21.5001 20.0881 20.621C20.9668 19.742 20.9668 18.3273 20.9668 15.4979V10.4961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M14.9668 16.9932C14.2827 17.6004 13.1936 17.9932 11.9668 17.9932C10.74 17.9932 9.65089 17.6004 8.9668 16.9932" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M10.1038 8.41848C9.82182 9.43688 8.79628 11.1936 6.84777 11.4482C5.12733 11.673 3.82246 10.922 3.48916 10.608C3.12168 10.3534 2.28416 9.53872 2.07906 9.02952C1.87395 8.52032 2.11324 7.41706 2.28416 6.96726L2.96743 4.98888C3.13423 4.49196 3.5247 3.31666 3.92501 2.91913C4.32533 2.5216 5.13581 2.5043 5.4694 2.5043H12.4749C14.2781 2.52978 18.2209 2.48822 19.0003 2.50431C19.7797 2.52039 20.2481 3.17373 20.3848 3.45379C21.5477 6.27061 22 7.88382 22 8.57124C21.8482 9.30456 21.22 10.6873 19.0003 11.2955C16.6933 11.9275 15.3854 10.6981 14.9751 10.2261M9.15522 10.2261C9.47997 10.625 10.4987 11.4279 11.9754 11.4482C13.4522 11.4686 14.7273 10.4383 15.1802 9.92062C15.3084 9.76786 15.5853 9.31467 15.8725 8.41848" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'facebook' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.18182 10.3333C5.20406 10.3333 5 10.5252 5 11.4444V13.1111C5 14.0304 5.20406 14.2222 6.18182 14.2222H8.54545V20.8889C8.54545 21.8081 8.74951 22 9.72727 22H12.0909C13.0687 22 13.2727 21.8081 13.2727 20.8889V14.2222H15.9267C16.6683 14.2222 16.8594 14.0867 17.0631 13.4164L17.5696 11.7497C17.9185 10.6014 17.7035 10.3333 16.4332 10.3333H13.2727V7.55556C13.2727 6.94191 13.8018 6.44444 14.4545 6.44444H17.8182C18.7959 6.44444 19 6.25259 19 5.33333V3.11111C19 2.19185 18.7959 2 17.8182 2H14.4545C11.191 2 8.54545 4.48731 8.54545 7.55556V10.3333H6.18182Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
        </svg>',
        'start' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M13.7276 3.44418L15.4874 6.99288C15.7274 7.48687 16.3673 7.9607 16.9073 8.05143L20.0969 8.58575C22.1367 8.92853 22.6167 10.4206 21.1468 11.8925L18.6671 14.3927C18.2471 14.8161 18.0172 15.6327 18.1471 16.2175L18.8571 19.3125C19.417 21.7623 18.1271 22.71 15.9774 21.4296L12.9877 19.6452C12.4478 19.3226 11.5579 19.3226 11.0079 19.6452L8.01827 21.4296C5.8785 22.71 4.57865 21.7522 5.13859 19.3125L5.84851 16.2175C5.97849 15.6327 5.74852 14.8161 5.32856 14.3927L2.84884 11.8925C1.389 10.4206 1.85895 8.92853 3.89872 8.58575L7.08837 8.05143C7.61831 7.9607 8.25824 7.48687 8.49821 6.99288L10.258 3.44418C11.2179 1.51861 12.7777 1.51861 13.7276 3.44418Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'plus' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>',
        'minus' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'delete' => '
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>',
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
        'mail' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M2 6L8.91302 9.91697C11.4616 11.361 12.5384 11.361 15.087 9.91697L22 6" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
            <path d="M2.01577 13.4756C2.08114 16.5412 2.11383 18.0739 3.24496 19.2094C4.37608 20.3448 5.95033 20.3843 9.09883 20.4634C11.0393 20.5122 12.9607 20.5122 14.9012 20.4634C18.0497 20.3843 19.6239 20.3448 20.7551 19.2094C21.8862 18.0739 21.9189 16.5412 21.9842 13.4756C22.0053 12.4899 22.0053 11.5101 21.9842 10.5244C21.9189 7.45886 21.8862 5.92609 20.7551 4.79066C19.6239 3.65523 18.0497 3.61568 14.9012 3.53657C12.9607 3.48781 11.0393 3.48781 9.09882 3.53656C5.95033 3.61566 4.37608 3.65521 3.24495 4.79065C2.11382 5.92608 2.08114 7.45885 2.01576 10.5244C1.99474 11.5101 1.99475 12.4899 2.01577 13.4756Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
        </svg>',
        'password' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M4.26781 18.8447C4.49269 20.515 5.87613 21.8235 7.55966 21.9009C8.97627 21.966 10.4153 22 12 22C13.5847 22 15.0237 21.966 16.4403 21.9009C18.1239 21.8235 19.5073 20.515 19.7322 18.8447C19.879 17.7547 20 16.6376 20 15.5C20 14.3624 19.879 13.2453 19.7322 12.1553C19.5073 10.485 18.1239 9.17649 16.4403 9.09909C15.0237 9.03397 13.5847 9 12 9C10.4153 9 8.97627 9.03397 7.55966 9.09909C5.87613 9.17649 4.49269 10.485 4.26781 12.1553C4.12105 13.2453 4 14.3624 4 15.5C4 16.6376 4.12105 17.7547 4.26781 18.8447Z" stroke="currentColor" stroke-width="1.5" />
            <path d="M7.5 9V6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M16 15.49V15.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 15.49V15.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M8 15.49V15.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'login' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M14 3.09502C13.543 3.03241 13.0755 3 12.6 3C7.29807 3 3 7.02944 3 12C3 16.9706 7.29807 21 12.6 21C13.0755 21 13.543 20.9676 14 20.905" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M13.5 14.5C12.9943 14.0085 11 12.7002 11 12M13.5 9.5C12.9943 9.99153 11 11.2998 11 12M11 12L21 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'logout' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M14 3.09502C13.543 3.03241 13.0755 3 12.6 3C7.29807 3 3 7.02944 3 12C3 16.9706 7.29807 21 12.6 21C13.0755 21 13.543 20.9676 14 20.905" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M21 12L11 12M21 12C21 11.2998 19.0057 9.99153 18.5 9.5M21 12C21 12.7002 19.0057 14.0085 18.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'alert-circle' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
            <path d="M11.992 15H12.001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 12L12 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'alert' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M5.32171 9.6829C7.73539 5.41196 8.94222 3.27648 10.5983 2.72678C11.5093 2.42437 12.4907 2.42437 13.4017 2.72678C15.0578 3.27648 16.2646 5.41196 18.6783 9.6829C21.092 13.9538 22.2988 16.0893 21.9368 17.8293C21.7376 18.7866 21.2469 19.6548 20.535 20.3097C19.241 21.5 16.8274 21.5 12 21.5C7.17265 21.5 4.75897 21.5 3.46496 20.3097C2.75308 19.6548 2.26239 18.7866 2.06322 17.8293C1.70119 16.0893 2.90803 13.9538 5.32171 9.6829Z" stroke="currentColor" stroke-width="1.5" />
            <path d="M11.992 16H12.001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 13L12 8.99997" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'checkmark-circle' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z" stroke="currentColor" stroke-width="1.5" />
            <path d="M8 12.75C8 12.75 9.6 13.6625 10.4 15C10.4 15 12.8 9.75 16 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'notification' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>',
        'view' =>
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>',
        'dashboard-square' => '
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>',
        'user-group' => '
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        'wechat' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M7 7H7.00897M12.991 7H13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M17.991 14.5H18M14 14.5H14.009" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10 16C10 18.7614 12.6863 21 16 21C16.9072 21 17.7673 20.8322 18.5382 20.5319C18.7266 20.4585 18.9312 20.4321 19.13 20.4689L22 21L21.3483 18.9702C21.2531 18.6738 21.3075 18.3533 21.4575 18.0805C21.8058 17.447 22 16.7424 22 16C22 13.2386 19.3137 11 16 11C12.6863 11 10 13.2386 10 16Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
            <path d="M17.8731 11.2485C17.9565 10.8434 18 10.4261 18 10C18 6.13401 14.4183 3 10 3C5.58172 3 2 6.13401 2 10C2 11.1124 2.29653 12.1641 2.8242 13.0981C2.97102 13.358 3.01971 13.6653 2.93243 13.9507L2 17L5.91414 16.2394C6.12183 16.199 6.33621 16.2273 6.53119 16.3094C7.61561 16.7662 8.84138 17.0157 10.1198 16.9992" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
        </svg>',
        'orders' => '
     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-bag"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>',
        'user' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
        'computer-settings' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M11.0029 2H10.0062C6.72443 2 5.08355 2 3.92039 2.81382C3.49006 3.1149 3.11577 3.48891 2.81445 3.91891C2 5.08116 2 6.72077 2 10C2 13.2792 2 14.9188 2.81445 16.0811C3.11577 16.5111 3.49006 16.8851 3.92039 17.1862C5.08355 18 6.72443 18 10.0062 18H14.0093C17.2911 18 18.932 18 20.0951 17.1862C20.5254 16.8851 20.8997 16.5111 21.2011 16.0811C21.8156 15.2042 21.9663 14.0941 22 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M18 9.71428V11M18 9.71428C16.8432 9.71428 15.8241 9.14608 15.2263 8.28331M18 9.71428C19.1568 9.71428 20.1759 9.14608 20.7737 8.28331M18 3.28571C19.1569 3.28571 20.1761 3.854 20.7738 4.71688M18 3.28571C16.8431 3.28571 15.8239 3.854 15.2262 4.71688M18 3.28571V2M22 3.92857L20.7738 4.71688M14.0004 9.07143L15.2263 8.28331M14 3.92857L15.2262 4.71688M21.9996 9.07143L20.7737 8.28331M20.7738 4.71688C21.1273 5.22711 21.3333 5.84035 21.3333 6.5C21.3333 7.15973 21.1272 7.77304 20.7737 8.28331M15.2262 4.71688C14.8727 5.22711 14.6667 5.84035 14.6667 6.5C14.6667 7.15973 14.8728 7.77304 15.2263 8.28331" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M11 15H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 18V22" stroke="currentColor" stroke-width="1.5" />
            <path d="M8 22H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>',
        'settings' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>',
        'moon' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>',
        'sun' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>',
        'filter' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>',
        'cloud-upload' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cloud-upload"><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/><path d="M12 12v9"/><path d="m16 16-4-4-4 4"/></svg>',
        'edit' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/></svg>',
        'bookmark' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bookmark"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/></svg>',
        'bookmark-add' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M11 2C7.22876 2 5.34315 2 4.17157 3.12874C3 4.25748 3 6.07416 3 9.70753V17.9808C3 20.2867 3 21.4396 3.77285 21.8523C5.26947 22.6514 8.0768 19.9852 9.41 19.1824C10.1832 18.7168 10.5698 18.484 11 18.484C11.4302 18.484 11.8168 18.7168 12.59 19.1824C13.9232 19.9852 16.7305 22.6514 18.2272 21.8523C19 21.4396 19 20.2867 19 17.9808V12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3.5 7H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M17 10L17 2M13 6H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>',
        'more-hortizontal' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M11.9959 12H12.0049" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M17.9998 12H18.0088" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M5.99981 12H6.00879" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'manager' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M20 22V17C20 15.1144 20 14.1716 19.4142 13.5858C18.8284 13 17.8856 13 16 13L12 22L8 13C6.11438 13 5.17157 13 4.58579 13.5858C4 14.1716 4 15.1144 4 17V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 15L11.5 19L12 20.5L12.5 19L12 15ZM12 15L11 13H13L12 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M15.5 6.5V5.5C15.5 3.567 13.933 2 12 2C10.067 2 8.5 3.567 8.5 5.5V6.5C8.5 8.433 10.067 10 12 10C13.933 10 15.5 8.433 15.5 6.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'add-circle' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>',
        'import' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cloud-download"><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/><path d="M12 12v9"/><path d="m8 17 4 4 4-4"/></svg>',
        'export' => '
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cloud-upload"><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/><path d="M12 12v9"/><path d="m16 16-4-4-4 4"/></svg>',
        'reload' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-cw"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg>',
        'information-circle' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z" stroke="currentColor" stroke-width="1.5" />
            <path d="M12.2422 17V12C12.2422 11.5286 12.2422 11.2929 12.0957 11.1464C11.9493 11 11.7136 11 11.2422 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M11.992 8H12.001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'dollar-circle' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" stroke="currentColor" stroke-width="1.5" />
            <path d="M14.7102 10.0611C14.6111 9.29844 13.7354 8.06622 12.1608 8.06619C10.3312 8.06616 9.56136 9.07946 9.40515 9.58611C9.16145 10.2638 9.21019 11.6571 11.3547 11.809C14.0354 11.999 15.1093 12.3154 14.9727 13.956C14.836 15.5965 13.3417 15.951 12.1608 15.9129C10.9798 15.875 9.04764 15.3325 8.97266 13.8733M11.9734 6.99805V8.06982M11.9734 15.9031V16.998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>',
        'package' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M12 22C11.1818 22 10.4002 21.6698 8.83693 21.0095C4.94564 19.3657 3 18.5438 3 17.1613C3 16.7742 3 10.0645 3 7M12 22C12.8182 22 13.5998 21.6698 15.1631 21.0095C19.0544 19.3657 21 18.5438 21 17.1613V7M12 22L12 11.3548" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M8.32592 9.69138L5.40472 8.27785C3.80157 7.5021 3 7.11423 3 6.5C3 5.88577 3.80157 5.4979 5.40472 4.72215L8.32592 3.30862C10.1288 2.43621 11.0303 2 12 2C12.9697 2 13.8712 2.4362 15.6741 3.30862L18.5953 4.72215C20.1984 5.4979 21 5.88577 21 6.5C21 7.11423 20.1984 7.5021 18.5953 8.27785L15.6741 9.69138C13.8712 10.5638 12.9697 11 12 11C11.0303 11 10.1288 10.5638 8.32592 9.69138Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 12L8 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M17 4L7 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'dollar' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dollar-sign"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
        'calendar' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>',
        'percent' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-percent"><line x1="19" x2="5" y1="5" y2="19"/><circle cx="6.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/></svg>',
        'cancel' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban"><circle cx="12" cy="12" r="10"/><path d="m4.9 4.9 14.2 14.2"/></svg>',
        'image-add' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image-plus"><path d="M16 5h6"/><path d="M19 2v6"/><path d="M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7.5"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/><circle cx="9" cy="9" r="2"/></svg>',
        'weight-scale' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-anvil"><path d="M7 10H6a4 4 0 0 1-4-4 1 1 0 0 1 1-1h4"/><path d="M7 5a1 1 0 0 1 1-1h13a1 1 0 0 1 1 1 7 7 0 0 1-7 7H8a1 1 0 0 1-1-1z"/><path d="M9 12v5"/><path d="M15 12v5"/><path d="M5 20a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3 1 1 0 0 1-1 1H6a1 1 0 0 1-1-1"/></svg>',
        'flash' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/></svg>',
        'pdf' =>
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>',
        'question' => '
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-help"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>',
        'heading' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M4 5V19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M14 5V19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M17 19H18.5M20 19H18.5M18.5 19V11L17 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M4 12L14 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'image-remove' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M11.5 2.5C7.02166 2.5 4.78249 2.5 3.39124 3.89124C2 5.28249 2 7.52166 2 12C2 16.4783 2 18.7175 3.39124 20.1088C4.78249 21.5 7.02166 21.5 11.5 21.5C15.9783 21.5 18.2175 21.5 19.6088 20.1088C21 18.7175 21 16.4783 21 12C21 11.6715 21 11.355 20.9995 11.05" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M2 13.6354C2.61902 13.5455 3.24484 13.5011 3.87171 13.5027C6.52365 13.4466 9.11064 14.2729 11.1711 15.8342C13.082 17.2821 14.4247 19.2749 15 21.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
            <path d="M21 16.3962C19.8246 15.8009 18.6088 15.4988 17.3862 15.5001C15.5345 15.4928 13.7015 16.1733 12 17.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
            <path d="M22 5.5H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>',
        'favourite' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"    color="#000000" fill="none">
            <path d="M19.4626 3.99415C16.7809 2.34923 14.4404 3.01211 13.0344 4.06801C12.4578 4.50096 12.1696 4.71743 12 4.71743C11.8304 4.71743 11.5422 4.50096 10.9656 4.06801C9.55962 3.01211 7.21909 2.34923 4.53744 3.99415C1.01807 6.15294 0.221721 13.2749 8.33953 19.2834C9.88572 20.4278 10.6588 21 12 21C13.3412 21 14.1143 20.4278 15.6605 19.2834C23.7783 13.2749 22.9819 6.15294 19.4626 3.99415Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>',
        'share' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M20.3927 8.03168L18.6457 6.51461C17.3871 5.42153 16.8937 4.83352 16.2121 5.04139C15.3622 5.30059 15.642 6.93609 15.642 7.48824C14.3206 7.48824 12.9468 7.38661 11.6443 7.59836C7.34453 8.29742 6 11.3566 6 14.6525C7.21697 13.9065 8.43274 13.0746 9.8954 12.7289C11.7212 12.2973 13.7603 12.5032 15.642 12.5032C15.642 13.0554 15.3622 14.6909 16.2121 14.9501C16.9844 15.1856 17.3871 14.5699 18.6457 13.4769L20.3927 11.9598C21.4642 11.0293 22 10.564 22 9.99574C22 9.4275 21.4642 8.96223 20.3927 8.03168Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10.5676 3C6.70735 3.00694 4.68594 3.10152 3.39411 4.39073C2 5.78202 2 8.02125 2 12.4997C2 16.9782 2 19.2174 3.3941 20.6087C4.78821 22 7.03198 22 11.5195 22C16.0071 22 18.2509 22 19.645 20.6087C20.6156 19.64 20.9104 18.2603 21 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'google' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
            <path d="M12 12H17C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C13.3807 7 14.6307 7.55964 15.5355 8.46447" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
        'twitter' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M3 21L10.5484 13.4516M21 3L13.4516 10.5484M13.4516 10.5484L8 3H3L10.5484 13.4516M13.4516 10.5484L21 21H16L10.5484 13.4516" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'file' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M8 17H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M8 13H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M13 2.5V3C13 5.82843 13 7.24264 13.8787 8.12132C14.7574 9 16.1716 9 19 9H19.5M20 10.6569V14C20 17.7712 20 19.6569 18.8284 20.8284C17.6569 22 15.7712 22 12 22C8.22876 22 6.34315 22 5.17157 20.8284C4 19.6569 4 17.7712 4 14V9.45584C4 6.21082 4 4.58831 4.88607 3.48933C5.06508 3.26731 5.26731 3.06508 5.48933 2.88607C6.58831 2 8.21082 2 11.4558 2C12.1614 2 12.5141 2 12.8372 2.11401C12.9044 2.13772 12.9702 2.165 13.0345 2.19575C13.3436 2.34355 13.593 2.593 14.0919 3.09188L18.8284 7.82843C19.4065 8.40649 19.6955 8.69552 19.8478 9.06306C20 9.4306 20 9.83935 20 10.6569Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'coupon' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M10.8738 21.5123L8.84345 20.3072C8.32816 20.0014 8.07051 19.8484 7.78457 19.8396C7.47557 19.83 7.21336 19.9767 6.65655 20.3072C6.03294 20.6774 4.79293 21.697 3.99083 21.2108C3.5 20.9132 3.5 20.1574 3.5 18.6457V8C3.5 5.17157 3.5 3.75736 4.37868 2.87868C5.25736 2 6.67157 2 9.5 2H14.5C17.3284 2 18.7426 2 19.6213 2.87868C20.5 3.75736 20.5 5.17157 20.5 8V18.6457C20.5 20.1574 20.5 20.9132 20.0092 21.2108C19.2071 21.697 17.9671 20.6774 17.3434 20.3072C16.8282 20.0014 16.5705 19.8484 16.2846 19.8396C15.9756 19.83 15.7134 19.9767 15.1566 20.3072L13.1262 21.5123C12.5786 21.8374 12.3047 21.9999 12 21.9999C11.6953 21.9999 11.4214 21.8374 10.8738 21.5123Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M15 8L9 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M15 14H14.991M9.00897 8H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'payment' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M13.5 15H6C4.11438 15 3.17157 15 2.58579 14.4142C2 13.8284 2 12.8856 2 11V7C2 5.11438 2 4.17157 2.58579 3.58579C3.17157 3 4.11438 3 6 3H18C19.8856 3 20.8284 3 21.4142 3.58579C22 4.17157 22 5.11438 22 7V12C22 12.9319 22 13.3978 21.8478 13.7654C21.6448 14.2554 21.2554 14.6448 20.7654 14.8478C20.3978 15 19.9319 15 19 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M14 9C14 10.1045 13.1046 11 12 11C10.8954 11 10 10.1045 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M13 17C13 15.3431 14.3431 14 16 14V12C16 10.3431 17.3431 9 19 9V14.5C19 16.8346 19 18.0019 18.5277 18.8856C18.1548 19.5833 17.5833 20.1548 16.8856 20.5277C16.0019 21 14.8346 21 12.5 21H12C10.1362 21 9.20435 21 8.46927 20.6955C7.48915 20.2895 6.71046 19.5108 6.30448 18.5307C6 17.7956 6 16.8638 6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'container-truck' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M19.5 17.5C19.5 18.8807 18.3807 20 17 20C15.6193 20 14.5 18.8807 14.5 17.5C14.5 16.1193 15.6193 15 17 15C18.3807 15 19.5 16.1193 19.5 17.5Z" stroke="currentColor" stroke-width="1.5" />
            <path d="M9.5 17.5C9.5 18.8807 8.38071 20 7 20C5.61929 20 4.5 18.8807 4.5 17.5C4.5 16.1193 5.61929 15 7 15C8.38071 15 9.5 16.1193 9.5 17.5Z" stroke="currentColor" stroke-width="1.5" />
            <path d="M14.5 17.5H9.5M19.5 17.5H20.2632C20.4831 17.5 20.5931 17.5 20.6855 17.4885C21.3669 17.4036 21.9036 16.8669 21.9885 16.1855C22 16.0931 22 15.9831 22 15.7632V13C22 9.41015 19.0899 6.5 15.5 6.5M15 15.5V7C15 5.58579 15 4.87868 14.5607 4.43934C14.1213 4 13.4142 4 12 4H5C3.58579 4 2.87868 4 2.43934 4.43934C2 4.87868 2 5.58579 2 7V15C2 15.9346 2 16.4019 2.20096 16.75C2.33261 16.978 2.52197 17.1674 2.75 17.299C3.09808 17.5 3.56538 17.5 4.5 17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6.5 7V10.9998M10.5 7V10.9998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'save-money-dollar' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M19.7453 13C20.5362 11.8662 21 10.4872 21 9C21 5.13401 17.866 2 14 2C10.134 2 7 5.134 7 9C7 10.0736 7.24169 11.0907 7.67363 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M14 6C12.8954 6 12 6.67157 12 7.5C12 8.32843 12.8954 9 14 9C15.1046 9 16 9.67157 16 10.5C16 11.3284 15.1046 12 14 12M14 6C14.8708 6 15.6116 6.4174 15.8862 7M14 6V5M14 12C13.1292 12 12.3884 11.5826 12.1138 11M14 12V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M3 14H5.39482C5.68897 14 5.97908 14.0663 6.24217 14.1936L8.28415 15.1816C8.54724 15.3089 8.83735 15.3751 9.1315 15.3751H10.1741C11.1825 15.3751 12 16.1662 12 17.142C12 17.1814 11.973 17.2161 11.9338 17.2269L9.39287 17.9295C8.93707 18.0555 8.449 18.0116 8.025 17.8064L5.84211 16.7503M12 16.5L16.5928 15.0889C17.407 14.8352 18.2871 15.136 18.7971 15.8423C19.1659 16.3529 19.0157 17.0842 18.4785 17.3942L10.9629 21.7305C10.4849 22.0063 9.92094 22.0736 9.39516 21.9176L3 20.0199" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'pin-code' => '
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
            <path d="M4.07407 7.92857C5.23724 6.24613 5.81883 5.40491 6.65298 4.95245C7.48714 4.5 8.45645 4.5 10.3951 4.5H15.0864C17.8607 4.5 19.2478 4.5 20.2442 5.22227C20.6756 5.53495 21.046 5.93674 21.3342 6.4047C22 7.48566 22 8.99044 22 12C22 15.0096 22 16.5143 21.3342 17.5953C21.046 18.0633 20.6756 18.465 20.2442 18.7777C19.2478 19.5 17.8607 19.5 15.0864 19.5H10.3951C8.45645 19.5 7.48714 19.5 6.65298 19.0475C5.81883 18.5951 5.23724 17.7539 4.07407 16.0714L3.92593 15.8571C2.64198 14 2 13.0714 2 12C2 10.9286 2.64198 10 3.92593 8.14286L4.07407 7.92857Z" stroke="currentColor" stroke-width="1.5" />
            <path d="M8.99981 12H9.00879" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12.9998 12H13.0088" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M16.9998 12H17.0088" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>',
        'go-back' =>
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-corner-down-left"><polyline points="9 10 4 15 9 20"/><path d="M20 4v7a4 4 0 0 1-4 4H4"/></svg>',
    ];

    $iconSvg = $icons[$icon] ?? null;

    if ($iconSvg) {
        $iconSvg = str_replace('<svg ', '<svg class="' . $class . '" ', $iconSvg);
    }

@endphp


@if ($iconSvg)
    {!! $iconSvg !!}
@endif
