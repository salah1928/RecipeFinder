<template>
    
    <div>
       <div  id="navback">
            <a  href="/recipes">Back To All Recipes</a>
       </div>
        <div id="wrapper">
        <div id="card">
            <img :src="'/recipe_images/' + recipe.image" alt="recip image">
            <div id="body">
                <div id="chef">Chef: <span class="green">{{user.name}}</span></div>
                <div id="info">
                    <div class="green" id="title">
                        {{recipe.title}}
                    </div>
                    <div id="description">
                        {{recipe.description}}
                    </div>
                    <div id="ingredients">
                        {{recipe.ingredients}}
                    </div>
                </div>
                <div id="date">{{recipe.created_at}}</div>
            </div>
        </div><!--card-->
        <div id="steps">
            <div class="step" v-for="(step,index) in steps" :key="step.id">
                <div class="body">
                    <div class="header">
                        <p>Step {{index + 1}}:</p>
                        <h3 class="green">{{step.name}}</h3>
                    </div>
                    <p>{{step.description}}</p>
                </div>
                <img :src="'/step_images/' + step.image" alt="recip image">
            </div>
        </div><!--steps-->
        <div id="comments">
            <div id="inputPart">
                <div class="flexcenter" id="input">
                    <input class="green" v-model="cmnt" type="text">
                </div>
                <a class="green flexcenter" @click="comment">Comment</a>
            </div>
            <div class="comment" v-for="comment in reverseComments" :key="comment.id">
                <h4 class="green">{{comment.user}} |  {{comment.created_at}}</h4>
                    <p>{{comment.content}}</p>
            </div>
        </div><!--comments-->
    </div>
   </div>

</template>
<script>
export default {
    props:['user','recipe','comments','allow','steps'],
    data(){
        return{
            'image':`/recipe_images/${this.recipe.image}`,
            'cmnt':'',
            'cmnts':this.comments
        }
    },
    methods:{
         getcomments(){
            axios.get(`/comments/${this.recipe.id}`)
            .then(response=>this.cmnts = response.data.comments)
        },
        comment(){
            axios.post('/comment/create',{
                'content':this.cmnt,
                'recipeid':this.recipe.id
            })
            this.getcomments();
      
        },
        deleterecipe(){
            axios.get('/recipes/destroy/' + this.recipe.id);
            window.location.href = "/recipes";
        }
    },
    computed: {
    reverseComments() {
        return this.cmnts.slice().reverse();
  }     
}
}
</script>
<style scoped>
#navback{
    width: 100%;
    display: grid;
    align-items: center;
    justify-content: center;
    
}
#navback a{
        padding: 0.8rem 1.2rem;
    border-radius: 5px;
    background: white;
    color:inherit;
    }
</style>