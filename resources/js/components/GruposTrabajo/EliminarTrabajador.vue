<template>
    <v-dialog v-model="dialog" max-width="600px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="error" dark class="mb-2" v-bind="attrs" v-on="on">
                <v-icon small>{{ "fas fa-trash" }}</v-icon>
            </v-btn>
        </template>
        <v-card>
            <v-card-title>Eliminacion Trabajador</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col>
                        <v-text-field v-model="comentario" label="Comentario" dense/>
                    </v-col>
                </v-row>
            </v-card-text>
            <v-card-actions>
                <v-btn class="error" @click="dialog=false"><v-icon>{{ 'fas fa-ban' }}</v-icon></v-btn>
                <v-btn class="success" @click="destroy"><v-icon>{{ 'far fa-save' }}</v-icon></v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
    export default {
        props:['proyecto','trabajador'],
        data(){
            return {
                dialog:false,
                comentario:'',
            };
        },
        watch:{
            dialog(val){
                if(!val)
                {
                    this.comentario = ''
                }
            }
        },
        methods:{
            destroy(item){
                swal({
                    title: "Eliminacion!",
                    text: "De sea eliminar a: "+this.trabajador.ape_paterno+" "+this.trabajador.ape_materno+" "+this.trabajador.nombres+" del proyecto: "+this.proyecto.Descripción+"?",
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
                    axios.post('/proyecto-trabajador-delete',formData).then(response =>{
                        swal("Eliminacion del Trabajador exitosa!")
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
            },
        }
    }
</script>