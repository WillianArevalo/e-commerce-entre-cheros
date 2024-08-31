@extends('layouts.template')
@section('title', 'Mis cupones')
@section('content')
    <div>
        <section class="mt-16 border">
            <div class="p-4 text-center">
                <h1 class="font-mystical text-4xl uppercase text-secondary">
                    Mis cupones
                </h1>
            </div>
            <div class="my-10 flex flex-wrap items-center justify-center gap-4">
                @if ($coupons)
                    @foreach ($coupons as $coupon)
                        <div class="relative h-auto w-80 rounded-xl"
                            style="background-image:linear-gradient(to right, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0)), url('{{ asset('images/coupon-bg.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                            <div class="p-4">
                                <h2 class="font-league-spartan text-3xl font-bold text-secondary">
                                    {{ $coupon->code }}
                                </h2>
                                <span class="flex items-center gap-1 text-xl font-semibold text-red-700">
                                    @if ($coupon->discount_type === 'percentage')
                                        - {{ $coupon->discount_value }}
                                        <x-icon icon="percent" class="h-4 w-4 text-current" />
                                    @else
                                        -
                                        <x-icon icon="dollar" class="h-4 w-4 text-current" />
                                        {{ $coupon->discount_value }}
                                    @endif
                                </span>
                                <a href="{{ Route('cart.applied-coupon', $coupon->code) }}"
                                    class="text-sm font-medium text-zinc-800 underline underline-offset-2">
                                    {{ \App\Utils\CouponRules::getRule($coupon->rule->predefined_rule) }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
    </div>
@endsection
