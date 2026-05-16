@extends('layouts.app')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Category</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Content Production</li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">


            <x-table-component :headers="['#', 'Name', 'Slug','Content Type', 'Description', 'Status', 'Action']">
                <x-slot name="actions">
                    <button class="btn btn-primary" id="btnAdd" data-toggle="modal" data-target="#exampleModal">Add
                        Category</button>
                </x-slot>
                @foreach ($brandServices as $item)
                    <tr style="padding: 0" data-id="{{ $item->id }}">
                        <td style="padding: 0"><span style="display: block;text-align:start">{{ $loop->iteration }}</span>
                        </td>
                        <td style="padding: 0">{{ $item->name }}</td>
                        <td style="padding: 0">{{ $item->slug }}</td>
                        <td style="padding: 0">{{ $item->content_type }}</td>
                        <td style="padding: 0">{{ $item->description }}</td>
                        <td style="padding: 0">
                            <label class="mini-switch">
                                <input type="checkbox" class="status-toggle" data-id="{{ $item->id }}"
                                    {{ $item->status ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </td>
                        <td style="padding: 0">
                            <div class="d-flex">
                                <a href="{{ route('content-category.edit', $item) }}" style="margin-top: 10px"
                                    class="btn text-warning shadow-none">Edit</a>

                                <form action="{{ route('content-category.destroy', $item) }}" method="POST"
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ $brandService?->id ? 'Update' : 'Create' }} Brand
                        Service Category
                    </h5>
                </div>
                <form
                    action="{{ $brandService?->id ? route('content-category.update', $brandService) : route('content-category.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($brandService?->id)
                        @method('PUT')
                    @endisset
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label for="">Category <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Service category" name="name"
                                value="{{ old('name', $brandService?->name) }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Content Type</label>
                            <select name="content_type" class="form-control form-select">
                                <option value="Photography" {{$brandService?->content_type == 'Photography' ? 'selected' : ''}}>Photography</option>
                                <option value="Videography" {{$brandService?->content_type == 'Videography' ? 'selected' : ''}}>Videography</option>
                            </select>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea class="form-control" placeholder="Description" name="description">{{ old('description', $brandService->description) }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"
                            class="btn btn-primary">{{ $brandService?->id ? 'Update' : 'Save' }}</button>
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

@if ($brandService?->id)
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

            let url = "{{ route('content-category.toggle-status', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
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
