<!DOCTYPE html>
<html>

<head>
    <title>SportsMate</title>
    <link rel="shortcut icon" type="image/png" href="{{ Storage::url(setting()->icon) }}"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
   @if (direction() == 'ltr')
      <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
      <link rel="stylesheet" href="{{ url('/') }}/design/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{ url('/') }}/player/css/style.css">

    @else
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
      <link rel="stylesheet" href="{{ url('/') }}/player/css/rtl.css">
      <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
      <style>
        body{
          font-family: 'Cairo', sans-serif;
        }
      </style>
    @endif
    <link rel="stylesheet" href="{{ url('/') }}/css/croppie.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ url('/') }}/design/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/design/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
</head>

<body>
