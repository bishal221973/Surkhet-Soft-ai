@extends('layouts.guestLayout')
@section('content')
<div class="mobile-action-buttons">

    <a href="{{ route('front.collaboration') }}" class="btn-mbl btn-primary-mbl">
        <i class="fa-solid fa-handshake"></i>
        <span>Collaboration</span>
    </a>

    <a href="{{ route('front.team') }}" class="btn-mbl btn-secondary-mbl">
        <img src="{{ asset('images/team.png') }}" alt="">
        <span>Team</span>
    </a>

</div>
    <div class="d-flex justify-content-center mt-3 mt-[2%]">
        <div class="main-title animate__animated animate__zoomIn">
            <h1 class="text-white">Complete Business Engine</h4>

        </div>
    </div>
    <div style="margin-top: 10px" class=" animate__animated animate__slideInDown">
        <label style="color: #fff;" class="description d-block text-center">From Strategy to Branding, Production to AI - We
            Do It All.</label> <br>
        {{-- <small style="color: #fff;" class="description d-block text-center">Buil't for Speed. Engineered for Scale. We provide the integrated power your business needs to dominate.</small> --}}
    </div>
    <div class="body-wrapper" style="position: relative; display: flex; flex-direction: column;justify-content: space-between;">
        <div class="mt-5 justify-content-center menus-desktop animate__animated animate__backInDown"
            style="gap:10px;position: relative;">
            <x-home-card />
        </div>
        <div class="mt-5 justify-content-center menus-mobile1  animate__animated animate__backInDown"
            style="gap:0px;position: relative;">
            <x-mobile-home-card />
        </div>
        {{-- sfs --}}

        <div class="footer-glass-container animate__animated animate__rubberBand" style="">
            <div class="footer-glass">
                <h3 class=" text-center capitalize animate__animated animate__swing">
                    Trusted by leading brands
                </h3>


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
        {{-- <livewire:chatbot /> --}}
        @livewire('chatbot-component')
        <div class="fab-container">

            <!-- MAIN BUTTON -->
            <div class="fab-btn" id="fabToggle">
                <span class="fab-icon">+</span>
                <span class="fab-text">Visit Us</span>
            </div>

            <!-- SOCIAL BUTTONS -->
            <div class="fab-options">



                <a href="https://www.facebook.com/surkhetsoft" class="text-decoration-none fab-item facebook"
                    target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a href="https://www.instagram.com/surkhetsoft/" class="text-decoration-none fab-item instagram"
                    target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>

                <a href="https://www.tiktok.com/@surkhetsoftproduction" class="text-decoration-none fab-item tiktok"
                    target="_blank">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="https://www.linkedin.com/company/surkhet-soft-pvt-ltd/?viewAsMember=true"
                    class="text-decoration-none fab-item linkedin" target="_blank">
                    <i class="fab fa-linkedin-in"></i>
                </a>

            </div>

        </div>
        <a href="https://wa.me/9779864797152?text=Hello%20I%20am%20interested%20in%20your%20services.%20Please%20share%20more%20details."
            class="whatsapp-float" target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
        </a>

    </div>
@endsection

@push('style')
    <style>
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;

            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .whatsapp-float:hover {
            background-color: #1ebe5d;
        }







        /* CONTAINER */
        .fab-container {
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 9999;
        }

        /* MAIN BUTTON */

        /* OPTIONS CONTAINER */
        .fab-options {
            position: absolute;
            bottom: 70px;
            left: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* INDIVIDUAL BUTTON */
        .fab-item {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 20px;
            transform: scale(0);
            opacity: 0;
            transition: 0.3s;
        }

        /* COLORS */
        .whatsapp {
            background: #25D366;
        }

        .facebook {
            background: #1877F2;
        }

        .instagram {
            background: #E4405F;
        }

        .tiktok {
            background: #040404;
        }

        .linkedin {
            background: #2769AF;
        }

        /* SHOW STATE */
        .fab-container.active .fab-item {
            transform: scale(1);
            opacity: 1;
        }

        /* STAGGER DELAY */
        .fab-container.active .fab-item:nth-child(1) {
            transition-delay: 0.05s;
        }

        .fab-container.active .fab-item:nth-child(2) {
            transition-delay: 0.1s;
        }

        .fab-container.active .fab-item:nth-child(3) {
            transition-delay: 0.15s;
        }

        .fab-container.active .fab-item:nth-child(4) {
            transition-delay: 0.2s;
        }

        /* MAIN BUTTON */
        .fab-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #789ec3;
            color: #fff;
            padding: 12px 18px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease;
            overflow: hidden;
        }

        /* ICON */
        .fab-icon {
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: 0.4s;
        }

        /* TEXT */
        .fab-text {
            white-space: nowrap;
            transition: 0.4s;
        }

        /* HOVER EFFECT */
        .fab-btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.3);
        }

        /* ICON ROTATE ON ACTIVE */
        .fab-btn.active .fab-icon {
            transform: rotate(45deg);
        }

        /* PULSE ANIMATION */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(120, 158, 195, 0.6);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(120, 158, 195, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(120, 158, 195, 0);
            }
        }

        .fab-btn {
            animation: pulse 2s infinite;
        }
    </style>
@endpush

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const fab = document.querySelector(".fab-container");
            const toggle = document.getElementById("fabToggle");

            toggle.addEventListener("click", function() {
                fab.classList.toggle("active");
                toggle.classList.toggle("active");
            });

        });

        function toggleAnimation() {
            const elements = document.querySelectorAll('.animate__rubberBand');

            if (window.innerWidth < 600) {
                elements.forEach(el => el.classList.remove('animate__rubberBand'));
            } else {
                elements.forEach(el => el.classList.add('animate__rubberBand'));
            }
        }

        // Run on load
        toggleAnimation();

        // Run on resize
        window.addEventListener('resize', toggleAnimation);
    </script>
@endpush
