<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h4>Dear {{$name}}</h4>
<p>There is a new job post for the approval process.</p>
<br/>
<p>Here is the detail:</p>
<br/>
<p><strong>Job Title</strong>: {{$title}}</p>
<p><strong>Job Detail</strong>: <br/>{!! $description !!}</p>
<p><strong>Email:</strong>: <a mailto="{{$userEmail}}">{{$userEmail}}</a></p>
<br/>
<p>Regards</p>
<p><strong>Job Board Team</strong></p>
</body>
</html>