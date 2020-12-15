<template>
    <div class="p-2 m-4 flex justify-between text-xl border-b-2 border-red-600">
        <h1 class="text-gray-700">{{ visitor.fname }} {{ visitor.lname }}</h1> 
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                id: this.data.id,
                visitor: {
                    id: this.data.visitor_id,
                    fname: this.data.first_name,
                    lname: this.data.last_name,
                },
            }
        }, 
    }
</script>