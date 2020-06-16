@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Log New Ticket</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post-new-ticket') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>

                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="due_date" class="col-md-4 col-form-label text-md-right">{{ __('Due Date') }}</label>

                            <div class="col-md-6">
                                <input id="due_date" type="datetime-local" class="form-control @error('due_date') is-invalid @enderror" name="due_date" value="{{ old('due_date') }}" required autocomplete="due_date">

                                @error('due_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ticket_category_id" class="col-md-4 col-form-label text-md-right">{{ __('Ticket Category') }}</label>

                            <div class="col-md-6">
                                <select id="ticket_category_id" class="form-control @error('ticket_category_id') is-invalid @enderror" name="ticket_category_id" required autocomplete="ticket_category_id">
                                    <option value="{{ old('ticket_category_id') }}" disabled="true" selected="true">--Select Category--</option>
                                    @foreach ($data->categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('ticket_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="formatted_address" class="col-md-4 col-form-label text-md-right">{{ __('Formatted Address') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-primary" id="basic-addon1"
                                       onclick="event.preventDefault(); getLocation();">Get Location</button>
                                    </div>
                                    <input id="formatted_address" type="text" class="form-control @error('due_date') is-invalid @enderror"  name="formatted_address"  value="{{ old('formatted_address') }}" required autocomplete="formatted_address">
                                </div>
                                @error('formatted_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Submit Ticket') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <br/>
                            </div>
                        </div>
                        
                        <div class="form-group row">
	                        <p id="location"></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    let el = document.getElementById("location");
    var key = 'AIzaSyBNTSWf0MqZZzoXNvi_W_3z4AbGLcP_lkE';

    function fallbackGeoLocation(){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var geolocation = JSON.parse(xhttp.responseText).location;
                var loc = geolocation.lat + ',' + geolocation.lng;
                el.innerHTML = '<a target="_blank" href="http://maps.google.com/maps/place/' + loc + '/@' + loc + ',10z/data=!3m1!1e3"><img style="width:100%" src=https://maps.googleapis.com/maps/api/staticmap?zoom=16&size=700x400&maptype=roadmap&markers=color:red%7Clabel:C%7C' + loc + '&key=' + key +'></a><br><br>';
                el.innerHTML += '<b>Geo Coordinates:</b> ' + geolocation.lat + ', ' + geolocation.lng + '<br>';


                var xhttp2 = new XMLHttpRequest();
                xhttp2.onreadystatechange = function() {
                    if (xhttp2.readyState == 4 && xhttp2.status == 200) {
                        console.log(xhttp2.responseText);
                        var locationName = JSON.parse(xhttp2.responseText).results;
                        var Local_Time = new Date();
                        var Location_Name = locationName[0].formatted_address;
                        //console.log(Location_Name)
                        el.innerHTML += '<b>Location Name:</b> ' + Location_Name + '<br>';
                        el.innerHTML += '<b>Local Time:</b> ' + Local_Time;

                        // NO IDEA WHY THIS IS NOT WORKING, SEEMS LIKE CHOME CHANGED SOMETHING AND NEED TO ACCESS THE ELEMENT AGAIN
                        document.getElementById("location").innerHTML = el.innerHTML
                        document.getElementById("formatted_address").value = Location_Name;
                    }
                };
                
                xhttp2.open("POST", 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + geolocation.lat + ',' + geolocation.lng + '&sensor=true&key=' + key, true);
                xhttp2.send();
            }
            if (xhttp.readyState == 4 && (xhttp.status == 403 || xhttp.status == 500)) {
                el.innerHTML += 'Sorry! Our Google Geolocation API Quota exceeded.';
            }
        };
        
        xhttp.open("POST", "https://www.googleapis.com/geolocation/v1/geolocate?key=" + key, true);
        xhttp.send();

    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            el.innerHTML = "Geolocation is not supported by this browser.";
            fallbackGeoLocation();
        }
    }

    function showPosition(position) {
        var loc = position.coords.latitude + ',' + position.coords.longitude;
        console.log(el);
        el.innerHTML = '<a target="_blank" href="http://maps.google.com/maps/place/' + loc + '/@' + loc + ',10z/data=!3m1!1e3"><img style="width:100%" src=https://maps.googleapis.com/maps/api/staticmap?zoom=16&size=700x400&maptype=roadmap&markers=color:red%7Clabel:C%7C' + loc + '&key=' + key +' ></a><br><br>';
        el.innerHTML += '<b>Geo Coordinates:</b> ' + position.coords.latitude + ', ' + position.coords.longitude + '<br>';


        var xhttp3 = new XMLHttpRequest();
        xhttp3.onreadystatechange = function() {
            if (xhttp3.readyState == 4 && xhttp3.status == 200) {
                var locationName = JSON.parse(xhttp3.responseText).results;
                var Local_Time = new Date();
                var Location_Name = locationName[0].formatted_address;
                el.innerHTML += '<b>Location Name:</b> ' + Location_Name + '<br>';
                el.innerHTML += '<b>Local Time:</b> ' + Local_Time ;


                // NO IDEA WHY THIS IS NOT WORKING, SEEMS LIKE CHOME CHANGED SOMETHING AND NEED TO ACCESS THE ELEMENT AGAIN
                document.getElementById("location").innerHTML = el.innerHTML
                document.getElementById("formatted_address").value = Location_Name;
            }
        };

        xhttp3.open("POST", 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + position.coords.latitude + ',' + position.coords.longitude + '&sensor=true&key=' + key, true);
        xhttp3.send();
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                el.innerHTML = "User denied the request for Geolocation.";
                fallbackGeoLocation();
                break;
            case error.POSITION_UNAVAILABLE:
                el.innerHTML = "Location information is unavailable."
                fallbackGeoLocation();
                break;
            case error.TIMEOUT:
                el.innerHTML = "The request to get user location timed out."
                fallbackGeoLocation();
                break;
            case error.UNKNOWN_ERROR:
                el.innerHTML = "An unknown error occurred."
                fallbackGeoLocation();
                break;
        }
    }

</script>
@endsection
