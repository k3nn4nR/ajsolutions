@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <v-card>
            <v-card-text>
                <v-row>
                    <v-col>
                        <evaluaciones-view :trabajador="{{json_encode(Auth::user()->trabajador)}}"/>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>
    </div>
</div>
@endsection
