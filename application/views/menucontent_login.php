<nav class="navbar navbar-default navbar-fixed-top" role="navigation"  style="background: #c1e2b3">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">{title}</a>
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
                        <a class="page-scroll" href="/History">History</a>
                    </li>
                    <li>
                        <form action="/Home/login" method="post">
						    <div class = "form-group form-inline control-group info">
                                <select name="username">
                                    {players}
                                        <option value="{Player}">{Player}</option>
                                    {/players}
                                </select>
						    	<input type="submit" class="btn btn-info btn-md" value="Login">
						    </div>
						<form> 
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>