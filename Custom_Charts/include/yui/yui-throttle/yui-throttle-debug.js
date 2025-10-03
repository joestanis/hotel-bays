
YUI.add('yui-throttle',function(Y){Y.throttle=function(fn,ms){ms=(ms)?ms:(Y.config.throttleTime||150);if(ms===-1){return(function(){fn.apply(null,arguments);});}
var last=Y.Lang.now();return(function(){var now=Y.Lang.now();if(now-last>ms){last=now;fn.apply(null,arguments);}});};},'3.6.0',{requires:['yui-base']});