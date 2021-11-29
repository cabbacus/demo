// =============================================================================
// WooCommerce CountDown Timer
// =============================================================================

barberry.countDownTimer = function () {
  $('.barberry-timer').each(function () {
    var $this = $(this)
    dayjs.extend(window.dayjs_plugin_utc)
    dayjs.extend(window.dayjs_plugin_timezone)
    var time = dayjs.tz($this.data('end-date'), $this.data('timezone'))
    $(this).countdown(time.toDate(), function (event) {
      $(this).html(
        event.strftime(
          '' +
            '<span class="countdown-days">%-D <span>' +
            barberry_scripts_vars.countdown_days +
            '</span></span> ' +
            '<span class="countdown-hours">%H <span>' +
            barberry_scripts_vars.countdown_hours +
            '</span></span> ' +
            '<span class="countdown-min">%M <span>' +
            barberry_scripts_vars.countdown_mins +
            '</span></span> ' +
            '<span class="countdown-sec">%S <span>' +
            barberry_scripts_vars.countdown_sec +
            '</span></span>'
        )
      )
    })
  })
}
