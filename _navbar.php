
<nav class="navbar navbar-default">
  	<div class="container">
    	<div class="navbar-header">
      		<a class="navbar-brand" href="/">Books</a>
    	</div>


    	<?php if ($logged_in_user) { ?>
	    	<ul class="nav navbar-nav">
            <?php if ($is_admin) { ?>
                <li><a href="approve.php">Approve Users</a></li>
            <?php } ?>
	        	<li><a href="logout.php">Logout</a></li>
	      	</ul>


    	<?php } else { ?>
	    	<ul class="nav navbar-nav navbar-right">
	        	<li><a href="register.php">Register</a></li>
	        	<li><a href="login.php">Login</a></li>
	      	</ul>
    	<?php } ?>





    	<?php if ($logged_in_user) { ?>
			<form class="navbar-form navbar-right" method="GET" action="<?= BASE_URL; ?>search.php">
        		<div class="input-group">
      				<input type="text" name="title" class="form-control" placeholder="Search books...">
      				<span class="input-group-btn">
        				<button class="btn btn-default">
        					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        				</button>
			      	</span>
			    </div>
     		</form>
    	<?php } ?>
  	</div>
</nav>
