/*!
 * jQuery-Seat-Charts v1.1.1
 * https://github.com/mateuszmarkowski/jQuery-Seat-Charts
 *
 * Copyright 2013, 2014 Mateusz Markowski
 * Released under the MIT license
 */

(function (e) {
    e.fn.seatCharts = function (t) {
        if (this.data("seatCharts")) {
            return this.data("seatCharts");
        }
        var n = this,
            r = {},
            i = [],
            s,
            o = {
                animate: false,
                naming: {
                    top: true,
                    left: true,
                    getId: function (e, t, n) {
                        return t + "_" + n;
                    },
                    getLabel: function (e, t, n) {
                        return n;
                    },
                },
                legend: { node: null, items: [] },
                click: function () {
                    if (this.status() == "available") {
                        return "selected";
                    } else if (this.status() == "selected") {
                        return "available";
                    } else {
                        return this.style();
                    }
                },
                focus: function () {
                    if (this.status() == "available") {
                        return "focused";
                    } else {
                        return this.style();
                    }
                },
                blur: function () {
                    return this.status();
                },
                seats: {},
            },
            u = (function (t, n) {
                return function (i) {
                    var s = this;
                    s.settings = e.extend(
                        {
                            status: "available",
                            style: "available",
                            data: n.seats[i.character] || {},
                        },
                        i
                    );
                    s.settings.$node = e("<div></div>");
                    s.settings.$node
                        .attr({
                            id: s.settings.id,
                            role: "checkbox",
                            "aria-checked": false,
                            focusable: true,
                            tabIndex: -1,
                        })
                        .text(s.settings.label)
                        .addClass(
                            ["seatCharts-seat", "seatCharts-cell", "available"]
                                .concat(
                                    s.settings.classes,
                                    typeof n.seats[s.settings.character] ==
                                        "undefined"
                                        ? []
                                        : n.seats[s.settings.character].classes
                                )
                                .join(" ")
                        );
                    s.data = function () {
                        return s.settings.data;
                    };
                    s.char = function () {
                        return s.settings.character;
                    };
                    s.node = function () {
                        return s.settings.$node;
                    };
                    s.style = function () {
                        return arguments.length == 1
                            ? (function (e) {
                                  var t = s.settings.style;
                                  if (e == t) {
                                      return t;
                                  }
                                  s.settings.status =
                                      e != "focused" ? e : s.settings.status;
                                  s.settings.$node.attr(
                                      "aria-checked",
                                      e == "selected"
                                  );
                                  n.animate
                                      ? s.settings.$node.switchClass(t, e, 200)
                                      : s.settings.$node
                                            .removeClass(t)
                                            .addClass(e);
                                  return (s.settings.style = e);
                              })(arguments[0])
                            : s.settings.style;
                    };
                    s.status = function () {
                        return (s.settings.status =
                            arguments.length == 1
                                ? s.style(arguments[0])
                                : s.settings.status);
                    };
                    (function (i, o, u) {
                        e.each(["click", "focus", "blur"], function (e, a) {
                            s[a] = function () {
                                if (a == "focus") {
                                    if (
                                        t.attr("aria-activedescendant") !==
                                        undefined
                                    ) {
                                        r[
                                            t.attr("aria-activedescendant")
                                        ].blur();
                                    }
                                    t.attr(
                                        "aria-activedescendant",
                                        u.settings.id
                                    );
                                    u.node().focus();
                                }
                                return s.style(
                                    typeof i[o][a] === "function"
                                        ? i[o][a].apply(u)
                                        : n[a].apply(u)
                                );
                            };
                        });
                    })(n.seats, s.settings.character, s);
                    s.node()
                        .on("click", s.click)
                        .on("mouseenter", s.focus)
                        .on("mouseleave", s.blur)
                        .on(
                            "keydown",
                            (function (e, n) {
                                return function (i) {
                                    var s;
                                    switch (i.which) {
                                        case 32:
                                            i.preventDefault();
                                            e.click();
                                            break;
                                        case 40:
                                        case 38:
                                            i.preventDefault();
                                            s = (function o(e, t, r) {
                                                var u;
                                                if (
                                                    !e.index(r) &&
                                                    i.which == 38
                                                ) {
                                                    u = e.last();
                                                } else if (
                                                    e.index(r) ==
                                                        e.length - 1 &&
                                                    i.which == 40
                                                ) {
                                                    u = e.first();
                                                } else {
                                                    u = e.eq(
                                                        e.index(r) +
                                                            (i.which == 38
                                                                ? -1
                                                                : +1)
                                                    );
                                                }
                                                s = u
                                                    .find(
                                                        ".seatCharts-seat,.seatCharts-space"
                                                    )
                                                    .eq(t.index(n));
                                                return s.hasClass(
                                                    "seatCharts-space"
                                                )
                                                    ? o(e, t, u)
                                                    : s;
                                            })(
                                                n
                                                    .parents(
                                                        ".seatCharts-container"
                                                    )
                                                    .find(
                                                        ".seatCharts-row:not(.seatCharts-header)"
                                                    ),
                                                n
                                                    .parents(
                                                        ".seatCharts-row:first"
                                                    )
                                                    .find(
                                                        ".seatCharts-seat,.seatCharts-space"
                                                    ),
                                                n.parents(
                                                    ".seatCharts-row:not(.seatCharts-header)"
                                                )
                                            );
                                            if (!s.length) {
                                                return;
                                            }
                                            e.blur();
                                            r[s.attr("id")].focus();
                                            s.focus();
                                            t.attr(
                                                "aria-activedescendant",
                                                s.attr("id")
                                            );
                                            break;
                                        case 37:
                                        case 39:
                                            i.preventDefault();
                                            s = (function (e) {
                                                if (
                                                    !e.index(n) &&
                                                    i.which == 37
                                                ) {
                                                    return e.last();
                                                } else if (
                                                    e.index(n) ==
                                                        e.length - 1 &&
                                                    i.which == 39
                                                ) {
                                                    return e.first();
                                                } else {
                                                    return e.eq(
                                                        e.index(n) +
                                                            (i.which == 37
                                                                ? -1
                                                                : +1)
                                                    );
                                                }
                                            })(
                                                n
                                                    .parents(
                                                        ".seatCharts-container:first"
                                                    )
                                                    .find(
                                                        ".seatCharts-seat:not(.seatCharts-space)"
                                                    )
                                            );
                                            if (!s.length) {
                                                return;
                                            }
                                            e.blur();
                                            r[s.attr("id")].focus();
                                            s.focus();
                                            t.attr(
                                                "aria-activedescendant",
                                                s.attr("id")
                                            );
                                            break;
                                        default:
                                            break;
                                    }
                                };
                            })(s, s.node())
                        );
                };
            })(n, o);
        n.addClass("seatCharts-container");
        e.extend(true, o, t);
        o.naming.rows =
            o.naming.rows ||
            (function (e) {
                var t = [];
                for (var n = 1; n <= e; n++) {
                    t.push(n);
                }
                return t;
            })(o.map.length);
        o.naming.columns =
            o.naming.columns ||
            (function (e) {
                var t = [];
                for (var n = 1; n <= e; n++) {
                    t.push(n);
                }
                return t;
            })(o.map[0].split("").length);
        if (o.naming.top) {
            var a = e("<div></div>").addClass(
                "seatCharts-row seatCharts-header"
            );
            if (o.naming.left) {
                a.append(e("<div></div>").addClass("seatCharts-cell"));
            }
            e.each(o.naming.columns, function (t, n) {
                a.append(e("<div></div>").addClass("seatCharts-cell").text(n));
            });
        }
        n.append(a);
        e.each(o.map, function (t, s) {
            var a = e("<div></div>").addClass("seatCharts-row");
            if (o.naming.left) {
                a.append(
                    e("<div></div>")
                        .addClass("seatCharts-cell seatCharts-space")
                        .text(o.naming.rows[t])
                );
            }
            e.each(
                s.match(/[a-z_]{1}(\[[0-9a-z_]{0,}(,[0-9a-z_ ]+)?\])?/gi),
                function (n, s) {
                    var f = s.match(/([a-z_]{1})(\[([0-9a-z_ ,]+)\])?/i),
                        l = f[1],
                        c = typeof f[3] !== "undefined" ? f[3].split(",") : [],
                        h = c.length ? c[0] : null,
                        p = c.length === 2 ? c[1] : null;
                    a.append(
                        l != "_"
                            ? (function (e) {
                                  o.seats[l] = l in o.seats ? o.seats[l] : {};
                                  var s = h
                                      ? h
                                      : e.getId(l, e.rows[t], e.columns[n]);
                                  r[s] = new u({
                                      id: s,
                                      label: p
                                          ? p
                                          : e.getLabel(
                                                l,
                                                e.rows[t],
                                                e.columns[n]
                                            ),
                                      row: t,
                                      column: n,
                                      character: l,
                                  });
                                  i.push(s);
                                  return r[s].node();
                              })(o.naming)
                            : e("<div></div>").addClass(
                                  "seatCharts-cell seatCharts-space"
                              )
                    );
                }
            );
            n.append(a);
        });
        o.legend.items.length
            ? (function (t) {
                  var r = (t.node || e("<div></div").insertAfter(n)).addClass(
                      "seatCharts-legend"
                  );
                  var i = e("<ul></ul>").addClass("row").appendTo(r);
                  e.each(t.items, function (t, n) {
                      i.append(
                          e("<li></li>")
                              .addClass("colss")
                              .append(
                                  e("<div></div>").addClass(
                                      [
                                          "seatCharts-seat",
                                          "seatCharts-cell",
                                          n[1],
                                      ]
                                          .concat(
                                              o.classes,
                                              typeof o.seats[n[0]] ==
                                                  "undefined"
                                                  ? []
                                                  : o.seats[n[0]].classes
                                          )
                                          .join(" ")
                                  )
                              )
                              .append(
                                  e("<span></span>")
                                      .addClass("seatCharts-legendDescription")
                                      .text(n[2])
                              )
                      );
                  });
                  return r;
              })(o.legend)
            : null;
        n.attr({ tabIndex: 0 });
        n.focus(function () {
            if (n.attr("aria-activedescendant")) {
                r[n.attr("aria-activedescendant")].blur();
            }
            n.find(".seatCharts-seat:not(.seatCharts-space):first").focus();
            r[i[0]].focus();
        });
        n.data("seatCharts", {
            seats: r,
            seatIds: i,
            status: function () {
                var t = this;
                return arguments.length == 1
                    ? t.seats[arguments[0]].status()
                    : (function (n, r) {
                          return typeof n == "string"
                              ? t.seats[n].status(r)
                              : (function () {
                                    e.each(n, function (e, n) {
                                        t.seats[n].status(r);
                                    });
                                })();
                      })(arguments[0], arguments[1]);
            },
            each: function (e) {
                var t = this;
                for (var n in t.seats) {
                    if (false === e.call(t.seats[n], n)) {
                        return n;
                    }
                }
                return true;
            },
            node: function () {
                var t = this;
                return e("#" + t.seatIds.join(",#"));
            },
            find: function (e) {
                var t = this;
                var n = t.set();
                return e.length == 1
                    ? (function (e) {
                          t.each(function () {
                              if (this.char() == e) {
                                  n.push(this.settings.id, this);
                              }
                          });
                          return n;
                      })(e)
                    : (function () {
                          return e.indexOf(".") > -1
                              ? (function () {
                                    var r = e.split(".");
                                    t.each(function (e) {
                                        if (
                                            this.char() == r[0] &&
                                            this.status() == r[1]
                                        ) {
                                            n.push(this.settings.id, this);
                                        }
                                    });
                                    return n;
                                })()
                              : (function () {
                                    t.each(function () {
                                        if (this.status() == e) {
                                            n.push(this.settings.id, this);
                                        }
                                    });
                                    return n;
                                })();
                      })();
            },
            set: function f() {
                var t = this;
                return {
                    seats: [],
                    seatIds: [],
                    length: 0,
                    status: function () {
                        var t = arguments,
                            n = this;
                        return this.length == 1 && t.length == 0
                            ? this.seats[0].status()
                            : (function () {
                                  e.each(n.seats, function () {
                                      this.status.apply(this, t);
                                  });
                              })();
                    },
                    node: function () {
                        return t.node.call(this);
                    },
                    each: function () {
                        return t.each.call(this, arguments[0]);
                    },
                    get: function () {
                        return t.get.call(this, arguments[0]);
                    },
                    find: function () {
                        return t.find.call(this, arguments[0]);
                    },
                    set: function () {
                        return f.call(t);
                    },
                    push: function (e, t) {
                        this.seats.push(t);
                        this.seatIds.push(e);
                        ++this.length;
                    },
                };
            },
            get: function (t) {
                var n = this;
                return typeof t == "string"
                    ? n.seats[t]
                    : (function () {
                          var r = n.set();
                          e.each(t, function (e, t) {
                              if (typeof n.seats[t] === "object") {
                                  r.push(t, n.seats[t]);
                              }
                          });
                          return r;
                      })();
            },
        });
        return n.data("seatCharts");
    };
})(jQuery);
