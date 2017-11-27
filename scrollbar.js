(function ($, Drupal, drupalSettings) {

  'use strict';

  Drupal.behaviors.scrollbar = {
    attach: function (context, settings) {
      var $element = drupalSettings.scrollbar.element;
      $($element + ", .demo-class").jScrollPane({
        // jScrollpane needs clear true or false, not quoted text so we add this if statement
        showArrows: (drupalSettings.scrollbar.showArrows === 'true'),
        arrowScrollOnHover: (drupalSettings.scrollbar.arrowScrollOnHover === 'true'),
        maintainPosition: drupalSettings.scrollbar.maintainPosition,
        stickToBottom: drupalSettings.scrollbar.stickToBottom,
        stickToRight: drupalSettings.scrollbar.stickToRight,
        contentWidth: drupalSettings.scrollbar.contentWidth,
        animateScroll: drupalSettings.scrollbar.animateScroll,
        animateDuration: drupalSettings.scrollbar.animateDuration,
        animateEase: drupalSettings.scrollbar.animateEase,
        hijackInternalLinks: drupalSettings.scrollbar.hijackInternalLinks,
        enableKeyboardNavigation: drupalSettings.scrollbar.enableKeyboardNavigation,
        hideFocus: drupalSettings.scrollbar.hideFocus,
        clickOnTrack: drupalSettings.scrollbar.clickOnTrack,
        trackClickSpeed: drupalSettings.scrollbar.trackClickSpeed,
        trackClickRepeatFreq: drupalSettings.scrollbar.trackClickRepeatFreq,

        mouseWheelSpeed: drupalSettings.scrollbar.mouseWheelSpeed,
        arrowButtonSpeed: drupalSettings.scrollbar.arrowButtonSpeed,
        arrowRepeatFreq: drupalSettings.scrollbar.arrowRepeatFreq,
        horizontalGutter: drupalSettings.scrollbar.horizontalGutter,
        verticalGutter: drupalSettings.scrollbar.verticalGutter,
        verticalDragMinHeight: drupalSettings.scrollbar.verticalDragMinHeight,
        verticalDragMaxHeight: drupalSettings.scrollbar.verticalDragMaxHeight,
        verticalDragMinWidth: drupalSettings.scrollbar.verticalDragMinWidth,
        verticalDragMaxWidth: drupalSettings.scrollbar.verticalDragMaxWidth,
        horizontalDragMinHeight: drupalSettings.scrollbar.horizontalDragMinHeight,
        horizontalDragMaxHeight: drupalSettings.scrollbar.horizontalDragMaxHeight,
        horizontalDragMinWidth: drupalSettings.scrollbar.horizontalDragMinWidth,
        horizontalDragMaxWidth: drupalSettings.scrollbar.horizontalDragMaxWidth,
        verticalArrowPositions: drupalSettings.scrollbar.verticalArrowPositions,
        horizontalArrowPositions: drupalSettings.scrollbar.horizontialArrowPositions,
        autoReinitialise: (drupalSettings.scrollbar.autoReinitialise === "true"),
        autoReinitialiseDelay: drupalSettings.scrollbar.autoReinitialiseDelay
      });
    // Uncomment the line below for debugging.
    // console.log(settings.scrollbar);
    }
  };
})(jQuery, Drupal, drupalSettings);
