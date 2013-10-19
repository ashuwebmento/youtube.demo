$(document).ready(function() {
	//Default Action
	$(".tab_content").hide(); //Hide all content
	$(".tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$(".tabs li").click(function() {
		$(".tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});


//Default Action
$(".tab_two_content").hide(); //Hide all content
$(".tabs-two li:first").addClass("active").show(); //Activate first tab
$(".tab_two_content:first").show(); //Show first tab content

//On Click Event
$(".tabs-two li").click(function() {
	$(".tabs-two li").removeClass("active"); //Remove any "active" class
	$(this).addClass("active"); //Add "active" class to selected tab
	$(".tab_two_content").hide(); //Hide all tab content
	var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
	$(activeTab).fadeIn(); //Fade in the active content
	return false;
});



//Default Action
$(".tab_three_content").hide(); //Hide all content
$(".tabs-three li:first").addClass("active").show(); //Activate first tab
$(".tab_three_content:first").show(); //Show first tab content

//On Click Event
$(".tabs-three li").click(function() {
	$(".tabs-three li").removeClass("active"); //Remove any "active" class
	$(this).addClass("active"); //Add "active" class to selected tab
	$(".tab_three_content").hide(); //Hide all tab content
	var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
	$(activeTab).fadeIn(); //Fade in the active content
	return false;
});




$('ul.slimmenu').slimmenu({
  resizeWidth: '800',
  collapserTitle: 'Main Menu',
  easingEffect: 'easeInOutQuint',
  animSpeed: 'medium',
  indentChildren: true,
  childrenIndenter: '&raquo;'
});