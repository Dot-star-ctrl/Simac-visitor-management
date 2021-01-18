<template>
    <div class="m-4">
        <div class="pb-4 border-b border-gray-200">
            <h1 class="text-xl lg:text-2xl text-center">Generate visitor reports from</h1>
            <div class="flex p-4 justify-center">
                <h2 class="text-xl m-1 pr-4">Last</h2>
                <select v-model="sort">
                    <option value="1">24h</option>
                    <option value="2">48h</option>
                    <option value="7">7 days</option>
                    <option value="31">Month</option>
                    <option value="186">6 months</option>
                    <option value="365">Year</option>
                </select>
            </div>
            <div class="m-4 flex justify-center">
                <button 
                    @click="generateSort"
                    class="border border-red-700 bg-red-600 rounded text-white p-2 text-lg lg:text-xl">
                    Generate 
                </button>
            </div>
            <h1 class="p-4 text-xl lg:text-2xl text-center">Or choose manually</h1>
            <div class="flex justify-around lg:justify-center">
                <div class="p-2 lg:flex lg:text-xl">
                    <h2 class="lg:pr-4">From</h2>
                    <input v-model="startDate" type="datetime-local" name="" id="">
                </div>
                <div class="p-2 lg:flex lg:text-xl">
                    <h2 class="lg:pr-4">To</h2>
                    <input v-model="endDate"type="datetime-local" name="" id="">
                </div>
            </div>
        </div>
        <div class="pt-4 text-center">
            <button
                @click="generateDate" 
                class="border border-red-700 bg-red-600 rounded text-white p-2 text-lg lg:text-xl">
                Generate by date
            </button>
        </div>
        <div id="content" class="m-4 pb-4 border-t border-gray-200" :class="{ hidden: isHidden}">
            <div v-if="bySort" class="m-4 text-center text-2xl">
                <h1 v-if="sort == 1">Visitors from last day</h1>
                <h1 v-else-if="sort == 31">Visitors from last month</h1>
                <h1 v-else-if="sort == 186">Visitors from last 6 months</h1>
                <h1 v-else-if="sort == 365">Visitors from last year</h1>
                <h1 v-else>Visitors from last {{ sort }} days</h1>
            </div>
            <div v-else class="m-4 text-center text-2xl">
                <h1>Visitors from {{ startDate}} to {{ endDate }}</h1>
            </div>
            <div class="flex justify-around h-xl overflow-y-scroll">
                <div>
                    <h1 class="text-center text-xl pb-2 border-b border-gray-200">Check ins</h1>
                    <ul v-if="visitors.checkins.length > 0">
                        <li v-for="v in visitors.checkins" :key="v.id">
                            <div class="p-2 m-4 text-lg border-b-2 border-red-600">
                                <h1 class="text-gray-700"> {{ v.first_name }} {{v.last_name}} on {{ v.dateTime}}</h1> 
                                <h1 class="text-gray-600 text-sm">Building: {{ v.name }}</h1> 
                            </div>
                        </li>
                    </ul>
                    <h1 v-else>
                        No checkins!
                    </h1>
                </div>
                <div>
                    <h1 class="text-center text-xl pb-2 border-b border-gray-200">Check outs</h1>
                    <ul v-if="visitors.checkins.length > 0">
                        <li v-for="v in visitors.checkouts" :key="v.id">
                            <div class="p-2 m-4 text-lg border-b-2 border-red-600">
                                <h1 class="text-gray-800"> {{ v.first_name }} {{v.last_name}} on {{ v.dateTime}}</h1> 
                                <h1 class="text-gray-600 text-sm">Building: {{ v.name }}</h1> 
                            </div>
                        </li>
                    </ul>
                    <h1 v-else>
                        No checkouts!
                    </h1>
                </div>
            </div>
            <div v-if="page < lastPage" class="flex justify-center">
               <button 
                    class="mx-12 border border-red-700 bg-red-600 hover:bg-red-700 rounded text-white p-2 px-4 text-xl"
                    @click="loadMore">
                    Load more
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                sort: 1,
                startDate: '',
                endDate: '',
                isHidden: true,
                visitors: {
                    checkins: [],
                    checkouts: [],
                },
                page: 1,
                lastPage: 0,
                bySort: false,
            }
        },
        methods: {
            async generateSort() {
                let checkins = await axios.get('/api/checkin', {
                    params: { s: this.sort }
                });
                this.visitors.checkins = checkins.data.data;

                let checkouts = await axios.get('/api/checkout', {
                    params: { s: this.sort }
                });
                this.visitors.checkouts = checkouts.data.data;

                this.page = 1;
                this.lastPage = checkins.data.last_page;
                this.isHidden = false;

                this.bySort = true;
            },
            async generateDate() {
                if (this.startDate != '' || this.endDate != '') {
                    this.startDate = new Date(this.startDate);
                    let startMonth = this.startDate.getMonth();
                    startMonth++;

                    this.startDate = this.startDate.getFullYear() + '-' + startMonth + '-' + this.startDate.getDate();

                    this.endDate = new Date(this.endDate);
                    let endMonth = this.endDate.getMonth();
                    endMonth++;

                    this.endDate = this.endDate.getFullYear() + '-' + endMonth + '-' + this.endDate.getDate();

                    let checkins = await axios.get('/api/checkin', {
                        params: { sd: this.startDate, ed: this.endDate }
                    });
                    this.visitors.checkins = checkins.data.data;

                    let checkouts = await axios.get('/api/checkout', {
                        params: { sd: this.startDate, ed: this.endDate }
                    });
                    this.visitors.checkouts = checkouts.data.data;

                    this.page = 1;
                    this.lastPage = checkins.data.last_page;
                    this.isHidden = false;

                    this.bySort = false;
                }
            },
            async loadMore() {
                if (this.bySort) {
                    const temp = ++this.page;

                    let checkins = await axios.get('/api/checkin', {
                        params: { s: this.sort, page: temp }
                    });
                    checkins = checkins.data.data;
                    this.visitors.checkins = this.visitors.checkins.concat(checkins);

                    let checkouts = await axios.get('/api/checkout', {
                        params: { s: this.sort, page: temp }
                    });
                    checkouts = checkouts.data.data;
                    this.visitors.checkouts = this.visitors.checkouts.concat(checkins);

                    this.isHidden = false;
                    this.bySort = true;
                } else {
                    const temp = ++this.page;
                    let checkins = await axios.get('/api/checkin', {
                        params: { sd: this.startDate, ed: this.endDate, page: temp }
                    });
                    checkins = checkins.data.data;
                    this.visitors.checkins = this.visitors.checkins.concat(checkins);

                    let checkouts = await axios.get('/api/checkout', {
                        params: { sd: this.startDate, ed: this.endDate, page: temp }
                    });
                    checkouts = checkouts.data.data;
                    this.visitors.checkouts = this.visitors.checkouts.concat(checkins);

                    this.isHidden = false;
                    this.bySort = false;
                }
            },
        }
    }
</script>