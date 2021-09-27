<template>
    <v-expansion-panels>
        <v-expansion-panel v-for="proyecto in proyectos" :key="proyecto.id">
            <v-expansion-panel-header v-slot="{ open }">
                <v-row no-gutters>
                    <v-col cols="4">
                        {{ proyecto.Descripción }}
                    </v-col>
                    <v-col cols="8" class="text--secondary" >
                        <v-fade-transition leave-absolute>
                            <v-row no-gutters style="width: 100%" >
                                <v-col cols="6">
                                    Start date: {{ proyecto.started_at || 'Not set' }}
                                </v-col>
                                <v-col cols="6">
                                    End date: {{ proyecto.ended_at || 'Not set' }}
                                </v-col>
                            </v-row>
                        </v-fade-transition>
                    </v-col>
                </v-row>
            </v-expansion-panel-header>
            <v-expansion-panel-content>
                <v-row>
                    <v-col>
                        <v-text-field v-model="proyecto.Empresa" label="Empresa" dense disabled/>
                    </v-col>
                    <v-col>
                        <v-text-field v-model="proyecto.Estado" label="Estado" dense disabled/>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-data-table :items="proyecto.trabajadores" :headers="headers" dense>
                            <template v-slot:top>
                                <v-toolbar flat>
                                    <v-toolbar-title>Trabajadores</v-toolbar-title>
                                </v-toolbar>
                            </template>
                            <template v-slot:item.acciones="{ item }">
                                <proyectos-trabajador-eliminar :proyecto="proyecto.id" :trabajador="item.dni" />
                                <proyectos-trabajador-reemplazar :proyecto="proyecto.id" :trabajador="item.dni" />
                            </template>
                            <template v-slot:item.photo="{ item }">
                                <v-img :src="getPhoto(item.photo)" max-height="50" max-width="70"></v-img>
                            </template>
                        </v-data-table>
                    </v-col>
                </v-row>

            </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels>
</template>
<script>
    export default {
        data: () => ({
            proyectos:[],
        }),
        computed:{
            headers(){
                return [
                    {text:'',value:'photo'},
                    {text:'DNI',value:'dni'},
                    {text:'Apellido Paterno',value:'ape_paterno'},
                    {text:'Apellido Materno',value:'ape_materno'},
                    {text:'Nombres',value:'nombres'},
                    {text:'',value:'acciones'},
                ]
            }
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/proyecto-trabajadores').then(response=>{this.proyectos = response.data})
            },
            getPhoto(foto){
               return "storage/images/trabajadores/"+foto
            },
        }
    }
</script>