<template>
    <v-dialog v-model="dialog" max-width="600px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="success" dark class="mb-2" v-bind="attrs" v-on="on">
                Registrar Factor
            </v-btn>
        </template>
        <v-card>
            <v-card-title>Nuevo Factor</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <v-text-field v-model="descripcion" label="Factor" dense/>
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
            };
        },
        watch:{
            dialog(val)
            {
                if(!val)
                {
                    this.descripcion = ''
                }
            }
        },
        methods:{
            store(){
                let formData = new FormData
                formData.append('descripcion',this.descripcion)
                axios.post('/factor',formData).then(response=>{
                    this.dialog=false
                    this.$emit('getData')
                })
            }
        }
    }
</script>