<template>
    <div>
        <input type="file" :name="this.name" :id="this.id" @change="onFileChange"  accept="image/*"/>
        <div class="p-md-5">
            <img class="img-fluid" v-if="url" :src="url" />
        </div>
    </div>
</template>
<script>
export default {
    props :['name', 'id', 'defaulturl'],
    data(){
        return{
            url: this.defaulturl || ''
        }
    },
    methods: {
        onFileChange(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        }
    }
}
</script>
