*Scrollbar*

About:
------

Scrollbar is a very simple Drupal module to implement the jScrollPane javascript
functionality to your Drupal and make the css selectors get a custom jquery 
scrollbar.
jScrollPane is a cross-browser jQuery plugin by Kelvin Luck 
(http://jscrollpane.kelvinluck.com) which converts a browser's default 
scrollbars (on elements with a relevant overflow property) into an HTML 
structure which can be easily skinned with CSS.

Installation:
-------------

A) Donwload the module and extract it to the modules directory.
B) Go to the jScrollPane download page at 
http://jscrollpane.kelvinluck.com/index.html#download

[Required files]

1. Download jquery.jscrollpane.min.js and place it in to 
modules-path/scrollbar/js/jquery.jscrollpane.min.js
(eg ../sites/all/modules/scrollbar/js/jquery.jscrollpane.min.js)
2. Download jquery.jscrollpane.css and place it in to 
modules-path/scrollbar/js/jquery.jscrollpane.css
(eg ../sites/all/modules/scrollbar/css/jquery.jscrollpane.css)

[Optional files]

3. Download jquery.mousewheel.js and place it in to 
modules-path/scrollbar/js/jquery.mousewheel.js
(eg ../sites/all/modules/scrollbar/js/jquery.mousewheel.js)
4. Download mwheelIntent.js and place it in to 
modules-path/scrollbar/js/mwheelIntent.js
(eg ../sites/all/modules/scrollbar/js/mwheelIntent.js)

C) On your theme css add one or more styles for the element you want to get the 
custom jquery scrollbar.
For example, if you want to apply the .jScrollPane() function to the 
.field-name-body element just add this CSS

.field-name-body {
  height: 200px;
	overflow: auto;
}
For more examples please refer to 
http://jscrollpane.kelvinluck.com/index.html#examples


Configuration:
--------------

A) Go to admin/config/scrollbar and configure as you want.
For more information on how to use the jScrollPane() parameters please refer to
the jScrollPage settings page (http://jscrollpane.kelvinluck.com/settings.html).

Gredits:
--------

Many thanks to Kelvin Luck (http://kelvinluck.com) for this excellant 
jquery plugin.
