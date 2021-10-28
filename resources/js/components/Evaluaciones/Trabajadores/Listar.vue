<template>
    <v-card flat>
        <v-card-text>
            <v-card flat>
                <v-card-text>
                    <v-row>
                        <v-col>
                            <v-data-table v-model="historicoSelected" :items="evaluacionesHistorico" :headers="historicoHeaders" show-select dense  item-key="id" :single-select="true">
                                <template v-slot:top>
                                    <v-toolbar flat>
                                        <v-toolbar-title>Evaluaciones Finalizadas</v-toolbar-title>
                                    </v-toolbar>
                                </template>
                                <template v-slot:item.deleted_at="{ item }">
                                    {{ item.deleted_at | fechaFormat}}
                                </template>
                            </v-data-table>
                        </v-col>
                        <v-col>
                             <v-data-table :items="evaluaciones" :headers="evaluacionesHeaders" dense>
                                <template v-slot:top>
                                    <v-toolbar flat>
                                        <v-toolbar-title>Evaluaciones Activas</v-toolbar-title>
                                    </v-toolbar>
                                </template>
                                <template v-slot:item.created_at="{ item }">
                                    {{ item.created_at | fechaFormat}}
                                </template>
                                <template v-slot:item.acciones="{ item }">
                                    <v-btn small class="success" @click="resolver(item)"><v-icon small>{{ "fas fa-pen-alt" }}</v-icon></v-btn>
                                </template>
                            </v-data-table>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
            <responder-evaluacion ref="Responder" v-on:getData="getData()"/>
            <v-card flat>
                <v-card-text>
                    <v-row>
                        <v-col>
                            <grafica-estrella :historico="historicoSelected"/>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
        </v-card-text>
    </v-card>
</template>
<script>
    import ResponderEvaluacion from "../Trabajadores/Responder.vue"
    import GraficaEstrella from "../Trabajadores/Graficas/Estrella.vue"
    export default {
        components:{
            GraficaEstrella,
            ResponderEvaluacion,
        },
        props:['trabajador'],
        data(){
            return {
                evaluaciones:[],
                evaluacionesHistorico:[],
                evaluacion:'',
                historicoSelected:[],
            }
        },
        filters:{
            fechaFormat(val){
                if(val)
                {
                    return val.split('T')[0]
                }
                return val
            },
        },
        computed:{
            evaluacionesHeaders(){
                return [
                    {text:'Evaluacion',value:'evaluacion.evaluacion'},
                    {text:'Registrado',value:'created_at'},
                    {text:'',value:'acciones'},
                ]
            },
            historicoHeaders(){
                return [
                    {text:'Evaluacion',value:'evaluacion.evaluacion'},
                    {text:'Realizado',value:'deleted_at'},
                ]
            },
        },        
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/trabajadores-evaluaciones/'+this.trabajador.dni).then(response=>{this.evaluaciones=response.data})
                axios.get('/trabajadores-evaluaciones-historico/'+this.trabajador.dni).then(response=>{this.evaluacionesHistorico=response.data})
            },
            resolver(item){
                let objeto = {detalles:[]}
                objeto.id = item.id
                item.detalles.forEach(detalle => {
                    objeto.detalles.push({
                        id:detalle.id,
                        puntaje:detalle.puntaje,
                        pregunta:detalle.pregunta.descripcion,
                    })
                });
                this.$refs.Responder.responder(objeto)
            },
        }
    }
</script>