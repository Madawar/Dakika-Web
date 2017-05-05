<template>
    <div class="layout-content-main">
        <div class="minute-writing" style="padding: 10px;">
            <div class="ivu-input-wrapper ivu-input-type" style="border-radius: 0px !important;">
                                <textarea rows="2"
                                          class="ivu-input" ref="minuteEditor"
                                          v-model="minute"
                                          @keyup.alt.69="editLastMinute"
                                          v-on:keyup.enter="addMinute" placeholder="Start Writing your minutes"
                                          v-on:keyup.esc="cancelEdit"
                                          v-on:keyup.alt.78="moveToNextAgenda"></textarea></div>
        </div>
        <div class="view-pane">
            <div class="ivu-row" style="height: 100%;">
                <agenda :agendas="agendas" v-on:input="updateAgenda"></agenda>
                <div class="minutes ivu-col ivu-col-span-16">
                    <div class="agenda-input"
                         style="text-align: center; padding: 10px; border-bottom: 1px solid rgb(215, 221, 228);">
                        <button type="button" class="ivu-btn ivu-btn-primary"><i
                                class="ivu-icon ivu-icon-android-desktop"></i>
                            <span>Desktop Client</span></button>
                        <button type="button" class="ivu-btn ivu-btn-primary"><i
                                class="ivu-icon ivu-icon-android-sync"></i> <span>Sync</span></button>
                        <button type="button" class="ivu-btn ivu-btn-primary"><i
                                class="ivu-icon ivu-icon-card"></i> <span>Unlock</span></button>
                        <button type="button" class="ivu-btn ivu-btn-primary"><i
                                class="ivu-icon ivu-icon-eye"></i> <span>View Minutes</span></button>
                    </div>
                    <div class="minute-list" style="padding-bottom: 150px;">

                        <ul>
                            <Item :minute="minute" v-on:edit-item="editMinute" v-on:delete-item="deleteMinute"
                                  v-on:add-item-after="addItemAfter"
                                  v-for="minute in ordered_mins"></Item>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Item from './MinuteItem.vue'
    import Agenda from '../Agenda/Agenda.vue'
    import moment from 'moment'
    export default {
        props: ['saved_minutes', 'attendants', 'saved_agendas', 'filename'],
        components: {
            Agenda,
            Item,

        },
        data: function () {
            return {
                minutes: [],
                minute: '',
                tags: '',
                modified_minute: '',
                agenda: '',
                agendas: [],
                editing_minute: null,
                insert_after: null
            }
        },
        methods: {
            addItemAfter: function (item) {
                var index = this.minutes.indexOf(item)
                this.insert_after = index + 1
                this.$refs.minuteEditor.focus()

            },
            getTags: function findHashtags(searchText) {
                var regexp = /\B\#\w\w+\b/g
                var result = searchText.match(regexp)
                if (result) {
                    return result
                } else {
                    return false
                }
            },
            getPeople: function findHashtags(searchText) {
                var regexp = /\B\@\w\w+\b/g
                var result = searchText.match(regexp)
                var items = []
                if (result == null) {
                    return []
                }
                for (var i = 0; i < result.length; i++) {
                    var item = result[i]
                    item = item.replace(/@(\w+)/g, '$1')
                    var x = this.attendants.findIndex(x => x.acronym == item)
                    if (x > -1) {
                        items.push(this.attendants[x].attendant)
                    }
                }
                if (result) {
                    return items
                } else {
                    return false
                }
            },
            updateAgenda: function (agenda) {
                this.agendas = agenda;
                this.$emit('agenda', agenda)
            },
            cancelEdit: function () {
                this.editing_minute = null;
                this.insert_after = null;
                this.minute = '';
            },
            editMinute: function (item) {

                this.$refs.minuteEditor.focus()

                this.editing_minute = this.minutes.indexOf(item)
                this.minute = item.minute.trim()
            },
            substitutePeople: function (minute) {
                for (var key in this.attendants) {
                    var attendant = this.attendants[key].attendant
                    var acronym = this.attendants[key].acronym
                    var replace = '@' + acronym
                    minute = minute.replace(replace, attendant)
                }
                return minute
            },
            getActiveAgenda: function () {
                var x = this.agendas.findIndex(x => x.active == true)
                if (x > -1) {
                    this.agenda = this.agendas[x].text
                }
            },
            addMinute: function () {
                this.tags = this.getTags(this.minute)
                this.people = this.getPeople(this.minute)
                this.modified_minute = this.minute.replace(/#(\w+)/g, '$1')
                this.modified_minute = this.substitutePeople(this.modified_minute)
                this.getActiveAgenda()
                var minuteObject = {
                    minute: this.minute.trim(),
                    modified_minute: this.modified_minute,
                    tags: this.tags,
                    people: this.people,
                    attendants: this.attendants,
                    agenda: this.agenda,
                    date: moment().format('YYYY-M-D'),
                    time: moment().format('h:mm')
                }
                if (this.editing_minute !== null) {
                    this.minutes[this.editing_minute] = minuteObject
                    this.editing_minute = null


                } else if (this.insert_after !== null) {
                    this.minutes.splice(this.insert_after, 0, minuteObject);
                    this.insert_after = null
                } else {
                    this.minutes.push(minuteObject)
                    this.editing_minute = null
                }

                this.minute = ''
            },
            deleteMinute: function (item) {
                var index = this.minutes.indexOf(item)
                if (index > -1) {
                    this.minutes.splice(index, 1);
                }
            },
            editLastMinute: function () {
                this.editMinute(this.minutes.slice(-1)[0])
            },
            moveToNextAgenda: function () {
                var x = this.agendas.findIndex(x => x.active == true)
                var index = 0;
                if (x > -1) {
                    this.agendas[x].active = false
                    index = x + 1
                }
                if (index > this.agendas.length - 1) {
                    index = 0;
                }
                this.agendas[index].active = true
                this.agenda = this.agendas[index].text
            }
        },
        watch: {
            minutes: function () {
                this.$emit('input', this.minutes)
            },
            agenda: function () {

            },
            saved_minutes: function () {
                this.minutes = this.saved_minutes
            },
            saved_agendas: function () {
                this.agendas = this.saved_agendas
            }
        },
        computed: {
            ordered_mins: function () {
                return this.minutes.slice().reverse();
            }
        }

    }
</script>
<style scoped>

</style>
