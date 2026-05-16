@extends('layouts.guestLayout')

@section('content')
    <x-breadcrumb title="Marketing" page="Marketing" />

    <img src="{{ asset('brandBg.png') }}" class="hero-bg" alt="Brand Background">
    {{-- <div class="hero-overlay"></div> --}}
    <section class="marketing-hero">

        <canvas style="position: absolute" id="canvas"></canvas>
        <div class="row w-100" style="padding: 0 10%;margin-top:13vh">
            <div class="col-lg-6">
                <h1 class="text-white fw-bold marketing-title" style="width:100%">Digital Marketing That Actually Performs
                </h1>

                <ul class="m-0 px-3 mt-5">
                    <li class="text-white mb-2">Search Engine Optimization (SEO)</li>
                    <li class="text-white mb-2">Social Media Marketing</li>
                    <li class="text-white mb-2">Content Marketing</li>
                    <li class="text-white mb-2">Email Marketing</li>
                    <li class="text-white mb-2">Affiliate Marketing</li>
                </ul>
            </div>

            <div class="col-lg-6">
                <div class="glass-card-marketing d-flex justify-content-end">
                    <div class="d-block ">
                        <div class="glass-card1 gap-5" style="display: flex;background-color:#35a0e74d">
                            <div class="d-block mt-2">
                                <i class="fa fa-heart text-danger d-block text-center"></i>
                                <h5 class="text-center text-white">5K</h3>
                            </div>

                            <div class="d-block mt-2">
                                <i class="fa fa-heart text-danger d-block text-center"></i>
                                <h5 class="text-center text-white">5K</h3>
                            </div>

                            <div class="d-block mt-2">
                                <i class="fa fa-heart text-danger d-block text-center"></i>
                                <h5 class="text-center text-white">5K</h3>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end px-3 mt-3">
                            <div class="glass-card1 gap-5 mt-3" style="width: 160px;background-color:rgba(255, 0, 0, 0.17)">
                                <h3 class="text-white text-center m-0 p-0">2.5M</h3>
                                <div class="d-block text-white" style="font-size: 20px">
                                    Engagement
                                </div>


                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3" style="position: relative;left: 20px;">
                            <div class="glass-card1 gap-5 mt-3"
                                style="width: 100px;background-color:rgba(153, 92, 11, 0.384)">
                                <h3 class="text-white text-center m-0 p-0">2.5M</h3>
                                <div class="d-block text-white" style="font-size: 20px">
                                    Reach
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('ads/post.png') }}" alt="">
                    <img src="{{ asset('ads/123.png') }}" class="client-profile" alt="">
                    {{-- <b style="font-size: 18px" class="text-white"><span class="text-warning">Live </span> Campaign Preview</b> --}}
                </div>
            </div>

            <div class="col-12 mt-5">
                <hr class="bg-secondary text-white">
                <div class="" style="margin-top: 50px">
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
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white" style="margin-top: -7vh;overflow-x:hidden;padding:0 10%">
        <div class="row text-center pt-5">
            <h2 class="section-title">Campaign Portfolio</h2>
            <p class="section-subtitle">
                Explor marketing campaign portfolio
            </p>
            {{-- <img src="" alt=""> --}}
        </div>

        <div class="mt-5">
            <div class="d-flex justify-content-center gap-2 flex-wrap mt-3">

                <a href="javascript:void(0)" class="btn border py-1 selectCategory selectCategoryActive" data-id="all">
                    <small>All</small>
                </a>

                @foreach ($categories as $item)
                    <a href="javascript:void(0)" class="btn border py-1 selectCategory" data-id="{{ $item->id }}">
                        <small>{{ $item->name }}</small>
                    </a>
                @endforeach


            </div>

            <hr>
            <div class="container">
                <div class="row justify-content-center  " style="margin-left: -30px">

                    @foreach ($marketings as $marketing)
                        <div class="col-12 col-md-6 col-lg-4 portfolio-item"
                            data-category="{{ $marketing->marketing_category_id }}">

                            <div class="iframe-wrapper">
                                {!! $marketing->iframe !!}
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const buttons = document.querySelectorAll(".selectCategory");
            const items = document.querySelectorAll(".portfolio-item");

            function showItems(filtered) {
                gsap.fromTo(filtered, {
                    opacity: 0,
                    y: 30,
                    scale: 0.95
                }, {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.5,
                    stagger: 0.08,
                    ease: "power3.out"
                });
            }

            function filter(category) {

                let filtered = [];

                items.forEach(item => {
                    const cat = item.getAttribute("data-category");

                    if (category === "all" || category == cat) {
                        item.style.display = "block";
                        filtered.push(item);
                    } else {
                        item.style.display = "none";
                    }
                });

                showItems(filtered);
            }

            buttons.forEach(btn => {
                btn.addEventListener("click", function() {

                    buttons.forEach(b => b.classList.remove("selectCategoryActive"));
                    this.classList.add("selectCategoryActive");

                    const category = this.getAttribute("data-id");

                    gsap.to(items, {
                        opacity: 0,
                        y: 20,
                        scale: 0.98,
                        duration: 0.2,
                        stagger: 0.03,
                        onComplete: () => filter(category)
                    });

                });
            });

            // default load
            if (buttons.length) buttons[0].click();

        });
    </script>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.querySelectorAll(".iframe-wrapper").forEach(wrapper => {

                const iframe = wrapper.querySelector("iframe");
                if (!iframe) return;

                // Enable interaction only when user clicks
                wrapper.addEventListener("click", function() {
                    iframe.style.pointerEvents = "auto";
                });

                // Disable again when mouse leaves (IMPORTANT)
                wrapper.addEventListener("mouseleave", function() {
                    iframe.style.pointerEvents = "none";
                });

            });

        });
    </script>
@endpush

<style>
    .iframe-wrapper iframe {
        width: 100%;
        pointer-events: none;
    }

    .selectCategory {
        background: #f1f1f1;
        border-radius: 6px;
        transition: 0.3s;
    }

    .selectCategoryActive {
        background: #789ec3 !important;
        color: #fff !important;
    }

    .marketing-hero {
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
        height: 92.9vh;
        object-fit: cover;
        top: 0;
        left: 0;
        z-index: -1;
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
</style>
