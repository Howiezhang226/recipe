<?php
include_once "resource/session.php";
$page_title = "Groups Page";
include_once "partials/headers.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular.min.js"></script>
<div ng-app="myApp" ng-controller="myCtrl" ng-init="getAllGroups()">

    <div ng-repeat="group in groups">
                <h5>{{ group.gname }}</h5>
                <button ng-click="addGroup(group.gid)">Join</button>
                <button ng-click="searchGroup(group.gid)">Search</button>
                <p>creator:{{ group.creator }}</p>


    </div>

</div>

<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope, $http) {
        $scope.getAllGroups = function () {
            $http.get("searchGroup.php").then(
                function (response) {
                    $scope.groups = response.data;
                });
        };
        $scope.addGroup = function (gid) {
            data = {
                'gid' : gid
            };
            $http.post('addGroup.php', data)
                .then(function (data) {
                    console.log(data.data);
                    if (data.data == 23000) {
                        alert("You have joined this group before");
                    }
                    else {
                        alert("successful!");
                    }
                    }
                ,function (data) {
                    console.log("error");
                });
        };

        $scope.searchGroup = function (gid) {
            data = {
                'gid' : gid
            };
            $http.post('resource/set-session.php', data)
                .then(function (data) {
                    console.log(data);
                    window.location.href='groups-front.php';
                    },function (data) {
                    console.log("error");
                });
        };
    })
</script>
<?php
include_once "partials/footers.php"
?>
