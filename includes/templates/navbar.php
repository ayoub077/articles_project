<header>

			<div>logo</div>

			<div>
				<ul class="ul1">
					<li>name</li>
					<li>name</li>
					<li>name</li>
					<li>name</li>
					<?php
						if(isset($_SESSION["username"])){echo '
							<li class="settings">
						settings
						<ul class="dropdown-menu-settings">
							<li><a href="dashboard.php">dashbord</a></li>
							<li><a href="profile.php">profile</a></li>
							<li><a href="logout.php">logout<a></li>
						</ul>
					</li>';
						}else{
							echo "<li class='settings'><a href='sign-in.php'>sign-in</a></li>";
						}
					?>
					
				</ul>
			</div>

		</header>