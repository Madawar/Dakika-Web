<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all"/>
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- Styles -->
    <style>
        .layout {
            border: 1px solid #d7dde4;
            background: #f5f7f9;
        }

        .layout-logo {
            width: 100px;
            height: 30px;
            background: #5b6270;
            border-radius: 3px;
            float: left;
            position: relative;
            top: 15px;
            left: 20px;
        }

        .layout-nav {
            width: 500px;
            margin: 0 auto;
        }

        .layout-assistant {
            width: 400px;
            margin: 0 auto;
            height: inherit;
        }

        .layout-breadcrumb {
            padding: 10px 15px 0;
        }

        .layout-content {

            margin: 15px;
            overflow: hidden;
            background: #fff;
            border-radius: 4px;
        }

        .layout-content-main {
            padding: 10px;
        }

        .layout-copy {
            text-align: center;
            padding: 10px 0 20px;
            color: #9ea7b4;
        }
    </style>

</head>
<body>

<div class="layout">
    <ul data-v-2260970d="" class="ivu-menu ivu-menu-dark ivu-menu-horizontal">
        <div class="layout-logo">Dakika</div>
        <div class="layout-nav">
            <li class="ivu-menu-item ivu-menu-item-active ivu-menu-item-selected">
                <i class="ivu-icon ivu-icon-ios-navigate"></i>
                Your Meetings
            </li>
            <li class="ivu-menu-item">
                <i class="ivu-icon ivu-icon-ios-keypad"></i>
                Subscribe
            </li>
            <li class="ivu-menu-item">
                <i class="ivu-icon ivu-icon-ios-paper"></i>
                About Us
            </li>
        </div>
    </ul>
    <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
        <div class="layout-assistant">
            <li class="ivu-menu-item ivu-menu-item-active ivu-menu-item-selected">Word</li>
            <li class="ivu-menu-item">PDF</li>
            <li class="ivu-menu-item">OneNote</li>
            <li class="ivu-menu-item">Evernote</li>

        </div>
    </ul>
    <div data-v-2260970d="" class="layout-content">
        <div data-v-2260970d="" class="ivu-row">
            <div data-v-2260970d="" class="ivu-col ivu-col-span-5">
                <ul data-v-2260970d="" class="ivu-menu ivu-menu-light ivu-menu-vertical" style="width: auto;">
                    <li data-v-2260970d="" class="ivu-menu-submenu ivu-menu-item-active ivu-menu-opened">
                        <div class="ivu-menu-submenu-title"><i data-v-2260970d=""
                                                               class="ivu-icon ivu-icon-ios-navigate"></i>
                            导航一
                            <i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></div>
                        <ul class="ivu-menu">
                            <li data-v-2260970d="" class="ivu-menu-item">选项 1</li>
                            <li data-v-2260970d=""
                                class="ivu-menu-item ivu-menu-item-active ivu-menu-item-selected">选项 2
                            </li>
                            <li data-v-2260970d="" class="ivu-menu-item">选项 3</li>
                        </ul>
                    </li>
                    <li data-v-2260970d="" class="ivu-menu-submenu">
                        <div class="ivu-menu-submenu-title"><i data-v-2260970d=""
                                                               class="ivu-icon ivu-icon-ios-keypad"></i>
                            导航二
                            <i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></div>
                        <ul class="ivu-menu" style="display: none;">
                            <li data-v-2260970d="" class="ivu-menu-item">选项 1</li>
                            <li data-v-2260970d="" class="ivu-menu-item">选项 2</li>
                        </ul>
                    </li>
                    <li data-v-2260970d="" class="ivu-menu-submenu">
                        <div class="ivu-menu-submenu-title"><i data-v-2260970d=""
                                                               class="ivu-icon ivu-icon-ios-analytics"></i>
                            导航三
                            <i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></div>
                        <ul class="ivu-menu" style="display: none;">
                            <li data-v-2260970d="" class="ivu-menu-item">选项 1</li>
                            <li data-v-2260970d="" class="ivu-menu-item">选项 2</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div data-v-2260970d="" class="ivu-col ivu-col-span-19">
                <div data-v-2260970d="" class="layout-content-main">内容区域</div>
            </div>
        </div>
    </div>
</div>


<script>
    new Vue({
        el: '#app',
        mounted: function () {

        },
        data: {
            meeting: {
                title: null,
                location: null
            }
        }


    });
</script>
</body>
</html>
