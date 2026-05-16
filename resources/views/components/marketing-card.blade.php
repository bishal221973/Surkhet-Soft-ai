<div class="section-wrapper">
    {{ $slot }}
</div>

<style>
.section-wrapper {
    display: block; /* ✅ important for masonry */
    width: 100%;
    overflow: hidden;
    border-radius: 12px;
}

/* iframe fix */
.section-wrapper iframe {
    width: 100%;
    border: none;
    display: block;
    min-height: 800px; /* ✅ fallback height */
}

/* optional: smooth hover */
.section-wrapper:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
}
</style>