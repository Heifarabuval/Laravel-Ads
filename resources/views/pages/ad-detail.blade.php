@extends('layouts.app')
@section('title')
    <title>{{$ad->title}}</title>
@endsection
@section('content')
    <div class="container">
        <div style="text-align: center" class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div  class="card-header">
                        <h1>
                            {{ $ad->title }}
                        </h1>

                    </div>

                    <div  class="card-body">
                        <img class="rounded" height="300px" width="300px" src="{{ asset('/storage/ad/'.$ad->picture) }}" alt="" title="">
                    </div>
                    <div>Description:
                        <p>{{$ad->description}}</p>
                    </div>
                    <div>Prix:
                        <p>{{$ad->price}} €</p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex text-center justify-content-around">
                            @if(Auth::user()->id==$ad->user_id)
                                <form method="POST" action="/ad/delete">
                                    @csrf
                                    <button name="id" value="{{$ad->id}}" type="submit" class="btn btn-danger">
                                        {{ __('Supprimer') }}
                                    </button>

                                </form>
                                <a href="/ad/update/{{$ad->id}}" class="btn btn-outline-success">
                                    Modifier
                                </a>
                                <a href="/inbox/{{$ad->id}}" class="btn btn-outline-primary">
                                    Messages
                                </a>
                            @else
                                <a href="/chat/{{$ad->id}}" class="btn btn-outline-primary">
                                    Contacter
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

