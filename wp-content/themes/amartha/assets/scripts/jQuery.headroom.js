!(function(o) {
  o &&
    ((o.fn.headroom = function(t) {
      return this.each(function() {
        var a = o(this),
          e = a.data('headroom'),
          n = 'object' == typeof t && t;
        (n = o.extend(!0, {}, Headroom.options, n)),
          e || ((e = new Headroom(this, n)).init(), a.data('headroom', e)),
          'string' == typeof t &&
            (e[t](), 'destroy' === t && a.removeData('headroom'));
      });
    }),
    o('[data-headroom]').each(function() {
      var t = o(this);
      t.headroom(t.data());
    }));
})(window.Zepto || window.jQuery);
