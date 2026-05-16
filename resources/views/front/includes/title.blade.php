<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surkhet Shoft Animation</title>
    <style>

        .nav-title {
            font-size: 2.5rem;
            /* font-weight: bold; */
        }
        .letter {
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1 class="nav-title animate__bounceIn ">Surkhet Shoft</h1>

    @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Wrap every letter in a span
        const text = document.querySelector('.nav-title1');
        text.innerHTML = text.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        // Continuous bounce animation with staggered wave
        anime.timeline({ loop: true })
            .add({
                targets: '.letter',
                translateY: [
                    { value: -20, duration: 400 },
                    { value: 0, duration: 400 }
                ],
                scaleY: [
                    { value: 1.3, duration: 400 },
                    { value: 1, duration: 400 }
                ],
                easing: "easeOutElastic(1, .5)", // springy bounce
                delay: anime.stagger(120) // wave effect across letters
            });
    });
    </script>
    @endpush
</body>
</html>
