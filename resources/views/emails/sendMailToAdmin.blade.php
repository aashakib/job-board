<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h4>Dear {{$name}}</h4>
<p>There is a new job post for the approval process.</p>
<p>Here is the detail:</p>
<p><strong>Job Title</strong>: {{$title}}</p>
<p><strong>Job Detail</strong>: <br/>{!! $description !!}</p>
<p><strong>Email:</strong>: <a mailto="{{$userEmail}}">{{$userEmail}}</a></p>
<br/>
<p>To approve the job, click <a href="{{$approveUrl}}">here</a></p>
<p>To deny the job, click <a href="{{$spamUrl}}">here</a></p>
<p></p>
<p>Regards</p>
<p><strong>Job Board Team</strong></p>
</body>
</html>