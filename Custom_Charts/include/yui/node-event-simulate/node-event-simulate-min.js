
YUI.add("node-event-simulate",function(a){a.Node.prototype.simulate=function(c,b){a.Event.simulate(a.Node.getDOMNode(this),c,b);};},"3.6.0",{requires:["node-base","event-simulate"]});