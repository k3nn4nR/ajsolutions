<template>
    <v-card flat>
        <v-card-text>
            <v-card flat>
                <v-card-title>Edicion </v-card-title>
                <v-card-text>
                    <v-row>
                        <v-col>
                            <v-text-field label="Descripcion" v-model="proyecto.Descripción" />
                        </v-col>
                        <v-col>
                            <v-text-field label="Empresa" v-model="proyecto.Empresa" />
                        </v-col>
                        <v-col>
                            <v-text-field disabled label="Estado" v-model="proyecto.Estado" />
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <v-menu ref="fecha_inicio_ref" v-model="fecha_inicio_ref" :close-on-content-click="false" transition="scale-transition" offset-y min-width="auto" >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field v-model="proyecto.started_at" dense label="Fecha de inicio" prepend-icon="mdi-calendar" readonly v-bind="attrs" v-on="on"/>
                                </template>
                                <v-date-picker ref="picker" dense v-model="date" @change="save_started_at"/>
                            </v-menu>
                        </v-col>
                        <v-col>
                            <v-menu ref="fecha_entrega_ref" v-model="fecha_entrega_ref" :close-on-content-click="false" transition="scale-transition" offset-y min-width="auto" >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field v-model="proyecto.ended_at" dense label="Fecha de entrega" prepend-icon="mdi-calendar" readonly v-bind="attrs" v-on="on"/>
                                </template>
                                <v-date-picker ref="picker" dense v-model="date" @change="save_ended_at"/>
                            </v-menu>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <v-btn class="success" @click="update">Actualizar</v-btn>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
            <v-card flat>
                <grafica-trabajadores ref="gt" :proyecto="proyecto"/>
            </v-card>
        </v-card-text>
    </v-card>
</template>
<script>
    import GraficaTrabajadores from "../Proyectos/Graficas/Trabajadores.vue"
    export default {
        components:{
            GraficaTrabajadores,
        },
        props:['proyecto'],
        data(){
            return {
                date:'',
                fecha_inicio_ref:false,
                fecha_entrega_ref:false,
            }
        },
        watch:{
            proyecto(val){
                if(val)
                {
                    this.$refs.gt.updateData()
                }
            }
        },
        methods:{
            save_started_at(date){
                this.proyecto.started_at = this.date;
                this.$refs.fecha_inicio_ref.save(date);
                this.date = '';
            },
            save_ended_at(date){
                this.proyecto.ended_at = this.date;
                this.$refs.fecha_entrega_ref.save(date);
                this.date = '';
            },
            update(){

            },
        },
    }
</script>