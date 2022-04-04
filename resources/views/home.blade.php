@extends('layouts.app')

@section('content')

    @foreach ($products as $product)
        <hr>
        <p>{{$product -> name}}</p>
        <p>{{$product -> description}}</p>
        <p>{{$product -> price}}</p>
        <img src={{$product -> image}}>
        <p>{{$product -> date}}</p>
        <p>{{$product -> time}}</p>
        <p>{{$product -> capacity}}<p> <!-- capacity is total people. Number of actual people in the event will be needed -->
        <p>{{$product -> featured}}</p>
        <hr>
    @endforeach

    {{$products -> links()}}

@endsection
