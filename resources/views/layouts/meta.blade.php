@php
    $seo = App\Models\Seo::first();
@endphp
<meta name="description" content="{{ $seo->description ?? 'Default description' }}">
<meta name="keywords" content="{{ $seo->keywords ?? 'default, keywords' }}">

<link rel="canonical" href="{{ $seo->canonical ?? url()->current() }}">

<!-- Open Graph -->
<meta property="og:title" content="{{ $seo->title ?? 'Default Title' }}">
<meta property="og:description" content="{{ $seo->description ?? '' }}">
<meta property="og:url" content="{{ $seo->canonical ?? url()->current() }}">
<meta property="og:type" content="website">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seo->title ?? '' }}">
<meta name="twitter:description" content="{{ $seo->description ?? '' }}">
