@extends('layouts.guestLayout')

@section('content')
    <x-breadcrumb title="{{ $contentCategory?->name }}" page="Content Production" />
    {{-- <div class="d-flex justify-content-center gap-3 mb-4">
            <button class="btn tab-btn active" data-type="all">All</button>
            <button class="btn tab-btn" data-type="Photography">Photography</button>
            <button class="btn tab-btn" data-type="Videography">Videography</button>
        </div> --}}
    <div class="container py-4">
        <div class="d-flex justify-content-center flex-wrap gap-3 filter-tabs">
            @if ($contentCategory->content_type == 'Videography')
                <button class="btn tab-btn active" data-type="Videography">
                    <i class="bi bi-film"></i>
                    Videography
                </button>
                <button class="btn tab-btn " data-type="Photography">
                    <i class="bi bi-camera-fill"></i>
                    Photography
                </button>
            @else
                <button class="btn tab-btn active" data-type="Photography">
                    <i class="bi bi-camera-fill"></i>
                    Photography
                </button>
                <button class="btn tab-btn " data-type="Videography">
                    <i class="bi bi-film"></i>
                    Videography
                </button>
            @endif



        </div>
    </div>
    <section class="ai-hero">
        {{-- {{$contentCategory?->name}} --}}
        <canvas id="canvas"></canvas>

        <div class="container gallery-wrapper">

            {{-- <div class="masonry" id="lightgallery">

            @foreach ($contentCategory->contentImages as $img)
                <a href="{{ asset('storage/' . $img->image) }}" class="gallery-item">
                    <img src="{{ asset('storage/' . $img->image) }}" loading="lazy" alt="">
                </a>
            @endforeach
            

        </div> --}}
            <div class="masonry" id="lightgallery">

                @foreach ($contentCategory->contentImages as $img)
                    <div class="gallery-item" data-type="{{ $img->image ? 'Photography' : 'Videography' }}">

                        @if ($img->image)
                            <!-- 📸 Image -->
                            <a href="{{ asset('storage/' . $img->image) }}">
                                <img src="{{ asset('storage/' . $img->image) }}" loading="lazy" alt="">
                            </a>
                        @elseif($img->iframe)
                            <!-- 🎥 Video -->
                            <div class="video-wrapper">
                                {!! $img->iframe !!}
                            </div>
                        @endif

                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection


{{-- ================= STYLE ================= --}}
<style>
    .ai-hero {
        position: relative;
        min-height: 100vh;
        padding: 60px 0;
        overflow: hidden;
    }

    /* canvas background */
    canvas {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    /* wrapper */
    .gallery-wrapper {
        position: relative;
        z-index: 2;
    }

    /* masonry layout */
    .masonry {
        column-count: 3;
        column-gap: 16px;
    }

    /* gallery item */
    .gallery-item {
        display: block;
        margin-bottom: 16px;
        break-inside: avoid;
        border-radius: 14px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    /* ✅ FIXED IMAGE (NO CROP) */
    .gallery-item img {
        width: 100%;
        height: auto;
        /* 🔥 important */
        display: block;
        border-radius: 14px;
    }

    /* hover effect */
    .gallery-item:hover {
        transform: scale(1.02);
    }

    /* responsive */
    @media (max-width: 992px) {
        .masonry {
            column-count: 2;
        }
    }

    @media (max-width: 576px) {
        .masonry {
            column-count: 1;
        }
    }

    .video-wrapper {
        position: relative;
        width: 100%;
        padding-top: 56.25%;
        /* 16:9 ratio */
        border-radius: 14px;
        overflow: hidden;
    }

    .video-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
</style>


{{-- ================= SCRIPT ================= --}}
@push('script')
    <!-- LightGallery CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css">

    <!-- LightGallery JS -->
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const gallery = document.getElementById("lightgallery");

            if (!gallery) return;

            lightGallery(gallery, {
                selector: 'a',
                speed: 400,
                download: false,
                thumbnail: true,
                zoom: true
            });

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const buttons = document.querySelectorAll('.tab-btn');
            const items = document.querySelectorAll('.gallery-item');

            function filterItems(type) {
                items.forEach(item => {
                    if (item.dataset.type === type) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            // Default active tab
            // filterItems('Videography');
            filterItems('{{$contentCategory->content_type}}');

            buttons.forEach(btn => {
                btn.addEventListener('click', function() {

                    buttons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const type = this.dataset.type;
                    filterItems(type);

                });
            });

        });
    </script>
@endpush
