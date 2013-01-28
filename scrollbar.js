(function ($) {
  Drupal.behaviors.scrollbar = {
    attach: function (context, settings) {
      var $element = settings.scrollbar.element;
      $($element+", .demo-class").jScrollPane({
        showArrows: (settings.scrollbar.showArrows === 'true'), // jScrollpane needs clear true or false, not quoted text
        arrowScrollOnHover: (settings.scrollbar.arrowScrollOnHover === 'true'),
        mouseWheelSpeed: settings.scrollbar.mouseWheelSpeed,
        arrowButtonSpeed: settings.scrollbar.arrowButtonSpeed,
        arrowRepeatFreq: settings.scrollbar.arrowRepeatFreq,
        horizontialGutter: settings.scrollbar.horizontialGutter,
        verticalGutter: settings.scrollbar.verticalGutter,
        verticalDragMinHeight: settings.scrollbar.verticalDragMinHeight,
        verticalDragMaxHeight: settings.scrollbar.verticalDragMaxHeight,
        verticalDragMinWidth: settings.scrollbar.verticalDragMinWidth,
        verticalDragMaxWidth: settings.scrollbar.verticalDragMaxWidth,
        horizontialDragMinHeight: settings.scrollbar.horizontialDragMinHeight,
        horizontialDragMaxHeight: settings.scrollbar.horizontialDragMaxHeight,
        horizontialDragMinWidth: settings.scrollbar.horizontialDragMinWidth,
        horizontialDragMaxWidth: settings.scrollbar.horizontialDragMaxWidth,
        verticalArrowPositions: settings.scrollbar.verticalArrowPositions,
        horizontialArrowPositions: settings.scrollbar.horizontialArrowPositions,
        autoReinitialize: (settings.scrollbar.autoReinitialize === "true"),
        autoReinitializeDelay: settings.scrollbar.autoReinitializeDelay
      });
    // Debugging settings. Uncomment the line below to test.
    // console.log(settings.scrollbar);
    }
  };
}(jQuery));
