@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Rooms </div>
                    <div class="panel-body">
                        <ul>
                      @foreach($rooms as $room)
                         <li class="list-unstyled m-3"><a href="/read/{{$room->room_id}}" class="btn btn-outline-success">
                                 {{$room->firstname}}   {{$room->lastname}}
                             </a></li>

                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
