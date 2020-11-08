<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <report-generator />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ReportGenerator from '@/components/ReportGenerator'

    export default {
        components: {
            AppLayout,
            ReportGenerator,
        },
    }
</script>

