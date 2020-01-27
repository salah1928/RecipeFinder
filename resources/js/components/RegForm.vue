<template>
    <div>
    <div id="wrapper">
        <h3 class="bigfont gridcenter">Register Form</h3>
        <div id="profileshit">
            <div :style="'background-image: url(' + url + ');'" id="img" class="gridcenter">
                <button @click="$refs.image.click()" >Img</button>
                <input ref="image" @change="uploadImage" type="file" style="display:none" id="imginput">
            </div>
            <div id="profileinputs">
                <div class="input">
                    <label for="nameinput">Name:</label>
                    <input v-model="name" type="text" name="name" id="nameinput">
                </div>
                <div class="input">
                    <label for="cityinput">City:</label>
                    <input v-model="city" type="text" name="name" id="cityinput">
                </div>
                <div class="input">
                    <label for="genderinput">Gender:</label>
                    <input v-model="gender" type="text" name="name" id="genderinput">
                </div>
                <div id="birthday" class="input">
                    <label for="birthday">Birthday:</label>
                    <div id="bday">
                        <div>
                            <label for="day">Day</label>
                            <input v-model="bday" type="number">
                        </div>
                        <div>
                            <label for="day">Month</label>
                            <input v-model="bmonth" type="number">
                        </div>
                        <div>
                            <label for="day">Year</label>
                            <input v-model="byear" type="number">
                        </div>
                       
                    </div>
                </div>
            </div>
            <div id="biosection">
                <div class="input">
                    <label for="bioinput">Bio:</label>
                    <input type="text" v-model="bio" name="name" id="bioinput">
                </div>
            </div>
        </div>
        <div id="authshit">
            <div class="input">
                <label for="emailinput">Email:</label>
                <input type="text" v-model="email" name="name" id="emailinput">
            </div>
            <div class="input">
                <label for="passwordinput">Password:</label>
                <input type="text" v-model="password" name="name" id="passwordinput">
            </div>
            <div class="input">
                <label for="passwordconfirm">Confirm Password:</label>
                <input type="text" v-model="passwordconfirmation" name="name" id="passwordconfirm">
            </div>
        </div>
        <div id="btn" class="bigfont gridcenter">
            <a @click.prevent="senddata()" href="#">Create Account</a>
        </div>
    </div>
</div>
</template>
<script>
export default {
    data(){
        return {
            'name':'',
            'email':'',
            'password':'',
            'passwordconfirmation':'',
            'image':'',
            'imgname':'',
            'city':'',
            'bday':'',
            'bmonth':'',
            'byear':'',
            'bio':'',
            'gender':'',
            url:'',
        }
    },
    methods:{
        senddata(){
            axios.post('/register',{
                'name':this.name,
                'email':this.email,
                'password':this.password,
                'image':this.image,
                'city':this.city,
                'birthday':this.bday +':'+ this.bmonth +':'+ this.byear,
                'bio':this.bio,
                'gender':this.gender,
                'password_confirmation':this.passwordconfirmation,
                'imgname':this.imgname
            }).then(response=>{
                if(response.status == 200){
                    window.location.href = '/recipes'
                }
            })
        },
        uploadImage(e){
            let file = this.$refs.image.files[0];
            this.imgname = file.name;
            this.url = URL.createObjectURL( file);
            var fileReader = new FileReader();
            fileReader.readAsDataURL( file)
                fileReader.onload = (e)=>{
                this.image = e.target.result
            }
        },
        fbday(){
            console.log(this.bday +':'+ this.bmonth +':'+ this.byear)
        }
    }
}
</script>