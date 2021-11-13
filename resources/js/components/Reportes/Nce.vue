<template>
    <v-card>
        <v-card-text>
            <v-row>
                <v-col>

                </v-col>
            </v-row>
        </v-card-text>
    </v-card>
</template>
<script>
    export default {
        data(){
            return {
            }
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/getNCE').then(response=>{})
            }
        }
    }
</script>