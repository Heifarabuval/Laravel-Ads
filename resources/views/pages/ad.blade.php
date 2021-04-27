@extends('layouts.app')
@section('title')
    <title>Annonces</title>
@endsection

@section('content')


    <div class="d-flex flex-column">
    <div class="container">
        <form role="form" method="get" action="/search" class="d-flex justify-content-around">
            @csrf
            <div class="form-group">
                <select name="category_id" class="form-control">
                    <option  value="0">Aucun</option>
                    @foreach($category as $cat)
                        @if(intval(request()->input('category_id'))==intval($cat->id))
                            <option name="test" selected="selected" value="{{$cat->id}}">{{$cat->name}}</option>
                        @else
                            <option name="test" value="{{$cat->id}}">{{$cat->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            <label>
                <input value="{{request()->input('search')}}" name="search" id="search" class="form-control mr-sm-2" type="text" placeholder="Search">
            </label>
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </div>
            <div class="form-group">
                <select name="sort" class="form-control">
                    <option  value="price/asc ">Prix Croissant</option>
                    <option  value="price/desc">Prix Décroissant</option>
                    <option  value="created_at/asc">Date plus récent</option>
                    <option  value="created_at/desc">Date plus vieux</option>
                </select>
            </div>
        </form>
    </div>
    <a href="/create" class="m-3 btn btn-outline-primary">
        Créer une annonce
    </a>
    </div>

    <table class="table mt-5">
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
              <td>  <a href="/ad/{{$ad->id}}">{{$ad->title}} </a></td>
                <td >{{  strlen($ad->description) > 70 ? substr($ad->description,0,70)."..." : $ad->description}}</td>
                <td class="nowrap">{{$ad->price}}   €</td>
            </tr>

        @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $ads->links() !!}
    </div>

@endsection
