<template>
    <v-dialog v-model="dialog" max-width="600px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                Registrar Grupo de trabajo
            </v-btn>
        </template>
        <v-card>
            <v-card-title>Creacion de Grupo de Trabajo</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <v-data-table v-model="proyectoSelected" dense item-key="id" show-select :items="proyectos" :headers="proyectosHeaders" :search="proyectoSearch" :single-select="true">
                            <template v-slot:top>
                                <v-toolbar flat>
                                    <v-toolbar-title>Proyectos</v-toolbar-title>
                                    <v-spacer/>
                                    <v-divider class="mx-4" inset vertical></v-divider>
                                    <v-text-field v-model="proyectoSearch" dense label="Busqueda" />
                                </v-toolbar>
                            </template>
                        </v-data-table>
                    </v-col>
                    <v-col>
                        <v-data-table v-model="trabajadoresSelected" dense item-key="dni" show-select :items="trabajadores" :headers="trabajadoresHeaders" :search="trabajadorSearch" :single-select="false">
                            <template v-slot:top>
                                <v-toolbar flat>
                                    <v-toolbar-title>Trabajadores</v-toolbar-title>
                                    <v-spacer/>
                                    <v-divider class="mx-4" inset vertical></v-divider>
                                    <v-text-field v-model="trabajadorSearch" dense label="Busqueda" />
                                </v-toolbar>
                            </template>                            
                            <template v-slot:item.photo="{ item }">
                                <v-img  max-height="50" max-width="70" :src="getPhoto(item.photo)"></v-img>
                            </template>
                        </v-data-table>
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
                trabajadorSearch:'',
                proyectoSearch:'',
                trabajadores:[],
                proyectos:[],
                proyectoSelected:[],
                trabajadoresSelected:[],
            };
        },
        computed:{
            trabajadoresHeaders(){
                return [
                    {text:'',value:'photo'},
                    {text:'DNI',value:'dni'},
                    {text:'Apellido Paterno',value:'ape_paterno'},
                    {text:'Apellido Materno',value:'ape_materno'},
                    {text:'Nombres',value:'nombres'},
                ];
            },
            proyectosHeaders(){
                return [
                    {text:'ID',value:'id'},
                    {text:'Descripción',value:'Descripción'},
                    {text:'Empresa',value:'Empresa'},
                    {text:'Estado',value:'Estado'},
                ];
            },
        },
        watch:{
            dialog(val){
                if(!val){
                    this.trabajadorSearch = ''
                    this.proyectoSearch = ''
                    this.proyectoSelected = []
                    this.trabajadoresSelected = []
                    this.trabajadores = []
                    this.proyectos = []
                }
            }
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/trabajadores').then(response=>{
                    response.data.forEach(trabajador => {
                        if(trabajador.estado === 'DISPONIBLE')
                        {
                            this.trabajadores.push(trabajador)
                        }   
                    })
                }).catch()
                axios.get('/proyectos').then(response=>{
                    response.data.forEach(proyecto => {
                        if(proyecto.Estado === 'POR APROBAR')
                        {
                            this.proyectos.push(proyecto)
                        }   
                    })
                }).catch()
            },
            store(){
                let formData = new FormData
                let index = 0
                formData.append('proyecto',this.proyectoSelected[0].id)
                this.trabajadoresSelected.forEach(trabajador => {
                    formData.append('trabajadores['+index+']',trabajador.dni)
                    index++
                });
                axios.post('/proyecto-trabajadores',formData).then(response=>{
                    this.dialog = false
                    this.getData()
                })
            },
            getPhoto(foto){
               return "storage/images/trabajadores/"+foto
            },
        }
    }
</script>