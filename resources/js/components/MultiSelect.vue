<template>
  <div>
    <multiselect  v-model="value"
        :options="options.map(option => option.id)" 
        :multiple="true" 
        :custom-label="opt => options.find(option => option.id == opt).name">
    </multiselect>
    <input type="hidden" name="tags" v-model="value"/>
  </div>
</template>

<script>
  import Multiselect from 'vue-multiselect';

    export default {
    props: ['options','defaultvalue'],
    components: { Multiselect },
    data () {
      return {
        value: this.defaultvalue || [],
      }
    }
  }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>