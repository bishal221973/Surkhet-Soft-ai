@extends('layouts.guestLayout')

@section('content')
    <div class="hero-wrapper">

        <!-- BACKGROUND SHAPES -->
        <div class="bg-shape shape1"></div>
        <div class="bg-shape shape2"></div>
        <div class="bg-shape shape3"></div>

        <div class="container-fluid">
            <div class="row hero-section">

                <!-- LEFT SIDE -->
                <div class="col-lg-6 d-flex flex-column justify-content-center left-side" style="padding-left: 10%">

                    <span class="hero-badge">
                        Creative Digital Agency
                    </span>

                    <h1 class="hero-title">
                        Collaboration
                    </h1>

                    <p class="hero-description">
                        Turning creative ideas into powerful designs and meaningful
                        digital experiences for modern businesses and brands.
                    </p>

                    <!-- STATS -->
                    <div class="hero-stats">

                        <div class="stat-box">
                            <h3>120+</h3>
                            <span>Projects</span>
                        </div>

                        <div class="stat-box">
                            <h3>80+</h3>
                            <span>Clients</span>
                        </div>

                        <div class="stat-box">
                            <h3>10+</h3>
                            <span>Years</span>
                        </div>

                    </div>

                    <!-- BUTTONS -->
                    <div class="hero-buttons">

                        <button class="btn-primary-custom" data-toggle="modal" data-target="#needEngineModal">
                            Get Started
                        </button>

                        <button class="btn-secondary-custom" data-toggle="modal" data-target="#partnerModal">
                            Become a partner
                        </button>

                    </div>

                </div>

                <!-- RIGHT SIDE -->
                <div class="col-lg-6 d-flex align-items-center justify-content-center">

                    <div class="team-wrapper">

                        <!-- TOP USER -->
                        <div class="user-circle user-circle1">
                            <img src="{{ asset('user.png') }}" alt="">
                        </div>

                        <!-- ARROW -->
                        <img src="{{ asset('rotate.png') }}" alt="" class="arrow1">

                        <div class="d-flex align-items-center justify-content-center">

                            <!-- LEFT USER -->
                            <div class="user-circle user-circle2">
                                <img src="{{ asset('user1.png') }}" alt="">
                            </div>

                            <!-- ARROW -->
                            <img src="{{ asset('rotate.png') }}" alt="" class="arrow2">

                            <!-- CENTER -->
                            <div class="handshake mx-3">
                                <i class="fa-solid fa-handshake"></i>
                            </div>

                            <!-- RIGHT USER -->
                            <div class="user-circle user-circle2">
                                <img src="{{ asset('user3.png') }}" alt="">
                            </div>

                            <!-- ARROW -->
                            <img src="{{ asset('rotate.png') }}" alt="" class="arrow3">

                        </div>

                        <!-- FLOATING CARDS -->
                        <div class="floating-card card1">
                            <i class="fa-solid fa-lightbulb"></i>
                            Creative Ideas
                        </div>

                        <div class="floating-card card2">
                            <i class="fa-solid fa-pen-ruler"></i>
                            Design Strategy
                        </div>

                        <div class="floating-card card3">
                            <i class="fa-solid fa-chart-line"></i>
                            Business Growth
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <x-growth />
    <x-collaborator />
    <div class="modal fade" id="needEngineModal" tabindex="-1" role="dialog" aria-labelledby="needEngineModalTitle"
        aria-hidden="true" style="z-index: 999999999 !important">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="z-index: 99999999" role="document">
            <div class="modal-content border-0 shadow-lg">

                <!-- Header -->
                <div class="modal-header text-white d-flex py-0 justify-content-between" style="background-color: #789EC3">
                    <div>
                        <h4 class="modal-title mb-0" id="needEngineModalTitle">
                            Need Engine Form
                        </h4>
                        <small>Please fill in your project requirements</small>
                    </div>

                    <button type="button" class="btn btn-danger text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form -->
                <form action="{{ route('front.collaboration.store') }}" method="POST">
                    @csrf
                    <div class="modal-body px-4 py-4">

                        <!-- Personal Information -->
                        <div class="mb-1">
                            <span class="d-block fw-bold w-full border-bottom  mb-2">
                                Personal Information
                            </span>

                            <div class="row">

                                <div class="col-md-4 mb-1">
                                    <label>
                                        Full Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter your full name" required>
                                </div>

                                <div class="col-md-4 mb-1">
                                    <label>
                                        Phone Number
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Enter your phone number" required>
                                </div>

                                <div class="col-md-4 mb-1">
                                    <label>
                                        Email Address
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                        required>
                                </div>

                            </div>
                        </div>

                        <!-- Company Information -->
                        <div class="mb-1">

                            <span class="d-block fw-bold w-full border-bottom  mb-2">
                                Company Information
                            </span>

                            <div class="row">

                                <div class="col-md-6 mb-1">
                                    <label>Company Name</label>

                                    <input type="text" name="company_name" class="form-control"
                                        placeholder="Enter company name">
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label>Industry Type</label>

                                    <input type="text" name="industry" class="form-control"
                                        placeholder="Software, Manufacturing, Ecommerce etc.">
                                </div>

                            </div>

                        </div>

                        <!-- Project Details -->
                        <div class="mb-1">

                            <span class="d-block fw-bold w-full border-bottom  mb-2">
                                Project Details
                            </span>

                            <div class="row">

                                <div class="col-md-6 mb-1">
                                    <label>Project Type</label>

                                    <select name="project_type" class="form-control">

                                        <option value="">
                                            Select Project Type
                                        </option>

                                        <option value="website">
                                            Website
                                        </option>

                                        <option value="mobile_app">
                                            Mobile App
                                        </option>

                                        <option value="software">
                                            Software Development
                                        </option>

                                        <option value="branding">
                                            Branding
                                        </option>

                                        <option value="marketing">
                                            Digital Marketing
                                        </option>

                                    </select>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label>Estimated Budget</label>

                                    <select name="budget" class="form-control">

                                        <option value="">
                                            Select Budget Range
                                        </option>

                                        <option value="1000-5000">
                                            $1,000 - $5,000
                                        </option>

                                        <option value="5000-10000">
                                            $5,000 - $10,000
                                        </option>

                                        <option value="10000+">
                                            $10,000+
                                        </option>

                                    </select>
                                </div>

                                <div class="col-md-12 mb-1">
                                    <label>
                                        Project Description
                                    </label>

                                    <textarea name="description" rows="5" class="form-control"
                                        placeholder="Describe your project requirements..."></textarea>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer bg-light pb-0">

                        <button type="submit" class="btn btn-primary px-4">

                            Submit
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <div class="modal fade" id="partnerModal" tabindex="-1" role="dialog" aria-labelledby="partnerModalTitle"
        aria-hidden="true" style="z-index:9999999">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <div class="modal-content border-0 shadow-lg">

                <!-- Header -->
                <div class="modal-header text-white d-flex justify-content-between py-2"
                    style="background-color:#789EC3;">

                    <div>
                        <h4 class="modal-title mb-0" id="partnerModalTitle">

                            Become a Partner
                        </h4>

                        <small>
                            Let’s build something amazing together
                        </small>
                    </div>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">

                        &times;
                    </button>

                </div>

                <!-- Form -->
                <form action="{{ route('front.partner.store') }}" method="POST">

                    @csrf

                    <div class="modal-body px-4 py-4">

                        <!-- Personal Info -->
                        <div class="mb-3">

                            <span class="d-block fw-bold border-bottom mb-3">
                                Personal Information
                            </span>

                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <label>
                                        Full Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter full name" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Email Address</label>

                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter email address">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Phone Number</label>

                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Enter phone number">
                                </div>

                            </div>

                        </div>

                        <!-- Company Info -->
                        <div class="mb-3">

                            <span class="d-block fw-bold border-bottom mb-3">
                                Company Information
                            </span>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label>Company Name</label>

                                    <input type="text" name="company_name" class="form-control"
                                        placeholder="Enter company name">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Website</label>

                                    <input type="text" name="website" class="form-control"
                                        placeholder="https://example.com">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Industry</label>

                                    <input type="text" name="industry" class="form-control"
                                        placeholder="Software, Ecommerce etc.">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Company Size</label>

                                    <select name="company_size" class="form-control">

                                        <option value="">
                                            Select Company Size
                                        </option>

                                        <option value="1-10">
                                            1 - 10 Employees
                                        </option>

                                        <option value="11-50">
                                            11 - 50 Employees
                                        </option>

                                        <option value="51-200">
                                            51 - 200 Employees
                                        </option>

                                        <option value="200+">
                                            200+ Employees
                                        </option>

                                    </select>
                                </div>

                            </div>

                        </div>

                        <!-- Partnership Info -->
                        <div class="mb-3">

                            <span class="d-block fw-bold border-bottom mb-3">
                                Partnership Details
                            </span>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label>Partnership Type</label>

                                    <select name="partnership_type" class="form-control">

                                        <option value="">
                                            Select Partnership Type
                                        </option>

                                        <option value="agency">
                                            Agency Partner
                                        </option>

                                        <option value="technology">
                                            Technology Partner
                                        </option>

                                        <option value="marketing">
                                            Marketing Partner
                                        </option>

                                        <option value="reseller">
                                            Reseller Partner
                                        </option>

                                        <option value="investor">
                                            Investor
                                        </option>

                                    </select>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>Country</label>

                                    <input type="text" name="country" class="form-control" placeholder="Country">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>City</label>

                                    <input type="text" name="city" class="form-control" placeholder="City">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>
                                        Partnership Proposal
                                    </label>

                                    <textarea name="message" rows="5" class="form-control" placeholder="Tell us about your partnership idea..."></textarea>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer bg-light">



                        <button type="submit" class="btn btn-primary px-4">

                            Submit
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // alert("{{ session('success') }}");
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endif
@endsection

@push('style')
    
<style>
    body {
        overflow-x: hidden;
        min-height: 100vh;

        background: linear-gradient(60deg,
                #789EC3,
                #5e86b0,
                #c7ddf1,
                #789EC3) !important;

        background-size: 400% 400%;
        /* animation: gradientMove 12s ease infinite; */
    }

    .hero-wrapper {
        position: relative;
        overflow: hidden;
    }

    .hero-section {
        min-height: 92vh;
        position: relative;
        z-index: 2;
    }

    /* BACKGROUND SHAPES */
    .bg-shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        filter: blur(40px);
        z-index: 1;
    }

    .shape1 {
        width: 280px;
        height: 280px;
        top: -100px;
        left: -100px;
    }

    .shape2 {
        width: 240px;
        height: 240px;
        bottom: -60px;
        right: -60px;
    }

    .shape3 {
        width: 180px;
        height: 180px;
        top: 40%;
        left: 45%;
    }

    /* LEFT SIDE */
    .left-side {
        padding-left: 10%;
    }

    .hero-badge {
        width: fit-content;
        padding: 8px 18px;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.15);
        color: white;
        font-size: 14px;
        font-weight: 600;
        backdrop-filter: blur(10px);
        margin-bottom: 20px;
    }

    .hero-title {
        font-size: 58px;
        font-weight: 800;
        color: white;
        line-height: 1.05;
        margin-bottom: 20px;
        text-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .hero-description {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.85);
        line-height: 1.8;
        max-width: 480px;
    }

    /* STATS */
    .hero-stats {
        display: flex;
        gap: 18px;
        margin-top: 25px;
    }

    .stat-box {
        background: rgba(255, 255, 255, 0.12);
        padding: 14px 22px;
        border-radius: 16px;
        backdrop-filter: blur(10px);
        color: white;
        text-align: center;
        min-width: 95px;
    }

    .stat-box h3 {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
    }

    .stat-box span {
        font-size: 12px;
        opacity: .8;
    }

    /* BUTTONS */
    .hero-buttons {
        margin-top: 30px;
        display: flex;
        gap: 15px;
    }

    .btn-primary-custom,
    .btn-secondary-custom {
        border: none;
        height: 48px;
        padding: 0 28px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 14px;
        transition: .4s;
    }

    .btn-primary-custom {
        background: white;
        color: #789EC3;
    }

    .btn-secondary-custom {
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.4);
        color: white;
        backdrop-filter: blur(10px);
    }

    .btn-primary-custom:hover,
    .btn-secondary-custom:hover {
        transform: translateY(-5px);
    }

    /* TEAM WRAPPER */
    .team-wrapper {
        position: relative;
        z-index: 2;
    }

    /* USER CIRCLE */
    .user-circle {
        height: 135px;
        width: 135px;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(10px);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.25);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        animation: float 4s ease-in-out infinite;
    }

    .user-circle img {
        height: 90px;
        width: 90px;
        object-fit: contain;
    }

    .user-circle1 {
        margin: 0 auto;
    }

    .user-circle2 {
        position: relative;
        top: 25px;
    }

    /* HANDSHAKE */
    .handshake {
        position: relative;
        font-size: 42px;
        color: white;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        height: 120px;
        width: 120px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.25);
        animation: pulse 2s infinite;
        overflow: hidden;
    }

    .handshake::after {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;

        background: linear-gradient(90deg,
                transparent,
                rgba(255, 255, 255, 0.35),
                transparent);

        animation: rotateGlow 4s linear infinite;
    }

    /* ARROWS */
    .arrow1,
    .arrow2,
    .arrow3 {
        position: absolute;
        height: 60px;
        animation: arrowBounce 2s infinite ease-in-out;
    }

    .arrow1 {
        transform: rotate(-30deg);
        top: 25%;
        right: 72%;
    }

    .arrow2 {
        transform: rotate(90deg) !important;
        top: 25%;
        left: 72%;
    }

    .arrow3 {
        transform: rotate(220deg) !important;
        top: 100%;
        right: 42%;
    }

    /* FLOATING CARDS */
    .floating-card {
        position: absolute;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        padding: 10px 18px;
        border-radius: 12px;
        color: white;
        font-size: 13px;
        font-weight: 600;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        animation: float 4s infinite ease-in-out;
    }

    .floating-card i {
        margin-right: 8px;
    }

    .card1 {
        top: 10%;
        left: -5%;
    }

    .card2 {
        top: 12%;
        right: 0%;
    }

    .card3 {
        bottom: -5%;
        left: 28%;
    }

    /* ANIMATIONS */
    @keyframes gradientMove {

        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    @keyframes float {

        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-12px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    @keyframes pulse {

        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.06);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes arrowBounce {

        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-8px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    @keyframes rotateGlow {

        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    /* RESPONSIVE */
    @media(max-width:991px) {

        .left-side {
            padding: 60px 30px !important;
            text-align: center;
            align-items: center;
        }

        .hero-title {
            font-size: 42px;
        }

        .hero-stats {
            justify-content: center;
            flex-wrap: wrap;
        }

        .hero-buttons {
            justify-content: center;
            flex-wrap: wrap;
        }

        .team-wrapper {
            margin-top: 50px;
            margin-bottom: 100px;
        }

        .user-circle {
            height: 100px;
            width: 100px;
        }

        .user-circle img {
            height: 65px;
            width: 65px;
        }

        .handshake {
            height: 85px;
            width: 85px;
            font-size: 32px;
        }

        .arrow1,
        .arrow2,
        .arrow3 {
            height: 45px;
        }

        .floating-card {
            display: none;
        }
    }

    /* LARGE SCREEN BALANCE */
    @media(min-width:1400px) {

        .hero-section {
            min-height: 85vh;
            max-width: 1400px;
            margin: 0 auto;
        }

        .left-side {
            padding-left: 10% !important;
        }

        .hero-title {
            font-size: 65px;
        }

        .hero-description {
            font-size: 20px;
            max-width: 430px;
        }

        .hero-stats {
            gap: 14px;
        }

        .stat-box {
            padding: 20px 40px;
            min-width: 85px;
        }

        .stat-box h3 {
            font-size: 25px;
        }

        .btn-primary-custom,
        .btn-secondary-custom {
            height: 55px;
            padding: 0 35px;
            font-size: 18px;
        }

        /* TEAM */
        .team-wrapper {
            transform: scale(1.25);
        }

        .floating-card {
            font-size: 12px;
            padding: 8px 14px;
        }

        .card1 {
            left: 0%;
        }

        .card2 {
            right: 2%;
        }

        .card3 {
            bottom: 0%;
        }
    }

    /* EXTRA LARGE MONITORS */
    @media(min-width:1700px) {

        .hero-section {
            max-width: 1500px;
        }

        .team-wrapper {
            transform: scale(1.1);
        }

        .hero-title {
            font-size: 48px;
        }

        .hero-description {
            max-width: 400px;
        }
    }
</style>
@endpush
