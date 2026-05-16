<div class="footer-glass-container bg-white" style="margin-top: 0px;">
    <div style="padding:0 100px">
        <small class="mx-auto d-block text-center tag-line">
            Projects We've Built
        </small>

        <h2 class="section-title1 text-center">
            Our Diversified <span>Design</span> Portfolio
        </h2>

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


        <div class="row mt-4">
            @foreach ($projects as $item)
                <div class="col-lg-4 mb-3 portfolio-item" data-category="{{ $item->development_category_id }}">
                    <div class="project-card" >
                        <div class="project-card-image" >
                            @if (count($item->images) > 0)
                                <img src="/storage/{{ $item->images[0] }}" class="w-100 h-100" style="object-fit: cover" alt="">
                            @else
                                <img src="{{ asset('images/site.jpg') }}" class="w-100 h-100" alt="">
                            @endif
                            <h5>{{ $item->category?->name }}</h5>

                        </div>
                        <div class="p-3">
                            <h5 class="project-title">{{ $item->title }}</h5>
                            <small>{{$item->description}}</small>

                            {{-- <div class="mt-2 d-flex">
                                <div class="project-glass">
                                    @php
                                        print($item->tags)
                                    @endphp
                                </div>
                                <div class="project-glass">
                                    E-Commerce
                                </div>
                            </div> --}}
                            @if ($item->url)
                                
                            <a href="{{ $item->url }}" target="_blank" class="d-block text-center text-decoration-none btn-project">
                                <span>View Case</span>
                                <i class="fa fa-arrow-right"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="col-lg-12">
                <div style="height:100px"></div>
            </div>
        </div>
    </div>
</div>


<style>
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

    .selectCategory {
        background: #f1f1f1;
        border-radius: 6px;
        transition: 0.3s;
    }

    .selectCategoryActive {
        background: #789ec3 !important;
        color: #fff !important;
    }
</style>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const buttons = document.querySelectorAll(".selectCategory");
    const items = document.querySelectorAll(".portfolio-item");

    function showItems(filtered) {
        gsap.fromTo(filtered,
            {
                opacity: 0,
                y: 30,
                scale: 0.95
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.5,
                stagger: 0.08,
                ease: "power3.out"
            }
        );
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
        btn.addEventListener("click", function () {

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