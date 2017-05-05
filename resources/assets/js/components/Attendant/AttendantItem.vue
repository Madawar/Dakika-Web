<template>
    <li class="ivu-menu-item" style="color: white; padding: 10px 24px !important;">
        <i class="ivu-icon ivu-icon-ios-person-outline"></i>
        {{attendant.attendant}} - {{attendant.acronym}}
    </li>

</template>
<script>
    export default {
        props: ['attendant'],
        data: function () {
            return {
                activeClass: 'green',
                errorClass: 'gray',
            }
        },
        methods: {
            deleteItem: function (item) {
                this.$emit('delete-item', item)
            },
            userPresent: function (item) {
                this.$emit('user-present', item)
            }
        }
    }
</script>
<style scoped>
    .ivu-menu-dark.ivu-menu-vertical .ivu-menu-item:hover, .ivu-menu-dark.ivu-menu-vertical .ivu-menu-submenu-title:hover {
        color: #fff !important;
        background: #5b6270 !important;
    }
</style>
