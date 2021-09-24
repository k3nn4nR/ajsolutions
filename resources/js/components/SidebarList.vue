<template>
    <v-list>
        <v-list-item v-for="[icon, text, url] in links" :key="icon" link >
            <v-list-item-icon>
                <v-icon>{{ icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
                <v-list-item-title @click="page(url)" >{{ text }}</v-list-item-title>
            </v-list-item-content>
        </v-list-item>
    </v-list>
</template>

<script>
    export default {
        props:['user','roles','permissions'],
        data: () => ({
            cards: ['Today', 'Yesterday'],
            links: [
                ['fas fa-home', 'Inicio','/home'],
                ['fas fa-hard-hat', 'Trabajadores','/trabajador'],
<<<<<<< HEAD
                ['fas fa-project-diagram', 'Proyectos',''],
                ['fas fa-puzzle-piece', 'Evaluaciones','/evaluacion'],
=======
                ['fas fa-project-diagram', 'Proyectos','/proyecto'],
                ['fas fa-puzzle-piece', 'Evaluaciones',''],
>>>>>>> master
                ['fas fa-chart-bar', 'Reportes',''],
                ['fas fa-cog', 'Configuracion','/sistema'],
                ['fas fa-power-off', 'Cerrar Sesion',''],
            ],
        }),
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                if(this.roles)
                {
                    this.roles.forEach(role => {
                        if(role.name)
                        {
                            this.links.push(
                                ['fas fa-home', 'Inicio','/home'],
                                ['fas fa-hard-hat', 'Trabajadores','/trabajador'],
                                ['fas fa-project-diagram', 'Proyectos',''],
                                ['fas fa-puzzle-piece', 'Evaluaciones',''],
                                ['fas fa-chart-bar', 'Reportes',''],
                                ['fas fa-users', 'Usuarios',''],
                                ['fas fa-power-off', 'Cerrar Sesion',''],
                            )
                        }
                    });
                }
            },
            page(url){
                window.location.href = url;
            },
        }
    }
</script>