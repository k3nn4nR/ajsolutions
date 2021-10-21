@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <proyecto-edit :proyecto="{{json_encode($proyecto)}}"/>
    </div>
</div>
@endsection
