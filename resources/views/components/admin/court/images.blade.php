<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('messages.images') }}</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <div id="image-upload-container" style="max-height: 500px;overflow-y: auto;padding-right: 15px;">
            @foreach ($images as $key => $image)
                <div class="image-box mb-5" data-index="{{ $key }}">
                    <input type="hidden" name="image_ids[{{ $key }}]" value="{{ $image->id }}">
                    <input type="hidden" name="image_orders[{{ $key }}]" value="{{ $image->order }}" class="image-order">
                    <div class="image-input image-input-outline" data-kt-image-input="true">
                        <div class="image-input-wrapper" id="image-preview-{{ $key }}"
                             style="background-image: url('{{ asset($image->file_path) }}'); background-size: cover; background-position: center;">
                        </div>
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                               data-kt-image-input-action="change"
                               title="{{ __('messages.change_image') }}">
                            <i class="ki-duotone ki-pencil fs-7"></i>
                            <input type="file" name="images[{{ $key }}]" accept=".png, .jpg, .jpeg" onchange="previewImage(this, {{ $key }})" />
                            <input type="hidden" name="images_remove[{{ $key }}]" />
                        </label>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                              data-kt-image-input-action="remove"
                              title="{{ __('messages.remove_image') }}"
                              onclick="removeImage({{ $key }})">
                            <i class="ki-duotone ki-cross fs-2"></i>
                        </span>
                    </div>
                    <button type="button" class="btn btn-sm btn-danger remove-box-btn" onclick="removeImageBox(this)">
                        {{ __('messages.remove_box') }}
                    </button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-primary mt-3" onclick="addImageBox()">
            {{ __('messages.add_image') }}
        </button>

        <div class="text-muted fs-7 mt-3">
            {{ __('messages.upload_limit_info') }} <!-- "You can upload up to 10 images. Only *.png, *.jpg and *.jpeg are accepted." -->
        </div>
    </div>
</div>
