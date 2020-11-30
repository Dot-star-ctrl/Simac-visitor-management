<template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <personal-info />
            </div>
        </div>
</template>

<script>
    import PersonalInfo from '@/components/RequestPersonalInfo.vue'

    export default {
        components: {
            PersonalInfo,
        },
    }
</script>
