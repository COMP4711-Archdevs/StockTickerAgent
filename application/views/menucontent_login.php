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
                        <a class="page-scroll" href="/Portfolio/detail/Henry">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/Login">Login</a>
                    </li>
<!--                <li>
                        <form action="/Home/login" method="post">
						    <div class = "form-group form-inline control-group info">
                                <select name="username" class="form-control input-sm">
                                    {players}
                                        <option value="{Player}">{Player}</option>
                                    {/players}
                                </select>
						    	<input type="submit" class="btn btn-default btn-sm" value="Login">
						    </div>
						<form> 
                    </li>-->
                    <li>
                        <a class="page-scroll" href="/Register">Register</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>