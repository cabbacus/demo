// =============================================================================
// Page Loader
// =============================================================================

barberry.pageLoader = function () {
  if (barberry_scripts_vars.page_loader == '0') {
    return
  }

  if ($('#header-loader-under-bar').length) {
    NProgress.configure({
      template: '<div class="bar" role="bar"></div>',
      parent: '#header-loader',
      showSpinner: false,
      easing: 'ease',
      minimum: 0.3,
      speed: 500,
    })
  }

  $('#bb-container').addClass('fade_in').removeClass('fade_out')
  $('#header-loader-under-bar').addClass('hidden')
  NProgress.start()
  NProgress.done()

  $(window).on('beforeunload', function () {
    $('#bb-container').addClass('fade_out').removeClass('fade_in')
    $('#header-loader-under-bar').removeClass('hidden')
  })
}
