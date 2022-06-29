<template>

                    <tr v-if="person" :key="person.name" :class="this.$parent.isEdit(person.id) ? '' : 'd-none'">
                        <th scope="row">{{ person.id }}</th>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                v-model="name"
                            />
                        </td>
                        <td>
                            <input
                                type="number"
                                class="form-control"
                                v-model="age"
                            />
                        </td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                v-model="job"
                            />
                        </td>
                        <td><a class="btn btn-success" @click.prevent="updatePerson(person.id)" href="#">Update</a></td>
                    </tr>
        
</template>

<script>
export default {
    name: "EditComponent",
    data() {
        return {
       
            name: null,
            age: null,
            job: null,
          
        };
    },
    props:[
       ' person'
    ],
    mounted() {
       
    },
    methods: {
    
        updatePerson(id) {
              this.$parent.editPersonId = null
            axios
                .patch(`/api/people/${id}`, {
                    name: this.name,
                    age: this.age,
                    job: this.job,
                })
                .then((res) => {
                     this.$parent.getPeople();
                });
        }

    },
};
</script>
