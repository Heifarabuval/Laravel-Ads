@extends('layouts.app')
@section('title')
    <title>Profile</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ strtoupper($user->lastname)." ".ucfirst($user->firstname) }}
                    <form method="POST" action="/user/delete">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button name="id" value="{{$user->id}}" type="submit" class="btn btn-primary">
                                    {{ __('Supprimer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form method="POST" action="/profile">
                            @csrf

                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input value="{{strtoupper($user->lastname)}}" id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"  required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                                <div class="col-md-6">
                                    <input value="{{ucfirst($user->firstname)}}" id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"  required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input value="{{$user->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @if(isset($updateError))
                                        <strong class="text-danger">
                                            Mot de passe Incorrect
                                        </strong>
                                        @endif
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button name="id" value="{{$user->id}}" type="submit" class="btn btn-primary">
                                        {{ __('Enregister les modifications') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>


</div>
<br>
    <div class="container">
        <h2>Mes annonces</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
            </tr>
            </thead>
            <tbody>

            @foreach($ads as $ad)
                <tr>
                    <td>
                        <img class="rounded-circle" height="80px" width="80px" src="{{ asset('/storage/ad/'.$ad->picture) }}" alt="" title="">
                    </td>
                    <td >  <a href="/ad/{{$ad->id}}">{{$ad->title}} </a></td>
                    <td >{{  strlen($ad->description) > 70 ? substr($ad->description,0,70)."..." : $ad->description}}</td>
                    <td class="nowrap">{{$ad->price}}   €</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(!isset($ads[0]))
        <h4>Vous n'avez pas encore posté d'annonces</h4>
            @endif
    </div>
<div class="d-flex justify-content-center">
    {!! $ads->links() !!}
</div>
@endsection
