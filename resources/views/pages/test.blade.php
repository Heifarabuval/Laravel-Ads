@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h4 class="panel-heading">Vos messages concernant : {{ ucfirst($ad->title)}}</h4>
                    <div id="test" class="panel-body">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form
                            v-on:messagesent="addMessage"
                            :user="{{ \Illuminate\Support\Facades\Auth::user() }}"
                            :room="{{ $room }}"
                            :ad="{{ $ad }}"

                        ></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
