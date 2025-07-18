/*! For license information please see hs-overlay.js.LICENSE.txt */
!(function (e, t) {
    if ("object" == typeof exports && "object" == typeof module)
      module.exports = t();
    else if ("function" == typeof define && define.amd) define([], t);
    else {
      var o = t();
      for (var r in o) ("object" == typeof exports ? exports : e)[r] = o[r];
    }
  })(self, function () {
    return (() => {
      "use strict";
      var e = {
          765: (e, t, o) => {
            function r(e, t) {
              for (var o = 0; o < t.length; o++) {
                var r = t[o];
                (r.enumerable = r.enumerable || !1),
                  (r.configurable = !0),
                  "value" in r && (r.writable = !0),
                  Object.defineProperty(e, r.key, r);
              }
            }
            o.d(t, { Z: () => n });
            var n = (function () {
              function e(t, o) {
                !(function (e, t) {
                  if (!(e instanceof t))
                    throw new TypeError("Cannot call a class as a function");
                })(this, e),
                  (this.$collection = []),
                  (this.selector = t),
                  (this.config = o),
                  (this.events = {});
              }
              var t, o;
              return (
                (t = e),
                (o = [
                  {
                    key: "_fireEvent",
                    value: function (e) {
                      var t =
                        arguments.length > 1 && void 0 !== arguments[1]
                          ? arguments[1]
                          : null;
                      this.events.hasOwnProperty(e) && this.events[e](t);
                    },
                  },
                  {
                    key: "_dispatch",
                    value: function (e, t) {
                      var o =
                          arguments.length > 2 && void 0 !== arguments[2]
                            ? arguments[2]
                            : null,
                        r = new CustomEvent(e, {
                          detail: { payload: o },
                          bubbles: !0,
                          cancelable: !0,
                          composed: !1,
                        });
                      t.dispatchEvent(r);
                    },
                  },
                  {
                    key: "on",
                    value: function (e, t) {
                      this.events[e] = t;
                    },
                  },
                  {
                    key: "afterTransition",
                    value: function (e, t) {
                      "all 0s ease 0s" !==
                      window
                        .getComputedStyle(e, null)
                        .getPropertyValue("transition")
                        ? e.addEventListener(
                            "transitionend",
                            function o() {
                              t(), e.removeEventListener("transitionend", o, !0);
                            },
                            !0
                          )
                        : t();
                    },
                  },
                  {
                    key: "getClassProperty",
                    value: function (e, t) {
                      var o =
                          arguments.length > 2 && void 0 !== arguments[2]
                            ? arguments[2]
                            : "",
                        r = (
                          window.getComputedStyle(e).getPropertyValue(t) || o
                        ).replace(" ", "");
                      return r;
                    },
                  },
                ]),
                o && r(t.prototype, o),
                Object.defineProperty(t, "prototype", { writable: !1 }),
                e
              );
            })();
          },
        },
        t = {};
      function o(r) {
        var n = t[r];
        if (void 0 !== n) return n.exports;
        var i = (t[r] = { exports: {} });
        return e[r](i, i.exports, o), i.exports;
      }
      (o.d = (e, t) => {
        for (var r in t)
          o.o(t, r) &&
            !o.o(e, r) &&
            Object.defineProperty(e, r, { enumerable: !0, get: t[r] });
      }),
        (o.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)),
        (o.r = (e) => {
          "undefined" != typeof Symbol &&
            Symbol.toStringTag &&
            Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }),
            Object.defineProperty(e, "__esModule", { value: !0 });
        });
      var r = {};
      return (
        (() => {
          function e(t) {
            return (
              (e =
                "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                  ? function (e) {
                      return typeof e;
                    }
                  : function (e) {
                      return e &&
                        "function" == typeof Symbol &&
                        e.constructor === Symbol &&
                        e !== Symbol.prototype
                        ? "symbol"
                        : typeof e;
                    }),
              e(t)
            );
          }
          function t(e, t) {
            (null == t || t > e.length) && (t = e.length);
            for (var o = 0, r = new Array(t); o < t; o++) r[o] = e[o];
            return r;
          }
          function n(e, t) {
            for (var o = 0; o < t.length; o++) {
              var r = t[o];
              (r.enumerable = r.enumerable || !1),
                (r.configurable = !0),
                "value" in r && (r.writable = !0),
                Object.defineProperty(e, r.key, r);
            }
          }
          function i(e, t) {
            return (
              (i =
                Object.setPrototypeOf ||
                function (e, t) {
                  return (e.__proto__ = t), e;
                }),
              i(e, t)
            );
          }
          function a(t, o) {
            if (o && ("object" === e(o) || "function" == typeof o)) return o;
            if (void 0 !== o)
              throw new TypeError(
                "Derived constructors may only return object or undefined"
              );
            return (function (e) {
              if (void 0 === e)
                throw new ReferenceError(
                  "this hasn't been initialised - super() hasn't been called"
                );
              return e;
            })(t);
          }
          function c(e) {
            return (
              (c = Object.setPrototypeOf
                ? Object.getPrototypeOf
                : function (e) {
                    return e.__proto__ || Object.getPrototypeOf(e);
                  }),
              c(e)
            );
          }
          o.r(r);
          var s = (function (e) {
            !(function (e, t) {
              if ("function" != typeof t && null !== t)
                throw new TypeError(
                  "Super expression must either be null or a function"
                );
              (e.prototype = Object.create(t && t.prototype, {
                constructor: { value: e, writable: !0, configurable: !0 },
              })),
                Object.defineProperty(e, "prototype", { writable: !1 }),
                t && i(e, t);
            })(f, e);
            var o,
              r,
              s,
              u,
              l =
                ((s = f),
                (u = (function () {
                  if ("undefined" == typeof Reflect || !Reflect.construct)
                    return !1;
                  if (Reflect.construct.sham) return !1;
                  if ("function" == typeof Proxy) return !0;
                  try {
                    return (
                      Boolean.prototype.valueOf.call(
                        Reflect.construct(Boolean, [], function () {})
                      ),
                      !0
                    );
                  } catch (e) {
                    return !1;
                  }
                })()),
                function () {
                  var e,
                    t = c(s);
                  if (u) {
                    var o = c(this).constructor;
                    e = Reflect.construct(t, arguments, o);
                  } else e = t.apply(this, arguments);
                  return a(this, e);
                });
            function f() {
              var e;
              return (
                (function (e, t) {
                  if (!(e instanceof t))
                    throw new TypeError("Cannot call a class as a function");
                })(this, f),
                ((e = l.call(this, "[data-hs-overlay]")).openNextOverlay = !1),
                e
              );
            }
            return (
              (o = f),
              (r = [
                {
                  key: "init",
                  value: function () {
                    var e = this;
                    document.addEventListener("click", function (t) {
                      var o = t.target.closest(e.selector),
                        r = t.target.closest("[data-hs-overlay-close]"),
                        n = "true" === t.target.getAttribute("aria-overlay");
                      return r
                        ? e.close(r.closest(".hs-overlay.open"))
                        : o
                        ? e.toggle(
                            document.querySelector(
                              o.getAttribute("data-hs-overlay")
                            )
                          )
                        : void (n && e._onBackdropClick(t.target));
                    }),
                      document.addEventListener("keydown", function (t) {
                        if (27 === t.keyCode) {
                          var o = document.querySelector(".hs-overlay.open");
                          if (!o) return;
                          setTimeout(function () {
                            "false" !==
                              o.getAttribute("data-hs-overlay-keyboard") &&
                              e.close(o);
                          });
                        }
                      });
                  },
                },
                {
                  key: "toggle",
                  value: function (e) {
                    e &&
                      (e.classList.contains("hidden")
                        ? this.open(e)
                        : this.close(e));
                  },
                },
                {
                  key: "open",
                  value: function (e) {
                    var t = this;
                    if (e) {
                      var o = document.querySelector(".hs-overlay.open"),
                        r =
                          "true" !==
                          this.getClassProperty(e, "--body-scroll", "false");
                      if (o)
                        return (
                          (this.openNextOverlay = !0),
                          this.close(o).then(function () {
                            t.open(e), (t.openNextOverlay = !1);
                          })
                        );
                      r && (document.body.style.overflow = "hidden"),
                        this._buildBackdrop(e),
                        this._checkTimer(e),
                        this._autoHide(e),
                        e.classList.remove("hidden"),
                        e.setAttribute("aria-overlay", "true"),
                        e.setAttribute("tabindex", "-1"),
                        setTimeout(function () {
                          e.classList.contains("hidden") ||
                            (e.classList.add("open"),
                            t._fireEvent("open", e),
                            t._dispatch("open.hs.overlay", e, e),
                            t._focusInput(e));
                        }, 50);
                    }
                  },
                },
                {
                  key: "close",
                  value: function (e) {
                    var t = this;
                    return new Promise(function (o) {
                      e &&
                        (e.classList.remove("open"),
                        e.removeAttribute("aria-overlay"),
                        e.removeAttribute("tabindex", "-1"),
                        t.afterTransition(e, function () {
                          e.classList.contains("open") ||
                            (e.classList.add("hidden"),
                            t._destroyBackdrop(),
                            t._fireEvent("close", e),
                            t._dispatch("close.hs.overlay", e, e),
                            (document.body.style.overflow = ""),
                            o(e));
                        }));
                    });
                  },
                },
                {
                  key: "_autoHide",
                  value: function (e) {
                    var t = this,
                      o = parseInt(this.getClassProperty(e, "--auto-hide", "0"));
                    o &&
                      (e.autoHide = setTimeout(function () {
                        t.close(e);
                      }, o));
                  },
                },
                {
                  key: "_checkTimer",
                  value: function (e) {
                    e.autoHide && (clearTimeout(e.autoHide), delete e.autoHide);
                  },
                },
                {
                  key: "_onBackdropClick",
                  value: function (e) {
                    "static" !==
                      this.getClassProperty(e, "--overlay-backdrop", "true") &&
                      this.close(e);
                  },
                },
                {
                  key: "_buildBackdrop",
                  value: function (e) {
                    var o,
                      r = this,
                      n =
                        e.getAttribute("data-hs-overlay-backdrop-container") ||
                        !1,
                      i = document.createElement("div"),
                      a =
                        "transition duration fixed inset-0 z-50 bg-gray-900 bg-opacity-50 dark:bg-opacity-80 hs-overlay-backdrop",
                      c = (function (e, o) {
                        var r =
                          ("undefined" != typeof Symbol && e[Symbol.iterator]) ||
                          e["@@iterator"];
                        if (!r) {
                          if (
                            Array.isArray(e) ||
                            (r = (function (e, o) {
                              if (e) {
                                if ("string" == typeof e) return t(e, o);
                                var r = Object.prototype.toString
                                  .call(e)
                                  .slice(8, -1);
                                return (
                                  "Object" === r &&
                                    e.constructor &&
                                    (r = e.constructor.name),
                                  "Map" === r || "Set" === r
                                    ? Array.from(e)
                                    : "Arguments" === r ||
                                      /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(
                                        r
                                      )
                                    ? t(e, o)
                                    : void 0
                                );
                              }
                            })(e)) ||
                            (o && e && "number" == typeof e.length)
                          ) {
                            r && (e = r);
                            var n = 0,
                              i = function () {};
                            return {
                              s: i,
                              n: function () {
                                return n >= e.length
                                  ? { done: !0 }
                                  : { done: !1, value: e[n++] };
                              },
                              e: function (e) {
                                throw e;
                              },
                              f: i,
                            };
                          }
                          throw new TypeError(
                            "Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
                          );
                        }
                        var a,
                          c = !0,
                          s = !1;
                        return {
                          s: function () {
                            r = r.call(e);
                          },
                          n: function () {
                            var e = r.next();
                            return (c = e.done), e;
                          },
                          e: function (e) {
                            (s = !0), (a = e);
                          },
                          f: function () {
                            try {
                              c || null == r.return || r.return();
                            } finally {
                              if (s) throw a;
                            }
                          },
                        };
                      })(e.classList.values());
                    try {
                      for (c.s(); !(o = c.n()).done; ) {
                        var s = o.value;
                        s.startsWith("hs-overlay-backdrop-open:") &&
                          (a += " ".concat(s));
                      }
                    } catch (e) {
                      c.e(e);
                    } finally {
                      c.f();
                    }
                    var u =
                      "static" !==
                      this.getClassProperty(e, "--overlay-backdrop", "true");
                    "false" ===
                      this.getClassProperty(e, "--overlay-backdrop", "true") ||
                      (n &&
                        ((i = document
                          .querySelector(n)
                          .cloneNode(!0)).classList.remove("hidden"),
                        (a = i.classList),
                        (i.classList = "")),
                      u &&
                        i.addEventListener(
                          "click",
                          function () {
                            return r.close(e);
                          },
                          !0
                        ),
                      i.setAttribute("data-hs-overlay-backdrop-template", ""),
                      document.body.appendChild(i),
                      setTimeout(function () {
                        i.classList = a;
                      }));
                  },
                },
                {
                  key: "_destroyBackdrop",
                  value: function () {
                    var e = document.querySelector(
                      "[data-hs-overlay-backdrop-template]"
                    );
                    e &&
                      (this.openNextOverlay &&
                        (e.style.transitionDuration = "".concat(
                          1.8 *
                            parseFloat(
                              window
                                .getComputedStyle(e)
                                .transitionDuration.replace(/[^\d.-]/g, "")
                            ),
                          "s"
                        )),
                      e.classList.add("opacity-0"),
                      this.afterTransition(e, function () {
                        e.remove();
                      }));
                  },
                },
                {
                  key: "_focusInput",
                  value: function (e) {
                    var t = e.querySelector("[autofocus]");
                    t && t.focus();
                  },
                },
              ]) && n(o.prototype, r),
              Object.defineProperty(o, "prototype", { writable: !1 }),
              f
            );
          })(o(765).Z);
          (window.HSOverlay = new s()),
            document.addEventListener("load", window.HSOverlay.init());
        })(),
        r
      );
    })();
  });
  