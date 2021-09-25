<template>
    <v-list>
        <v-list-item v-for="[icon, text, url] in links" :key="icon" link >
            <v-list-item-icon>
                <v-icon>{{ icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-content @click="page(url)">
                <v-list-item-title>{{ text }}</v-list-item-title>
            </v-list-item-content>
        </v-list-item>
    </v-list>
</template>

<script>
    export default {
        props:['roles','permissions'],
        data: () => ({
            cards: ['Today', 'Yesterday'],
            links: [
                ['fas fa-home', 'Inicio','/home'],
                ['fas fa-hard-hat', 'Trabajadores','/trabajador'],
                ['fas fa-puzzle-piece', 'Evaluaciones','/evaluacion'],
                ['fas fa-project-diagram', 'Proyectos','/proyecto'],
                ['far fa-object-group', 'Grupos','/grupostrabajo'],
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