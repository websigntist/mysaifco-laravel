<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Under Maintenance</title>
</head>
<body style="text-align: center; padding: 50px; font-family: Arial, sans-serif;">
    <h1>{{get_setting('maintenance_title')}}</h1>
    <img src="{{asset('assets/images/settings/'.get_setting('m_logo'))}}" width="500" alt="logo">
    <p>{{get_setting('content')}}</p>
</body>
</html>
