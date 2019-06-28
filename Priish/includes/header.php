<header>
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-transparent justify-content-between">
	<a class="navbar-brand my-brand" href="/Priish/index.php">PRIISH<sup>TM</sup></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link my-active" href="/Priish/index.php">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">CONTACT</a>
      </li>
      <?php
		if(!isset($_SESSION['user'])){
		?>
			<li class="nav-item" id="login-btn">
				<a class="nav-link login-nav" href="/Priish/login.php">LOGIN</a>
			</li>
			
		
		<?php
		}
		?>
		<li class="nav-item">
			<a class="nav-link" href=""><i class="fa fa-search"></i> Search</a>
		</li>
		<?php
	if(isset($_SESSION['user'])){
		?>
			<li class="nav-item" id="login-btn">
				<a class="nav-link" href=""><i class="fas fa-user-tie"></i> <?php echo "&nbsp".ucwords(strtolower($_SESSION['user']['name'])) ?></a>
			</li>
		<?php
		}
		?>
      
      <?php
	if(isset($_SESSION['user'])){
		?>
			<li class="nav-item" id="login-btn">
				<a class="nav-link text-muted" href="/Priish/logout.php"><i class="fas fa-sign-out-alt"></i> &nbsp;Log Out</a>
			</li>
		<?php
		}
		?>
    </ul>
  </div>
	</nav>
</header>