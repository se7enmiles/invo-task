<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
	<!-- START X-NAVIGATION -->
	<ul class="x-navigation">
		<li class="xn-profile">
			<a href="#" class="profile-mini">
				<img src="/template/assets/images/users/avatar.png" alt=""/>
			</a>
			<div class="profile">
				<div class="profile-image">
					<img src="/template/assets/images/users/avatar.png" alt=""/>
				</div>
				<div class="profile-data">
					<?php if(User::isGuest()): ?>
						<div class="profile-data-name">Guest</div>
						<div class="alert">
	                        <div class="profile-data-name">
	                            <a href="/user/login" class="btn btn-success btn-block">Login</a>
	                        </div>
						</div>
						<div class="alert">
							<div class="profile-data-name">
								<a href="/user/register" class="btn btn-default btn-block">Register</a>
							</div>
						</div>
					<?php else: ?>
						<div class="profile-data-name">User</div>
					<?php endif; ?>
				</div>
			</div>
		</li>
		<li class="xn-title">Navigation</li>
        <li class="active">
            <a href="/admin"><span class="fa fa-gears"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        <li class="active">
            <a href="/books"><span class="fa fa-book"></span> <span class="xn-text">Books</span></a>
        </li>
        <li class="active">
            <a href="/authors"><span class="fa fa-user"></span> <span class="xn-text">Authors</span></a>
        </li>

	</ul>
	<!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->