<template>
  <div class="m-4">
    <div class="flex pb-4">
      <div class="w-1/3 overflow-auto border-r border-gray-200">
        <h1 class="p-4 text-center text-2xl border-b border-gray-200">
          Pending meetings
        </h1>
        <div class="p-2 h-xl overflow-auto">
          <meeting-thumb
            :class="m.classname"
            v-for="m in meetings"
            :key="m.visitor_id"
            :meetingObj="m"
            @click.native="focusMeeting(m)"
          />
        </div>
      </div>
      <div class="w-2/3">
        <h1 class="p-4 text-center text-2xl border-b border-gray-200">
          Overview
        </h1>
        <div>
          <meeting-overview :key="currMeeting.visitor_id" :meetingObj="currMeeting"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import MeetingThumb from "@/components/MeetingThumb";
import MeetingOverview from "@/components/MeetingOverview";

export default {
  components: {
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
            this.currMeeting = this.meetings[0];
        })
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