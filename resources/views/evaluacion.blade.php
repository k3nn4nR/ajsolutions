@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <v-card>
            <v-card-text>
                <v-row>
                    <v-col>
                        <evaluaciones-trabajadores-asignar/>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <evaluacion-list/>
                    </v-col>
                    <v-col>
                        <factor-list/>
                    </v-col>
                </v-row>
                <v-row>
                    <pregunta-list/>
                </v-row>
                <v-row>
                    <resultado-list/>
                </v-row>
            </v-card-text>
        </v-card>
    </div>
</div>
@endsection