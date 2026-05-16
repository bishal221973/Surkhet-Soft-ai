<div class="card mb-4 shadow-sm border-0">

    <!-- Header -->
    <div class="p-3 d-flex justify-content-between align-items-center flex-wrap gap-2">

        <!-- Left: Search -->
        <div class="search-wrapper">
            <i class="bi bi-search search-icon"></i>
            <input type="text" id="customSearch" class="form-control" placeholder="Search brands...">
        </div>

        <!-- Right: Export Buttons -->
        <div class="export-buttons d-flex align-items-center gap-2">
            <button class="btn btn-light export-btn" id="exportExcel">
                <i class="bi bi-file-earmark-excel"></i> Excel
            </button>
            <button class="btn btn-light export-btn" id="exportCsv">
                <i class="bi bi-filetype-csv"></i> CSV
            </button>
            <button class="btn btn-light export-btn" id="exportPdf">
                <i class="bi bi-file-earmark-pdf"></i> PDF
            </button>
            <button class="btn btn-light export-btn" id="exportPrint">
                <i class="bi bi-printer"></i> Print
            </button>
            @isset($actions)
                {{ $actions }}
            @endisset
        </div>

    </div>

    <!-- Table -->
    <div class="card-body p-0">
        <table id="myTable" class="table table-hover align-middle mb-0">
            <thead class="table-header">
                <tr>
                    @foreach ($headers as $header)
                        <th>{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>

</div>

<style>
    /* Card */
    .card {
        border-radius: 12px;
        overflow: hidden;
    }

    /* Table Header */
    .table-header th {
        background: linear-gradient(135deg, #789EC3, #5a86b6);
        color: #fff;
        font-weight: 500;
        font-size: 14px;
        padding: 12px;
    }

    /* Table rows */
    .table tbody tr {
        transition: 0.2s;
    }

    .table tbody tr:hover {
        background-color: #f5f9ff;
    }

    /* Search */
    .search-wrapper {
        position: relative;
        width: 260px;
    }

    .search-wrapper input {
        border-radius: 30px;
        padding: 8px 15px 8px 42px;
        border: 1px solid #e0e0e0;
        background-color: #f9fbfd;
        transition: 0.3s;
    }

    .search-wrapper input:focus {
        background-color: #fff;
        border-color: #789EC3;
        box-shadow: 0 0 8px rgba(120, 158, 195, 0.3);
    }

    /* Search icon */
    .search-icon {
        position: absolute;
        top: 50%;
        left: 14px;
        transform: translateY(-50%);
        color: #888;
        font-size: 14px;
    }

    /* Export buttons */
    .export-btn {
        border-radius: 25px;
        padding: 6px 14px;
        font-size: 13px;
        border: 1px solid #e0e0e0;
        transition: 0.2s;
    }

    .export-btn i {
        margin-right: 5px;
    }

    /* Hover effects */
    .export-btn:hover {
        background-color: #789EC3;
        color: #fff;
        border-color: #789EC3;
    }
</style>
