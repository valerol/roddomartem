<?php

/*
Template tags:
class
heading
level
content
image
description
link
edit_link

*/

function ra_get_template( $template ) {
	$templates = array();

	$templates[ '' ] = '';

	$templates[ 'wrapper' ] = '
	<div class="%CLASS%">
		<div class="container">
			<div class="row">
				<div class="grid_12">
					%HEADING%
					%CONTENT%
				</div>
			</div>
		</div>
	</div>
	';
	
	$templates[ 'div' ] = '
	<div class="%CLASS%">%CONTENT%</div>
	';
	
	$templates[ 'heading' ] = '
	<div class="%CLASS%"><h%LEVEL%>%HEADING%</h%LEVEL%></div>
	';
	
	$templates[ 'span' ] = '
	<span class="%CLASS%">%CONTENT%</span>
	';
	
	$templates[ 'slider' ] = '
	<script>
		$(document).ready(function () {
			$("#camera_wrap").camera( {
				loader: true,
				pagination: false,
				minHeight: "",
				thumbnails: false,
				height: "31.70731707317073%",
				caption: true,
				navigation: true,
				fx: "simpleFade",
				onLoaded: function () {
				  $(".slider-wrapper")[0].style.height = "auto";
				}
			} );
		} );
	</script>
	<div class="slider-wrapper">
		<div id="camera_wrap">
			%CONTENT%
		</div>
		<div class="clearfix"></div>
	</div>';
	
	$templates[ 'slide' ] = '
	<div data-src="%IMAGE_URL%">
		<div class="caption fadeIn">
			<div class="container">
				<div class="row">
					<div class="grid_12">
						%TEXT%
					</div>
				</div>
			</div>
		</div>
	</div>
	';
	
	$templates[ 'article' ] = '
	<div class="heading1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
		<h2>%TITLE%</h2>
	</div>
	<div class="box4-wrapper1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
		<div class="article margin-bottom box4">
			%IMAGE%
			<div class="content">%CONTENT%</div>
		</div>
	</div>
	';
	
	$templates[ 'newsbox' ] = '	
	<div class="post1 clearfix wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
		%IMAGE%
		<time datetime="%DATETIME%">%DATE%</time>
		<h3>%LINK%</h3>
		%CONTENT%
	</div>
	';
	
	$templates[ 'news' ] = '	
	<div class="post1 clearfix wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
		%IMAGE%
		<time datetime="%DATETIME%">%DATE%</time>
		<h3>%TITLE%</h3>
		%CONTENT%
	</div>
	';
	
	$templates[ 'colored' ] = '
	<div class="grid_4">
		<div class="box1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
			%IMAGE%
			<div class="content content__inset%COUNTER% maxheight">
				<h4>
					%LINK%
				</h4>
				%DESCRIPTION%
			</div>
		</div>
	</div>
	';
	
	$templates[ 'list' ] = '
	<li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
		%LINK%
	</li>
	';
	
	$templates[ 'ul' ] = '
	<div class="grid_4">
		<ul class="list1">
			%CONTENT%
		</ul>
	</div>
	';
	
	$templates[ 'ul-simple' ] = '
	<div class="grid_4">
		<ul class="list1 list1__inset1">
			%CONTENT%
		</ul>
	</div>
	';
	
	$templates[ 'question' ] = '
	<div class="question_post">
		<p class="question">%TITLE%: %DESCRIPTION%</p>
		%CONTENT%
		%EDIT_LINK%
	</div>
	';
	
	$templates[ 'rounded_3' ] = '
	<div class="grid_4">
		<div class="box5 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
			%IMAGE%
			<h3 class="h3__inset%COUNTER% wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
				%TITLE%
			</h3>
			%CONTENT%
		</div>
	</div>
	';
	
	$templates[ 'rounded_4' ] = '
	<div class="grid_3">
		<div class="box3 rounded_4 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
			%IMAGE%
			<h3>%LINK%</h3>
			%DESCRIPTION%
		</div>
	</div>
	';
	
	$templates[ 'textblocks' ] = '
	<div class="grid_4">
		<div class="box2 box2__inset1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
			<h3 class="h3__inset%COUNTER%">
				%TITLE%
			</h3>
			%CONTENT%
		</div>
	</div>
	';
	
	$templates[ 'testimonial' ] = '
	<div class="testimonial">
		<p class="info">%INFO%</p>
		<p class="testimonial">%CONTENT%</p>
	</div>
	';
	
	$templates[ 'map' ] = '
	<div class="%CLASS%" data-wow-duration="1s" data-wow-delay="0.1s">
		<div class="google-map1" id="google-map">
			%CONTENT%
		</div>
	</div>
	';
	
	if ( $templates[ $template ] ) {
		return $templates[ $template ];
	}
} ?>
