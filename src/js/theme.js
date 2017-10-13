var wh = window.innerHeight,
ww = window.innerWidth,
sections = document.getElementById('main').getElementsByTagName('section');

for (var i = 0; i < sections.length; i++) {
	sections[i].style.height = wh + 'px';
	sections[i].style.width = ww + 'px';
}

document.onscroll = function() { scroller_coster();};

function scroller_coster() {
	var aboveFold = document.getElementById('above-fold').offsetTop,
	christLiving = document.getElementById('christian-living').offsetTop,
	marriageFamily = document.getElementById('marriage-family').offsetTop,
	disabilityGospel = document.getElementById('disability-gospel').offsetTop,
	e_footer = document.getElementById('e-state-footer').offsetTop,
	checker = window.pageYOffset;

	console.log(window.pageYOffset + ' ' + document.body.scrollTop + ' ' + document.documentElement.scrollTop);

	if (document.body.scrollTop > aboveFold && document.body.scrollTop < christLiving || document.documentElement.scrollTop > aboveFold && document.documentElement.scrollTop < christLiving ) {
		console.log('scroll down ' + christLiving);
		window.scrollTo( 0, christLiving );
	}
	if (document.body.scrollTop > aboveFold && document.body.scrollTop < christLiving || document.documentElement.scrollTop > aboveFold && document.documentElement.scrollTop < christLiving ) {
		console.log('scroll down ' + christLiving);
		window.scrollTo( 0, christLiving );
	}
}