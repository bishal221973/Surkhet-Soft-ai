@props([
    'title' => '',
    'page' => '',
])

<div style="margin-bottom: 0" class="d-flex justify-content-center align-items-center breadcrumb align-items-center gap-2">
    {{-- <img src="{{ asset('images/border.png') }}"
        class="breadcrumb-border rotate animate__animated animate__lightSpeedInLeft" alt="" /> --}}

    <div class="d-flex justify-content-center breadcrumb align-items-center gap-2 animate__animated animate__zoomIn">
        <a href="/" class="text-decoration-none fw-bold text-white">
            <i class="fa fa-home"></i> Home
        </a>

        <span><i class="fa fa-angle-right text-gray-200 text-white"></i></span>

        <span class="text-[#5c67ac] fw-bold text-white">{{ $page }}</span>
    </div>

    {{-- <img src="{{ asset('images/border.png') }}" class="breadcrumb-border animate__animated animate__lightSpeedInRight"
        alt="" /> --}}
</div>

<h3 class="breadcrumb-title animate__animated animate__flash text-white">{{ $title }}</h3>

{{-- <img src="{{ asset('images/border1.png') }}" class="d-block mx-auto animate__animated animate__flash" style="opacity:0.5;width:200px" alt=""> --}}
