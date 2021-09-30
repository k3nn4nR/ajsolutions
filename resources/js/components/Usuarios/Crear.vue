<template>
    <v-dialog v-model="dialog" max-width="700px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                Registrar Usuario
            </v-btn>
        </template>
        <v-card>
            <v-card-title>Creacion Usuario</v-card-title>
            <v-card-text>
                 <v-row>
                     <v-col>
                         <v-text-field v-model="email" label="Email" dense />
                     </v-col>
                    <v-col>
                        <v-text-field :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'" :type="show2 ? 'text' : 'password'" label="Visible" v-model="password" class="input-group--focused" dense @click:append="show2 = !show2"/>
                    </v-col>
                    <v-col>
                        <v-text-field v-model="verify_password" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :type="show1 ? 'text' : 'password'" label="Verificar contraseña" dense @click:append="show1 = !show1"/>
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
                email:'',
                password:'',
                verify_password:'',
                show1: false,
                show2: false,
                trabajadores:[],
                trabajadorSelected:[],
                trabajadorSearch:'',
            }
        },
        watch:{
            dialog(val){
                if(!val){
                    this.trabajadorSearch = ''
                    this.proyectoSearch = ''
                    this.proyectoSelected = []
                    this.trabajadorSelected = []
                    this.email = ''
                    this.proyectos = []
                    this.password = ''
                    this.verify_password = ''
                    this.show1 = false
                    this.show2 = false
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
            },
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/trabajadores').then(response=>{
                    this.trabajadores = []
                    response.data.forEach(trabajador => {
                        if(trabajador.user_id == null)
                            this.trabajadores.push(trabajador)
                    });
                })
            },
            getPhoto(foto){
               return "storage/images/trabajadores/"+foto
            },
            store(){
                if(this.password === this.verify_password)
                {
                    if(this.trabajadorSelected.length == 1)
                    {
                        let formData = new FormData
                        formData.append('email',this.email)
                        formData.append('password',this.password)
                        formData.append('trabajador',this.trabajadorSelected[0].dni)
                        axios.post('/usuario',formData).then(response=>{
                            swal("Correcto!", "Usuario registrado exitosamente", "success");
                            this.dialog = false
                            this.getData()
                            this.$emit('getData')
                        })
                    }else{
                        swal("Error!","Elija un trabajador!","error")
                    }
                }else{
                    swal("Error!","Contraseña no coincide","error")
                }
            }
        }
    }
</script>