<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.layout.head')
</head>

<body>
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="vendors/images/deskapp-logo.svg" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div> --}}

    <!-- Header -->
    @include('admin.layout.header')
    <!--/ End Header -->
    <div class="main-container">
        @include('admin.layout.partials.alerts')
        @yield('content')
    </div>

    <div id="deleteModal" class="modal" style="display: none;">
        <div class="modal-content">
            <h4>Are you sure you want to delete this?</h4>
            <div class="modal-footer">
                <button id="confirmDelete" class="btn btn-danger">Yes</button>
                <button id="cancelDelete" class="btn btn-secondary">No</button>
            </div>
        </div>
    </div>
    @include('admin.layout.footer')

</body>

</html>
