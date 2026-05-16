<div class="navbar-container animate__animated animate__zoomIn">
    {{-- <div class="d-flex justify-content-between" style="padding: 0 20px;background-color:#2C3E50">
        <div class="d-flex aling-items-center">
            <i class="fa fa-phone"></i>
            <small>9814668499</small>
        </div>
    </div> --}}
    <div class="navbar px-3 d-flex justify-content-center justify-content-sm-between align-items-center"
        style="overflow: hidden">
        <a href="/">
            <img src="{{ asset('logo.jpg') }}" class="nav-logo" alt="Logo">
        </a>

        <div class="d-flex align-items-center">
            <a href="{{ route('front.collaboration') }}" class="nav-start-project text-white text-decoration-none">
                Collaboration
            </a>
            <a href="{{ route('front.team') }}" class="team-btn1 text-decoration-none">
                <img src="{{ asset('images/team.png') }}" alt="">
                <span>Team</span>
            </a>
        </div>
    </div>
</div>


<a href="{{ route('front.team') }}" class="team-btn text-decoration-none">
    <img src="{{ asset('images/team.png') }}" alt="">
    <span>Team</span>
</a>

<style>
    /* Navbar container */
    .navbar-container {
        /* position: sticky;
    top: 0; */
        z-index: 99999999;
        background-color: transparent;
        transition: all 0.4s ease;
    }

    /* Navbar */
    .navbar {
        background-color: #789EC3;
        border-radius: 12px;
        padding: 25px 20px;
        transition: all 0.4s ease;
    }

    /* Sticky state */
    .navbar-container.stuck .navbar {
        padding: 8px 20px;
        /* border-radius: 0; */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    /* Logo */
    .nav-logo {
        /* height: 50px; */
        transition: all 0.3s ease;
    }

    .navbar-container.stuck .nav-logo {
        /* height: 40px; */
    }

    /* Button */
    .nav-start-project {
        transition: all 0.3s ease;
    }

    .navbar-container.stuck .nav-start-project {
        transform: scale(0.9);
    }

    /* Team button */
    .team-btn {
        position: absolute;
        right: 4%;
        top: 10px;
        height: 60px;
        width: 60px;
        text-align: center;
        /* display: none */
    }

    .team-btn img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .team-btn span {
        display: block;
        font-size: 12px;
        color: #fff;
    }

    .team-btn1 {
        height: 60px;
        width: 60px;
        text-align: center;
        display: none;
        margin-top: 5px
    }

    .team-btn1 img {
        height: 38px;
        width: 38px;
        object-fit: cover;
        border-radius: 50%;
        position: relative;
    }

    .team-btn1 span {
        display: block;
        font-size: 12px;
        color: #fff;
    }

    /* Smooth slide animation */
    .navbar-container.stuck {
        animation: slideDown 0.4s ease;
        /* padding: 0; */
        /* box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; */
        position: sticky;
        top: 0;
    }

    .navbar-container.stuck .team-btn1 {
        display: block;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbar = document.querySelector('.navbar-container');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                navbar.classList.add('stuck');
            } else {
                navbar.classList.remove('stuck');
            }
        });
    });
</script>
