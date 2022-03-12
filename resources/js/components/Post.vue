<template>
    <div class="row justify-content-center ">
        <div class="col-md-8 px-3 shadow-lg mb-5 bg-light rounded">
            <div class="row p-3" id="card-title">
                <h1 class="col-12 text-center">{{post.title}}</h1>
                 <h4 class="col-12 text-right">Author: {{ post.author? post.author.name : ''}}</h4>
            </div>
            <div class="row justify-content-center bg-body-post p-md-3">
                <img class="col-md-10" v-if="post.cover" :src="'/storage/covers/' + post.cover" />
            </div>
            <div class="row bg-body-post">
                <p class="col-12 pt-md-1 p-md-5 p-1" id="body-post" v-html="post.body"></p>
            </div>
            <div class="row bg-body-post">
                <p class="col-12 p-md-5 p-1 text-center">
                    <strong>Tags</strong>
                        <ul class="tags">
                            <li v-for="tag in post.tags"> <router-link class="btn btn-info py-0 mx-1" :to="{path: '/posts/view/' + tag.id}"> {{ tag.name }} </router-link></li>
                        </ul>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id'],
        data() {
            return {
                post: {},
            }
        },
        methods: {
            getPost() {
                axios.get('/api/post/' + this.id).then(response => {
                    this.post = response.data;
                })
                .catch(response =>{
                    window.location.href = "/posts/view";
                });

            }
        },
        mounted() {
            this.getPost()
        }
    }
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Rubik:wght@300&display=swap');
    .tags{
        list-style: none;
    }

    .tags li{
        display: inline-block;
    }
    #card-title{
        background-color: #83c3ff;
        font-family: 'Libre+Baskerville';
        font-weight: bold;
    }
    #body-post{
        font-family: 'Rubik';
        font-size: 18pt;
    }

    .bg-body-post{
        background: #cef5ff;
    }

</style>