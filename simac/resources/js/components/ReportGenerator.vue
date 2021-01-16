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
            <div class="flex lg:justify-center">
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
            }
        },
        methods: {
            async generateSort() {
                let checkins = await axios.get('/api/checkin', {
                    params: { s: this.sort, }
                });
                checkins = checkins.data.data;

                let checkouts = await axios.get('/api/checkout', {
                    params: { s: this.sort, }
                });
                checkouts = checkouts.data.data;
            },
            async generateDate() {
                let month = new Date().getMonth();
                month++;

                this.startDate = new Date(this.startDate);
                this.startDate = this.startDate.getFullYear() + '-' + month + '-' + this.startDate.getDate();

                this.endDate = new Date(this.endDate);
                this.endDate = this.endDate.getFullYear() + '-' + month + '-' + this.endDate.getDate();
                console.log(this.startDate, this.endDate)

                let checkins = await axios.get('/api/checkin', {
                    params: { sd: this.startDate, ed: this.endDate, }
                });
                checkins = checkins.data.data;

                let checkouts = await axios.get('/api/checkout', {
                    params: { sd: this.startDate, ed: this.endDate, }
                });

                checkouts = checkouts.data.data;
            },
        }
    }
</script>