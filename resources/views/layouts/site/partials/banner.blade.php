<section class="page_banner" style="background-image: url('{{ $image }}');">
    <div class="container">
        <ul class="breadcrumb_nav unordered_list">
            @foreach ($breadcrumbs as $label => $url)
                <li>
                    @if ($url)
                        <a href="{{ $url }}">{{ $label }}</a>
                    @else
                        <a href="{{ $url }}">{{ $label }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
        <h1 class="page_title wow" data-splitting>{{ $title }}</h1>
        @if (!empty($description))
            <p class="page_description">{{ $description }}</p>
        @endif
        <a class="btn btn-primary" href="{{ route('Contact') }}">
            <span class="btn_text">{{ __('common.contact_us') }}</span>
        </a>
    </div>
</section>
