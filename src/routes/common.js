
import $ from 'jquery';
window.jQuery = $;
require('jquery-visible');
require('slick-carousel');
import noUiSlider from 'nouislider';


export default {
  init() {
  	// Wrap embedded objects and force them into 16:9
  	$('iframe, embed, video').not('.ignore-ratio').not('#modal-funnel iframe').wrap('<div class="video-container" />');

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

    // Make very first module active on load
    $('.module:first-of-type').addClass('is-visible');

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

    // LINK: Scroll to Next
    $('a[href="#down"]').click(e => {
      e.preventDefault();
      const $this = $(e.currentTarget);
      $('html, body').animate({
        scrollTop: $this.closest('.module').next().offset().top - 60
      });
    });

    // LINK: Open Schedule Funnel
    $('a[href="#schedule"]').click(e => {
      e.preventDefault();
  		$('#container').addClass('modal-active');
      $('#modal-funnel').addClass('is-active');
    });

    // LINK: Scroll to Contact Form
    $('a[href="#contact"]').click(e => {
      e.preventDefault();
      const $this = $(e.currentTarget);
      $('html, body').animate({
        scrollTop: $('#footer-form').offset().top - 60
      });
    });

    // MODAL: Close Modal Window
    $('.modal-close, .modal-matte').on('click', e => {
      e.preventDefault();
  		$('#container').removeClass('modal-active');
      $('.modal-parent').removeClass('is-active');
    });

    // FUNNEL: Event Listener for Step Switch
    var modalFunnel = document.querySelector('#modal-funnel .wpcf7');
    modalFunnel.addEventListener('wpcf7mailsent', (e) => {
      $('#funnel-step-first').removeClass('is-active');
      $('#funnel-step-second').addClass('is-active');
    }, false);

    // FUNNEL: Budget Range Slider
    const funnelBudgetRange = document.getElementById('form-budget-range');
    const funnelBudgetLow = $('#form-budget-low').val();
    const funnelBudgetMin = $('#form-budget-low').attr('min');
    const funnelBudgetHigh = $('#form-budget-high').val();
    const funnelBudgetMax = $('#form-budget-high').attr('max');
    noUiSlider.create(funnelBudgetRange, {
      start: [funnelBudgetLow, funnelBudgetHigh],
      step: 100,
      range: {
        'min': [parseInt(funnelBudgetMin)],
        'max': [parseInt(funnelBudgetMax)],
      },
      connect: [false, true, false],
    });
    funnelBudgetRange.noUiSlider.on('update', (values, handle) => {
      const budgetLow = Math.ceil(values[0]);
      const budgetHigh = Math.ceil(values[1]);
      let budgetLimit = '';
      if(budgetHigh == funnelBudgetMax) {
        budgetLimit = `${budgetHigh}+`;
      } else {
        budgetLimit = budgetHigh;
      }
      $('#form-budget-output').text(`$${budgetLow} - $${budgetLimit}`);
      $('#form-budget-low').val(budgetLow);
      $('#form-budget-high').val(budgetHigh);
    });

    // GALLERY: Open Modal Lightbox
    $('.gallery-image').on('click', e => {
      const $this = $(e.currentTarget);
      const current = $this.html();
  		$('#container').addClass('modal-active');
      $('#modal-photo').addClass('is-active');
      $('#modal-photo .modal-content').html(current);
    });
  },
};
