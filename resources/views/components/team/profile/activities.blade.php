                                            <!--begin::Table-->
<div class="card pt-4 mb-6 mb-xl-9">
    <div class="card-header border-0">
        <div class="card-title">
            <h2>{{ __('messages.activities') }}</h2>
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-sm btn-light-primary">
                <i class="ki-duotone ki-cloud-download fs-3"><span class="path1"></span><span class="path2"></span></i>
                Download Report
            </button>
        </div>
    </div>
    <div class="card-body py-0">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fw-semibold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
                <tbody>
                    <tr>
                        <td class="min-w-70px">
                            <div class="badge badge-light-success">200 OK</div>
                        </td>
                        <td>POST /v1/invoices/in_1466_7694/payment</td>
                        <td class="pe-0 text-end min-w-200px">10 Nov 2025, 2:40 pm</td>
                    </tr>
                    <tr>
                        <td class="min-w-70px">
                            <div class="badge badge-light-warning">404 WRN</div>
                        </td>
                        <td>POST /v1/customer/c_68650b6d56c91/not_found</td>
                        <td class="pe-0 text-end min-w-200px">10 Mar 2025, 6:43 am</td>
                    </tr>
                    <tr>
                        <td class="min-w-70px">
                            <div class="badge badge-light-danger">500 ERR</div>
                        </td>
                        <td>POST /v1/invoice/in_1007_8052/invalid</td>
                        <td class="pe-0 text-end min-w-200px">22 Sep 2025, 2:40 pm</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
