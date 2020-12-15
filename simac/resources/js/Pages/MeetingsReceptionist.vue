<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="m-4">
                        <div class="flex pb-4">
                            <div class="w-1/3 overflow-auto border-r border-gray-200">
                                <h1 class="p-4 text-center text-2xl border-b border-gray-200">
                                    Pending meetings
                                </h1>
                                <div class="p-2 h-xl overflow-auto">
                                    <meeting-thumb
                                      :class="m.classname"
                                      class="cursor-pointer"
                                      v-for="m in meetings"
                                      :key="m.visitor_id"
                                      :data="m"
                                      @click.native="focusMeeting(m)"
                                    />
                                </div>
                            </div>
                            <div class="w-2/3">
                                <h1 class="p-4 text-center text-2xl border-b border-gray-200">Overview</h1>
                                <meeting-overview 
                                    v-if="meetings.length > 0" 
                                    :key="currMeeting.visitor_id" :data="currMeeting"/>
                                <div v-else class="flex-col">
                                    <h1 class="p-8 text-center text-2xl">It seems that there are no meeting requests right now</h1>
                                    <div class="flex justify-center">
                                        <button 
                                            class="mx-12 border border-red-700 bg-red-600 rounded text-white p-2 px-4 text-xl"
                                            @click="getMeetings">
                                            Refresh
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import MeetingThumb from "@/components/MeetingThumb";
    import MeetingOverview from "@/components/MeetingOverview";

    export default {
        components: {
            AppLayout,
            MeetingThumb,
            MeetingOverview,
        },
        data() {
            return {
                meetings: [],
                currMeeting: {},
            };
        },
        methods: {
            getMeetings: function () {
                axios.get('/api/visitrequests').then(response => {
                    this.meetings = response.data.data;

                    this.focusMeeting(this.meetings[0]);
                });
            },
            focusMeeting: function(m) {
                this.currMeeting.classname = '',
                m.classname = "bg-red-50";

                this.currMeeting = m;
            }
        },
        mounted() {
            this.getMeetings();
        },
    };
</script>


