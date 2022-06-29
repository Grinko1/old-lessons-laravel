<template>
    <div class="container">

        <router-link :to="{name:'person.index'}">People</router-link>
          <router-link :to="{name:'person.create'}">Add Person</router-link>
        <router-view></router-view>
      
   
    </div>
</template>

<script>

import PostComponent from "./PostComponent.vue";
export default {
    components: { PostComponent,},
    name: "App",
    data() {
        return {
           
        };
    },
    mounted() {
  
    },
    methods: {
      
    },
};
</script>
