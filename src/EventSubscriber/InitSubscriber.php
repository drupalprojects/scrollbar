<?php /**
 * @file
 * Contains \Drupal\scrollbar\EventSubscriber\InitSubscriber.
 */

namespace Drupal\scrollbar\EventSubscriber;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class InitSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [KernelEvents::REQUEST => ['onEvent', 0]];
  }

  public function onEvent() {

    // Check if necessary files exist.
    $basepath = (DRUPAL_ROOT . '/libraries/jscrollpane');
    $basepath_mod = drupal_get_path('module', 'scrollbar');

    $installed_1 = file_exists($basepath . '/jquery.jscrollpane.min.js');
    $installed_2 = file_exists($basepath . '/jquery.jscrollpane.css');
    $installed_3 = file_exists($basepath . '/jquery.mousewheel.js');
    $installed_4 = file_exists($basepath . '/mwheelIntent.js');

    // Add mousewheel and mwheelIntent if they exist.
    if ($installed_3) {
      // @FIXME
// The Assets API has totally changed. CSS, JavaScript, and libraries are now
// attached directly to render arrays using the #attached property.
// 
// 
// @see https://www.drupal.org/node/2169605
// @see https://www.drupal.org/node/2408597
// drupal_add_js($basepath . '/jquery.mousewheel.js');

    }
    if ($installed_4) {
      // @FIXME
// The Assets API has totally changed. CSS, JavaScript, and libraries are now
// attached directly to render arrays using the #attached property.
// 
// 
// @see https://www.drupal.org/node/2169605
// @see https://www.drupal.org/node/2408597
// drupal_add_js($basepath . '/mwheelIntent.js');

    }

    // Add required CSS for scrollbar.
    if ($installed_2) {
      // @FIXME
// The Assets API has totally changed. CSS, JavaScript, and libraries are now
// attached directly to render arrays using the #attached property.
// 
// 
// @see https://www.drupal.org/node/2169605
// @see https://www.drupal.org/node/2408597
// drupal_add_css($basepath . '/jquery.jscrollpane.css');

    }

    if ($installed_1) {
      // Add jquery ui library from Drupal core.
    // @FIXME
// The Assets API has totally changed. CSS, JavaScript, and libraries are now
// attached directly to render arrays using the #attached property.
// 
// 
// @see https://www.drupal.org/node/2169605
// @see https://www.drupal.org/node/2408597
// drupal_add_library('system', 'ui');


      // Add jquery.jscrollpane.min.js.
    // @FIXME
// The Assets API has totally changed. CSS, JavaScript, and libraries are now
// attached directly to render arrays using the #attached property.
// 
// 
// @see https://www.drupal.org/node/2169605
// @see https://www.drupal.org/node/2408597
// drupal_add_js($basepath . '/jquery.jscrollpane.min.js');


      // Create settings for scrollbar.js.
    // @FIXME
// The Assets API has totally changed. CSS, JavaScript, and libraries are now
// attached directly to render arrays using the #attached property.
// 
// 
// @see https://www.drupal.org/node/2169605
// @see https://www.drupal.org/node/2408597
// drupal_add_js(
//       array(
//         'scrollbar' =>
//         array(
//           'element'                   => variable_get('scrollbar_element', '.field-name-body'),
//           'showArrows'                => variable_get('scrollbar_showArrows', TRUE),
//           'mouseWheelSpeed'           => variable_get('scrollbar_mouseWheelSpeed', 10),
//           'arrowButtonSpeed'          => variable_get('scrollbar_arrowButtonSpeed', 10),
//           'arrowRepeatFreq'           => variable_get('scrollbar_arrowRepeatFreq', 100),
//           'horizontialGutter'         => variable_get('scrollbar_horizontialGutter', 4),
//           'verticalGutter'            => variable_get('scrollbar_verticalGutter', 4),
//           'verticalDragMinHeight'     => variable_get('scrollbar_verticalDragMinHeight', 0),
//           'verticalDragMaxHeight'     => variable_get('scrollbar_verticalDragMaxHeight', 99999),
//           'verticalDragMinWidth'      => variable_get('scrollbar_verticalDragMinWidth', 0),
//           'verticalDragMaxWidth'      => variable_get('scrollbar_verticalDragMaxWidth', 99999),
//           'horizontialDragMinHeight'  => variable_get('scrollbar_horizontialDragMinHeight', 0),
//           'horizontialDragMaxHeight'  => variable_get('scrollbar_horizontialDragMaxHeight', 99999),
//           'horizontialDragMinWidth'   => variable_get('scrollbar_horizontialDragMinWidth', 0),
//           'horizontialDragMaxWidth'   => variable_get('scrollbar_horizontialDragMaxWidth', 99999),
//           'arrowScrollOnHover'        => variable_get('scrollbar_arrowScrollOnHover', TRUE),
//           'verticalArrowPositions'    => variable_get('scrollbar_verticalArrowPositions', 'split'),
//           'horizontialArrowPositions' => variable_get('scrollbar_horizontialArrowPositions', 'split'),
//           'autoReinitialise'          => variable_get('scrollbar_autoReinitialise', FALSE),
//           'autoReinitialiseDelay'     => variable_get('scrollbar_autoReinitialiseDelay', 500),
//         ),
//       ), 'setting'
//     );


      // Add scrollbar.js with above settings.
    // @FIXME
// The Assets API has totally changed. CSS, JavaScript, and libraries are now
// attached directly to render arrays using the #attached property.
// 
// 
// @see https://www.drupal.org/node/2169605
// @see https://www.drupal.org/node/2408597
// drupal_add_js($basepath_mod . '/scrollbar.js');

    }
  }

}
