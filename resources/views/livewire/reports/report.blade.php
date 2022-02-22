<!doctype html>

<html lang="en" class="h-full bg-gray-50 ">

<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
    @stack('styles')
    <style>
        {!! file_get_contents(public_path('css/app.css')) !!} header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/


            text-align: left;
            line-height: 35px;
        }

    </style>

</head>

<body class="h-full prose">
    <header>
        <img src="{{ public_path('logo.jpg') }}" class="h-20 mt-5" />
    </header>
    <main>
        <div class="w-full text-center">
            <h1 class="font-bold leading-loose prose uppercase tracking-wider">Warehouse Bond Check </h1>
        </div>

        <table>
            <tr>
                <td class="px-0 py-3 font-extrabold text-gray-500 uppercase tracking-wider">Airline:</td>
                <td class="px-1 py-3 font-medium text-gray-500 uppercase tracking-tight">{{ $for }}</td>
                <td class="px-0 py-3 w-44 font-extrabold text-gray-500 uppercase tracking-wider"></td>
                <td class="px-1 py-3 w-48 font-medium text-gray-500 uppercase tracking-wider"></td>
                <td class="px-0 py-3 font-extrabold text-gray-500 uppercase tracking-wider">Date:</td>
                <td class="px-1 py-3 font-medium text-gray-500 uppercase tracking-tight">{{ $date_formatted }}</td>
            </tr>


        </table>

        <hr />
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50  border">
                <tr class="">
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
                        Airline</th>

                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($awbs as $awb)
                    <tr class="bg-white border">
                        <td class="px-3 py-1.5 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">
                            {{ $loop->index + 1 }}</td>
                        <td class="px-3 py-1.5 text-left text-sm font-medium text-gray-900 uppercase tracking-wider">
                            {{ substr($awb->awb_no, 0, 3) }}-{{ substr($awb->awb_no, 3) }}</td>
                        <td class="px-3 py-1.5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $awb->location }}</td>

                        <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $awb->nop }}</td>
                        <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $awb->aod }}</td>
                        <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $awb->shc }}</td>
                        <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            @foreach (explode(',', $awb->dimensions) as $dims)
                                {{ $dims }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </td>
                        <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $awb->weight }}</td>
                        <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $awb->remarks }}</td>
                        <td class="px-3 py-1.5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $awb->airline->airline_name }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr class="mt-5" />
        <div class="font-medium text-gray-500 uppercase tracking-normal text-center">
            Report Generated By : <b>{{ Auth::user()->displayname[0] }}</b><br />
            Generated on : {{ \Carbon\Carbon::now() }}
        </div>
    </main>
</body>

</html>
