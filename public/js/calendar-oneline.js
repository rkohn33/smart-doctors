CalendarOneline = function($calendar, showDateCount = 5){
    const exportDateFormat = 'YYYY-MM-DD';
    const dataDateFormat = 'YYYYMMDD';
    const event = new Event('dateselected');
    var self = this;
    let momentToday = moment();

    self.selectedDate = momentToday.format(exportDateFormat);

    $calendar.append(`<div id="h-calendar-container"></div>`);
    $calendarBody = $($calendar).find('#h-calendar-container');
    for(let i=0; i<showDateCount; i++){
        let date = moment().add(i, 'days');
        $calendarBody.append(`
            <div class="px-2 ml-2 mr-2 d-flex btn h-calendar-date-selector ${date.isSame(momentToday, 'day') ? 'h-calendar-date-today': ''}  ${i == 0 ? 'h-calendar-date-selected' : ''}" data-date="${date.format(dataDateFormat)}">
                 <div>
                   <p class="m-0 h-calendar-day" style="font-size: 36px;">${date.format('D')}</p>
                 </div>
                 <div class="mt-1 ml-2">
                   <p class="m-0 h-calendar-weekday">${date.format('ddd')}</p>
                   <p class="m-0 h-calendar-month">${date.format('MMM')}</p>
                 </div>
            </div>
        `) 
    }

    $(document).on('click', '.h-calendar-date-selector', function(e){
      console.log('Date clicked: ' + $(this).data('date'));
      $('#h-calendar-container .h-calendar-date-selected').removeClass('h-calendar-date-selected');
      $(this).addClass('h-calendar-date-selected');
      self.selectedDate = moment($(this).data('date'), dataDateFormat).format(exportDateFormat);
      self.dispatchEvent(event);
    })    
    
    return this;
}