<template>
    <v-card>
        <v-toolbar color="cyan" dark flat >
            <template v-slot:extension>
                <v-tabs v-model="model" centered slider-color="yellow" >
                    <v-tab :href="`#tab-1`" >
                        NCE
                    </v-tab>
                      <v-tab :href="`#tab-2`" >
                        IDC
                    </v-tab>
                    <v-tab  :href="`#tab-3`" >
                        Proyectos Estado
                    </v-tab>
                    <v-tab  :href="`#tab-4`" >
                        Trabajadores Estados
                    </v-tab>
                    <v-tab  :href="`#tab-5`" >
                        Trabajadores Ingresos
                    </v-tab>
                </v-tabs>
            </template>
        </v-toolbar>

        <v-tabs-items v-model="model">
            <v-tab-item :value="`tab-1`" >
                <v-card flat>
                    <v-card-text>
                        <nce/>
                    </v-card-text>
                </v-card>
            </v-tab-item>
             <v-tab-item :value="`tab-2`" >
                <v-card flat>
                    <v-card-text>
                        <idc/>
                    </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item :value="`tab-3`" >
                <v-card flat>
                    <v-card-text>
                        <proyectos-estado/>
                    </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item :value="`tab-4`" >
                <v-card flat>
                    <v-card-text>
                        <trabajadores-estado/>
                    </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item :value="`tab-5`" >
                <v-card flat>
                    <v-card-text>
                        <trabajadores-anio/>
                    </v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs-items>
    </v-card>
</template>
<script>
    import Nce from '../Reportes/Nce.vue'
    import Idc from '../Reportes/Idc.vue'
    import ProyectosEstado from '../Proyectos/Graficas/Estado.vue'
    import TrabajadoresEstado from '../Trabajadores/Graficas/Estado.vue'
    import TrabajadoresAnio from '../Trabajadores/Graficas/IngresoPorAnio.vue'
    export default {
        components:{
            Nce,
            Idc,
            ProyectosEstado,
            TrabajadoresEstado,
            TrabajadoresAnio,
        },
        data () {
            return {
                model: 'tab-1',
            }
        },
    }
</script>