<section class="brand-project" id="brandPortfolio">

    <div class="container pb-5">

        <!-- HEADER -->
        <div class="row text-center mb-5">
            <small class="mx-auto d-block tag-line">
                Print & Design Solutions
            </small>

            <h2 class="section-title1">
                Creative <span>Printing </span> and <span> Designing</span> <br> Portfolio
                for Modern Business Brands
            </h2>



            <!-- FILTER BUTTONS -->
            <div class="d-flex justify-content-center gap-2 flex-wrap mt-3">

                <a href="javascript:void(0)" class="btn border py-1 selectCategory selectCategoryActive" data-id="all">
                    <small>All</small>
                </a>

                @foreach ($printCategories as $item)
                    <a href="javascript:void(0)" class="btn border py-1 selectCategory" data-id="{{ $item->id }}">
                        <small>{{ $item->title }}</small>
                    </a>
                @endforeach

            </div>
        </div>

        {{-- {{$printPortfolios}} --}}

        <!-- GRID -->
        <div class="row px-2 px-md-5">

            @foreach ($printPortfolios as $brandPortfolio)
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item"
                    data-category="{{ $brandPortfolio->print_category_id }}" data-aos="zoom-in-up" >
                    <div class="brand-project-card">

                        <div class="img-wrapper">

                            <img src="/storage/{{ $brandPortfolio->image }}" class="brand-image">

                            <!-- DARK OVERLAY -->
                            <div class="overlay"></div>

                            <!-- HIDDEN CONTENT -->
                            <div class="card-content">
                                <small class="text-white">{{ $brandPortfolio?->category?->title }}</small>
                                <h4 class="text-white">{{ $brandPortfolio->name }}</h4>
                                <p class="text-white">{{ $brandPortfolio->description }}</p>
                            </div>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

</section>

<style>
    /* TAG */
    .tag-line {
        color: #789ec3;
        background: #789ec320;
        width: 200px;
        border-radius: 50px;
        font-size: 14px;
        padding: 6px 10px;
    }

    /* TITLE */
    .section-title1 span {
        color: #789ec3;
    }

    /* FILTER BUTTON */
    .selectCategory {
        background: #f1f1f1;
        border-radius: 6px;
        transition: 0.3s;
    }

    .selectCategoryActive {
        background: #789ec3 !important;
        color: #fff !important;
    }

    /* CARD */
    .brand-project-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(120, 158, 195, 0.25);
        transition: 0.4s;
    }

    /* IMAGE WRAPPER */
    .img-wrapper {
        position: relative;
        overflow: hidden;
    }

    /* IMAGE */
    .brand-image {
        width: 100%;
        height: 230px;
        object-fit: cover;
        display: block;
        transition: 0.6s ease;
    }

    /* DARK OVERLAY (TOP → BOTTOM) */
    .overlay {
        position: absolute;
        top: -100%;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.55);
        z-index: 1;
        transition: 0.6s ease;
    }

    /* WHITE CONTENT (BOTTOM → TOP) */
    .card-content {
        position: absolute;
        bottom: -100%;
        left: 2%;
        width: 96%;
        background: #789EC3;
        padding: 15px;
        z-index: 2;
        transition: 0.6s ease;
    }

    /* HOVER EFFECT */
    .brand-project-card:hover .overlay {
        top: 0;
    }

    .brand-project-card:hover .card-content {
        bottom: 10px;
        border-radius: 10px
    }

    .brand-project-card:hover .brand-image {
        transform: scale(1.1);
    }

    /* ITEM PERFORMANCE */
    .portfolio-item {
        will-change: transform, opacity;
    }
</style>

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

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
@endpush
