<template>
    <v-data-table :items="preguntas" :headers="headers" dense :search="search">
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>Preguntas</v-toolbar-title>
                <v-divider class="mx-4" inset vertical ></v-divider>
                <v-spacer/>
                <pregunta-create v-on:getData="getData()"/>
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
                preguntas:[],
            };
        },
        mounted(){
            this.getData()
        },
         computed:{
            headers(){
                return [
                    {text:'Id',value:'id'},
                    {text:'Pregunta',value:'descripcion'},
                    {text:'Evaluacion',value:'evaluacion.evaluacion'},
                    {text:'Factor',value:'factor.descripcion'},
                    {text:'Acciones',value:'acciones'},
                ];
            }
        },
        methods:{
            getData(){
                axios.get('/preguntas').then(response=>{this.preguntas=response.data}).catch()
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
                    axios.delete('pregunta/'+item.id).then(response =>{
                        swal("Eliminacion de la Pregunta exitosa!")
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