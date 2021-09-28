<template>
    <v-dialog v-model="dialog" max-width="600px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="warning" dark class="mb-2" v-bind="attrs" v-on="on">
                <v-icon small>{{ "fas fa-tools" }}</v-icon>
            </v-btn>
        </template>
        <v-card>
            <v-card-title>Reemplazar Trabajador</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <v-text-field v-model="comentario" label="Comentario" dense/>
                    </v-col>
                </v-row>
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
        props:['proyecto','trabajador'],
        data(){
            return {
                trabajadorSearch:'',
                dialog:false,
                comentario:'',
                trabajadores:[],
                trabajadorSelected:[],
            };
        },
        watch:{
            dialog(val){
                if(!val)
                {
                    this.comentario = ''
                    this.trabajadorSearch = ''
                    this.trabajadorSelected = []
                }
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
                ];
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
            save(){
                if(this.trabajadorSelected.length == 1)
                {
                    swal({
                        title: "Reemplazo!",
                        text: "De sea cambiar a: "+this.trabajador.ape_paterno+" "+this.trabajador.ape_materno+" "+this.trabajador.nombres+" del proyecto: "+this.proyecto.Descripción+" por "+this.trabajadorSelected[0].ape_paterno+" "+this.trabajadorSelected[0].ape_materno+" "+this.trabajadorSelected[0].nombres+"?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (!willDelete) return false
                        let formData = new FormData
                        formData.append("proyecto",this.proyecto.id)
                        formData.append("trabajador",this.trabajador.dni)
                        formData.append("comentario",this.comentario)
                        formData.append("reemplazo",this.trabajadorSelected[0].dni)
                        axios.post('/proyecto-trabajador-reemplazar',formData).then(response =>{
                            swal("Reemplazo del Trabajador exitosa!")
                            this.dialog = false
                            this.$emit('getData')
                        }).catch(error =>{
                            var texto="";
                            for (var property in error.response.data.errors){
                                texto = texto + error.response.data.errors[property]+'\n';
                            }
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            });
                            Toast.fire({
                                icon: 'warning',
                                title : texto
                            })
                        })
                    })
                }else{
                    swal("Elija un trabajador!")
                }
            },
            getPhoto(foto){
               return "storage/images/trabajadores/"+foto
            },
        }
    }
</script>