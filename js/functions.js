var ajs = angular;
var app = ajs.module('schill', ['ngRoute', 'ngSanitize', 'infinite-scroll']);
app.config(function($routeProvider){
	$routeProvider.when('/', {
		templateUrl: 'views/list.html',
		controller: 'listController'
	}).when('/schema', {
		templateUrl: 'views/schema.html',
		controller: 'scheduleController'
	}).when('/medlem', {
		templateUrl: 'views/blimedlem.html',
		controller: 'memberController',
	}).otherwise({
		templateUrl: 'views/error.html'
	});
});

app.controller('memberController', function($scope){
	$scope.thetitle = "Bli Medlem";
	$scope.currentPage = 0;
	$scope.nextPage;
	$scope.prevPage = 0;
	$scope.switchPage = function(newpage){
		var newOffset = newpage*100;
		$scope.currentPage = newpage;
		$scope.prevPage = $scope.currentPage - 1;
		$('.form-page-container-inner').animate({
			'margin-left': '-'+newOffset+'%',
		}, 200);
	}
});

app.controller('listController', function($scope, $sce, loadposts){
	$scope.loadPosts = new loadposts();
	$scope.thetitle = "Nyheter";
});
app.controller('scheduleController', function($scope){
	$scope.thetitle = "Schema";
	$scope.loadSchedule = function(){
		$('#schedulecontainer').css({'width': '100%'}).html('<img style="position: absolute; left: 50%;margin-top: 100px; margin-left: -20px;" src="img/spinner.gif" alt="" />');
		var ssn = $scope.persnr;
		var day = $scope.day;
		var semester = new Date() > new Date(1900 + new Date().getYear(), 5, 30,0,0,0) ? 'HT' : 'VT';

		$.post('http://www.schillerskaselevkar.se/loadschedule.php', {pnr: ssn, day: day, period: semester}, function(data){
			$('#schedulecontainer').html(data);
		});
	}
});


app.factory('loadposts', function($http){
	var loadPosts = function(){
		this.posts = [];
		this.busy = false;
		this.offset = 0;
		this.count = 5;
		this.max;
	};
	loadPosts.prototype.getPosts = function(){
		if (this.busy) return;

		this.busy = true;

		var url = "http://www.schillerskaselevkar.se/v2/api/get_posts/?count="+this.count+"&offset="+this.offset;
		$http({method: 'post', url: url}).success(function(data){
			var items = data.posts;
			this.posts = this.posts.concat(items);
			this.offset += this.count;
			this.busy = false;
			if(!this.max){
				this.max = data.count_total;
			}
		}.bind(this));
	};

	return loadPosts;
});