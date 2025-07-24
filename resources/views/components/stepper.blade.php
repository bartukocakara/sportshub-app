@php
    $steps = [
        ['title' => __('messages.sport_type'), 'desc' => __('messages.select_sport_type')],
        ['title' => __('messages.city'), 'desc' => __('messages.select_city')],
        ['title' => __('messages.players'), 'desc' => __('messages.select_players')],
        ['title' => __('messages.details'), 'desc' => __('messages.fill_team_details')],
    ];

    if ($currentStep === 5) {
        $steps[] = ['title' => __('messages.confirm_details'), 'desc' => __('messages.review_and_confirm')];
    }
@endphp

<div class="stepper-nav ps-lg-10">
    @foreach ($steps as $index => $step)
        @php
            $stepNumber = $index + 1;
            $isCompleted = $currentStep > $stepNumber;
            $isCurrent = $currentStep === $stepNumber;
            $isLast = $index === count($steps) - 1;
        @endphp

        <div class="stepper-item {{ $isCurrent ? 'current' : ($isCompleted ? 'completed' : '') }}">
            <div class="stepper-wrapper">
                <div class="stepper-icon w-40px h-40px">
                    @if ($isCompleted)
                        <i class="ki-duotone ki-check stepper-check fs-2"></i>
                    @else
                        <span class="stepper-number">{{ $stepNumber }}</span>
                    @endif
                </div>
                <div class="stepper-label">
                    <h3 class="stepper-title">{{ $step['title'] }}</h3>
                    <div class="stepper-desc">{{ $step['desc'] }}</div>
                </div>
            </div>
            @if (!$isLast)
                <div class="stepper-line h-40px"></div>
            @endif
        </div>
    @endforeach
</div>
