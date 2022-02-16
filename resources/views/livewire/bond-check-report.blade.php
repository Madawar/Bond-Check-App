<div class="flex-1 grow bg-white shadow-lg sm:rounded m-1 divide divide-y border">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="p-2 bg-slate-50 shadow-lg">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 sm:col-span-3">
                <x-date label='Date' :options="[]" wire:model='date' name='date' placeholder="Date" />
            </div>
            <div class="col-span-12 sm:col-span-3">
                <x-input label='AWB' wire:model='awb' name='awb' placeholder="AWB" />
            </div>

            <div class="col-span-12 sm:col-span-3">
                <x-select2 :options='$airlines' label='Airline' optionsvar="airlines" wire:model='airline'
                    name='airline' placeholder="Airline" />
            </div>
            <div class="col-span-12 sm:col-span-2">
                <span class="relative z-0 inline-flex shadow-sm rounded-md sm:mt-6" x-data={open:false}>
                    <button type="button"
                        class=" w-full text-center   px-4 py-2 border border-transparent text-sm font-medium rounded-l-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Download</button>
                    <span class="-ml-px relative block">
                        <button type="button"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-indigo-600 text-sm font-medium text-white hover:bg-indigo-700 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                            id="option-menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                            <span class="sr-only">Open options</span>
                            <!-- Heroicon name: solid/chevron-down -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="origin-top-right absolute right-0 mt-2 -mr-1 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="option-menu-button" tabindex="-1"
                            x-cloak x-show="open" @click.away="open=false">
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                @if ($this->airlineName)
                                    <div wire:click='sendReport' @click="open=false"
                                        class="text-gray-700 block px-4 py-2 text-sm cursor-pointer hover:bg-indigo-700"
                                        role="menuitem" tabindex="-1" id="option-menu-item-0"> Send Email To
                                        {{ $this->airlineName }}</div>
                                @endif
                                <div wire:click='downloadReport' @click="open=false"
                                    class="text-gray-700 block px-4 py-2 text-sm cursor-pointer hover:text-white hover:bg-indigo-700"
                                    role="menuitem" tabindex="-1" id="option-menu-item-0"> Download Report
                                    {{ $this->airlineName }}</div>



                            </div>
                        </div>
                    </span>
                </span>


            </div>
        </div>
    </div>
    @if (!$this->report->isEmpty())
        <div>
            <div class="rounded-md bg-yellow-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <!-- Heroicon name: solid/exclamation -->
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Attention needed</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>Please Note that the bondcheck for this date was sent click here to download it
                                @foreach ($this->report as $log)
                                    <a class="text-blue-600"
                                        href="{{ Illuminate\Support\Facades\Storage::url($log->filename) }}">{{ $log->filename }}</a>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif


    <div>
        <div class="flex flex-col overflow-hidden">
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
                                        Location</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Airline</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        NOP</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        AOD</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        SHC</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Dimensions</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Weight</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Remarks</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date</th>
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
                                            {{ $awb->location }}</td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $awb->airline->airline_name }}</td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $awb->nop }}</td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $awb->aod }}</td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $awb->shc }}</td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $awb->dimensions }}</td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $awb->weight }}</td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $awb->remarks }}</td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ Carbon\Carbon::parse($awb->date_captured)->format('d-M-y') }}</td>
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
