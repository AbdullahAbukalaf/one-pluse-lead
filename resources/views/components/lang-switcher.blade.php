@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
@endphp

@php
    $currentLocale = app()->getLocale();
    $targetLocale = $currentLocale === 'ar' ? 'en' : 'ar';
    $label = $currentLocale === 'ar' ? 'EN' : 'AR';
    $aria = $currentLocale === 'ar' ? __('common.switch_to_english') : __('common.switch_to_arabic');
@endphp

<a href="{{ LaravelLocalization::getLocalizedURL($targetLocale, null, [], true) }}" class="btn btn-sm px-3"
   aria-label="{{ $aria }}">
    {{ $label }}
</a>
