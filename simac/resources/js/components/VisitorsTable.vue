<template>
    <div v-if="status" >
        <input v-model="searcher" class="border-gray-300 border-2 overflow-hidden m-5 p-1" placeholder="Search for a Visitor" type="text" @keyup="searchSuggest" />
        <div v-for="checkin in checkins" v-bind:key="checkin.id">
            <visitors-table-item class="bg-gray-300 p-2 overflow-hidden shadow-xl sm:rounded-lg" v-bind:checkin="checkin" />
        </div>
    </div>
    <div v-else>
        <input v-model="searcher" class="border-gray-300 border-2 overflow-hidden m-5 p-1" placeholder="Search for a Visitor" type="text" @keyup="searchSuggest" />
        <div v-for="checkin in filteredCheckIns" v-bind:key="checkin.id">
            <visitors-table-item class="bg-gray-300 p-2 overflow-hidden shadow-xl sm:rounded-lg" v-bind:checkin="checkin" />
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
                filteredCheckIns: [],
                searcher: null,
                visitors: null,
                visitorIds: [],
                status: true,
            }
        },

        methods: {
            searchSuggest: function () {
                if(this.searcher.length > 5){
                    this.status = false;
                    this.test(this.searcher);
                }
                else{
                    this.status = true;
                }    
            },

            test: function(value){
                for(var i = 0; i < this.visitors.length; i++){

                    value = value.charAt(0).toUpperCase() + value.slice(1);

                    if(this.visitors[i].first_name.includes(value) || this.visitors[i].last_name.includes(value)){

                        if(!this.visitorIds.includes(this.visitors[i].id)){
                            this.visitorIds.push(this.visitors[i].id);
                        }
                        //console.log(this.visitorIds);
                    }     
                }

                for(var i = 0; i < this.checkins.length; i++){
                    for(var y = 0; y < this.visitorIds.length; y++){
                        if(this.checkins[i].visitor_id == this.visitorIds[y] && !this.filteredCheckIns.includes(this.checkins[i])){
                            this.filteredCheckIns.push(this.checkins[i]);
                        }
                    }
                }

                //this.checkins = [];
                console.log(this.filteredCheckIns);
            }
        },

        created(){
            axios.get('/api/checkin')
                .then(response => this.checkins = response.data.data)
                .catch(err => console.log(err));

            axios.get('/api/visitors')
                .then(response => this.visitors = response.data.data)
                .catch(err => console.log(err));
        }
    }
</script>