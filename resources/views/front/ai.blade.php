@extends('layouts.guestLayout')

@section('content')
    <x-breadcrumb title="Brand AI & Automation Solutions" page="AI / Automation" />

    <section class="ai-hero">

        <img src="{{ asset('herobg.png') }}" class="hero-bg" alt="AI Background">
        {{-- <div class="hero-overlay"></div> --}}

        <div class="ai-hero">
            <img src="{{ asset('robort.gif') }}" class="robortImg z-[9999]" alt="AI Background">
            <img src="{{ asset('robort.png') }}" class="robortImg1" alt="AI Background">
            <div class="hero-content" style="position: relative">
                <img src="{{ asset('ai.webp') }}"  style="position: absolute;z-index: -1;transform:scale(2);opacity:.1" alt="AI Background">

               <div style="z-index: 99">
                 <h1 class="ai-title text-white">
                    {{-- The future
                </h1>

                <h1 class="ai-title text-white">
                    of development
                </h1>

                <h1 class="ai-title highlight text-white">
                    is human + AI --}}
                    Streamlining workflows to unlock human creativity.
                </h1>

                <!-- <div class="d-felx justify-content-center"> -->
                <p class="hero-subtitle d-block">
                    Delete the busy work. Automate your tasks so you can lead your company.
                </p>
                <!-- </div> -->
                <!--  -->
                <div class="hero-buttons">
                    <a href="#" class="btn-primary">Explore Solutions</a>
                    <a href="#" class="btn-outline">Contact Us</a>
                </div>
               </div>

            </div>
        </div>

    </section>
    <div style="position: relative;overflow:hidden;z-index:1;" class="half-card">
        <x-half-circle-component />
        <!-- <x-ai-card/> -->
    </div>
    <div class="ai-project-list">
        {{-- <img src="{{ asset('aibg.jpg') }}" class="ai-bg" alt=""> --}}
        <div class="ai-list-container">
            <h1 class="text-white mb-5">Turn Manual Work Into Smart System</h1>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="glass-card1 p-3">
                        <img src="/lead.png" class="img-fluid rounded mb-3" alt="Lead Automation">
                        <h5 class="">Lead Automation</h5>
                        <p class="text-white-50">Automate your lead collection, follow-ups, and analytics seamlessly.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="glass-card1 p-3">
                        <img src="/customer.png" class="img-fluid rounded mb-3" alt="Customer Insights">
                        <h5 class="text-white">Customer Insights</h5>
                        <p class="text-white-50">Gain real-time insights about customer behavior and engagement.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="glass-card1 p-3">
                        <img src="/sales.png" class="img-fluid rounded mb-3" alt="Sales Reporting">
                        <h5 class="text-white">Sales Reporting</h5>
                        <p class="text-white-50">Generate automated reports to track sales performance efficiently.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="glass-card1 p-3">
                        <img src="/email.png" class="img-fluid rounded mb-3" alt="Email Campaigns">
                        <h5 class="text-white">Email Campaigns</h5>
                        <p class="text-white-50">Create personalized campaigns to nurture leads effectively.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="glass-card1 p-3">
                        <img src="/integration.png" class="img-fluid rounded mb-3" alt="Integration">
                        <h5 class="text-white">Integration</h5>
                        <p class="text-white-50">Easily integrate with CRM, email, and other business tools.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="glass-card1 p-3">
                        <img src="/analytics.png" class="img-fluid rounded mb-3" alt="Analytics">
                        <h5 class="text-white">Analytics</h5>
                        <p class="text-white-50">Track and analyze all lead activities with advanced dashboards.</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

<style>
    .robortImg {
        position: absolute;
        top: 35%;
        left: 10%;
        transform: scale(1.4);
        width: 200px;
        z-index: 10;
    }

    .ai-hero {
        /* position: relative; */
        height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hero-bg {
        position: absolute;
        width: 100%;
        height: 90.5vh;
        object-fit: cover;
        z-index: -1;
        top: 0 !important;
        opacity: 0.1;
    }

    .hero-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        background: linear-gradient(rgba(0, 0, 0, 0.7),
                rgba(0, 0, 0, 0.8));
        z-index: -1;
    }

    .hero-content {
        position: relative;
        z-index: 3;
        text-align: center;
        width: 50vw;
        margin-top: -100px;
    }

    .ai-title {
    font-size: clamp(32px, 5vw, 60px);

        font-weight: 700;
        color: #d0d0d0;
        margin: 0;
        line-height: 1.1;
    }

    .highlight {
        background: linear-gradient(90deg, #7f9cf5, #a78bfa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-subtitle {
        margin-top: 25px;
        color: #bbb;
        font-size: 17px;
        line-height: 1.6;
        /* width: 30vw; */
        display: block;
        padding: 0 100px;
        text-align: center;
    }

    .hero-buttons {
        margin-top: 40px;
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .btn-primary {
        background: #7f9cf5;
        padding: 14px 32px;
        border-radius: 30px;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-primary:hover {
        background: #6c84f2;
    }

    .btn-outline {
        border: 1px solid #7f9cf5;
        padding: 14px 32px;
        border-radius: 30px;
        color: #7f9cf5;
        text-decoration: none;
    }

    .btn-outline:hover {
        background: #7f9cf5;
        color: #fff;
    }

    .ai-sub-container {
        background: linear-gradient(180deg, #000, rgba(), #fff);
        min-height: 50vh;
    }
</style>

<style>
    .glass-card1 {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .glass-card1:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .text-white-50 {
        color: rgba(255, 255, 255, 0.7);
    }
    .img-fluid{
        height: 50px !important;
    }
</style>


@push('script')
    <script>
        gsap.registerPlugin(ScrollTrigger);

        var tl = gsap.timeline({
            scrollTrigger: {
                trigger: ".ai-hero",
                start: "80% 70%",
                end: "bottom 10%",
                scrub: 1.5,
                markers: false,
            }
        })

        tl.to(".robortImg", {
            x: 350,
            y: 750,
            scale: 1,
            duration: 2
        })
        tl.to(".ai-card", {
            bottom: 0,
            left: "10%",
        })
        tl.to(".ai-card1", {
            bottom: "38%",
            left: "22%",
        })

        tl.to(".ai-card2", {
            bottom: "55%",
            left: "42%",
        })


        tl.to(".ai-card3", {
            bottom: "38%",
            right: "22%",
        })


        tl.to(".ai-card4", {
            bottom: 0,
            right: "10%",
        })




        var tl1 = gsap.timeline({
            scrollTrigger: {
                trigger: ".ai-project-list",
                start: "0% 60%",
                end: "75% 80%",
                scrub: 1.5,
                markers: false,
            }
        })

        tl1.to(".robortImg", {
            top: 900,
            left: -250,
            height: "35vw",
            scale:1.3,
            width: "30vw",
        })
        
    </script>
@endpush
