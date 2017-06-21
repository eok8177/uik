/*
 * Window Height CSS rules
 */
;(function() {
	var styleSheet;

	var getWindowHeight = function() {
		return window.innerHeight || document.documentElement.clientHeight;
	};

	var createStyleTag = function() {
		// create style tag
		var styleTag = jQuery('<style>').appendTo('head');
		styleSheet = styleTag.prop('sheet') || styleTag.prop('styleSheet');

		// crossbrowser style handling
		var addCSSRule = function(selector, rules, index) {
			if(styleSheet.insertRule) {
				styleSheet.insertRule(selector + '{' + rules + '}', index);
			} else {
				styleSheet.addRule(selector, rules, index);
			}
		};

		// create style rules
		addCSSRule('.win-min-height', 'min-height:0');
		addCSSRule('.win-height', 'height:auto');
		addCSSRule('.win-max-height', 'max-height:100%');
		resizeHandler();
	};

	var resizeHandler = function() {
		// handle changes in style rules
		var currentWindowHeight = getWindowHeight(),
			styleRules = styleSheet.cssRules || styleSheet.rules;
		
		jQuery.each(styleRules, function(index, currentRule) {
			var currentProperty = currentRule.selectorText.toLowerCase().replace('.win-', '').replace('-h','H');
			currentRule.style[currentProperty] = currentWindowHeight + 'px';
		});
	};

	createStyleTag();
	jQuery(window).on('resize orientationchange', resizeHandler);
}());