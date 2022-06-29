<template>
    <div class="container mt-3">
      <div v-if="person">
        <p>Name: {{person.name}}</p>
            <p>Age: {{person.age}}</p>
                <p>Job: {{person.job}}</p>
      </div>
           <router-link class="btn btn-outline-success" :to="{name: 'person.edit', params:{id: person.id}}">Edit</router-link>
            <a class="btn btn-outline-danger" @click.prevent="$store.dispatch('deletePerson', person.id)" href="#">Delete</a>
    </div>
</template>
<script>
import router from '../../router'
export default {
  name: "Show",
  data(){
    return{
 
    }
  },
  mounted(){
    this.$store.dispatch('getPerson', this.$route.params.id)
 
  },
  methods:{
        // deletePerson(id){
        //   axios.delete(`/api/people/${id}`)
        //   .then(res=>{
        //     router.push({name: 'person.index'})
        //   })
        // }
  },
  computed:{
    person () {
      return  this.$store.getters.person 
    }
  }
}
</script>