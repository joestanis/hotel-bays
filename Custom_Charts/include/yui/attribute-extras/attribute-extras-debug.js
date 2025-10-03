
YUI.add('attribute-extras',function(Y){var BROADCAST="broadcast",PUBLISHED="published",INIT_VALUE="initValue",MODIFIABLE={readOnly:1,writeOnce:1,getter:1,broadcast:1};function AttributeExtras(){}
AttributeExtras.prototype={modifyAttr:function(name,config){var host=this,prop,state;if(host.attrAdded(name)){if(host._isLazyAttr(name)){host._addLazyAttr(name);}
state=host._state;for(prop in config){if(MODIFIABLE[prop]&&config.hasOwnProperty(prop)){state.add(name,prop,config[prop]);if(prop===BROADCAST){state.remove(name,PUBLISHED);}}}}
if(!host.attrAdded(name)){Y.log('Attribute modifyAttr:'+name+' has not been added. Use addAttr to add the attribute','warn','attribute');}},removeAttr:function(name){this._state.removeAll(name);},reset:function(name){var host=this;if(name){if(host._isLazyAttr(name)){host._addLazyAttr(name);}
host.set(name,host._state.get(name,INIT_VALUE));}else{Y.each(host._state.data,function(v,n){host.reset(n);});}
return host;},_getAttrCfg:function(name){var o,state=this._state;if(name){o=state.getAll(name)||{};}else{o={};Y.each(state.data,function(v,n){o[n]=state.getAll(n);});}
return o;}};Y.AttributeExtras=AttributeExtras;},'3.6.0');