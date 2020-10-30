<template>
  <div class="m-4">
    <div class="flex pb-4">
      <div class="w-1/3 overflow-auto border-r border-gray-200">
        <h1 class="p-4 text-center text-2xl border-b border-gray-200">
          Pending meetings
        </h1>
        <div class="p-2 h-xl overflow-auto">
          <meeting-thumb
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
          <meeting-overview :gnok="currMeeting" />
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
      meetings: this.addMeetings(),
      currMeeting: {},
    };
  },
  methods: {
    addMeetings: function () {
      let meetings = [];

      for (let i = 0; i < 20; i++) {
        meetings.push({
          visitor_id: i,
          name: "John",
          company_id: 23,
          departmend_id: 53,
          note: "Lorem ipusm dolor sit amet",
          proposed_start: "12:30",
          proposed_end: "13:00",
          classname: "",
        });
      }

      return meetings;
    },
    focusMeeting: function (m) {
        this.currMeeting.classname = '';
        m.classname = "bg-red-50";
    },
  },
};
</script>