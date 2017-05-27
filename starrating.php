<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>sample title</title>
		<style type="text/css">
		  #stars {
			color:#ffc926;
			
		  }
		</style>

		<!-- Bootstrap CSS -->
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
		
		<div class="container">
			<div class="row">
				<h2>Working Star Ratings for Bootstrap 3 <small>Hover and click on a star</small></h2>
			</div>
			<div class="row lead">
				<div id="stars" class="starrr"></div>
				<span id="count">Please Rate The Work</span>
			</div>
			
			
		</div>

		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery.js"></script>
		
		<script type="text/javascript">
		  // Starrr plugin (https://github.com/dobtco/starrr)
			var __slice = [].slice;

			(function($, window) {
			  var Starrr;

			  Starrr = (function() {
				Starrr.prototype.defaults = {
				  rating: void 0,
				  numStars: 5,
				  change: function(e, value) {}
				};

				function Starrr($el, options) {
				  var i, _, _ref,
					_this = this;

				  this.options = $.extend({}, this.defaults, options);
				  this.$el = $el;
				  _ref = this.defaults;
				  for (i in _ref) {
					_ = _ref[i];
					if (this.$el.data(i) != null) {
					  this.options[i] = this.$el.data(i);
					}
				  }
				  this.createStars();
				  this.syncRating();
				  this.$el.on('mouseover.starrr', 'span', function(e) {
					return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
				  });
				  this.$el.on('mouseout.starrr', function() {
					return _this.syncRating();
				  });
				  this.$el.on('click.starrr', 'span', function(e) {
					return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
				  });
				  this.$el.on('starrr:change', this.options.change);
				}

				Starrr.prototype.createStars = function() {
				  var _i, _ref, _results;

				  _results = [];
				  for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
					_results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
				  }
				  return _results;
				};

				Starrr.prototype.setRating = function(rating) {
				  if (this.options.rating === rating) {
					rating = void 0;
				  }
				  this.options.rating = rating;
				  this.syncRating();
				  return this.$el.trigger('starrr:change', rating);
				};

				Starrr.prototype.syncRating = function(rating) {
				  var i, _i, _j, _ref;

				  rating || (rating = this.options.rating);
				  if (rating) {
					for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
					  this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
					}
				  }
				  if (rating && rating < 5) {
					for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
					  this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
					}
				  }
				  if (!rating) {
					return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
				  }
				};

				return Starrr;

			  })();
			  return $.fn.extend({
				starrr: function() {
				  var args, option;

				  option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
				  return this.each(function() {
					var data;

					data = $(this).data('star-rating');
					if (!data) {
					  $(this).data('star-rating', (data = new Starrr($(this), option)));
					}
					if (typeof option === 'string') {
					  return data[option].apply(data, args);
					}
				  });
				}
			  });
			})(window.jQuery, window);

			$(function() {
			  return $(".starrr").starrr();
			});

			$( document ).ready(function() {
				  
			  $('#stars').on('starrr:change', function(e, value){
				switch (value) {
					case 1:
						text = "Very Bad Work";
						break; 
					case 2:
						text = "Bad Work";
						break; 
					case 3:
						text = "Satisfied with the work";
						break;
					case 4:
						text = "Good Work";
						break;
					case 5:
						text = "Very Good Work";
						break;
								
					default: 
						text = "PLEASE RATE THE WORK DONE";
				}
				$('#count').html(text);
			  });
			  
			  $('#stars-existing').on('starrr:change', function(e, value){
				switch (value) {
					case 1:
						text = "Very Bad Work";
						break; 
					case 2:
						text = "Bad Work";
						break; 
					case 3:
						text = "Average Work";
						break;
					case 4:
						text = "Good Work";
						break;
					case 5:
						text = "Very Good Work";
						break;
								
					default: 
						text = "PLEASE RATE THE WORK DONE";
				}
				$('#count-existing').html(text);
			  });
			});
		</script>
		<!-- Bootstrap JavaScript -->
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>