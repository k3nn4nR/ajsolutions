<template>
    <v-data-table :items="proyectos" :headers="headers" dense :search="search">
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>Proyectos</v-toolbar-title>
                <v-divider class="mx-4" inset vertical ></v-divider>
                <v-text-field v-model="search" label="Busqueda" dense />
                <v-divider class="mx-4" inset vertical ></v-divider>
                <proyectos-create v-on:getData="getData()"/>
            </v-toolbar>
        </template>
        <template v-slot:item.acciones="{ item }">
            <v-btn small class="success" @click="finish(item)"><v-icon small>{{ "fas fa-check" }}</v-icon></v-btn>
            <v-btn small class="error" @click="destroy(item)"><v-icon small>{{ "fas fa-trash" }}</v-icon></v-btn>
        </template>
    </v-data-table>
</template>
<script>
    export default {
        data(){
            return {
                search:'',
                proyectos:[],
            };
        },
        computed:{
            headers(){
                return [
                    {text:'Nombre',value:'Descripción'},
                    {text:'Empresa',value:'Empresa'},
                    {text:'Estado',value:'Estado'},
                    {text:'Fecha de inicio',value:'started_at'},
                    {text:'Fecha de entrega',value:'ended_at'},
                    {text:'',value:'acciones'},
                ];
            }
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/proyectos').then(response=>{this.proyectos = response.data})
            },
            destroy(item){
                swal({
                    title: "Eliminacion!",
                    text: "De sea eliminar: "+item.Descripción+"?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (!willDelete) return false
                    axios.delete('/proyecto/'+item.id).then(response =>{
                        swal("Eliminacion del Proyecto exitoso!")
                        this.getData()
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
            finish(item){
                swal({
                    title: "Finalizacion!",
                    text: "De sea eliminar: "+item.Descripción+"?",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (!willDelete) return false
                    let formData = new FormData
                    formData.append('proyecto',item.id)
                    axios.post('/proyecto-finalizar',formData).then(response =>{
                        swal("Proyecto finalizado exitosamente!")
                        this.getData()
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
        },
    }
</script>