    @php
        $cityTitles = collect($datas['cities'] ?? [])->pluck('title', 'id')->toArray();
        $sportTypeTitles = collect($datas['sport_types'] ?? [])->pluck('title', 'id')->toArray();
    @endphp
    <x-filter-tags
        :excludedFilters="['page', 'per_page']"
        :titleMaps="[
            'city_id' => $cityTitles,
            'sport_type_id' => $sportTypeTitles,
        ]"
        translationsPrefix="messages"
    />
    @include('components.pagination.default', ['data' => $datas['users']])
    @foreach ($datas['users']['data'] as $key => $user)
        <div class="col-md-6 col-xxl-4">
        <div class="card">
            <div class="card-body d-flex flex-center flex-column py-9 px-5">
                <div class="symbol symbol-65px symbol-circle mb-5">
                    <img src="{{ 'avatar/'. $user['avatar'] }}" alt="image" />
                    <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
                </div>
                <a href="{{ route('users.profile', ['id' => $user['id']]) }}" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $user['full_name'] }}</a>
                <div class="fw-semibold text-gray-500 mb-6">Art Director at Novica Co.</div>
                <!--begin::Info-->
                <div class="d-flex flex-center flex-wrap mb-5">
                    <!--begin::Stats-->
                    <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">$14,560</div>
                        <div class="fw-semibold text-gray-500">Earnings</div>
                    </div>
                </div>
                <button class="btn btn-sm btn-light-primary btn-flex btn-center" data-kt-follow-btn="true">
                    <i class="ki-duotone ki-check following fs-3"></i>
                    <i class="ki-duotone ki-plus follow fs-3 d-none"></i>
                    <span class="indicator-label"> Following</span>
                    <span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span>
                </button>
            </div>
        </div>
    </div>
    @endforeach
