<template>
    <v-dialog v-model="dialog" max-width="600px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="success" dark class="mb-2" v-bind="attrs" v-on="on">
                <v-icon small>{{ "fas fa-plus" }}</v-icon>
            </v-btn>
        </template>
        <v-card>
            <v-card-title>Agregar Trabajador</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <v-data-table v-model="trabajadorSelected" dense item-key="dni" show-select :items="trabajadores" :headers="headers" :search="trabajadorSearch" :single-select="true">
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
                <v-btn class="success" @click="save"><v-icon>{{ 'far fa-save' }}</v-icon></v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
    export default {
        props:['proyecto'],
        data(){
            return {
                dialog:false,
                trabajadorSearch:'',
                trabajadores:[],
                trabajadorSelected:[],
            }
        },
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
        watch:{
            dialog(val){
                if(!val)
                {
                    this.trabajadorSearch = ''
                    this.trabajadorSelected = []
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
                        if(trabajador.estado === 'DISPONIBLE' && !this.proyecto.trabajadores.some(asignado => asignado.dni === trabajador.dni))
                        {
                            this.trabajadores.push(trabajador)
                        }
                    })
                }).catch()
            },
            getPhoto(foto){
               return "storage/images/trabajadores/"+foto
            },
            save(){
                let formData = new FormData
                formData.append('proyecto',this.proyecto.id)
                formData.append('trabajador',this.trabajadorSelected[0].dni)
                axios.post('/proyecto-trabajador-agregar',formData).then(response=>{
                    swal("Trabajador agregado exitosamente!")
                    this.dialog = false
                    this.$emit('getData')
                })
            }
        }
    }
</script>