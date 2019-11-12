(window.vcvWebpackJsonp4x=window.vcvWebpackJsonp4x||[]).push([[0],{"./node_modules/raw-loader/index.js!./singleImage/editor.css":function(e,t){e.exports=".vce-single-image-container {\n  min-height: 1em;\n}\n"},"./node_modules/raw-loader/index.js!./singleImage/styles.css":function(e,t){e.exports='a.vce-single-image-inner {\n  color: transparent;\n  border-bottom: 0;\n  text-decoration: none;\n  box-shadow: none;\n}\n\na.vce-single-image-inner:hover,\na.vce-single-image-inner:focus {\n  text-decoration: none;\n  box-shadow: none;\n  border-bottom: 0;\n}\n\n.vce-single-image-inner {\n  display: inline-block;\n  vertical-align: top;\n  line-height: 1;\n  max-width: 100%;\n  position: relative;\n}\n\n.vce-single-image-wrapper {\n  display: inline-block;\n  max-width: 100%;\n  overflow: hidden;\n  vertical-align: top;\n}\n\n.vce-single-image-wrapper img {\n  vertical-align: top;\n  max-width: 100%;\n}\n\n.vce-single-image--border-rounded {\n  border-radius: 5px;\n  overflow: hidden;\n}\n\n.vce-single-image--border-round {\n  border-radius: 50%;\n  overflow: hidden;\n}\n\n.vce-single-image--align-center {\n  text-align: center;\n}\n\n.vce-single-image--align-right {\n  text-align: right;\n}\n\n.vce-single-image--align-left {\n  text-align: left;\n}\n\n.vce-single-image-wrapper figure {\n  margin: 0;\n}\n\n.vce-single-image-wrapper figcaption {\n  font-style: italic;\n  margin-top: 10px;\n}\n\n.vce-single-image-inner.vce-single-image--absolute .vce-single-image:not([data-dynamic-natural-size="true"]) {\n  position: absolute;\n  top: 0;\n  left: 0;\n  width: 100%;\n  object-fit: cover;\n  height: 100%;\n}\n\n.vce-single-image-container .vce-single-image-inner .vce-single-image {\n  box-shadow: none;\n}\n'},"./singleImage/index.js":function(e,t,i){"use strict";i.r(t);var a=i("./node_modules/vc-cake/index.js"),n=i.n(a),s=i("./node_modules/@babel/runtime/helpers/extends.js"),l=i.n(s),r=i("./node_modules/@babel/runtime/helpers/typeof.js"),o=i.n(r),c=i("./node_modules/@babel/runtime/helpers/classCallCheck.js"),g=i.n(c),u=i("./node_modules/@babel/runtime/helpers/createClass.js"),p=i.n(u),d=i("./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js"),m=i.n(d),h=i("./node_modules/@babel/runtime/helpers/getPrototypeOf.js"),v=i.n(h),b=i("./node_modules/@babel/runtime/helpers/assertThisInitialized.js"),w=i.n(b),f=i("./node_modules/@babel/runtime/helpers/inherits.js"),y=i.n(f),I=i("./node_modules/@babel/runtime/helpers/defineProperty.js"),x=i.n(I),S=i("./node_modules/react/index.js"),k=i.n(S),z=Object(a.getService)("api"),E=Object(a.getService)("renderProcessor"),j=Object(a.getService)("utils"),C=j.getBlockRegexp,O=j.parseDynamicBlock,_=C(),W=function(e){function t(e){var i;return g()(this,t),i=m()(this,v()(t).call(this,e)),x()(w()(i),"promise",null),i.state={imgElement:null,parsedWidth:null,parsedHeight:null,naturalWidth:null,naturalHeight:null},i.setImage=i.setImage.bind(w()(i)),i.setImageState=i.setImageState.bind(w()(i)),i.setError=i.setError.bind(w()(i)),i}return y()(t,e),p()(t,[{key:"componentDidMount",value:function(){var e=this;this.promise=new window.Promise((function(t,i){e.resolve=t,e.setImage(e.props)})),E.add(this.promise)}},{key:"componentWillUnmount",value:function(){this.resolve&&this.resolve(!0),t.image&&t.image.removeEventListener("load",this.setImageState),t.image&&t.image.removeEventListener("error",this.setError)}},{key:"componentDidUpdate",value:function(e,t){e.atts.image!==this.props.atts.image?this.setImage(this.props):e.atts.size!==this.props.atts.size?this.resetImageSizeState():e.atts.shape!==this.props.atts.shape&&this.resetImageSizeState()}},{key:"parseSize",value:function(e,t,i,a){var n=!0;"string"==typeof e?e=e.replace(/\s/g,"").replace(/px/g,"").toLowerCase().split("x"):"object"===o()(e)&&(n=e.crop,e=[e.width,e.height]),i=parseInt(i),a=parseInt(a);var s=parseInt(e[0])<i,l=parseInt(e[1])<a;if(n)e[0]=parseInt(e[0])<i?parseInt(e[0]):i,e[1]=parseInt(e[1])<a?parseInt(e[1]):a;else{if(e[0]=s?parseInt(e[0]):i,e[1]=l?parseInt(e[1]):a,s&&!l){var r=e[0]/i;e[1]=parseInt(a*r)}if(l&&!s){var c=e[1]/a;e[0]=parseInt(i*c)}if(l&&s)if(a<i){var g=e[0]/i;e[1]=parseInt(a*g)}else{var u=e[1]/a;e[0]=parseInt(i*u)}}if(t){var p=e[0]>=e[1]?e[1]:e[0];e={width:p,height:p}}else e={width:e[0],height:e[1]};return e}},{key:"checkRelatedSize",value:function(e){var t=null;return window.vcvImageSizes&&window.vcvImageSizes[e]&&(t=window.vcvImageSizes[e]),t}},{key:"getSizes",value:function(e,t){var i=e.size,a=e.shape,n="";return{width:(n=(i=i.replace(/\s/g,"").replace(/px/g,"").toLowerCase()).match(/\d+(x)\d+/)?this.parseSize(i,"round"===a,t.width,t.height):(n=this.checkRelatedSize(i))?this.parseSize(n,"round"===a,t.width,t.height):this.parseSize({width:t.width,height:t.height},"round"===a,t.width,t.height)).width,height:n.height}}},{key:"setImage",value:function(e){var i=this.getImageUrl(e.atts.image);t.image&&t.image.removeEventListener("load",this.setImageState),t.image&&t.image.removeEventListener("error",this.setError),t.image=new window.Image,t.image.addEventListener("load",this.setImageState),t.image.addEventListener("error",this.setError),i?t.image.src=i:this.setError(),i||this.setState({imgElement:null,parsedWidth:null,parsedHeight:null,naturalWidth:null,naturalHeight:null})}},{key:"setImageState",value:function(e){var t=this,i=e.currentTarget,a=this.getSizes(this.props.atts,i);this.setState({imgElement:i,parsedWidth:a.width,parsedHeight:a.height,naturalWidth:i.width,naturalHeight:i.height},(function(){t.resolve&&t.resolve(!0)}))}},{key:"resetImageSizeState",value:function(){var e=this.getSizes(this.props.atts,this.state.imgElement);this.setState({parsedWidth:e.width,parsedHeight:e.height})}},{key:"setError",value:function(){this.resolve&&this.resolve(!1)}},{key:"getImageShortcode",value:function(e){var t=e.props,i=e.classes,a=e.isDefaultImage,n=e.src,s=e.isDynamicImage,l=e.naturalSizes,r='[vcvSingleImage class="'.concat(i,'" data-width="').concat(this.state.parsedWidth||0,'" data-height="').concat(this.state.parsedHeight||0,'" src="').concat(n,'" data-img-src="').concat(t["data-img-src"],'" alt="').concat(t.alt,'" title="').concat(t.title,'"');if(a&&(r+=' data-default-image="true"'),s){var o=O(this.props.rawAtts.image.full);r+=' data-dynamic="'.concat(o.blockAtts.value,'"'),l&&(r+=' data-dynamic-natural-size="true"')}return r+="]"}},{key:"render",value:function(){var e=this.props,t=e.id,i=e.atts,a=e.editor,n=i.shape,s=i.clickableOptions,r=i.showCaption,o=i.customClass,c=i.size,g=i.alignment,u=i.metaCustomId,p=i.image,d="vce-single-image-container",m="vce-single-image-inner vce-single-image--absolute",h={},v={},b={},w="div",f={},y=this.getImageUrl(p);if(f["data-img-src"]=y,f.alt=p&&p.alt?p.alt:"",f.title=p&&p.title?p.title:"","string"==typeof o&&o&&(d+=" "+o),"url"===s&&p&&p.link&&p.link.url){w="a";var I=p.link;h={href:I.url,title:I.title,target:I.targetBlank?"_blank":void 0,rel:I.relNofollow?"nofollow":void 0}}else"imageNewTab"===s?(w="a",h={href:y,target:"_blank"}):"lightbox"===s?(w="a",h={href:y,"data-lightbox":"lightbox-".concat(t)}):"zoom"===s?m+=" vce-single-image-zoom-container":"photoswipe"===s&&(w="a",h={href:y,"data-photoswipe-image":t,"data-photoswipe-index":0},b["data-photoswipe-item"]="photoswipe-".concat(t),r&&(h["data-photoswipe-caption"]=p.caption),v["data-photoswipe-gallery"]=t);g&&(d+=" vce-single-image--align-".concat(g)),"rounded"===n&&(m+=" vce-single-image--border-rounded"),"round"===n&&(m+=" vce-single-image--border-round"),u&&(v.id=u);var x=this.applyDO("all"),S=null;p&&p.caption&&(S=k.a.createElement("figcaption",null,p.caption));var z=p&&p.urls&&p.urls.length?p.urls[0]:p;z&&z.filter&&"normal"!==z.filter&&(m+=" vce-image-filter--".concat(z.filter));var E="",j=this.props.rawAtts.image&&this.props.rawAtts.image.full,C=Array.isArray("string"==typeof j&&j.match(_)),O=!1;C&&(1===this.state.naturalWidth&&1===this.state.naturalHeight||(!c||"full"===c)&&"round"!==n)&&(h["data-vce-delete-attr"]="style",O=!0);var W={props:f,classes:"vce-single-image",isDefaultImage:!(p&&p.id),src:y,isDynamicImage:C,naturalSizes:O};return y&&(E=k.a.createElement("img",l()({className:"".concat("vce-single-image"," vcvhelper"),src:y},f,{"data-vcvs-html":this.getImageShortcode(W)}))),c&&"full"!==c||"round"===n||C||(E=k.a.createElement("img",l()({className:"vce-single-image",src:y},f))),k.a.createElement("div",l()({className:d},a,v),k.a.createElement("div",l()({className:"vce vce-single-image-wrapper"},b,{id:"el-"+t},x),k.a.createElement("figure",null,k.a.createElement(w,l()({},h,{className:m,ref:"imageContainer",style:{paddingBottom:"".concat(this.state.parsedHeight/this.state.parsedWidth*100,"%"),width:this.state.parsedWidth}}),E),S)))}}]),t}(z.elementComponent);x()(W,"image",null),(0,n.a.getService("cook").add)(i("./singleImage/settings.json"),(function(e){e.add(W)}),{css:i("./node_modules/raw-loader/index.js!./singleImage/styles.css"),editorCss:i("./node_modules/raw-loader/index.js!./singleImage/editor.css")},"")},"./singleImage/settings.json":function(e){e.exports={image:{type:"attachimage",access:"public",value:"single-image.jpg",options:{label:"Image",multiple:!1,dynamicField:!0,defaultValue:"single-image.jpg",onChange:{rules:{clickableOptions:{rule:"value",options:{value:"url"}}},actions:[{action:"attachImageUrls"}]},url:!1,imageFilter:!0}},shape:{type:"buttonGroup",access:"public",value:"square",options:{label:"Shape",values:[{label:"Square",value:"square",icon:"vcv-ui-icon-attribute-shape-square"},{label:"Rounded",value:"rounded",icon:"vcv-ui-icon-attribute-shape-rounded"},{label:"Round",value:"round",icon:"vcv-ui-icon-attribute-shape-round"}]}},designOptions:{type:"designOptions",access:"public",value:{},options:{label:"Design Options"}},editFormTab1:{type:"group",access:"protected",value:["clickableOptions","showCaption","image","shape","size","alignment","metaCustomId","customClass"],options:{label:"General"}},metaEditFormTabs:{type:"group",access:"protected",value:["editFormTab1","designOptions"]},relatedTo:{type:"group",access:"protected",value:["General"]},metaOrder:{type:"number",access:"protected",value:4},customClass:{type:"string",access:"public",value:"",options:{label:"Extra class name",description:"Add an extra class name to the element and refer to it from Custom CSS option."}},size:{type:"string",access:"public",value:"large",options:{label:"Size",description:"Enter image size (Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height))."}},clickableOptions:{type:"dropdown",access:"public",value:"",options:{label:"OnClick action",values:[{label:"None",value:""},{label:"Lightbox",value:"lightbox"},{label:"PhotoSwipe",value:"photoswipe"},{label:"Zoom",value:"zoom"},{label:"Open Image in New Tab",value:"imageNewTab"},{label:"Link selector",value:"url"}]}},showCaption:{type:"toggle",access:"public",value:!1,options:{label:"Show image caption in gallery view",onChange:{rules:{clickableOptions:{rule:"value",options:{value:"photoswipe"}}},actions:[{action:"toggleVisibility"}]}}},alignment:{type:"buttonGroup",access:"public",value:"left",options:{label:"Alignment",values:[{label:"Left",value:"left",icon:"vcv-ui-icon-attribute-alignment-left"},{label:"Center",value:"center",icon:"vcv-ui-icon-attribute-alignment-center"},{label:"Right",value:"right",icon:"vcv-ui-icon-attribute-alignment-right"}]}},metaCustomId:{type:"customId",access:"public",value:"",options:{label:"Element ID",description:"Apply unique ID to element to link directly to it by using #your_id (for element ID use lowercase input only)."}},tag:{access:"protected",type:"string",value:"singleImage"},metaPublicJs:{access:"protected",type:"string",value:{libraries:[{rules:{clickableOptions:{rule:"value",options:{value:"zoom"}}},libPaths:["public/dist/singleImage.min.js"]}]}},sharedAssetsLibrary:{access:"protected",type:"string",value:{libraries:[{rules:{clickableOptions:{rule:"value",options:{value:"lightbox"}}},libsNames:["lightbox"]},{rules:{clickableOptions:{rule:"value",options:{value:"zoom"}}},libsNames:["zoom"]},{rules:{clickableOptions:{rule:"value",options:{value:"photoswipe"}}},libsNames:["photoswipe"]}]}}}}},[["./singleImage/index.js"]]]);