@extends('layouts.site.master')
@section('title', __('where.title'))

@section('page-banner')
    @include('layouts.site.partials.banner', [
        'title' => __('where.title'),
        'image' => asset('UI/Site/images/shapes/tyre_print.svg'),
        'description' => __('where.banner_description'),
        'breadcrumbs' => [
            __('nav.home') => route('home'),
            __('where.title') => '#',
        ],
    ])
@endsection

@section('main-content')
@php
    $whereStrings = trans('where');
    $isAr = app()->getLocale() === 'ar';

    // IMPORTANT: you must include district_en/district_ar in BOTH tables now.
    // We serialize active records only (same standard as other CMS pages).

    $locationsPayload = ($locations ?? collect())->map(function($x){
        return [
            'id' => $x->id,
            'country_en' => $x->country_en,
            'country_ar' => $x->country_ar,
            'city_en' => $x->city_en,
            'city_ar' => $x->city_ar,
            'district_en' => $x->district_en,
            'district_ar' => $x->district_ar,
            'address_en' => $x->address_en,
            'address_ar' => $x->address_ar,
            'latitude' => $x->latitude,
            'longitude' => $x->longitude,
            'phone' => $x->phone,
            'email' => $x->email,
            'map_embed_url' => $x->map_embed_url,
        ];
    })->values();

    $distributorsPayload = ($distributors ?? collect())->map(function($x){
        return [
            'id' => $x->id,
            'name_en' => $x->name_en,
            'name_ar' => $x->name_ar,
            'country_en' => $x->country_en,
            'country_ar' => $x->country_ar,
            'city_en' => $x->city_en,
            'city_ar' => $x->city_ar,
            'district_en' => $x->district_en,
            'district_ar' => $x->district_ar,
            'address_en' => $x->address_en,
            'address_ar' => $x->address_ar,
            'latitude' => $x->latitude,
            'longitude' => $x->longitude,
            'map_embed_url' => $x->map_embed_url,
            'phone' => $x->phone,
            'email' => $x->email,
            'website' => $x->website,
            'logo' => $x->logo ? asset('storage/'.$x->logo) : null,
        ];
    })->values();
@endphp

<section class="section_space_lg">
    <div class="container">

        <div class="tab_switch mb-4">
            <ul class="unordered_list d-inline-flex gap-2">
                <li>
                    <button type="button" class="tab_btn active" data-target="#retailer-pane">{{ __('where.tabs.retailer') }}</button>
                </li>
                <li>
                    <button type="button" class="tab_btn" data-target="#agent-pane">{{ __('where.tabs.agent') }}</button>
                </li>
            </ul>
        </div>

        <div class="tab_panels">
            {{-- ===================== RETAILER (LOCATIONS) ===================== --}}
            <div id="retailer-pane" class="tab_panel active">
                <div class="finder_box">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4 col-lg-4">
                            <label class="finder_label">{{ __('where.country') }} <span class="text-danger">*</span></label>
                            <select id="ret-country" class="form-control finder_input"></select>
                        </div>

                        <div class="col-md-4 col-lg-4">
                            <label class="finder_label">{{ __('where.city') }} <span class="text-danger">*</span></label>
                            <select id="ret-city" class="form-control finder_input" disabled></select>
                        </div>

                        <div class="col-md-4 col-lg-4">
                            <label class="finder_label">{{ __('where.district') }}</label>
                            <select id="ret-district" class="form-control finder_input" disabled>
                                <option value="" selected>{{ __('where.not_available_city') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button id="ret-search" class="btn btn-primary finder_btn">{{ __('where.search') }}</button>
                    </div>

                    <ul class="unordered_list mt-3 d-flex flex-wrap gap-2">
                        <li><span class="chip">{{ __('where.chips.spec') }}</span></li>
                        <li><span class="chip">{{ __('where.chips.non_metered') }}</span></li>
                        <li><span class="chip">{{ __('where.chips.dot') }}</span></li>
                        <li><span class="chip">{{ __('where.chips.utility') }}</span></li>
                        <li><span class="chip">{{ __('where.chips.sports') }}</span></li>
                    </ul>
                </div>

                <div id="ret-results" class="row mt-4 d-none">
                    <div class="col-lg-6">
                        <div class="result_card">
                            <h5 id="ret-name" class="mb-1 fw-bold"></h5>
                            <div id="ret-address" class="text-white mb-3"></div>

                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <a id="ret-dir" class="action_btn" target="_blank" rel="noopener">
                                    <i class="fa-regular fa-location-dot"></i> <span>{{ __('where.directions') }}</span>
                                </a>
                                <a id="ret-phone" class="action_btn d-none">
                                    <i class="fa-regular fa-phone"></i> <span>{{ __('where.call') }}</span>
                                </a>
                                <a id="ret-email" class="action_btn d-none">
                                    <i class="fa-regular fa-envelope"></i> <span>{{ __('where.email') }}</span>
                                </a>
                            </div>

                            <ul class="unordered_list d-flex flex-wrap gap-2">
                                <li><span class="tag">{{ __('where.chips.spec') }}</span></li>
                                <li><span class="tag">{{ __('where.chips.non_metered') }}</span></li>
                                <li><span class="tag">{{ __('where.chips.sports') }}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="map_wrap">
                            <iframe id="ret-map" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===================== AGENT (DISTRIBUTORS) ===================== --}}
            <div id="agent-pane" class="tab_panel">
                <div class="finder_box">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4 col-lg-4">
                            <label class="finder_label">{{ __('where.country') }} <span class="text-danger">*</span></label>
                            <select id="ag-country" class="form-control finder_input"></select>
                        </div>

                        <div class="col-md-4 col-lg-4">
                            <label class="finder_label">{{ __('where.city') }} <span class="text-danger">*</span></label>
                            <select id="ag-city" class="form-control finder_input" disabled></select>
                        </div>

                        <div class="col-md-4 col-lg-4">
                            <label class="finder_label">{{ __('where.district') }}</label>
                            <select id="ag-district" class="form-control finder_input" disabled>
                                <option value="" selected>{{ __('where.not_available_city') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button id="ag-search" class="btn btn-primary finder_btn">{{ __('where.search') }}</button>
                    </div>

                    <ul class="unordered_list mt-3 d-flex flex-wrap gap-2">
                        <li><span class="chip">{{ __('where.chips.distributor') }}</span></li>
                        <li><span class="chip">{{ __('where.chips.official_agent') }}</span></li>
                    </ul>
                </div>

                <div id="ag-results" class="row mt-4 d-none">
                    <div class="col-lg-6">
                        <div class="result_card">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <img id="ag-logo" src="" alt="Logo" style="height:48px; width:auto; display:none;">
                                <div>
                                    <h5 id="ag-name" class="mb-1 fw-bold"></h5>
                                    <div id="ag-meta" class="text-white"></div>
                                </div>
                            </div>

                            <div id="ag-address" class="text-white mb-3"></div>

                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <a id="ag-dir" class="action_btn d-none" target="_blank" rel="noopener">
                                    <i class="fa-regular fa-location-dot"></i> <span>{{ __('where.directions') }}</span>
                                </a>
                                <a id="ag-phone" class="action_btn d-none">
                                    <i class="fa-regular fa-phone"></i> <span>{{ __('where.call') }}</span>
                                </a>
                                <a id="ag-email" class="action_btn d-none">
                                    <i class="fa-regular fa-envelope"></i> <span>{{ __('where.email') }}</span>
                                </a>
                                <a id="ag-web" class="action_btn d-none" target="_blank" rel="noopener">
                                    <i class="fa-regular fa-globe"></i> <span>{{ __('where.website') }}</span>
                                </a>
                            </div>

                            <ul class="unordered_list d-flex flex-wrap gap-2">
                                <li><span class="tag">{{ __('where.chips.distributor') }}</span></li>
                                <li><span class="tag">{{ __('where.chips.official_agent') }}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="map_wrap">
                            <iframe id="ag-map" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    .tab_btn { background: transparent; border: 1px solid rgba(255,255,255,.08); color:#fff; padding:.6rem 1rem; border-radius:8px; font-weight:700; letter-spacing:.3px; }
    .tab_btn.active { border-color:#d66a23; box-shadow:0 0 0 1px #d66a23 inset; }
    .tab_panel { display:none; } .tab_panel.active { display:block; }
    .finder_box { background: rgba(255,255,255,.04); border:1px solid rgba(255,255,255,.08); border-radius:12px; padding:18px; }
    .finder_label { color:#9aa0a6; font-size:.85rem; margin-bottom:.35rem; }
    .finder_input { background:#0f0f10; color:#fff; border-color:rgba(255,255,255,.12); }
    .finder_input:disabled { opacity:.8; }
    .finder_btn { padding:.6rem 1.4rem; font-weight:800; letter-spacing:.3px; }
    .chip { display:inline-block; padding:.35rem .6rem; border-radius:8px; border:1px solid rgba(255,255,255,.12); color:#c1c3c6; background:rgba(255,255,255,.04); font-size:.8rem; }
    .result_card { background:rgba(255,255,255,.04); border:1px solid rgba(255,255,255,.08); border-radius:12px; padding:16px; height:100%; }
    .action_btn { display:inline-flex; align-items:center; gap:.5rem; border:1px solid rgba(255,255,255,.12); border-radius:10px; padding:.55rem .9rem; color:#d66a23; background:transparent; font-weight:700; }
    .map_wrap { height:340px; border-radius:12px; overflow:hidden; border:1px solid rgba(255,255,255,.08); background:#0f0f10; }
    .map_wrap iframe { width:100%; height:100%; border:0; }
    .form-control:disabled { background-color:#000 !important; }
</style>

<script>
    const whereLang = @json($whereStrings);
    const isAr = @json($isAr);
    const locations = @json($locationsPayload);
    const distributors = @json($distributorsPayload);

    document.querySelectorAll('.tab_btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.tab_btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab_panel').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            document.querySelector(btn.dataset.target)?.classList.add('active');
        });
    });

    const byId = id => document.getElementById(id);
    const distinct = arr => [...new Set(arr.filter(v => v !== null && v !== undefined && String(v).trim() !== ''))];
    const gMapEmbed = (lat, lng) => `https://www.google.com/maps?q=${lat},${lng}&z=14&output=embed`;
    const gMapDir = (lat, lng) => `https://www.google.com/maps/dir/?api=1&destination=${lat},${lng}`;

    function textField(x, arKey, enKey) { return isAr ? (x[arKey] || '') : (x[enKey] || ''); }

    function setDistrictSelect(sel, districts) {
        if (districts.length) {
            sel.disabled = false;
            sel.innerHTML = `<option value="" disabled selected>${whereLang.select_district ?? 'Select district'}</option>`;
            districts.forEach(d => sel.insertAdjacentHTML('beforeend', `<option value="${d}">${d}</option>`));
        } else {
            sel.disabled = true;
            sel.innerHTML = `<option value="" selected>${whereLang.not_available_city ?? 'Not available for this city'}</option>`;
        }
    }

    // ===================== Retailer (Locations) =====================
    const retCountry = byId('ret-country');
    const retCity = byId('ret-city');
    const retDistrict = byId('ret-district');
    const retSearch = byId('ret-search');

    function bootRetailer() {
        const countries = distinct(locations.map(x => textField(x,'country_ar','country_en'))).sort((a,b)=>a.localeCompare(b));
        retCountry.innerHTML = `<option value="" disabled selected>${whereLang.select_country ?? 'Select country'}</option>`;
        countries.forEach(c => retCountry.insertAdjacentHTML('beforeend', `<option value="${c}">${c}</option>`));

        retCity.disabled = true;
        retCity.innerHTML = `<option value="" disabled selected>${whereLang.select_city ?? 'Select city'}</option>`;
        setDistrictSelect(retDistrict, []);
    }

    retCountry?.addEventListener('change', () => {
        const c = retCountry.value;
        const filtered = locations.filter(x => textField(x,'country_ar','country_en') === c);
        const cities = distinct(filtered.map(x => textField(x,'city_ar','city_en'))).sort((a,b)=>a.localeCompare(b));

        retCity.disabled = false;
        retCity.innerHTML = `<option value="" disabled selected>${whereLang.select_city ?? 'Select city'}</option>`;
        cities.forEach(ci => retCity.insertAdjacentHTML('beforeend', `<option value="${ci}">${ci}</option>`));

        setDistrictSelect(retDistrict, []);
    });

    retCity?.addEventListener('change', () => {
        const c = retCountry.value;
        const ci = retCity.value;

        const filtered = locations.filter(x =>
            textField(x,'country_ar','country_en') === c &&
            textField(x,'city_ar','city_en') === ci
        );

        const districts = distinct(filtered.map(x => textField(x,'district_ar','district_en'))).sort((a,b)=>a.localeCompare(b));
        setDistrictSelect(retDistrict, districts);
    });

    retSearch?.addEventListener('click', () => {
        const c = retCountry.value;
        const ci = retCity.value;
        const di = retDistrict.disabled ? null : retDistrict.value;

        if (!c || !ci) { alert(whereLang.choose_country_city ?? 'Please choose country & city'); return; }
        if (!retDistrict.disabled && !di) { alert(whereLang.choose_district ?? 'Please choose district'); return; }

        const hit = locations.find(x =>
            textField(x,'country_ar','country_en') === c &&
            textField(x,'city_ar','city_en') === ci &&
            (retDistrict.disabled ? true : textField(x,'district_ar','district_en') === di)
        );

        if (!hit) { alert(whereLang.no_results ?? 'No results'); return; }

        byId('ret-results').classList.remove('d-none');

        const title = `${ci} - ${c}` + (di ? ` - ${di}` : '');
        byId('ret-name').textContent = title;
        byId('ret-address').textContent = textField(hit,'address_ar','address_en');

        const lat = hit.latitude, lng = hit.longitude;
        const map = byId('ret-map');
        if (hit.map_embed_url) map.src = hit.map_embed_url;
        else if (lat && lng) map.src = gMapEmbed(lat, lng);
        else map.removeAttribute('src');

        const dir = byId('ret-dir');
        dir.href = (lat && lng) ? gMapDir(lat, lng) : '#';

        const phone = byId('ret-phone');
        if (hit.phone) { phone.href = `tel:${hit.phone}`; phone.classList.remove('d-none'); }
        else phone.classList.add('d-none');

        const email = byId('ret-email');
        if (hit.email) { email.href = `mailto:${hit.email}`; email.classList.remove('d-none'); }
        else email.classList.add('d-none');
    });

    // ===================== Agent (Distributors) =====================
    const agCountry = byId('ag-country');
    const agCity = byId('ag-city');
    const agDistrict = byId('ag-district');
    const agSearch = byId('ag-search');

    function bootAgent() {
        const countries = distinct(distributors.map(x => textField(x,'country_ar','country_en'))).sort((a,b)=>a.localeCompare(b));
        agCountry.innerHTML = `<option value="" disabled selected>${whereLang.select_country ?? 'Select country'}</option>`;
        countries.forEach(c => agCountry.insertAdjacentHTML('beforeend', `<option value="${c}">${c}</option>`));

        agCity.disabled = true;
        agCity.innerHTML = `<option value="" disabled selected>${whereLang.select_city ?? 'Select city'}</option>`;
        setDistrictSelect(agDistrict, []);
    }

    agCountry?.addEventListener('change', () => {
        const c = agCountry.value;
        const filtered = distributors.filter(x => textField(x,'country_ar','country_en') === c);
        const cities = distinct(filtered.map(x => textField(x,'city_ar','city_en'))).sort((a,b)=>a.localeCompare(b));

        agCity.disabled = false;
        agCity.innerHTML = `<option value="" disabled selected>${whereLang.select_city ?? 'Select city'}</option>`;
        cities.forEach(ci => agCity.insertAdjacentHTML('beforeend', `<option value="${ci}">${ci}</option>`));

        setDistrictSelect(agDistrict, []);
    });

    agCity?.addEventListener('change', () => {
        const c = agCountry.value;
        const ci = agCity.value;

        const filtered = distributors.filter(x =>
            textField(x,'country_ar','country_en') === c &&
            textField(x,'city_ar','city_en') === ci
        );

        const districts = distinct(filtered.map(x => textField(x,'district_ar','district_en'))).sort((a,b)=>a.localeCompare(b));
        setDistrictSelect(agDistrict, districts);
    });

    agSearch?.addEventListener('click', () => {
        const c = agCountry.value;
        const ci = agCity.value;
        const di = agDistrict.disabled ? null : agDistrict.value;

        if (!c || !ci) { alert(whereLang.choose_country_city ?? 'Please choose country & city'); return; }
        if (!agDistrict.disabled && !di) { alert(whereLang.choose_district ?? 'Please choose district'); return; }

        const hit = distributors.find(x =>
            textField(x,'country_ar','country_en') === c &&
            textField(x,'city_ar','city_en') === ci &&
            (agDistrict.disabled ? true : textField(x,'district_ar','district_en') === di)
        );

        if (!hit) { alert(whereLang.no_results ?? 'No results'); return; }

        byId('ag-results').classList.remove('d-none');

        byId('ag-name').textContent = textField(hit,'name_ar','name_en');
        byId('ag-meta').textContent = `${ci} - ${c}` + (di ? ` - ${di}` : '');
        byId('ag-address').textContent = textField(hit,'address_ar','address_en');

        const logo = byId('ag-logo');
        if (hit.logo) { logo.src = hit.logo; logo.style.display = 'block'; }
        else { logo.removeAttribute('src'); logo.style.display = 'none'; }

        const lat = hit.latitude, lng = hit.longitude;
        const map = byId('ag-map');
        if (hit.map_embed_url) map.src = hit.map_embed_url;
        else if (lat && lng) map.src = gMapEmbed(lat, lng);
        else map.removeAttribute('src');

        const dir = byId('ag-dir');
        if (lat && lng) { dir.href = gMapDir(lat, lng); dir.classList.remove('d-none'); }
        else dir.classList.add('d-none');

        const phone = byId('ag-phone');
        if (hit.phone) { phone.href = `tel:${hit.phone}`; phone.classList.remove('d-none'); }
        else phone.classList.add('d-none');

        const email = byId('ag-email');
        if (hit.email) { email.href = `mailto:${hit.email}`; email.classList.remove('d-none'); }
        else email.classList.add('d-none');

        const web = byId('ag-web');
        if (hit.website) { web.href = hit.website; web.classList.remove('d-none'); }
        else web.classList.add('d-none');
    });

    function bootTabsFromQuery() {
        const params = new URLSearchParams(location.search);
        const q = (params.get('tab') || location.hash.replace('#', '') || '').toLowerCase();
        const wanted = q === 'agent' ? '#agent-pane' : q === 'retailer' ? '#retailer-pane' : null;
        if (!wanted) return;

        document.querySelectorAll('.tab_btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.tab_panel').forEach(p => p.classList.remove('active'));

        const btn = [...document.querySelectorAll('.tab_btn')].find(b => b.dataset.target === wanted);
        const panel = document.querySelector(wanted);

        if (btn && panel) {
            btn.classList.add('active');
            panel.classList.add('active');
            panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        bootRetailer();
        bootAgent();
        bootTabsFromQuery();
    });
</script>
@endsection
