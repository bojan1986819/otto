<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>

            <!-- Branding Image -->
            <div class="branding social">
                <a href="http://www.imdb.com/name/nm3466336/" target="_blank"><img src="{{ route('imagecache',['template'=>'social',
                    'filename'=>'imdb_icon3.png']) }}" alt="IMdb" class="hover"></a>
                <a href="https://vimeo.com/ottobanovits" target="_blank"><img src="{{ route('imagecache',['template'=>'social',
                    'filename'=>'vimeo_icon1.png']) }}" alt="Vimeo" class="hover"></a>
                <br class="visible-lg visible-md">
                <a href="https://www.linkedin.com/in/otto-banovits-a3171b65" target="_blank"><img src="{{ route('imagecache',['template'=>'social',
                    'filename'=>'linkedin_icon1.png']) }}" alt="LinkedIn" class="hover"></a>
                <a href="https://www.youtube.com/user/obanovits1" target="_blank"><img src="{{ route('imagecache',['template'=>'social',
                    'filename'=>'youtube-icon1.png']) }}" alt="LinkedIn" class="hover"></a>
            </div>
            <div class="branding">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <div class="social-small">
                        <a href="http://www.imdb.com/name/nm3466336/" target="_blank"><img src="{{ route('imagecache',['template'=>'social',
                    'filename'=>'imdb_icon3.png']) }}" alt="IMdb" class="hover"></a>
                        <a href="https://vimeo.com/ottobanovits" target="_blank"><img src="{{ route('imagecache',['template'=>'social',
                    'filename'=>'vimeo_icon1.png']) }}" alt="Vimeo" class="hover"></a>
                        <a href="https://www.linkedin.com/in/otto-banovits-a3171b65" target="_blank"><img src="{{ route('imagecache',['template'=>'social',
                    'filename'=>'linkedin_icon1.png']) }}" alt="LinkedIn" class="hover"></a>
                        <a href="https://www.youtube.com/user/obanovits1" target="_blank"><img src="{{ route('imagecache',['template'=>'social',
                    'filename'=>'youtube-icon1.png']) }}" alt="LinkedIn" class="hover"></a>
                    </div>
                </ul>


            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right col-xs-9">
                <li class="col-sm-3"><a class="nav-header-button" href="{{ route('projects') }}">PROJECTS</a></li>
                <li class="col-sm-3"><a class="nav-header-button" href="{{ route('press') }}">PRESS</a></li>
                <li class="col-sm-4"><a class="nav-header-button" href="{{ route('aboutme') }}">ABOUT ME</a></li>
                <li class="col-sm-2"><a class="nav-header-button" href="{{ route('contact') }}">CONTACT</a></li>
            </ul>
        </div>
    </div>
</nav>