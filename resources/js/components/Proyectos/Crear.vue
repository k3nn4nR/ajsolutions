<template> 
        <v-dialog v-model="dialog" max-width="600px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                Registrar Proyecto
            </v-btn>
        </template>
        <v-card>
            <v-card-title>Nuevo Proyecto</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <v-text-field v-model="descripcion" label="Nombre" dense/>
                    </v-col>
                    <v-col>
                        <v-text-field v-model="estado" label="Empresa" dense/>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-text-field v-model="started_at" label="Fecha de inicio" dense/>
                    </v-col>
                    <v-col>
                        <v-text-field v-model="ended_at" label="Fecha de entrega" dense/>
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
                dialog:false,
                descripcion:'',
                estado:'',
                started_at:'',
                ended_at:'',
            };
        },
        watch:{
            dialog(val){
                if(!val)
                {
                    this.descripcion=''
                    this.estado=''
                    this.started_at=''
                    this.ended_at=''
                }
            },
        },
        methods:{
            store(){
                let formData = new FormData
                formData.append('descripcion',this.descripcion)
                formData.append('estado',this.estado)
                formData.append('started_at',this.started_at)
                formData.append('ended_at',this.ended_at)
                axios.post('/proyectos',formData).then(response=>{
                    this.dialog=false
                    this.$emit('getData')
                })
            },
        },
    }
</script>