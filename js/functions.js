var ajs = angular;
var host ="http://www.schillerskaselevkar.se/v2";
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
	$scope.openInfo = function(){
		$('.infoPage').slideToggle();
	}
	$scope.submitForm = function(){
		if($scope.memberform.$valid){
			var form = $('#memberform');
			var fname = $scope.fornamn;
			var lname = $scope.efternamn;
			var ssn = $scope.ssn;
			var sex = $scope.kon;
			var arskurs = $scope.arskurs;
			var adress1 = $scope.adress1;
			var adress2 = $scope.adress2;
			var city = $scope.city;
			var telnr1 = $scope.telnr1;
			var telnr2 = $scope.telnr2;
			var email = $scope.email;

			console.log(fname,lname,ssn,sex,adress1, adress2, city, telnr1, telnr2, email);
			$.post(host+'/memberhandler.php', {
				fname: fname, 
				lname: lname, 
				ssn: ssn, 
				sex: sex, 
				arskurs: arskurs, 
				adress1: adress1, 
				adress2: adress2,
				city: city,
				telnr1: telnr1,
				telnr2: telnr2,
				email: email
			}, function(data){
				console.log(data);
			});
		}else{
			alert('Fyll i alla fält');
		}
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

		$.post(host+'/loadschedule.php', {pnr: ssn, day: day, period: semester}, function(data){
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

		var url = host+"/api/get_posts/?count="+this.count+"&offset="+this.offset;
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