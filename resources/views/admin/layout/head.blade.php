    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>@yield('title', 'SCP')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/UI/Site/images/site_logo/dark_theme_site_logo.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::asset('resources/UI/Site/images/site_logo/dark_theme_site_logo.svg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::asset('resources/UI/Site/images/site_logo/dark_theme_site_logo.svg') }}">


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('UI/Admin/vendors/styles/core.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/Admin/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/Admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/Admin/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/Admin/vendors/styles/style.css') }}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal {
            position: absolute;
            top: 20%;
            left: 40%;
            width: 40%;
            height: 440px;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            height: -webkit-fill-available;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-danger {
            background-color: red;
            color: white;
        }

        .btn-secondary {
            background-color: gray;
            color: white;
        }

        .deleteButton {
            border: none;
            font-size: 18px;
            padding: 0 5px;
        }

        .modal-footer {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        <style>.pagination-container {
            text-align: center;
            margin-top: 20px;
        }

        .pagination {
            display: inline-flex;
            list-style: none;
            padding-left: 0;
            border-radius: 0.375rem;
        }

        .page-item {
            margin: 0 5px;
        }

        .page-link {
            position: relative;
            display: block;
            padding: 10px 15px;
            font-size: 1rem;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            text-decoration: none;
        }

        .page-link:hover {
            background-color: #f1f1f1;
            color: #0056b3;
        }

        .page-item.active .page-link {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>
    @yield('styles')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
        crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
