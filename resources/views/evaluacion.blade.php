@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <v-card>
            <v-card-text>
                <v-row>
                    <evaluacion-list/>
                </v-row>
                <v-row>
                    <factor-list/>
                </v-row>
                <v-row>
                    <pregunta-list/>
                </v-row>
            </v-card-text>
        </v-card>
    </div>
</div>
@endsection
