require('jquery-visible');
const $ = jQuery;

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
  },
  finalize() {
  	// MODULES: Parallax Diamond (Customized from traditional parallax)
  	$(window).on('load resize scroll', () => {
  		const d_scroll = $(window).scrollTop();
  		const w_height = $(window).height();
      const b_height = $('body').height();
  		$('.animate-parallax').each((i, e) => {
  			const $this = $(e);
  			const $thisBg = $this.find('.module-bg');
  			const ebg_height = $this.find('.module-bg').outerHeight();
  			const bg_diff = ebg_height - w_height;
  			// Boolean hit Check
				const per_scrolled = (d_scroll + w_height) / b_height;
				const offset = (bg_diff * per_scrolled);
				$thisBg.css('transform', `translateY(-${offset}px)`);
  		});
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
  },
};
