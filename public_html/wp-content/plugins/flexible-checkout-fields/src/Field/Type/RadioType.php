<?php

namespace WPDesk\FCF\Free\Field\Type;

/**
 * {@inheritdoc}
 */
class RadioType extends TypeAbstract {

	const FIELD_TYPE = 'inspireradio';

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
		return __( 'Radio Button', 'flexible-checkout-fields' );
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_field_type_icon(): string {
		return 'icon-list-ul';
	}

	/**
	 * {@inheritdoc}
	 */
	public function is_available(): bool {
		return false;
	}
}
