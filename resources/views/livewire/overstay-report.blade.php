<div class="flex-1 grow bg-white shadow-lg sm:rounded m-1 divide divide-y border">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="p-2 bg-slate-50 shadow-lg">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 sm:col-span-3">
                <x-select2 :options='$airlines' label='Airline' optionsvar="airlines" wire:model='airline'
                    name='airline' placeholder="Airline" />
            </div>
            <div class="col-span-12 sm:col-span-2">
                <button type="button" wire:click='downloadReport'
                    class="sm:mt-6 w-full text-center   px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Download</button>
            </div>
        </div>
    </div>
    <div>
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
                                @foreach ($awbs as $awb)
                                    <tr class="bg-white">
                                        <td
                                            class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">
                                            {{ $loop->index + 1 }}

                                        </td>
                                        <td
                                            class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">
                                            {{ substr($awb->awb_no, 0, 3) }}-{{ substr($awb->awb_no, 3) }}

                                        </td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $awb->first_seen }}
                                        </td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                            @foreach ($awb->bondchecks as $bondcheck)
                                                {{ \Carbon\Carbon::parse($bondcheck->date_captured)->format('d-M') }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
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
</div>

@section('title')
    Bond Check Report
@endsection
