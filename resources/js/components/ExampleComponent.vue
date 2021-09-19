<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <v-text-field v-model="search" />
                <v-data-table :items="roles" :headers="rolesHeaders" :search="search" dense>
                    <template v-slot:item.acciones="{ item }">
                        <v-btn>Editar</v-btn>
                        <v-btn>Asignar permisos</v-btn>
                        <v-btn>Eliminar</v-btn>
                    </template>
                </v-data-table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                roles:[],
                search:'',
            };  
        },
        computed:{
            rolesHeaders(){
                return [
                    {text:'Nombre',value:'name'},
                    {text:'Guardia',value:'guard_name'},
                     {text:'',value:'acciones'},
                ];
            },
        },
        mounted() {
            console.log('Component mounted.')
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/role').then(response=>{this.roles = response.data}).catch(error=>{})
            }
        },
    }
</script>
