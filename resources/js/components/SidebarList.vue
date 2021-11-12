<template>
    <v-list>
        <v-list-item v-for="[icon, text, url] in links" :key="icon" link>
            <v-list-item-icon>
                <v-icon>{{ icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-content @click="page(url)">
                <v-list-item-title >{{ text }}</v-list-item-title>
            </v-list-item-content>
        </v-list-item>
    </v-list>
</template>

<script>
    export default {
        props:['roles','permissions'],
        data: () => ({
            cards: ['Today', 'Yesterday'],
            links: [],
        }),
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                if(this.roles)
                {
                    if(this.roles.some(role => role.name === "Administrador") === true){
                        this.links.push(
                            ['fas fa-home', 'Inicio','/home'],
                            ['fas fa-hard-hat', 'Trabajadores','/trabajador'],
                            ['fas fa-puzzle-piece', 'Evaluaciones','/evaluacion'],
                            ['fas fa-clipboard-list', 'Tests','/tests'],
                            ['fas fa-project-diagram', 'Proyectos','/proyecto'],
                            ['far fa-object-group', 'Grupos','/grupostrabajo'],
                            ['fas fa-chart-bar', 'Reportes','/reportes'],
                            ['fas fa-cog', 'Configuracion','/sistema'],
                        )
                    }
                    if(this.roles.some(role => role.name === "Supervisor") === true){
                        this.links.push(
                            ['fas fa-home', 'Inicio','/home'],
                            ['fas fa-puzzle-piece', 'Evaluaciones','/evaluacion'],
                            ['fas fa-clipboard-list', 'Tests','/tests'],
                            ['fas fa-project-diagram', 'Proyectos','/proyecto'],
                            ['far fa-object-group', 'Grupos','/grupostrabajo'],
                            ['fas fa-chart-bar', 'Reportes','/reportes'],
                        )
                    }
                    if(this.roles.some(role => role.name === "Trabajador") === true){
                        this.links.push(
                            ['fas fa-home', 'Inicio','/home'],
                            ['fas fa-clipboard-list', 'Tests','/tests'],
                            ['far fa-object-group', 'Grupos','/grupostrabajo'],
                        )
                    }
                }
                this.links.push(['fas fa-power-off', 'Cerrar Sesion','/logout'])
            },
            page(url){
                if(url != "/logout")
                {
                    window.location.href = url;
                }else{
                    axios.post('/logout').then(response=>{ window.location.href = "/"})
                }
            },
        }
    }
</script>