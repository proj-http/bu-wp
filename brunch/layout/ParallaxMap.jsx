'use strict';

var ParallaxMap = module.exports = React.createClass({
  render: function() {
    return <div id="map-canvas" ref="canvas"></div>;
  },

  componentDidMount: function() {
    var canvas = this.refs.canvas.getDOMNode();
    var map = new google.maps.Map(canvas, {
      center: new google.maps.LatLng(this.props.lat, this.props.lng),
      zoom: parseInt(this.props.zoom, 10) || 8,
      scrollWheel: this.props.scrollWheel || false,
      scaleControl: this.props.scaleControl || false,
      disableDefaultUI: this.props.disableDefaultUI || true,
      draggable: this.props.draggable || false,
      mapTypeId: this.props.mapTypeId || google.maps.MapTypeId.SATELLITE
    });
  }
});
