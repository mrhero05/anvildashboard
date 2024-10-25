<div class="grid grid-cols-12 lg:grid-cols-12 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="col-span-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-5">
                    <h4 class="text-gray-500 text-lg font-semibold sm:mb-0 mb-2">All Entries</h4>
                    <div class="overflow-x-scroll">
                        <table class="display block text-nowrap" id="all_entries">
                            <thead>
                                <tr>
                                <th>Entry No.</th>
                                <th>Timestamp</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Membership</th>
                                <th>Entry Title</th>
                                <th>Entry Implementation Period</th>
                                <th>Company/Organization (under which the entry should be submitted)</th>
                                <th>Company/Agency Name to Appear in Avil Trophy</th>
                                <th>Agency (if nominating under an agency)</th>
                                <th>Contact Person (for notification if shortlisted)</th>
                                <th>Position</th>
                                <th>Email Address</th>
                                <th>Telephone/Mobile No.</th>
                                <th class="w-[800px] whitespace-normal inline-block">Create a 150-word Executive Summary that provides a concise overview of your entry</th>
                                <th class="w-[800px] whitespace-normal inline-block">Objectives</th>
                                <th class="w-[800px] whitespace-normal inline-block">Target Audience</th>
                                <th class="w-[800px] whitespace-normal inline-block">Execution Details</th>
                                <th class="w-[800px] whitespace-normal inline-block">Results</th>
                                <th class="whitespace-normal">Upload PR Tool Plan/PR Program (as pdf)</th>
                                <th>Upload Key Visual (as pdf)</th>
                                <th>Upload Letter of Authorization (as pdf)</th>
                                <th>Other Supporting Documents</th>
                                <th>Status of Payment (Paid/Pending)</th>
                                <th>Proof of Payment</th>
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
            var entries = @json($entries);
            $('#all_entries').DataTable({
                data: entries,
                autoWidth: false,
                columnDefs: [
                    { class: 'w-[800px] whitespace-normal inline-block', targets: [14,15,16,17,18] },
                ],
                dom: 'B<"flex justify-between my-[10px]"lf>rt<"flex justify-between my-[10px]"ip>',
                buttons: [
                    { extend: 'csv', text: 'Export to CSV', className: '!bg-prsp-blue !text-prsp-white' },
                    { extend: 'excel', text: 'Export to Excel', className: '!bg-prsp-green !text-prsp-white' }
                ]
            });
        } );
    </script>
@endscript
