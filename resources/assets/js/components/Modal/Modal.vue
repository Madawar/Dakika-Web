<template>
    <vodal :show="show" :height=270   animation="rotate" @hide="show = false">
        <div style="padding-top: 30px">
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
                <button v-on:click="submit" type="button" class="ivu-btn ivu-btn-success ivu-btn-long"><!----> <!----> <span>Start Writing Minutes</span>
                </button>
            </div>
            <br/>
            <div class="ivu-row">
                <div class="ivu-alert ivu-alert-warning">
            <span class="ivu-alert-message">
                All your Meeting Minutes will be saved to local storage until you register and log in!!!
               <br/> Syncing with Evernote and OneNote is also disabled
            </span>
                    <span class="ivu-alert-desc">

            </span>
                </div>
            </div>
        </div>
    </vodal>
</template>
<script>
    export default {
        props: ['saved_minutes', 'attendants', 'saved_agendas', 'filename'],
        data: function () {
            return {
                show: true,
                title: '',
                location: ''
            }
        },
        methods: {
            submit: function () {
                this.show = false;
                this.$emit('input',{title:this.title,location:this.location})
            }
        }

    }
</script>
<style scoped>

</style>
