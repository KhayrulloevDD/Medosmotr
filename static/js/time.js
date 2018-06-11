$(document).ready( function() {

    var currentDoc = 0;

    $('.getdoctype').click( function(event) {
      currentDoc = +event.target.dataset.id;
    });

    $('#time').change( function(event) {
      var option = $('option:selected', event.target).get(0);
      var button = $('#submit').get(0);

      if (option.value === '0') {
          button.disabled = true;
          return;
      }

      $.ajax({
         url: '/user/' + currentDoc + '/isFree',
         type: 'POST',
         data: {
             time: option.value
         },
          beforeSend: function() {
            button.disabled = true;
          },
          success : function(response) {
             var isfree = JSON.parse(response);

             if (!isfree) {
                 alert('На это время врач занят, выберите другое время..');
                 return;
             }

             button.disabled = false;
          }
      });
    });

    $('#date').change( function(event) {
       var date = event.currentTarget.valueAsDate;
       var selectedDate = new Date(date);
       var button = $('#submit').get(0);

       var datetime = $('#time').get(0);
       datetime.innerHTML = '';

       $.ajax({
           url : '/user/' + currentDoc + '/getSchedule',
           type: "POST",
           data: {
               day: selectedDate.getDay()
           },
           beforeSend: function(event) {
              datetime.disabled = true;
              button.disabled = true;
           },
           success: function(response) {
               var schedule = JSON.parse(response);

               if (!schedule) {
                   return;
               }

               if (+schedule.day_off === 1) {
                   alert('У врача сегодня выходной');
                   return;
               }

               var start_time = schedule.start_time,
                   end_time = schedule.end_time;

               start_time = start_time.split(':');
               end_time = end_time.split(':');

               var start_hour = parseInt(start_time[0]),
                   start_minute = parseInt(start_time[1]);

               var end_hour = parseInt(end_time[0]),
                   end_minute = parseInt(end_time[0]);

               var counter = 0;

               var defaultOption = document.createElement('option');
               defaultOption.value = '0';
               defaultOption.innerText = 'Выберите время';
               datetime.appendChild(defaultOption);

               while ( ( start_hour != end_hour && start_minute != end_minute ) ) {
                  counter ++;
                  if (start_hour === 12){
                    start_hour++;
                    continue;
                  }
                  var option = document.createElement('option');
                  var start_minute_str = (start_minute === 0) ? '00' : start_minute;
                  option.value = start_hour + ':' + start_minute_str;
                  option.innerHTML = start_hour + ':' + start_minute_str;

                  datetime.appendChild(option);
                  start_minute += 15;

                  if (start_minute === 60) {
                      start_hour++;
                      start_minute = 0;
                  }

                  // escape infinite loop
                  if (counter === 100) {
                      break;
                  }
               }

               datetime.disabled = false;
           }
       })
    });

});