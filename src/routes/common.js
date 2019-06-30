import $ from 'jquery';
window.jQuery = $;
require('jquery-visible');
require('slick-carousel');


export default {
  init() {
  	// Wrap embedded objects and force them into 16:9
  	$('iframe, embed, video').not('.ignore-ratio').wrap('<div class="video-container" />');

  	// HEADER: Responsive Nav Toggle
  	$('#responsive-nav-toggle').click(e => {
      e.preventDefault();
  		const $this = $(e.currentTarget);
  		$this.toggleClass('is-active');
  		$('#nav-header').toggleClass('is-active');
  		$('#container').toggleClass('nav-active');
  	});
    $('.module, #footer').on('click', () => {
      if($('#container').hasClass('nav-active')) {
  		    $('#container').removeClass('nav-active');
      		$('#nav-header, #responsive-nav-toggle').removeClass('is-active');
      }
    });

    // HEADER: Add Class on Scroll
    $(window).on('load scroll', () => {
      let scroll = $(window).scrollTop();
      if (scroll >= 150) {
        $('#header').addClass('is-scrolled');
      } else {
        $('#header').removeClass('is-scrolled');
      }
    });

    // MAILCHIMP: Footer Newsletter Signup AJAX Form
    const $mcForm = $('#subscribe-form');
    if($mcForm.length > 0) {
      $mcForm.submit((e) => {
          e.preventDefault();
          register($mcForm);
      });
    }
    if(localStorage.getItem('idahowebsitesSubscribe')) {
      $('#subscribe-text-success').addClass('is-active');
      $mcForm.addClass('is-subscribed');
    } else {
      $('#subscribe-text-entice').addClass('is-active');
    }
    function register($form) {
      $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data: $form.serialize(),
        cache: false,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        error: (err) => { alert('Could not connect to the registration server. Please try again later.'); },
        success: (data) => {
          if (data.result != 'success') {
            $('.subscribe-text').removeClass('is-active');
            $('#subscribe-text-error').addClass('is-active');
            $('#subscribe-text-error span').html(`<em>${data.msg.replace('0 - ', ' ')}.</em>`);
          } else {
            $('.subscribe-text').removeClass('is-active');
            $('#subscribe-text-success').addClass('is-active');
            $mcForm.addClass('is-subscribed');
            localStorage.setItem('idahowebsitesSubscribe',true);
          }
        }
      });
    }
  },
  finalize() {
  	// MODULES: Parallax Diamond (Customized from traditional parallax)
  	$(window).on('load resize scroll', () => {
  		const d_scroll = $(window).scrollTop();
  		const w_height = $(window).height();
      const b_height = $('body').height();
			const $this = $('#container');
			const $thisBg = $this.find('.module-bg');
			const ebg_height = $this.find('.module-bg').outerHeight();
			const bg_diff = ebg_height - w_height;
			const per_scrolled = (d_scroll + w_height) / b_height;
			const offset = (bg_diff * per_scrolled);
			$thisBg.css('transform', `translateY(-${offset}px)`);
  	});

  	// MODULES: Animate onScreen
  	$(window).on('load resize scroll', () => {
  		$('.animate-on-enter').each((i, el) => {
  			const $this = $(el);
  			if ($this.visible(true)) {
  				$this.addClass('is-visible');
  			}
  		});
  		$('.animate-on-leave').each((i, el) => {
  			const $this = $(el);
  			if (!$this.visible(true)) {
  				$this.removeClass('is-visible');
  			}
  		});
  	});

    // MODULES: Decorative Slideshow
    $('.slider-deco').slick({
      arrows: false,
      fade: true,
      autoplay: true,
      autoplaySpeed: 6660,
      speed: 666,
      pauseOnHover: false,
      pauseOnFocus: false,
    });

    // MODULES: Testimonial Slider
    $('.slider-testimonials').slick({
      rows: 0,
      slide: '.testimonial',
      autoplay: true,
      autoplaySpeed: 9666,
    });

    // MODULE: Vertical Slider
    $('.slider-vertical').slick({
      arrows: false,
      vertical: true,
      autoplay: true,
      autoplaySpeed: 1666,
      pauseOnHover: false,
      pauseOnFocus: false,
    });

    // HERO: Scroll to Next
    $('a[href="#down"]').click(e => {
      e.preventDefault();
      const $this = $(e.currentTarget);
      $('html, body').animate({
        scrollTop: $this.closest('.module').next().offset().top - 60
      });
    });
  },
};
