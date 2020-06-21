@extends('layouts.app')


@section('content')
<section class="section">
    <div class="container">
        <hero title="Update the ingredient"></hero>
        <ingredient-form :ingredient="{{$ingredient}}"></ingredient-form>
    </div>
</section>
@endsection
