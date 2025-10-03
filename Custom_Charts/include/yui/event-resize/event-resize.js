
YUI.add('event-resize',function(Y){Y.Event.define('windowresize',{on:(Y.UA.gecko&&Y.UA.gecko<1.91)?function(node,sub,notifier){sub._handle=Y.Event.attach('resize',function(e){notifier.fire(e);});}:function(node,sub,notifier){var delay=Y.config.windowResizeDelay||100;sub._handle=Y.Event.attach('resize',function(e){if(sub._timer){sub._timer.cancel();}
sub._timer=Y.later(delay,Y,function(){notifier.fire(e);});});},detach:function(node,sub){if(sub._timer){sub._timer.cancel();}
sub._handle.detach();}});},'3.6.0',{requires:['event-synthetic']});