<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.contact-hero.*') ? 'active' : '' }}" href="{{ route('admin.contact-hero.edit') }}">Banner</a></li>
    {{-- <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.contact-banner.*') ? 'active' : '' }}" href="{{ route('admin.contact-banner.edit') }}">Banner</a></li> --}}
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.contact-explore-locator.*') ? 'active' : '' }}" href="{{ route('admin.contact-explore-locator.edit') }}">Explore Locator</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.contact-form-section.*') ? 'active' : '' }}" href="{{ route('admin.contact-form-section.edit') }}">Form Section</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.contact-info.*') ? 'active' : '' }}" href="{{ route('admin.contact-info.edit') }}">Contact Info</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.contact-video.*') ? 'active' : '' }}" href="{{ route('admin.contact-video.edit') }}">Book service</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.contact-submissions.*') ? 'active' : '' }}" href="{{ route('admin.contact-submissions.index') }}">Submissions</a></li>
</ul>
