<template>
    <div class="m-5">
        <div v-for="visitor in visitors" v-bind:key="visitor.id" :ref="visitor.id">
            <label>Name of the visitor: {{visitor.first_name}} {{visitor.last_name}}</label>
            <label class="float-right">Date of the visit: {{checkin.dateTime}}</label> 
        </div>
        <div v-for="building in buildings" v-bind:key="building.id">
            <label>Visited building: {{building.name}}</label>
            <label class="float-right">Building's address: {{building.address}}</label>
        </div>
    </div>
</template>

<script>
export default {
    name: "VisitorsTableItem",
    props: ["checkin"],
    data() {
            return {
                buildings: null,
                visitors: null,
            }
        },
    created(){
            axios.get('/api/visitors/' + this.checkin.visitor_id)
                .then(response => this.visitors = response.data)
                .catch(err => console.log(err));

            axios.get('/api/buildings/' + this.checkin.building_id)
                .then(response => this.buildings = response.data)
                .catch(err => console.log(err));
        }
}
</script>