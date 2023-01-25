
<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">


                <div class="col-md-10">
                    <ul style="vertical-align: top;  list-style: none"><b>
                            <li style="display: inline;margin-right:10px"> <a href="{{ url('/about') }}" title="{{ getSetting() }}">About</a></li>
                            <li style="display: inline;margin-right:10px">  <a href="{{ url('/help') }}" title="help">Help</a></li>
                        <li style="display: inline;margin-right:10px"><a href="{{ url('/terms') }}" title="terms and conditions">Terms and conditions</li>
                            <li style="display: inline;margin-right:10px"> <a href="{{ url('/contact_us') }}" title="contact_us">Contact Us</a></li>
                        {{--<li style="display: inline;margin-right:10px;  cursor: pointer;"  name="language">Language--}}
                            {{--<select title="language" class="form-control text-center language">--}}
                                {{--<option>English</option>--}}
                                {{--<option>Francais (French)</option>--}}
                                {{--<option>Espanol (Spanish)</option>--}}

                            {{--</select></li>--}}
                        </b>
                    </ul>
                </div>
                <div class="col-lg-2 col-xs-12">
                    <span class="logo"> {{getSetting('footer')}} {{getSetting()}}</span>
                    <br>
                </div>
            </div>
        </div>
    </div>
</footer>
