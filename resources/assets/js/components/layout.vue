<template>
    <div class="layout" style="height: 100%; overflow: hidden;">
        <div class="ivu-row-flex" style="height: 100%;">
            <attendant :saved_attendants="old_attendants" v-model="attendants"></attendant>
            <div class="ivu-col ivu-col-span-19" style="height: 100%;">
                <div class="layout-content">
                    <minute :saved_minutes="old_minutes" :filename="filename" :saved_agendas="old_agendas"
                            v-model="minutes"
                            v-on:agenda="agendaUpdated"
                            :attendants="attendants"></minute>
                </div>
            </div>
        </div>

    </div>

</template>
<script>
    import Attendant from './Attendant/Attendant.vue'
    import Agenda from './Agenda/Agenda.vue'
    import Minute from './Minute/Minute.vue'
    export default {
        props: ['meeting_id'],
        components: {
            Attendant,
            Agenda,
            Minute
        },
        mounted: function () {

        },
        data: function () {
            return {
                attendants: [],
                minutes: [],
                meeting: [],
                agenda: [],
                old_minutes: [],
                old_attendants: [],
                old_agendas: [],
                filename: null,
                saving: 1,

            }
        },
        methods: {
            attendantAdded: function ($attendants) {
                this.attendants = $attendants;
            },
            minuteChanged: function (minutes) {
                this.minutes = minutes;
            },
            agendaUpdated: function (agenda) {
                this.agenda = agenda
            },
            truncateData: function () {
                this.attendants = []
                this.minutes = []
                this.meeting = []
                this.agenda = []
                this.old_minutes = []
                this.old_attendants = []
                this.old_agendas = []
                this.editing_minute = null
                this.filename = null
                this.saving = 1
            },
            saveMinutes: function () {
                var x = this;
                axios.post('/api/minutes', {
                    meetingId: x.meeting_id,
                    agenda: x.agenda,
                    attendants: x.attendants,
                    minutes: x.minutes
                }).then(function (response) {
                    x.show = false;
                    console.log(response.data)
                    x.$emit('input', response.data)
                }).catch(function (error) {
                    console.log(error);
                });
            }
        },
        watch: {
            attendants: function () {
                this.saveMinutes();

            },
            minutes: function () {
                this.saveMinutes();

            },
            agenda: function () {
                this.saveMinutes();
            },
            filename: function () {

            }
        }
    }
</script>

<style>
    input {
        border-radius: 0px !important;
    }

    .layout {
        background: #f5f7f9;
        position: relative;
        height: 100%;
    }

    .layout-breadcrumb {
        padding: 10px 15px 0;
    }

    .layout-content {
        min-height: 200px;
        overflow: hidden;
        background: #fff;
        border-radius: 0px;
        height: 100%;
    }

    .layout-content-main {
        height: 100%;
    }

    .ivu-menu-vertical.ivu-menu-light:after {
        background: none !important;
    }

    .layout-copy {
        text-align: center;
        padding: 10px 0 20px;
        color: #9ea7b4;
        height: 100%;
    }

    .layout-menu-left {
        background: #464c5b;
    }

    .layout-header {
        height: 60px;
        background: #fff;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
    }

    .layout-logo-left {
        width: 90%;
        height: 30px;
        background: #5b6270;
        border-radius: 0px;
        margin: 15px auto;
        text-align: center;
        color: white;
        font-size: 20px;
        font-weight: bold;
    }
</style>
