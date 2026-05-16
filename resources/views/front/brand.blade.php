@extends('layouts.guestLayout')

@section('content')
    <x-breadcrumb title="Brand Development" page="Branding" />

    <img src="{{ asset('brandBg.png') }}" class="hero-bg" alt="Brand Background">
    {{-- <div class="hero-overlay"></div> --}}
    <section class="ai-hero">



        <div class="hero-container">
            {{-- @include('front.path') --}}

            <div class="hero-content">
                <h1 class="ai-title">
                    {{-- Build Your <span>Powerful Brand</span> --}}
                    Crafting identities that command premium positioning.
                </h1>

                <p class="ai-subtitle">
                    Don't just be seen—be remembered. We build brands that command authority.
                </p>

                <div class="hero-btns">
                    <a href="#" class="btn-primary-custom btn-brand-left">Start Your Brand</a>
                    <a href="#brandPortfolio" class="btn-outline-custom btn-brand-right">View Portfolio</a>
                </div>
            </div>

        </div>

    </section>


    <section class="brand-sub-content">

        <div class="container pb-5">

            <div class="row text-center mb-5" data-aos="zoom-in-up">
                <h2 class="section-title">Our Branding Services</h2>
                <p class="section-subtitle">
                    Everything you need to build a memorable brand
                </p>
            </div>

            <div class="row g-4 align-items-stretch">
                @foreach ($brandServices as $item)
                    <div class="col-12 col-sm-6 col-md-4 d-flex" data-aos="zoom-in-up" data-aos-delay="100">

                        <div class="brand-card w-100 d-flex flex-column">
                            <div class="d-flex justify-content-center">
                                {!! $item->icon !!}
                            </div>

                            <h4>{{ $item->name }}</h4>

                            <p class="flex-grow-1">
                                {{ $item->description }}
                            </p>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

    </section>

    <x-brand-portfolio :brandCategories="$brandCategories" :brandPortfolios="$brandPortfolios" />
@endsection

@push('script')
    <script>
        gsap.from(".ai-title", {
                y: 200,
                scale: 3,
                opacity: 0,
                duration: 1
            }),
            gsap.from(".ai-subtitle", {
                y: 200,
                scale: 3,
                opacity: 0,
                duration: 1,
                delay: 0.5
            })
        gsap.from(".btn-brand-left", {
            x: -300,
            opacity: 0,
            duration: 1,
            delay: 1
        })
        gsap.from(".btn-brand-right", {
            x: 300,
            opacity: 0,
            duration: 1,
            delay: 1
        })

        gsap.from(".brand-sub-content", {
            y: -200,
            duration: 1
        })
        // gsap.to(".prand-project-lists",{
        //     transform:"translateX(-55%)",
        //     scrollTrigger:{
        //         trigger:".brand-project",
        //         scroller:"body",
        //         markers:false,
        //         start:"top 0%",
        //         end:"top -150%",
        //         scrub: 1,
        //         pin:true
        //     }
        // })
    </script>
@endpush

<style>
    .ai-hero {
        height: 80vh;
        width: 100%;
        position: sticky !important;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding-bottom: 15vh;
        top: 0 !important
    }

    .hero-bg {
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        width: 100%;
        object-fit: cover;
        object-position: right;
        opacity: 0.1;
        z-index: -1;
    }

    .hero-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: linear-gradient(120deg, rgba(0, 0, 0, .8), rgba(0, 0, 0, .5));
        z-index: -1;
    }

    .hero-container {
        max-width: 1200px;
        width: 100%;
        padding: 0px;
        text-align: center;
        color: white;
    }

    .ai-title {
        font-size: 70px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .ai-title span {
        color: #fff;
    }

    .ai-subtitle {
        font-size: 20px;
        max-width: 700px;
        margin: auto;
        margin-bottom: 35px;
        opacity: .9;
    }

    .hero-btns {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .btn-primary-custom {
        background: #789ec3;
        padding: 14px 30px;
        border-radius: 30px;
        color: #f2f2f2;
        font-weight: 600;
        text-decoration: none;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .btn-outline-custom {
        border: 2px solid #fff;
        padding: 14px 30px;
        border-radius: 30px;
        color: #fff;
        text-decoration: none;
    }

    .btn-outline-custom:hover {
        background: #fff;
        color: #000;
    }


    /* =======================
   ANGLED SECTION
======================= */

    .brand-sub-content {
        background: #fff;
        position: relative;
        padding-top: 120px;
        position: sticky !important;
        top: -100px !important;
    }

    .brand-project {
        background: #f2f2f2;
        position: relative;
        padding-top: 120px;
    }

    .brand-sub-content::before {
        content: "";
        position: absolute;
        top: -100px;
        left: 0;
        width: 100%;
        height: 200px;
        background: #fff;
        transform: skewY(-5deg);
    }

    .section-title {
        font-size: 40px;
        font-weight: 700;
        color: #789ec3;
    }


    .section-title1 {
        font-size: 40px;
        font-weight: 700;

    }

    .section-subtitle {
        color: #777;
        margin-top: 10px;
    }


    /* =======================
   BRAND CARDS
======================= */

    .brand-card {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px #789ec36e;
        text-align: center;
        transition: 0.3s;
        cursor: pointer;
    }

    .brand-card i {
        font-size: 40px;
        color: #789ec3;
        margin-bottom: 20px;
    }

    .brand-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px #789ec3;
        background-color: #a1d0ff
    }

    .brand-project-card {
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff
    }

    .brand-project-image {
        position: absolute;
        height: 100vh;
        width: 100vw;
        top: 0;
        transform: rotate(180deg);
        opacity: 0.2;
        z-index: 0;
    }






    .brand-project-card {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        cursor: pointer;
    }

    .brand-image {
        height: 250px;
        width: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    /* Overlay */
    .brand-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 20px;
        color: #fff;
        background: linear-gradient(to top, rgba(120, 158, 195, 1), rgba(120, 158, 195, 0.9), rgba(120, 158, 195, 0.8), rgba(120, 158, 195, 0.7), transparent);
        z-index: 2;
    }

    /* Hover Effects */
    .brand-project-card:hover .brand-image {
        transform: scale(1.05);
    }

    .brand-project-card:hover .brand-overlay {
        background: linear-gradient(to top, rgba(120, 158, 195, 1), rgba(120, 158, 195, 0.8), rgba(120, 158, 195, 0.7), transparent);

    }

    /* Text Styling */
    .brand-overlay h4 {
        margin: 0;
        font-size: 20px;
        font-weight: 600;
    }

    .brand-overlay p {
        margin-top: 6px;
        font-size: 14px;
        opacity: 0.9;
    }

    .selectCategoryActive {
        background-color: #789EC3 !important;
        color: #fff !important;
    }

    @media (max-width: 768px) {

        .ai-title {
            font-size: 40px
        }

        .brand-sub-content {
            position: relative !important;
        }

        .brand-project {
            background: #f2f2f2;
            position: relative;
            margin-top: -200px;
        }

    }

    @media (max-width: 600px) {

        .ai-title {
            font-size: 35px
        }


    }

    @media (max-width: 510px) {

        .ai-title {
            font-size: 30px
        }

        .ai-subtitle {
            font-size: 16px
        }

        .hero-btns a {
            padding: 10px 20px 5px 20px !important;
            font-size: 13px
        }


    }
</style>
