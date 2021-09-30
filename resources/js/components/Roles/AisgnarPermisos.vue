<template>
    <v-dialog v-model="dialog" max-width="600px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="warning" dark class="mb-2" v-bind="attrs" v-on="on">
                <v-icon small>
                    mdi-pencil
                </v-icon>
            </v-btn>
        </template>
        <v-card>
            <v-card-title>Asignar Permisos</v-card-title>
            <v-card-text>
                <v-data-table :items="permisos" :headers="headers" :search="search" v-model="seleccionados" show-select :single-select="true">
                    <template v-slot:top>
                        <v-toolbar flat>
                            <v-toolbar-title>Permisos</v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-text-field v-model="search" dense label="Busqueda" />
                        </v-toolbar>
                    </template>
                </v-data-table>
            </v-card-text>
            <v-card-actions>
                <v-btn class="error" @click="dialog=false"><v-icon>{{ 'fas fa-ban' }}</v-icon></v-btn>
                <v-btn class="success" @click="asignar"><v-icon>{{ 'far fa-save' }}</v-icon></v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
    export default {
        props:['rol'],
        data(){
            return {
                search:'',
                dialog:false,
                seleccionados:[],
                permisos:[],
            };
        },
        watch:{
            dialog(val){
                if(!val)
                {
                    this.search = ''
                    this.seleccionados = []
                }
            }
        },
        mounted(){
            this.getData()
        },
        computed:{
            headers(){
                return [
                    {text:'Id',value:'id'},
                    {text:'Nombre',value:'name'},
                    {text:'Guardia',value:'guard_name'},
                ]
            }
        },
        methods:{
            getData(){
                axios.get('/permissions').then(response=>{this.permisos=response.data})
            },
            asignar(){
                let formData = new FormData
                formData.append("role",this.role)
                let index = 0
                this.seleccionados.forEach(seleccionado => {
                    formData.append("permisos["+index+"]",seleccionado)
                    index++
                });
                axios.post('',formData).then(response=>{
                    this.dialog=false
                    this.$emit('getData')
                })
            },
        }
    }
</script>