<template>

    <v-card>
        <v-toolbar color="cyan" dark flat >
            <template v-slot:extension>
                <v-tabs v-model="model" centered slider-color="yellow" >
                    <v-tab :href="`#tab-1`" >
                        Trabajadores Activos
                    </v-tab>
                      <v-tab :href="`#tab-2`" >
                        Trabajadores Eliminados
                    </v-tab>
                </v-tabs>
            </template>
        </v-toolbar>

        <v-tabs-items v-model="model">
            <v-tab-item :value="`tab-1`" >
                <v-card flat>
                    <v-card-text>
                        <v-data-table :items="trabajadores" :headers="headers" dense :search="search">
                            <template v-slot:top>
                                <v-toolbar flat>
                                    <v-toolbar-title>Trabajadores</v-toolbar-title>
                                    <v-divider class="mx-4" inset vertical ></v-divider>
                                    <v-text-field v-model="search" label="Busqueda" dense />
                                    <v-divider class="mx-4" inset vertical ></v-divider>
                                    <trabajador-create v-on:getData="getData()"/>
                                </v-toolbar>
                            </template>
                            <template v-slot:item.photo="{ item }">
                                <v-img :src="getPhoto(item.photo)" max-height="50" max-width="70" ></v-img>
                            </template>
                            <template v-slot:item.acciones="{ item }">
                                <v-btn small class="error" @click="destroy(item)"><v-icon small>{{ "fas fa-trash" }}</v-icon></v-btn>
                            </template>
                        </v-data-table>
                    </v-card-text>
                </v-card>
            </v-tab-item>
             <v-tab-item :value="`tab-2`" >
                <v-card flat>
                    <v-card-text>
                        <trabajadores-eliminados/>
                    </v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs-items>
    </v-card>
</template>
<script>
    import TrabajadoresEliminados from '../Trabajadores/Trashed.vue'
    export default {
        components:{
            TrabajadoresEliminados,
        },
        data(){
            return {
                model: 'tab-1',
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
                axios.get('/trabajadores').then(response=>{this.trabajadores=response.data}).catch()
            },
            destroy(item){
                swal({
                    title: "Eliminacion!",
                    text: "De sea eliminar a: "+item.ape_paterno+" "+item.ape_materno+" "+item.nombres+"?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (!willDelete) return false
                    axios.delete('/trabajador/'+item.dni).then(response =>{
                        swal("Eliminacion del Trabajador exitosa!")
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
            getPhoto(foto){
               return "storage/images/trabajadores/"+foto
            },
        },
    }
</script>