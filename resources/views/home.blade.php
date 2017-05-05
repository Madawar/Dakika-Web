<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all"/>
    <title>Dakika</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- Styles -->

</head>
<body>
<div id="app">
    <layout :meeting_id="meeting.id"></layout>
    <modal v-model="meeting"></modal>
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
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
