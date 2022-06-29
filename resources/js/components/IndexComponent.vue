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
                    <tr :key="person.id" :class="isEdit(person.id) ? 'd-none' : ''">
                        <th scope="row">{{ person.id }}</th>
                        <td>{{ person.name }}</td>
                        <td>{{ person.age }}</td>
                        <td>{{ person.job }}</td>
                        <td>
                            <a class="btn btn-outline-success" @click.prevent="changeEditPersonId(person.id,person.name, person.age ,person.job )" href="#">Edit</a>
                        </td>
                           <td>
                            <a class="btn btn-outline-danger" @click.prevent="deletePerson(person.id)" href="#">Delete</a>
                        </td>
                    </tr>
                 <EditComponent :key="person.name" ref="edit" :person="person"></EditComponent>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import EditComponent from './EditComponent.vue';
export default {
  components: { EditComponent },
    name: "IndexComponent",
    data() {
        return {
            people: [],
            name: null,
            age: null,
            job: null,
            editPersonId:null
        };
    },
    mounted() {
        this.getPeople();
    },
    methods: {
        getPeople() {
            axios.get("/api/people").then((res) => {
                this.people = res.data.data;

                console.log(res.data.data);
            });
        },
        updatePerson(id) {
              this.editPersonId = null
            axios
                .patch(`/api/people/${id}`, {
                    name: this.name,
                    age: this.age,
                    job: this.job,
                })
                .then((res) => {
                     this.getPeople();
                });
        },
        changeEditPersonId(id, name, age, job){
            
            let editName =`edit_${id}`
            console.log(editName)
            console.log(this.$refs[editName][0])
            this.editPersonId = id
            this.$refs.edit.name = name
            this.$refs.edit.age = age
            this.$refs.edit.job = job


        },
        isEdit(id){
            return this.editPersonId === id
        },
        deletePerson(id){
            axios.delete(`/api/people/${id}`).then(res=>{
                console.log('deleted')
                   this.getPeople();
            })
        }

    },
};
</script>
