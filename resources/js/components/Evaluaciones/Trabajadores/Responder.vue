<template>
    <v-dialog v-model="dialog" max-width="800px" persistent>
        <v-card>
            <v-card-title>Responder Evaluacion</v-card-title>
            <v-card-text>
                <v-row v-for="(categoria,c) in categorias" :key="c">
                    <h5 class="text-xl-left font-weight-medium">
                        {{c}}- {{categoria.value}} : {{categoria.text}} 
                    </h5>
                </v-row>
                <v-row>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th cols="7">Pregunta</th>
                                    <th class="text-left" cols="1" v-for="(categoria,c) in categorias" :key="c"> {{categoria.value}} </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(detalle,d) in evaluacion.detalles" :key="d">
                                    <td cols="7">
                                        {{ detalle.pregunta }}
                                        <div class="font-weight-medium red--text" v-if="errores && errores['detalles.'+d+'.puntaje']">{{errores['detalles.'+d+'.puntaje'][0]}}</div>
                                    </td>
                                    <td cols="1" v-for="n in 5" :key="n">
                                        <v-radio-group v-model="detalle.puntaje" row >
                                            <v-radio :value="n"/>
                                        </v-radio-group>
                                    </td>
                                </tr>
                            </tbody>
                            </template>
                    </v-simple-table>
                </v-row>
            </v-card-text>
            <v-card-actions>
                <v-btn @click="store" class="success">Registrar</v-btn>
                <v-btn @click="dialog=false" class="error">Cancelar</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
    export default {
        data(){
            return {
                evaluacion:'',
                dialog:false,
                categorias:[{text:'Totalmente en Desacuerdo',value:'TD'},{text:'Desacuerdo',value:'D'},{text:'Indeciso',value:'I'},{text:'de Acuerdo',value:'A'},{text:'Totalmente de Acuerdo',value:'TA'}],
                errores:{},
            }
        },
        watch:{
            dialog(val){
                if(!val)
                {
                    this.evaluacion = ''
                    this.errores = []
                }
            },
        },
        methods:{
            responder(item){
                this.evaluacion = item
                this.dialog = true
            },
            store(){
                axios.put('/trabajador-evaluaciones',this.evaluacion).then(response=>{
                    swal("Correcto!", "Evaluacion resuelta exitosamente", "success");
                    this.dialog = false
                    this.$emit('getData')
                }).catch(error=>{
                    this.errores = error.response.data.errors
                })
            }
        }
    }
</script>