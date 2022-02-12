<div class="flex-1 grow bg-white shadow-lg sm:rounded m-1 divide divide-y border">
    {{-- Stop trying to control. --}}
    <div class="p-2 bg-slate-50 shadow-lg">
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12 sm:col-span-4">
                <div class="relative " x-data={open:false}>
                    <div class="w-full">
                        <x-input label='AWB Number' @click="open=true" @click.away="open=false"
                            wire:model='bondcheck.awb_no' name='bondcheck.awb_no' placeholder="AWB No" />
                    </div>


                    <div class="origin-top-right absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                        x-show="open">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            @foreach ($suggestions as $suggestion)
                                <div x-on:click="$wire.chooseSuggestion('{{ $suggestion->awb_no }}')"
                                    class="text-gray-700 block px-4 py-2 text-sm" id="menu-item-0">
                                    {{ $suggestion->awb_no }}</div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-span-12 sm:col-span-4">
                <x-input label='AWB Location' wire:model='bondcheck.location' name='bondcheck.location'
                    placeholder="AWB Location" />
            </div>
            <div class="col-span-12 sm:col-span-4">
                <x-select2 :options='$airlines' label='Airline' optionsvar="airlines" wire:model='bondcheck.airline_id'
                    name='bondcheck.airline_id' placeholder="Airline" />
            </div>
            <div class="col-span-12 sm:col-span-4">
                <x-input label='Airport of Destination' wire:model='bondcheck.aod' name='bondcheck.aod'
                    placeholder="Airport of Destination" />
            </div>
            <div class="col-span-12 sm:col-span-4">
                <x-input label='Number Of Pieces' wire:model='bondcheck.nop' name='bondcheck.nop'
                    placeholder="Number Of Pieces" />
            </div>
            <div class="col-span-12 sm:col-span-3">
                <x-date label='Date Of Bondcheck' :options="[]" wire:model='bondcheck.date_captured'
                    name='bondcheck.date_captured' placeholder="Date" />
            </div>
            <div class="col-span-12 sm:col-span-12">
                <button type="button" wire:click='submit'
                    class=" w-full text-center   px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Record
                    Awb</button>
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
                                        class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($awbs as $awb)
                                    <tr class="bg-white">
                                        <td
                                            class="px-1 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">
                                            {{ $loop->index + 1 }}

                                        </td>
                                        <td
                                            class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">
                                            {{ substr($awb->awb_no, 0, 3) }}-{{ substr($awb->awb_no, 3) }}</td>
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
                                        <td class="relative px-6 py-3">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                                wire:click='edit({{ $awb->id }})'>Edit</a>
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
    Record Bond Check
@endsection
