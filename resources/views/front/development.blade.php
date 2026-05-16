@extends('layouts.guestLayout')
@section('content')
    <x-breadcrumb title="High-performance digital backbones and custom apps." page="Development" />
    <span class="text-white d-block text-center">Digital foundations that don't break. Fast, sleek, and built to
        convert.</span>
    <!-- <img src="{{ asset('herobg.png') }}" class="herobg" alt=""> -->
    <div id="fixedContent12" class="w-100  align-items-center m-0"
        style="padding: 0px 10%;position: relative;overflow-x:hidden">

        <div
            class="col-md-12 animate__animated animate__zoomIn animate__delay-1s d-flex justify-content-between align-items-center gap-5">
            <div class="d-block">
                <div class="boxes box1 animate__animated animate__backInLeft animate__delay-1s">
                    <img src="{{ asset('images/web.png') }}" alt="">
                    <h5>Web Development</h5>
                </div>
                <div class="boxes box2 animate__animated animate__backInLeft animate__delay-3s">
                    <img src="{{ asset('images/android.png') }}" alt="">
                    <h5>Android development</h5>
                </div>
                <div class="boxes box3 animate__animated animate__backInLeft animate__delay-5s">
                    <img src="{{ asset('images/ecommerce.png') }}" alt="">
                    <h5>E-Commerce</h5>
                </div>
            </div>
            <div id="3d_render" class="" style="height:500px;width:43vw"></div>

            <div class="d-block">
                <div class="boxes box4 animate__animated animate__backInRight animate__delay-2s">
                    <img src="{{ asset('images/custom.png') }}" alt="">
                    <h5>Custom Software</h5>
                </div>
                <div class="boxes box5 animate__animated animate__backInRight animate__delay-4s">
                    <img src="{{ asset('images/erp.png') }}" alt="">
                    <h5>ERP</h5>
                </div>
                <div class="boxes box6 animate__animated animate__backInRight animate__delay-5s">
                    <img src="{{ asset('icon/7.png') }}" alt="">
                    <h5>Automation</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="placeholder"></div> -->

    <x-sdlc />
    <x-project-lists />
@endsection

@push('script')
    <script type="importmap">
    {
  "imports": {
    "three": "https://cdn.jsdelivr.net/npm/three@0.160/build/three.module.js",
    "three/examples/jsm/": "https://cdn.jsdelivr.net/npm/three@0.160/examples/jsm/"
  }
}
</script>
    <script type="module">
        import * as THREE from "three";
        import {
            GLTFLoader
        } from "three/examples/jsm/loaders/GLTFLoader.js";
        import {
            OrbitControls
        } from "three/examples/jsm/controls/OrbitControls.js";

        const container = document.getElementById("3d_render");

        // Scene
        const scene = new THREE.Scene();

        // Camera
        const camera = new THREE.PerspectiveCamera(
            30,
            container.clientWidth / container.clientHeight,
            0.1,
            1000
        );

        // Renderer
        const renderer = new THREE.WebGLRenderer({
            antialias: true,
            alpha: true
        });
        renderer.setSize(container.clientWidth, container.clientHeight);

        container.appendChild(renderer.domElement);

        // Controls
        const controls = new OrbitControls(camera, renderer.domElement);
        controls.enableDamping = true;

        // Lighting
        scene.add(new THREE.AmbientLight(0xffffff, 2));

        const light = new THREE.DirectionalLight(0xffffff, 3);
        light.position.set(5, 10, 7);
        scene.add(light);

        // Load Model
        const loader = new GLTFLoader();

        loader.load('/3d/desktop_pc/scene.gltf', function(gltf) {

            const model = gltf.scene;
            scene.add(model);

            // Center camera to model
            const box = new THREE.Box3().setFromObject(model);
            const center = box.getCenter(new THREE.Vector3());
            const size = box.getSize(new THREE.Vector3()).length();

            camera.position.set(20, 3, 5);
            camera.lookAt(center);

            controls.target.copy(center);
            controls.update();

        });

        // Resize
        window.addEventListener("resize", () => {

            const width = container.clientWidth;
            const height = container.clientHeight;

            camera.aspect = width / height;
            camera.updateProjectionMatrix();

            renderer.setSize(width, height);

        });

        // Animation
        function animate() {

            requestAnimationFrame(animate);

            controls.update();

            renderer.render(scene, camera);

        }

        animate();
    </script>
@endpush

@push('script')
    <script>
        const element = document.getElementById("fixedContent");
        const placeholder = document.getElementById("placeholder");

        const elementTop = element.offsetTop + 50;
        const elementHeight = element.offsetHeight;

        window.addEventListener("scroll", function() {

            if (window.scrollY >= elementTop) {
                element.classList.add("active");

                // keep bottom content from jumping
                placeholder.style.height = 700 + "px";

            } else {
                element.classList.remove("active");
                placeholder.style.height = "0px";
            }

        });
    </script>
@endpush
