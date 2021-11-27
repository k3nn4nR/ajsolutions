<template>
    <v-data-table :items="trabajadores" :headers="headers" dense :search="search">
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>Trabajadores</v-toolbar-title>
                <v-divider class="mx-4" inset vertical ></v-divider>
                <v-text-field v-model="search" label="Busqueda" dense />
                <v-divider class="mx-4" inset vertical ></v-divider>
            </v-toolbar>
        </template>
        <template v-slot:item.photo="{ item }">
            <v-img :src="getPhoto(item.photo)" max-height="50" max-width="70" ></v-img>
        </template>
        <template v-slot:item.acciones="{ item }">
            <v-btn small class="success" @click="restore(item)"><v-icon small>{{ "fas fa-trash-restore" }}</v-icon></v-btn>
        </template>
    </v-data-table>
</template>
<script>
    export default {
        data(){
            return {
                search:'',
                trabajadores:[],
            };
        },
        computed:{
            headers(){
                return [
                    {text:'',value:'photo'},
                    {text:'DNI',value:'dni'},
                    {text:'Apellido Paterno',value:'ape_paterno'},
                    {text:'Apellido Materno',value:'ape_materno'},
                    {text:'Nombres',value:'nombres'},
                    {text:'Direccion',value:'direccion'},
                    {text:'Celular',value:'celular'},
                    {text:'Estado',value:'estado'},
                    {text:'',value:'acciones'},
                ];
            }
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/trabajadores-trashed').then(response=>{this.trabajadores=response.data}).catch()
            },
            restore(item){
                swal({
                    title: "Restauracion!",
                    text: "De sea restaurar a: "+item.ape_paterno+" "+item.ape_materno+" "+item.nombres+"?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (!willDelete) return false
                    let formData = new FormData
                    formData.append('id',item.dni)
                    axios.post('/trabajador-restore',formData).then(response =>{
                        swal("Restauracion del Trabajador exitosa!")
                        location.reload(1000)
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
            getPhoto(foto){
               return "storage/images/trabajadores/"+foto
            },
        },
    }
</script>