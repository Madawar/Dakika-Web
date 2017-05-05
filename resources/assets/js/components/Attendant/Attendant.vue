<template>
    <div class="layout-menu-left ivu-col ivu-col-span-5" style="height: 100%;">
        <div class="layout-logo-left">Dakika</div>
        <div class="agenda-input"
             style="padding: 10px; margin-top:27px; border-bottom: 1px solid rgb(84, 84, 84);;border-top: 1px solid rgb(84, 84, 84);;">
            <div class="ivu-input-wrapper ivu-input-type">
                <i class="ivu-icon ivu-icon-load-c ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>
                <input v-on:keyup.enter="addAttendant"
                       v-model="attendant" type="text" placeholder="Add Attendants" class="ivu-input">
            </div>
        </div>
        <ul class="ivu-menu ivu-menu-dark ivu-menu-vertical" style="padding-bottom:100px; height: 100%; overflow-y: auto; padding-bottom: 120px; width: auto;">
                <li class="ivu-menu-item-group">
                    <ul>
                        <AttendantItem :attendant="attendant" v-on:delete-item="deleteItem"
                                       v-on:user-present="userPresence"
                                       v-for="attendant in attendants"></AttendantItem>
                    </ul>
                </li>
        </ul>
    </div>

</template>
<script>
    import AttendantItem from './AttendantItem.vue'
    export default {
        props: ['minutes', 'saved_attendants', 'filename'],
        components: {
            AttendantItem

        },
        data: function () {
            return {
                attendants: [],
                attendant: '',
                autoSave: ''
            }
        },
        mounted: function () {

        },
        methods: {
            deleteItem: function (item) {
                var index = this.attendants.indexOf(item)
                if (index > -1) {
                    this.attendants.splice(index, 1);
                }
            },
            createAcronym: function (str) {
                var matches = str.match(/\b(\w)/g)              // ['J','S','O','N']
                return matches.join('')
            },
            userPresence: function (item) {
                var index = this.attendants.indexOf(item)
                if (index > -1) {
                    this.attendants[index].present = !this.attendants[index].present
                }
            },
            addAttendant: function () {
                var acronym = this.createAcronym(this.attendant)
                var attendantObject = {
                    attendant: this.attendant,
                    acronym: acronym,
                    email: 'email@example.com',
                    present: true
                }
                this.attendants.push(attendantObject)
                this.$emit('input', this.attendants)
                this.attendant = ''
            },
            deleteattendant: function () {

            },
            editLastAttendant: function () {
                this.attendant = this.attendants.slice(-1)[0].attendant
            }
        },
        watch: {
            saved_attendants: function () {
                this.attendants = this.saved_attendants
            }
        }
    }
</script>
<style scoped>

</style>
