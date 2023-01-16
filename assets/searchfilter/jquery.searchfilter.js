/**
 * jQuery searchfilter plugin
 * This jQuery plugin was inspired on ... by ... (http://...),
 * based on jQuery by ... (http://...)
 * and adapted to me for use like a plugin of jQuery.
 * @name jquery.arrangeable.js
 * @author Daniel Dahme - http://www.base3.de
 * @version 0.4
 * @date July 17, 2015
 * @category jQuery plugin
 * @copyright (c) 2015 Daniel Dahme (www.base3.de)
 * @license MIT (http://...), GPL (http://...)
 * @example ...
 */

;(function($) {

	function searchfilter(element, settings) { // The Plugin
		this.$elem = element;
		this._settings = settings;
		this.settings = $.extend(this._default, settings);
		this.initialize();
	}

	searchfilter.prototype = { // The Plugin prototype
		_default: {
			fields: [],
			change: function(e, ui) {}
		},

		initialize: function() {
			var object = this.$elem;

			if (object.hasClass("searchfilter")) return;

			object.addClass("searchfilter");

			this._createGroup(object, object, 0);
		},

		// "addCondition", { "value": "connection", "operation": "conn", "attr": 10928 }
		addCondition: function(cond) {
			this._addCondition(this.$elem, this.$elem, 0, cond);
		},

		_addCondition: function(root, object, depth, cond) {

			var ref = this;
			var opt = this.settings;

			var fieldset = object.children("fieldset");

			var controls = fieldset.children("div.controls");
			var logics = fieldset.children("div.logics");
			var conditions = fieldset.children("ul");

			var x = conditions.children('li') && conditions.children('li').length
				? parseInt(conditions.children('li').last().attr("title"))+1
				: 0;
			var xname = depth ? object.attr("name") + "_" + object.attr("title") : "x";
			var condition = $('<li name="' + xname + '" title="' + x + '" />').appendTo(conditions);
			if ($("li", conditions).length > 1) logics.addClass("filled");

			var standardIndex = 0;

			var field = $('<select class="field" name="field" />').appendTo(condition);
			for (var i=0; i<opt.fields.length; i++) {
				var o = $('<option value="' + opt.fields[i].value + '">' + opt.fields[i].display + '</option>').appendTo(field);
				if (cond.value == opt.fields[i].value) {
					o.attr("selected", "selected");
					standardIndex = i;
				}
			}
			field.change(function(e) {
				for (var i=0; i<opt.fields.length; i++) {
					if ($(this).val() != opt.fields[i].value) continue;

					var op = $(this).siblings('select[name="operation"]');
					op.children().remove();
					for (var j=0; j<opt.fields[i].operations.length; j++) {
						var o = $('<option value="' + opt.fields[i].operations[j].value + '">' + opt.fields[i].operations[j].display + '</option>').appendTo(op);
						if (cond.operation == opt.fields[i].operations[j].value) o.attr("selected", "selected");
					}

					ref._createValue(root, condition, opt.fields[i].attr);

				}

				opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
			});

			var operations = $('<select class="operation" name="operation" />').appendTo(condition);
			for (var i=0; i<opt.fields[standardIndex].operations.length; i++) {
				var o = $('<option value="' + opt.fields[standardIndex].operations[i].value + '">' + opt.fields[standardIndex].operations[i].display + '</option>').appendTo(operations);
				if (cond.operation == opt.fields[standardIndex].operations[i].value) o.attr("selected", "selected");
			}
			operations.change(function(e) {
				opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
			});

			var span = $('<div class="attrObj" />').appendTo(condition);
			ref._createValue(root, condition, opt.fields[standardIndex].attr);

			$('<button class="delete"><span class="icon"></span></button>')  // Filter
				.appendTo(condition)
				.click(function(e) {
					var ul = $(this).parents('ul').first();
					$(this).parents('li')[0].remove();
					if (ul.children('li').length < 2) ul.siblings(".logics").removeClass("filled");

					opt.change.apply(this, [e, { filter: ref._serialize(root) }]);

					return false;
				});

			opt.change.apply(this, [null, { filter: ref._serialize(root) }]);

		},

		_createGroup: function(root, object, depth) {

			var ref = this;
			var opt = this.settings;

			var move = $('<span class="handle"></span>').appendTo(object);

			var fieldset = $('<fieldset />').appendTo(object);

			var controls = $('<div class="controls" />').appendTo(fieldset);
			var logics = $('<div class="logics" />').appendTo(fieldset);
			var conditions = $('<ul />').appendTo(fieldset);

			var xname = depth ? object.attr("name") + "_" + object.attr("title") : "x";
			// logics.addClass("filled");
			$('<input type="radio" name="logic_' + xname + '" value="and" checked="checked" />').appendTo(logics);
			$('<span>UND</span>').appendTo(logics);
			$('<input type="radio" name="logic_' + xname + '" value="or" />').appendTo(logics);
			$('<span>ODER</span>').appendTo(logics);
			logics.children("input").click(function(e) {
				opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
			});

			if ($.ui) {
				object.find("ul").sortable({
					connectWith: "ul",
					handle: ".handle",
					receive: function(e, ui) {
						$(".logics", root).each(function() {
							if ($(this).siblings("ul").children().length > 1) $(this).addClass("filled");
								else $(this).removeClass("filled");
						});
						opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
					}
				});
			}

			$('<button class="add"><span class="icon"></span> Bedingung</button>')
				.appendTo(controls)
				.click(function(e) {

					var x = conditions.children('li') && conditions.children('li').length
						? parseInt(conditions.children('li').last().attr("title"))+1
						: 0;
					var xname = depth ? $(this).parents("li").first().attr("name") + "_" + $(this).parents("li").first().attr("title") : "x";
					var condition = $('<li name="' + xname + '" title="' + x + '" />').appendTo(conditions);
					if ($("li", conditions).length > 1) logics.addClass("filled");

					var standardIndex = 0;

					var move = $('<span class="handle"></span>').appendTo(condition);

					var field = $('<select class="field" name="field" />').appendTo(condition);
					for (var i=0; i<opt.fields.length; i++) {
						var o = $('<option value="' + opt.fields[i].value + '">' + opt.fields[i].display + '</option>').appendTo(field);
						if (opt.fields[i].standard) {
							o.attr("selected", "selected");
							standardIndex = i;
						}
					}
					field.change(function(e) {
						for (var i=0; i<opt.fields.length; i++) {
							if ($(this).val() != opt.fields[i].value) continue;

							var op = $(this).siblings('select[name="operation"]');
							op.children().remove();
							for (var j=0; j<opt.fields[i].operations.length; j++) {
								var o = $('<option value="' + opt.fields[i].operations[j].value + '">' + opt.fields[i].operations[j].display + '</option>').appendTo(op);
								if (opt.fields[i].operations[j].standard) o.attr("selected", "selected");
							}

							ref._createValue(root, condition, opt.fields[i].attr);

						}

						opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
					});

					var operations = $('<select class="operation" name="operation" />').appendTo(condition);
					for (var i=0; i<opt.fields[standardIndex].operations.length; i++) {
						var o = $('<option value="' + opt.fields[standardIndex].operations[i].value + '">' + opt.fields[standardIndex].operations[i].display + '</option>').appendTo(operations);
						if (opt.fields[standardIndex].operations[i].standard) o.attr("selected", "selected");
					}
					operations.change(function(e) {
						opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
					});

					var span = $('<div class="attrObj" />').appendTo(condition);
					ref._createValue(root, condition, opt.fields[standardIndex].attr);

					$('<button class="delete"><span class="icon"></span></button>')  // Filter
						.appendTo(condition)
						.click(function(e) {
							var ul = $(this).parents('ul').first();
							$(this).parents('li')[0].remove();
							if (ul.children('li').length < 2) ul.siblings(".logics").removeClass("filled");

							opt.change.apply(this, [e, { filter: ref._serialize(root) }]);

							return false;
						});

					opt.change.apply(this, [e, { filter: ref._serialize(root) }]);

					return false;
				});

			$('<button class="add"><span class="icon"></span> Gruppe</button>')
				.appendTo(controls)
				.click(function() {
					var x = conditions.children('li') && conditions.children('li').length
						? parseInt(conditions.children('li').last().attr("title"))+1
						: 0;
					var xname = depth ? $(this).parents("li").first().attr("name") + "_" + $(this).parents("li").first().attr("title") : "x";
					var condition = $('<li name="' + xname + '" title="' + x + '" />').appendTo(conditions);
					if ($("li", conditions).length > 1) logics.addClass("filled");
					ref._createGroup(root, condition, depth+1);
					return false;
				});

			if (!object.hasClass("searchfilter")) $('<button class="delete"><span class="icon"></span></button>')  // Gruppe
				.appendTo(controls)
				.click(function(e) {
					var ul = $(this).parents('ul').first();
					$(this).parents('li')[0].remove();
					if (ul.children('li').length < 2) ul.siblings(".logics").removeClass("filled");

					opt.change.apply(this, [e, { filter: ref._serialize(root) }]);

					return false;
				});

		},

		_createValue: function(root, condition, attr) {

			var ref = this;
			var opt = this.settings;

			var span = condition.find(".attrObj");
			span.children().remove();

			var xname = span.parents('li').first().attr("name") + "_" + span.parents('li').first().attr("title");

			if (typeof attr.type === 'function') {

				var inp = attr.type.apply(this, [{
					"class": 'attr',
					"name": 'attr_' + xname,
					"change": function(e) {
						opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
					}
				}]);
				inp.appendTo(span);

			} else switch (attr.type) {

				// standard

				case "text":
					var value = $('<input type="text" class="attr" name="attr_' + xname + '" />').appendTo(span);
					if (attr.maxlength) value.attr("maxlength", attr.maxlength);
					if (attr.standard) value.val(attr.standard);
					value.keyup(function(e) {
						opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
					});
					break;

				case "select":
					var value = $('<select class="attr" name="attr_' + xname + '" />').appendTo(span);
					for (var i=0; i<attr.options.length; i++) {
						var o = $('<option value="' + attr.options[i].value + '">' + attr.options[i].display + '</option>').appendTo(value);
						if (attr.options[i].standard) o.attr("selected", "selected");
					}
					value.change(function(e) {
						opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
					});
					break;

				case "radio":
					var value = $('<input type="hidden" class="attr" name="attr_' + xname + '" />').appendTo(span);
					for (var i=0; i<attr.options.length; i++) {
						var s = $('<span />').appendTo(span);
						var inp = $('<input type="radio" name="attrx_' + xname + '" value="' + attr.options[i].value + '" />').appendTo(s);
						if (attr.options[i].standard) {
							inp.attr("checked", "checked");
							value.val(attr.options[i].value);
						}
						$('<span>' + attr.options[i].display + '</span>').appendTo(s);
					}
					span.find('input').change(function(e) {
						value.val(span.find('input:checked').val());
						opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
					});
					break;

				// TODO: checkbox

				// HTML5

				case "number":
					var value = $('<input type="number" class="attr" name="attr_' + xname + '" />').appendTo(span);
					if (attr.min) value.attr("min", attr.min);
					if (attr.max) value.attr("max", attr.max);
					if (attr.step) value.attr("step", attr.step);
					if (attr.standard) value.val(attr.standard);
					value.on("keyup change", function(e) {
						opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
					});
					break;

				case "range":
					var value = $('<input type="range" class="attr" name="attr_' + xname + '" />').appendTo(span);
					if (attr.min) value.attr("min", attr.min);
					if (attr.max) value.attr("max", attr.max);
					if (attr.step) value.attr("step", attr.step);
					if (attr.standard) value.val(attr.standard);
					value.on("change", function(e) {
						opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
					});
					break;

				case "color":
					var value = $('<input type="color" class="attr" name="attr_' + xname + '" />').appendTo(span);
					if (attr.standard) value.val(attr.standard);
					value.on("change", function(e) {
						opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
					});
					break;


				// jQueryUI

				case "datetime":
					// TODO: Attribute dateformat, standard
					var value = $('<input type="text" class="attr" name="attr_' + xname + '" />')
						.datepicker({ dateFormat: 'yy-mm-dd' })
						.appendTo(span);
					value.change(function(e) {
						opt.change.apply(this, [e, { filter: ref._serialize(root) }]);
					});
					break;
			}

		},

		_serialize: function(object) {

			var ref = this;

			var fieldset = object.children("fieldset");

			var logics = fieldset.children(".logics");
			var conditions = fieldset.children("ul");

			if (conditions.children("li").length == 1) {
				var li = conditions.children("li").first();
				if (li.children("fieldset").length) return this._serialize(li);
				var field = li.find('.field').val();
				var operation = li.find('.operation').val();
				var value = li.find('.attr').val();
				return { "type": "condition", "field": field, "operation": operation, "value": value };
			}

			if (conditions.children("li").length > 1) {
				var conds = [];
				conditions.children("li").each(function() {
					var li = $(this);
					if (li.children("fieldset").length) {
						conds[conds.length] = ref._serialize(li);
					} else {
						var field = li.find('.field').val();
						var operation = li.find('.operation').val();
						var value = li.find('.attr').val();
						conds[conds.length] = { "type": "condition", "field": field, "operation": operation, "value": value };
					}
				});
				var logic = logics.find('input[type="radio"]:checked').val();
				return { "type": "group", "logic": logic, "conditions": conds };
			}

			return {};


			// example
			/*
			return {
				"type": "group",
				"logic": "and",
				"conditions": [
					{
						"type": "group",
						"logic": "or",
						"conditions": [
							{ "type": "condition", "field": "type", "operation": "eq", "value": "note" },
							{ "type": "condition", "field": "type", "operation": "eq", "value": "contact" }
						]
					},
					{ "type": "condition", "field": "created", "operation": "le", "value": "2015-08-01 00:00:00" },
					{ "type": "condition", "field": "created", "operation": "ge", "value": "2015-01-01 00:00:00" }
				]
			};
			*/

		},

		serialize: function() {
			var object = this.$elem.hasClass("searchfilter") ? this.$elem : this.$elem.parents(".searchfilter");
			return this._serialize(object);
		}

	};

	$.fn.searchfilter = function(settings) { // The Plugin call

		var instance = this.data('plugin_searchfilter'); // Get instance

		if (instance === undefined) { // Do instantiate if undefined
			settings = settings || {};
			this.data('plugin_searchfilter', new searchfilter(this, settings));
			return this;
		}

		if ($.isFunction(searchfilter.prototype[settings])) { // Call method if argument is name of method
			var args = Array.prototype.slice.call(arguments); // Get the arguments as Array
			args.shift(); // Remove first argument (name of method)
			return searchfilter.prototype[settings].apply(instance, args); // Call the method
		}

		// Do error handling

		return this;
	}

})(jQuery);

/*
	// Beispiel 1:

	$('#myDiv')
		.searchfilter({ yourSettings: 'here' })
		.searchfilter('saySomething','Hello World!');

	// Beispiel 2:

	$elem = $('#myDiv').searchfilter();
	var instance = $elem.data('plugin_searchfilter');
	instance.saySomething('Hello World!');
*/