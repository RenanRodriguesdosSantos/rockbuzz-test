<template>
    <div>
        <div class="row justify-content-center">
            <div v-for="post in posts" class="col-md-3 m-3">
                <div class="border border-info card h-100">
                    <img :src="'/storage/capas/' + (post.capa ? post.capa : 'default.jpg')" class="card-img-top h-100" alt="Capa do Post">
                    <div class="card-body">
                        <h6 class="text-center">{{post.title}}</h6>
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-success col-12" v-bind:href="'post/id=' + post.id">Acessar post</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div>
                <ul class="pagination">
                    <li class="page-item"><button @click="getPosts(0)" class="page-link">Primeira</button></li>
                    <li v-for="page in pages" class="page-item" v-bind:class="[page == currentPage ? 'active' : '', '']"><button @click="getPosts(page)" class="page-link">{{page}}</button></li>
                    <li class="page-item"><button @click="getPosts(totalPages)" class="page-link">Última</button></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
				pages: [],
                totalPages: 1,
                currentPage: 1
            }
        },
        methods: {
            getPosts(page = 1) {
                axios.get('/api/posts?page=' + page).then(response => {
                    this.posts = response.data.data;
                    this.setPages(response.data.total);
                    this.currentPage = response.data.current_page;
                });
            },
            setPages (totalPosts) {
				this.totalPages = Math.ceil(totalPosts / 12);
                this.pages = [];
				for (let index = 1; index <= this.totalPages; index++) {
					this.pages.push(index);
				}
			},
        },
        mounted() {
            this.getPosts()
        }
    }
</script>

<style>
    
</style>
