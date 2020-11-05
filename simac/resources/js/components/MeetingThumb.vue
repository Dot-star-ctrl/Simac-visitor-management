<template>
    <div :class="classname" class="p-2 m-4 flex justify-between text-xl border-b-2 border-red-600">
        <h1 :class="classname">{{ name }}</h1> 
        <h1 class="mx-12 text-gray-700">{{ proposed_start }} - {{ proposed_end }}</h1> 
    </div>
</template>

<script>
    export default {
        props: ['meetingObj'],
        data() {
            return {
                visitor_id: this.meetingObj.visitor_id,
                name: this.meetingObj.name,
                company_id: this.meetingObj.company_id,
                department_id: this.meetingObj.department_id,
                note: this.meetingObj.note,
                proposed_start: this.meetingObj.proposed_start,
                proposed_end: this.meetingObj.proposed_end,
                host_id: '',
                classname: this.meetingObj.classname,
            }
        }, 
    }
</script>