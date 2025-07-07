@extends('admin.master')
@section('title', __('messages.create_court'))

@section('custom-styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/toaster.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .image-upload-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .image-box {
            flex: 0 0 180px;
            min-width: 180px;
            max-width: 180px;
        }
        .image-input-wrapper {
            width: 180px !important;
            height: 180px !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: 1px solid #e4e6ef;
            border-radius: 6px;
        }
        .add-image-btn, .remove-box-btn {
            margin-top: 10px;
            width: 100%;
        }
        .image-input {
            position: relative;
        }
    </style>
@endsection

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar pt-5">
                <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                        <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                                {{ __('messages.create_court') }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.courts.store') }}" method="POST" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row">
                        @csrf
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('messages.court_images') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="image-upload-container" id="image-upload-container">
                                        @for ($i = 0; $i < 3; $i++)
                                            <div class="image-box mb-5" data-index="{{ $i }}">
                                                <div class="image-input image-input-outline" data-kt-image-input="true">
                                                    <div class="image-input-wrapper" id="image-preview-{{ $i }}" style="background-image: url('/courts/placeholder-court.webp');"></div>
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                           data-kt-image-input-action="change"
                                                           data-bs-toggle="tooltip"
                                                           title="Change image">
                                                        <i class="ki-duotone ki-pencil fs-7">
                                                            <span class="path1"></span><span class="path2"></span>
                                                        </i>
                                                        <input type="file" name="images[{{ $i }}]" accept=".png, .jpg, .jpeg" onchange="previewImage(this, {{ $i }})" />
                                                        <input type="hidden" name="images[{{ $i }}]" />
                                                    </label>
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                          data-kt-image-input-action="remove"
                                                          data-bs-toggle="tooltip"
                                                          title="Remove image"
                                                          onclick="removeImage({{ $i }})">
                                                        <i class="ki-duotone ki-cross fs-2">
                                                            <span class="path1"></span><span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger remove-box-btn" onclick="removeImageBox(this)">
                                                    {{ __('messages.remove_box') }}
                                                </button>
                                            </div>
                                        @endfor
                                    </div>
                                    <button type="button" class="btn btn-primary add-image-btn" id="add-image-box">
                                        {{ __('messages.add_image') }}
                                    </button>
                                    <div class="text-muted fs-7 mt-3">You can upload up to 10 images. Only *.png, *.jpg and *.jpeg are accepted.</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('messages.general_information') }}</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <!-- Title -->
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">{{ __('messages.title') }}</label>
                                        <input type="text" name="title" class="form-control" required value="{{ old('title') }}" />
                                    </div>

                                    <!-- Sport Type -->
                                    <div class="mb-10 fv-row">
                                        <label class="form-label">{{ __('messages.sport_type') }}</label>
                                        <select name="sport_type_id" class="form-select" required>
                                            <option value="">{{ __('messages.select_sport_type') }}</option>
                                            @foreach ($datas['sport_types'] as $key => $sportType)
                                                <option value="{{ $sportType->id }}" @selected(old('sport_type_id') == $sportType->id)>
                                                    {{ $sportType->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Court Address -->
                                    <div class="mb-10 fv-row">
                                        <label class="form-label">{{ __('messages.street_name') }}</label>
                                        <input type="text" name="court_address[street_name]" class="form-control mb-2" placeholder="Street name"
                                            value="{{ old('court_address.street_name') }}" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">{{ __('messages.address_detail') }}</label>
                                        <input type="text" name="court_address[address_detail]" class="form-control mb-2" placeholder="Address detail"
                                            value="{{ old('court_address.address_detail') }}" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">{{ __('messages.neighborhood') }}</label>
                                        <input type="text" name="court_address[neighborhood]" class="form-control mb-2" placeholder="Neighborhood"
                                            value="{{ old('court_address.neighborhood') }}" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">{{ __('messages.building_number') }}</label>
                                        <input type="text" name="court_address[building_number]" class="form-control mb-2" placeholder="Building Number"
                                            value="{{ old('court_address.building_number') }}" />
                                    </div>



                                    <div class="mb-10 fv-row">
                                        <label class="form-label">{{ __('messages.city') }}</label>
                                        <select id="city-select"
                                            class="form-select form-select-solid fw-bold text-dark"
                                            data-placeholder="Select City"
                                            name="city_id"
                                            data-allow-clear="true">
                                            <option value="">{{ __('messages.select_city') }}</option>
                                            @foreach ($datas['cities'] as $city)
                                                <option value="{{ $city->id }}" style="text-transform: capitalize; font-size: 16px;">{{ $city->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">{{ __('messages.district') }}</label>
                                        <select name="court_address[district_id]" id="district-select" class="form-select mb-2">
                                            <option value="">{{ __('messages.select_district') }}</option>
                                        </select>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">{{ __('messages.longitude') }}</label>
                                        <input type="text" name="court_address[longitude]" class="form-control mb-2" placeholder="Longitude"
                                            value="{{ old('court_address.longitude') }}" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">{{ __('messages.latitude') }}</label>
                                        <input type="text" name="court_address[latitude]" class="form-control mb-2" placeholder="Latitude"
                                            value="{{ old('court_address.latitude') }}" />
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <label class="form-label">{{ __('messages.map_location') }}</label>
                                        <div id="kt_contact_map" style="height: 400px; border-radius: 8px;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.courts.index') }}" class="btn btn-light me-5">
                                    {{ __('messages.cancel') }}
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">{{ __('messages.save_changes') }}</span>
                                    <span class="indicator-progress">
                                        {{ __('messages.please_wait') }}
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        let imageBoxCounter = 3;

        function previewImage(input, index) {
            const file = input.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById(`image-preview-${index}`);
                if (preview) {
                    preview.style.backgroundImage = `url('${e.target.result}')`;
                    preview.style.backgroundSize = 'cover';
                    preview.style.backgroundPosition = 'center';
                }
            };
            reader.readAsDataURL(file);
        }

        function removeImage(index) {
            const preview = document.getElementById(`image-preview-${index}`);
            if (preview) {
                preview.style.backgroundImage = `url('/courts/placeholder-court.webp')`;
                preview.style.backgroundSize = 'cover';
                preview.style.backgroundPosition = 'center';
                const input = preview.parentElement.querySelector('input[type="file"]');
                const removeInput = preview.parentElement.querySelector('input[type="hidden"]');
                if (input) input.value = '';
                if (removeInput) removeInput.value = '1';
            }
        }

        function removeImageBox(button) {
            const box = button.closest('.image-box');
            if (box) {
                box.remove();
                reindexImageBoxes();
            }
        }

        function reindexImageBoxes() {
            const container = document.getElementById('image-upload-container');
            const boxes = container.querySelectorAll('.image-box');
            imageBoxCounter = 0;

            boxes.forEach((box, index) => {
                box.setAttribute('data-index', index);
                const preview = box.querySelector('.image-input-wrapper');
                const fileInput = box.querySelector('input[type="file"]');
                const removeInput = box.querySelector('input[type="hidden"]');
                const removeButton = box.querySelector('.remove-box-btn');
                const changeLabel = box.querySelector('label[data-kt-image-input-action="change"]');
                const removeSpan = box.querySelector('span[data-kt-image-input-action="remove"]');

                if (preview) preview.id = `image-preview-${index}`;
                if (fileInput) fileInput.name = `images[${index}]`;
                if (removeInput) removeInput.name = `images_remove[${index}]`;
                if (removeButton) removeButton.onclick = () => removeImageBox(removeButton);
                if (changeLabel) {
                    const fileInputNew = changeLabel.querySelector('input[type="file"]');
                    if (fileInputNew) fileInputNew.setAttribute('onchange', `previewImage(this, ${index})`);
                }
                if (removeSpan) removeSpan.setAttribute('onclick', `removeImage(${index})`);
                imageBoxCounter = index + 1;
            });
        }

        document.getElementById('add-image-box').addEventListener('click', function () {
            const container = document.getElementById('image-upload-container');
            const maxBoxes = 10;

            if (container.querySelectorAll('.image-box').length >= maxBoxes) {
                alert("Maximum of 10 images reached.");
                return;
            }

            const newBox = document.createElement('div');
            newBox.classList.add('image-box', 'mb-5');
            newBox.setAttribute('data-index', imageBoxCounter);
            newBox.innerHTML = `
                <div class="image-input image-input-outline" data-kt-image-input="true">
                    <div class="image-input-wrapper" id="image-preview-${imageBoxCounter}" style="background-image: url('/courts/placeholder-court.webp'); background-size: cover; background-position: center;"></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                           data-kt-image-input-action="change"
                           data-bs-toggle="tooltip"
                           title="Change image">
                        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                        <input type="file" name="images[${imageBoxCounter}]" accept=".png, .jpg, .jpeg"
                               onchange="previewImage(this, ${imageBoxCounter})" />
                        <input type="hidden" name="images_remove[${imageBoxCounter}]" />
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                          data-kt-image-input-action="remove"
                          data-bs-toggle="tooltip"
                          title="Remove image"
                          onclick="removeImage(${imageBoxCounter})">
                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                    </span>
                </div>
                <button type="button" class="btn btn-sm btn-danger remove-box-btn" onclick="removeImageBox(this)">
                    {{ __('messages.remove_box') }}
                </button>
            `;
            container.appendChild(newBox);
            imageBoxCounter++;
        });

        const oldLat = parseFloat(document.querySelector('input[name="court_address[latitude]"]').value);
        const oldLng = parseFloat(document.querySelector('input[name="court_address[longitude]"]').value);

        if (!isNaN(oldLat) && !isNaN(oldLng)) {
            map.setView([oldLat, oldLng], 14);
            marker = L.marker([oldLat, oldLng], {draggable: true}).addTo(map);
            marker.on('dragend', function (event) {
                const position = event.target.getLatLng();
                updateLatLngInputs(position.lat.toFixed(6), position.lng.toFixed(6));
            });
        }
        document.addEventListener('DOMContentLoaded', function () {
            const defaultLat = 37.0;
            const defaultLng = 30.0;

            const map = L.map('kt_contact_map').setView([defaultLat, defaultLng], 7);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
            }).addTo(map);

            let marker;

            const latInput = document.querySelector('input[name="court_address[latitude]"]');
            const lngInput = document.querySelector('input[name="court_address[longitude]"]');

            function updateLatLngInputs(lat, lng) {
                latInput.value = lat;
                lngInput.value = lng;
            }

            function moveMarkerIfValid(lat, lng) {
                if (!isNaN(lat) && !isNaN(lng)) {
                    if (!marker) {
                        marker = L.marker([lat, lng], { draggable: true }).addTo(map);
                        marker.on('dragend', function (event) {
                            const position = event.target.getLatLng();
                            updateLatLngInputs(position.lat.toFixed(6), position.lng.toFixed(6));
                        });
                    } else {
                        marker.setLatLng([lat, lng]);
                    }
                    map.setView([lat, lng], 14);
                }
            }

            // Marker'ı tıklama ile ekle
            map.on('click', function (e) {
                const lat = e.latlng.lat.toFixed(6);
                const lng = e.latlng.lng.toFixed(6);
                moveMarkerIfValid(lat, lng);
                updateLatLngInputs(lat, lng);
            });

            // Input'tan marker'ı güncelle
            latInput.addEventListener('input', () => {
                const lat = parseFloat(latInput.value);
                const lng = parseFloat(lngInput.value);
                moveMarkerIfValid(lat, lng);
            });

            lngInput.addEventListener('input', () => {
                const lat = parseFloat(latInput.value);
                const lng = parseFloat(lngInput.value);
                moveMarkerIfValid(lat, lng);
            });

            // Sayfa ilk yüklenirken eski veriler varsa marker'ı göster
            const initialLat = parseFloat(latInput.value);
            const initialLng = parseFloat(lngInput.value);
            moveMarkerIfValid(initialLat, initialLng);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const citySelect = document.getElementById('city-select');
            const districtSelect = document.getElementById('district-select');
            const oldDistrictId = '{{ old('court_address.district_id') }}';

            citySelect.addEventListener('change', function () {
                const cityId = this.value;

                districtSelect.innerHTML = '<option value="">{{ __('messages.loading') }}...</option>';

                if (!cityId) {
                    districtSelect.innerHTML = '<option value="">{{ __('messages.select_district') }}</option>';
                    return;
                }

                fetch(`/api/districts/cities/${cityId}`)
                    .then(response => response.json())
                    .then(data => {

                        let options = '<option value="">{{ __('messages.select_district') }}</option>';
                        data?.result?.data.forEach(district => {
                            const selected = district.id == oldDistrictId ? 'selected' : '';
                            options += `<option value="${district.id}" ${selected}>${district.title}</option>`;
                        });
                        districtSelect.innerHTML = options;
                    })
                    .catch(() => {
                        districtSelect.innerHTML = '<option value="">{{ __('messages.load_failed') }}</option>';
                    });
            });

            // Sayfa ilk yüklendiğinde eski city_id varsa trigger et
            const initialCityId = citySelect.value;
            if (initialCityId) {
                citySelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
@endsection
