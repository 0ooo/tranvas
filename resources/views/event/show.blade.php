@extends('html')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-heading">{{ $event->title }}</h1>
                </div>
                <div class="panel-body">
                    <p><strong>Description:</strong></p>
                    <p>{{ $event->description }}</p>
                </div>

                <div id="map"></div>

                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                    <tr>
                        <td><strong>Start Date:</strong></td>
                        <td>{{ $event->start_date }}</td>
                    </tr>
                    <tr>
                        <td><strong>End Date:</strong></td>
                        <td>{{ $event->end_date }}</td>
                    </tr>
                    <tr>
                        <td><strong>Address:</strong></td>
                        <td>{{ $event->address }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created by:</strong></td>
                        <td><a href="#">{{ $event->creator->name }}</a></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>
@endsection

@section('header-styles')
    <style>
        #map {
            width: 100%;
            height: 400px;
            background-color: grey;
        }
    </style>
@endsection

@section('footer-scripts')
    <script>
        function initMap() {
            var uluru = {lat: {{ $event->lat }}, lng: {{ $event->long }} };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API_KEY') }}&callback=initMap">
    </script>
@endsection

