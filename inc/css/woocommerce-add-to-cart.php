<?php
// styles for woocommerce add to cart
?>

@media screen and (max-width: 1200px) {
.add_to_cart_button {
	width: 100%;
	text-align: center;
	font-size: 20px;
	font-weight: 700;
	color: #ffffff;
	padding: 10px 0;
	text-decoration: none;
	display: block;
	background: <?php echo $default_link_color; ?>;
	}
}

@media screen and (min-width: 1200px) {
.add_to_cart_button {
	width: 100%;
	text-align: center;
	font-size: 20px;
	font-weight: 700;
	color: #ffffff;
	padding: 10px 0;
	text-decoration: none;
	display: block;
	background: <?php echo $default_link_color; ?>;
	}
}

 .add_to_cart_button:hover {
	color: #ffffff;
	background: <?php echo $default_hover_color; ?>;
}

/* block layout for variation form */
form.variations_form {
	display: block;
}

/* flex layout for add to cart form */
form.cart {
	display: flex !important;
	align-items: stretch !important;
}

/* mobile layout (stack quantity and button vertically) */
@media (max-width: 1199px) {
	form.cart {
		flex-direction: column !important;
	}

	div.quantity {
		margin-bottom: 15px !important;
		margin-right: 0 !important;
		width: 100%;
	}

	form.cart button {
		width: 100%;
	}
}

/* desktop layout (display quantity and button inline) */
@media (min-width: 1200px) {
	form.cart {
		flex-direction: row !important;
	}

	div.quantity {
		margin-bottom: 0 !important;
		margin-right: 10px !important;
		width: auto;
	}

	form.cart button {
		width: auto;
	}
}

/* flex layout for variation details */
div.single_variation_wrap {
	display: flex;
}

/* style for variations table */
table.variations {
	width: 100%;
	margin-bottom: 30px !important;
	border: 0 !important;
	border-collapse: collapse !important;
}

/* style for add to cart button */
form.cart button {
	font-size: 16px !important;
	font-weight: 700 !important;
	line-height: 40px !important;
	padding: 0 20px !important;
	vertical-align: middle !important;
	height: 40px !important;
	border: none !important;
	box-shadow: none !important;
	outline: none !important;
	cursor: pointer !important;
}

/* reset native number input styles */
input.qty {
	appearance: textfield;
	-moz-appearance: textfield;
	-webkit-appearance: none;
}

/* hide webkit spin buttons */
input.qty::-webkit-outer-spin-button, input.qty::-webkit-inner-spin-button {
	-webkit-appearance: none !important;
	margin: 0 !important;
}

/* hide firefox spin buttons */
input.qty[type="number"] {
	-moz-appearance: textfield !important;
}

/* style for quantity input (unclickable number) */
input.qty {
	width: 60px !important;
	font-size: 16px !important;
	font-weight: 400 !important;
	line-height: 40px !important;
	text-align: center !important;
	vertical-align: middle !important;
	height: 40px !important;
	margin: 0 !important;
	padding: 0 !important;
	border: none !important;
	box-shadow: none !important;
	outline: none !important;
	cursor: default !important;
	background: #f2f2f2 !important;
	color: <?php echo $default_text_color; ?> !important;
}

/* flex layout when plus and minus buttons exist */
.buttons-added {
	display: inline-flex !important;
	align-items: center !important;
	overflow: hidden !important;
	padding: 0 !important;
}

/* plus and minus button styles (must load after form.cart button) */
.quantity-button {
	width: 40px !important;
	height: 40px !important;
	font-size: 30px !important;
	color: <?php echo $default_text_color; ?> !important;
	border: none !important;
	box-shadow: none !important;
	margin: 0 !important;
	padding: 0 !important;
	cursor: pointer !important;
	user-select: none !important;
	line-height: 40px !important;
	display: flex !important;
	align-items: center !important;
	justify-content: center !important;
	transition: background 0.2s ease !important;
}

/* base style for quantity buttons */
.quantity-button, .quantity .plus, .quantity .minus {
	background: #e0e0e0 !important;
	color: <?php echo $default_text_color; ?> !important;
	border: none !important;
	box-shadow: none !important;
}

/* hover style for quantity buttons */
.quantity-button:hover, .quantity .plus:hover, .quantity .minus:hover {
	background: #bdbdbd !important;
}

/* hide screen reader text */
.screen-reader-text {
	position: absolute;
	width: 1px;
	height: 1px;
	padding: 0;
	margin: -1px;
	border: 0;
	overflow: hidden;
	clip: rect(0, 0, 0, 0);
	white-space: nowrap;
}
