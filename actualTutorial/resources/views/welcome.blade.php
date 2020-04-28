    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
    <h1>Login</h1>
    @if(session()->has('message'))
        {{ session()->get('message') }}
    @endif
            
        {{ Form::open(array('action' => 'Admin\LecturerCrudController@login')) }}
        <input type="text" name="lecturerid" placeholder="Lecturer ID">
        <input type="text" name="lecturername" placeholder="Name">
        <input type="submit" name="submit" value="Submit">
    </form>
    </body>
</html>
