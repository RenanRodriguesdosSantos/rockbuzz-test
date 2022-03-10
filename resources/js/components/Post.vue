<template>
    <div>
        <div class="row">
            <h1 class="col-md-6">{{post.title}}</h1>
            <img class="col-md-6" v-if="post.capa" :src="'/storage/capas/' + post.capa" />
        </div>
        <p v-html="post.body"></p>
        tags:
            <ul class="tags">
                <li v-for="tag in post.tags">{{ tag.name }}</li>
            </ul>
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
