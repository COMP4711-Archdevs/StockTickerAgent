
<nav class="navbar navbar-default navbar-fixed-top" role="navigation"  style="background: #c1e2b3">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h2><small>{title}</small></h2>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/Home">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/Stocks">Stock</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/Portfolio/detail/{user}">Porfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/Admin">Manage Users</a>
                    </li>
                    <li>
                        <a href="/Home/logout">Logout</a>
                    </li>
                    <li>
                        <a href="">Welcome back {user}</a>
                    </li>
                    <li>
                        <img src="/uploads/{user}.gif" width="50" height="50"
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

