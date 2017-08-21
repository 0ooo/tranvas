@extends('html')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Upcoming Events</h1>
            @foreach($upcomingEvents as $upcomingEvent)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-heading">
                            <a href="{{ route('events.show', $upcomingEvent) }}">{{ $upcomingEvent->title }}</a>
                        </h3>
                        <small class="padding-left-20">{{ $upcomingEvent->address }}</small>
                    </div>
                    <div class="panel-body">

                        <div class="meta-data margin-bottom-20">
                            <strong>Start Date:</strong> {{ $upcomingEvent->start_date }}
                            <br>
                            <strong>End Date:</strong> {{ $upcomingEvent->end_date }}
                            <br>
                            <strong>Created by:</strong> {{ $upcomingEvent->creator->name }}
                        </div>
                        <div class="description">
                            <p>{{  $upcomingEvent->description }}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Past Events</h1>

            @if( count($pastEvents) == 0 )
                <p>No Past Events</p>
            @else
                @foreach($pastEvents as $pastEvent)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-heading">
                                <a href="{{ route('events.show', $pastEvent) }}">{{ $pastEvent->title }}</a>
                            </h3>
                            <small class="padding-left-20">{{ $pastEvent->address }}</small>
                        </div>
                        <div class="panel-body">

                            <div class="meta-data margin-bottom-20">
                                <strong>Start Date:</strong> {{ $pastEvent->start_date }}
                                <br>
                                <strong>End Date:</strong> {{ $pastEvent->end_date }}
                                <br>
                                <strong>Created by:</strong> {{ $pastEvent->creator->name }}
                            </div>
                            <div class="description">
                                <p>{{  $pastEvent->description }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection

