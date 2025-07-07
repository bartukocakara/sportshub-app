<script>
    let imageBoxCounter = {{ $images->count() ?? 0 }};

    function previewImage(input, index) {
        const file = input.files[0];
        if (!file) return;

        const validTypes = ['image/png', 'image/jpeg', 'image/jpg'];
        if (!validTypes.includes(file.type)) {
            alert('Only .png, .jpg, .jpeg files are allowed.');
            input.value = '';
            return;
        }

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
            preview.style.backgroundImage = `url('/images/placeholder.webp')`;
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
            const imageIdInput = box.querySelector('input[name^="image_ids"]');
            const orderInput = box.querySelector('.image-order');
            const removeButton = box.querySelector('.remove-box-btn');

            if (preview) preview.id = `image-preview-${index}`;
            if (fileInput) fileInput.name = `images[${index}]`;
            if (removeInput) removeInput.name = `images_remove[${index}]`;
            if (imageIdInput) imageIdInput.name = `image_ids[${index}]`;
            if (orderInput) {
                orderInput.name = `image_orders[${index}]`;
                orderInput.value = index;
            }
            if (removeButton) removeButton.setAttribute('onclick', `removeImageBox(this)`);
            const changeLabel = box.querySelector('label[data-kt-image-input-action="change"]');
            if (changeLabel) {
                const file = changeLabel.querySelector('input[type="file"]');
                if (file) file.setAttribute('onchange', `previewImage(this, ${index})`);
            }
            const removeSpan = box.querySelector('span[data-kt-image-input-action="remove"]');
            if (removeSpan) removeSpan.setAttribute('onclick', `removeImage(${index})`);

            imageBoxCounter = index + 1;
        });
    }

    function addImageBox() {
        const container = document.getElementById('image-upload-container');
        if (container.querySelectorAll('.image-box').length >= 10) {
            alert("You can upload up to 10 images.");
            return;
        }

        const index = imageBoxCounter;
        const newBox = document.createElement('div');
        newBox.classList.add('image-box', 'mb-5');
        newBox.setAttribute('data-index', index);
        newBox.innerHTML = `
            <input type="hidden" name="image_orders[${index}]" value="${index}" class="image-order">
            <div class="image-input image-input-outline" data-kt-image-input="true">
                <div class="image-input-wrapper" id="image-preview-${index}" style="background-image: url('/images/placeholder.webp'); background-size: cover; background-position: center;"></div>
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                       data-kt-image-input-action="change"
                       title="Change image">
                    <i class="ki-duotone ki-pencil fs-7"></i>
                    <input type="file" name="images[${index}]" accept=".png, .jpg, .jpeg" onchange="previewImage(this, ${index})" />
                    <input type="hidden" name="images_remove[${index}]" />
                </label>
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                      data-kt-image-input-action="remove"
                      title="Remove image"
                      onclick="removeImage(${index})">
                    <i class="ki-duotone ki-cross fs-2"></i>
                </span>
            </div>
            <button type="button" class="btn btn-sm btn-danger remove-box-btn" onclick="removeImageBox(this)">
                {{ __('messages.remove_box') }}
            </button>
        `;
        container.appendChild(newBox);
        imageBoxCounter++;
    }
</script>
