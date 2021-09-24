<template>
    <v-dialog v-model="dialog" max-width="600px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="success" dark class="mb-2" v-bind="attrs" v-on="on">
                Registrar Pregunta
            </v-btn>
        </template>
        <v-card>
            <v-card-title>Nueva Pregunta</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <v-text-field v-model="descripcion" label="Pregunta" dense/>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-select :items="evaluaciones" v-model="evaluacion" label="Evaluacion" item-text="evaluacion" item-value="id" dense/>
                    </v-col>
                     <v-col>
                        <v-select :items="factores" v-model="factor" label="Factor" item-text="descripcion" item-value="id" dense/>
                    </v-col>
                </v-row>
            </v-card-text>
            <v-card-actions>
                <v-btn class="error" @click="dialog=false"><v-icon>{{ 'fas fa-ban' }}</v-icon></v-btn>
                <v-btn class="success" @click="store"><v-icon>{{ 'far fa-save' }}</v-icon></v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
    export default {
        data(){
            return {
                descripcion:'',
                dialog:false,
                evaluaciones:[],
                evaluacion:'',
                factores:[],
                factor:'',
            };
        },
        watch:{
            dialog(val)
            {
                if(!val)
                {
                    this.descripcion = ''
                    this.evaluacion = ''
                    this.factor = ''
                }
            }
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/evaluaciones').then(response=>{this.evaluaciones=response.data}).catch()
                axios.get('/factores').then(response=>{this.factores=response.data}).catch()
            },
            store(){
                let formData = new FormData
                formData.append('descripcion',this.descripcion)
                formData.append('evaluacion',this.evaluacion)
                formData.append('factor',this.factor)
                axios.post('/pregunta',formData).then(response=>{
                    this.dialog=false
                    swal("Correcto!", "Pregunta registrada exitosamente", "success");
                    this.$emit('getData')
                })
            },
        }
    }
</script>