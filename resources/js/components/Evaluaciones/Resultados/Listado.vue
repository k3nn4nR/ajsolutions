<template>
    <v-data-table :items="evaluaciones" :headers="headers" dense :search="search">
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>Resultados</v-toolbar-title>
                <v-divider class="mx-4" inset vertical ></v-divider>
                <v-spacer/>
                <evaluacion-create v-on:getData="getData()"/>
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
                resultados:[],
            };
        },
        mounted(){
            this.getData()
        },
        computed:{
            headers(){
                return [
                    {text:'Id',value:'id'},
                    {text:'Resultado',value:'resultado'},
                    {text:'Acciones',value:'acciones'},
                ];
            }
        },
        methods:{
            getData(){
                axios.get('/resultados').then(response=>{this.resultados=response.data}).catch()
            },
            destroy(item){
                swal({
                    title: "Eliminacion!",
                    text: "De sea eliminar: "+item.resultado+"?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (!willDelete) return false
                    axios.delete('/resultado/'+item.id).then(response =>{
                        swal("Eliminacion de la Evaluacion exitosa!")
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