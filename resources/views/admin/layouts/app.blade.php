<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Commet Multipurpose Website</title>


		@include('admin.layouts.partials.style')

		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		@section('main-content')

        @show

	@include('admin.layouts.partials.scripts')

    </body>


</html>
