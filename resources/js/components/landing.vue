<template>
   <div>
        <div id="mainpage">
        <div id="wrapper">
            <div id="container">
                <div id="txt">
                    <h3>You Hungry?</h3>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic distinctio omnis obcaecati. Amet, illum fugit.
                    </p>
                </div>
                <div id="btn">
                    <a href="/register">Join Now</a>
                </div>
            </div>
        </div>
    </div><!--mainpage-->
    <div id="bnfs">
        <div class="bnf">
            <div class="txt">
                <h4>Why Us?</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur dolorum voluptates quis sequi, ut architecto est, officia facere officiis laborum iste accusantium obcaecati natus voluptatum, cumque nihil temporibus nisi. Magnam.</p>
            </div>
            <img src="/landing/plate.jpg" alt="">
        </div>
        <div class="bnf">
            <img src="/landing/plate2.jpg" alt="">
            <div class="txt">
                <h4>Free</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur dolorum voluptates quis sequi, ut architecto est, officia facere officiis laborum iste accusantium obcaecati natus voluptatum, cumque nihil temporibus nisi. Magnam.</p>
            </div>
        </div>
        <div class="bnf">
            <div class="txt">
                <h4>Easy</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur dolorum voluptates quis sequi, ut architecto est, officia facere officiis laborum iste accusantium obcaecati natus voluptatum, cumque nihil temporibus nisi. Magnam.</p>
            </div>
            <img src="/landing/plate3.jpg" alt="">
        </div>
    </div><!--bnfs-->
   <div id="exps">
       <h3>Latest Recipes</h3>
        <div id="examples">
        <div class="ex"  v-for="recipe in recipes" :key="recipe.id">
            <img src="/landing/plate.jpg" alt="">
            <div class="body">
                <div class="a">
                    <div class="name">{{recipe.title}}</div>
                    <p>
                        {{recipe.description}}<br/>
                        {{recipe.created_at}}
                    </p>
                </div>
                <div>
                    <a :href="'/recipes/show/' + recipe.id"><div class="btn">
                    <a :href="'/recipes/show/' + recipe.id">More</a>
                </div></a>
                </div>
            </div>
        </div>
   </div>
     <div id="expbtn"><a href="/recipes">See More</a></div>
    </div><!--examples-->
    <div id="txtbtm">
        <p>Get access to more than <span>1928</span> recipes</p>
        <p>Find the most <span>healthy</span> meal plans</p>
        <p>Join more than <span>8291</span> users</p>
    </div><!--txtbtm-->
    <div id="cta">
        <div id="ctxt">All you need to start is an account</div>
        <div id="cbtn"><a href="/register">Join</a></div>
    </div><!--cta-->
    <footer>
        <h4>Recipe Finder</h4>
        <ul>
            <li><a href="#bnfs">About</a></li>
            <li><a href="/recipes">Recipes</a></li>
            <li><a href="/register">Register</a></li>
            <li><a href="/login">Login</a></li>
        </ul>
        <h6>Recipe Finder  2020</h6>
    </footer>
   </div>

</template>
<script>
export default {
    props:['recipes']
}
</script>
<style>
@import '/css/landing.css';
</style>