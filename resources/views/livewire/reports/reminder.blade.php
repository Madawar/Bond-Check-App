<style>
    {!! file_get_contents(public_path('css/app.css')) !!}

</style>
<div class="prose">
    <b class="tracking-wider font-extrabold">Dear Exports team,</b>

    <p>
        Kindly Note that the bond check for the below airlines has not yet been performed.
    </p>

    <p class="">
    <ol class="">
        @foreach ($airlines as $airline)
            <li class="text-red-700 tracking-wide">{{ $loop->index + 1 }} . {{ $airline->airline_name }}</li>
        @endforeach
    </ol>


    </p>

    Kindly Perform the bondcheck and send it to the client using the application at <a
        href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>

</div>
