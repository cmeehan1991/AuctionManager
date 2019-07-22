@include('layouts.public-header')
<nav class="navbar navbar-dark fixed-top bg-dark navbar-expand-sm navbar-toggleable-sm">
	<a class="navbar-brand" href="/"><?php  echo $_SESSION['organization_name']; ?></a>
	<ul class="navbar-nav ml-auto" style="flex-direction:row">
		<li class="nav-item"><a class="nav-link" href=""><?php  echo $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name']; ?></a></li>
		<li class="nav-item"><a class="nav-link" href="">Log Out</a></li>
	</ul>
</nav>
<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2 d-md-block bg-light sidebar" id="sidebar" data-collapse="collapsed">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item active">
						<a class="nav-link" href="auction-manager#!/"><i class="fas fa-home"></i>Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="auction-manager#!/auctions"><i class="fas fa-gavel"></i>Auctions</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="auction-manager#!/auction-items"><i class="fas fa-list-ul"></i>Auction Items</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="auction-manager#!/attendees"><i class="fas fa-users"></i>Attendees</a>
					</li>
				</ul>
			</div>
		</nav>		
		<button class="sidebar-toggle" type="button" data-target="#sidebar" aria-label="Toggle sidebar" onclick="toggleSideBar();">
			<i class="fas fa-chevron-right"></i>
		</button>
		<main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
			<div ng-view></div>
			@yield('content')		
		</main>
	</div>
</div>
@include('layouts.public-footer')