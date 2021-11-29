// =============================================================================
// Lazy Load
// =============================================================================

barberry.lazyLoad = function () {
  let images = document.querySelectorAll('.lazy')

  new LazyLoad(images, {
    threshold: 0.2,
  })
}
