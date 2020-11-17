<template>
    <div>
        <div v-for="checkin in checkins" v-bind:key="checkin.id">
            <visitors-table-item v-bind:checkin="checkin" />
        </div>
    </div>
</template>

<script>

    import VisitorsTableItem from './VisitorsTableItem.vue';

    export default {
        components: {
            VisitorsTableItem
        },

        data() {
            return {
                checkins: null,
                building: null,
                visitors: null,
            }
        },

        created(){
            axios.get('/api/checkin')
                .then(response => this.checkins = response.data.data)
                .catch(err => console.log(err));
        }
    }
</script>