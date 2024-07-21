
<div class="top-bar">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-6">
                    <div class="navbar-menu-left-side239">
                        <ul>
                            <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>Contact</a></li>
                            <li><a href="#"><i class="fa fa-headphones" aria-hidden="true"></i>Support</a></li>
                            <li><a href="logIn.html"><i class="fa fa-user" aria-hidden="true"></i>Login Area</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="navbar-serch-right-side">
                        <form class="navbar-form" role="search">
                            <div class="input-group add-on">
                                <input class="form-control form-control222" placeholder="Search" id="srch-term" type="text">
                                <div class="input-group-btn">
                                    <button class="btn btn-default btn-default2913" type="button"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    
    
    <!-- ==========header mega navbar=======-->
    <div class="top-menu-bottom932">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="/"><img src="/image/logo.png" alt="Logo"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav"> </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('askquestion') }}">Ask Question</a></li>
                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                @foreach($getCategories as $category)
                                    <li><a href="/category/{{$category->slug}}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                       
                        <!-- <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="blog.html">Blog </a></li>
                            </ul>
                        </li> -->
                        <li><a href="{{ route('contact') }}">Contact us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>