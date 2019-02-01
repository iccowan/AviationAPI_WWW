@extends('layouts.master')

@section('title')
    About
@endsection

@section('content')
    <div class="container">
        <br>
        <center>
            <div class="row">
                <div class="col-sm-6">
                    <h5>Thank you for using AviationAPI!</h5>
                    <p>If you have any issues with AviationAPI, please email <a href="mailto:ian@cowanemail.com">Ian Cowan</a> to answer your questions. AviationAPI was built for developers to simplify integrating various aviation related information into different applications. Although the information CAN be used for real world applications, that doesn't mean it SHOULD be used for real world applications. AviationAPI was designed to be used by flight simulation communities and was not intended for real world use. If you intend to use AviationAPI for real world use, please note that Ian Cowan nor AviationAPI are responsible for providing any outdated information. Please always check release date for all information prior to use.</p>
                    <br>
                    <h5>Are you a developer looking for the API documentation? Find that <a href="https://docs.aviationapi.com" target="_blank">HERE!</a>
                </div>
                <div class="col-sm-6">
                    <h5>If you enjoy AviationAPI and would like to support the continued development, donate here!</h5>
                    <br>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                        <input type="hidden" name="cmd" value="_donations" />
                        <input type="hidden" name="business" value="C5BXRKXDTA26E" />
                        <input type="hidden" name="item_name" value="AviationAPI Donations" />
                        <input type="hidden" name="currency_code" value="USD" />
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                        <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                    </form>
                </div>
            </div>
        </center>
    </div>
@endsection
