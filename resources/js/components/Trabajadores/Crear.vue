<template> 
    <v-dialog v-model="dialog" max-width="600px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                Registrar Trabajador
            </v-btn>
        </template>
        <v-card>
            <v-card-title>Nuevo Trabajador</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <v-text-field v-model="dni" label="DNI" dense/>
                    </v-col>
                    <v-col>
                        <v-text-field v-model="ape_paterno" label="Apellido Paterno" dense/>
                    </v-col>
                    <v-col>
                        <v-text-field v-model="ape_materno" label="Apellido Materno" dense/>
                    </v-col>
                    <v-col>
                        <v-text-field v-model="name" label="Nombres" dense/>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-text-field v-model="direccion" label="Direccion" dense/>
                    </v-col>
                    <v-col>
                        <v-text-field v-model="celular" label="Celular" dense/>
                    </v-col>
                    <v-col>
                        <v-text-field v-model="estado" label="Estado" dense/>
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
                dni:'',
                ape_paterno:'',
                ape_materno:'',
                name:'',
                direccion:'',
                celular:'',
                estado:'',
            };
        },
        watch:{
            dialog(val){
                if(!val)
                {
    
                    this.dni=''
                    this.ape_paterno=''
                    this.ape_materno=''
                    this.name='',
                    this.direccion=''
                    this.celular=''
                    this.estado=''
                    
                }
            },
        },
        methods:{
            store(){
                let formData = new FormData
                formData.append('dni',this.dni)
                formData.append('ape_paterno',this.ape_paterno)
                formData.append('ape_materno',this.ape_materno)
                formData.append('name',this.name)
                formData.append('direccion',this.direccion)
                formData.append('celular',this.celular)
                formData.append('estado',this.estado)
                axios.post('/trabajador',formData).then(response=>{
                    this.dialog=false
                    this.$emit('getData')
                })
            },
        },
    }
</script>