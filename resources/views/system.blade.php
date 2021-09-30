@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <template>
            <v-card>
                <v-card-text>
                    <v-row>
                        <v-col>
                            <usuario-list/>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <role-list/>
                        </v-col>
                        <v-col>
                            <permiso-list/>
                        </v-col>
                    </v-row>                   
                </v-card-text>
            </v-card>
        <template>
    </div>
</div>
@endsection
