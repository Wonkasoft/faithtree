var wh = window.innerHeight,
ww = window.innerWidth,
mast = document.querySelector( '#masthead' ),
main = document.getElementById('main'),
sub_menu1 = document.getElementById('sub-menu-1'),
sections = document.querySelectorAll('.home #main>section'),
section_id = [],
section_offsets = [],
current_section = sections[0],
page_footer = '',
currentY = '',
scrollY = 0,
distance = 10,
speed = 8,
scroll_live = true;

window.onload = function () {
	set_section_heights();
	if ( document.getElementById( 'sub-menu-1' ) ) {
		set_bottom_menu();
		/*setTimeout( function () {
					scroller_coster( current_section.id );
				}, 2000);*/
	}
	// adjustment of footer for sub-menu
	if ( document.getElementsByClassName( 'cta' ) ) {
		set_cta();
	}
};

window.onresize = function () {
	set_section_heights();
	if ( document.getElementById( 'sub-menu-1' ) ) {
		set_bottom_menu();
	}
	// adjustment of footer for sub-menu
};

window.onscroll = function () {
	if ( window.pageYOffset > mast.clientHeight ) {
		mast.classList.add( 'sticky-stuck' );
	} else if ( window.pageYOffset < mast.clientHeight ) {
		mast.classList.remove( 'sticky-stuck' );
	}
};
if (document.querySelector( '#mobile-menu-primary' )) {
	document.querySelector( '#mobile-menu-primary' ).onblur = function () {
		setTimeout( function () { 
			document.querySelector( '#mobile-menu-primary' ).setAttribute('aria-expanded', 'false');
			document.querySelector( '#mobile-sub-menu' ).classList.remove( 'in' );
		}, 20);
	}
};

if ( document.querySelector( '[data-target="#videoModal"]' ) ) {
	document.querySelector( '[data-target="#videoModal"]' ).onclick = function () {
		setTimeout( function () {
			document.querySelector('.modal-backdrop').remove();
		}, 10);
	};
}

if (document.getElementById('sub-menu-1')) {
	var submenu_children = sub_menu1.children;
	for (var i = 0; i < submenu_children.length; i++) {
		submenu_children[i].children[0].onclick = function (e) {
			e.preventDefault();
			var child_item = this.getAttribute('href');
			if ( child_item.charAt(0) != '#' ) {

			} else {
				child_item = child_item.replace( '#', '' );
				scroller_coster( child_item );
			}
		};
	}
	// exiting if statement
}

// for stoping the video from playing
if ( document.querySelector( '#videoModal' ) ) {
	document.querySelector( '#videoModal .close-exit' ).onclick = function () {
		var vid_src = document.querySelector( '.video-body iframe' ).getAttribute( 'src' );
		document.querySelector( '.video-body iframe' ).setAttribute( 'src', '/' );
		document.querySelector( '.video-body iframe' ).setAttribute( 'src', vid_src );
	};
	// exiting if statement
}

page_footer = document.getElementById('page-footer').offsetTop;

// Sub-Menu section change
var top_menu = document.querySelectorAll('.top-menu');
for (var i = 0; i < top_menu.length; i++) {
	top_menu[i].onclick = function () {
		var menu_btn = this.getAttribute('name');
		
		// menu-tabs reset and set new section
		var menu_tabs = document.getElementsByClassName('menu-tabs');
		for (var i = 0; i < menu_tabs.length; i++) {
			if ( menu_tabs[i].classList.contains( 'active' ) ) {
				menu_tabs[i].classList.remove( 'active' );
			}
		}
		if ( menu_btn == 'menu-pop' ) {
			document.querySelector( '.menu-tab-menu-pop' ).classList.add( 'active' );
		}
		if ( menu_btn == 'search-menu' ) {
			document.querySelector( '.menu-tab-search-menu' ).classList.add( 'active' );
		}
		if ( menu_btn == 'news-menu' ) {
			document.querySelector( '.menu-tab-news-menu' ).classList.add( 'active' );
		}
	};
}

// for scroller coaster
if ( document.getElementsByTagName( 'body' )[0].classList.contains( 'home' ) ) {
	window.onscroll = function () {
		currentY = window.pageYOffset;
		var current_offset = getClosestSection( currentY, section_offsets );
		var active_li;


		if ( current_section.offsetTop != current_offset ) {
			
			// setting active-color and scroll
			for (var i = 0; i < sections.length; i++) {
				if ( sections[i].offsetTop == current_offset ) {
					current_section = document.getElementById(sections[i].id);
					// remove active-color class
					var menu_childs = sub_menu1.children;
					for (var w = 0; w < menu_childs.length; w++) {
						active_li = menu_childs[w].children[0].getAttribute('href');
						if ( active_li.charAt(0) != '#' ) {
							active_li = '';
						}
						active_li = active_li.replace('#', '');
						if ( menu_childs[w].children[0].classList.contains( 'active-color' ) ) {
							menu_childs[w].children[0].classList.remove( 'active-color' );
						}
						if ( sections[i].id == active_li ) {
							menu_childs[w].children[0].classList.add( 'active-color' );
							document.querySelector("#mobile-menu-primary").innerHTML= document.querySelector( '.active-color>.text-top' ).innerHTML;
							document.querySelector(".sub-menu-cols.visible-xs .panel-group .panel>.panel-heading").style.color = '#fff';
							document.querySelector(".sub-menu-cols.visible-xs .panel-group .panel>.panel-heading").style.backgroundColor = '#404043';
						}
					}
				}
			}
			if (!scroll_live) {
				// exiting if cannot scroll
				return false;
			} else {
				scroll_live = false;

				/*setTimeout( function () {
					scroller_coster( current_section.id );
				}, 2000);*/
			}
		} else if ( section_offsets[section_offsets.length - 1] == current_offset ) {
			if (!scroll_live) {
				// exiting if cannot scroll
				return false;
			} else {
				scroll_live = false;

				/*setTimeout( function () {
					scroller_coster( current_section.id );
				}, 5000);*/
			}
		} else {
			if (!scroll_live) {
				// exiting if cannot scroll
				return false;
			} else {
				scroll_live = false;

				/*setTimeout( function () {
					scroller_coster( current_section.id );
				}, 2000);*/
			}
		}
	};
}

function scroller_coster( el ) {
	scroll_live = false;
	currentY = window.pageYOffset;
	var targetY = document.getElementById( el ).offsetTop,
	direction = '',
	pageHeight = document.getElementById( 'page-wrap' ).offsetHeight,
	yPos = currentY + window.innerHeight,
	animator = setTimeout('scroller_coster(\'' + el + '\')', speed);
	if ( currentY > targetY ) {
		direction = 'up';
	} else {
		direction = 'down';
	}
	if ( yPos > pageHeight ) {
		clearTimeout(animator);
	} else {
		if ( currentY < targetY-distance && direction == 'down' ) {
			scrollY = currentY+distance;
			window.scroll( 0, scrollY );
		} else if ( currentY > targetY  && direction == 'up' ) {
			scrollY = currentY-distance;
			window.scroll( 0, scrollY );
		} else {
			clearTimeout(animator);
			window.scrollTo( 0, targetY );
			current_section = document.getElementById( el );
			setTimeout( function () {
				scroll_live = true;
			}, 500);
		}
	}
}

function getClosestSection( num, array ) {
	var i = 0, closest, closestDiff, currentDiff;
	if ( array.length ) {
		closest = array[0];
		for (i; i < array.length; i++) {
			if (num >= closest) {
				closestDiff = Math.abs( num - closest );
			} else {
				closestDiff = Math.abs( closest - num );
			}
			if ( num >= array[i] ) {
				currentDiff = Math.abs( num - array[i] );
			} else {
				currentDiff = Math.abs( array[i] - num );
			}

			if ( currentDiff < closestDiff ) {
				closest = array[i];
			}
		}
		//returns first element that is closest to number
		return closest;
	}
	//no length
	return false;
}

function set_section_heights() {
	wh = window.innerHeight;
	for (var i = 0; i < sections.length; i++) {
		if ( sections[i].id == 'under-header' || sections[i].id == 'content-section' ) {

		} else {
			sections[i].style.height = wh + 5 + 'px';
			section_id.push( sections[i].id );
			section_offsets.push( sections[i].offsetTop );
		}
	}

	// exiting function
}

function set_bottom_menu() {
	ww = window.innerWidth;
	var bottom_menu = document.getElementById('sub-menu-1').children,
	li_width = ww / bottom_menu.length / ww * 100 - 0.5,
	add_divs = '';

	// adjustment of footer for sub-menu
	document.getElementById('page-footer').style.height = '450px';
	var foot_height = document.getElementById('page-footer').style.height;
	document.getElementById('main').style.paddingBottom = foot_height;

	if ( !document.querySelector( '#sub-menu-1 .text-slide' ) ) {
		// setting width of sub-menu items
		for (var i = 0; i < bottom_menu.length; i++) {
			bottom_menu[i].style.width = li_width + '%';
			add_divs = bottom_menu[i].children[0].innerHTML;
			bottom_menu[i].children[0].innerHTML = '<div class="text-slide text-top">' + add_divs + '</div><div class="text-slide text-bottom">' + add_divs + '</div>';
		}
	}
	// exiting function
}

function set_cta() {
	var call_to_actions = document.getElementsByClassName('cta');
	var cta_children = '';
	var g_cta = '';

	// setting all cta btns
	for (var i = 0; i < call_to_actions.length; i++) {
		g_cta = call_to_actions[i].children[0].innerHTML;
		call_to_actions[i].children[0].innerHTML = '<div class="text-slide text-top">' + g_cta + '</div><div class="text-slide text-bottom">' + g_cta + '</div>';
	}
	// exiting function
}