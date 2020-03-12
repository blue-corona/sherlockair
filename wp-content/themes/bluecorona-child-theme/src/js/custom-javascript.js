//gravity forms error handling
jQuery(document).on('gform_post_render', function(event, form_id, current_page){
    // code to trigger on form or form page render
    //Error for form with static labels
	jQuery('.gfield_error > .ginput_container').focusin(function(){
    jQuery(this).parent('li').children('label').show();
		jQuery(this).parent('li').children('.validation_message').hide();
		jQuery(this).parent('li').removeClass('gfield_error');
	});
    console.log('form render');
    toggleFloatLabel('.ginput_container_text');
  //Code for form with floating labels
    jQuery('.ginput_container_text').focusin(function(){
      jQuery(this).parent('li').children('label').addClass('float_label');
    });
    

    jQuery('.ginput_container_text').focusout(function(){
       toggleFloatLabel(this);
        
    });


    //Error handling for form with floating labels
    jQuery('.floating_labels .gfield_error > label').hide();
    jQuery('.floating_labels .gfield_error > .validation_message').addClass('validation_message--float');    

});

function toggleFloatLabel(selector){
  jQuery(selector).children('input').each(function(){
    if(!jQuery(this).val()) {
      jQuery(this).parent('.ginput_container_text').parent('li').children('label').removeClass('float_label');
      console.log(2);
    } else {
      jQuery(this).parent('.ginput_container_text').parent('li').children('label').addClass('float_label');
      console.log(3);
    }
  })
}


jQuery(document).ready(function(){
    jQuery(".navbar-nav li").hover(
    function(){
        jQuery(this).children('ul').hide();
        jQuery(this).children('ul').show();
    },
    function () {
        jQuery('ul', this).hide();            
    });
});

//Nav behaviour on touch screens
jQuery(".nav-link").on('touchstart',function(e){
  e.preventDefault();
  e.stopPropagation();
  if(jQuery(e.target).is("a")){
    window.location = this.getAttribute('href');
  }

  if(jQuery(this).children('span').children('svg').hasClass("fa-angle-up")){

    jQuery(this).children('span').children('svg').removeClass("fa-angle-up");
    jQuery(this).children('span').children('svg').addClass("fa-angle-down");
  }else{
    jQuery(this).children('span').children('svg').addClass("fa-angle-up");
    jQuery(this).children('span').children('svg').removeClass("fa-angle-down");
  }
  
  jQuery(this).parent('li').children('ul').toggle();
  return false;

});

jQuery(".bc_toggle_content").on('click', function(e){
  e.preventDefault();
  var dataToToggle = jQuery(this).data('toggle');
  // jQuery(dataToToggle).toggleClass('d-none');
  jQuery(dataToToggle).animate({
    height:'toggle'
  },"slow");
  var currentIcon = jQuery(this).children('svg').data('icon');
  var newIcon = currentIcon == "plus-circle" ? "minus-circle" : "plus-circle";

  // jQuery(this).children('svg').data('icon', newIcon);
  jQuery(this).children('svg').toggleClass("fa-"+currentIcon);
  jQuery(this).children('svg').toggleClass("fa-"+newIcon);
})

//Focus search on icon click
jQuery('#searchsubmit').click(function(){jQuery('#s').focus()});

//Hide announcement bar on scroll
jQuery(window).scroll(function() {
  if (jQuery(this).scrollTop() > 0) {
    jQuery('.bc_announcement_bar').hide();
  } else {
    jQuery('.bc_announcement_bar').show();
  }
});