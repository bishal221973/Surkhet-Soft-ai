@extends('layouts.guestLayout')

@section('content')
    <x-breadcrumb title="Content Production" page="Content Production" />

    {{-- <img src="{{ asset('brandBg.png') }}" class="hero-bg" alt="Brand Background"> --}}
    {{-- <div class="hero-overlay"></div> --}}
    <section class="ai-hero" style="height: 80vh;padding-bottom:20%">

        <canvas style="position: absolute" id="canvas"></canvas>
        <div class="row w-100" style="padding: 0 10%;margin-top:10vh">


            <h1 class="production-title text-center text-white" data-aos="zoom-in-up">High-impact storytelling
                designed to stop the scroll.</h1>

            <p class="text-white text-center mt-5 production-description" data-aos="flip-up" style="padding: 0 20%">Stop the
                scroll. Turn casual
                viewers into loyal customers with cinematic storytelling.</p>
        </div>



    </section>
    {{-- data-aos="zoom-in"  --}}
    <div style="" class="production-sub-title">
        <h3 class="text-white text-center">Content Production for Big and Important Events</h3>

    </div>
    <div class="bg-white" style="width: 100vw">
        <div style="" class="  my-radius production-category-list">
            <div class="" style="position: relative;width:10vw">

                <div class="category-card" style="">
                    <div class="row">
                        @foreach ($contentCategories as $contentCategory)
                            <div class="col-12 col-sm-6 col-md-4 mb-3" data-aos="zoom-in">
                                <a href="{{ route('front.productionShow', $contentCategory) }}"
                                    class="d-block cont-container">

                                    @if ($contentCategory->thumbnail)
                                        <img src="{{ asset('storage/' . $contentCategory->thumbnail) }}" alt="">
                                    @else
                                        <img src="{{ asset('storage/' . optional($contentCategory->contentImages->first())->image) }}"
                                            alt="">
                                    @endif

                                    <div class="content-overlay">
                                        <h5>{{ $contentCategory->name }}</h5>
                                    </div>

                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="bg-white my-radius"
                style="padding: 50px 50px 200px 50px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">
                <i class="fa fa-star d-block mx-auto" data-aos="zoom-in" style="color:#6CBEE1"></i>
                <small class="d-block text-center text-uppercase mt-2" data-aos="zoom-in"
                    style="letter-spacing:3px;color:#6CBEE1">About
                    us</small>
                <h2 class="text-center" data-aos="zoom-in" style="color: #444">Our business process road</h2>

                <div class="row" style="margin-top: 60px">
                    <div class="col-md-4 mb-5" data-aos="zoom-in" data-aos-delay="300">
                        <div class="d-flex gap-3">
                            <h1 style="font-size: 90px;color:#6CBEE1">01.</h1>
                            <div class="d-block">
                                <h3 style="">Create an Idea</h3>
                                <span>What’s hard is to develop the habits that enable us to come up with great
                                    ideas.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5" data-aos="zoom-in" data-aos-delay="400">
                        <div class="d-flex gap-3">
                            <h1 style="font-size: 90px;color:#6CBEE1">02.</h1>
                            <div class="d-block">
                                <h3 style="">Production Execution</h3>
                                <span>We handle filming, photography, and content creation with precision.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5" data-aos="zoom-in" data-aos-delay="500">
                        <div class="d-flex gap-3">
                            <h1 style="font-size: 90px;color:#6CBEE1">03.</h1>
                            <div class="d-block">
                                <h3 style="">Delivery & Growth</h3>
                                <span>We deliver ready-to-publish content and maximize reach, engagement, and value.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white mt-2">
            <div class="footer-glass-container bg-white animate__animated animate__rubberBand" style="margin: 0;padding:0">
                <div class="footer-glass" style="box-shadow: none">
                    <h3 class=" text-center capitalize animate__animated animate__swing">
                        Trusted by leading brands
                    </h3>
                    {{-- <div class="flex justify-center animate__animated animate__bounceIn">
                        <img src="/images/border1.png" class="d-block mx-auto" style="width:200px;opacity: 0.5" alt="" />
                    </div> --}}


                    <div class="my-carosel animate__animated animate__zoomIn">
                        <div class="group">
                            @foreach ($brands as $brand)
                                <a target="__blank" title="{{ $brand->name }}" href="{{ $brand->url }}" class="card1">
                                    <img src="/storage/{{ $brand?->logo }}" alt="">
                                </a>
                            @endforeach
                        </div>

                        <div class="group" aria-hidden>
                            @foreach ($brands as $brand)
                                <a target="__blank" title="{{ $brand->name }}" href="{{ $brand->url }}" class="card1">
                                    <img src="/storage/{{ $brand?->logo }}" alt="">
                                </a>
                            @endforeach
                        </div>
                    </div>
                    {{-- <img src="{{ asset('file.enc') }}" class="nav-logo" alt=""> --}}


                    {{-- <hr>
    
                    <small class="d-block text-center">
                        © 2024 Surkhet Soft. All rights reserved
                    </small> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        let c = init("canvas"),
            w = (canvas.width = window.innerWidth),
            h = (canvas.height = window.innerHeight);
        //initiation

        class firefly {
            constructor() {
                this.x = Math.random() * w;
                this.y = Math.random() * h;
                this.s = Math.random() * 2;
                this.ang = Math.random() * 2 * Math.PI;
                this.v = this.s * this.s / 4;
            }
            move() {
                this.x += this.v * Math.cos(this.ang);
                this.y += this.v * Math.sin(this.ang);
                this.ang += Math.random() * 20 * Math.PI / 180 - 10 * Math.PI / 180;
            }
            show() {
                c.beginPath();
                c.arc(this.x, this.y, this.s, 0, 2 * Math.PI);
                c.fillStyle = "#fddba3";
                c.fill();
            }
        }

        let f = [];

        function draw() {
            if (f.length < 100) {
                for (let j = 0; j < 10; j++) {
                    f.push(new firefly());
                }
            }
            //animation
            for (let i = 0; i < f.length; i++) {
                f[i].move();
                f[i].show();
                if (f[i].x < 0 || f[i].x > w || f[i].y < 0 || f[i].y > h) {
                    f.splice(i, 1);
                }
            }
        }

        let mouse = {};
        let last_mouse = {};

        canvas.addEventListener(
            "mousemove",
            function(e) {
                last_mouse.x = mouse.x;
                last_mouse.y = mouse.y;

                mouse.x = e.pageX - this.offsetLeft;
                mouse.y = e.pageY - this.offsetTop;
            },
            false
        );

        function init(elemid) {
            let canvas = document.getElementById(elemid),
                c = canvas.getContext("2d"),
                w = (canvas.width = window.innerWidth),
                h = (canvas.height = window.innerHeight);
            c.fillStyle = "rgba(30,30,30,1)";
            c.fillRect(0, 0, w, h);
            return c;
        }

        window.requestAnimFrame = (function() {
            return (
                window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimationFrame ||
                function(callback) {
                    window.setTimeout(callback);
                }
            );
        });

        function loop() {
            window.requestAnimFrame(loop);
            c.clearRect(0, 0, w, h);
            draw();
        }

        window.addEventListener("resize", function() {
            (w = canvas.width = window.innerWidth),
            (h = canvas.height = window.innerHeight);
            loop();
        });

        loop();
        setInterval(loop, 1000 / 60);
    </script>
@endpush

<style>
    .ai-hero {
        height: 80vh;
        width: 100%;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding-bottom: 15vh;
    }

    .hero-bg {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
        top: 0;
        left: 0;
        /* z-index: -2; */
        opacity: 0.1 !important;
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

    .banner-img1 {
        position: relative;
    }

    .banner-img1 img {
        border-radius: 10px;

    }

    .banner-img1 .card-hoverlay {
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, .5);
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    canvas {
        filter: blur(1px);
    }


    .cont-container {
        position: relative;

        height: 250px;
        overflow: hidden;
        border-radius: 10px;
    }

    .cont-container img {
        width: 100%;
        height: 100%;
        /* or whatever height you want */
        object-fit: cover;
        /* keeps aspect ratio */
        transition: 0.5s
    }

    .content-overlay {
        position: absolute;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, .3);
        top: 0;
        left: 0;
    }

    .cont-container:hover img {
        transform: scale(1.1);
    }

    .content-overlay h5 {
        color: #fff;
        position: absolute;
        left: 10px;
        bottom: 10px;
    }
</style>
