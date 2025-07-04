<div class="card pt-4 mb-6 mb-xl-9">
    <div class="card-header border-0">
        <div class="card-title">
            <h2>{{ __('messages.players_list') }}</h2>
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
                <i class="ki-duotone ki-plus-square fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                {{ __('messages.new_player') }}
            </button>
        </div>
    </div>
    <div class="card-body pt-0 pb-5">
        <div id="kt_table_customers_payment_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
            <div id="" class="table-responsive">
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
                            <th class="min-w-100px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1" colspan="1" aria-label="Invoice No.: Activate to sort" tabindex="0"><span class="dt-column-title" role="button"> {{ __('messages.first_name') }}.</span><span class="dt-column-order"></span></th>
                            <th data-dt-column="1" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Status: Activate to sort" tabindex="0"><span class="dt-column-title" role="button"> {{ __('messages.last_name') }}</span><span class="dt-column-order"></span></th>
                            <th data-dt-column="2" rowspan="1" colspan="1" class="dt-type-numeric dt-orderable-asc dt-orderable-desc" aria-label="Amount: Activate to sort" tabindex="0"><span class="dt-column-title" role="button"> {{ __('messages.avatar') }}</span><span class="dt-column-order"></span></th>
                            <th class="min-w-100px dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Date</span><span class="dt-column-order"></span></th>
                            <th class="text-end min-w-100px pe-4 dt-orderable-none" data-dt-column="4" rowspan="1" colspan="1" aria-label="Actions"><span class="dt-column-title">Actions</span><span class="dt-column-order"></span></th>
                        </tr>
                    </thead>
                    <tbody class="fs-6 fw-semibold text-gray-600">
                        @foreach ($players as $key => $user)
                        <tr>
                            <td>
                                <a href="{{ route('users.show', ['user' => $user['id']]) }}">{{ $user['first_name'] }}</a>
                            </td>
                            <td>
                                <span class="badge badge-light-success">{{ $user['last_name'] }}</span>
                            </td>
                            <td class="dt-type-numeric"><img class="symbol symbol-circle w-50" alt="Pic" src="/storage/avatar/{{ $user['avatar'] }}" /></td>
                            <td data-order="2020-12-14T20:43:00+03:00">14 Dec 2020, 8:43 pm</td>
                            <td class="pe-0 text-end">
                                <a href="#" class="btn btn-sm btn-light image.png btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a href="/apps/customers/view.html" class="menu-link px-3"> View </a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row"> Delete </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <td>
                            <a href="#" class="text-gray-600 text-hover-primary mb-1">3600-1283</a>
                        </td>
                        <td>
                            <span class="badge badge-light-success">Successful</span>
                        </td>
                        <td class="dt-type-numeric">$5,500.00</td>
                        <td data-order="2020-11-12T14:01:00+03:00">12 Nov 2020, 2:01 pm</td>
                        <td class="pe-0 text-end">
                            <a href="#" class="btn btn-sm btn-light image.png btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                Actions
                                <i class="ki-duotone ki-down fs-5 ms-1"></i>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="/apps/customers/view.html" class="menu-link px-3"> View </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row"> Delete </a>
                                </div>
                            </div>
                        </td>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
            <div id="" class="row">
                <div id="" class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar"></div>
                <div id="" class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                    <div class="dt-paging paging_simple_numbers">
                        <nav>
                            <ul class="pagination">
                                <li class="dt-paging-button page-item disabled">
                                    <button class="page-link previous" role="link" type="button" aria-controls="kt_table_customers_payment" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i class="previous"></i></button>
                                </li>
                                <li class="dt-paging-button page-item active"><button class="page-link" role="link" type="button" aria-controls="kt_table_customers_payment" aria-current="page" data-dt-idx="0">1</button></li>
                                <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="kt_table_customers_payment" data-dt-idx="1">2</button></li>
                                <li class="dt-paging-button page-item">
                                    <button class="page-link next" role="link" type="button" aria-controls="kt_table_customers_payment" aria-label="Next" data-dt-idx="next"><i class="next"></i></button>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
