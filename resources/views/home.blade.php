@extends('layouts.app')

@section('content')

    @foreach($products -> $product)
    <p>{{$product -> name}}</p>

@endsection
