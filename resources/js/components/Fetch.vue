<template>
    <div>
        <input v-model="word" type="text">
        <button @click='update' type="submit"></button>
        {{stuff}}
    </div>
</template>
<script>
export default {
    methods:{
        update(){
         axios.post('./text/',{
            id:this.word,
        })
        .then(response=>this.stuff = response.data)
    }
    },
    data(){
        return{
            stuff:[],
            word:'',
            
        }
    },
    mounted(){
       this.update()
    },
}
</script>