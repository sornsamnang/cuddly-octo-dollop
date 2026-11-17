<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <!-- web title -->
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="description" content="The small framework with powerful features">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="https://laravel.com/img/favicon/favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>

  <!-- moment.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.31.0/moment.min.js"></script>
  
  <!-- Styles / Scripts -->
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
</head>

<body>

  {{ $slot }}

  @if (session("success"))
    <div class="toast theme-success show position-fixed bottom-0 m-3" 
      role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button 
          type="button" 
          class="btn-close" 
          data-bs-dismiss="toast" 
          aria-label="Close">
        </button>
      </div>
      <div class="toast-body">
        {{ session("success") }}
      </div>
    </div>
  @endif
  
  <!-- swiper.js -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@14.0.1/swiper-bundle.min.js"></script>
  <!-- bootstrap -->
  <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>

  <script>
    // add pagination card
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 8,
      pagination: {
        el: ".swiper-pagination",
        clickable: true, // <-- This makes the bullets clickable
      },
    });
  </script>
</body>
</html>