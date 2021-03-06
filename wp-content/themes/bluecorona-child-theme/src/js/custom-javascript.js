//gravity forms error handling
//gravity forms error handling
jQuery(document).on('gform_post_render', function(event, form_id, current_page){
console.log('In this file');
    // code to trigger on form or form page render
    //Error for form with static labels
    jQuery('.gfield_error > .ginput_container').focusin(function(){
      jQuery(this).parent('li').children('label').show();
      jQuery(this).parent('li').find('.validation_message').hide();
      jQuery(this).parent('li').removeClass('gfield_error');
    });
    console.log('form render');
    toggleFloatLabel('.ginput_container_text');
    toggleFloatLabel('.ginput_container_textarea');
    toggleFloatLabel('.ginput_container_phone');
  //Code for form with floating labels
  jQuery('.ginput_container_text').focusin(function(){
    jQuery(this).parent('li').children('label').addClass('float_label');
  });


  jQuery('.ginput_container_text').focusout(function(){
   toggleFloatLabel(this, 'input');

 });

  jQuery('.ginput_container_textarea').focusin(function(){
    jQuery(this).parent('li').children('label').addClass('float_label');
  });


  jQuery('.ginput_container_textarea').focusout(function(){
   toggleFloatLabel(this, 'textarea');

 });

  jQuery('.ginput_container_phone').focusin(function(){
    jQuery(this).parent('li').children('label').addClass('float_label');
  });


  jQuery('.ginput_container_phone').focusout(function(){
   toggleFloatLabel(this, 'tel');

  });


    //Error handling for form with floating labels
    jQuery('.floating_labels .gfield_error > label').hide();
    jQuery('.floating_labels .gfield_error .validation_message').addClass('validation_message--float');    

  });

function toggleFloatLabel(selector, type){
  var containerClass='.ginput_container_text';

  if(type=='textarea'){
    containerClass='.ginput_container_textarea';
  }
  if(type=='tel'){
    containerClass='.ginput_container_phone';
    type='input';
  }
  
  jQuery(selector).children(type).each(function(){
    if(!jQuery(this).val()) {
      jQuery(this).parent(containerClass).parent('li').find('label').removeClass('float_label');
      console.log(2);
    } else {
      jQuery(this).parent(containerClass).parent('li').find('label').addClass('float_label');
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
  e.stopPropagation();
  // if(jQuery(e.target).is(".nav-link-title")){
    window.location = this.getAttribute('href');
    
    return;
  // }

  // if(jQuery(e.target).is("a")){
  //   return;
  // }

  // if(jQuery(this).children('span').children('svg').hasClass("fa-angle-up")){

  //   jQuery(this).children('span').children('svg').removeClass("fa-angle-up");
  //   jQuery(this).children('span').children('svg').addClass("fa-angle-down");
  // }else{
  //   jQuery(this).children('span').children('svg').addClass("fa-angle-up");
  //   jQuery(this).children('span').children('svg').removeClass("fa-angle-down");
  // }
  
  // jQuery(this).parent('li').children('ul').toggle();
  // return false;

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

jQuery(document).ready(function(){
  setTimeout(function(){
    jQuery('.search-toggle').click(function(){
      jQuery('#nav-search-form').toggleClass('d-none');
    });
    console.log('here');
    jQuery("input#s").val();
    console.log('after');
    if(typeof jQuery("input#s").val() != "undefined" && jQuery("input#s").val() != "" ){
      jQuery("#searchlabel").hide(); 
    }

  });
});

/* Homepage expandable collapsible section */
jQuery('.homepage-readmore-btn').click(function(e) {
  e.preventDefault();
  console.log('click');
  jQuery('.homepage-exp-content').slideToggle('slow');
  jQuery(this).text(jQuery(this).text() == 'Read Less' ? 'Read More' : 'Read Less');
});

/* Subpage expandable collapsible section */
jQuery('.subpage-readmore-btn').click(function(e) {
  e.preventDefault();
  console.log('click');
  jQuery('.subpage-exp-content').slideToggle('slow');
  jQuery(this).text(jQuery(this).text() == 'Read Less' ? 'Read More' : 'Read Less');
});