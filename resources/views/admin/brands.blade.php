@extends('layouts.app')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Leading Brands</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Leading Brands</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
           

            <x-table-component :headers="['#', 'Logo', 'Name', 'URL', 'Action']">
                <x-slot name="actions">
                    <button class="btn btn-primary" id="btnAdd" data-toggle="modal" data-target="#exampleModal">Add
                        Leading
                        Brands</button>
                </x-slot>
                @foreach ($brands as $item)
                    <tr class="align-middle">
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <img src="/storage/{{ $item->logo }}" style="width: 50px">
                        </td>

                        <td>{{ $item->name }}</td>

                        <td>
                            @if ($item?->url)
                                <a href="{{ $item->url }}" target="_blank">Open URL</a>
                            @endif
                        </td>

                        <td>
                            <div class="d-flex">
                                <a href="{{ route('leading-brands.edit', $item) }}"
                                    class="btn text-warning shadow-none">Edit</a>

                                <form action="{{ route('leading-brands.destroy', $item) }}" method="POST"
                                    onsubmit="return confirm('Are you sure ?')">
                                    @csrf
                                    @method('delete')
                                    <button class="btn text-danger shadow-none">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-table-component>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $brand?->id ? 'Update' : 'Create' }} Leading Brands
                    </h5>
                </div>
                <form action="{{ $brand?->id ? route('leading-brands.update', $brand) : route('leading-brands.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($brand?->id)
                        @method('PUT')
                    @endisset
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label for="">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Brand name" name="name"
                                value="{{ old('name', $brand?->name) }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">URL</label>
                            <input type="text" class="form-control" placeholder="URL" name="url"
                                value="{{ old('url', $brand?->url) }}">
                            @error('url')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Logo <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-end">
                                <div class="">
                                    @if ($brand->id)
                                        <img id="preview" src="/storage/{{ $brand->logo }}" alt="Preview"
                                            class="img-thumbnail"
                                            style="max-height:150px;min-height:150px;width:150px;border-radius:50%;object-fit:cover">
                                    @else
                                        <img id="preview" src="{{ asset('gallery.png') }}" alt="Preview"
                                            class="img-thumbnail"
                                            style="max-height:150px;min-height:150px;width:150px;border-radius:50%;object-fit:cover">
                                    @endif

                                </div>
                                <!-- Input group -->
                                {{-- <div class="input-group" style="width: 150px"> --}}
                                <input type="hidden" class="form-control" placeholder="Choose file..." id="fileName"
                                    readonly>

                                <button class="brows-button btn btn-primary btn-outline-secondary text-white"
                                    style="height:35px" type="button"
                                    onclick="document.getElementById('logoInput').click()">
                                    Browse
                                </button>
                                {{-- </div> --}}

                            </div>
                            <!-- Hidden file input -->
                            <input type="file" name="logo" id="logoInput" accept="image/*" class="d-none"
                                onchange="handleFile(this)">

                            <!-- Image Preview -->


                            @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{ $brand?->id ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<style>
    .brows-button {
        position: relative;
    }
</style>
@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#exampleModal').modal('show');
        });
    </script>
@endif

@if ($brand?->id)
    @push('script')
        <script>
            document.getElementById("btnAdd").click();
        </script>
    @endpush
@endif

<script id="z7m4qp">
    function handleFile(input) {
        const file = input.files[0];

        // Show file name
        document.getElementById('fileName').value = file ? file.name : '';

        // Show preview
        if (file) {
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    }
</script>
