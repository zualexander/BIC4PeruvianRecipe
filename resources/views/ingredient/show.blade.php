@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <hero title="Ingredient details"></hero>
            <ingredient-form :ingredient="{{$ingredient}}" :editable="false"></ingredient-form>
        </div>
    </section>
@endsection
