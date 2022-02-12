<div class="flex-1 grow bg-white shadow-lg sm:rounded m-1 divide divide-y border">
    {{-- Stop trying to control. --}}
    <div class="p-2 bg-slate-50 shadow-lg">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 sm:col-span-4">
                <x-input label='Airline Name' wire:model='airline.airline_name' name='airline.airline_name'
                    placeholder="Airline Name" />
            </div>
            <div class="col-span-12 sm:col-span-3">
                <x-date :options='array("enableTime"=>true,"noCalendar"=>true,"dateFormat"=>"H:i")' label='Send BY'
                    wire:model='airline.send_by' name='airline.send_by' placeholder="Send By" />
            </div>
            <div class="col-span-12 sm:col-span-3">

                <x-input label='Airline Emails' wire:model='airline.airline_emails' name='airline.airline_emails'
                    placeholder="Airline Emails" />
            </div>
            <div class="col-span-12 sm:col-span-2">
                <button type="button" wire:click='submit'
                    class="sm:mt-6 w-full text-center   px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
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
                                        Airline</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Send By</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Airline Emails</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($airlines as $airline)
                                    <tr class="bg-white">
                                        <td
                                            class="px-6 py-3 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">
                                            {{ $airline->airline_name }}</td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $airline->send_by }}</td>
                                        <td
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $airline->airline_emails }}</td>
                                        <td class="relative px-6 py-3">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                                wire:click='edit({{ $airline->id }})'>Edit</a>
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
    Airlines
@endsection
