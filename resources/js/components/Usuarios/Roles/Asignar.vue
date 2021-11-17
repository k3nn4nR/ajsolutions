<template>
    <v-dialog v-model="dialog" persistent max-width="600">
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                Asignar Roles
            </v-btn>
        </template>
        <v-card>
            <v-card-title>
                <v-card-title>Asinacion de Roles</v-card-title>
                <v-card-text>
                    <v-row>
                        <v-col>
                            <v-data-table dense show-select :single-select="true" v-model="user" :items="users" :headers="headers"/>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <v-data-table dense show-select :single-select="false" v-model="rolesSelected" :items="roles" :headers="rolesheaders" :search="search">
                                <template v-slot:top>
                                    <v-toolbar flat>
                                        <v-toolbar-title>Roles</v-toolbar-title>
                                        <v-divider class="mx-4" inset vertical ></v-divider>
                                        <v-text-field v-model="search" dense label="Busqueda"/>
                                    </v-toolbar>
                                </template>
                            </v-data-table>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-actions>
                    <v-btn class="error" @click="dialog=false"><v-icon>{{ 'fas fa-ban' }}</v-icon></v-btn>
                    <v-btn class="success" @click="sync"><v-icon>{{ 'far fa-save' }}</v-icon></v-btn>
                </v-card-actions>
            </v-card-title>
        </v-card>
    </v-dialog>
</template>
<script>
    export default {
        props:['users'],
        data(){
            return {
                roles:[],
                rolesSelected:[],
                search:'',
                user:[],
                dialog:false,
            }
        },
        mounted(){
            this.getData()
        },
        watch:{
            dialog(val){
                if(!val)
                {
                    this.rolesSelected = []
                    this.search = ''
                    this.user = []
                }
            }
        },
        computed:{
            headers(){
                return [
                    {text:'Correo',value:'email'}
                ]
            },
            rolesheaders(){
                return [
                    {text:'Rol',value:'name'}
                ]
            }
        },
        methods:{
            getData(){
                axios.get('/roles').then(response=>{this.roles=response.data})
            },
            sync(){
                let formData = new FormData
                formData.append('user',this.user[0].id)
                let index = 0
                this.rolesSelected.forEach(role => {
                    formData.append('roles['+index+']',role.id)
                    index++
                });
                axios.post('/usuario-role-sync',formData).then(response=>{
                    swal("Exito!","Roles asignados!","success")
                    this.dialog = false
                })
            }
        }
    }
</script>