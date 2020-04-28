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
			
    			{{ Form::open(array('action' => 'Admin\LecturerCrudController@lectureraddsave')) }}
				{{ Form::text('lecturer_id', "", array("placeholder" => "Lecturer ID", "required" => "")) }}
				{{ Form::text('name', "", array("placeholder" => "Name", "required" => "")) }}
				<input type="submit" name="submit" value="Save">
			</form>
    </body>
</html>
