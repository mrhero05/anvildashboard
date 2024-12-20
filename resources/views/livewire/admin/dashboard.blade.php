<div class="p-0 flex flex-col gap-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
        <div class="col-span-12">
            <div class="card h-full">
                <div class="card-body h-[600px] overflow-hidden overflow-y-scroll">
                    <h4 class="text-gray-500 text-lg font-semibold mb-5">Activity Log</h4>
                    <div class="relative overflow-x-auto">
                        <!-- table -->
                        <table class="text-left w-full whitespace-nowrap text-sm text-gray-500">
                            <thead>
                                <tr class="text-sm">
                                    <th scope="col" class="p-4 font-semibold">Name</th>
                                    <th scope="col" class="p-4 font-semibold">Description</th>
                                    <th scope="col" class="p-4 font-semibold">Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($activity_log)
                                    @foreach ($activity_log as $data)
                                        <tr>
                                            <td class="p-4 text-sm">
                                                <div class="flex gap-6 items-center">
                                                    <div class="h-12 w-12 inline-block"><img
                                                        src="{{ asset('spiketheme/assets/images/profile/user-3.jpg') }}" alt=""
                                                        class="rounded-full w-100"></div>
                                                    <div class="flex flex-col gap-1 text-gray-500">
                                                        <h3 class=" font-bold">{{ $data['user_name'] }}</h3>
                                                        <span class="font-normal">{{ $data['type'] }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            @if ($data['type'] == 'Screener')
                                                <td class="p-4">
                                                    <h3 class="font-medium text-teal-500">{{ $data['description'] }}</h3>
                                                </td>
                                            @else
                                                <td class="p-4">
                                                    <h3 class="font-medium text-yellow-500">{{ $data['description'] }}</h3>
                                                </td>
                                            @endif
                                            <td class="p-4">
                                                <span
                                                    class="inline-flex items-center py-2 px-4 rounded-3xl font-semibold bg-teal-400 text-teal-500">{{ $data['created_at'] }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
