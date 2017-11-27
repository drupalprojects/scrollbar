<?php

/**
 * @file
 * Contains \Drupal\scrollbar\Form\ScrollbarAdminSettings.
 */

namespace Drupal\scrollbar\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;

class ScrollbarAdminSettings extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'scrollbar_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('scrollbar.settings');

    foreach (Element::children($form) as $variable) {
      $config->set($variable, $form_state->getValue($form[$variable]['#parents']));
    }
    $config->save();

    if (method_exists($this, '_submitForm')) {
      $this->_submitForm($form, $form_state);
    }

    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['scrollbar.settings'];
  }

  public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $config = $this->config('scrollbar.settings');

    $form['enable'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Enable scrollbar'),
      '#description' => $this->t('Enable scrollbar + jscrollpane functionality on your site.'),
      '#default_value' => $config->get('enable'),
    );
    $form['element'] = [
      '#type' => 'textfield',
      '#title' => t('Elements to get the jScrollPane function'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('element'),
      '#size' => 100,
      '#required' => TRUE,
      '#maxlength' => 800,
      '#description' => "<p>" . t('Set here the DOM elements that will get the scrollbar function.') . "</p><p>" . t('Seperate elements with a comma. Example <code>@code</code>', [
        '@code' => '.field-name-body, #mydiv'
        ]) . "</p><p><strong>" . t("Do not use a trailing comma") . "</strong></p><p>" . t("Finally, don't forget to use the proper CSS. Example <code>@code</code>", [
        '@code' => ".field-name-body {overflow:auto; \n height: 200px;}"
        ]) . "</p>",
    ];
    $form['showArrows'] = [
      '#type' => 'select',
      '#title' => t('Show arrows for scrollbar'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('showArrows'),
      '#options' => [
        'true' => t('yes'),
        'false' => t('no'),
      ],
      '#description' => t('Whether arrows should be shown on the generated scroll pane. When set to false only the scrollbar track and drag will be shown, if set to true then arrows buttons will also be shown.'),
    ];
    $form['scrollbar_advancedOptions'] = [
      '#type' => 'fieldset',
      '#title' => t('Advanced options'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    ];
    $form['scrollbar_advancedOptions']['generalOptions'] = [
      '#type' => 'fieldset',
      '#title' => t('General options'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    ];
    $form['scrollbar_advancedOptions']['verticalOptions'] = [
      '#type' => 'fieldset',
      '#title' => t('Vertical scrollbar options'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => "<p>" . t('The size of the drag elements is based on the proportion of the size of the content to the size of the viewport but is contrained within the minimum and maximum dimensions given') . "</p>",
    ];
    $form['scrollbar_advancedOptions']['horizontalOptions'] = [
      '#type' => 'fieldset',
      '#title' => t('Horizontal scrollbar options'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => "<p>" . t('The size of the drag elements is based on the proportion of the size of the content to the size of the viewport but is contrained within the minimum and maximum dimensions given') . "</p>",
    ];
    $form['scrollbar_advancedOptions']['generalOptions']['arrowScrollOnHover'] = [
      '#type' => 'select',
      '#title' => t('Scroll element when mouse is over arrows'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('arrowScrollOnHover'),
      '#options' => [
        'true' => t('true'),
        'false' => t('false'),
      ],
      '#description' => t('Whether the arrow buttons should cause the scrollbar to scroll while you are hovering over them.'),
    ];
    $form['scrollbar_advancedOptions']['generalOptions']['mouseWheelSpeed'] = [
      '#type' => 'textfield',
      '#title' => t('Mousewheel speed multiplier'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('mouseWheelSpeed'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => t("A multiplier which is used to control the amount that the scrollpane scrolls each time the mouse wheel is turned."),
    ];
    $form['scrollbar_advancedOptions']['generalOptions']['arrowButtonSpeed'] = [
      '#type' => 'textfield',
      '#title' => t('Arrow buttons speed multiplier'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('arrowButtonSpeed'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => t('A multiplier which is used to control the amount that the scrollpane scrolls each time on of the arrow buttons is pressed.'),
    ];
    $form['scrollbar_advancedOptions']['generalOptions']['arrowRepeatFreq'] = [
      '#type' => 'textfield',
      '#title' => t('Arrow buttons Repeat frequency, in ms'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('arrowRepeatFreq'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => t('The number of milliseconds between each repeated scroll event when the mouse is held down over one of the arrow keys.'),
    ];
    $form['scrollbar_advancedOptions']['horizontalOptions']['horizontalGutter'] = [
      '#type' => 'textfield',
      '#title' => t('Horizontal scrolling gap, in px'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('horizontalGutter'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => t('Introduces a gap between the scrolling content and the scrollbar itself.'),
    ];
    $form['scrollbar_advancedOptions']['verticalOptions']['verticalGutter'] = [
      '#type' => 'textfield',
      '#title' => t('Vertical scrolling gap, in px'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_verticalGutter'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => t('Introduces a gap between the scrolling content and the scrollbar itself.'),
    ];
    $form['scrollbar_advancedOptions']['verticalOptions']['verticalDragMinHeight'] = [
      '#type' => 'textfield',
      '#title' => t('Vertical Drag min height, in px'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_verticalDragMinHeight'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => "<p>" . t('The smallest height that the vertical drag can have') . "</p>",
    ];
    $form['scrollbar_advancedOptions']['verticalOptions']['verticalDragMaxHeight'] = [
      '#type' => 'textfield',
      '#title' => t('Vertical Drag max height, in px'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_verticalDragMaxHeight'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => "<p>" . t('The maximum height that the vertical drag can have') . "</p>",
    ];
    $form['scrollbar_advancedOptions']['verticalOptions']['verticalDragMinWidth'] = [
      '#type' => 'textfield',
      '#title' => t('Vertical Drag min width, in px'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_verticalDragMinWidth'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => "<p>" . t('The smallest width that the vertical drag can have') . "</p>",
    ];
    $form['scrollbar_advancedOptions']['verticalOptions']['verticalDragMaxWidth'] = [
      '#type' => 'textfield',
      '#title' => t('Vertical Drag max width, in px'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_verticalDragMaxWidth'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => "<p>" . t('The maximum width that the vertical drag can have') . "</p>",
    ];
    $form['scrollbar_advancedOptions']['horizontalOptions']['horizontalDragMinHeight'] = [
      '#type' => 'textfield',
      '#title' => t('Horizontal Drag min height, in px'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_horizontalDragMinHeight'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => "<p>" . t('The smallest height that the horizontal drag can have') . "</p>",
    ];
    $form['scrollbar_advancedOptions']['horizontalOptions']['horizontalDragMaxHeight'] = [
      '#type' => 'textfield',
      '#title' => t('Horizontal Drag max height, in px'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_horizontalDragMaxHeight'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => "<p>" . t('The maximum height that the horizontal drag can have') . "</p>",
    ];
    $form['scrollbar_advancedOptions']['horizontalOptions']['scrollbar_horizontalDragMinWidth'] = [
      '#type' => 'textfield',
      '#title' => t('Horizontal Drag min width, in px'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_horizontalDragMinWidth'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => "<p>" . t('The smallest width that the horizontal drag can have') . "</p>",
    ];
    $form['scrollbar_advancedOptions']['horizontalOptions']['scrollbar_horizontalDragMaxWidth'] = [
      '#type' => 'textfield',
      '#title' => t('Horizontal Drag max width, in px'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_horizontalDragMaxWidth'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => "<p>" . t('The maximum width that the horizontal drag can have') . "</p>",
    ];
    $form['scrollbar_advancedOptions']['verticalOptions']['scrollbar_verticalArrowPositions'] = [
      '#type' => 'select',
      '#title' => t('Show the vertical arrows relative to the vertical track'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_verticalArrowPositions'),
      '#options' => [
        'split' => t('split'),
        'before' => t('before'),
        'after' => t('after'),
        'os' => t('os'),
      ],
      '#description' => t('Where the vertical arrows should appear relative to the vertical track.'),
    ];
    $form['scrollbar_advancedOptions']['horizontalOptions']['scrollbar_horizontalArrowPositions'] = [
      '#type' => 'select',
      '#title' => t('Show the horizontal arrows relative to the horizontal track'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_horizontalArrowPositions'),
      '#options' => [
        'split' => t('split'),
        'before' => t('before'),
        'after' => t('after'),
        'os' => t('os'),
      ],
      '#description' => t('Where the horizontal arrows should appear relative to the horizontal track.'),
    ];
    $form['scrollbar_advancedOptions']['scrollbar_generalOptions']['scrollbar_autoReinitialise'] = [
      '#type' => 'select',
      '#title' => t('Reinitialise scrollbar'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_autoReinitialise'),
      '#options' => [
        'true' => t('true'),
        'false' => t('false'),
      ],
      '#description' => "<p>" . t('Whether scrollbar should automatically reinitialise itself periodically after you have initially initialised it.') . "</p>" . "<p>" . t('This can help with instances when the size of the content of the scrollpane (or the surrounding element) changes.') . "</p>" . "<p>" . t('However, it does involve an overhead of running a javascript function on a timer so it is recommended only to activate where necessary.') . "</p>",
    ];
    $form['scrollbar_advancedOptions']['scrollbar_generalOptions']['scrollbar_autoReinitialiseDelay'] = [
      '#type' => 'textfield',
      '#title' => t('Reinitialise Delay in ms'),
      '#default_value' => \Drupal::config('scrollbar.settings')->get('scrollbar_autoReinitialiseDelay'),
      '#size' => 5,
      '#maxlength' => 5,
      '#element_validate' => [
        'scrollbar_validate_integer_positive_zero'
        ],
      '#description' => t('The number of milliseconds between each reinitialisation (if autoReinitialise is true).'),
    ];
    return parent::buildForm($form, $form_state);
  }

  //   /**
  //  * Form submission handler.
  //  *
  //  * @param array $form
  //  *   An associative array containing the structure of the form.
  //  * @param \Drupal\Core\Form\FormStateInterface $form_state
  //  *   The current state of the form.
  //  */
  // public function submitForm(array &$form, FormStateInterface $form_state) {
  //   $this->config('scrollbar.settings')
  //     ->set('enable', $form_state->getValue('enable'))
  //     ->set('element', $form_state->getValue('element'))
  //     ->set('showArrows', (bool) $form_state->getValue('showArrows'))
  //     ->set('arrowScrollOnHover', (int) $form_state->getValue('arrowScrollOnHover'))
  //     ->set('mouseWheelSpeed', (int) $form_state->getValue('mouseWheelSpeed'))
  //     ->set('arrowButtonSpeed', $form_state->getValue('arrowButtonSpeed'))
  //     // ->set('initial_class', $form_state->getValue('initial_class'))
  //     // ->set('pinned_class', $form_state->getValue('pinned_class'))
  //     // ->set('unpinned_class', $form_state->getValue('unpinned_class'))
  //     // ->set('top_class', $form_state->getValue('top_class'))
  //     // ->set('not_top_class', $form_state->getValue('not_top_class'))
  //     ->save();

  //   parent::submitForm($form, $form_state);
  // }


}
