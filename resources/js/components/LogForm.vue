<template>
<div>
    <div id="wrapper">
        <h3 class="gridcenter">Login</h3>
        <div id="inputs" class="gridcenter">
            <div class="input">
                <label for="emailinput">Email:</label>
                <input type="text" v-model="email" name="name" id="emailinput">
            </div>
            <div class="input">
                <label for="passwordinput">Password:</label>
                <input type="text" v-model="password" name="name" id="passwordinput">
            </div>
        </div>
        <div id="btn" class="gridcenter">
            <a @click.prevent='senddata' href="#">Login</a>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            'email':'',
            'password':'',
        }
    },
    methods:{
        senddata(){
            axios.post('/login',{
                'email':this.email,
                'password':this.password
            }).then(response=>{
                if(response.status == 200){
                    window.location.href = '/recipes'
                }
            })
        }
    }
}
</script>