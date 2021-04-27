@extends('layouts.app')
@section('title')
    <title>Ajouter une annonce</title>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{ Form::open(['url' => 'create','enctype'=>"multipart/form-data"]) }}
                <div class="form-group">
                    {!! Form::label('title', 'Titre : ') !!}
                    {!! Form::text('title',null,array('class' => 'form-control')) !!}
                    @if($errors->has('title'))
                        <h6>{{$errors->first('title')}}</h6>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description : ') !!}
                    {!! Form::textarea('description',null,array('class' => 'form-control')) !!}
                    @if($errors->has('description'))
                        <h6>{{$errors->first('description')}}</h6>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Prix : ') !!}
                    {!! Form::input('number','price',null,array('class' => 'form-control','min'=>1)) !!}
                    @if($errors->has('price'))
                        <h6>{{$errors->first('price')}}</h6>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Catégories : ') !!}
                    <select name="category_id" class="form-control">
                        @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Photo : ') !!}
                    {!! Form::input('file','image',null,array('accept'=>'image/*','class' => 'form-control')) !!}
                    @if($errors->has('image'))
                        <h6>{{$errors->first('image')}}</h6>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::submit('Créer !',array('class' => 'form-control btn btn-outline-primary')); !!}
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection
