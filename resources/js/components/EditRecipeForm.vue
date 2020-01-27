<template>
<div>

<div class="row">
    <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Title</strong>
            <input v-model="title" type="text" name="title" class="form-control" placeholder="Enter Title">
        </div>
    </div>
    
    <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Ingredients</strong>
            <input type="text" v-model="ingredients" class="form-control" col="4" name="ingredients" placeholder="Enter ing"></input>
        </div>
    </div>
    <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Description</strong>
            <input type="text" v-model="description" class="form-control" col="4" name="description" placeholder="Enter Description"></input>
        </div>
    </div>
    <div class="col-md-7 m-auto">
        <strong>Recipe Img</strong>
        <input @change="uploadImage"  class="col-md-7 m-auto" ref="image" name="image" type="file">
    </div>
  
   <div v-for="(step , index) in steps" :key="step.id">
         <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Step {{index}}</strong>
            <input v-model="step.name" type="text" name="stepN" class="form-control" placeholder="Enter step name">
        </div>
      </div>
    
      <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Step desc</strong>
            <input v-model="step.description" type="text" name="stepD" class="form-control" placeholder="Enter step description">
        </div>
      </div>

      <div class="col-md-7 m-auto">
        <strong>{{index}}</strong>
        <input @change="uploadImageS($event,index)"  class="col-md-7 m-auto" name="image" type="file">
      </div>

    </div>
  <button class="col-md-7 m-auto" @click="addstep()">Add Step</button>
    <button class="col-md-7 m-auto" @click="senddata()">Submit</button>

</div>

</div>
</template>
<script>

export default {
  props:["recipe","stepes"],
 
    data(){
      return{
        cre:null,
        mn:null,
        title:this.recipe.title,
        description:this.recipe.description,
        ingredients:this.recipe.ingredients,
        image:"",
        imagename:"",
        oldimage:this.recipe.image,
        steps:this.stepes
      }
    },
    methods:{
      uploadImageS(e,index){
      let step = this.steps[index];
  
      step.imagename = e.target.files[0].name;
  
      var filereeder = new FileReader();
      filereeder.readAsDataURL(e.target.files[0]);

      filereeder.onload = (e) => {
        step.newimage = e.target.result
      }

      },
      uploadImage(e){

       this.imgname = this.$refs.image.files[0].name;
        

        var fileReader = new FileReader();
        
        fileReader.readAsDataURL( this.$refs.image.files[0])

          fileReader.onload = (e)=>{
            this.image = e.target.result
          }
        
       
      }
      ,
      addstep(){
        this.steps.push({
          name:'',
          description:'',
          image:''
        })
      },
     senddata(){

      
      axios.patch(`/recipes/update/${this.recipe.id}`,{
        'title':this.title,
        'image':this.image,
        'description':this.description,
        'ingredients':this.ingredients,
        'steps':this.steps,
        'imgname':this.imgname,
      }
      ).then(response=>console.log(response.data))
    },
    
  }
}
</script>