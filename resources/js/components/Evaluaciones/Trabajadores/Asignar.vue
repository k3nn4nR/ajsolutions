<template>
    <v-card flat>
        <v-card-title>Generar Evaluacion</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <v-data-table :items="evaluaciones" :headers="evaluacionesHeaders" dense :search="evaluacion" :single-select="false" item-key="id" show-select v-model="evaluacionesSelected"/>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-data-table :items="trabajadores" :headers="trabajadoresHeaders" dense :search="trabajador" :single-select="false" item-key="dni" show-select v-model="trabajadoresSelected"/>
                    </v-col>
                </v-row>
            </v-card-text>
            <v-card-actions>
                <v-row>
                    <v-col>
                        <v-btn class="success" @click="store"><v-icon>{{ 'far fa-save' }}</v-icon></v-btn>
                    </v-col>
                </v-row>
            </v-card-actions>
    </v-card>
</template>
<script>
    export default {
        data(){
            return {
                trabajadoresSelected:[],
                evaluacionesSelected:[],
                trabajador:'',
                evaluacion:'',
                trabajadores:[],
                evaluaciones:[],
            }
        },
        computed:{
            evaluacionesHeaders(){
                return [
                    {text:'Descripcion',value:'evaluacion'},
                ]
            },
            trabajadoresHeaders(){
                return [
                    {text:'DNI',value:'dni'},
                    {text:'Apellido Paterno',value:'ape_paterno'},
                    {text:'Apellido Materno',value:'ape_materno'},
                    {text:'Nombres',value:'nombres'},
                ]
            },
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/trabajadores').then(response=>{this.trabajadores=response.data})
                axios.get('/evaluaciones').then(response=>{this.evaluaciones=response.data})
            },
            store(){
                let index = 0
                let formData = new FormData
                this.trabajadoresSelected.forEach(trabajador => {
                    formData.append('trabajadores['+index+']',trabajador.dni)
                    index++
                });
                index = 0
                this.evaluacionesSelected.forEach(evaluacion => {
                    formData.append('evaluaciones['+index+']',evaluacion.id)
                    index++
                });
                axios.post('/evaluacion-trabajador',formData).then(response=>{
                    swal("Correcto!", "Evaluacion generada exitosamente", "success");
                    location.reload(1000)
                });
            }
        }
    }
</script>