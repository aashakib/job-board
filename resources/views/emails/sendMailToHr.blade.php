<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h4>Dear {{$name}}</h4>
		<p>Your posted job is in under approval process. You will be shortly notified after approval.</p>
		<br/>
		<p>Here is the detail</p>
		<p><strong>Job Title</strong>: {{$title}}</p>
		<p><strong>Job Detail</strong>: <br/>{!! $description !!}</p>
		<br/>
		<p>Regards</p>
		<p><strong>Job Board Team</strong></p>
	</body>
</html>