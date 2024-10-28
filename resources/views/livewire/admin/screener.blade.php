<div class="grid grid-cols-12 lg:grid-cols-12 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="col-span-12">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-col mb-5">
                    <h4 class="text-gray-500 text-lg font-semibold sm:mb-0 mb-2">List of Screened Entry</h4>
                    <div class="overflow-x-scroll">
                        <table class="display block text-nowrap" id="screener_entries">
                            <thead>
                                <tr>
                                <th>Timestamp</th>
                                <th>OS Ticket No.</th>
                                <th>Entry No.</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Entry Title</th>
                                <th>Company/Organization (under which the entry should be submitted)</th>
                                <th>Agency (if nominating under an agency)</th>
                                <th>Status (Passed/ Failed)</th>
                                <th>Assigned Screener</th>
                                <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@script
<script>
    $(document).ready( function () {
        var data = @json($data);
        $('#screener_entries').DataTable({
            data:data,
            columns: [
                {data: 'created_at', title: 'Timestamp'},
                {data: 'ticket_id', title: 'OS Ticket No.'},
                {data: 'entry_id', title: 'Entry No.'},
                {data: 'category', title: 'Category'},
                {data: 'subcategory', title: 'Subcategory'},
                {data: 'entry_title', title: 'Entry Title'},
                {data: 'company_organization', title: 'Company/Organization (under which the entry should be submitted)'},
                {data: 'agency', title: 'Agency (if nominating under an agency)'},
                {data: 'ticket_status', title: 'Status (Passed/ Failed)'},
                {data: 'user_name', title: 'Assigned Screener'},
                {data: 'ticket_remarks', title: 'Remarks'},
            ],
            autoWidth: false,
            dom: 'B<"flex justify-between my-[10px]"lf>rt<"flex justify-between my-[10px]"ip>',
            buttons: [
                { extend: 'csv', text: 'Export to CSV', className: '!bg-prsp-blue !text-prsp-white' },
                { extend: 'excel', text: 'Export to Excel', className: '!bg-prsp-green !text-prsp-white' }
            ]
        });
    } );
</script>
@endscript
