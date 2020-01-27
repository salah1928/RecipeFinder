<template>
<div>

<div id="wrapper">
        <div id="card">
            <div :style="'background-image: url(' + url + ');'" class="gridcenter" id="img">
                <button @click="$refs.image.click()" >Img</button>
                <input @change="uploadImage" ref="image" style="display:none"  type="file" name="image" id="image">
            </div>
            <div id="body">
                <div  class="forminput">
                    <label for="title">Recipe Title</label>
                    <input v-model="title" type="text" id="title">
                </div >
                <div class="forminput">
                    <label for="ingredients">ingredients</label>
                    <input v-model="ingredients" type="text" id="ingredients">
                </div >
                <div class="forminput">
                    <label for="description">description</label>
                    <textarea v-model="description" name="" id="description" ></textarea>
                </div>
            </div>
        </div>

        <div id="steps">
            <h1>STEPS</h1>
            <!-- <div v-for="(step , index) in this.steps" :key="step.id" class="steps gridcenter">
                <div class="form">
                    <div class="name">
                        <label class="green" for="name">Name</label>
                        <input v-model="step.name" type="text">
                    </div>
                    <div class="desc">
                        <textarea v-model="step.desc" name="" class=""></textarea>
                    </div>
                </div>
                <div :style="'background-image: url(' + step.url + ');'"  class="img gridcenter">
                    <input style="display:none" @change="uploadImageS($event,index)" ref="lol" type="file" name="" id="">
                    <button @click="$refs.lol[index].click()" >Img</button>
                </div>
                <button @click='movesteps(index,index-1)'>Move Up</button>
                <button @click='movesteps(index,index+1)'>Move Down</button>
             </div>steps -->
              <draggable v-model="steps" @start="drag=true" @end="drag=false">
          <div v-for="(step , index) in this.steps" :key="step.id" class="steps gridcenter">
                <div class="form">
                    <div class="name">
                        <label class="green" for="name">Name</label>
                        <input v-model="step.name" type="text">
                    </div>
                    <div class="desc">
                        <textarea v-model="step.desc" name="" class=""></textarea>
                    </div>
                </div>
                <div :style="'background-image: url(' + step.url + ');'"  class="img gridcenter">
                    <input style="display:none" @change="uploadImageS($event,index)" ref="lol" type="file" name="" id="">
                    <button @click="$refs.lol[index].click()" >Img</button>
                </div>
                <button @click='movesteps(index,index-1)'>Move Up</button>
                <button @click='movesteps(index,index+1)'>Move Down</button>
             </div><!--steps-->
        </draggable>
             <div @click="addstep" class="btn gridcenter"><p>+</p></div>
             <div  @click="senddata()" class="btn gridcenter" id="submit">Create!</div>
        </div>


       
    </div>

</div>
</template>
<script>
import draggable from 'vuedraggable'
export default {
    components: {
            draggable,
        },
    data(){
      return{
        title:'',
        url:'',
        image:'',
        ingredients:'',
        description:'',
        imgname:'',
        steps:[{
          name:'',
          desc:'',
          image:'',
          imagename:'',
          url:'',
        }]
      }
    },
    methods:{
       movesteps (from, to) {
        this.steps.splice(to, 0, this.steps.splice(from, 1)[0]);
      },
      uploadImageS(e,index){
      let step = this.steps[index];
      let file = e.target.files[0];
      step.imagename = file.name;
      step.url = URL.createObjectURL( file);
      var filereeder = new FileReader();
      filereeder.readAsDataURL(file);

      filereeder.onload = (e) => {
        step.image = e.target.result
      }

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
        
       
      }
      ,
      addstep(){
        this.steps.push({
          name:'',
          desc:'',
          image:'',
          imagename:'',
          url:'',
        })
      },
    senddata(){

      
      axios.post('/recipes/store/',{
        'title':this.title,
        'image':this.image,
        'description':this.description,
        'ingredients':this.ingredients,
        'steps':this.steps,
        'imgname':this.imgname,
      }
      ).then(response=>{if(response.status == 200){
        window.location.href = `/recipes/show/${response.data}`
      }})
    }
  }
}
</script>