<div id="kt_ecommerce_report_views_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
    <div id="" class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_ecommerce_report_views_table" style="width: 100%;">
            <colgroup>
                <col data-dt-column="0" style="width: 150px;" />
                <col data-dt-column="1" style="width: 100px;" />
                <col data-dt-column="2" style="width: 100px;" />
                <col data-dt-column="3" style="width: 100px;" />
                <col data-dt-column="4" style="width: 72.325px;" />
                <col data-dt-column="5" style="width: 100px;" />
            </colgroup>
            <thead>
                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0" role="row">
                    <th class="min-w-150px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1" colspan="1" aria-label="Product: Activate to sort" tabindex="0">
                        <span class="dt-column-title" role="button">Product</span><span class="dt-column-order"></span>
                    </th>
                    <th class="text-end min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="SKU: Activate to sort" tabindex="0">
                        <span class="dt-column-title" role="button">SKU</span><span class="dt-column-order"></span>
                    </th>
                    <th class="text-end min-w-100px dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1" aria-label="Rating: Activate to sort" tabindex="0">
                        <span class="dt-column-title" role="button">Rating</span><span class="dt-column-order"></span>
                    </th>
                    <th class="text-end min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Price: Activate to sort" tabindex="0">
                        <span class="dt-column-title" role="button">Price</span><span class="dt-column-order"></span>
                    </th>
                    <th class="text-end min-w-70px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="4" rowspan="1" colspan="1" aria-label="Viewed: Activate to sort" tabindex="0">
                        <span class="dt-column-title" role="button">Viewed</span><span class="dt-column-order"></span>
                    </th>
                    <th class="text-end min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="5" rowspan="1" colspan="1" aria-label="Percent: Activate to sort" tabindex="0">
                        <span class="dt-column-title" role="button">Percent</span><span class="dt-column-order"></span>
                    </th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                @foreach ($datas['courts']['data'] as $key => $court )
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('admin.courts.show', ['court' => $court['id']]) }}" class="symbol symbol-50px">
                                <span class="symbol-label"
                                    style="background-image: url('{{ asset($court['court_images'][0]['file_path'] ?? 'courts/placeholder-court.webp') }}');">
                                </span>
                            </a>
                            <div class="ms-5">
                                <a href="{{ route('admin.courts.show', ['court' => $court['id']]) }}"
                                class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                data-kt-ecommerce-product-filter="product_name">
                                    {{ $court['title'] }}
                                </a>
                            </div>
                        </div>
                    </td>
                    <td class="text-end pe-0 dt-type-numeric">
                        <span class="fw-bold">03920007</span>
                    </td>
                    <td class="text-end pe-0" data-order="rating-3" data-filter="rating-3">
                        <div class="rating justify-content-end">
                            <div class="rating-label checked">
                                <i class="ki-duotone ki-star fs-6"></i>
                            </div>
                            <div class="rating-label checked">
                                <i class="ki-duotone ki-star fs-6"></i>
                            </div>
                            <div class="rating-label checked">
                                <i class="ki-duotone ki-star fs-6"></i>
                            </div>
                            <div class="rating-label">
                                <i class="ki-duotone ki-star fs-6"></i>
                            </div>
                            <div class="rating-label">
                                <i class="ki-duotone ki-star fs-6"></i>
                            </div>
                        </div>
                    </td>
                    <td class="text-end pe-0 dt-type-numeric">
                        <span>$77.00</span>
                    </td>
                    <td class="text-end pe-0 dt-type-numeric">
                        <span>234400</span>
                    </td>
                    <td class="text-end pe-0 dt-type-numeric">
                        23.44%
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('components.pagination.default', ['data' => $datas['courts']])
</div>
