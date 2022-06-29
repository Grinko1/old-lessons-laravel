<template>
    <div>
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
                    :disabled="!isDisabled"
                    @click.prevent="$store.dispatch('addPerson', {name, age, job})"
                    class="btn btn-primary"
                />
            </div>
        </div>
    </div>
</template>
<script>
import router from '../../router'
export default {
    name: "Create",
    data() {
        return {
            name: null,
            age: null,
            job: null,
        };
    },
    methods: {
        // addPerson() {
        //     axios
        //         .post("/api/people", {
        //             name: this.name,
        //             age: this.age,
        //             job: this.job,
        //         })
        //         .then((res) => {
        //             (this.name = null), (this.age = null), (this.job = null);
        //             router.push({name:'person.index'})
        //         });
        // },
    },
    computed: {
        person(){
            return this.$store.getters.person
        },
        isDisabled(){
            return this.name && this.age && this.job
        }
    }
};
</script>
