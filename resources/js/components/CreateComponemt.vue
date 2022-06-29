<template>
    <div class="container w-25">
        <h2 class="text-center">Add user</h2>
        <div class="mb-3">
            <input
                type="text"
                v-model="name"
                class="form-control"
                placeholder="name"
            />
        </div>
        <div class="mb-3">
            <input
                type="number"
                v-model="age"
                class="form-control"
                placeholder="age"
            />
        </div>
        <div class="mb-3">
            <input
                type="text"
                v-model="job"
                class="form-control"
                placeholder="job"
            />
        </div>
        <div class="mb-3">
            <input
                type="submit"
                @click.prevent="addPerson"
                class="btn btn-primary"
            />
        </div>
    </div>
</template>

<script>
export default {
 name:"CreateComponent",
 data(){
   return{
         name:null,
         age:null,
         job:null
   }
 },
 mounted(){

 },
 methods:{
     addPerson(){
         axios.post('/api/people', {name: this.name, age: this.age, job: this.job})
         .then(res=>{
        this.name=null,
         this.age=null,
         this.job=null
         this.$parent.$refs.index.getPeople()
         })
     }
 }
}
</script>
