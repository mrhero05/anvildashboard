<div class="p-0 flex flex-col gap-6">
    <div class="grid w-100">
        <div class="col-span-2">
            <div class="card">
                <div class="card-body">
                    <div class="flex  justify-between mb-5">
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
</div>
@script
<script>
    $(document).ready( function () {
        var data = @json($data);
        $('#screener_entries').DataTable({
            data: data,
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
