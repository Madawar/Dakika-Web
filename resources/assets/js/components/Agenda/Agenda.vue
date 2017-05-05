<template>
    <div class="agenda ivu-col ivu-col-span-8">
        <div class="agenda-input"
             style="padding: 10px; border-bottom: 1px solid rgb(215, 221, 228);">
            <div class="ivu-input-wrapper ivu-input-type">
                <i class="ivu-icon ivu-icon-load-c ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>
                <input type="text" v-on:keyup.enter="addAgenda" v-model="agenda"
                       placeholder="Add Agenda" class="ivu-input">
            </div>
        </div>
        <div class="agenda-list" style="padding-bottom:150px;">
            <ul class="ivu-menu ivu-menu-light ivu-menu-vertical"
                style="width: 100% !important;">
                <li class="ivu-menu-item-group">
                    <ul>
                        <li v-on:click="addActive(agenda)" v-for="agenda in agendas"
                            v-bind:class="[agenda.active ? activeClass : '', errorClass]" class="ivu-menu-item ">
                            <i class="ivu-icon ivu-icon-pinpoint"></i>
                            {{agenda.text}}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['agendas', 'filename'],
        components: {},
        data: function () {
            return {
                agenda: '',
                activeClass: 'ivu-menu-item-active ivu-menu-item-selected',
                errorClass: 'gray',
            }
        },
        mounted: function () {

        },
        methods: {

            addAgenda: function () {
                var agenda = this.agenda

                if (this.agendas.length == 0) {
                    this.agendas.push({
                        text: this.agenda,
                        active: true
                    })
                } else {
                    this.agendas.push({
                        text: this.agenda,
                        active: false
                    })
                }
                this.agenda = ''
            },
            deleteAgenda: function (agenda) {
                var index = this.agendas.indexOf(agenda)
                if (index > -1) {
                    this.agendas.splice(index, 1);
                }
            },
            addActive: function (item) {
                for (var key in this.agendas) {
                    this.agendas[key].active = false
                }
                var index = this.agendas.indexOf(item)
                if (index > -1) {
                    this.agendas[index].active = !this.agendas[index].active
                }

            }
        },
        watch: {
            agenda: function () {
                this.$emit('input', this.agendas)
            }
        }
    }
</script>
<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Work+Sans:400,700');
    .ivu-menu-vertical .ivu-menu-item:hover, .ivu-menu-vertical .ivu-menu-submenu-title:hover {
        color: #fff !important;
        background: #5b6270 !important;
    }

    .ivu-menu-light.ivu-menu-vertical .ivu-menu-item-active:not(.ivu-menu-submenu)  {
        background: #5b6270 !important;
        color: white !important;
    }
    .ivu-menu-item{
        font-family: 'Work Sans', sans-serif !important;
        color: black !important;
        font-weight: bold;
    }

    .active {
        background: #5b6270 !important;
    }
</style>
