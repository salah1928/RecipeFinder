<template>
    <div>
        <div id="wrapper">
        <div id="SnP"><!--Search and Post part-->
            <div id="Spart">
               <div id="inner">
                <input type="text" @change="searchF" v-model="search" placeholder="what do you feel like eating...">
                <div id="icons">
                    <i @click="searchF" class="green fas fa-search"></i>
                    <i class="green fas fa-sliders-h"></i>
                </div>
               </div>
            </div>
            <div id="Ppart">
                <a class="green" href="/recipes/create">
                <span>or</span>Post
                </a>
            </div>
        </div><!--end snp-->
        <div id="RP"><!--Recipe part-->
            <div id="Rec" v-for="recipe in this.recipes.data" :key="recipe.id"><!--recipe-->
               <a :href="'/recipes/show/' + recipe.id" >
                    <img :src="'/recipe_images/' + recipe.image" alt="recip image">
                    <h5 class="green">{{recipe.title}}</h5>
               </a>
            </div><!--end recipe-->

        </div><!--end rp-->
            <div id="pagination">
                <pagination :data="recipes" @pagination-change-page="getrecipes"></pagination>
            </div>
    </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            recipes:{},
            search:"",
        }
    },
    methods:{
        getusers(){
            axios.get('/recipes/all').then(res=>this.recipes = res.data.recipes);
        },
        getrecipes(page = 1) {
			axios.get('recipes/all?page=' + page)
				.then(response => {
                    this.recipes = response.data.recipes;
                    window.scrollTo({top:0,behavior:'smooth'});
				});
        },
        searchF(){
            axios.get('recipes/search/' + this.search).then(r=>this.recipes = r.data)
        }
    },
    created(){
        this.getusers()
    }
}
</script>