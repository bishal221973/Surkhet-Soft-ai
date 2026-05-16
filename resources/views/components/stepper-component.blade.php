@props([
    'steps' => [],
    'activeStep' => 5,
])

<div class="hierarchy-wrapper">
    <div class="steps-container">

        @foreach ($steps as $index => $step)
            <div class="step-item" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">

                {{-- Circle --}}
                <div class="step-circle {{ $activeStep >= $index + 1 ? 'active' : '' }}">
                    {{ $index + 1 }}
                </div>

                {{-- Content --}}
                <div class="step-content" >
                    <h5 class="">{{ $step['title'] }}</h5>

                    <div class="step-desc-box1">
                        <p class="fw-bold text-secondary">{{ $step['description'] }}</p>

                        <ul style="list-style: none" class="m-0 p-0 text-start">
                            @foreach ($step['lists'] ?? [] as $list)
                                <li style="font-size: 13px">
                                    <small class="text-secondary">
                                        <i class="fa-solid fa-angles-right text-orange me-1"></i>
                                        {{ $list }}
                                    </small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Line --}}
                @if ($index !== count($steps) - 1)
                    <div class="step-line {{ $activeStep > $index + 1 ? 'line-active' : '' }}"></div>
                @endif

            </div>
        @endforeach

    </div>
</div>
