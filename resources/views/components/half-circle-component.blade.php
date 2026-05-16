<div class="main-ai-container"
    style="background: linear-gradient(180deg, #6C8FB1, rgb(255, 255, 255)); height:80vh; display:flex; justify-content:center; align-items:flex-end;z-index:-1">
    <div class="circle2">
        <div class="circle1">
            <!-- <div class="circle3">
          Hello
        </div> -->
        </div>
    </div>
    <!-- <div class="ai-cards"></div> -->
</div>
<div class="ai-card" id="card1">
    <div class="card-icon">🤖</div>
    <h3>AI Automation</h3>
    <p>Automate tasks and workflows with intelligent AI systems.</p>
</div>

<div class="ai-card1" id="card2">
    <div class="card-icon">📊</div>
    <h3>Data Analytics</h3>
    <p>Understand insights with powerful machine learning models.</p>
</div>

<div class="ai-card2" id="card3">
    <div class="card-icon">⚡</div>
    <h3>Fast Processing</h3>
    <p>Lightning-fast AI processing for modern applications.</p>
</div>

<div class="ai-card3" id="card4">
    <div class="card-icon">🔐</div>
    <h3>Secure AI</h3>
    <p>Enterprise-grade AI security and protection.</p>
</div>

<div class="ai-card4" id="card5">
    <div class="card-icon">🌐</div>
    <h3>Global AI</h3>
    <p>Deploy AI services anywhere in the world.</p>
</div>
<style>
    /* Outer Semi-circle */
    .circle2 {
        height: 400px;
        width: 800px;
        background: linear-gradient(180deg, #95b3d0, #37597b);
        position: relative;
        border-top-left-radius: 400px;
        border-top-right-radius: 400px;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        z-index: 2;
    }

    /* Middle Semi-circle */
    .circle1 {
        height: 300px;
        width: 600px;
        background: linear-gradient(180deg, #2f4d6a, #284058);
        position: relative;
        border-top-left-radius: 300px;
        border-top-right-radius: 300px;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        margin-bottom: -50px;
        /* slightly overlap outer circle */
    }

    /* Inner Glowing Semi-circle */
    .circle3 {
        height: 150px;
        width: 150px;
        background-color: #383361;
        border-top-left-radius: 75px;
        border-top-right-radius: 75px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-weight: bold;

        /* Neon glow effect */
        box-shadow:
            0 0 10px #383361,
            0 0 20px #383361,
            0 0 30px #383361,
            0 0 40px #383361,
            0 0 50px #383361;

        animation: neonPulse 2s infinite alternate;
    }

    /* Glow animation */
    @keyframes neonPulse {
        0% {
            box-shadow:
                0 0 5px #383361,
                0 0 10px #383361,
                0 0 15px #383361,
                0 0 20px #383361,
                0 0 25px #383361;
        }

        100% {
            box-shadow:
                0 0 15px #383361,
                0 0 25px #383361,
                0 0 35px #383361,
                0 0 45px #383361,
                0 0 55px #383361;
        }
    }

    .ai-cards {
        width: 200px;
        height: 300px;
        background-color: #789ec3 !important;
        position: absolute;
        /* bottom: 0; */
    }



    .ai-card,
    .ai-card1,
    .ai-card2,
    .ai-card3,
    .ai-card4 {
        width: 230px;
        height: 260px;
        position: absolute;
        z-index: 1;

        background: #789ec3;
        backdrop-filter: blur(10px);

        border-radius: 18px;
        padding: 25px;

        border: 1px solid rgba(255, 255, 255, 0.15);

        color: #fff;
        text-align: center;

        box-shadow:
            0 10px 30px #789ec3;

        transition: 0.4s;
    }

    /* hover effect */
    .ai-card:hover,
    .ai-card1:hover,
    .ai-card2:hover,
    .ai-card3:hover,
    .ai-card4:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow:
            0 20px 40px rgba(0, 0, 0, 0.7),
            0 0 20px rgba(120, 120, 255, 0.4);
    }

    /* icon */
    .card-icon {
        font-size: 40px;
        margin-bottom: 15px;
    }

    /* title */
    .ai-card h3,
    .ai-card1 h3,
    .ai-card2 h3,
    .ai-card3 h3,
    .ai-card4 h3 {
        margin-bottom: 10px;
        font-size: 20px;
    }

    /* text */
    .ai-card p,
    .ai-card1 p,
    .ai-card2 p,
    .ai-card3 p,
    .ai-card4 p {
        font-size: 14px;
        color: #d2d2ff;
    }

    /* positioning around arc */

    .ai-card {
        bottom: 0;
        left: 50%;
        transform: rotate(-78deg);
    }

    .ai-card1 {
        bottom: 0;
        left: 50%;
        transform: rotate(-40deg);
    }

    .ai-card2 {
        bottom: 0;
        left: 50%;
    }

    .ai-card3 {
        bottom: 0;
        right: 50%;
        transform: rotate(40deg);
    }

    .ai-card4 {
        bottom: 0;
        right: 50%;
        transform: rotate(78deg);
    }
</style>
