@extends('layouts.no-sidebar')
@section('title', __('messages.subscription_plans'))
@section('content')
<div id="kt_app_toolbar" class="app-toolbar pt-5">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
        <!--begin::Toolbar wrapper-->
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                        <a href="{{ route('home') }}" class="text-gray-500">
                            <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                    </li>
                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                        <a href="{{ route('home') }}">{{ __('messages.home') }}</a>
                    </li>
                </ul>
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
                    {{ __('messages.subscription_plans') }}
                </h1>
            </div>
        </div>
    </div>
</div>
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Pricing-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body px-10 px-lg-20 pt-17 pb-10">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-striped gy-7">
                        <!--begin::Table head-->
                        <thead class="align-middle">
                            <tr id="kt_pricing">
                                <th>
                                    <div class="nav bg-light rounded-pill px-3 py-2 ms-9 mb-15 w-225px" data-kt-buttons="true" data-kt-initialized="1">
                                        <button
                                            class="nav-link active btn btn-active btn-active-dark fw-bold btn-color-gray-600 active py-3 px-5 m-1 rounded-pill"
                                            data-kt-plan="month">
                                            Monthly
                                        </button>
                                        <button
                                            class="nav-link btn btn-active btn-active-dark fw-bold btn-color-gray-600 py-3 px-5 m-1 rounded-pill"
                                            data-kt-plan="annual">
                                            Annually
                                        </button>
                                    </div>
                                </th>
                                @foreach ($subscriptionPlanData as $plan)
                                    <th class="text-center min-w-200px">
                                        <div class="min-w-200px {{ $plan->name === 'Pro' ? 'bg-primary card-rounded py-12' : '' }} mb-15">
                                            <div class="{{ $plan->name === 'Pro' ? 'text-white' : 'text-primary' }} fs-3 fw-bold mb-7">
                                                {{ $plan->name }}
                                            </div>
                                            <div class="fs-5x {{ $plan->name === 'Pro' ? 'text-white' : '' }} d-flex justify-content-center align-items-start">
                                                <span class="fs-2 mt-3">{{ $plan->currency === 'USD' ? '$' : $plan->currency }}</span>
                                                <span class="lh-sm fw-semibold"
                                                    data-kt-plan-price-month="{{ $plan->interval === 'monthly' ? number_format($plan->amount_minor / 100, 2) : ($plan->interval === 'yearly' ? number_format($plan->amount_minor / 100 / 12, 2) : number_format($plan->amount_minor / 100, 2)) }}"
                                                    data-kt-plan-price-annual="{{ $plan->interval === 'yearly' ? number_format($plan->amount_minor / 100, 2) : ($plan->interval === 'monthly' ? number_format($plan->amount_minor * 12 / 100, 2) : number_format($plan->amount_minor / 100, 2)) }}">
                                                    {{ $plan->interval === 'monthly' ? number_format($plan->amount_minor / 100, 2) : ($plan->interval === 'yearly' ? number_format($plan->amount_minor / 100 / 12, 2) : number_format($plan->amount_minor / 100, 2)) }}
                                                </span>
                                            </div>
                                            <div class="{{ $plan->name === 'Pro' ? 'text-white' : 'text-muted' }} fw-bold mb-7">
                                                {{ ucfirst($plan->interval) }}
                                            </div>
                                            <a href="#" class="btn {{ $plan->name === 'Pro' ? 'bg-white bg-opacity-20 bg-hover-white text-hover-primary text-white' : 'btn-light-primary' }} fw-bold mx-auto">
                                                {{ $plan->name === 'Free' ? 'Start' : 'Select' }}
                                            </a>
                                        </div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <!--begin::Table body-->
                        <tbody>
                            @php
                                // Get all unique features across all plans
                                $allFeatures = [];
                                foreach ($subscriptionPlanData as $plan) {
                                    $features = $plan->features ?? [];
                                    $allFeatures = array_merge($allFeatures, $features);
                                }
                                $allFeatures = array_unique($allFeatures);
                            @endphp
                            @foreach ($allFeatures as $feature)
                                <tr>
                                    <th class="card-rounded-start">
                                        <div class="fw-bold d-flex align-items-center ps-9 fs-3">{{ $feature }}</div>
                                    </th>
                                    @foreach ($subscriptionPlanData as $plan)
                                        <td>
                                            <div class="flex-root d-flex justify-content-center">
                                                <span class="h-40px w-40px d-flex flex-center {{ in_array($feature, $plan->features ?? []) ? 'd-block' : 'd-none' }}">
                                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                                </span>
                                                <span class="h-40px w-40px d-flex flex-center {{ in_array($feature, $plan->features ?? []) ? 'd-none' : 'd-block' }}">
                                                    <i class="ki-duotone ki-cross fs-2x text-danger">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Pricing-->
    </div>
    <!--end::Content container-->
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll("[data-kt-plan]");
        const prices = document.querySelectorAll("[data-kt-plan-price-month]");

        buttons.forEach((button) => {
            button.addEventListener("click", function () {
                buttons.forEach((btn) => btn.classList.remove("active"));
                this.classList.add("active");

                const planType = this.getAttribute("data-kt-plan");
                prices.forEach((price) => {
                    const monthPrice = price.getAttribute("data-kt-plan-price-month");
                    const annualPrice = price.getAttribute("data-kt-plan-price-annual");
                    price.textContent = planType === "month" ? monthPrice : annualPrice;
                });
            });
        });
    });
</script>
@endsection
