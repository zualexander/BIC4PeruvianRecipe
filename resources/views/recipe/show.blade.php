@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <hero title="Recipe details"></hero>
            <recipe-form :recipe="{{$recipe}}" :editable="false"></recipe-form>
        </div>
    </section>
@endsection
