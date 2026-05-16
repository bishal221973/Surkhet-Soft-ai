<div class="modern-section-collaboration">

    <div class="container">
        <small class="mx-auto d-block tag-line">Our Creative Collaborators</small>
        <h2 class="section-title1 text-center">A Community of Creative <span>Collaborators</span> <br> Shaping Modern Design and Digital Experiences
        </h2>
        

    </div>

</div>

<style scoped>
    .tag-line {
        color: #789ec3;
        background: #789ec320;
        width: 200px;
        border-radius: 50px;
        font-size: 14px;
        padding: 6px 10px;
        display: block;
        text-align: center;
    }

    .section-title1 span {
        color: #789ec3;
    }

    .modern-section-collaboration {
        padding: 100px 0;
        background: #f2f2f2;
    }

    /* CARD */
    .modern-card {
        background: #ffffff;
        border: 1px solid rgba(120, 158, 195, 0.2);
        border-radius: 22px;
        padding: 40px;
        height: 100%;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
        transition: .4s;
        position: relative;
        overflow: hidden;
    }

    .modern-card::before {
        content: "";
        position: absolute;
        top: -50px;
        right: -50px;
        width: 140px;
        height: 140px;
        background: rgba(120, 158, 195, 0.1);
        border-radius: 50%;
    }

    .modern-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 60px rgba(120, 158, 195, 0.15);
    }

    /* BADGE */
    .badge-modern {
        display: inline-block;
        background: rgba(120, 158, 195, 0.12);
        color: #789EC3;
        padding: 7px 16px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    /* TITLE */
    .title-modern {
        font-size: 34px;
        font-weight: 800;
        color: #1d3557;
        margin-bottom: 15px;
        line-height: 1.2;
    }

    /* DESCRIPTION */
    .desc-modern {
        font-size: 15px;
        color: #6c757d;
        line-height: 1.7;
    }

    /* FEATURES */
    .features-modern {
        margin-top: 20px;
    }

    .features-modern div {
        margin-bottom: 10px;
        font-size: 14px;
        color: #333;
        position: relative;
        padding-left: 22px;
    }

    .features-modern div::before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #789EC3;
        font-weight: bold;
    }

    /* BUTTON */
    .btn-modern {
        margin-top: 25px;
        background: #789EC3;
        color: #fff;
        border: none;
        padding: 11px 26px;
        border-radius: 50px;
        font-weight: 600;
        transition: .3s;
    }

    .btn-modern:hover {
        background: #5e86b0;
        transform: translateY(-3px);
    }

    /* RESPONSIVE */
    @media(max-width:991px) {
        .modern-card {
            padding: 30px;
        }

        .title-modern {
            font-size: 26px;
        }
    }
</style>
