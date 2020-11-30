<template>
    <app-layout :username="username">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <welcome :username="username" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
        data() {
            return {
                username: '',
            }
        },
        methods: {
            getEmployeeData(user) {
                axios.get('/api/employees?uid=' + user.id).then(response => {
                    let data = response.data[0];
                    this.username = data.first_name;
                })
            },
        },
        mounted() {
            console.log('sznio');
            this.getEmployeeData(this.$page.user);
        }
    }
</script>
