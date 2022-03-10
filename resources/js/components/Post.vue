<template>
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-lg p-3 mb-5 bg-body rounded">
            <div class="row justify-content-center">
                <h1 class="text-center mb-3 fs-1">{{post.title}}</h1>
            </div>
            <div class="row justify-content-center">
                <img class="col-md-10" v-if="post.capa" :src="'/storage/capas/' + post.capa" />
            </div>
            <div class="row justify-content-end pt-md-5 px-md-5 p-1">
                 <h3>Autor: {{post.autor}}</h3>
            </div>
            <div class="row">
                <p class="col-12 pt-md-1 p-md-5 p-1" v-html="post.body"></p>
            </div>
            <div class="row">
                <p class="col-12 p-md-5 p-1">
                    <strong>Tags:</strong>
                        <ul class="tags">
                            <li v-for="tag in post.tags">{{ tag.name }}</li>
                        </ul>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                post: {},
            }
        },
        methods: {
            getPost() {
                let currentRoute = window.location.pathname;
                let id = currentRoute.split("id=")[1];
                axios.get('/api/post/' + id).then(response => {
                    this.post = response.data;
                })
                .catch(response =>{
                    window.location.href = "/";
                });

            }
        },
        mounted() {
            this.getPost()
        }
    }
</script>
<style>
    .tags{
        list-style: none;
        display: inline;
    }

    .tags li{
        display: inline-block;
        background: #8cc7ff;
        padding: 0 10px 0 10px;
        margin: 2px;
    }
</style>