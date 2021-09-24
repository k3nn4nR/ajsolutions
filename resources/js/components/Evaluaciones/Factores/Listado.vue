<template>
    <v-data-table :items="factores" :headers="headers" dense :search="search">
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>Factores</v-toolbar-title>
                <v-divider class="mx-4" inset vertical ></v-divider>
                <v-spacer/>
                <factor-create v-on:getData="getData()"/>
            </v-toolbar>
        </template>
        <template v-slot:item.acciones="{ item }">
            <v-btn small class="error" @click="destroy(item)"><v-icon small>{{ "fas fa-trash" }}</v-icon></v-btn>
        </template>
    </v-data-table>
</template>
<script>
    export default {
        data(){
            return {
                search:'',
                factores:[],
            };
        },
        mounted(){
            this.getData()
        },
        computed:{
            headers(){
                return [
                    {text:'Id',value:'id'},
                    {text:'Descripcion',value:'descripcion'},
                    {text:'Acciones',value:'acciones'},
                ];
            }
        },
        methods:{
            getData(){
                axios.get('/factores').then(response=>{this.factores=response.data}).catch()
            },
            destroy(item){
                swal({
                    title: "Eliminacion!",
                    text: "De sea eliminar: "+item.descripcion+"?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (!willDelete) return false
                    axios.delete('factor/'+item.id).then(response =>{
                        swal("Eliminacion del Factor exitoso!")
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