@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <trabajadores-list/>
            <template>
            <v-card>
                <v-card-text>
                    <v-row>
                        <v-col>
                            <Trabajadores-list/>
                        </v-col>
                        <v-col>
                            <Trabajador-list/>
                        </v-col>
                    </v-row>                   
                </v-card-text>
            </v-card>
        <template>
        </div>
    </div>
</div>
@endsection
