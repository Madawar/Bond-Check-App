<style>
    {!! file_get_contents(public_path('css/app.css')) !!}

</style>
<div class="prose">
    <b class="tracking-wider font-extrabold">Dear {{ $airline->airline_name }} team,</b>

    <p>
        Please find Bondcheck for {{ $date }}. If you have any issues with the report please reply to this
        email.
    </p>


    <b>AFS Team</b>
</div>
