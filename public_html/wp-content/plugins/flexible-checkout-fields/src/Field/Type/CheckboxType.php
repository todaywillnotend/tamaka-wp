<?php

namespace WPDesk\FCF\Free\Field\Type;

/**
 * {@inheritdoc}
 */
class CheckboxType extends TypeAbstract {

	const FIELD_TYPE = 'inspirecheckbox';

	/**
	 * {@inheritdoc}
	 */
	public function get_field_type(): string {
		return self::FIELD_TYPE;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_field_type_label(): string {
		return __( 'Checkbox', 'flexible-checkout-fields' );
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_field_type_icon(): string {
		return 'icon-check-square';
	}

	/**
	 * {@inheritdoc}
	 */
	public function is_available(): bool {
		return false;
	}
}
