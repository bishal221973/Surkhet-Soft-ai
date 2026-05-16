@extends('layouts.app')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Projects</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Print & Design</li>
                        <li class="breadcrumb-item active" aria-current="page">Projects</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">


            <x-table-component :headers="['#', 'Image','Category','Name', 'Description', 'Action']">
                <x-slot name="actions">
                    <button class="btn btn-primary" id="btnAdd" data-toggle="modal" data-target="#exampleModal">Add Project</button>
                </x-slot>
                @foreach ($printPortfolios as $item)
                    <tr style="padding: 0" data-id="{{ $item->id }}">
                        <td style="padding: 0"><span style="display: block;text-align:start">{{ $loop->iteration }}</span>
                        </td>
                        <td style="padding: 0">
                            <img src="/storage/{{$item->image}}" style="width:80px " alt="hello">
                        </td>
                        <td style="padding: 0">{{ $item?->category?->title }}</td>
                        <td style="padding: 0">{{ $item->name }}</td>
                        <td style="padding: 0">{{ $item->description }}</td>
                        {{-- <td style="padding: 0">
                            <label class="mini-switch">
                                <input type="checkbox" class="status-toggle" data-id="{{ $item->id }}"
                                    {{ $item->status ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </td> --}}
                        <td style="padding: 0">
                            <div class="d-flex">
                                <a href="{{ route('print-design.edit', $item) }}" style="margin-top: 10px"
                                    class="btn text-warning shadow-none">Edit</a>

                                <form action="{{ route('print-design.destroy', $item) }}" method="POST"
                                    onsubmit="return confirm('Are you sure ?')">
                                    @csrf
                                    @method('delete')
                                    <button class="btn text-danger shadow-none"
                                        style="position:relative;top: 10px">Delete</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ $printPortfolio?->id ? 'Update' : 'Create' }} Design
                    </h5>
                </div>
                <form
                    action="{{ $printPortfolio?->id ? route('print-design.update', $printPortfolio) : route('print-design.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($printPortfolio?->id)
                        @method('POST')
                    @endisset
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label for="">Select Category <span class="text-danger">*</span></label>
                            <select name="print_category_id" id="" class="form-control form-select">
                                <option value="">Select Category</option>
                                @foreach ($printServices as $pItem)
                                    <option value="{{ $pItem?->id }}" {{$printPortfolio?->print_category_id == $pItem->id ? 'selected' : ''}}>{{ $pItem?->title }}</option>
                                @endforeach
                            </select>
                            @error('print_category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name"
                                value="{{ old('name', $printPortfolio?->name) }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                       

                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea class="form-control" placeholder="Description" name="description">{{ old('description', $printPortfolio->description) }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                         <div class="mb-3">
                            <label>Image <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-end">
                                <div class="">
                                    @if ($printPortfolio->id)
                                        <img id="preview" src="/storage/{{ $printPortfolio->image }}" alt="Preview"
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
                            <input type="file" name="image" id="logoInput" accept="image/*" class="d-none"
                                onchange="handleFile(this)">

                            <!-- Image Preview -->


                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"
                            class="btn btn-primary">{{ $printPortfolio?->id ? 'Update' : 'Save' }}</button>
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
    @push('script')
        <script>
            document.getElementById("btnAdd").click();
        </script>
    @endpush
@endif

@if ($printPortfolio?->id)
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


@push('script')
    <script>
        $(document).on('change', '.status-toggle', function() {

            let checkbox = $(this);
            let id = checkbox.data('id');
            let status = checkbox.is(':checked') ? 1 : 0;

            $.ajax({
                url: `/admin/brands/brand-portfolio/${id}/toggle-status`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                error: function() {
                    // rollback if failed
                    checkbox.prop('checked', !status);
                }
            });

        });
    </script>
@endpush
@push('script')
    {{-- <script>
        $(document).ready(function() {

            $("#myTable tbody").sortable({
                cursor: "move",
                opacity: 0.7,
                update: function() {

                    let order = [];

                    $("#myTable tbody tr").each(function(index) {
                        order.push({
                            id: $(this).data("id"),
                            position: index + 1
                        });
                    });

                    // 🔥 Send to server
                    $.ajax({
                        url: "{{ route('branding-services.sort') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            order: order
                        },
                        success: function() {
                            console.log("Order updated");
                        }
                    });
                }
            }).disableSelection();

        });
    </script> --}}

    <script>
        $(document).ready(function() {

            $("#myTable tbody").sortable({
                cursor: "move",
                opacity: 0.8,

                // 🔥 FIX: prevent shrinking
                helper: function(e, ui) {
                    ui.children().each(function() {
                        $(this).width($(this).width());
                    });
                    return ui;
                },

                update: function() {

                    let order = [];

                    $("#myTable tbody tr").each(function(index) {
                        order.push({
                            id: $(this).data("id"),
                            position: index + 1
                        });
                    });

                    $.ajax({
                        url: "{{ route('branding-services.sort') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            order: order
                        }
                    });
                }
            }).disableSelection();

        });
    </script>
@endpush
