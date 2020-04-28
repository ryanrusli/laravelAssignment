<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
    		Hello {{ Session::get('lecturerid') }}, <a href="logout">Logout</a>
			<br><br>
			<a href="lectureradd">+ Lecturer</a><br><br>
			<br><br>
			<table border="1">
				<tr>
					<th>Lecturer ID</th>
					<th>Name</th>
				</tr>
        				@foreach ($lecturers as $key => $lecturer)
				<tr>
					<td>
					{{ $lecturer->lecturer_id }}
					</td>
					<td>
					{{ $lecturer->name }}
					</td>
				</tr>
				@endforeach
			</table>
    </body>
</html>
