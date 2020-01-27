<template>
    <div>
        <div v-for="user in users" :key="user.id">
            {{user.name}}
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            users : [],
        }
    },
     created(){
            axios.get('./alluser')
            .then(response => this.users = response.data);
        }
}
</script>