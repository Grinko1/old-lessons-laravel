<template>
    <div>
        <div class="container w-25" v-if="person">
            <h2 class="text-center">Update user</h2>
            <div class="mb-3">
                <input
                    type="text"
                    v-model="person.name"
                    class="form-control"
                    placeholder="name"
                />
            </div>
            <div class="mb-3">
                <input
                    type="number"
                    v-model="person.age"
                    class="form-control"
                    placeholder="age"
                />
            </div>
            <div class="mb-3">
                <input
                    type="text"
                    v-model="person.job"
                    class="form-control"
                    placeholder="job"
                />
            </div>
            <div class="mb-3">
                <input
                    type="submit"
                    :disabled="!isDisabled"
                    @click.prevent="$store.dispatch('updatePerson',{id: person.id, name: person.name, age: person.age, job: person.job})"
                    class="btn btn-primary"
                />
            </div>
        </div>
    </div>
</template>
<script>
import router from '../../router'
export default {
    name: "Edit",
    data() {
        return {
            // name: null,
            // age: null,
            // job: null,
        };
    },
    mounted() {
        this.$store.dispatch('getPerson',this.$route.params.id )
    //   this.getPerson()
    },
    methods: {
        // updatePerson() {
        //     axios
        //         .patch(`/api/people/${this.$route.params.id}`, {
        //             name: this.name,
        //             age: this.age,
        //             job: this.job,
        //         })
        //         .then((res) => {
        //           router.push({name: 'person.show', params:{id: this.$route.params.id}})
        //         });
        // },
        // getPerson() {
        //     axios.get(`/api/people/${this.$route.params.id}`).then((res) => {
            
        //       this.name = res.data.data.name
        //       this.age = res.data.data.age
        //       this.job =res.data.data.job
        //     });
        // },

    },
      computed: {
          person(){
              return this.$store.getters.person
          },
        isDisabled(){
            return this.person.name && this.person.age && this.person.job
        }
    }
};
</script>
