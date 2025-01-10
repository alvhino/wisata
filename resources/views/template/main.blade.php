<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <title>@yield('title', 'Destinasi Wisata Jepara')</title>

    @yield('styles')
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Admin Destinasi Wisata</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						halaman
					</li>

					<li class="sidebar-item ">
    <a class="sidebar-link" href="{{url('/wisata')}}">
        <i class="align-middle" data-feather="map"></i> <span class="align-middle">Data Wisata</span>
    </a>
</li>

<li class="sidebar-item ">
    <a class="sidebar-link" href="{{url('/cafe')}}">
        <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Data Cafe/Restaurant</span>
    </a>
</li>

<li class="sidebar-item ">
    <a class="sidebar-link" href="{{url('/desa')}}">
        <i class="align-middle" data-feather="home"></i> <span class="align-middle">Data Desa Wisata</span>
    </a>
</li>

<li class="sidebar-item ">
    <a class="sidebar-link" href="{{url('/makanan')}}">
        <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Data Makanan</span>
    </a>
</li>

<li class="sidebar-item ">
    <a class="sidebar-link" href="{{url('/')}}">
        <i class="align-middle" data-feather="grid" ></i> <span class="align-middle">Dashbooard</span>
    </a>
</li>

<li class="sidebar-item ">
    <a class="sidebar-link" href="{{url('/logout')}}" data-toggle="modal" data-target="#logoutModal">
        <i class="align-middle" data-feather="log-out" ></i> <span class="align-middle">Logout</span>
    </a>
</li>

	</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

                @yield('content')

                </div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Admin</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Destinasi Wisata Jepara</strong></a>								&copy;
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-info" href="{{url('/logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
	<!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Line chart
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");

            new Chart(ctx, {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,  
                        borderColor: window.theme.primary,
                        data: [2115, 1562, 1584, 1892, 1587, 1923, 2566, 2448, 2805, 3438, 2917, 3327]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: { display: false },
                    tooltips: { intersect: false },
                    hover: { intersect: true },
                    plugins: { filler: { propagate: false } },
                    scales: {
                        xAxes: [{ reverse: true, gridLines: { color: "rgba(0,0,0,0.0)" } }],
                        yAxes: [{
                            ticks: { stepSize: 1000 },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: { color: "rgba(0,0,0,0.0)" }
                        }]
                    }
                }
            });

            // Additional chart scripts can go here...

        });
	</script>
	<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
</script>

</body>

</html>