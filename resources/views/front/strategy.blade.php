@extends('layouts.guestLayout')
@section('content')
    <x-breadcrumb title="Our Strategy" page="Strategy" />

    <div id="fixedContent1" class="w-100 row align-items-center m-0 main-content-wrapper" style="position: relative;">
        <div class="col-md-6">
            <h1 class="strategy-title text-center text-md-start uppercase animate__animated animate__zoomIn">
                <span class="fw-bold">Sales Funnel </span>
                <span>Strategy</span>
            </h1>
            <h1 class="strategy-sub-title text-center text-md-start animate__animated animate__zoomIn">
                {{-- <span>That </span>
                <span class="fw-bold">Converts Visitors </span>
                <span>into Customers </span> --}}
                Architecting roadmaps for long-term scalability.
            </h1>

            <span style="color: #e9e9e9" class="d-block text-center text-md-start  my-4 animate__animated animate__zoomIn">From guessing to growing. We
                build the blueprint for your scale.</span>

            <div class="d-flex justify-content-center justify-content-md-start gap-2 my-10 strategy-btns animate__animated animate__bounceInDown">

                <a href="#strategyInfo" class="btn funnel-btn text-white fw-bold px-4 py-3 rounded shadow">
                    Get Funnel Blueprint
                </a>
                {{-- <button class="btn strategy-btn fw-bold px-4 py-3 rounded shadow">
                    Book strategy call
                </button> --}}
                <a class="btn strategy-btn fw-bold px-4 py-3 rounded shadow"
                    href="https://wa.me/9779814668499?text=Hello%2C%20I%E2%80%99m%20interested%20in%20booking%20a%20strategy%20call%20to%20discuss%20my%20project."
                    target="_blank">
                    Message on WhatsApp
                </a>
            </div>

            <div class="mt-5 d-flex flex-column justify-content-center justify-content-md-start align-items-center align-items-md-start gap-3 animate__animated animate__fadeInLeft">

                <div>
                    <div class="d-flex list-container align-items-center gap-3 mb-3 animate__animated animate__fadeInLeft">
                    <div class="list-circle d-flex justify-content-center align-items-center fw-bold"
                        style="height:35px;width:35px;background:white;font-size:14px;">
                        01
                    </div>
                    <h5 class="text-white fw-bold mb-0">Framework for Profit</h5>
                </div>

                <div class="d-flex list-container align-items-center gap-3 mb-3 animate__animated animate__fadeInLeft"
                    style="animation-delay: 0.2s">
                    <div class="list-circle d-flex justify-content-center align-items-center fw-bold"
                        style="height:35px;width:35px;background:white;font-size:14px;">
                        02
                    </div>
                    <h5 class="text-white fw-bold mb-0">Data Driven Execution</h5>
                </div>

                <div class="d-flex list-container align-items-center gap-3 mb-3 animate__animated animate__fadeInLeft"
                    style="animation-delay: 0.4s">
                    <div class="list-circle d-flex justify-content-center align-items-center fw-bold"
                        style="height:35px;width:35px;background:white;font-size:14px;">
                        03
                    </div>
                    <h5 class="text-white fw-bold mb-0">Scalable Growth System</h5>
                </div>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            @php
                $steps = [
                    [
                        'title' => 'Awareness',
                        'description' => 'Attracts qualified prospects',
                    ],
                    [
                        'title' => 'Lead Capture',
                        'description' => 'Capture contact details.',
                    ],
                    [
                        'title' => 'Nurture',
                        'description' => 'Build authority & credibility',
                    ],
                    [
                        'title' => 'Conversion',
                        'description' => 'Turn leads into customers.',
                    ],
                    [
                        'title' => 'Retention',
                        'description' => 'Keep your audience engaged',
                    ],
                ];
            @endphp
            <x-triangular-hierarchy :steps="$steps" />
        </div>
    </div>
    <div id="placeholder"></div>
    <div class="divider-glass" id="strategyInfo" style="z-index: 999">
        <div class="mt-10" data-aos="zoom-in-up">
            <!-- <hr> -->
            <h3 class="text-dark fw-bold text-center capitalize">
                <span>What is a </span>
                <span class="font-bold">Social Funnel ?</span>
            </h3>
            <small class="d-block text-secondary text-center" style="letter-spacing: 1px;">A Stractured journy that moves
                your
                audience from discovery to loyalty.</small>
        </div>

        @php
            $steps = [
                [
                    'title' => 'Awareness',
                    'description' => 'Attracts qualified prospects',
                    'lists' => ['Social Ads', 'Short form content', 'Creative hooks', 'Targeted traffic'],
                ],
                [
                    'title' => 'Lead Capture',
                    'description' => 'Capture contact details',
                    'lists' => ['High-converting Landing Page', 'Leads Magnets', 'Clear CTA Strategy'],
                ],
                [
                    'title' => 'Nurture',
                    'description' => 'Build authority & credibility',
                    'lists' => ['Email Automation', 'Whatsnipg trons', 'Retargeting Ads', 'Case Study remarketing'],
                ],
                [
                    'title' => 'Conversion',
                    'description' => 'Turn leads into customers',
                    'lists' => [
                        'Sales page optimization',
                        'Checkout Ux',
                        'Booking System Stracture',
                        'Scarcity miagers',
                    ],
                ],
                [
                    'title' => 'Retention',
                    'description' => 'Keep your audience engaged',
                    'lists' => [
                        'Regular Email and messaging marketting',
                        'Personaliz Recomandations',
                        'Loyalty Programs',
                    ],
                ],
            ];
        @endphp
        <x-stepper-component :steps="$steps" :active-step="5" />






        <div class="mt-5" data-aos="zoom-in">
            <!-- <hr> -->
            <h3 class="page-title fw-bold text-center">
                <span>Where </span>
                <span class="font-bold">Social Media</span>
                <span>Meets Funnel </span>
                <span class="font-bold">Architecture</span>
            </h3>
            <small class="d-block text-secondary text-center" style="letter-spacing: 1px;">We Integrate Content and Social
                Strategies with a custom sales funnel system, but for growth.</small>
        </div>
        <div class="footer-glass py-8 px-[10%] mt-5" data-aos="zoom-out">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <div class="circle1"></div>
                    <span class="block text-gray-700">Social</span>
                </div>
                <i class="fa fa-arrow-right text-secondary"></i>
                <div class="d-flex align-items-center gap-3">
                    <div class="circle1"></div>
                    <span class="block text-gray-700">Lead Capture</span>
                </div>
                <i class="fa fa-arrow-right text-secondary"></i>
                <div class="d-flex align-items-center gap-3">
                    <div class="circle1"></div>
                    <span class="block text-gray-700">Email</span>
                </div>
                <i class="fa fa-arrow-right text-secondary"></i>
                <div class="d-flex align-items-center gap-3">
                    <div class="circle1"></div>
                    <span class="block text-gray-700">Retarget</span>
                </div>
                <i class="fa fa-arrow-right text-secondary"></i>
                <div class="d-flex align-items-center gap-3">
                    <div class="circle1"></div>
                    <span class="block text-gray-700">Conversion</span>
                </div>
                <i class="fa fa-arrow-right text-secondary"></i>
                <div class="d-flex align-items-center gap-3">
                    <div class="circle1"></div>
                    <span class="block text-gray-700">Upsell</span>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <!-- <hr> -->
            <h3 class="page-title  text-center" data-aos="flip-up">
                <span>Ready to build a revenue system___Not just a website ? </span>
            </h3>
            <div class="d-flex justify-content-center gap-5 my-5 animate__animated animate__bounceInDown">

                {{-- <button data-aos="fade-right" class="btn funnel-btn text-white fw-bold px-4 py-3 rounded shadow">
                    Get Funnel Blueprint
                </button>
                <button data-aos="fade-left" class="btn strategy-btn fw-bold px-4 py-3 rounded shadow">
                    Book strategy call
                </button> --}}

                <a class="btn strategy-btn fw-bold px-4 py-3 rounded shadow"
                    href="https://wa.me/9779814668499?text=Hello%2C%20I%E2%80%99m%20interested%20in%20booking%20a%20strategy%20call%20to%20discuss%20my%20project."
                    target="_blank">
                    Message on WhatsApp
                </a>
            </div>
        </div>
    </div>
@endsection
@push('script')
    
@endpush
