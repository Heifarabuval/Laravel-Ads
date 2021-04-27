@section('title')
    <title>Accueil</title>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-body">
                        <div class="container text-center mt-5 d-flex justify-content-between">
                            <a href="/register">
                                <button class="btn btn-lg btn-outline-info rounded">S'inscrire</button>
                            </a>
                            <a href="/login">
                                <button class="btn btn-lg btn-outline-success rounded">Se connecter</button>
                            </a>
                        </div>
                    </div>

            </div>
@endsection
@extends('layouts.app')
