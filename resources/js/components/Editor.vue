<template>
    <div>
        <input type="hidden" :name="this.name" v-model="value"/>
        <quill-editor v-model="value"></quill-editor>
    </div>
</template>
<script>
export default {
    props :['name', 'defaultvalue'],
    data(){
        return{
            value: this.defaultvalue || ''
        }
    },
}
</script>
