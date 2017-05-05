<template>
    <vodal :show="show" :height=320 :width="500" animation="door" @hide="show = false">
        <div style="padding: 10px; text-align:center;">
            <span class="heading" v-bind:class="{ active: newM }" v-on:click="toggleView('newM')">New Meeting</span>
            <span class="heading" v-bind:class="{ active:open }"
                  v-on:click="toggleView('open')">Open Previous Meetings</span>
        </div>


        <hr/>
        <transition name="fade">
            <div v-if="open" style="padding-top: 30px">
                Old
            </div>
        </transition>
        <transition name="fade">
            <div v-if="newM" style="padding-top: 30px">
                <div class="ivu-row">
                    <div class="ivu-col ivu-col-span-24" style="padding-left: 4px; padding-right: 4px;">
                        <div class="ivu-input-wrapper ivu-input-wrapper-small ivu-input-type">
                            <i class="ivu-icon ivu-icon-load-c ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>
                            <input type="text" v-model="title" placeholder="Meeting Title" class="ivu-input ">
                        </div>
                    </div>
                </div>
                <br/>
                <div class="ivu-row">
                    <div class="ivu-col ivu-col-span-24" style="padding-left: 4px; padding-right: 4px;">
                        <div class="ivu-input-wrapper ivu-input-wrapper-small ivu-input-type">
                            <i class="ivu-icon ivu-icon-load-c ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>
                            <input type="text" v-model="location" placeholder="Meeting Location" class="ivu-input ">
                        </div>
                    </div>
                </div>
                <br/>
                <div class="ivu-row">
                    <button v-on:click="submit" type="button" class="ivu-btn ivu-btn-success ivu-btn-long"><!---->
                        <!---->
                        <span>Start Writing Minutes</span>
                    </button>
                </div>
            </div>
        </transition>
    </vodal>
</template>
<script>
    export default {
        props: ['saved_minutes', 'attendants', 'saved_agendas', 'filename'],
        data: function () {
            return {
                show: true,
                title: '',
                location: '',
                newM: true,
                open: false,
                isActive: 'active'
            }
        },
        methods: {
            toggleView: function (variable) {
                if (variable === "open") {
                    if (this.open === true) {
                        return;
                    }
                }
                if (variable === "newM") {
                    if (this.newM === true) {
                        return;
                    }
                }
                this.newM = !this.newM;
                this.open = !this.open;
            },
            submit: function () {
                var x = this;
                axios.post('/api/meeting', {
                    meetingTitle: x.title
                }).then(function (response) {
                    x.show = false;
                    console.log(response.data)
                    x.$emit('input', response.data)
                }).catch(function (error) {
                    console.log(error);
                });

            }
        }

    }
</script>
<style scoped>
    .heading {
        padding: 20px;
        cursor: pointer;
    }

    .active {
        color: darkblue;
        text-shadow: -2px 0px 17px rgba(94, 150, 150, 1);
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */
    {
        opacity: 0
    }
</style>
