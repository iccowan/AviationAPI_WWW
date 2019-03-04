@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="container">
        <br>
        <center>
            <h1>Welcome to AviationAPI!</h1>
            <p>AviationAPI was created to be used on flight simulation websites to pull applicable information like charts, chart changes, weather, and more! Please note that if you intend on using this for real world applications, you must do so at your own risk, but it is not recommended.</p>
            <hr>
            <h3>Today's Chart of the Day!</h3>
            <br>
            <embed src="https://drive.google.com/viewerng/viewer?embedded=true&url={{ $chart_url }}" width="100%" height="755px">
            <hr>
            <h3>Enjoy AviationAPI?</h3>
            <h4>Consider donating!</h4>
            <p>AviationAPI will always be free, but hosting is not free. Any and all donations are accepted and greatly appreciated and help to keep everything up and running.</p>
            <br>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                <input type="hidden" name="cmd" value="_donations" />
                <input type="hidden" name="business" value="C5BXRKXDTA26E" />
                <input type="hidden" name="item_name" value="AviationAPI Donations" />
                <input type="hidden" name="currency_code" value="USD" />
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
            </form>
        </center>
    </div>
@endsection
