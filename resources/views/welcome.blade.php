<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zilvinas & Monika</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
        <div id="app">
            <flipas class="no-mobile"></flipas>
            <food-form>

            </food-form>
        </div>
    </body>
</html>
<style>
    @media only screen and (max-width: 559px) {
        .no-mobile {
            display: none;
        }
    }
</style>