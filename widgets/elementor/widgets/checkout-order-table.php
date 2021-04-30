<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopWoocommerceCheckoutOrderTable extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-woocommerce-checkout-order-table';
	}

	// Title
	public function get_title() {
		return __('صفحه پرداخت', 'cybershop');
	}

	// Icon
	public function get_icon() {
		return 'fab fa-amilia fa-spin';
	}

	// Category
	public function get_categories() {
		return ['cybershop'];
	}

	// Controls/Options Registration
	public function _register_controls() {
	}

	// PHP-RENDER
	public function render() {
		$settings  = $this->get_settings_for_display();
		if( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			$this->development_html();
		} else {
			echo do_shortcode( '[woocommerce_checkout]' );
		}
	}


	protected function development_html() {
		?>
		
		<form id="order_review">
		    <table class="shop_table">
		        <thead>
		            <tr>
		                <th class="product-name">محصول</th>
		                <th class="product-quantity">تعداد</th>
		                <th class="product-total">جمع کل</th>
		            </tr>
		        </thead>
		        <tbody>
		            <tr class="order_item">
		                <td class="product-name">
		                    محصول شماره 1
		                </td>
		                <td class="product-quantity"><strong class="product-quantity">×&nbsp;1</strong></td>
		                <td class="product-subtotal">
		                    <span class="woocommerce-Price-amount amount">
		                        <bdi><span class="woocommerce-Price-currencySymbol">ریال</span>1,000.00</bdi>
		                    </span>
		                </td>
		            </tr>
		            <tr class="order_item">
		                <td class="product-name">
		                    محصول شماره 2
		                </td>
		                <td class="product-quantity"><strong class="product-quantity">×&nbsp;2</strong></td>
		                <td class="product-subtotal">
		                    <span class="woocommerce-Price-amount amount">
		                        <bdi><span class="woocommerce-Price-currencySymbol">ریال</span>200,000.00</bdi>
		                    </span>
		                </td>
		            </tr>
		        </tbody>
		        <tfoot>
		            <tr>
		                <th scope="row" colspan="2">جمع كل سبد خريد:</th>
		                <td class="product-total">
		                    <span class="woocommerce-Price-amount amount">
		                        <bdi><span class="woocommerce-Price-currencySymbol">ریال</span>201,000.00</bdi>
		                    </span>
		                </td>
		            </tr>
		            <tr>
		                <th scope="row" colspan="2">قیمت نهایی:</th>
		                <td class="product-total">
		                    <span class="woocommerce-Price-amount amount">
		                        <bdi><span class="woocommerce-Price-currencySymbol">ریال</span>201,000.00</bdi>
		                    </span>
		                </td>
		            </tr>
		        </tfoot>
		    </table>

		    <div id="payment">
		        <ul class="wc_payment_methods payment_methods methods">
		            <li class="wc_payment_method payment_method_cheque">
		                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" checked="checked" data-order_button_text="" />

		                <label for="payment_method_cheque"> پرداخت با چک </label>
		                <div class="payment_box payment_method_cheque" style="">
		                    <p>لطفا چک خود را به نام فروشگاه، خیابان فروشگاه، شهر فروشگاه، ایالت/کشور فروشگاه، کدپستی فروشگاه بفرستید.</p>
		                </div>
		            </li>
		            <li class="wc_payment_method payment_method_cod">
		                <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" data-order_button_text="" />

		                <label for="payment_method_cod"> پرداخت هنگام دریافت </label>
		                <div class="payment_box payment_method_cod" style="display: none;">
		                    <p>پرداخت نقدی پس از تحویل</p>
		                </div>
		            </li>
		            <li class="wc_payment_method payment_method_payir">
		                <input id="payment_method_payir" type="radio" class="input-radio" name="payment_method" value="payir" data-order_button_text="" />

		                <label for="payment_method_payir"> Pay.ir <img src="" alt="Pay.ir" /> </label>
		                <div class="payment_box payment_method_payir" style="display: none;">
		                    <p>پرداخت امن به وسیله کلیه کارت های عضو شتاب از طریق درگاه Pay.ir</p>
		                </div>
		            </li>
		        </ul>
		        <div class="form-row">
		            <input type="hidden" name="woocommerce_pay" value="1" />

		            <div class="woocommerce-terms-and-conditions-wrapper">
		                <div class="woocommerce-privacy-policy-text">
		                    <p>
		                        اطلاعات شخصی شما برای پردازش سفارش شما و پشتیبانی از تجربه شما در این وبسایت و برای اهداف دیگری که در
		                        <a href="" class="woocommerce-privacy-policy-link" target="_blank">سیاست حفظ حریم خصوصی</a> توضیح داده شده است استفاده می&zwnj;شود.
		                    </p>
		                </div>
		                <p class="form-row validate-required">
		                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
		                        <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" id="terms" />
		                        <span class="woocommerce-terms-and-conditions-checkbox-text">
		                            من <a href="" class="woocommerce-terms-and-conditions-link" target="_blank">شرایط و مقررات</a> سایت را خوانده ام و آن را می پذیرم.
		                        </span>
		                        &nbsp;<span class="required">*</span>
		                    </label>
		                    <input type="hidden" name="terms-field" value="1" />
		                </p>
		            </div>

		            <button type="submit" class="button alt" id="place_order" value="پرداخت برای سفارش" data-value="پرداخت برای سفارش">پرداخت برای سفارش</button>
		        </div>
		    </div>
		</form>

		<?php
	}
}