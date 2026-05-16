@extends('layouts.guestLayout')

@section('content')
    <x-breadcrumb title="Our creative Design Portfolio" page="Print & Design" />

    <img src="{{ asset('printBg.png') }}" class="hero-bg" alt="Brand Background">
    {{-- <div class="hero-overlay"></div> --}}
    <section class="ai-hero-print" style="overflow-x: hidden">



        <div class="row ">
            <div class="col-lg-6">
                <div class=" ">
                    <h1 class="print-title text-white">
                        Printing & Advertising Projects <span>That Captivate Audiences</span>
                    </h1>

                    <p class="print-subtitle text-white">
                        Creative, impactful, and memorable—our printing and advertising projects grab attention and connect
                        with
                        your audience, making every campaign truly unforgettable.
                    </p>

                    {{-- <div class="hero-btns">
                        <a href="#" class="btn-primary-custom btn-brand-left">Brows Our Projects</a>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6">

                <div class="bubbles">
                    <div class="card1">2D & 3D Design</div>
                    {{-- <div class="card2">3D Design</div> --}}
                    <div class="card3">Hoardings</div>
                    <div class="card4">Flex Print</div>
                    <div class="card5">Digital Boards</div>
                    <div class="card6">Menu & Brouchers</div>
                    <div class="card7">Event Branding</div>
                    <div class="card8">App Design</div>
                    <div class="card9">Web Design</div>
                    {{-- <div class="card10">Web Design</div> --}}
                </div>
            </div>
        </div>

    </section>


    <section class="brand-sub-content">
        <x-print-portfolio :printCategories="$categories" :printPortfolios="$portfolios" />
        
        

    </section>
@endsection

@push('script')
    {{-- <script src="{{ asset('gsap/print.js') }}"></script> --}}
@endpush
<style>
    .brand-project-card {
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: #789ec39d 0px 5px 15px;
        transition: 1s !important;
        cursor: pointer;
    }
    .brand-project-card:hover{
        box-shadow: #789ec3 5px 10px 25px 12px;
        transform: translateY(-15px) !important;
    }

    .brand-project-card h4{
        color: #789ec3;
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

    .bubbles {
        z-index: 10;
        position: relative;
        height: 500px;
        padding-right: 300px
    }

    .bubbles div {
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #fff;
        z-index: 1;
    }

    .bubbles div:nth-child(1) {
        height: 150px;
        width: 150px;
        background-color: #111;
        position: absolute;
        top: 0%;
        right: 0%;
        padding: 10px;
        z-index: -3;
        transition: 0.5s !important;

    }

    .bubbles div:nth-child(1):hover {
        background-color: #789ec3 !important;
        cursor: pointer;
        border: #fff 1px solid;
    }

    .bubbles div:nth-child(2) {
        height: 130px;
        width: 130px;
        background-color: #9accff;
        position: absolute;
        top: 4.5%;
        right: 20%;
        padding: 10px;
        z-index: -3;
        transition: 0.8s !important;
        /* display: none     */


    }

    .bubbles div:nth-child(2):hover {
        background-color: #789ec3 !important;
        cursor: pointer;
        border: #fff 1px solid;
    }

    .bubbles div:nth-child(3) {
        height: 120px;
        width: 120px;
        background-color: #111;
        position: absolute;
        top: 5%;
        right: 37%;
        padding: 10px;
        z-index: -1;
        transition: 0.8s !important;
        /* display: none */


    }

    .bubbles div:nth-child(3):hover {
        background-color: #789ec3 !important;
        cursor: pointer;
        border: #fff 1px solid;
    }

    .bubbles div:nth-child(4) {
        height: 120px;
        width: 120px;
        background-color: #9accff;
        position: absolute;
        top: 20%;
        right: 50%;
        padding: 10px;
        z-index: -1;
        transition: 0.8s !important;
        /* display: none */


    }

    .bubbles div:nth-child(4):hover {
        background-color: #789ec3 !important;
        cursor: pointer;
        border: #fff 1px solid;
    }

    .bubbles div:nth-child(5) {
        height: 150px;
        width: 150px;
        background-color: #ced100;
        position: absolute;
        top: 20%;
        right: 32%;
        padding: 10px;
        z-index: -1;
        transition: 0.8s !important;
        /* display: none */


    }

    .bubbles div:nth-child(5):hover {
        background-color: #789ec3 !important;
        cursor: pointer;
        border: #fff 1px solid;
    }

    .bubbles div:nth-child(6) {
        height: 180px;
        width: 180px;
        background-color: #ff1100;
        position: absolute;
        top: 22%;
        right: 10%;
        padding: 10px;
        z-index: -3;
        transition: 0.8s !important;
        /* display: none */


    }

    .bubbles div:nth-child(6):hover {
        background-color: #789ec3 !important;
        cursor: pointer;
        border: #fff 1px solid;
    }

    .bubbles div:nth-child(7) {
        height: 130px;
        width: 130px;
        background-color: #111;
        position: absolute;
        top: 45%;
        right: 25%;
        padding: 10px;
        z-index: -2;
        transition: 0.8s !important;
        /* display: none */


    }

    .bubbles div:nth-child(7):hover {
        background-color: #789ec3 !important;
        cursor: pointer;
        border: #fff 1px solid;
    }

    .bubbles div:nth-child(8) {
        height: 150px;
        width: 150px;
        background-color: #ff1100;
        position: absolute;
        top: 40%;
        right: 40%;
        padding: 10px;
        z-index: -3;
        transition: 0.8s !important;
        /* display: none */


    }

    .bubbles div:nth-child(8):hover {
        background-color: #789ec3 !important;
        cursor: pointer;
        border: #fff 1px solid;
    }

    .bubbles div:nth-child(9) {
        height: 130px;
        width: 130px;
        background-color: #9accff;
        top: 36vh;
        right: 26vw;
        padding: 10px;
        z-index: 1;
        transition: 0.8s !important;
        display: none


    }

    .bubbles div:nth-child(9):hover {
        background-color: #789ec3 !important;
        cursor: pointer;
        border: #fff 1px solid;
    }

    .bubbles div:nth-child(10) {
        height: 130px;
        width: 130px;
        background-color: #ced100;
        top: 30vh;
        right: 5vw;
        padding: 10px;
        z-index: 2;
        transition: 0.8s !important;
        display: none


    }
</style>
<style>
    .ai-hero {
        height: 80vh;
        width: 100%;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: visible;
        padding-bottom: 15vh;
    }

    .hero-bg {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
        top: 0;
        left: 0;
        z-index: -1;
        opacity: 0.08;
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

    .print-title {
        font-size: 50px;
        font-weight: 700;
        margin-bottom: 20px;
        width: 100%;
        display: block
    }

    .print-title span {
        color: #00d2ff;
    }

    .print-subtitle {
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
        position: absolute;
        top: 64vh;
        left: 41vw;
        z-index: 9999 !important;
        width: 250px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .btn-primary-custom {
        background: #789ec3;
        padding: 14px 30px;
        border-radius: 30px;
        color: #000;
        font-weight: 600;
        text-decoration: none;
        color: #fff;
        /* transition: 1s; */
    }

    .btn-primary-custom:hover {
        background: #789ec3;
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
        padding-top: 10px;
        z-index: 1;
        padding-bottom: 50px
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
        z-index: -1 !important;
    }

    .brand-sub-content::after {
        content: "";
        position: absolute;
        top: -100px;
        right: 0;
        width: 100%;
        height: 200px;
        background: #fff;
        transform: skewY(5deg);
        z-index: -1 !important;
    }

    .section-title {
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
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: 0.3s;
    }

    .brand-card i {
        font-size: 40px;
        color: #00d2ff;
        margin-bottom: 20px;
    }

    .brand-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    .brand-image {
        width: 100%;
        height: 27vh;
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

    .btn-brand-left {
        position: absolute
    }

    .project-menus {
        padding: 10px 20px;
        background-color: #ccc;
        text-decoration: none;
        border-radius: 5px;
        color: #000
    }

    .project-menus.active {
        background-color: #789ec3;
        color: #fff;
    }
</style>
