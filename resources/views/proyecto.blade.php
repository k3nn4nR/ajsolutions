@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <proyectos-list/>
            <template>
            <v-card>
                <v-card-text>
                    <v-row>
                        <v-col>
                            <proyectos-list/>
                        </v-col> 
                        <v-col>
                            <proyectos-list/>
                        </v-col>            
                </v-card-text>
            </v-card>
        <template>
        </div>
    </div>
</div>
@endsection
