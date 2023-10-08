@extends('layouts.header')

@section('customCss')
<link href="/assets/js-year-calendar/dist/js-year-calendar.min.css" rel="stylesheet" type="text/css" />


    <style>
        body {
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
}

#events-log {
  display: inline-block;
  vertical-align: top;
  width: 340px;
  background-color: #e5e5e5;
  padding: 10px;
  min-height: 200px;
  border-radius: 10px;
}

#events-log div {
  font-family: Consolas, "Liberation Mono", Menlo, Courier, monospace;
  font-size: 14px;
  line-height: 1.4;
}

#calendar {
  display: inline-block;
  vertical-align: top;
  width: calc(100% - 380px);
}
    </style>
@endsection

@section('konten')
<div id="events-log">
    <h3>Events</h3>
    
  </div>
  <div id="calendar"></div>
@endsection

@section('customJs')
<script src="\assets\js-year-calendar\dist\js-year-calendar.min.js"></script>


    <script>


        const currentYear = new Date().getFullYear();

// Initialize calendar
new Calendar('#calendar', {
  dataSource: [
    { startDate: new Date(currentYear, 2, 1), endDate: new Date(currentYear, 2, 10) },
    { startDate: new Date(currentYear, 2, 5), endDate: new Date(currentYear, 2, 15) },
    { startDate: new Date(currentYear, 7, 17), endDate: new Date(currentYear, 7, 17) },

  ],
  enableRangeSelection: true
})

// Register events
document.querySelector('#calendar').addEventListener('clickDay', function(e) {
  appendLog("Click on day: " + e.date.toLocaleDateString() + " (" + e.events.length + " events)")
})

document.querySelector('#calendar').addEventListener('dayContextMenu', function(e) {
  appendLog("Right-click on day: " + e.date.toLocaleDateString() + " (" + e.events.length + " events)")
})

document.querySelector('#calendar').addEventListener('selectRange', function(e) {
  appendLog("Select a range: " + e.startDate.toLocaleDateString() + " - " + e.endDate.toLocaleDateString())
})

document.querySelector('#calendar').addEventListener('yearChanged', function(e) {
  appendLog("Year changed: " + e.currentYear)
})

document.querySelector('#calendar').addEventListener('renderEnd', function(e) {
  appendLog("Render end: " + e.currentYear)
})



function appendLog(log) {
  var logElt = document.createElement('div');
  logElt.textContent = log;
  document.querySelector('#events-log').appendChild(logElt);
}
    </script>
@endsection
