<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gentallela Alela! | </title>

        <!-- Bootstrap core CSS -->

<!--        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">

         Custom styling plus plugins 
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/icheck/flat/green.css" rel="stylesheet">-->

        <link href="<?php  echo base_url().'assets/css/calendar/fullcalendar.css'?>" rel="stylesheet">
        <link href="<?php  echo base_url().'assets/css/calendar/fullcalendar.print.css'?>" rel="stylesheet" media="print">
 
<!--        <script src="js/jquery.min.js"></script>-->

        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>


  
                                 

                                        <div id='calendar'></div>

                        

<!--        <script src="js/bootstrap.min.js"></script>

        <script src="js/nprogress.js"></script>
         chart js 
        <script src="js/chartjs/chart.min.js"></script>
         bootstrap progress js 
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
         icheck 
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>

        <script src="js/moment.min.js"></script>-->
                                        <script src="../../assets/UI/js/moment.min.js" type="text/javascript"></script>
                                        <script src="../../assets/UI/js/jquery.min.js" type="text/javascript"></script>
                                        <script src="../../assets/UI/js/calendar/fullcalendar.min.js" type="text/javascript"></script>

        <script>
            $(window).load(function () {

                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var started;
                var categoryClass;

                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {
                        $('#fc_create').click();

                        started = start;
                        ended = end

                        $(".antosubmit").on("click", function () {
                            var title = $("#title").val();
                            if (end) {
                                ended = end
                            }
                            categoryClass = $("#event_type").val();

                            if (title) {
                                calendar.fullCalendar('renderEvent', {
                                        title: title,
                                        start: started,
                                        end: end,
                                        allDay: allDay
                                    },
                                    true // make the event "stick"
                                );
                            }
                            $('#title').val('');
                            calendar.fullCalendar('unselect');

                            $('.antoclose').click();

                            return false;
                        });
                    },
                    eventClick: function (calEvent, jsEvent, view) {
                        //alert(calEvent.title, jsEvent, view);

                        $('#fc_edit').click();
                        $('#title2').val(calEvent.title);
                        categoryClass = $("#event_type").val();

                        $(".antosubmit2").on("click", function () {
                            calEvent.title = $("#title2").val();

                            calendar.fullCalendar('updateEvent', calEvent);
                            $('.antoclose2').click();
                        });
                        calendar.fullCalendar('unselect');
                    },
                    editable: true,
                    events: [
                        {
                            title: 'All Day Event',
                            start: '2015-11-02',//new Date(y, m, 1)
                            allDay: false,
                            //color: 'grey',
                            textColor: 'black'
                    },
                        {
                            title: 'Long Event',
                            start: new Date(y, m, d - 5),
                            end: new Date(y, m, d - 2)
                    },
                        {
                            title: 'Meeting',
                            start: new Date(y, m, d, 10, 30),
                            allDay: false
                    },
                        {
                            title: 'Lunch',
                            start: new Date(y, m, d + 14, 12, 0),
                            end: new Date(y, m, d, 14, 0),
                            allDay: false
                    },
                        {
                            title: 'Birthday Party',
                            start: new Date(y, m, d + 1, 19, 0),
                            end: new Date(y, m, d + 1, 22, 30),
                            allDay: false
                    },
                        {
                            title: 'Click for Google',
                            start: new Date(y, m, 28),
                            end: new Date(y, m, 29),
                            url: 'http://google.com/'
                    }
                ]
                });
            });
        </script>
    </body>

</html>