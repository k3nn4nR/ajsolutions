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
                ['fas fa-project-diagram', 'Proyectos',''],
                ['fas fa-puzzle-piece', 'Evaluaciones',''],
                ['fas fa-chart-bar', 'Reportes',''],
                ['fas fa-users', 'Usuarios',''],
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
                                ['mdi-inbox-arrow-down', 'Inicio'],
                                ['mdi-send', 'Trabajadores'],
                                ['mdi-delete', 'Proyectos'],
                                ['mdi-delete', 'Evaluaciones'],
                                ['mdi-alert-octagon', 'Reporte de Proyectos'],
                                ['mdi-alert-octagon', 'Reporte de Trabajadores'],
                            )
                        }
                    });
                }
            },
            page(url){
                window.location.href = url;
            }
        }
    }
</script>