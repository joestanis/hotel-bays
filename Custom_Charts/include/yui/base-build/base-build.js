
YUI.add('base-build',function(Y){var Base=Y.Base,L=Y.Lang,INITIALIZER="initializer",DESTRUCTOR="destructor",build,arrayAggregator=function(prop,r,s){if(s[prop]){r[prop]=(r[prop]||[]).concat(s[prop]);}};Base._build=function(name,main,extensions,px,sx,cfg){var build=Base._build,builtClass=build._ctor(main,cfg),buildCfg=build._cfg(main,cfg,extensions),_mixCust=build._mixCust,dynamic=builtClass._yuibuild.dynamic,i,l,extClass,extProto,initializer,destructor;for(i=0,l=extensions.length;i<l;i++){extClass=extensions[i];extProto=extClass.prototype;initializer=extProto[INITIALIZER];destructor=extProto[DESTRUCTOR];delete extProto[INITIALIZER];delete extProto[DESTRUCTOR];Y.mix(builtClass,extClass,true,null,1);_mixCust(builtClass,extClass,buildCfg);if(initializer){extProto[INITIALIZER]=initializer;}
if(destructor){extProto[DESTRUCTOR]=destructor;}
builtClass._yuibuild.exts.push(extClass);}
if(px){Y.mix(builtClass.prototype,px,true);}
if(sx){Y.mix(builtClass,build._clean(sx,buildCfg),true);_mixCust(builtClass,sx,buildCfg);}
builtClass.prototype.hasImpl=build._impl;if(dynamic){builtClass.NAME=name;builtClass.prototype.constructor=builtClass;}
return builtClass;};build=Base._build;Y.mix(build,{_mixCust:function(r,s,cfg){var aggregates,custom,statics,aggr,l,i;if(cfg){aggregates=cfg.aggregates;custom=cfg.custom;statics=cfg.statics;}
if(statics){Y.mix(r,s,true,statics);}
if(aggregates){for(i=0,l=aggregates.length;i<l;i++){aggr=aggregates[i];if(!r.hasOwnProperty(aggr)&&s.hasOwnProperty(aggr)){r[aggr]=L.isArray(s[aggr])?[]:{};}
Y.aggregate(r,s,true,[aggr]);}}
if(custom){for(i in custom){if(custom.hasOwnProperty(i)){custom[i](i,r,s);}}}},_tmpl:function(main){function BuiltClass(){BuiltClass.superclass.constructor.apply(this,arguments);}
Y.extend(BuiltClass,main);return BuiltClass;},_impl:function(extClass){var classes=this._getClasses(),i,l,cls,exts,ll,j;for(i=0,l=classes.length;i<l;i++){cls=classes[i];if(cls._yuibuild){exts=cls._yuibuild.exts;ll=exts.length;for(j=0;j<ll;j++){if(exts[j]===extClass){return true;}}}}
return false;},_ctor:function(main,cfg){var dynamic=(cfg&&false===cfg.dynamic)?false:true,builtClass=(dynamic)?build._tmpl(main):main,buildCfg=builtClass._yuibuild;if(!buildCfg){buildCfg=builtClass._yuibuild={};}
buildCfg.id=buildCfg.id||null;buildCfg.exts=buildCfg.exts||[];buildCfg.dynamic=dynamic;return builtClass;},_cfg:function(main,cfg,exts){var aggr=[],cust={},statics=[],buildCfg,cfgAggr=(cfg&&cfg.aggregates),cfgCustBuild=(cfg&&cfg.custom),cfgStatics=(cfg&&cfg.statics),c=main,i,l;while(c&&c.prototype){buildCfg=c._buildCfg;if(buildCfg){if(buildCfg.aggregates){aggr=aggr.concat(buildCfg.aggregates);}
if(buildCfg.custom){Y.mix(cust,buildCfg.custom,true);}
if(buildCfg.statics){statics=statics.concat(buildCfg.statics);}}
c=c.superclass?c.superclass.constructor:null;}
if(exts){for(i=0,l=exts.length;i<l;i++){c=exts[i];buildCfg=c._buildCfg;if(buildCfg){if(buildCfg.aggregates){aggr=aggr.concat(buildCfg.aggregates);}
if(buildCfg.custom){Y.mix(cust,buildCfg.custom,true);}
if(buildCfg.statics){statics=statics.concat(buildCfg.statics);}}}}
if(cfgAggr){aggr=aggr.concat(cfgAggr);}
if(cfgCustBuild){Y.mix(cust,cfg.cfgBuild,true);}
if(cfgStatics){statics=statics.concat(cfgStatics);}
return{aggregates:aggr,custom:cust,statics:statics};},_clean:function(sx,cfg){var prop,i,l,sxclone=Y.merge(sx),aggregates=cfg.aggregates,custom=cfg.custom;for(prop in custom){if(sxclone.hasOwnProperty(prop)){delete sxclone[prop];}}
for(i=0,l=aggregates.length;i<l;i++){prop=aggregates[i];if(sxclone.hasOwnProperty(prop)){delete sxclone[prop];}}
return sxclone;}});Base.build=function(name,main,extensions,cfg){return build(name,main,extensions,null,null,cfg);};Base.create=function(name,base,extensions,px,sx){return build(name,base,extensions,px,sx);};Base.mix=function(main,extensions){return build(null,main,extensions,null,null,{dynamic:false});};Base._buildCfg={custom:{ATTRS:function(prop,r,s){r.ATTRS=r.ATTRS||{};if(s.ATTRS){var sAttrs=s.ATTRS,rAttrs=r.ATTRS,a;for(a in sAttrs){if(sAttrs.hasOwnProperty(a)){rAttrs[a]=rAttrs[a]||{};Y.mix(rAttrs[a],sAttrs[a],true);}}}},_NON_ATTRS_CFG:arrayAggregator},aggregates:["_PLUG","_UNPLUG"]};},'3.6.0',{requires:['base-base']});