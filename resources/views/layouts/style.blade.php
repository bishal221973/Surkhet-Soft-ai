<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
    onload="this.media = 'all'" />
<!--end::Fonts-->

<!--begin::Third Party Plugin(OverlayScrollbars)-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
    crossorigin="anonymous" />
<!--end::Third Party Plugin(OverlayScrollbars)-->

<!--begin::Third Party Plugin(Bootstrap Icons)-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous" />
<!-- apexcharts -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
    integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />

<!-- jsvectormap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
    integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous" />
<!--end::Third Party Plugin(Bootstrap Icons)-->

<!--begin::Required Plugin(AdminLTE)-->
<link rel="stylesheet" href="{{ asset('css/adminlte.css') }}" />
<link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    /* Small Toggle */
    .mini-switch {
        position: relative;
        display: inline-block;
        width: 32px;
        height: 16px;
    }

    .mini-switch input {
        display: none;
    }

    .mini-switch span {
        position: absolute;
        cursor: pointer;
        background: #ccc;
        border-radius: 20px;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        transition: 0.25s;
    }

    .mini-switch span::before {
        content: "";
        position: absolute;
        height: 12px;
        width: 12px;
        left: 2px;
        top: 2px;
        background: white;
        border-radius: 50%;
        transition: 0.25s;
    }

    /* Active */
    .mini-switch input:checked+span {
        background: #789EC3;
    }

    .mini-switch input:checked+span::before {
        transform: translateX(16px);
    }

    /* Optional hover */
    .mini-switch span:hover {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }


    
</style>
