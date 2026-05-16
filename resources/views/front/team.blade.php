<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surkhet Soft</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('styles/guest.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/card.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.8.3/css/lightgallery.min.css"
        integrity="sha512-QMCloGTsG2vNSnHcsxYTapI6pFQNnUP6yNizuLL5Wh3ha6AraI6HrJ3ABBaw6SIUHqlSTPQDs/SydiR98oTeaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('team.css  ') }}">
</head>

<body>

    <div class="team-poster">
        <div class="overlay"></div>

        <div class="header">
            @include('front.includes.navbar')
        </div>

        <div class="content-container">

            {{-- LEFT TEXT --}}
            <div class="hero-content text-content">
                <h1>CREATIVE</h1>
                <h2>TEAM</h2>

                <p>
                    "Turning creative ideas into powerful designs and meaningful experiences."
                </p>
            </div>

            {{-- RIGHT IMAGE --}}
            @if (isset($teams[0]))
                <div class="hero-content image-box">

                    <div class="name-container-main">

                        @if (!empty($teams[0]->image))
                            <img src="/storage/{{ $teams[0]->image }}" alt="team">
                        @else
                            <div class="fallback">
                                {{ getName($teams[0]->name) }}
                            </div>
                        @endif

                        <!-- CENTER LIGHT OVERLAY -->
                        <div class="spotlight"></div>

                    </div>

                    <h4>{{ $teams[0]->name }}</h4>
                    <small>{{ $teams[0]->position }}</small>
                </div>
            @endif

        </div>
        <div style="position: relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#789EC3" fill-opacity="1"
                    d="M0,64L20,96C40,128,80,192,120,181.3C160,171,200,85,240,58.7C280,32,320,64,360,96C400,128,440,160,480,165.3C520,171,560,149,600,160C640,171,680,213,720,245.3C760,277,800,299,840,282.7C880,267,920,213,960,192C1000,171,1040,181,1080,208C1120,235,1160,277,1200,261.3C1240,245,1280,171,1320,160C1360,149,1400,203,1420,229.3L1440,256L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z">
                </path>
            </svg>
            <div class="team-container">
                @foreach ($teams as $index => $team)
                    @if ($index === 0)
                        @continue
                    @endif
                    <div class="member" style="width:100%">
                        <div class="member-cntainer1">

                            @if (!empty($team->image))
                                <img src="/storage/{{ $team->image }}" class="image-container" alt="team">
                            @else
                                <div class="name-container">
                                    {{ getName($team->name) }}
                                </div>
                            @endif

                        </div>

                        <h4>{{ $team->name }}</h4>
                        <small>{{ $team->position }}</small>
                    </div>
                @endforeach
            </div>

            <div class="p-5 bg-white">


                <div class="rounded-lg shadow-md py-5">
                    <h1 class="fw-bold text-center" style="color: #789EC3">Get in touch with our creator-friendly <br>
                        support team</h1>
                    <small class="d-block text-center w-100 mt-4" style="color: #555">
                        Our team is available 24 hours a day, 7 days a week to provide you with reliable support.
                        Whether you have an <br> inquiry or need assistance, don’t hesitate to contact us anytime.
                    </small>
                </div>

                <div class="row" style="padding: 0 10%">
                    <div class="col-md-4 contact-cards">
                        <div style="background-color: #f2f2f2" class="h-100  p-3 rounded shadow">
                            <div class="circle mb-3">
                                <i class="fa fa-location-dot"></i>
                            </div>
                            <h5 class="fw-bold text-center" style="color: #789EC3">Our Location</h5>

                            <div class="d-block">
                                <div>
                                    <small style="color:#696969;font-size:13px;" class="d-block text-center">Kathmandu, Nepal / Surkhet,
                                        Nepal</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 contact-cards">
                        <div style="background-color: #f2f2f2" class="h-100  p-3 rounded shadow">
                            <div class="circle mb-3">
                                <i class="fa fa-phone"></i>
                            </div>
                            <h5 class="fw-bold text-center" style="color: #789EC3">Help Center</h5>
                            <div class="d-block">
                                <div class="d-flex justify-content-center">
                                    {{-- <small style="color:#696969;font-size:13px;" class="fw-bold">Surkhet : </small> --}}
                                    <small style="color:#696969;font-size:13px;">+977-9864797152</small>
                                </div>
                                {{-- <div class="d-flex justify-content-center">
                                    <small style="color:#696969;font-size:13px;" class="fw-bold">Lalitpur : </small>
                                    <small style="color:#696969;font-size:13px;">+977-9814668499,+977-9814668499</small>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 contact-cards ">
                        <div style="background-color: #f2f2f2" class="h-100 p-3 rounded shadow">
                            <div class="circle mb-3">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <h5 class="fw-bold text-center" style="color: #789EC3">Email Support</h5>
                            <div class="d-block">
                                <div class="d-flex justify-content-center">
                                    <small style="color:#696969;font-size:13px;">info@surkhetsoft.com</small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex" style="margin-top:80px;padding-right:10%;padding-left:5%;">
                    <x-contact-form />


                    {{-- <div style="padding: 0 10% 0 0;width:100%;position:relative;top:10px">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481470.5902866614!2d81.5802046363601!3d28.467356860960724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399877deb6525269%3A0x8b2be37f3048da53!2sSurkhet!5e0!3m2!1sen!2snp!4v1777652048247!5m2!1sen!2snp"
                            style="border:0;width:100%;height:calc(100% - 25px);border-radius:10px" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div> --}}
                    <div class="map-tabs">
                        {{-- <h5>Visit us on</h5> --}}

                        <!-- Tab Buttons -->
                        <div class="tab-buttons">
                            <button class="tab-btn active" data-tab="kathmandu">Kathmandu</button>
                            <button class="tab-btn " data-tab="surkhet">Surkhet</button>
                        </div>

                        <!-- Tab Content -->
                        <div class="tab-content " id="surkhet">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.1406590996676!2d81.6155021!3d28.5955568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a287398d603007%3A0x19ed7fbec5c081f8!2sSURKHET%20SOFT%20PVT.LTD.!5e0!3m2!1sen!2snp!4v1777957037961!5m2!1sen!2snp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <div class="tab-content active" id="kathmandu">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4972.7572581840295!2d85.3653071!3d27.689119899999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1b00384e9d73%3A0xc64594823ed006fd!2sSurkhet%20Soft%20Pvt.%20Ltd.%20%E2%80%93%20Kathmandu!5e1!3m2!1sen!2snp!4v1777957201157!5m2!1sen!2snp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>



</body>
<script>
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', () => {

            // remove active from all
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));

            // activate selected
            button.classList.add('active');
            document.getElementById(button.dataset.tab).classList.add('active');
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/animejs/dist/bundles/anime.umd.min.js"></script>
<script>
    const {
        animate
    } = anime;
</script>
<!-- GSAP & ScrollTrigger CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"
    integrity="sha512-NcZdtrT77bJr4STcmsGAESr06BYGE8woZdSdEgqnpyqac7sugNO+Tr4bGwGF3MsnEkGKhU2KL2xh6Ec+BqsaHA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"
    integrity="sha512-P2IDYZfqSwjcSjX0BKeNhwRUH8zRPGlgcWl5n6gBLzdi4Y5/0O4zaXrtO4K9TZK6Hn1BenYpKowuCavNandERg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.8.3/lightgallery.min.js"
    integrity="sha512-n02TbYimj64qb98ed5WwkNiSw/i9Xlvv4Ehvhg0jLp3qMAMWCYUHbOMbppZ0vimtyiyw9NqNqxUZC4hq86f4aQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('script')
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
    integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
</script>
<script>
    var elem = document.querySelector('.grid');
    var msnry = new Masonry(elem, {
        // options
        itemSelector: '.grid-item',
        columnWidth: 200
    });

    // element argument can be a selector string
    //   for an individual element
    var msnry = new Masonry('.grid', {
        // options
    });
</script>

</html>
