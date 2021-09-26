@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <template>
            <v-card>
                <v-card-text>
                    <v-row>
                        <v-col>
                            <grupos-trabajo-crear/>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
            <v-card>
                <v-card-text>
                    <v-row>
                        <v-col>
                            <grupos-trabajo-list/>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
        <template>        
    </div>
</div>
@endsection
