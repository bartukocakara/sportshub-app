<div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
    <h4>{{ __('messages.selected_players') }}</h4>
    <div class="d-flex align-items-center mb-4">
        <div id="selected-players-preview" class="symbol-group symbol-hover">
            <small class="text-muted" id="no-selected-message">{{ __('messages.no_players_selected') }}</small>
        </div>
        <button type="button" id="remove-all-players" class="btn btn-sm btn-danger ms-3" style="display: none;">
            {{ __('messages.remove_all') }}
        </button>
    </div>
    <div class="card pt-4 mb-6 mb-xl-9">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>{{ __('messages.players_list') }}</h2>
            </div>
        </div>
        <div class="card-body pt-0 pb-5">
            <div id="kt_table_customers_payment_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed gy-5 dataTable" id="kt_table_customers_payment" style="width: 100%">
                        <colgroup>
                            <col data-dt-column="0" style="width: 100px" />
                            <col data-dt-column="1" style="width: 91.9688px" />
                            <col data-dt-column="2" style="width: 80.7031px" />
                            <col data-dt-column="3" style="width: 100px" />
                            <col data-dt-column="4" style="width: 100px" />
                        </colgroup>
                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                            <tr class="text-start text-muted text-uppercase gs-0" role="row">
                                <th></th>
                                <th class="min-w-100px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1" colspan="1" aria-label="First Name: Activate to sort" tabindex="0">
                                    <span class="dt-column-title" role="button">{{ __('messages.first_name') }}</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <th data-dt-column="1" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Last Name: Activate to sort" tabindex="0">
                                    <span class="dt-column-title" role="button">{{ __('messages.last_name') }}</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <th data-dt-column="2" rowspan="1" colspan="1" class="dt-type-numeric dt-orderable-asc dt-orderable-desc" aria-label="Avatar: Activate to sort" tabindex="0">
                                    <span class="dt-column-title" role="button">{{ __('messages.avatar') }}</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <th class="min-w-100px dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Date: Activate to sort" tabindex="0">
                                    <span class="dt-column-title" role="button">{{ __('messages.created_at') }}</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <th class="text-end min-w-100px pe-4 dt-orderable-none" data-dt-column="4" rowspan="1" colspan="1" aria-label="Actions">
                                    <span class="dt-column-title">Actions</span>
                                    <span class="dt-column-order"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="fs-6 fw-semibold text-gray-600">

                            @foreach ($players as $key => $user)
                            <tr>
                                <td>
                                    <input
                                        type="checkbox"
                                        class="form-check-input player-checkbox"
                                        value="{{ $user['id'] }}"
                                        data-user='@json($user)'
                                        {{ isset($user['is_checked']) ? $user['is_checked'] ? 'checked' : '' : '' }}
                                    />
                                </td>
                                <td>
                                    <a href="{{ route('users.show', ['user' => $user['id']]) }}">{{ $user['first_name'] }}</a>
                                </td>
                                <td>
                                    <span class="badge badge-light-success">{{ $user['last_name'] }}</span>
                                </td>
                                <td class="dt-type-numeric">
                                    @if ($user['avatar'])
                                        <img class="symbol symbol-circle w-50px" src="/storage/avatar/{{ $user['avatar'] }}" alt="{{ $user['first_name'] }}" />
                                    @else
                                        <span class="badge badge-secondary">{{ strtoupper(substr($user['first_name'], 0, 1)) }}</span>
                                    @endif
                                </td>
                                <td data-order="{{ $user['created_at'] }}">
                                    {{ \Carbon\Carbon::parse($user['created_at'])->format('d M Y, H:i') }}
                                </td>
                                <td class="pe-0 text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        {{ __('messages.actions') }}
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="{{ route('users.show', ['user' => $user['id']]) }}" class="menu-link px-3">View</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
                @include('components.pagination.api', ['data' => $meta])
            </div>
        </div>
    </div>
</div>
