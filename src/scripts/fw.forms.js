var FW = FW || {};

/**
 * In bijv _layout.twig kun je de standaard teksten overrulen met vertalingen voordat dit script aangeroepen wordt
 *
 * FW.formsTranslations = {
 * 		checkboxLabel: 'This field'
 * };
 */
FW.forms = ( function( window, undefined ) {
	if( !FW.formsTranslations ) {
		FW.formsTranslations = {};
	}

	var text = $.extend({
			checkboxLabel: 'Dit'
		}, FW.formsTranslations),
		$forms = $('form.form'),
		$hiddenRequiredFields = $forms.find('input[type=hidden][required]');

	/**
	 * Validatie op Checkboxen zetten
	 */
	function setCheckboxValidation() {
		$hiddenRequiredFields.each(function() {
			var $this = $(this),
				$matchingInput = $('input[name="' + $this.attr('name') + '[]"]').first();

			// Als er een input matcht met het hidden field en het is een checkbox, dan validatie regelen
			if( $matchingInput.length && $matchingInput.attr('type') == 'checkbox' ) {
				// Hidden field verplaatsen naar achter de checkboxen , ivm positie validatiemelding
				$this.appendTo( $this.parent() );

				var randNum = Math.ceil( Math.random() * 10000000 ),
					fieldName = $this.attr('name').replace('fields[', '').replace(']','');

				// Onzichtbare label maken om de juiste melding te tonen
				$('<label class="visuallyhidden" for="' + fieldName + '' + randNum + '">' + text.checkboxLabel + '</label>').insertBefore($this);
				$this.attr('id', fieldName + '' + randNum);
			}
		});
	}

	/**
	 * Input type hidden vullen adhv checkboxen
	 */
	function validateCheckboxes() {
		$forms.on('change', 'input[type=checkbox]', function() {
			var matchingName = $(this).attr('name').replace('[]', ''),
				$hiddenField = $('input[name="' + matchingName + '"][required]');

			if( $hiddenField.length > 0 ) {
				var $matchingCheckboxes = $('input[type=checkbox][name="' + $(this).attr('name') + '"]'),
					hiddenValue = '';

				$matchingCheckboxes.each(function() {
					if( $(this).is(':checked') ) {
						hiddenValue = 'Yeah';
					}
				});

				$hiddenField.val( hiddenValue );
			}
		});
	}

	function init() {
		setCheckboxValidation();
		validateCheckboxes();

		$forms.each(function() {
			var $form = $(this);

			$form.attr('novalidate', 'true');

			$form.formValidation({
				attrRequired: 'required'
			});
		});
	}

	head.ready('cdnform', function() {
		init();
	});

	return {
		text: text
	};
})( window );
