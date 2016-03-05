/*
* Basic Count Down to Date and Time
* Author: @mrwigster / trulycode.com
*/
(function (e) {
  e.fn.countdown = function (t, n) {
  function i() {
    eventDate = Date.parse(r.date) / 1e3;
    currentDate = Math.floor(e.now() / 1e3);
    if (eventDate <= currentDate) {
      n.call(this);
      clearInterval(interval)
    }
    seconds = eventDate - currentDate;
    days    = Math.floor(seconds / 86400);
    seconds -= days * 60 * 60 * 24;
    hours   = Math.floor(seconds / 3600);
    seconds -= hours * 60 * 60;
    minutes = Math.floor(seconds / 60);
    seconds -= minutes * 60;
    days    == 1 ? thisEl.find(".timeRefDays").text(r.day_s) : thisEl.find(".timeRefDays").text(r.day_m);
    hours   == 1 ? thisEl.find(".timeRefHours").text(r.hour_s) : thisEl.find(".timeRefHours").text(r.hour_m);
    minutes == 1 ? thisEl.find(".timeRefMinutes").text(r.min_s) : thisEl.find(".timeRefMinutes").text(r.min_m);
    seconds == 1 ? thisEl.find(".timeRefSeconds").text(r.sec_s) : thisEl.find(".timeRefSeconds").text(r.sec_m);
    
    days    = String(days).length >= 2 ? days : "0" + days;
    hours   = String(hours).length >= 2 ? hours : "0" + hours;
    minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
    seconds = String(seconds).length >= 2 ? seconds : "0" + seconds

    if (!isNaN(eventDate)) {
      thisEl.find(".days").text(days);
      thisEl.find(".hours").text(hours);
      thisEl.find(".minutes").text(minutes);
      thisEl.find(".seconds").text(seconds)
    } 
  }
  var thisEl = e(this);
  var r = {
    date: null,
    day_s: 'day',
    day_m: 'days',
    hour_s: 'hour',
    hour_m: 'hours',
    min_s: 'minute',
    min_m: 'minutes',
    sec_s: 'second',
    sec_m: 'second'
   };
  t && e.extend(r, t);
  i();
  interval = setInterval(i, 1e3)
  }
  })(jQuery);