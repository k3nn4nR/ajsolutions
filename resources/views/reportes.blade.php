@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <v-card>
            <v-card-title>Trabajadores</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <trabajadores-anuales/>
                    </v-col>
                    <v-col>
                        <trabajadores-estados/>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>
        <v-card>
            <v-card-title>Proyectos</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <proyectos-estados/>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>
    </div>
</div>
@endsection
