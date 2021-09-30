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
            <v-card-title>Asignar Roles</v-card-title>
            <v-card-text>
                <v-data-table :items="roles" :headers="headers" :search="search" v-model="seleccionados" show-select :single-select="true">
                    <template v-slot:top>
                        <v-toolbar flat>
                            <v-toolbar-title>Roles</v-toolbar-title>
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
        props:['permiso'],
        data(){
            return {
                search:'',
                dialog:false,
                seleccionados:[],
                roles:[],
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
                axios.get('/roles').then(response=>{this.roles=response.data})
            },
            asignar(){
                let formData = new FormData
                formData.append("permiso",this.permiso)
                let index = 0
                this.seleccionados.forEach(seleccionado => {
                    formData.append("roles["+index+"]",seleccionado)
                    index++
                });
                axios.post('',formData).then(response=>{
                    this.dialog=false
                    this.$emit('getData')
                })
            }
        }
    }
</script>