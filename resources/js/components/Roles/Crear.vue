<template> 
    <v-dialog v-model="dialog" max-width="600px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                Registrar Rol
            </v-btn>
        </template>
        <v-card>
            <v-card-title>Nuevo Rol</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <v-text-field v-model="name" label="Nombre" dense/>
                    </v-col>
                    <v-col>
                        <v-text-field v-model="guard_name" label="Guardia (default web)" dense/>
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
                name:'',
                guard_name:'',
            };
        },
        watch:{
            dialog(val){
                if(!val)
                {
                    this.name=''
                    this.guard_name=''
                }
            },
        },
        methods:{
            store(){


                let formData = new FormData //crea un objecto con los valores que indiques al metodo post
                formData.append('name',this.name)
                formData.append('guard_name',this.guard_name)
                axios.post('/role',formData).then(response=>{
                    this.dialog=false
                    this.$emit('getData')
                })
            },
        },
    }
</script>