<div class="w-100">
    <div class="fv-row mb-10 fv-plugins-icon-container">
        <label class="required fs-5 fw-semibold mb-2">Database Name</label>
        <input type="text" class="form-control form-control-lg form-control-solid" name="dbname" placeholder="" value="master_db">
    <div class="fv-plugins-message-container invalid-feedback"></div></div>
    <div class="fv-row fv-plugins-icon-container">
        <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
            <span class="required">Select Database Engine</span>
            <span class="ms-1" data-bs-toggle="tooltip" aria-label="Select your app database engine" data-bs-original-title="Select your app database engine" data-kt-initialized="1">
                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
            </span>
        </label>
        <label class="d-flex flex-stack cursor-pointer mb-5">
            <span class="d-flex align-items-center me-2">
                <span class="symbol symbol-50px me-6">
                    <span class="symbol-label bg-light-success">
                        <i class="ki-duotone ki-note text-success fs-2x">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                </span>
                <span class="d-flex flex-column">
                    <span class="fw-bold fs-6">MySQL</span>
                    <span class="fs-7 text-muted">Basic MySQL database</span>
                </span>
            </span>
            <span class="form-check form-check-custom form-check-solid">
                <input class="form-check-input" type="radio" name="dbengine" checked="checked" value="1">
            </span>
        </label>
        <label class="d-flex flex-stack cursor-pointer mb-5">
            <span class="d-flex align-items-center me-2">
                <span class="symbol symbol-50px me-6">
                    <span class="symbol-label bg-light-danger">
                        <i class="ki-duotone ki-google text-danger fs-2x">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                </span>
                <span class="d-flex flex-column">
                    <span class="fw-bold fs-6">Firebase</span>
                    <span class="fs-7 text-muted">Google based app data management</span>
                </span>
            </span>
            <span class="form-check form-check-custom form-check-solid">
                <input class="form-check-input" type="radio" name="dbengine" value="2">
            </span>
        </label>
        <label class="d-flex flex-stack cursor-pointer">
            <span class="d-flex align-items-center me-2">
                <span class="symbol symbol-50px me-6">
                    <span class="symbol-label bg-light-warning">
                        <i class="ki-duotone ki-microsoft text-warning fs-2x">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                </span>
                <span class="d-flex flex-column">
                    <span class="fw-bold fs-6">DynamoDB</span>
                    <span class="fs-7 text-muted">Microsoft Fast NoSQL Database</span>
                </span>
            </span>
            <span class="form-check form-check-custom form-check-solid">
                <input class="form-check-input" type="radio" name="dbengine" value="3">
            </span>
        </label>
    <div class="fv-plugins-message-container invalid-feedback"></div></div>
</div>
