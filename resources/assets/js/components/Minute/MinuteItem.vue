<template>
    <li style="border-bottom: 1px solid rgb(215, 221, 228); padding-top: 6px; padding-bottom: 6px;">
        <div class="ivu-row">
            <div class="ivu-col ivu-col-span-24">
                <p v-on:click="editItem(minute)"
                   style="text-align: justify; font-size: 12px; padding: 10px 10px 1px; line-height: 2.1em;">
                    {{minute.modified_minute}}
                 </p>
            </div>
        </div>
        <div class="ivu-row" style="padding-left: 10px;">
            <div class="ivu-col ivu-col-span-24" style="padding-right: 2px;">
                <button v-on:click="deleteItem(minute)"  type="button" class="ivu-btn ivu-btn-primary ivu-btn-small" style="float: right;"><i
                        class="ivu-icon ivu-icon-android-delete"></i>
                    <span>Delete</span>
                </button>
                <div class="ivu-tag ivu-tag-green">
                    <span class="ivu-tag-text">
                        <i class="ivu-icon ivu-icon-clock"></i>
                        {{minute.time}}
                    </span>
                </div>
                <div class="ivu-tag ivu-tag-blue ivu-tag-border" v-for="person in minute.people">
                    <span class="ivu-tag-text">
                        <i class="ivu-icon ivu-icon-ios-person"></i>
                 {{person}}
                    </span>
                </div>

                <div  class="ivu-tag ivu-tag-red ivu-tag-dot" v-if="minute.agenda">
                    <span class="ivu-tag-dot-inner"></span>
                    <span class="ivu-tag-text">{{minute.agenda}}</span>
                </div>

            </div>
        </div>
    </li>
</template>
<script>
    export default {
        props: ['minute'],
        methods: {
            deleteItem: function (item) {
                this.$emit('delete-item', item)
            },
            editItem: function (item) {
                this.$emit('edit-item', item)
            },
            addItemAfter:function(item){
                this.$emit('add-item-after', item)
            }
        }
    }
</script>
