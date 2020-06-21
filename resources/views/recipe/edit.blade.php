@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <hero title="Edit Recipe"></hero>
            <recipe-form :recipe="{{$recipe}}"></recipe-form>
        </div>
    </section>
@endsection
