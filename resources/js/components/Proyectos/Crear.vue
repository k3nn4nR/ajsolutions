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
                        <v-text-field v-model="empresa" label="Empresa" dense/>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-menu ref="fecha_inicio_ref" v-model="fecha_inicio_ref" :close-on-content-click="false" transition="scale-transition" offset-y min-width="auto" >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field v-model="started_at" dense label="Fecha de inicio" prepend-icon="mdi-calendar" readonly v-bind="attrs" v-on="on"/>
                            </template>
                            <v-date-picker ref="picker" dense v-model="date" @change="save_started_at"/>
                        </v-menu>
                    </v-col>
                    <v-col>
                        <v-menu ref="fecha_entrega_ref" v-model="fecha_entrega_ref" :close-on-content-click="false" transition="scale-transition" offset-y min-width="auto" >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field v-model="ended_at" dense label="Fecha de entrega" prepend-icon="mdi-calendar" readonly v-bind="attrs" v-on="on"/>
                            </template>
                            <v-date-picker ref="picker" dense v-model="date" @change="save_ended_at"/>
                        </v-menu>
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
                date:'',
                fecha_inicio_ref:false,
                fecha_entrega_ref:false,
                dialog:false,
                descripcion:'',
                empresa:'',
                started_at:'',
                ended_at:'',
            };
        },
        watch:{
            dialog(val){
                if(!val)
                {
                    this.descripcion=''
                    this.empresa=''
                    this.started_at=''
                    this.ended_at=''
                }
            },
        },
        methods:{
            store(){
                let formData = new FormData
                formData.append('descripcion',this.descripcion)
                formData.append('empresa',this.empresa)
                formData.append('started_at',this.started_at)
                formData.append('ended_at',this.ended_at)
                axios.post('/proyecto',formData).then(response=>{
                    this.dialog=false
                    swal("Correcto!", "Proyecto registrado exitosamente", "success");
                    this.$emit('getData')
                })
            },
            save_started_at(date){
                this.started_at = this.date;
                this.$refs.fecha_inicio_ref.save(date);
                this.date = '';
            },
            save_ended_at(date){
                this.ended_at = this.date;
                this.$refs.fecha_entrega_ref.save(date);
                this.date = '';
            },
        },
    }
</script>