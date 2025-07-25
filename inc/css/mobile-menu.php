<?php
// styles for mobile menu
?>

/* remove default focus outline from nav icon */
.nav-icon {
	outline: none !important;
}

.nav-icon:focus {
	outline: none !important;
}

/* mobile nav container */
@media screen and (max-width: 1200px) {
.mobile-nav {
	display: none;
	clear: both;
	width: 100%;
	list-style: none;
	background: #212121;
	padding: 20px;
	}

/* mobile nav list items */
.mobile-nav ul li {
	font-size: 18px;
	list-style-type: none;
 	vertical-align: middle;
	display: block;
	margin: 0px;
	padding: 0px;
	border-bottom: 1px solid rgba(255,255,255, 0.2);
}

/* remove border on last item */
.mobile-nav ul li:last-child {
	border-bottom: 0;
}
	
/* mobile nav links */
.mobile-nav a {
	display: block;
	width: 100%;
	line-height: 40px;
	color: #ffffff !important;
	font-size: 18px;
	text-decoration: none;
}

/* hide submenus by default */
 .mobile-nav li > ul { display: none; width: 100%; position: relative; }

}

/* hide mobile nav on desktop */
@media screen and (min-width: 1200px) {
.mobile-nav {
	display: none !important;
	}
}

/* hamburger icon wrapper with touch-safe area */
@media screen and (max-width: 1200px) {
.menu-mobile-wrapper {
	display: inline-flex;
	justify-content: center;
	align-items: center;
	padding: 10px;
	min-width: 44px;
	min-height: 44px;
	text-align: right;
	vertical-align: middle;
	}
}
	
/* hide hamburger wrapper on desktop */
@media screen and (min-width: 1200px) {
.menu-mobile-wrapper {
 	display: none;	
	}
}

/* menu icon styling for font awesome and material icons */
#header-full-hero .menu-mobile-wrapper i,
#header-full-hero .menu-mobile-wrapper .material-icons,
#header-full-hero .menu-mobile-wrapper .fa,
#header-full-hero .menu-mobile-wrapper .fa-solid {
	font-size: 28px;
	color: #ffffff;
}
