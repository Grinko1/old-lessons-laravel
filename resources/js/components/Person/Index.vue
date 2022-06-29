<template>
   <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">job</th>
                    <th scope="col">Edit</th>
                     <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <template v-for="person in people">
                    <tr :key="person.id" >
                        <th scope="row">{{ person.id }}</th>
                        <td>
                          <router-link :to="{name: 'person.show', params:{id: person.id}}">{{ person.name }}</router-link>
                          </td>
                        <td>{{ person.age }}</td>
                        <td>{{ person.job }}</td>
                      <td>
                        <router-link class="btn btn-outline-success" :to="{name: 'person.edit', params:{id: person.id}}">Edit</router-link>
                      </td>
                      
                           <td>
                            <a class="btn btn-outline-danger" @click.prevent="$store.dispatch('deletePerson', person.id)" href="#">Delete</a>
                        </td> 
                    </tr>
              
                </template>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
  name: "Index",
  data(){
    return{
      // people:[]
    }
  },
  mounted(){
    this.$store.dispatch('getPeople')
     
  },
  computed:{
    people(){
      return this.$store.getters.people
    }
  },
  methods:{
    // getPeople(){
    //   axios.get('api/people')
    //   .then(res=>{
    //     this.people = res.data.data
    //   })
    // },
    // deletePerson(id){
    //   axios.delete(`/api/people/${id}`).then(res=>{
    //     this. getPeople()
    //   })
    // }
  }
}
</script>