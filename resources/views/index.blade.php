<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Book</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12 col-sm-offset-2 p-0">
        <div id="app">
          <div class="text-center">
          <div class="pt-4 main-header">
            <h3>
              <b>AppBooks</b>
              <span>is a powerful book management app </span>
              <br/>
              <small>
                 Using appBooks is fun and easy, allowing you to quickly find any book in your library.
              </small>
            </h3>
          </div>
          <the-navigation></the-navigation>
        </div>
        <div class="content pb-4">
          <router-view/>
        </div>
      </div>
        </div>
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
