@extends('layouts.app')
@section('title')
    <title>Modifier mon annonce</title>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{ Form::open(['url' => 'update','enctype'=>"multipart/form-data"]) }}
                <div class="form-group">
                    {!! Form::label('title', 'Titre : ') !!}
                    {{ Form::hidden('id', $ad->id) }}
                    {{ Form::hidden('id_user', $ad->user_id) }}
                    {!! Form::text('title',null,array('Value'=>$ad->title,'class' => 'form-control')) !!}
                    @if($errors->has('title'))
                        <h6>{{$errors->first('title')}}</h6>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description : ') !!}
                    {!! Form::textarea('description',$ad->description,array('class' => 'form-control')) !!}
                    @if($errors->has('description'))
                        <h6>{{$errors->first('description')}}</h6>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Prix : ') !!}
                    {!! Form::input('number','price',null,array('Value'=>$ad->price,'class' => 'form-control','min'=>1)) !!}
                    @if($errors->has('price'))
                        <h6>{{$errors->first('price')}}</h6>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Photo : ') !!}
                    <div>
                        <img class="rounded" height="80px" width="80px" src="{{ asset('/storage/ad/'.$ad->picture) }}" alt="" title="">
                    </div>
                    {!! Form::input('file','image',null,array('accept'=>'image/*','class' => 'form-control')) !!}
                    @if($errors->has('image'))
                        <h6>{{$errors->first('image')}}</h6>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::submit('Enregister les modification',array('class' => 'form-control btn btn-outline-primary')); !!}
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection
