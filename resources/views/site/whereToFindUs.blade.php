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
    @php $whereStrings = trans('where'); @endphp
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
                <div id="retailer-pane" class="tab_panel active">
                    <div class="finder_box">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4 col-lg-4">
                                <label class="finder_label">{{ __('where.country') }}</label>
                                <input class="form-control finder_input" value="Jordan" disabled>
                            </div>

                            <div class="col-md-4 col-lg-4">
                                <label class="finder_label">{{ __('where.city') }} <span class="text-danger">*</span></label>
                                <select id="ret-city" class="form-control finder_input"></select>
                            </div>

                            <div class="col-md-4 col-lg-4">
                                <label class="finder_label">{{ __('where.district') }}</label>
                                <select id="ret-district" class="form-control finder_input" disabled></select>
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
                                    <a id="ret-web" class="action_btn d-none" target="_blank" rel="noopener">
                                        <i class="fa-regular fa-globe"></i> <span>{{ __('where.website') }}</span>
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
                                <label class="finder_label">{{ __('where.district_optional') }}</label>
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
                                <h5 id="ag-name" class="mb-1 fw-bold"></h5>
                                <div id="ag-address" class="text-white mb-3"></div>

                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <a id="ag-dir" class="action_btn" target="_blank" rel="noopener">
                                        <i class="fa-regular fa-location-dot"></i> <span>{{ __('where.directions') }}</span>
                                    </a>
                                    <a id="ag-phone" class="action_btn d-none">
                                        <i class="fa-regular fa-phone"></i> <span>{{ __('where.call') }}</span>
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
                                <iframe id="ag-map" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <style>
        .tab_btn {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, .08);
            color: #fff;
            padding: .6rem 1rem;
            border-radius: 8px;
            font-weight: 700;
            letter-spacing: .3px;
        }

        .tab_btn.active {
            border-color: #d66a23;
            box-shadow: 0 0 0 1px #d66a23 inset;
        }

        .tab_panel {
            display: none;
        }

        .tab_panel.active {
            display: block;
        }

        .finder_box {
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 12px;
            padding: 18px;
        }

        .finder_label {
            color: #9aa0a6;
            font-size: .85rem;
            margin-bottom: .35rem;
        }

        .finder_input {
            background: #0f0f10;
            color: #fff;
            border-color: rgba(255, 255, 255, .12);
        }

        .finder_input:disabled {
            opacity: .8;
        }

        .finder_btn {
            padding: .6rem 1.4rem;
            font-weight: 800;
            letter-spacing: .3px;
        }

        .chip {
            display: inline-block;
            padding: .35rem .6rem;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, .12);
            color: #c1c3c6;
            background: rgba(255, 255, 255, .04);
            font-size: .8rem;
        }

        .result_card {
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 12px;
            padding: 16px;
            height: 100%;
        }

        .action_btn {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 10px;
            padding: .55rem .9rem;
            color: #d66a23;
            background: transparent;
            font-weight: 700;
        }

        .map_wrap {
            height: 340px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, .08);
            background: #0f0f10;
        }

        .map_wrap iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .form-control:disabled {
            background-color: #000 !important;
        }
    </style>

    <script>
        const whereLang = @json($whereStrings);
        document.querySelectorAll('.tab_btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab_btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab_panel').forEach(p => p.classList.remove('active'));
                btn.classList.add('active');
                const target = document.querySelector(btn.dataset.target);
                target?.classList.add('active');
            });
        });

        const byId = id => document.getElementById(id);
        const API_COUNTRIES = 'https://countriesnow.space/api/v0.1/countries';
        const API_CITIES = 'https://countriesnow.space/api/v0.1/countries/cities';

        const gMapEmbed = (lat, lng) => `https://www.google.com/maps?q=${lat},${lng}&z=14&output=embed`;
        const gMapDir = (lat, lng) => `https://www.google.com/maps/dir/?api=1&destination=${lat},${lng}`;

        const JORDAN_DISTRICTS = {
            "Amman": ["Abdoun", "Khalda", "Sweifieh", "Shmeisani", "Jabal Amman", "Jabal Al-Weibdeh", "Downtown",
                "Dabouq", "Tla' Al Ali", "Mecca St."
            ],
            "Irbid": ["Wasfi Al Tal", "Hay Al Hasan", "University St.", "City Center"],
            "Zarqa": ["Jabal Al-Zaitoun", "Al-Ruseifa", "Al-Jaish"],
            "Aqaba": ["Al-Rashid", "City Center", "South Beach"],
            "Madaba": ["City Center", "Al-Fiha", "Al-Jizah"],
            "Balqa": ["Salt Downtown", "Al-Shemeisani (Salt)", "Al-Hussein"],
            "Jerash": ["City Center", "Saqib", "Souf"],
            "Mafraq": ["City Center", "Al-Husseiniya"],
            "Karak": ["Mu'tah", "Ghawr Al-Mazar", "City Center"],
            "Tafilah": ["City Center", "Busaira"],
            "Ma'an": ["City Center", "Wadi Musa (Petra)"],
            "Ajloun": ["Anjara", "City Center"]
        };

        const AGENT_DISTRICTS = {
            "United Arab Emirates::Abu Dhabi": ["Al Khalidiyah", "Mussafah", "Al Reem", "Al Maryah", "Yas Island",
                "Al Bateen"
            ],
            "United Arab Emirates::Dubai": ["Deira", "Bur Dubai", "Jumeirah", "Business Bay", "Al Quoz",
                "Dubai Marina"
            ],
            "United Arab Emirates::Sharjah": ["Al Majaz", "Al Khan", "Al Nahda", "Industrial Area"],
            "Saudi Arabia::Riyadh": ["Olaya", "Malaz", "Diplomatic Quarter", "Al Muruj", "Al Nakheel"],
            "Saudi Arabia::Jeddah": ["Al Hamra", "Al Salamah", "Al Andalus", "Al Shatie"],
            "Qatar::Doha": ["West Bay", "The Pearl", "Al Sadd", "Al Wakrah"]
        };

        const MOCK_RETAILERS = {
            "Amman": {
                "Abdoun": {
                    name: "Perkins-Everitt Lighting & CTL",
                    address: "Abdoun, Amman, Jordan",
                    lat: 31.9522,
                    lng: 35.9187,
                    phone: "+96265555555",
                    website: ""
                },
                "Khalda": {
                    name: "BrightWave Retail - Khalda",
                    address: "Khalda, Amman, Jordan",
                    lat: 31.9991,
                    lng: 35.8569,
                    phone: "",
                    website: ""
                }
            }
        };
        const MOCK_AGENTS = {
            "Saudi Arabia": {
                "Riyadh": {
                    name: "Gulf Luminaires KSA",
                    address: "Olaya St, Riyadh, KSA",
                    lat: 24.7136,
                    lng: 46.6753,
                    phone: "+96611000000",
                    website: ""
                },
                "Jeddah": {
                    name: "Red Sea Lighting",
                    address: "Prince Sultan Rd, Jeddah, KSA",
                    lat: 21.4858,
                    lng: 39.1925,
                    phone: "",
                    website: ""
                }
            },
            "United Arab Emirates": {
                "Dubai": {
                    name: "Emirates Light Co.",
                    address: "Al Quoz, Dubai, UAE",
                    lat: 25.2048,
                    lng: 55.2708,
                    phone: "",
                    website: ""
                },
                "Abu Dhabi": {
                    name: "Capital Illumination",
                    address: "Mussafah, Abu Dhabi, UAE",
                    lat: 24.4539,
                    lng: 54.3773,
                    phone: "",
                    website: ""
                }
            }
        };

        const retCitySel = byId('ret-city');
        const retDistSel = byId('ret-district');
        const retSearch = byId('ret-search');

        async function loadJordanCities() {
            try {
                retCitySel.innerHTML = `<option value="" disabled selected>${whereLang.loading_cities}</option>`;
                const res = await fetch(API_CITIES, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        country: "Jordan"
                    })
                });
                const data = await res.json();
                const cities = (data?.data || []).sort((a, b) => a.localeCompare(b));
                retCitySel.innerHTML = `<option value="" disabled selected>${whereLang.select_city}</option>`;
                cities.forEach(c => {
                    retCitySel.insertAdjacentHTML('beforeend', `<option value="${c}">${c}</option>`);
                });
                retDistSel.innerHTML = `<option value="" disabled selected>${whereLang.select_district}</option>`;
                retDistSel.disabled = true;
            } catch (e) {
                retCitySel.innerHTML = `<option value="" disabled selected>${whereLang.failed_load}</option>`;
                console.error('Jordan cities error', e);
            }
        }

        retCitySel?.addEventListener('change', e => {
            const city = e.target.value;
            const districts = JORDAN_DISTRICTS[city] || [];
            retDistSel.disabled = districts.length === 0;
            retDistSel.innerHTML = districts.length ?
                `<option value="" disabled selected>${whereLang.select_district}</option>` :
                `<option value="" selected>${whereLang.not_available_city}</option>`;
            districts.forEach(d => retDistSel.insertAdjacentHTML('beforeend',
                `<option value="${d}">${d}</option>`));
        });

        retSearch?.addEventListener('click', () => {
            const city = retCitySel.value;
            const district = retDistSel.disabled ? null : retDistSel.value;
            if (!city) {
                alert(whereLang.choose_city);
                return;
            }

            const hit = (MOCK_RETAILERS[city] && district && MOCK_RETAILERS[city][district]) ||
                (MOCK_RETAILERS["Amman"] && MOCK_RETAILERS["Amman"]["Abdoun"]);
            if (!hit) {
                alert(whereLang.no_results);
                return;
            }

            byId('ret-results').classList.remove('d-none');
            byId('ret-name').textContent = hit.name;
            byId('ret-address').textContent = hit.address;
            byId('ret-map').src = gMapEmbed(hit.lat, hit.lng);

            const dir = byId('ret-dir');
            const phone = byId('ret-phone');
            const web = byId('ret-web');
            dir.href = gMapDir(hit.lat, hit.lng);
            if (hit.phone) {
                phone.href = `tel:${hit.phone}`;
                phone.classList.remove('d-none');
            } else phone.classList.add('d-none');
            if (hit.website) {
                web.href = hit.website;
                web.classList.remove('d-none');
            } else web.classList.add('d-none');
        });

        const agCountry = byId('ag-country');
        const agCity = byId('ag-city');
        const agDist = byId('ag-district');
        const agSearch = byId('ag-search');

        async function loadCountries() {
            try {
                agCountry.innerHTML = `<option value="" disabled selected>${whereLang.loading_countries}</option>`;
                const res = await fetch(API_COUNTRIES);
                const json = await res.json();
                const countries = (json?.data || [])
                    .map(c => c.country).filter(Boolean)
                    .sort((a, b) => a.localeCompare(b));
                agCountry.innerHTML = `<option value="" disabled selected>${whereLang.select_country}</option>`;
                countries.forEach(c => agCountry.insertAdjacentHTML('beforeend', `<option value="${c}">${c}</option>`));
                agCity.innerHTML = `<option value="" disabled selected>${whereLang.select_city}</option>`;
                agCity.disabled = true;
                agDist.innerHTML = `<option value="" selected>${whereLang.not_available_city}</option>`;
                agDist.disabled = true;
            } catch (e) {
                agCountry.innerHTML = `<option value="" disabled selected>${whereLang.failed_load}</option>`;
                console.error('Countries error', e);
            }
        }

        agCountry?.addEventListener('change', async e => {
            const country = e.target.value;
            agCity.disabled = true;
            agCity.innerHTML = `<option value="" disabled selected>${whereLang.loading_cities}</option>`;
            agDist.innerHTML = `<option value="" selected>${whereLang.not_available_city}</option>`;
            agDist.disabled = true;

            try {
                const res = await fetch(API_CITIES, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        country
                    })
                });
                const data = await res.json();
                const cities = (data?.data || []).sort((a, b) => a.localeCompare(b));
                agCity.innerHTML = `<option value="" disabled selected>${whereLang.select_city}</option>`;
                cities.forEach(c => agCity.insertAdjacentHTML('beforeend',
                    `<option value="${c}">${c}</option>`));
                agCity.disabled = false;
            } catch (err) {
                agCity.innerHTML = `<option value="" disabled selected>${whereLang.failed_load}</option>`;
                console.error('Cities error', err);
            }
        });

        agCity?.addEventListener('change', () => {
            const country = agCountry.value || "";
            const city = agCity.value || "";
            const key = `${country}::${city}`;
            const districts = AGENT_DISTRICTS[key] || [];

            if (districts.length) {
                agDist.disabled = false;
                agDist.innerHTML = `<option value="" disabled selected>${whereLang.select_district}</option>`;
                districts.forEach(d => agDist.insertAdjacentHTML('beforeend',
                    `<option value="${d}">${d}</option>`));
            } else {
                agDist.disabled = true;
                agDist.innerHTML = `<option value="" selected>${whereLang.not_available_city}</option>`;
            }
        });

        agSearch?.addEventListener('click', () => {
            const country = agCountry.value;
            const city = agCity.value;
            const district = (!agDist.disabled && agDist.value) ? agDist.value : null;
            if (!country || !city) {
                alert(whereLang.choose_country_city);
                return;
            }

            const hit = (MOCK_AGENTS[country] && MOCK_AGENTS[country][city]) ||
                MOCK_AGENTS["United Arab Emirates"]["Dubai"];
            if (!hit) {
                alert(whereLang.no_results);
                return;
            }

            byId('ag-results').classList.remove('d-none');
            byId('ag-name').textContent = hit.name;
            byId('ag-address').textContent = district ?
                `${hit.address}, ${district}, ${city}, ${country}` :
                `${hit.address}, ${city}, ${country}`;
            byId('ag-map').src = gMapEmbed(hit.lat, hit.lng);

            const dir = byId('ag-dir');
            const phone = byId('ag-phone');
            const web = byId('ag-web');
            dir.href = gMapDir(hit.lat, hit.lng);
            if (hit.phone) {
                phone.href = `tel:${hit.phone}`;
                phone.classList.remove('d-none');
            } else phone.classList.add('d-none');
            if (hit.website) {
                web.href = hit.website;
                web.classList.remove('d-none');
            } else web.classList.add('d-none');
        });

        function bootTabsFromQuery() {
            const params = new URLSearchParams(location.search);
            const q = (params.get('tab') || location.hash.replace('#', '') || '').toLowerCase();
            const wanted = q === 'agent' ? '#agent-pane' :
                q === 'retailer' ? '#retailer-pane' :
                null;

            if (!wanted) return;

            document.querySelectorAll('.tab_btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab_panel').forEach(p => p.classList.remove('active'));

            const btn = [...document.querySelectorAll('.tab_btn')]
                .find(b => b.dataset.target === wanted);
            const panel = document.querySelector(wanted);

            if (btn && panel) {
                btn.classList.add('active');
                panel.classList.add('active');
                panel.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }

        loadJordanCities();
        loadCountries();
        document.addEventListener('DOMContentLoaded', bootTabsFromQuery);
    </script>
@endsection
