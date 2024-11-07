<div class="grid grid-cols-12 lg:grid-cols-12 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="col-span-12">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-col mb-5">
                    <h4 class="text-gray-500 text-lg font-semibold sm:mb-0 mb-2">List of Judge Entry</h4>
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
                                <th>Assigned Judge</th>
                                <th>Remarks</th>
                                <th>Judging Criteria</th>
                                <th>Criterion 1</th>
                                <th>Criterion 2</th>
                                <th>Criterion 3</th>
                                <th>Criterion 4</th>
                                <th>Criterion 5</th>
                                <th>Criterion 6</th>
                                <th>Mean Score</th>
                                <th>Final Score</th>
                                <th>Standard Deviation</th>
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
                {data: 'ticket_number', title: 'OS Ticket No.'},
                {data: 'entry_id', title: 'Entry No.'},
                {data: 'main_category', title: 'Category'},
                {data: 'sub_category', title: 'Subcategory'},
                {data: 'entry_title', title: 'Entry Title'},
                {data: 'company_organization', title: 'Company/Organization (under which the entry should be submitted)'},
                {data: 'agency', title: 'Agency (if nominating under an agency)'},
                {data: 'user_name', title: 'Assigned Judge'},
                {data: 'remarks', title: 'Remarks'},
                {data: 'main_category', title: 'Judging Criteria'},
                {data: 'criteria_1', title: 'Criterion 1'},
                {data: 'criteria_2', title: 'Criterion 2'},
                {data: 'criteria_3', title: 'Criterion 3'},
                {data: 'criteria_4', title: 'Criterion 4'},
                {data: 'criteria_5', title: 'Criterion 5'},
                {data: 'criteria_6', title: 'Criterion 6'},
                {data: 'mean_score', title: 'Mean Score'},
                {data: 'final_score', title: 'Final Score'},
                {data: 'standard_deviation', title: 'Standard Deviation'},
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
