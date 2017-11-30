/// <reference path="../app.ts" />

'use strict';

module rpgCardsApp {
  export interface IAboutScope extends ng.IScope {
    awesomeThings: any[];
  }

  export class AboutCtrl {

    constructor (private $scope: IAboutScope) {
      $scope.awesomeThings = [
        'HTML5 Boilerplate',
        'AngularJS',
        'Karma'
      ];
    }
  }
}

angular.module('rpgCardsApp')
  .controller('AboutCtrl', rpgCardsApp.AboutCtrl);
