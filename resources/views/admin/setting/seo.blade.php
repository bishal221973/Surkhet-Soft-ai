@extends('layouts.app')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">SEO</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Setting</li>
                        <li class="breadcrumb-item active" aria-current="page">SEO</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid d-flex justify-content-center align-items-center">

            <form action="{{route('seo.store')}}" method="POST" class="w-100">
                @csrf

                <!-- META TITLE -->
                <div class="form-group w-100 mb-3">
                    <label for="meta_title">META TITLE</label>
                    <input type="text" name="title" value="{{old('title',$seo->title ?? '')}}" id="meta_title" class="form-control" placeholder="Meta Title">
                </div>

                <!-- META DESCRIPTION -->
                <div class="form-group w-100 mb-3">
                    <label for="meta_description">META DESCRIPTION</label>
                    <textarea name="description" id="meta_description" cols="30" rows="5" placeholder="Meta Description"
                        class="form-control">{{ old('description', $seo->description ?? '') }}</textarea>
                </div>

                <!-- META KEYWORDS -->
                <div class="form-group w-100 mb-3">
                    <label for="meta_keywords">META KEYWORDS</label>
                    <textarea name="keywords" id="meta_keywords" rows="3" class="form-control"
                        placeholder="Tech, Edu, College, School, BCA">{{ old('keywords', $seo->keywords ?? '') }}</textarea>
                    <small class="text-muted">Separate keywords with commas</small>
                </div>

                <!-- SUBMIT -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Save SEO Settings
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection
