<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials._head')
</head>

<body>
  
    @include('partials._navigation')

    <div class="container">
      @include('partials._messages')

      @yield('content')

    </div>
    
    @include('partials._footer')

    @yield('scripts')  

</body>
</html>