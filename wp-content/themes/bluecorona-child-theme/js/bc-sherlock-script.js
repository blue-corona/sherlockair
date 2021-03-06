(function(scope) { var Process = scope.Process || {},
    ifNum = function(val) { var number = +val; if (isNaN(number)) { return val } else { return number } },
    _decode = function(val) { return decodeURIComponent(val.replace(/\+/g, '%20')) },
    _token = /\{(.+?)\}/g,
    _delay = window.location.hash && window.location.hash[1] === '~' && !/\bSPPC=./i.test(document.cookie || ""),
    _delayed = [],
    _query = null,
    _cookies = null,
    _map = null,
    _phones = null;
  Process.Page = function(ids) { var index = ids.length; while (index--) { if (_delay) { _delayed.push(ids[index]) } else { Process.Element(document.getElementById(ids[index])) } } };
  Process.Delayed = function() { var id;
    _cookies = null; while (id = _delayed.shift()) { Process.Element(document.getElementById(id)) } };
  Process.Element = function(element) { var process; if (!element) { return } switch (element.getAttribute('data-process')) {
      case 'if':
        Process.If(element); break;
      case 'replace':
        Process.Replace(element); break;
      default:
        Process.Fix(element); break } };
  Process.Replace = function(element) { var href, parent = element.parentNode,
      text = document.createTextNode(Process.Get(element.getAttribute('data-replace'))),
      child = element.firstElementChild; if (child && child.getAttribute && (href = child.getAttribute('href')) && href.substring(0, 4) === 'tel:') { href = document.createElement('a');
      href.setAttribute('href', 'tel:' + text.data);
      href.appendChild(document.createTextNode(text.data));
      text = href }
    parent.insertBefore(text, element);
    parent.removeChild(element) };
  Process.Fix = function(element) { var attr, key, node, len = element.attributes.length,
      size = element.childNodes.length; if (element.nodeName === 'SCRIPT') { element.parentNode.removeChild(element); return } while (len--) { attr = element.attributes[len]; if (attr.name.substring(0, 13) == 'data-replace-') { key = attr.name.substring(13);
        element.setAttribute(key, Process.Get(attr.value));
        element.removeAttribute(attr.name) } } while (size--) { node = element.childNodes[size]; if (node.nodeType === 3 && node.data && node.data.indexOf('{') >= 0) { node.data = Process.Get(node.data) } } };
  Process.If = function(element) { var attr, children, i, len, parent = element.parentNode,
      index = element.attributes.length,
      visible = undefined; while (index--) { attr = element.attributes[index]; switch (attr.name) {
        case 'field':
          visible = Process.Check(element, Process.Get(attr.value)); break;
        case 'nofield':
          visible = !Process.Check(element, Process.Get(attr.value)); break } if (visible !== undefined) { break } } if (visible) { children = element.childNodes;
      i = 0;
      len = children.length; for (; i < len; i++) { parent.insertBefore(children[0], element) } }
    parent.removeChild(element) };
  Process.Check = function(element, val1) { var attr, val2, index = element.attributes.length; while (index--) { attr = element.attributes[index]; switch (attr.name) {
        case "equals":
          return val1 == Process.Get(attr.value);
        case "gt":
        case "greaterthan":
        case "morethan":
          return ifNum(val1) > ifNum(Process.Get(attr.value));
        case "gte":
          return ifNum(val1) >= ifNum(Process.Get(attr.value));
        case "lt":
        case "lessthan":
        case "lesserthan":
          return ifNum(val1) < ifNum(Process.Get(attr.value));
        case "lte":
          return ifNum(val1) <= ifNum(Process.Get(attr.value));
        case "ne":
        case "notequals":
          return val1 != Process.Get(attr.value);
        case "contains":
          val2 = Process.Get(attr.value); return val1.indexOf(val2 >= 0);
        case "notcontains":
          val2 = Process.Get(attr.value); return !val1.indexOf(val2 >= 0);
        case "in":
          val2 = Process.Get(attr.value); return Process.InArray(val1, ("" + val2).split(','));
        case "notin":
          val2 = Process.Get(attr.value); return !Process.InArray(val1, ("" + val2).split(','));
        case "between":
          val2 = Process.Get(attr.value).Split(','); if (val2.length == 2 && ifNum(val1) >= ifNum(val2[0]) && ifNum(val1) <= ifNum(val2[1])) { return true } else { return false } } } return !!val1 };
  Process.InArray = function(val, array) { var index = array.length; while (index--) { if (array[index] == val) { return true } } return false };
  Process.Get = function(field) { var value = field.replace(_token, function(m, m1) { var parts = m1.split('/'),
        token = parts.shift(); return Process.Data(token.split(':'), 0, parts[0]) || _decode(parts.shift() || "") }); return value };
  Process.Data = function(data, index, def) { var query; switch (data[index].toLowerCase()) {
      case "f":
        return Process.Format(data[index + 1], data, index + 2, def);
      case "if":
        return Process.Data(data, index + 1) ? data.pop() : "";
      case "ifno":
      case "ifnot":
        return Process.Data(data, index + 1) ? "" : data.pop();
      case "q":
      case "querystring":
        return Process.Query(data[index + 1]) || "";
      case "session":
      case "cookie":
        return Process.Cookie(data[index + 1]) || "";
      case "number":
        return Process.Number(data[index + 1], def) || "";
      case "request":
        query = Process.Cookie("RWQ") || window.location.search; if (query && query[0] === '?' && data[index + 1] && data[index + 1][0] != '?') { query = query.substr(1) } return query;
      case "u":
        return Process.UserData(data[index + 1]) || "";
      default:
        return "" } };
  Process.Format = function(type, data, index, def) { if (!type || index > data.length - 1) return ""; var digits = null; var pattern = null; var d;
    type = type.toLowerCase(); var pos = 0; if (type == "binary") pos = 2;
    else if (index + 1 < data.length) { switch (type) {
        case "p":
        case "phone":
        case "p2":
        case "phone2":
        case "p3":
        case "phone3":
          if (data[index].indexOf('0') >= 0) { pattern = data[index];
            pos = 1 } break;
        default:
          d = parseInt(data[index]); if (!isNaN(d)) { digits = d;
            pos = 1 } break } } var value = Process.Data(data, index + pos, def); switch (type) {
      case "p":
      case "phone":
        return Process.Phone("" + value, pattern);
      case "p2":
      case "phone2":
        return Process.Phone("" + value, pattern || "000.000.0000");
      case "p3":
      case "phone3":
        return Process.Phone("" + value, pattern || "000-000-0000");
      case "tel":
        return Process.Phone("" + value, pattern || "0000000000") } };
  Process.Phone = function(number, pattern) { if (!number) return ""; var digits = number.replace(/\D+/g, ""); if (digits.length < 10) { return number } var sb = (pattern || "(000) 000-0000").split(""); var count = 0; for (var i = 0; i < sb.length; i++) { if (sb[i] == '0') { if (count < digits.length) sb[i] = digits[count++];
        else { sb.splice(i, 1);
          i-- } } } if (count == 10 && digits.length > 10) { sb.push(" x" + digits.substring(10)) } return sb.join("") };
  Process.Query = function(key) { var q, array, i, parts, name, value; if (!_query) { _query = {};
      q = Process.Cookie("RWQ") || window.location.search;
      array = q ? q.substring(1).split('&') : [];
      i = array.length; while (i--) { parts = array[i].split('=');
        name = _decode(parts.shift()).toLowerCase(); if (parts.length) { _query[name] = _decode(parts.join('=')) } else { _query[name] = null } } } return _query[key.toLowerCase()] };
  Process.Cookie = function(key) { var array, i, parts, name, value; if (!_cookies) { _cookies = {};
      array = document.cookie ? document.cookie.split('; ') : [];
      i = array.length; while (i--) { parts = array[i].split('=');
        name = _decode(parts.shift()).toLowerCase();
        value = parts.join('='); switch (value[0]) {
          case '#':
            _cookies[name] = +value.substring(1); break;
          case ':':
            _cookies[name] = new Date(+value.substring(1)); break;
          case '!':
            _cookies[name] = value === '!!'; break;
          case "'":
            _cookies[name] = _decode(value.substring(1)); break;
          default:
            _cookies[name] = _decode(value); break } } }
    array = key.split('|');
    i = 0; for (; i < array.length; i++) { value = _cookies[array[i].toLowerCase()]; if (value) { return value } } return "" };
  Process.UserData = function(key) { switch (key) {
      case 'DisplayName':
        return Process.Cookie('U_DisplayName') || "";
      case 'TimeOfDay':
        var date = new Date; var hour = date.getHours(); if (hour >= 17 || hour < 5) { return 'Evening' } else if (hour < 12) { return 'Morning' } else { return 'Afternoon' } } };
  Process.Number = function(key, def) { var data, item, phone; if (!def) { return def } if (!_map) { _map = {};
      data = (Process.Cookie("PHMAP") || "").split(','); for (var i = 0; i < data.length; i++) { item = (data[i] || "").split('='); if (item.length === 2) { _map[item[0]] = item[1] } } }
    phone = _map[def]; if (!phone || phone === "0") { phone = def } if (!_phones) { _phones = {} }
    _phones[phone] = 1; return phone };
  Process.Phones = function() { var arr; if (!_phones) { return null } else { arr = []; for (var p in _phones) { if (_phones.hasOwnProperty(p)) { arr.push(p) } } return arr.join('|') } };
  scope.Process = Process; if (document.documentElement && (document.documentElement.clientWidth <= 1280 || (Process.Cookie("pref") & 1) === 1)) { document.documentElement.className += " minimize" } })(this);
(function(factory) { if (!window.rrequire) { factory(window) } }(function(scope) { var _s_ = "/",
    _d_ = ".",
    _c_ = ":",
    base = _s_ + _s_ + 'www.sherlockair.com',
    local = _s_ + 'cms' + _s_,
    loaded = {},
    loading = {},
    waiting = [],
    timer = 0,
    gmap = document && document.documentElement && document.documentElement.getAttribute('data-gmap'),
    gmapquery = gmap && ('&key=' + gmap),
    op = Object.prototype,
    ostring = op.toString,
    hasOwn = op.hasOwnProperty,
    packages = { jquery: [
        ["j/jquery", "j/jquery.ui"]
      ], behavior: [
        ["behaviors"],
        ["cms-behave"]
      ], googlemap: [
        ["https" + _c_ + _s_ + _s_ + "maps.googleapis.com/maps/api/js?v=3&libraries=places&callback=registermap" + (gmapquery || "")]
      ], map: [
        ["m/gmap"]
      ], loading: [
        ["c/loading2"],
        ["cms-5"]
      ], jwplayer: [
        [_s_ + "common/js/v/jwplayer" + _d_ + "js"]
      ], tools: [
        ["jquery", "behavior", "extensions", "uri", "chart", "c/cms", "c/scrollbar", "loading", "form"],
        ["cms-tools", "opensans"]
      ], opensans: [
        ["https" + _c_ + _s_ + _s_ + "fonts.googleapis.com/css" + "?" + "family=Open+Sans:300,400italic,400,600,700|Montserrat:400,700"]
      ], ckeditor: [
        [_d_ + _d_ + _s_ + "ckeditor/ckeditor"]
      ], ck: [
        ["admin/ck/ckeditor"]
      ], ace: [
        [_s_ + _s_ + "cdnjs.cloudflare.com/ajax/libs/ace/1.4.1/ace" + _d_ + "js"]
      ], weather: [
        ["m/weather"]
      ], cookie: [
        ["j/jquery.cookie"]
      ], form2: [
        ["admin/js/form", "admin/js/poly"]
      ] },
    detect = { "j/jquery": function() { return !!scope.jQuery }, "j/jquery.1.x": function() { return !!scope.jQuery }, "j/jquery.2.x": function() { return !!scope.jQuery }, "j/jquery.3.x": function() { return !!scope.jQuery }, "j/jquery.ui": function() { return !!(scope.jQuery && scope.jQuery.widget) }, "j/jquery.cookie": function() { return !!(scope.jQuery && scope.jQuery.cookie) }, "j/poly": function() { return !!(scope.Element && scope.Element.prototype && scope.Element.prototype.scrollIntoViewport) }, googlemap: function() { return !!(scope.google && scope.google.maps) }, jwplayer: function() { return !!scope.jwplayer }, ckeditor: function() { return !!scope.CKEDITOR }, ace: function() { return !!scope.ace }, weather: function() { return !!(scope.jQuery && scope.jQuery.weather) } },
    detectCSS = { "cms-5": /\.ui\-widget\-overlay3\b/, "cms-behave": /\.ui\-conditional\-panel\b/, "cms-toolbar": /#SMSTop\b/, cms: /\.ui\-dialog\-titlebar\-fullscreen\b/ },
    r_url = /^(https?:)?(\/\/([\w\-\.]+))?(\/.+)/i;
  (function() { var pkg; for (var p in detect) { if (hasOwn.call(detect, p)) { pkg = packages[p]; if (pkg && pkg[0] && pkg[0][0]) { detect[pkg[0][0]] = detect[p] } } } })(); if (!Array.isArray) { Array.isArray = function(arg) { return Object.prototype.toString.call(arg) === '[object Array]' } } if (!Function.isFunction) { Function.isFunction = function(arg) { return Object.prototype.toString.call(arg) === '[object Function]' } }

  function checkStylesheets(reg) { var sheet, rules, index2, rule, text, sheets = document.styleSheets,
      index1 = sheets && sheets.length; while (index1--) { sheet = sheets[index1]; try { rules = sheet && (sheet.cssRules || sheet.rules) } catch (ex) { continue }
      index2 = rules && rules.length; while (index2--) { try { rule = rules[index2];
          text = rule && (rule.selectorText || rule.cssText); if (text && reg.test(text)) { return true } } catch (ex) {; } } } return false } var lastChecked = null;

  function loadElement(file, tagName, attribute, ext) { var names, head, tag, prop, register, path, time = (new Date).getTime(); if (!lastChecked || (time - lastChecked) > 1000) { checkLoading();
      lastChecked = time } if (loading[file]) { return }
    names = normalize(file, ext); if (!names.length) { return } switch (names[0]) {
      case "/common/js/j/jquery.js":
      case "/common/js/j/jquery.1.x.js":
      case "/common/js/j/jquery.2.x.js":
        if (!scope.Modernizr || !scope.Modernizr.canvas) { names[0] = "https://www.sherlockair.com/common/js/j/jquery.1.x.js" } else { names[0] = "https://www.sherlockair.com/common/js/j/jquery.2.x.js" } break }
    logLoading(names); if (ext === 'css') { tag = scope.document.createElement('link');
      tag.setAttribute('type', 'text/css');
      tag.setAttribute('rel', 'stylesheet');
      prop = 'href' } else { tag = scope.document.createElement('script');
      tag.setAttribute('type', 'text/javascript');
      tag.setAttribute('async', 'async');
      prop = 'src';
      register = names.length < 2 || file[0] === '/' } if (file.indexOf('j/jquery') >= 0) { try { throw new Error('Jquery Require ' + file); } catch (ex) { console.log(ex.stack); var array = []; var a = arguments; var args; var c; while (a) { args = [];
          args.push.apply(args, a);
          array.push(args);
          c = a.callee.caller;
          a = c && c.arguments }
        console.log(JSON.stringify(array)) } }
    path = names[0]; if (path.substring(0, 8) === '/common/') { path = base + path }
    onLoad(tag, file, ext, register);
    tag.setAttribute(prop, path);
    head = (scope.document.head || scope.document.body);
    head.appendChild(tag) }

  function onLoad(el, file, ext, register) { var success = function() { if (register) { scope.register(file);
        checkWaiting() } else if (ext === 'css') { loaded[file] = true;
        checkWaiting() } }; var error = function() { if (ext === 'js') { console.log('error - "' + file + '" could not be loaded, rrequire will not fire.') } }; if (el.addEventListener) { el.addEventListener('load', success, false);
      el.addEventListener('error', error, false) } else { el.onload = el.onreadystatechange = function(_, isAbort) { var state = el.readyState; if (isAbort || !state || /loaded|complete/.test(state)) { if (state === 'loaded') { el.children; if (el.readyState === 'loading') { state = 'error' } }
          el.onload = el.onreadystatechange = null;
          el = null; if (register && state !== 'error') { setTimeout(function() { var det = detect[file]; if (!det || det()) { success() } else { error() }
              success = null;
              error = null }, 1); return } else if (state === 'error') { error() } else { success() }
          error = null;
          sucess = null } } }; }

  function checkLoading() { var el, src, req, elements = document.querySelectorAll("script[src]"); for (var i = 0; i < elements.length; i++) { el = elements[i];
      src = el.getAttribute('src');
      req = el.getAttribute('data-require');
      addLoading(src, req, 'js') }
    elements = document.querySelectorAll("link[rel='stylesheet'][href]"); for (var i = 0; i < elements.length; i++) { el = elements[i];
      src = el.getAttribute('href');
      req = el.getAttribute('data-require');
      addLoading(src, req, 'css') } }

  function normalize(src, ext) { var names = []; if (!src) { return names } if (src.indexOf(scope.location.origin) === 0) { src = src.substring(scope.location.origin.length) } if (m = r_url.exec(src)) { if (m[1]) { names.push(src); return names } else if (m[2]) { names.push(scope.location.protocol + src); return names } if (m = /(.+?)\.\d{13}(\.\w{2,12})$/.exec(src)) { src = m[1] + m[2] }
      names.push(src); if (m = /^\/(common|cms)\/(admin\/|js\/|css\/)?(.+?)(\.js|\.css)$/.exec(src)) { if (m[1] === 'cms') { src = m[1] + '/' + (m[2] || "") + m[3] } else if (m[2] === "admin/") { src = m[2] + m[3] } else { src = m[3] }
        names.push(src) } } else { if (/^cms\//.test(src)) { names.push('/' + src + '.' + ext) } else if (/^admin\//.test(src)) { names.push('/common/' + src + '.' + ext) } else if (ext === 'js') { names.push('/wp-content/themes/bluecorona-child-theme/js/' + src + '.' + ext) } else if (ext === 'css') { names.push('/common/css/' + src + '.' + ext) }
      names.push(src) } return names }

  function addLoading(src, req, ext) { var names; if (!src || loading[src]) { return }
    names = normalize(src, ext);
    logLoading(names); if (req) { try { arr = JSON.parse(req) } catch (ex) { return }
      len = arr && arr.length; for (var i = 0; i < len; i++) { addLoading(arr[i], null, ext) } } }

  function logLoading(names, ext) { var name; for (var i = 0; i < names.length; i++) { name = names[i]; switch (name) {
        case "j/jquery":
        case "j/jquery.1.x":
        case "j/jquery.2.x":
        case "j/jquery.3.x":
          loading["j/jquery"] = true;
          loading["j/jquery.1.x"] = true;
          loading["j/jquery.2.x"] = true;
          loading["j/jquery.3.x"] = true;
          loading["/common/js/j/jquery.js"] = true;
          loading["/common/js/j/jquery.1.x.js"] = true;
          loading["/common/js/j/jquery.2.x.js"] = true;
          loading["/common/js/j/jquery.3.x.js"] = true; break;
        case 'cms':
        case 'cms-5':
          if (ext === 'css') { loading["cms"] = true;
            loading["cms-5"] = true;
            loading["/common/css/cms.css"] = true;
            loading["/common/css/cms-5.css"] = true } else { loading[name] = true } break;
        default:
          loading[name] = true; break } } }

  function isReady(scripts) { var script, size = scripts.length,
      ready = true; while (size--) { script = scripts[size]; if (script && !loaded[script]) { return false } } return true }

  function cleanWaiting() { var args, size = waiting.length; if (timer) { clearTimeout(timer);
      timer = 0 } while (size--) { args = waiting[size]; if (args[2] === true) { waiting.splice(size, 1) } } if (waiting.length === 0 && document.documentElement.classList) { document.documentElement.classList.remove('requiring') } }

  function checkWaiting() { var args, size = 0,
      len = waiting.length; while (size < len) { args = waiting[size++]; if (args[2] === true) { continue } if (isReady(args[0])) { args[2] = true;
        args[1](scope.jQuery, scope); if (timer) { clearTimeout(timer) }
        timer = setTimeout(cleanWaiting, 1) } } }

  function cleanArray(arr) { var size; if (!arr) { return null } else if (typeof arr === 'string') { return [arr.toLowerCase()] } else if (Array.isArray(arr)) { size = arr.length; while (size--) { arr[size] = ("" + (arr[size] || "")).toLowerCase() } return arr } else { return null } }

  function addPackages(scripts, styles) { var pkg, size; for (var i = 0; i < scripts.length; i++) { pkg = packages[scripts[i]]; if (pkg) { scripts.splice(i, 1);
        i--;
        size = pkg[0].length; while (size--) { scripts.push(pkg[0][size]) } if (pkg[1] && styles) { size = pkg[1].length; while (size--) { styles.push(pkg[1][size]) } } } } if (styles && styles.length) { addPackages(styles) } }
  scope.registerLoading = function(script) { loading[script] = true };
  scope.register = function(script) { if (script && typeof script === 'string') { loading[script] = true;
      loaded[script] = true;
      checkWaiting() } };
  scope.registermap = function() { var script = packages.googlemap[0][0];
    register(script) };
  scope.rrequire = function(scripts, callback, styles) { var fn, size, ready, script, name, det, style;
    scripts = cleanArray(scripts); if (!scripts) { return } if (Function.isFunction(styles)) { fn = styles;
      styles = callback;
      callback = fn;
      fn = null }
    styles = cleanArray(styles); if (!styles) { styles = [] }
    addPackages(scripts, styles);
    size = scripts.length;
    ready = true; while (size--) { script = scripts[size]; if (!script) { continue }
      name = script.toLowerCase(); if (!loaded[name]) { det = detect[name]; if (det && det()) { loaded[name] = true; continue }
        ready = false; if (!loading[name]) { loadElement(script, 'script', 'src', 'js') } } }
    size = 0; while (size < styles.length) { style = styles[size]; if (!style) { continue }
      name = style.toLowerCase(); if (!loaded[name]) { loadElement(style, 'link', 'href', 'css') }
      size++ } if (!Function.isFunction(callback)) { return } if (ready || isReady(scripts)) { callback(scope.jQuery, scope) } else { waiting.push([scripts, callback, false]) } };
  scope.rrequire.setBase = function(path) { base = path };
  scope.rrequire.setDetect = function(script, det) { if (script && typeof script === 'string' && Function.isFunction(det)) { detect[script] = det } };
  scope.rrequire.getLoading = function() { var keys = Object.keys(loading);
    keys.sort(); return console.log(JSON.stringify(keys, null, '\t')) }; if (!scope.require) { scope.require = scope.rrequire } }));