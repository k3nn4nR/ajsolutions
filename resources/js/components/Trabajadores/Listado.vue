<template>
    <div>
        {{trabajadores}}
    </div>
</template>
<script>
    export default {
        data(){
            return {
                trabajadores:[],
            };
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                //axios.get('/trabajdores').then(response=>{this.trabajadores=response.data}).catch()
            }
        },
    }
</script>