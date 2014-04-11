'use strict';

var HomeState = require('states/HomeState');
var AboutState = require('states/AboutState');
var ParallaxMap = require('layout/ParallaxMap');

var Locations = ReactRouter.Locations;
var Location = ReactRouter.Location;

var Application = React.createClass({
  render: function() {
    return (
      <div id="jsp-wrapper">
        <h1>John Street Pasture</h1>

        <Locations>
          <Location path="/" handler={HomeState} />
          <Location path="/about" handler={AboutState} />
        </Locations>

        <ParallaxMap lat="40.7030556" lng="-73.9894444" zoom="16" />
      </div>
    );
  }
});

var appNode = document.getElementById('jsp');
React.renderComponent(<Application />, appNode);
