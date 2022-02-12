<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 ">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    AWB</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    First Seen</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dates in Warehouse</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cumulative Days</th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($logs as $log)
                                <tr class="bg-white">
                                    <td
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">
                                        {{ $loop->index + 1 }}

                                    </td>
                                    <td
                                        class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">
                                        {{ $log->airline->airline_name }}

                                    </td>
                                    <td
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                    </td>
                                    <td
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">


                                    </td>
                                    <td
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    </td>

                                    <td class="relative px-6 py-3">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
