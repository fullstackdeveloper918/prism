!(function(e) {
  'use strict';
  function t(i) {
    if (n[i]) return n[i].exports;
    var o = (n[i] = { i: i, l: !1, exports: {} });
    return e[i].call(o.exports, o, o.exports, t), (o.l = !0), o.exports;
  }
  var n = {};
  (t.m = e),
    (t.c = n),
    (t.d = function(e, n, i) {
      t.o(e, n) ||
        Object.defineProperty(e, n, {
          configurable: !1,
          enumerable: !0,
          get: i
        });
    }),
    (t.n = function(e) {
      var n =
        e && e.__esModule
          ? function() {
              return e.default;
            }
          : function() {
              return e;
            };
      return t.d(n, 'a', n), n;
    }),
    (t.o = function(e, t) {
      return Object.prototype.hasOwnProperty.call(e, t);
    }),
    (t.p = ''),
    t((t.s = 0));
})([
  function(e, t) {
    jQuery(function(e) {
      'use strict';
      function t() {
        e('#wpadminbar').length && (a = e('#wpadminbar').outerHeight());
      }
      function n() {
        var t, n;
        (t = l.is(':visible') ? l : s),
          (n = t.find('.l-primary-header').outerHeight()),
          t.height(n),
          n > 0 && (c = n),
          t.hasClass('l-primary-header--absolute') &&
            e('.o-hero__content').css('padding-top', c);
      }
      function i() {
        var t, n, i;
        (t = e(window).innerHeight()),
          (i = e('.l-primary-footer').outerHeight()),
          e('.l-primary-header--default-wrapper').hasClass(
            'l-primary-header--absolute'
          ) ||
          e('.l-primary-header--responsive-wrapper').hasClass(
            'l-primary-header--absolute'
          )
            ? ((n = t - a - r - i), e('.l-main-wrapper').css('min-height', n))
            : ((n = t - a - r - c - i),
              e('.l-main-wrapper').css('min-height', n));
      }
      function o() {
        var t, n;
        (t = e(window).innerHeight()),
          e('.l-primary-header--default-wrapper').hasClass(
            'l-primary-header--absolute'
          ) ||
          e('.l-primary-header--responsive-wrapper').hasClass(
            'l-primary-header--absolute'
          )
            ? ((n = t - a - r), e('.t-404 .o-hero').css('height', n))
            : ((n = t - a - r - c), e('.t-404 .o-hero').css('height', n));
      }
      if (e('.elementor-section').hasClass('neuron-fixed-yes')) {
        new PerfectScrollbar('.neuron-fixed-yes');
      }
      e('.neuron-fixed-hidden-yes--close-button').append(
        '<a class="a-close-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></a>'
      ),
        e(
          '.neuron-fixed-hidden-yes.neuron-fixed-hidden-yes--close-button .a-close-button'
        ).on('click', function(t) {
          t.preventDefault(),
            t.stopPropagation(),
            e('.neuron-fixed-hidden-yes').removeClass('active');
        });
      var a = 0,
        r = 0,
        s = e('.l-primary-header--default-wrapper'),
        l = e('.l-primary-header--responsive-wrapper'),
        c = 0;
      e('#wpadminbar').addClass('neuron-wpadminbar'),
        t(),
        n(),
        i(),
        o(),
        e('.l-primary-header--responsive-wrapper').hasClass(
          'l-primary-header--sticky'
        ) && e('l-primary-header').css('top', r + 'px');
      var d;
      e('.m-nav-menu--horizontal ul li.menu-item-has-children').on({
        mouseenter: function() {
          clearTimeout(d);
          var t = e(this).children('.sub-menu'),
            n = e(this).parents('.sub-menu'),
            i = e(window).width();
          ((n.length && n.hasClass('sub-menu--left')) ||
            i - (t.offset().left + t.outerWidth() + 1) < 0) &&
            t.addClass('sub-menu--left'),
            t.addClass('active');
        },
        mouseleave: function() {
          var t = e(this).children('.sub-menu');
          t.removeClass('active'),
            (d = setTimeout(
              function() {
                t.removeClass('sub-menu-left');
              }.bind(this),
              250
            ));
        }
      }),
        e('.menu-item.disabled > a').on('click', function(e) {
          e.preventDefault();
        }),
        e('.menu-item').hasClass('m-mega-menu') &&
          e('.m-nav-menu--horizontal ul').addClass('m-mega-menu-holder'),
        e(
          '<a href="#" class="menu-item-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>'
        ).insertAfter(
          '.m-nav-menu--mobile .menu-item-has-children > a, .m-nav-menu--vertical ul .menu-item-has-children > a'
        ),
        e('.l-primary-header .m-nav-menu--mobile-icon').on('click', function(
          t
        ) {
          t.stopPropagation(),
            t.preventDefault(),
            e('.l-primary-header .m-nav-menu--mobile').toggleClass('active'),
            e(
              '.l-primary-header .m-nav-menu--mobile .menu-item-has-children > .menu-item-icon'
            ).removeClass('active'),
            e('.l-primary-header .m-nav-menu--mobile')
              .find('.sub-menu')
              .slideUp('fast');
        }),
        e(
          '.m-nav-menu--mobile .menu-item-has-children > .menu-item-icon, .m-nav-menu--vertical ul .menu-item-has-children > .menu-item-icon'
        ).on('click', function(t) {
          t.stopPropagation(),
            t.preventDefault(),
            e(this).toggleClass('active');
          var n = e(this).next('ul'),
            i = e(this)
              .closest('ul')
              .children('li');
          i
            .find('.sub-menu')
            .not(n)
            .slideUp('fast'),
            i
              .find('.menu-item-icon')
              .not(this)
              .removeClass('active'),
            n.slideToggle('fast');
        }),
        e('.a-site-search-icon').on('click', function(t) {
          t.preventDefault(),
            t.stopPropagation(),
            e('.m-site-search').addClass('active'),
            setTimeout(function() {
              e('.m-site-search__form__input').focus();
            }, 300);
        }),
        e('.m-site-search__close-icon, .m-site-search__overlay').on(
          'click',
          function() {
            e('.m-site-search').removeClass('active');
          }
        ),
        e(document).on('bind keydown', function(t) {
          27 == t.which && e('.m-site-search').removeClass('active');
        }),
        e(window).scroll(function() {
          e(window).scrollTop() > 150
            ? e('.a-to-top').addClass('a-to-top--active')
            : e('.a-to-top').removeClass('a-to-top--active');
        }),
        e('.a-to-top').on('click', function() {
          return e('html, body').animate({ scrollTop: 0 }, 500), !1;
        }),
        e(
          '.sticky .o-blog-post .o-blog-post__content .o-blog-post__meta'
        ).prepend(
          '<span class="o-blog-post__sticky a-separator"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>Sticky</span>'
        ),
        e('.woocommerce-MyAccount-navigation-link--dashboard a').append(
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>'
        ),
        e('.woocommerce-MyAccount-navigation-link--orders a').append(
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>'
        ),
        e('.woocommerce-MyAccount-navigation-link--downloads a').append(
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>'
        ),
        e('.woocommerce-MyAccount-navigation-link--edit-address a').append(
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>'
        ),
        e('.woocommerce-MyAccount-navigation-link--edit-account a').append(
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>'
        ),
        e('.woocommerce-MyAccount-navigation-link--customer-logout a').append(
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>'
        ),
        e(
          '.p-portfolio-single--sticky-content .p-portfolio-single__content-wrapper'
        ).theiaStickySidebar({ additionalMarginTop: 42 }),
        e('.h-lightbox').magnificPopup({
          delegate: '.h-lightbox-link',
          type: 'image',
          tClose: 'Close (Esc)',
          tLoading: '',
          gallery: {
            enabled: !0,
            tPrev: 'Previous (Left arrow)',
            tNext: 'Next (Right arrow)',
            tCounter: '%curr% of %total%'
          },
          image: { tError: 'The image can not be loaded.' },
          mainClass: 'mfp-zoom-in',
          removalDelay: 300,
          callbacks: {
            beforeOpen: function() {
              e('.lightbox a').each(function() {
                e(this).attr(
                  'title',
                  e(this)
                    .find('img')
                    .attr('title')
                );
              });
            },
            open: function() {
              (e.magnificPopup.instance.next = function() {
                var t = this;
                t.wrap.removeClass('mfp-image-loaded'),
                  setTimeout(function() {
                    e.magnificPopup.proto.next.call(t);
                  }, 120);
              }),
                (e.magnificPopup.instance.prev = function() {
                  var t = this;
                  t.wrap.removeClass('mfp-image-loaded'),
                    setTimeout(function() {
                      e.magnificPopup.proto.prev.call(t);
                    }, 120);
                });
            },
            imageLoadComplete: function() {
              var e = this;
              setTimeout(function() {
                e.wrap.addClass('mfp-image-loaded');
              }, 16);
            }
          }
        }),
        jQuery(
          '<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>'
        ).insertAfter('.quantity input'),
        jQuery('.quantity').each(function() {
          var e = jQuery(this),
            t = e.find('input[type="number"]'),
            n = e.find('.quantity-up'),
            i = e.find('.quantity-down'),
            o = t.attr('min');
          n.on('click', function() {
            var n = parseFloat(t.val()),
              i = n + 1;
            e.find('input').val(i), e.find('input').trigger('change');
          }),
            i.on('click', function() {
              var n = parseFloat(t.val());
              if (n <= o) var i = n;
              else var i = n - 1;
              e.find('input').val(i), e.find('input').trigger('change');
            });
        }),
        e(window).on('resize', function() {
          'ontouchstart' in window ||
            navigator.maxTouchPoints ||
            (t(), n(), i(), o());
        }),
        e(window).load(function() {
          function t(e) {
            var t = e.parent().siblings('.masonry'),
              i = e.data('text'),
              o = {};
            o.exclude = [];
            var a = e.data('filter');
            a && '*' !== a && (o.filter = a);
            var r = t.isotope('getFilteredItemElements');
            r &&
              (o.exclude = r.map(function(e) {
                return e.dataset.id;
              })),
              jQuery.ajax({
                type: 'GET',
                url: window.location.href,
                data: o,
                beforeSend: function() {
                  e.addClass('a-button--loading'),
                    e.html('<div>Loading...</div>').prop('disabled', !0);
                },
                success: function(o) {
                  e.removeClass('a-button--loading');
                  var r = jQuery(o).find(
                      '.masonry[data-masonry-id="' + t.data('masonry-id') + '"]'
                    ),
                    s = r.find('.selector'),
                    l = r
                      .siblings('.load-more-posts-holder')
                      .find('.load-more-posts').length;
                  if (
                    (s.length > 0 &&
                      (e.html(i).prop('disabled', !1),
                      t.append(s),
                      t.isotope('appended', s),
                      n.sync()),
                    !l)
                  ) {
                    e.parent().hide();
                    var c = a ? '.' + a : '*';
                    '*' == c
                      ? e
                          .parents('.l-posts-wrapper')
                          .find('li')
                          .attr('data-all', !0)
                      : e
                          .parents('.l-posts-wrapper')
                          .find('li[data-filter="' + c + '"]')
                          .attr('data-all', !0);
                  }
                },
                error: function() {
                  e.html('No More Posts');
                }
              });
          }
          var n = new WOW();
          n.init(),
            setTimeout(function() {
              e('.l-primary-header--sticky .l-primary-header').headroom({
                tolerance: { up: 10, down: 40 },
                onTop: function() {
                  e(
                    '.l-primary-header--sticky--skin .l-primary-header'
                  ).addClass('l-primary-header--light-skin');
                },
                onNotTop: function() {
                  e(
                    '.l-primary-header--sticky--skin .headroom--not-top'
                  ).removeClass('l-primary-header--light-skin');
                }
              }),
                e('.l-template-header--sticky').headroom({ offset: 450 });
            }, 50);
          var i = e('.masonry'),
            o = [];
          e('.l-filters-holder') &&
            e('.l-filters-holder').each(function(t) {
              o.push(e(this));
            }),
            o &&
              e.each(o, function(t) {
                var n =
                  '.l-filters-holder[data-posts="' +
                  e(this).data('posts') +
                  '"]';
                e(n + ' #filters li').on('click', function() {
                  var t = e(this).attr('data-filter');
                  e(n + ' .masonry').isotope({ filter: t });
                  var i = e(this)
                    .parents(n)
                    .find('.load-more-posts');
                  !0 === e(this).data('all')
                    ? i.parent().hide()
                    : i
                        .html(i.data('text'))
                        .prop('disabled', !1)
                        .parent()
                        .show(),
                    e(this)
                      .addClass('active')
                      .siblings('li')
                      .removeClass('active');
                });
              }),
            i.length &&
              (i.isotope({ layoutMode: 'packery', itemSelector: '.selector' }),
              e('.load-more-posts').on('click', function(n) {
                n.preventDefault(), t(e(this));
              }),
              window.dispatchEvent(new Event('resize'))),
            e('#filters li').on('click', function() {
              setTimeout(function() {
                window.dispatchEvent(new Event('resize'));
              }, 400);
            });
          var a = e('.fitRows'),
            r = e('.fitRows.masonry');
          a.length &&
            (r.isotope('destroy'),
            a.isotope({ layoutMode: 'fitRows', itemSelector: '.selector' }));
        });
    });
  }
]);
