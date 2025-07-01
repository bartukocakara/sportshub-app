<div class="row g-6 g-xl-9">
    @foreach ($datas['teams']['data'] as $key => $team)
    <div class="col-md-6 col-xl-4">
        <a href="/apps/projects/project.html" class="card border-hover-primary">
            <div class="card-header border-0 pt-9">
                <div class="card-title m-0">
                    <div class="symbol-group symbol-hover">
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Francis Mitcham" data-bs-original-title="Francis Mitcham" data-kt-initialized="1">
                            <img alt="Pic" src="/assets/media/avatars/300-20.jpg" />
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michelle Swanston" data-bs-original-title="Michelle Swanston" data-kt-initialized="1">
                            <img alt="Pic" src="/assets/media/avatars/300-7.jpg" />
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                        </div>
                    </div>
                </div>
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
                </div>
            </div>
            <div class="card-body p-9">
                <div class="fs-3 fw-bold text-gray-900">9 Degree</div>
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
                <div class="d-flex flex-wrap mb-5">
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">Feb 21, 2025</div>
                        <div class="fw-semibold text-gray-500">Due Date</div>
                    </div>
                </div>
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 40% completed" data-bs-original-title="This project 40% completed" data-kt-initialized="1">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 40%" aria-valuenow=" 40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </a>
    </div>
    @endforeach
</div>
