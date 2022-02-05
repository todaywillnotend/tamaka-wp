<?php
/**
 * .
 *
 * @package WPDesk\FPF\Pro
 */

namespace WPDesk\FCF\Pro\Settings\Option;

use WPDesk\FCF\Pro\Settings\Option\DefaultOption;
use WPDesk\FCF\Free\Settings\Option\OptionInterface;

/**
 * Supports option settings for field.
 */
class DefaultCheckboxOption extends DefaultOption implements OptionInterface {

	/**
	 * Returns label of option.
	 *
	 * @return string Option label.
	 */
	public function get_option_label(): string {
		return __( 'Default value', 'flexible-checkout-fields-pro' );
	}

	/**
	 * Returns content for label tooltip.
	 *
	 * @return string Tooltip content.
	 */
	public function get_label_tooltip(): string {
		return __( 'Enter "Yes" if the checkbox is to be selected by default.', 'flexible-checkout-fields-pro' );
	}
}
