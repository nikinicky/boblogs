<!doctype html>                                                                     
<html lang="en" ng-app="todoApp"> 
    <head>                                                                          
        <meta charset="utf-8"> 
        <title>                                                                     
            @section('title') 
            bo bo bo blogs !                                                    
            @show 
        </title>                                                                    
        @section('css')                                                             
        <link rel="stylesheet" href="{!! asset('css/style.css') !!}"/>                
        <link href="/css/app.css" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!--AngularJS-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js"></script>
        <script src="js/app.js"></script>
        @show 
    </head>                                                                         
    <body>                                                                          
        <header> 
            <h1>boblogs</h1> 
            <nav>                                                                   
                <ul>                                                                
                    <li><a href="{!! URL::route('home')  !!}">Home</a></li> 
                    <li><a href="{!! URL::route('about') !!}">About</a></li> 
                    @if (Auth::guest())
                      @if (Request::is('auth/login'))
                      <li><a href="{!! url('/auth/register') !!}">Register</a></li> 
                      @else
                      <li><a href="{!! url('/auth/login') !!}">Login</a></li> 
                      @endif
                    @else
                    <li><a href="{!! url('/todoapp') !!}">Todo List</a></li> 
                    <li><a href="{!! url('/auth/logout') !!}">Logout</a></li> 
                    @endif
                </ul> 
            </nav> 
        </header> 
        <section id="content"> 
            @yield('content') 
        </section> 
        <footer> 
            @section('footer') 
            <p>Powered by <a href="http://laravel.com" target="_blank">Laravel</a>. Copyright &copy; Pondok Programmer 2014</p> 
            @show 
        </footer> 
        @section('script') 
        @show 

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body> 
</html>
