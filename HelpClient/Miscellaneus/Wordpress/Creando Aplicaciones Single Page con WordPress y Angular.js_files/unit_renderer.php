var NonMraidTagInMraidEnv = false;
(function(){
	if(typeof MRAID_ENV != 'undefined'){
		var scriptEl = document.createElement('script');
		scriptEl.src = 'mraid.js';
		var docHead = document.getElementsByTagName('head');
		if(docHead && docHead[0]){
			docHead[0].appendChild(scriptEl);
		} else if(document.body){
			document.body.appendChild(scriptEl);
		}
		NonMraidTagInMraidEnv = true;
	}
})();

if(typeof jvxObjectList == "undefined"){
	var jvxObjectList = ["jvx_5f719d32df2bb"];
}else{
	jvxObjectList.push("jvx_5f719d32df2bb");
}

//get the current executing script's parent node to append nodes
function getCurrScrNode(){
    var cScrNode = null;
    try{
        cScrNode = document.currentScript;
        if(cScrNode == undefined){
            scrNodes = document.getElementsByTagName("script");
            for(var i=0;i<scrNodes.length;i++){
                var scrSrc = scrNodes[i].src;
                if(scrSrc &&  scrSrc.indexOf("https://as.jivox.com/unit/unit_renderer.php?creativeUnitType=22&bDim=300x600&bUnitId=2200&siteId=65c616660e0b0a&campaignId=128974&es_pId=63E14k&isDynamic=1&ap_DataSignal1=40582625&ap_DataSignal2=ABAjH0jkoUcVSP6Wxi9RTnFFP7FG&ap_DataSignal3=257913009&ap_DataSignal4=11395931134&jvxVer=2&cMacro=https://googleads.g.doubleclick.net/dbm/clk%3Fsa%3DL%26ai%3DCJPDjJZ1xX_f2FamkzAbL3LTwDau_vapeoru1_bEL8O7_65ACEAEg08vOMGDV5dICoAGA7P2-AsgBCakCcta2SU-Dsz6oAwGqBNkBT9AGCQUvgfXdFJ9VZ5YlA9A4IvcI09KlHAI3eTVuWKoWUMliKTEl-m6PfsNsk6C_7aoeOQbRJFARYMPu0jtdZNtZrSne5qHjS0rFNnQYPfAb8fHYxfDLtLqcV5BrSIKNUePu8QhjNFB0ZUXKV_dfzqZ_pj1wKkZurKDRvtsv8eToKbC_r-YVSTiuVxRNaftOnbAh8lOnRQ0br_Z-lqoOm7BzfInTsUrBnwtxaibJ3xqzY2QtLs5Lrn8DV6Qf-o27ljvuhyfrrSvEFk_xoaYp7ViCCzwIGCQOZMAE54ibroID4AQDkAYBoAZNgAfok4LBAYgHAZAHAqgHjs4bqAfVyRuoB5PYG6gHugaoB_DZG6gH8tkbqAfs1RuoB6a-G6gH7NUbqAfz0RuoB5bYG6gHwtob2AcA0ggJCICAgBAQAhgN8ggbYWR4LXN1YnN5bi01NDQ0Nzg2MTkxMTcwMDA2gAoDmAsByAsBgAwBsBOAis0J0BMA2BMN2BQB%26ae%3D1%26num%3D1%26cid%3DCAMSeQClSFh315iMKx2hflFO6ogmsQsnGxXrL9iY5iLW7zIAdNySeC4mTxCLPhePL1Old6LY6bep8zVC8yETO6mA3APLPkfvBXP7x9rPtaxEWcRIOInDLW290T3rGZcG6GaSZMvnODe8eoHcOpicOtXZKCAao1FRRZvUkXE%26sig%3DAOD64_3xkpbmKd2S8ZCZwBe_wCQ5omhY1Q%26client%3Dca-pub-5884294479391638%26dbm_c%3DAKAmf-AcOU1x_Ri5Jdnhq4z54Lyy45eICfyqSdoUlnpYrI96uPNHyZ2nqVZBFd6NrZFjhuA2hCH2j5Tq0wYumlpVt4nd2sZtqEGEBkwP2hglLyd2MOVMQU2sDuwRXlWwg6EMffCCAJHpPAjR2KRfDE92xRtd9GVHOw%26dbm_d%3DAKAmf-CEAYu8rO06Rnnn63Pg0JJy06rE_18KdcOA6oGEw6_QieI2EkKVZ8mr9G7Zhv3CXDKu5JvqZVMeyQAax2h2sJ6ZOqG--1kvUnRiaqoG2pxXT5DQD4trcsDG_g-1NMqOOAdOY3gdx8ozAFgHBev-tShKi-dAO-0N-jpYIa7ixRHcL2AHzDuvdnMS0h2XHD_vWeLNTpcnyngq8cIIQ8v5Q5Wopw1HxF89LNqKkEx0UtXuYt8Js8ToJi1cqt80noQ8ncdFpx_jpxpDFsIahg6WfIsPidMKy_TtLZ640imKgYT_IxxTe1mGsCmsDoLVmMgOb_Sxh1la_7Mgxsm8YNYHrMJUwUQnowVXZa6nUZdqKrV-6cV05zp4I7z7ypiDV8lqQuwbITFfhgwLtXmEoJMJ_d3T55TLVudMKK1Tu60EFIaofAtnOFIWS8QbOIwYp83vrEpI9vMPcZRnXu6LEMlaly7RRSDb-8veN1Kjuot_ueg1MfuezB3l56naSy1dXpxzCiRnkIRGNEDXTo42UcRFHfn-hEmNgNFKEgxyFywaVWUwJhz4kOOdhoUcQvxdpJL3Z3QvyIYs%26adurl%3D&r=1601281317359287") != -1){
                    cScrNode = scrNodes[i];
                }
            }
        }   
    } catch(e){
            }
    return cScrNode;
}

function createiFrameNode(obj){
    /* obj should be of this format - {'id':'frame1','src':'http://www.jivox.com/','width':'1024','height':'768'} */
    var ifrm = document.createElement('iframe');
        ifrm.id = obj.id;
        ifrm.src = obj.src;
        ifrm.width = obj.width;
        ifrm.height = obj.height;
        ifrm.style = obj.style;
        ifrm.frameborder = "0";
        ifrm.scrolling = "no";
        return ifrm;
}

function jvxCopyObject(target,obj){
    for(var k in obj) {
        target[k]=obj[k];
    }
    return target;
}

	// when document.body is not there, inject document.write which will be default create the html structure
	if(document.body == null){
		document.write("<div id='jvxSkeletonRef_5f719d32df2bb' style='display:none;'></div>")
	}
/*
JavaScript responsible for frame busting
*/
var jvx_5f719d32df2bbTraffickedInFrame = false,			// COM: should be true, if !busted and self != top
	jvx_5f719d32df2bbSafeFrameSupported = false,		// COM: should be true only when safeFrame is supported in the page
	jvx_5f719d32df2bbCanBustFromFrame = true,			// COM: should be false, when all busting method fails
	jvx_5f719d32df2bbInNestedFrame = false;				// COM: should be true, when tag trafficked inside nested frame

if(self != top){
	jvx_5f719d32df2bbTraffickedInFrame = true;
}

try{
		$sf.ext.register(300, 600);
		jvx_5f719d32df2bbSafeFrameSupported = true;
}catch(e){
	jvx_5f719d32df2bbSafeFrameSupported = false;
}


for(var jvxLoopVar=0; jvxLoopVar<1; jvxLoopVar++){



// Adding close button CSS style to document.head
var css = '.jvx_boxclose{padding:0px; margin:0px; top:1px; right:1px; position:absolute; width:20px; height:19px; display:block; text-decoration:none; color:#fff; background:#111; font-family:"Tahoma", Helvetica, sans-serif; text-align:center; font-size:20px; font-weight:bold; border-radius:50%; box-shadow:0px 0px 2px 0px #FFF; cursor:pointer; line-height:17px; opacity:1; border:2px Solid #999; -webkit-border:2px Solid #999;}',
	head = document.head || document.getElementsByTagName('head')[0],
	style = document.createElement('style');
		css += '.jvx_boxclose{ -webkit-transition:-webkit-transform .25s, opacity .25s; -moz-transition:-moz-transform .25s, opacity .25s; transition: transform .25s, opacity .25s; opacity:.55; -webkit-perspective: 1000; -webkit-backface-visibility: hidden; -moz-backface-visibility: hidden;backface-visibility: hidden;} .jvx_boxclose:hover{ -webkit-transform: rotate(360deg); -moz-transform: rotate(360deg); transform: rotate(360deg); opacity:1;}';
		style.type = 'text/css';
	if (style.styleSheet){
	  style.styleSheet.cssText = css;
	} else {
	  style.appendChild(document.createTextNode(css));
	}
	head.appendChild(style);




var adInVPForOneSec = false;
var timeoutHandle;
var timerRunning = false;

var adViewabilityDetectInit = function (visibilityThreshold) { 
    try {
        var boxElement;

        boxElement = document.querySelector('#adUnitContainer_5f719d32df2bb');

        createObserver();

        function createObserver() {
            var observer;
            var options = {
                root: null,
                rootMargin: "0px",
                threshold: [0, 0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1]
            };

            observer = new IntersectionObserver(handleIntersect, options);
            observer.observe(boxElement);
        }

        function handleIntersect(entries, observer) {
            entries.forEach(function (entry) {
                                if (entry.intersectionRatio > visibilityThreshold) {
                    if (!adInVPForOneSec && !timerRunning) {
                        timerRunning = true;
                        timeoutHandle = setTimeout(function () {
                            adInVPForOneSec = true;
                                                        if(typeof jvx_5f719d32df2bb != "undefined")
                            jvx_5f719d32df2bb.recordEvent(73);
                            else 
                            recordEvent(73);
                                                    }, 1000);
                    }
                }
                if (timerRunning && entry.intersectionRatio < visibilityThreshold) {
                    window.clearTimeout(timeoutHandle);
                    timerRunning = false;
                }
            });
        }
    } catch(e){
            }
};
var CreativeUnit = (function(){
	var creativeResolveBeginTime = new Date();
	var isMSIE = false;
		var hasFlashPlugin = (function(){
		var flashPluginAvailable = false;
		if(navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]){
			flashPluginAvailable = navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin;
		} 
		if(!flashPluginAvailable && isMSIE){
			// if we are here, this is for MSIE only.
			try {
				var flashObj = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
				if(flashObj)
					flashPluginAvailable = true;
			} catch (ex) {
			}
		}		
		return flashPluginAvailable;
	})();
	
        
	    addEvent(window, "message", receiveHtml5Message, false);

	function receiveHtml5Message(e){
  		if(typeof e.data != "string"){
			return;
		}
        var s = e.data.split(':', 10);
		        if(s && s.length >= 2 && s[0] == 'jvx_5f719d32df2bb'){
			var msg = s[1];
			if(msg == 'openExpansion'){
									jvx_5f719d32df2bb.openClickThrough();
							} else if(msg == 'closeExpansion'){
				jvx_5f719d32df2bb.closeExpansion(false, false);
			} else if(msg == 'expansionLoaded'){
							} else if(msg == 'recordUIR'){
				jvx_5f719d32df2bb.UIRRecorded = true;
			} else if(msg == 'lastMouseLeave'){
				jvx_5f719d32df2bb.lastMLeaveId = s[2];
			} else if(msg == 'clearUIR'){
				clearTimeout(jvx_5f719d32df2bb.UIRTimer);
			} else if(msg == 'recordDwell'){
				if(!jvx_5f719d32df2bb.DwellRecorded){
					jvx_5f719d32df2bb.recordDwellEvent(49, jvx_5f719d32df2bb.DwellElapsedTime);
				}
			}
									else if(msg=="dynamicProperties") {
                jvx_5f719d32df2bb.updateDYProperties(s[2],1);
							}
												                        else if(msg == "miniScrollerBgInfo"){
                var miniScrollerBgURL = decodeURIComponent(s[2]);
                jvx_5f719d32df2bb.fixedBgAstLeft = parseInt(s[3]);
                jvx_5f719d32df2bb.renderFixedPageBg(miniScrollerBgURL,s[3]);
            } 
		}
	}

	function postHtml5Message(winRef, msg){
		try{
			winRef.postMessage('jvx_5f719d32df2bb' + ':' + msg, "*");
		}catch(e){
			if(typeof(winRef.contentWindow) != 'undefined')
				winRef.contentWindow.postMessage('jvx_5f719d32df2bb' + ':' + msg, "*");
		}
	}
		function addEvent(el, event, fn, capture){
		if(el.addEventListener){
			el.addEventListener(event,fn,capture);
		}else{
			el.attachEvent("on" + event, fn);
		}
	}
	
	function removeEvent(el, event, fn, capture){
		if(el.removeEventListener){
			el.removeEventListener(event,fn,capture);
		}else{
			el.detachEvent("on" + event, fn);
		}
	}

	function getElById(id){
		return document.getElementById(id);
	}

	function getElByClass(cName){
		if(document.getElementsByClassName){				
			return document.getElementsByClassName(cName);
		}else if(document.querySelectorAll){	// For IE8
			return document.querySelectorAll(cName);
		}
	}

	function getBox(el){
		return el.getBoundingClientRect();
	}

	function getElemByQuerySelect(el){
		return document.querySelector('#'+el+', .'+el);
	}

	function getOffset(elem) {
		if (elem.getBoundingClientRect) {
			return getOffsetRect(elem);
		} else { // old browser
			return getOffsetSum(elem);
		}
	}

	function getOffsetSum(elem) {
	  var top=0, left=0;
	  while(elem) {
		top = top + parseInt(elem.offsetTop);
		left = left + parseInt(elem.offsetLeft);
		elem = elem.offsetParent;        
	  }
	   
	  return {top: top, left: left};
	}

	function getOffsetRect(elem) {
		var box = elem.getBoundingClientRect();
		
		var body = document.body;
		var docElem = document.documentElement;
		
		var scrollTop = window.pageYOffset || docElem.scrollTop || body.scrollTop;
		var scrollLeft = window.pageXOffset || docElem.scrollLeft || body.scrollLeft;
		
		var clientTop = docElem.clientTop || body.clientTop || 0;
		var clientLeft = docElem.clientLeft || body.clientLeft || 0;
		
		var top  = box.top +  scrollTop - clientTop;
		var left = box.left + scrollLeft - clientLeft;
		
		return { top: Math.round(top), left: Math.round(left) };
	}

	function getOffset(elem) {
		if (elem.getBoundingClientRect) {
			return getOffsetRect(elem);
		} else {
			return getOffsetSum(elem);
		}
	}

	/**
	* Creates and returns element from html chunk
	* Uses innerHTML to create an element
	*/
	var toElement = (function(){
		var div = document.createElement('div');
		return function(html){
			div.innerHTML = html;
			var el = div.firstChild;
			return div.removeChild(el);
		};
	})();

	var getElComputedStyle = function(){
		var func = null;
		if (document.defaultView && document.defaultView.getComputedStyle) {
			func = document.defaultView.getComputedStyle;
		} else if (typeof(document.body.currentStyle) !== "undefined") {
			func = function(element, anything) {
			  return element["currentStyle"];
			};
		}
		return function(element, style) {
			if(typeof func === 'function')
				return func(element, null)[style];
		}
	}();

    function hasClass(el, name){        
        var re = new RegExp('\\b' + name + '\\b');        
        return re.test(el.className);
    }  
	
    function addClass(el, name){
        if(!hasClass(el, name)){
			if(el.classList && el.classList.length > 0){
				el.className += ' ' + name;
			} else {
				el.className =  name;	
			}
        }	
    }   
	
    function removeClass(el, name){
        var re = new RegExp('\\b' + name + '\\b');                
        el.className = el.className.replace(re, '');        
    }
    
    function removeNode(el){
        el.parentNode.removeChild(el);
    }

	function createImg(obj){
		/* obj should be of this format - {'id':'image1','src':'http://www.jivox.com/image.jpg','width':'180','height':'150'} */
		var id = obj.id, 
			src = obj.src, 
			width = obj.width, 
			height = obj.height,
			str = '';

		str += '<img id="'+id+'" src="'+src+'" width="'+width+'" height="'+height+'" border="0" style="margin:0;padding:0;border:0;display:block;" />';
		return str;
	}
	
	function createSWF(obj){
		var id = obj.id, 
			src = obj.src, 
			width = obj.width, 
			height = obj.height,
			params = obj.params,
			paramsHTMLStr = '',
			str = '';

		for(var paramName in params){
			paramsHTMLStr += '<param name="'+paramName+'" value="'+params[paramName]+'" />';
		}

		str += '<object type="application/x-shockwave-flash" data="'+src+'" id="'+id+'" name="'+id+'" width="'+width+'" height="'+height+'" style="display:block;">';
		str += paramsHTMLStr;
		str += '</object>';
		return str;		
	}

	function createIframe(obj){
		/* obj should be of this format - {'id':'frame1','src':'http://www.jivox.com/','width':'1024','height':'768'} */
		var id = obj.id, 
			src = obj.src, 
			width = obj.width, 
			height = obj.height,
			str = '',
			customCss = '';
				if(!isEmpty(obj.styles)){
			var styles = obj.styles;
			customCss = ";";
			for (var name in styles) {
			  if(styles.hasOwnProperty(name)){
				  customCss += name+ ":" +styles[name]+ ";";
			   }
			}
		}	
		
		var	iframeStyleVal = "";
				iframeStyleVal += "margin:0;padding:0;border:0;display:block" + customCss;

		str += '<iframe id="'+id+'" name="'+id+'" src="'+src+'" width="'+width+'" height="'+height+'" frameborder="0" scrolling="no" allowtransparency="true" style="'+iframeStyleVal+'" onload="this.style.visibility=\'visible\';"></iframe>';
		return str;
	}

	function createFIF(obj){
		/* obj should be of this format - {'id':'frame1','src':'http://www.jivox.com/','width':'1024','height':'768'} */
		var id = obj.id, 
			src = obj.src, 
			width = obj.width, 
			height = obj.height,
			str = '';
		src = '<style>body{padding:0;margin:0;}</style>' + src;
		str += '<iframe id="'+id+'" name="'+id+'" srcdoc="'+src+'" src="about:blank" width="'+width+'" height="'+height+'" frameborder="0" scrolling="no" allowtransparency="true" style="margin:0;padding:0;border:0;visibility:hidden;" onload="this.style.visibility=\'visible\';"></iframe>';

		return str;
	}

    function createDivNode(id){
        var divNode =  document.createElement('div');
        divNode.id = id;
        return divNode;
    }

    function prependNode(cNode, pNode){
		pNode.insertBefore(cNode, pNode.firstChild);
    }
	
	function setPixel(pValue){
		var pxVal = pValue.toString();
		if(pxVal.indexOf("%") >= 0){
			return "";
		}
		return "px";
	}
	
	function clearNode(pNode, idPrefix){
		var i = 0, 
			elList = pNode.getElementsByTagName('div'),
			elLen = (elList) ? elList.length : 0;
		for (i = 0; i < elLen; i++) {
			var elId = elList[i].id;
			if(elId && elId.indexOf(idPrefix) == 0){
				pNode.removeChild(elList[i]);
								return;
			}
		}
	}

		function getPageURL(){
                var currPageURL = window.location.href;
        if(currPageURL != "about:blank" || currPageURL != ""){
            return currPageURL;
        }
        var parentWindow;
                		var resolvePageURL = function(){
            try{
                parentWindow = typeof parentWindow != "undefined" ? parentWindow['parent'] : window.parent;
                var pageUrlRef = parentWindow.location.href;
                if(pageUrlRef == "about:blank"){
                    resolvePageURL();
                } else if(pageUrlRef != ""){
                    currPageURL = pageUrlRef;
                }
            } catch(e){
                console.log("Error in getting the pageURL from resolvePageURL(): " + e);
            }
        }
        if(jvx_5f719d32df2bbTraffickedInFrame){
                        try{
                currPageURL = top.window.location.href;
            } catch(e){
                                console.log("Error in getting the pageURL from getPageURL(): " + e);
                resolvePageURL();
            }
        } 
				return currPageURL;
	}
	
	/**
     * Helper that takes object literal
     * and returns the object after removing blank values
     * @param {Object} sourceObj
     */
	function deleteBlankAttr(sourceObj){
		for (var i in sourceObj) {
			  if (sourceObj[i] == "" || sourceObj[i] == "undefined") {
				delete sourceObj[i];
			  }
			}
		return sourceObj;	
	}
	
	/**
     * Helper that takes object literal
     * and add all properties to element.style
     * @param {Element} node
     * @param {Object} styles
     */
    function addStyles(node, styles){
		if(!isEmpty(styles)){
			styles = deleteBlankAttr(styles);
			var fChar = "",
			nodeCSS = node.style.cssText;	
			if(nodeCSS){
				fChar = " ";
				if(nodeCSS[nodeCSS.length-1] != ";"){
				  nodeCSS += ";";	// For IE8 and less
				}
			}
			for (var name in styles) {
			  if(styles.hasOwnProperty(name)){
				  nodeCSS += fChar +name+ ": " +styles[name]+ ";";
			   }
			}
			if(nodeCSS) node.style.cssText = nodeCSS.toString();
		}
	}

	/**
     * Helper that takes object literal
     * and remove all properties to element.style
     * @param {Element} el
     * @param {Object} styles
     */
    function removeStyles(el, styles){
		if(!isEmpty(styles)){
		//	styles = deleteBlankAttr(styles);
			for (var name in styles) {
				if(styles.hasOwnProperty(name)){
					el.style[name] = '';
				}
			}
		}	
    }
	
	/**
     * Helper that creates a Div component with the Id passed 
     * and add default CSS class, innerText and extra styles to the component 
	 * and then append the component to the main element
     * @param {Main element to which new node has to appended } mainEl
	 * @param {Id for the new node} nodeId
	 * @param {default CSS class name to be added} className
	 * @param {innerText to the node} text
	 * @param {Object - styles to be added to the node} styleObj
     */
	function addDivComponent(mainEl, nodeId, className, text, styleObj)
	{
		var node = createDivNode(nodeId);
		node.innerHTML = text;							
		if(className != '')
			addClass(node, className);					
		if(!isEmpty(styleObj))
			addStyles(node, styleObj);
		return mainEl.appendChild(node);
	}
	
	function setAttributes(el, attrs)
	{
		for(var key in attrs) {
			el.setAttribute(key, attrs[key]);
		}
	}
	
	function getBrowserPrefix(browserName){
		var prefix = "";
		if(!isEmpty(browserName)){
			if((browserName == 'Chrome') || (browserName == 'Safari') || (browserName == 'iPhone') || (browserName == 'iPod') || (browserName == 'iPad'))
				prefix = "webkit";
			else if(browserName == 'Firefox')
				prefix = "moz";
			else if(browserName == 'Internet Explorer')
				prefix = "ms";
			else if(browserName == 'Opera')
				prefix = "o";
			else{
							}	
		}
		return prefix;
	}
	
	function getBrowserWindowProps() {
        var browserWidth = 0, browserHeight = 0;
		var doc = document,
			docElem = doc && doc.documentElement,
			docBody = doc && doc.body;
						
		 if(typeof (window.innerWidth) == 'number') {
			// For checking non-IE browsers Mozilla, Safari, Opera, Chrome.
			browserWidth = window.innerWidth;
		}
				//All IE except version 4
		else if (docElem && docElem.clientWidth) {
            browserWidth = docElem.clientWidth;
        }
				//IE 4
        else if (docBody && docBody.clientWidth) {
			 browserWidth = docBody.clientWidth;
		}
		
		 if(typeof (window.innerHeight) == 'number') {
			// For checking non-IE browsers Mozilla, Safari, Opera, Chrome.
			browserHeight = window.innerHeight;
		}
				//All IE except version 4
		else if (docElem && docElem.clientHeight) {
            browserHeight = docElem.clientHeight;
        }
				//IE 4
        else if (docBody && docBody.clientHeight) {
			 browserHeight = docBody.clientHeight;
		}
		
        return [browserWidth, browserHeight];
    };
	
	function getCenterAlignXY(objWidth,objHeight){ 
		var winPos = getBrowserWindowProps(),
			objX = '';
		if(window.innerWidth == document.documentElement.clientWidth) {
			objX = (winPos[0] - objWidth) / 2 ;
		} else {
			var scrollWidth = window.innerWidth - document.documentElement.clientWidth;
			objX = ((winPos[0]- scrollWidth) - objWidth) / 2 ;
		}	
		 var objY = (winPos[1] - objHeight) / 2 ;
		 		 objX = (objX < 0) ? 0 : objX;
		 		 objY = (objY < 0) ? 0 : objY;
		 return [objX,objY];
	}
	
	function isEmpty(obj) {
		
		// null and undefined are "empty"
		if (obj == null) return true;

		// Assume if it has a length property with a non-zero value
		if (obj.length === 0)  return true;
		if (obj.length && obj.length > 0)    return false;

		for (var key in obj) {
			if (Object.prototype.hasOwnProperty.call(obj, key)) return false;
		}
		return true;	
	}
	/* Function used to create an event manually with the help of CustomEvent constructor for the 'evtName' */
	function createCustomEvent(evtName){
		var event = null;
		if (typeof CustomEvent === 'function') {
			event = new CustomEvent(evtName)
		} else {	// For IE browser
			event = document.createEvent("CustomEvent");
			event.initCustomEvent(evtName, false, false, '');
		}
		if(!event) return;
		return event;
	}
	
		
	function fireTracker(url){
		var imgEl = document.createElement('img');
		var finalURL = "";
		if(!url.match("http://evs.jivox.com/jivox/serverAPIs/saveImpression.php")){
			var replaceCacheBuster0 = url.replace('[timestamp]', Math.random()); 
var replaceCacheBuster1 = replaceCacheBuster0.replace('[randomNumber]', Math.random()); 
var replaceCacheBuster2 = replaceCacheBuster1.replace('{cacheBuster}', Math.random()); 
var replaceCacheBuster3 = replaceCacheBuster2.replace('{RANDOMNUM}', Math.random()); 
var replaceCacheBuster4 = replaceCacheBuster3.replace('%%CACHEBUSTER%%', Math.random()); 
finalURL = replaceCacheBuster4;			//finalURL = replaceCacheBuster;
		}else{
			if(url.indexOf("?") == -1){
				finalURL = url + "?r=" + Math.random();
			}else{
				finalURL = url + "&r=" + Math.random();
			}
		}
					if(typeof jvx_5f719d32df2bb != 'undefined'){
				finalURL += "&es_cgName_"+jvx_5f719d32df2bb.DYReportingKey;
                if(jvx_5f719d32df2bb.DYSegmentName != ""){
                    finalURL += "&es_segName_"+jvx_5f719d32df2bb.DYSegmentName;
                }
			}
				imgEl.src = finalURL;
			}       

	function setStylesFromStr(node, styleStr){
		if(styleStr == ''){
			return;
		}
		var splittedStyles = styleStr.split(";");
		var stylesLen = splittedStyles.length;
		if(stylesLen < 1){
			return;
		}
		for(var i=0;i<stylesLen;i++){
			var splittedRule = splittedStyles[i].split(":");
			if(splittedRule.length < 2){
				continue;
			}
			var prop = splittedRule[0];
			var val = splittedRule[1];
			node.style[prop] = val;
		}
	}

	function setOpacity(myElement, opacityValue) {
		if(typeof myElement.style.opacity !== 'undefined'){
			myElement.style.opacity = opacityValue/100; // Gecko/Opera
		} else {
			myElement.style.filter = "alpha(opacity="
				 + opacityValue + ")"; // IE			
		}
	}
		function setCloseBtnProp(btnSize){
		var prop = {};
		prop.width = btnSize;
		prop.height = btnSize - 1;
				prop.size = (btnSize < 20) ? btnSize - 3 : btnSize - 2;
		prop.lHeight = (btnSize < 20) ? btnSize - 3 : btnSize - 5;
				return prop;
	}
			function alignAdUnitContainer(sfLeft, sfTop){
		var cLeft = sfLeft + "px",
			cTop = sfTop + "px",
			cNode = getElById(jvx_5f719d32df2bb.adUnitContainerId);
		addStyles(cNode, {"left":cLeft, "top":cTop});
	}
	function renderAdInsideSafeFrame(animDir){
		if(jvx_5f719d32df2bbSafeFrameSupported){
			/* ------------- SafeFrame Settings--------------- */
						var ref = jvx_5f719d32df2bb,
				safeFrameExpX = ref.expansionWidth - ref.baseWidth,
				safeFrameExpY = ref.expansionHeight - ref.baseHeight,
				sfTop = parseInt('0'),
				sfLeft = parseInt('0'),
				sfX = parseInt(safeFrameExpX),
				sfY = parseInt(safeFrameExpY);
				
			if(sfTop < 0){
				// expansion to come from above base
				sfTop = -(sfTop);
			}else{
				// expansion to come from base level
				sfY = sfY + sfTop;
				sfTop = 0;
			}
			if(sfY < 0) sfY = 0;	// doesn't need to reduce the height of the safeframe iframe
			try{
									if(animDir == "SlideRight" || animDir == "DiagonalTopLeft" || animDir == "SlideBottom"){
						$sf.ext.expand({t:sfTop, l:0, b:sfY, r:sfX}, 0, false);
					} else {
						$sf.ext.expand({t:sfTop, l:sfX, b:sfY, r:0}, 0, false);
											}
							}catch(e){
							}
			/* ------------- End ------------- */
		}
	}
		function findPos(obj){
		var curleft = 0;
		var curtop = 0;
		var pageY = 0;
		var pageX = 0;
	 /* var rect = obj.getBoundingClientRect();
		curleft = rect.left;
		curtop =  rect.top; */
		if (obj.offsetParent) {
			do{
				curleft += obj.offsetLeft;
				curtop += obj.offsetTop;
			}while (obj = obj.offsetParent);
		}
		
		if(!isNaN(window.pageYOffset)) {
			pageX = window.pageXOffset;
			pageY = window.pageYOffset;
		} else {
			pageY=document.body.scrollTop || document.documentElement.scrollTop;
			pageX=document.body.scrollLeft || document.documentElement.scrollLeft;
		}
		return [curleft,curtop,pageX,pageY];
	}
		function expandFromVP(expObj){
		var vpStyles = findPos(getElById(jvx_5f719d32df2bb.adUnitContainerId)),
			vpTop = "", vpLeft = "";
				var centerAlign = getCenterAlignXY(expObj.expWidth, expObj.expHeight);
		vpTop = parseInt(vpStyles[3]);
		if(expObj.animationDirection == "SlideLeft" || expObj.animationDirection == "SlideInRight"
		 || expObj.animationDirection == "DiagonalTopRight" || expObj.animationDirection == "SlideInDiagonalRight"
		 || (expObj.expansionOpen && (expObj.animationDirection == "SlideBottom" || expObj.animationDirection == "SlideInTop"))){
		 
			vpLeft = parseInt(centerAlign[0]) + parseInt(expObj.expWidth);
		}else{
			vpLeft = parseInt(centerAlign[0]);
		}
				
		return [vpLeft, vpTop];
	}
			// return CSS styles array for expansion unit animation
	function createStyleObject(obj){
		var transL = "", transT = "", transB = "", transR = "",
			overflowVal = "", transPos = "",
			transStr = "all "+ obj.animationSpeed +"s linear",
			transW = obj.expWidth + "px", 
			transH = obj.expHeight + "px",
			bLeft = Math.round(obj.baseBox.left),
			bTop = Math.round(obj.baseBox.top),
			expTopOffset = parseInt("0"),
			expLeftOffset = parseInt("0");
									transPos = "absolute";
							
				
				overflowVal = "hidden";
				
		switch(obj.animationDirection){
			case "SlideLeft":
			case "SlideInRight":
			case "DiagonalTopRight":
			case "SlideInDiagonalRight":
			case "DiagonalBottomRight":
			case "SlideBottom":
			case "SlideInTop":
				if(obj.animationDirection == "DiagonalTopRight" || obj.animationDirection == "SlideInDiagonalRight"
					|| obj.animationDirection == "DiagonalBottomRight"){
										transW = "0px";
					transH = "0px";
				} else if(obj.animationDirection == "SlideBottom" || obj.animationDirection == "SlideInTop"){
										
					transH = "0px";
										transStr = "height "+ obj.animationSpeed +"s linear";
										
									} else {
										transW = "0px";
					transStr = "width .5s linear, left .5s linear";
				}
				if(!obj.preStyleExpansion){
										var width = obj.bWidth;
					if(!obj.expansionOpen && (lastAnimDir == "SlideRight" || lastAnimDir == "DiagonalTopLeft") && (obj.animationDirection == "SlideInRight" || obj.animationDirection == "SlideInDiagonalRight")){
						if(obj.expWidth != obj.bWidth){
							width = obj.expWidth;
						}
					}
					if(obj.insertExpansionTo != "adUnitContainer"){
						var left = "";
						if(!obj.alignToVP){
							if(!obj.expansionOpen && (obj.animationDirection == "SlideBottom" || 
														obj.animationDirection == "SlideInTop")){
								left = "";
							} else {
								left = parseInt(bLeft) + width;
								transL = left - expLeftOffset + "px";
							}
						} else {
							if(!obj.expansionOpen && (obj.animationDirection == "SlideBottom" ||
																				obj.animationDirection == "SlideTop")){

								left = parseInt(bLeft);
							}else{
								if(obj.animationDirection != "SlideBottom" && obj.animationDirection != "SlideInTop")
									left = parseInt(bLeft) + width;
								else
									left = parseInt(bLeft);
							}
							transL = left - expLeftOffset + "px";
						}
						var winDim = getBrowserWindowProps();
																		transT = bTop + expTopOffset + 'px';
																	} else {
												var left = "";
						if(!obj.alignToVP){
							if(!obj.expansionOpen && obj.animationDirection == "SlideBottom" ||
														obj.animationDirection == "SlideInTop"){
							//	left = "";
							} else {
								left = width;
								transL = left - expLeftOffset + "px";
							}
						} else {
							if(!obj.expansionOpen && (obj.animationDirection == "SlideBottom" ||
																				obj.animationDirection == "SlideInTop")){
							//	left = "";
							} else {
								if(obj.animationDirection != "SlideBottom" && obj.animationDirection != "SlideInTop"){
									left = width;
									transL = left - expLeftOffset + "px";
								}
							}	
						}
												
												transT = expTopOffset + 'px';
											}
									}
				break;
			case "SlideRight":
			case "SlideInLeft":
			case "DiagonalTopLeft":
			case "SlideInDiagonalLeft":
			
				if(obj.animationDirection == "DiagonalTopLeft" || obj.animationDirection == "SlideInDiagonalLeft"){
										transW = "0px";
					transH = "0px";
				} else if(obj.animationDirection == "SlideRight" || obj.animationDirection == "SlideInLeft"){
																transW = "0px";
						transStr = "width "+ obj.animationSpeed +"s linear";
									} else if(obj.animationDirection == "SlideBottom" || obj.animationDirection == "SlideInTop"){
										
					transH = "0px";
										transStr = "height "+ obj.animationSpeed +"s linear";
										
									}
				
				if(!obj.preStyleExpansion){
										var el = getElById(obj.expContainerId);
					if(obj.insertExpansionTo != "adUnitContainer"){
																					var left = (el.style.left) ? parseInt(el.style.left) : parseInt(bLeft);
																			
												transL = left - expLeftOffset + "px";
												transT = bTop + expTopOffset + 'px';
					} else {
																					var left = (el.style.left) ? parseInt(el.style.left) : parseInt(bLeft);
																									transL = left - expLeftOffset + 'px';
												transT = expTopOffset + 'px';
					}
									}
				break;
			case "Center":
								var startDim = 	getCenterAlignXY(0, 0);
				transW = "0px";
				transH = "0px";
								transL = parseInt(startDim[0]) + expLeftOffset + "px";
								transT = parseInt(startDim[1]) + expTopOffset + "px";
				break;
			case "SlideTop":
			case "SlideInBottom":
								transH = "0px";
								break;
			default:
								break;	
		}
		
				
				
				
		if(0){
			transB = 0 + expTopOffset + "px";
			transT = "";
		}
		var browserPrefixTransParam = "-" + obj.browserPrefix + "-transition",
			browserPrefixParam_1 = "-" + obj.browserPrefix + "-perspective",
			browserPrefixParam_2 = "-" + obj.browserPrefix + "-backface-visibility";
			
		/* Creating style object */	
		var styleObj = {
					'overflow'				: overflowVal,
					'width'					: transW,
					'height'				: transH,
					'top'					: transT,
					'left'					: transL,
					'bottom'				: transB,
					
					'transition'					: transStr,					
					'position'				: transPos
				};
		
				
				styleObj[browserPrefixTransParam] = transStr;
		styleObj[browserPrefixParam_1] = 1000;
		styleObj[browserPrefixParam_2] = "hidden";
				lastAnimDir = obj.animationDirection;
		return styleObj;
	}
	
		
		
		
		
	
	function mraidHandleOnViewable(viewable){
		jvxMraidIsShown = viewable;		 
			if(!jvxMraidIsShown || getElById(jvx_5f719d32df2bb.baseContainerId)){
				return; 
			}
		jvx_5f719d32df2bb.init();
		handleMraidViewableImprFiring();
	}
	
	function mraidHandleViewableChange(viewable){
		mraidHandleOnViewable(viewable);
	}

	//fire viewable impression 
	function handleMraidViewableImprFiring(){
		if (!adInVPForOneSec && !timerRunning) {
			timerRunning = true;
			var timeoutHandle = setTimeout(function () {
				adInVPForOneSec = true;
				jvx_5f719d32df2bb.recordEvent(74);
			}, 1000);
		}
	}

	function validateVal(val){
		return (val == undefined || val == "" || val == 0) ? false : true; 
	};

	/**
	 * Constructor Function / Class for the Creative Unit
	 */
	function CreativeUnit(uniqId){

	    this.id = uniqId;  
		this.playerParamsMap = {"reportingURL":"https:\/\/evs.jivox.com","creativeUnitType":"22","bDim":"300x600","bUnitId":"2200","siteId":"65c616660e0b0a","campaignId":"128974","es_pId":"63E14k","isDynamic":"1","ap_DataSignal1":"40582625","ap_DataSignal2":"ABAjH0jkoUcVSP6Wxi9RTnFFP7FG","ap_DataSignal3":"257913009","ap_DataSignal4":"11395931134","jvxVer":"2","cMacro":"https:\/\/googleads.g.doubleclick.net\/dbm\/clk?sa=L&ai=CJPDjJZ1xX_f2FamkzAbL3LTwDau_vapeoru1_bEL8O7_65ACEAEg08vOMGDV5dICoAGA7P2-AsgBCakCcta2SU-Dsz6oAwGqBNkBT9AGCQUvgfXdFJ9VZ5YlA9A4IvcI09KlHAI3eTVuWKoWUMliKTEl-m6PfsNsk6C_7aoeOQbRJFARYMPu0jtdZNtZrSne5qHjS0rFNnQYPfAb8fHYxfDLtLqcV5BrSIKNUePu8QhjNFB0ZUXKV_dfzqZ_pj1wKkZurKDRvtsv8eToKbC_r-YVSTiuVxRNaftOnbAh8lOnRQ0br_Z-lqoOm7BzfInTsUrBnwtxaibJ3xqzY2QtLs5Lrn8DV6Qf-o27ljvuhyfrrSvEFk_xoaYp7ViCCzwIGCQOZMAE54ibroID4AQDkAYBoAZNgAfok4LBAYgHAZAHAqgHjs4bqAfVyRuoB5PYG6gHugaoB_DZG6gH8tkbqAfs1RuoB6a-G6gH7NUbqAfz0RuoB5bYG6gHwtob2AcA0ggJCICAgBAQAhgN8ggbYWR4LXN1YnN5bi01NDQ0Nzg2MTkxMTcwMDA2gAoDmAsByAsBgAwBsBOAis0J0BMA2BMN2BQB&ae=1&num=1&cid=CAMSeQClSFh315iMKx2hflFO6ogmsQsnGxXrL9iY5iLW7zIAdNySeC4mTxCLPhePL1Old6LY6bep8zVC8yETO6mA3APLPkfvBXP7x9rPtaxEWcRIOInDLW290T3rGZcG6GaSZMvnODe8eoHcOpicOtXZKCAao1FRRZvUkXE&sig=AOD64_3xkpbmKd2S8ZCZwBe_wCQ5omhY1Q&client=ca-pub-5884294479391638&dbm_c=AKAmf-AcOU1x_Ri5Jdnhq4z54Lyy45eICfyqSdoUlnpYrI96uPNHyZ2nqVZBFd6NrZFjhuA2hCH2j5Tq0wYumlpVt4nd2sZtqEGEBkwP2hglLyd2MOVMQU2sDuwRXlWwg6EMffCCAJHpPAjR2KRfDE92xRtd9GVHOw&dbm_d=AKAmf-CEAYu8rO06Rnnn63Pg0JJy06rE_18KdcOA6oGEw6_QieI2EkKVZ8mr9G7Zhv3CXDKu5JvqZVMeyQAax2h2sJ6ZOqG--1kvUnRiaqoG2pxXT5DQD4trcsDG_g-1NMqOOAdOY3gdx8ozAFgHBev-tShKi-dAO-0N-jpYIa7ixRHcL2AHzDuvdnMS0h2XHD_vWeLNTpcnyngq8cIIQ8v5Q5Wopw1HxF89LNqKkEx0UtXuYt8Js8ToJi1cqt80noQ8ncdFpx_jpxpDFsIahg6WfIsPidMKy_TtLZ640imKgYT_IxxTe1mGsCmsDoLVmMgOb_Sxh1la_7Mgxsm8YNYHrMJUwUQnowVXZa6nUZdqKrV-6cV05zp4I7z7ypiDV8lqQuwbITFfhgwLtXmEoJMJ_d3T55TLVudMKK1Tu60EFIaofAtnOFIWS8QbOIwYp83vrEpI9vMPcZRnXu6LEMlaly7RRSDb-8veN1Kjuot_ueg1MfuezB3l56naSy1dXpxzCiRnkIRGNEDXTo42UcRFHfn-hEmNgNFKEgxyFywaVWUwJhz4kOOdhoUcQvxdpJL3Z3QvyIYs&adurl=","r":"1601281317359287","removeClickParams":"1","serverURL":"https:\/\/as.jivox.com"};
		this.campaignId = '128974';
		this.siteId = '65c616660e0b0a';
		this.placementId = '63E14k';
		this.creativeUnitType = '22';
		this.baseDim = '300x600';
		this.expDim = '';
				this.asyncTaskList = {};
		this.asyncTaskCount = 0;
		this.asyncCompletedTaskCount = 0;
					this.asyncTaskList['custom-pre-processing'] = 0;
			this.asyncTaskCount++;
								
                        this.apParamsArr = {"ap_DataSignal1":"40582625","ap_DataSignal2":"ABAjH0jkoUcVSP6Wxi9RTnFFP7FG","ap_DataSignal3":"257913009","ap_DataSignal4":"11395931134"};
        this.apParamsInEventFormat = "";
						this.browserName = 'Chrome';
		this.browserVersion = '85.0.4183.121';
								
		this.adUnitContainerId = 'adUnitContainer' + uniqId;
		this.adUnitContainerWrapperId = 'adUnitContainerWrapper' + uniqId;
		this.baseContainerId = 'baseContainer' + uniqId;
		this.baseId = 'jvxBase' + uniqId;
		this.base2Id = 'jvxBase' + uniqId + '0';
		this.baseCloseId = 'baseClose' + uniqId;
		this.baseBgId = 'baseBg' + uniqId;
		this.baseBg2Id = 'baseBg' + uniqId + '0';
		this.expansionContainerId = 'expansionContainer' + uniqId;
		this.expansionId = 'expansion' + uniqId;
		this.expansion2Id = 'expansion' + uniqId + '0';
		this.expansionBgId = 'expansionBg' + uniqId;
		this.logContainerId = 'logContainer' + uniqId;
		this.closeExpansionId = 'closeExpansion' + uniqId;
		this.expansionLoaderId = 'expansionLoader' + uniqId;
		this.baseInterceptorId = 'baseInterceptor' + uniqId;
		this.expInterceptorId = 'expInterceptor' + uniqId;
		this.base2InterceptorId = 'baseInterceptor' + uniqId + '0';
		this.maskId = 'mask' + uniqId;
        this.fixedPageBgId = 'fixedPageBg' + uniqId;
		this.loaderId = 'loader' + uniqId;
		this.iBusterFrame = null;
		/*Smooth responsive and stretch variables*/
				this.baseType = 'html';
		this.baseHasLayout = '1';
		this.baseURL = 'https://as.jivox.com/unit/layout_renderer.php?creativeUnitType=22&bDim=300x600&bUnitId=2200&siteId=65c616660e0b0a&campaignId=128974&es_pId=63E14k&isDynamic=1&ap_DataSignal1=40582625&ap_DataSignal2=ABAjH0jkoUcVSP6Wxi9RTnFFP7FG&ap_DataSignal3=257913009&ap_DataSignal4=11395931134&jvxVer=2&cMacro=https%3A%2F%2Fgoogleads.g.doubleclick.net%2Fdbm%2Fclk%3Fsa%3DL%26ai%3DCJPDjJZ1xX_f2FamkzAbL3LTwDau_vapeoru1_bEL8O7_65ACEAEg08vOMGDV5dICoAGA7P2-AsgBCakCcta2SU-Dsz6oAwGqBNkBT9AGCQUvgfXdFJ9VZ5YlA9A4IvcI09KlHAI3eTVuWKoWUMliKTEl-m6PfsNsk6C_7aoeOQbRJFARYMPu0jtdZNtZrSne5qHjS0rFNnQYPfAb8fHYxfDLtLqcV5BrSIKNUePu8QhjNFB0ZUXKV_dfzqZ_pj1wKkZurKDRvtsv8eToKbC_r-YVSTiuVxRNaftOnbAh8lOnRQ0br_Z-lqoOm7BzfInTsUrBnwtxaibJ3xqzY2QtLs5Lrn8DV6Qf-o27ljvuhyfrrSvEFk_xoaYp7ViCCzwIGCQOZMAE54ibroID4AQDkAYBoAZNgAfok4LBAYgHAZAHAqgHjs4bqAfVyRuoB5PYG6gHugaoB_DZG6gH8tkbqAfs1RuoB6a-G6gH7NUbqAfz0RuoB5bYG6gHwtob2AcA0ggJCICAgBAQAhgN8ggbYWR4LXN1YnN5bi01NDQ0Nzg2MTkxMTcwMDA2gAoDmAsByAsBgAwBsBOAis0J0BMA2BMN2BQB%26ae%3D1%26num%3D1%26cid%3DCAMSeQClSFh315iMKx2hflFO6ogmsQsnGxXrL9iY5iLW7zIAdNySeC4mTxCLPhePL1Old6LY6bep8zVC8yETO6mA3APLPkfvBXP7x9rPtaxEWcRIOInDLW290T3rGZcG6GaSZMvnODe8eoHcOpicOtXZKCAao1FRRZvUkXE%26sig%3DAOD64_3xkpbmKd2S8ZCZwBe_wCQ5omhY1Q%26client%3Dca-pub-5884294479391638%26dbm_c%3DAKAmf-AcOU1x_Ri5Jdnhq4z54Lyy45eICfyqSdoUlnpYrI96uPNHyZ2nqVZBFd6NrZFjhuA2hCH2j5Tq0wYumlpVt4nd2sZtqEGEBkwP2hglLyd2MOVMQU2sDuwRXlWwg6EMffCCAJHpPAjR2KRfDE92xRtd9GVHOw%26dbm_d%3DAKAmf-CEAYu8rO06Rnnn63Pg0JJy06rE_18KdcOA6oGEw6_QieI2EkKVZ8mr9G7Zhv3CXDKu5JvqZVMeyQAax2h2sJ6ZOqG--1kvUnRiaqoG2pxXT5DQD4trcsDG_g-1NMqOOAdOY3gdx8ozAFgHBev-tShKi-dAO-0N-jpYIa7ixRHcL2AHzDuvdnMS0h2XHD_vWeLNTpcnyngq8cIIQ8v5Q5Wopw1HxF89LNqKkEx0UtXuYt8Js8ToJi1cqt80noQ8ncdFpx_jpxpDFsIahg6WfIsPidMKy_TtLZ640imKgYT_IxxTe1mGsCmsDoLVmMgOb_Sxh1la_7Mgxsm8YNYHrMJUwUQnowVXZa6nUZdqKrV-6cV05zp4I7z7ypiDV8lqQuwbITFfhgwLtXmEoJMJ_d3T55TLVudMKK1Tu60EFIaofAtnOFIWS8QbOIwYp83vrEpI9vMPcZRnXu6LEMlaly7RRSDb-8veN1Kjuot_ueg1MfuezB3l56naSy1dXpxzCiRnkIRGNEDXTo42UcRFHfn-hEmNgNFKEgxyFywaVWUwJhz4kOOdhoUcQvxdpJL3Z3QvyIYs%26adurl%3D&r=1601281317359287&objectName=jvx_5f719d32df2bb&adUnitId=2200&jvxSessionId=1601281330.6717';
        			this.baseURL += '&base=1';
            this.baseURL += '&creativeResolveBeginTime='+Date.parse(creativeResolveBeginTime);
            		        this.baseBgType = 'image';
		this.baseBgURL = '';
		this.baseBgColor = '';
		this.baseFallbackType = '';
		this.baseFallbackURL = '';		
		this.baseFallbackFileName = '';
		this.baseFallbackWidgetSrc = '';
        this.baseWidth = '300';
		this.baseHeight = '600';
                        this.origBaseWidth = '300';
        this.origBaseHeight = '600';
        		this.baseCloseRight = '0';
		this.baseBehaviourId = '0';
		this.behaviourId = '1';
		this.behaviourName = '0x0 Expansion';
        this.insertAdUnitContainerTo = 'slot';
        this.insertAdUnitContainerAs = 'fc';
        this.insertBaseTo = 'adUnitContainer';
        this.insertBaseAs = 'fc';
						var pageURL = getPageURL();
		this.encodedPageURL = encodeURIComponent(pageURL);
				//check the current state of the expansion
		this.expansionOpen = false;
		//check whether the expansion has really opened
		this.expansionHasOpened = false;
		//make sure openExpansionComplete msg is fired only once, because openExpComplete was getting fired incase of orientationchange(css transition was happening in this case)
		this.postOpenExpCompMsg = true;
						
			
						
				this.storeTransitionEndEvt = {};
		this.autoExpandTimerRef = null;
		this.autoCollapseTimerRef = null;
		this.timeSpentOnAd = 0;
				this.UIRTimer = null;
		this.UIRRecorded = false;
		this.DwellTimer = null;
		this.DwellRecorded = true;
		this.DwellElapsedTimer = null;
		this.DwellElapsedTime = 0;
							//	this.sfCollapseFirst = false;
										this.openExpAgain = false;
						this.raiseCMacroFlag = false;
										
			}

	/*
	Prototype object of the CreativeUnit. Add methods / properties to this so that they get shared 
	among all objects created out of this class but at the same time it's created only once.
	*/
	CreativeUnit.prototype = {
		constructor:CreativeUnit,
						         addScriptTagToBody: function(srcLink){
	         var script = document.createElement('script');
	         script.src = srcLink;
	         document.body.appendChild(script);
         },
         sendCookieRequest: function(cookieName){
	        if(jvx_5f719d32df2bbSafeFrameSupported){
		         var callBackFnName ='jvx_5f719d32df2bb'+".updateDYProperties";
		         jvx_5f719d32df2bb.addScriptTagToBody('https://as.jivox.com'+"/unit/getCookies.php?cookieName="+cookieName+"&callback="+callBackFnName+"&deleteCookie="+1+"&r_="+Math.random());  
	         }                  
         },
         updateDYProperties: function(val,isNotCookieData){
            if(!val) return;
            if(isNotCookieData != 1) var val = JSON.parse(val);
            var dynPropArr = val.split("|");
            jvx_5f719d32df2bb.DYReportingKey = dynPropArr[0] ? decodeURIComponent(dynPropArr[0]) : "";
            jvx_5f719d32df2bb.DYSegmentName = dynPropArr[1] ? decodeURIComponent(dynPropArr[1]) : "";
            //this.fireCREvent();
         },
						fireCreativeLoadedEvent: function(eventSrc){
			var doFireCreativeLoadEvt = (eventSrc.id == this.baseId) || (this.baseDim == "" && eventSrc.id == this.expansionId);
			if(doFireCreativeLoadEvt){
				var creativeLoadEndTime = new Date();
				var creativeLoadElapseTime = Math.round((creativeLoadEndTime - creativeResolveBeginTime)/1000);
				jvx_5f719d32df2bb.recordEvent(72, 'es_et=' + creativeLoadElapseTime);
			}
		},
		onLoadEventHandler:function(event){
			var eventSrc = event.target || event.srcElement;
			if(eventSrc != 'undefined' && eventSrc != null){
				this.fireCreativeLoadedEvent(eventSrc);
								               	
                    if(jvx_5f719d32df2bbSafeFrameSupported){
                        var getReportingKeyFromCookie = false,
                            baseAndExpHasLayout = (this.baseHasLayout == 1 && this.expansionHasLayout == 1),
                            elId = eventSrc.id;
                            if(baseAndExpHasLayout){
                                if(elId.indexOf("jvxBase_") != -1){
                                    getReportingKeyFromCookie = true;
                                }
                            } else {
                                if(elId.indexOf("jvxBase_") != -1 && this.baseHasLayout == 1){
                                    getReportingKeyFromCookie = true;
                                }else if(elId.indexOf("expansion_") != -1 && this.expansionHasLayout == 1){
                                    getReportingKeyFromCookie = true;
                                }
                            }
                            if(getReportingKeyFromCookie){
                                jvx_5f719d32df2bb.sendCookieRequest('jvx_5f719d32df2bb'+"_dynamicProperties");
                            }
                    }
                											}	
		},
						restyleExpansion:function(){
			var that = this,
				expEl = getElById(this.expansionContainerId),
				offLeft = parseInt(0),
				offTop = parseInt(0);
				
			var getCoords = function(){
				var baseBox = "";
				baseBox = that.getAdUnitBox();
				return baseBox;
			};
										if(this.expansionOpen){
					var box = getCoords();
					var newLeft = "", newTop = "";
					if(this.insertExpansionTo != 'adUnitContainer'){
						if(this.expAnimDir == "DiagonalTopRight" || this.expAnimDir == "SlideLeft" ||
							this.expAnimDir == "SlideBottom" || this.expAnimDir == "SlideTop"){
							
							newLeft = Math.round(box.left) - (parseInt(this.expansionWidth) - parseInt(this.baseWidth)) - offLeft;
						} else {
							newLeft = Math.round(box.left) + offLeft;
						}
						newTop = Math.round(box.top) + offTop;
					}else{
						if(this.expAnimDir == "DiagonalTopRight" || this.expAnimDir == "SlideLeft" ||
							this.expAnimDir == "SlideBottom" || this.expAnimDir == "SlideTop"){
							
							newLeft = parseInt(this.expansionWidth) - parseInt(this.baseWidth) + offLeft;
							newLeft = "-" +newLeft+ 'px';
						} else {
							newLeft = offLeft;
						}
						newTop = offTop;
					}
										addStyles(expEl, {'left': newLeft + 'px', 'top': newTop + 'px'});
				} else {
					this.preStyleExpContainer();
				}
					},
						        renderBase:function(responsive){
			if(this.asyncTaskCount > 0){
								if(this.asyncTaskCount > this.asyncCompletedTaskCount){
					return;
				}
			}
                        if(this.baseHasLayout == 1){
               if(!this.dmpDSValue && !this.cJsExecuted) return;
                        }
                        if(responsive) {
				var baseContainerNode = getElById(this.baseContainerId);
				baseContainerNode.style.backgroundColor = this.baseBgColor;
				var cNode = getElById(this.adUnitContainerId);
				if(cNode != null) {
					// Reset width and height for base container
					cNode.style.width = this.baseWidth + 'px';
					cNode.style.height = this.baseHeight + 'px';
				}
								var bNode = getElById(this.baseId);
				var b2Node = getElById(this.base2Id);
				if(bNode != null) {
					var iframeNode = (bNode.nodeName.toLowerCase() == "iframe") ? bNode : b2Node;
					var imgNode = (bNode.nodeName.toLowerCase() == "img") ? bNode : b2Node;
										if(this.baseType == "html" && iframeNode != null) {
						iframeNode.style.display = 'block';
						if(imgNode != null) {
							imgNode.style.display = 'none';
						}
						 
						iframeNode.width = this.baseWidth;
												iframeNode.height = this.baseHeight;
						if(this.baseHasLayout == 1){
							// Layout renderer should render new layout						
							/*Smooth responsive and stretch variables*/
															postHtml5Message(iframeNode, 'reRenderLayout');
								setTimeout(function(){
                                	postHtml5Message(iframeNode, 'activateScene');
                                },1);
													} else {
							// html banner
							iframeNode.src = this.baseURL;
						}
						
												return;
					} 
										else if(this.baseHasLayout != 1 && imgNode != null) {
						imgNode.style.display = 'block';
												if(iframeNode != null) {
							iframeNode.style.display = 'none';
							//Layout renderer should pause all the activities like video
							postHtml5Message(iframeNode, 'pauseInteraction');
							postHtml5Message(iframeNode, 'deActivateScene');
						}
												 
						imgNode.width = this.baseWidth;
												imgNode.height = this.baseHeight;
						imgNode.src = this.baseURL;
												return;
					} else {
						var origBaseId = this.baseId;
						this.baseId = this.base2Id;
					}
				}
			}
			var that = this;
			var baseHTMLStr = this.getBase();
			var baseNode = toElement(baseHTMLStr);
			var baseContainerNode = getElById(this.baseContainerId);
			baseContainerNode.appendChild(baseNode);
									addEvent(getElById(this.baseId), "load", function(event){ that.onLoadEventHandler(event); }, false);
						if(this.baseId == this.base2Id) {
				//Reset baseId to original value
				this.baseId = origBaseId;
				//Set style for baseNode
				var baseNode = getElById(this.baseId);
				baseNode.style.position = 'absolute';
				baseNode.style.display = 'none';
				if(bNode.nodeName.toLowerCase() == "iframe") {
					//Layout renderer should pause all the activities like video
					postHtml5Message(bNode, 'pauseInteraction');
					postHtml5Message(bNode, 'deActivateScene');
				}
				//Set style for base2Node
				var base2Node = getElById(this.base2Id);
				base2Node.style.position = 'absolute';
				base2Node.style.display = 'block';
				//Add load event handler
				addEvent(getElById(this.base2Id), "load", function(event){ that.onLoadEventHandler(event); }, false);
			}
					},
        getBase:function(){
			var baseType = this.baseType;
			var str = "";
			switch(baseType){
				case "image":
					str = this.getBaseImage();
					break;
								case "html":
					str = this.getBaseHTML();
					break;
				default:
					break;
			}
			return str;
		},
		getBaseImage:function(){
			var obj = {};
			obj.id = this.baseId;
			var bUrl = this.baseURL,
				ext = bUrl.substr(bUrl.lastIndexOf('.')+1),
				cacheBustBgImg = '';
						if(ext == "gif" && (cacheBustBgImg.length == 0 || parseInt(cacheBustBgImg))){
				bUrl = bUrl + "?" + Math.random();
			}else{
							if(parseInt(cacheBustBgImg)){
					bUrl = bUrl + "?" + Math.random();
				}
			}
			obj.src = bUrl;
			obj.width = this.baseWidth;
			obj.height = this.baseHeight;
			return createImg(obj);
		},
				getBaseHTML:function(){
						var obj = {};
			obj.id = this.baseId;
			obj.src = this.baseURL;
			if(this.baseHasLayout == 1){
					            				var tzOffset = new Date().getTimezoneOffset();
				obj.src += "&localTimeOffset=" + tzOffset;
																obj.src += '&pageURL='+this.encodedPageURL;
							}
							if(this.baseHasLayout == 1){
            		obj.src += '&allowExp=0';
            	}
                        if(this.baseHasLayout == 1){
                                                    if(jvx_5f719d32df2bbSafeFrameSupported){
                        obj.src += '&isSF=1';
                    }
                            }
						if(this.baseHasLayout == 1 && this.expansionHasLayout == 1){
								obj.src += '&useBaseCVForExp=1';
			}
						obj.width = this.baseWidth;
			obj.height = this.baseHeight;
			return createIframe(obj);
		}, 
		getBaseFallback:function(){
			var fallbackType = this.baseFallbackType;
			var str = "";
			switch(fallbackType){
				case "image":
					str = this.getBaseFallbackImage();
					break;
				case "widget":
					str = this.getBaseFallbackWidget();
					break;
				case "swiffy":
				case "html5":
					str = this.getBaseFallbackHTML();
					break;
				default:
					break;
			}
			return str;
		},
		getBaseFallbackImage:function(){
						var obj = {};
			obj.id = this.baseId;
			obj.src = this.baseFallbackURL;
			obj.width = this.baseWidth;
			obj.height = this.baseHeight;
			return createImg(obj);
		},
		getBaseFallbackWidget:function(){
			var obj = {};
			obj.id = this.baseId;
			obj.src = this.baseFallbackWidgetSrc;
			obj.width = this.baseWidth;
			obj.height = this.baseHeight;
			return createFIF(obj);
		},
		getBaseFallbackHTML:function(){
			var obj = {};
			obj.id = this.baseId;
			obj.src = this.baseFallbackURL;
			obj.width = this.baseWidth;
			obj.height = this.baseHeight;
			return createIframe(obj);
		}, 
		getBaseClose:function(){
			var obj = {};
			obj.id = this.baseCloseId;
			obj.src = '';
			obj.width = '';
			obj.height = '';
			return createImg(obj);
		},
						getExpansionRef:function(){
			var eNode = getElById(this.expansionId);
            var e2Node = getElById(this.expansion2Id);
            if(!eNode) return null;
            var eIframeNode = (eNode.nodeName.toLowerCase() == "iframe") ? eNode : e2Node;
            return eIframeNode;
		},
		fnCallback:function(evt){
			var ref = jvx_5f719d32df2bb,
				pName = '', targetId = '', key = '';
			if(evt){
				pName = evt.propertyName,
				targetId = evt.target.id,
				key = targetId;	
			}
			if(targetId == ref.loaderId)
				return;
		/*	var addPNameToKey = function(pName){
				if(pName == 'width'){
					key += evt.target.clientWidth;	
				}else if(pName == 'height'){
					key += evt.target.clientHeight;
				}else if(pName == 'top'){
					key += evt.target.clientTop;
				}else if(pName == 'left'){
					key += evt.target.clientLeft;
				}
				return key;
			};	
		*/
			var executeCallBack = function(transitionEvt){
								if(ref != 'undefined' && ref != null){
					var el = ref.getExpansionRef(),
						expEl = getElById(ref.expansionContainerId);
					if(ref.expansionOpen){
						
																			
																		var clsEl = getElById(ref.closeExpansionId);
						if(clsEl){
														clsEl.style.display = 'block';
						}	
																		if(ref.expansionHasLayout == 1 && ref.postOpenExpCompMsg){
														if(transitionEvt){
								postHtml5Message(el,'openExpansionComplete');
								postHtml5Message(el,'activateScene');
							}else{
															}
							ref.postOpenExpCompMsg = false;
						}
					}else{
						if(ref.openExpAgain) ref.openExpAgain = false; 
												
												if(jvx_5f719d32df2bbSafeFrameSupported && transitionEvt){
							try{
								$sf.ext.collapse();
															}catch(e){}
						}
												
												var clsEl = getElById(ref.closeExpansionId);
						if(clsEl)
							clsEl.style.display = 'none';
												if(ref.expansionHasLayout == 1){
							if(transitionEvt){
								postHtml5Message(el,'closeExpansionComplete');
							}else{
															}
													}
						
												
						/* Removing Styles from adUnitContainer which is set during openExpansion and adding default styles for Billboard */
												/* End */
						
						/* Removing Styles from document.body which is set during openExpansion for Sidekick */
												/* End */

						ref.expansionHasOpened = false;
						ref.postOpenExpCompMsg = true;
					}
				}
			};
			if(!isEmpty(ref.storeTransitionEndEvt)){
				if(!ref.storeTransitionEndEvt.hasOwnProperty(key)){		// If KEY not present in the object, add the New Key to the object and 
					ref.storeTransitionEndEvt[key] = targetId;			// execute callback
					if(targetId != ref.closeExpansionId){
						executeCallBack(evt);
					}	
				}else{
				//	log("already exist");
				}
			}else{
				ref.storeTransitionEndEvt[key] = targetId;
				if(targetId != ref.closeExpansionId){
					executeCallBack(evt);
				}	
				setTimeout(function(){ref.storeTransitionEndEvt = {};},200);
			}
		},
										applyInterceptorStyle:function(iNode,pNode){
			iNode.style.position = "absolute";
			iNode.style.cursor = "pointer"; // In iOS, event delegation don't work for div "clicks" unless this is set.
			iNode.style.top = "0px";
			iNode.style.left = "0px";
			pNode.appendChild(iNode);
		},
		renderInterceptor:function(type){
			var iNode = '', pNode = '';
			if(type == 'base'){
				iNode = createDivNode(this.baseInterceptorId); //interceptor node
				pNode = getElById(this.baseContainerId);
				iNode.style.width = this.baseWidth + "px";
				iNode.style.height = this.baseHeight + "px";
											} else if(type == 'expansion'){
				iNode = createDivNode(this.expInterceptorId); //interceptor node
				pNode = getElById(this.expansionContainerId);
				iNode.style.width = this.expansionWidth + "px";
				iNode.style.height = this.expansionHeight + "px";
			}
			this.applyInterceptorStyle(iNode,pNode);
		},
								setAdUnitStyle:function(obj){
			if(this.insertExpansionTo == "adUnitContainer") {
				var transitionPos = "",
				mainContStyle = {};
								addStyles(getElById(this.adUnitContainerId), mainContStyle);		// Setting CSS styles to #adUnitContainer 
			}
		},
								
				
		getIBusterFrameInfo:function(){
			if(typeof(jivoxIBusterAdObject) != "undefined"){
				var hostIframes = document.body.getElementsByTagName("iframe"),
					iFramesLen = (hostIframes) ? hostIframes.length : 0;
				for(var i=0; i < iFramesLen; i++){
					if(hostIframes[i].contentWindow == jivoxIBusterAdObject["jvx_5f719d32df2bb"].foreignWindow){
						cords = getBox(hostIframes[i]);
						return [cords, hostIframes[i]];
					//	this.iBusterFrameCords = cords;
					//	this.iBusterFrame = hostIframes[i];
					}
				}
			}
		},
				getAdUnitBox: function(){
						var box = getOffset(getElById(this.adUnitContainerId));
						return box;
		},
		animate: function(obj){
			var styles = {},
				expEl = getElById(this.expansionContainerId),
				expLeft = parseInt(expEl.style.left),
				expTop = parseInt(expEl.style.top),
				startTimeOut = 80, endTimeOut = 80,
				jsAnimSpeed = obj.animationSpeed*1000;
				
			var adUnitBox = this.getAdUnitBox();
			obj.browserPrefix = getBrowserPrefix(this.browserName);
			obj.expWidth = parseInt(this.expansionWidth);
			obj.expHeight = parseInt(this.expansionHeight);
			obj.bWidth = parseInt(this.baseWidth);
			obj.bHeight = parseInt(this.baseHeight);
			obj.alignToVP = this.alignToVP;
			
			var that = this;
			var openAnimSettings = function(styleObj){
				var returnVal = null;
				if(!that.preStyleExpansion){
					if(that.expAnimDir != "SlideTop"){
						if(styleObj['left'] != "")
							returnVal = parseInt(styleObj['left']) -  obj.expWidth
					}	
				} else {
					that.preStyleExpansion = false;
					if(that.expAnimDir != "SlideTop"){
						returnVal = expLeft -  obj.expWidth;
					} else {
												returnVal = parseInt(adUnitBox.top) - (parseInt(that.expansionHeight) - parseInt(that.baseHeight));
											}
				}
				return returnVal;
			};
				
						
						
			obj.preStyleExpansion = this.preStyleExpansion;
			obj.insertExpansionTo = this.insertExpansionTo;
			obj.expContainerId = this.expansionContainerId;
			
						//adding close button to Expansion
			var closeDiv = getElById(this.closeExpansionId);
			if(!closeDiv) {
				var dispType = "none", clsLeft = "", clsTop = "";
																		var clsStyles = {'display' : dispType,
									 'top'	   : clsTop + 'px',
									 'left'    : clsLeft +'px',
									 									};	
					closeDiv = addDivComponent(expEl, this.closeExpansionId, 'jvx_boxclose', '&times;', clsStyles);
							} else {
				closeDiv.style.display = 'block';
			}
						
											styles = createStyleObject(obj);
				if(this.vAlignToVP && !this.preStyleExpansion){
					if(obj.expansionOpen){
						var vpTop = setVAlignTop(styles);
						styles['top'] = vpTop + 'px';
					}else{
						styles['top'] = expTop + "px";
					}
				}
									if(!obj.expansionOpen && (obj.animationDirection == "SlideInDiagonalRight"
						|| obj.animationDirection == "SlideInRight")){
						var clsExpLeft = expLeft +  parseInt(that.expansionWidth);
						styles['left'] = clsExpLeft + "px";
					}
					addStyles(expEl, styles);
								
				if(obj.expansionOpen){
					if(obj.animationDirection == "DiagonalTopRight" || obj.animationDirection == "SlideInDiagonalRight"
						|| obj.animationDirection == "SlideLeft" || obj.animationDirection == "SlideInRight"
						|| obj.animationDirection == "SlideBottom" || obj.animationDirection == "SlideInTop"){
						
						var newLeft = openAnimSettings(styles);
					}
										var that = this;
					setTimeout(function() {
						expEl.style.width = obj.expWidth + "px";
						expEl.style.height = obj.expHeight + "px";
						if(!that.alignToVP || (that.alignToVP && (obj.animationDirection != "SlideBottom" &&
																obj.animationDirection != "SlideInTop"))){
							
							if(newLeft != "undefined") expEl.style.left = newLeft + "px";
						}
					},startTimeOut);
									} else {
									}
						// COM: transition end evt is not triggered when animSpeed is 0
					},
		
	/* Expansion code starts */ 
        renderExpansionBg:function(){
			var str = "";
            var expansionContainerEl = getElById(this.expansionContainerId);
            var expansionBgElement = null;
			switch(this.expansionBgType){
				case "image":
					str = this.getExpansionBgImage();
					break;
				default:
					break;
			}
            expansionBgEl = toElement(str);
            expansionContainerEl.appendChild(expansionBgEl);
        },
        getExpansionBgImage:function(){
			var obj = {};
			obj.id = this.expansionBgId;
			obj.src = this.expansionBgURL;
			obj.width = this.expansionWidth;
			obj.height = this.expansionHeight;
			return createImg(obj);
        },
				// this function decides whether to call intermediate/actual layout file incase of loading the expansion
		getExpansionURL:function(url){
			var expansionURL = '';
			if(this.baseHasLayout == 1 && this.expansionHasLayout == 1 && url.indexOf("layout_renderer.php") > 0){
				url += "&useBaseCVForExp=1";
				expansionURL = url.replace("layout_renderer.php", this.expIntermediateFileName);
			}else{
				expansionURL = url;
			}
			return expansionURL;
		},
				renderExpansion:function(mobileVP){
			var eNode = getElById(this.expansionId);
			if(eNode != null) {
				if(mobileVP) {
					var winDim = getBrowserWindowProps();
					//Re-style expansion container
					var eContainerNode = getElById(this.expansionContainerId);
					if(eContainerNode != null) {
						//Reset width and height for expansion container
																				eContainerNode.style.width = winDim[0]+'px';
							eContainerNode.style.height = winDim[1]+'px';
														
					}
					
					//Re-render expansion node in expansionType hybrid (!'C' and !'I')
					var e2Node = getElById(this.expansion2Id);
					var eIframeNode = (eNode.nodeName.toLowerCase() == "iframe") ? eNode : e2Node;
					var eImgNode = (eNode.nodeName.toLowerCase() == "img") ? eNode : e2Node;

					if(this.expansionHasLayout == 1 && eIframeNode != null) {
						eIframeNode.style.display = 'block';
						if(eImgNode != null) {
							eImgNode.style.display = 'none';
						}
						eIframeNode.width = this.expansionWidth;
						eIframeNode.height = this.expansionHeight;
												//Reposition expansion div
//						var mt = (winDim[1] - this.expansionHeight)/2 + 'px',
//							ml = (winDim[0] - this.expansionWidth)/2 + 'px';
//					//	eIframeNode.style.margin = mt + ' 0 0 ' + ml;
						//Post a message to layout renderer
						
						/*Smooth responsive and stretch variables*/
													postHtml5Message(eIframeNode, 'reRenderLayout');
												if(eIframeNode.src == 'about:blank'){
							var eNodeSrc = this.expansionURL;
														// do the same in mobile case also
							var expURL = this.getExpansionURL(eNodeSrc);
							if(expURL != eNodeSrc){ eNodeSrc = expURL; }
														eIframeNode.src = eNodeSrc;
						}
						return;
					} else if(this.expansionHasLayout != 1 && eImgNode != null) {
						eImgNode.style.display = 'block';
						if(eIframeNode != null) {
							eIframeNode.style.display = 'none';
							//Layout renderer should pause all the activities like video
							postHtml5Message(eIframeNode, 'pauseInteraction');
							postHtml5Message(eIframeNode, 'deActivateScene');
						}
						eImgNode.width = this.expansionWidth;
						eImgNode.height = this.expansionHeight;
						//Reposition expansion div
						//Center align expansion node if expansion is an image no layout,
						//If expansion has layout then layout_renderer takes care of alignment
						var mt = (winDim[1] - this.expansionHeight)/2 + 'px',
							ml = (winDim[0] - this.expansionWidth)/2 + 'px';
						eImgNode.style.margin = mt + ' 0 0 ' + ml;
						//Process image based expansion 
						eImgNode.src = this.expansionURL;
						return;
					} else {
						var origExpansionId = this.expansionId;
						this.expansionId = this.expansion2Id;
					}
				} else {
									return;
				}
			}
			var expansionType = this.expansionType;
			var that = this;
			var str = "";
			switch(expansionType){
				case "image":
					str = this.getExpansionImage();
					break;
								case "html":
					str = this.getExpansionHTML();
					break;
				default:
					break;
			}
			if(!str) return false;
			var expansionContainerNode = getElById(this.expansionContainerId);
            var expansionNode = toElement(str);
            expansionContainerNode.appendChild(expansionNode);
						if(expansionNode)
				expansionNode.style.cursor = "pointer";
						addEvent(getElById(this.expansionId), "load", function(event){ that.onLoadEventHandler(event); }, false);
			
						if(this.expansionId == this.expansion2Id) {
				//Reset expansionId to original value
				this.expansionId = origExpansionId;
				//Set style for eNode
				var eNode = getElById(this.expansionId);
				//eNode.style.position = 'absolute';
				eNode.style.display = 'none';
				if(eNode.nodeName.toLowerCase() == "iframe") {
					//Layout renderer should pause all the activities like video
					postHtml5Message(eNode, 'pauseInteraction');
					postHtml5Message(eNode, 'deActivateScene');
				}
				//Set style for base2Node
				var e2Node = getElById(this.expansion2Id);
				//e2Node.style.position = 'absolute';
				e2Node.style.display = 'block';
				//Reposition expansion div
//				var mt = (winDim[1] - this.expansionHeight)/2 + 'px',
//					ml = (winDim[0] - this.expansionWidth)/2 + 'px';
//				e2Node.style.margin = mt + ' 0 0 ' + ml;
				//Add load event handler
				addEvent(e2Node, "load", function(event){ that.onLoadEventHandler(event); }, false);
			}
						//Center align expansion node if expansion is an image no layout,
			//If expansion has layout then layout_renderer takes care of alignment
			if(mobileVP && expansionType == "image") {
				var winDim = getBrowserWindowProps();
				var eNode = getElById(this.expansionId);
				var mt = (winDim[1] - this.expansionHeight)/2 + 'px',
					ml = (winDim[0] - this.expansionWidth)/2 + 'px';
				eNode.style.margin = mt + ' 0 0 ' + ml;
			}
		},
		getExpansionImage:function(){
			var obj = {};
			obj.id = this.expansionId;
			obj.src = this.expansionURL;
			obj.width = this.expansionWidth;
			obj.height = this.expansionHeight;
			return createImg(obj);
		},
				getExpansionHTML:function(){
			var obj = {};
			obj.id = this.expansionId;
			obj.src = this.expansionURL;
			if(this.userInitAction && parseInt(this.expansionHasLayout)){
				// add this param so that expansion layout knows it got opened manualy and not an auto-expansion
				obj.src += "&userInitAction=1";				
			}
			if(this.expansionHasLayout == 1){
								                var tzOffset = new Date().getTimezoneOffset();
				obj.src += "&localTimeOffset=" + tzOffset;
								                    if(jvx_5f719d32df2bbSafeFrameSupported){
                        obj.src += '&isSF=1';
                    }
                																obj.src += '&pageURL='+this.encodedPageURL;
							}
			obj.width = this.expansionWidth;
			obj.height = this.expansionHeight;
						
						obj.styles = {'max-width':'none !important'};
			
						var expURL = this.getExpansionURL(obj.src);
			if(expURL != obj.src){ obj.src = expURL; }
						return createIframe(obj);
		}, 
		getExpansionFallback:function(){
			var fallbackType = this.expansionFallbackType;
			var str = "";
			switch(fallbackType){
				case "image":
					str = this.getExpansionFallbackImage();
					break;
				case "widget":
					str = this.getExpansionFallbackWidget();
					break;
				case "swiffy":
				case "html5":
					str = this.getExpansionFallbackHTML();
					break;
				default:
					break;
			}
			return str;
		},
		getExpansionFallbackImage:function(){
			var obj = {};
			obj.id = this.expansionId;
			obj.src = this.expansionFallbackURL;
			obj.width = this.expansionWidth;
			obj.height = this.expansionHeight;
			return createImg(obj);
		},
		getExpansionFallbackWidget:function(){
			var obj = {};
			obj.id = this.expansionId;
			obj.src = this.expansionFallbackWidgetSrc;
			obj.width = this.expansionWidth;
			obj.height = this.expansionHeight;
			return createFIF(obj);
		},
		getExpansionFallbackHTML:function(){
			var obj = {};
			obj.id = this.expansionId;
			obj.src = this.expansionFallbackURL;
			obj.width = this.expansionWidth;
			obj.height = this.expansionHeight;
			return createIframe(obj);
		},
		
		openWindow:function(url){
							if(NonMraidTagInMraidEnv){
					mraid.open(url);
				} else {
					window.open(url);
				}
					},
		openClickThrough:function(){
							this.openWindow('https://googleads.g.doubleclick.net/dbm/clk?sa=L&ai=CJPDjJZ1xX_f2FamkzAbL3LTwDau_vapeoru1_bEL8O7_65ACEAEg08vOMGDV5dICoAGA7P2-AsgBCakCcta2SU-Dsz6oAwGqBNkBT9AGCQUvgfXdFJ9VZ5YlA9A4IvcI09KlHAI3eTVuWKoWUMliKTEl-m6PfsNsk6C_7aoeOQbRJFARYMPu0jtdZNtZrSne5qHjS0rFNnQYPfAb8fHYxfDLtLqcV5BrSIKNUePu8QhjNFB0ZUXKV_dfzqZ_pj1wKkZurKDRvtsv8eToKbC_r-YVSTiuVxRNaftOnbAh8lOnRQ0br_Z-lqoOm7BzfInTsUrBnwtxaibJ3xqzY2QtLs5Lrn8DV6Qf-o27ljvuhyfrrSvEFk_xoaYp7ViCCzwIGCQOZMAE54ibroID4AQDkAYBoAZNgAfok4LBAYgHAZAHAqgHjs4bqAfVyRuoB5PYG6gHugaoB_DZG6gH8tkbqAfs1RuoB6a-G6gH7NUbqAfz0RuoB5bYG6gHwtob2AcA0ggJCICAgBAQAhgN8ggbYWR4LXN1YnN5bi01NDQ0Nzg2MTkxMTcwMDA2gAoDmAsByAsBgAwBsBOAis0J0BMA2BMN2BQB&ae=1&num=1&cid=CAMSeQClSFh315iMKx2hflFO6ogmsQsnGxXrL9iY5iLW7zIAdNySeC4mTxCLPhePL1Old6LY6bep8zVC8yETO6mA3APLPkfvBXP7x9rPtaxEWcRIOInDLW290T3rGZcG6GaSZMvnODe8eoHcOpicOtXZKCAao1FRRZvUkXE&sig=AOD64_3xkpbmKd2S8ZCZwBe_wCQ5omhY1Q&client=ca-pub-5884294479391638&dbm_c=AKAmf-AcOU1x_Ri5Jdnhq4z54Lyy45eICfyqSdoUlnpYrI96uPNHyZ2nqVZBFd6NrZFjhuA2hCH2j5Tq0wYumlpVt4nd2sZtqEGEBkwP2hglLyd2MOVMQU2sDuwRXlWwg6EMffCCAJHpPAjR2KRfDE92xRtd9GVHOw&dbm_d=AKAmf-CEAYu8rO06Rnnn63Pg0JJy06rE_18KdcOA6oGEw6_QieI2EkKVZ8mr9G7Zhv3CXDKu5JvqZVMeyQAax2h2sJ6ZOqG--1kvUnRiaqoG2pxXT5DQD4trcsDG_g-1NMqOOAdOY3gdx8ozAFgHBev-tShKi-dAO-0N-jpYIa7ixRHcL2AHzDuvdnMS0h2XHD_vWeLNTpcnyngq8cIIQ8v5Q5Wopw1HxF89LNqKkEx0UtXuYt8Js8ToJi1cqt80noQ8ncdFpx_jpxpDFsIahg6WfIsPidMKy_TtLZ640imKgYT_IxxTe1mGsCmsDoLVmMgOb_Sxh1la_7Mgxsm8YNYHrMJUwUQnowVXZa6nUZdqKrV-6cV05zp4I7z7ypiDV8lqQuwbITFfhgwLtXmEoJMJ_d3T55TLVudMKK1Tu60EFIaofAtnOFIWS8QbOIwYp83vrEpI9vMPcZRnXu6LEMlaly7RRSDb-8veN1Kjuot_ueg1MfuezB3l56naSy1dXpxzCiRnkIRGNEDXTo42UcRFHfn-hEmNgNFKEgxyFywaVWUwJhz4kOOdhoUcQvxdpJL3Z3QvyIYs&adurl=https%3A%2F%2Fwww.nike.com%2F');
						
												// raise Macro flag if cMacro is not replaced
										
				if(!this.raiseCMacroFlag){
					this.recordEvent(1);
				}else{
					var eventRecordParams = "es_clkMac_1";
					this.recordEvent(1, eventRecordParams);
				}
									if(!adInVPForOneSec){
												this.recordEvent(73);
												adInVPForOneSec = true;
						if (timerRunning) {
							window.clearTimeout(timeoutHandle);
							timerRunning = false;
						}
					}
													},
				openExpansion:function(autoExpand, skipOpenEvent){
			
						
						if(!jvx_5f719d32df2bbCanBustFromFrame || jvx_5f719d32df2bbInNestedFrame){
				return;
			}
									
						
			if(!this.expansionHasOpened){
																				if(jvx_5f719d32df2bbSafeFrameSupported)
					renderAdInsideSafeFrame(this.expAnimDir);
												this.expansionOpen = true;
								this.userInitAction = autoExpand ? false : true;
				if(!this.openExpAgain){
															if(!autoExpand && !skipOpenEvent){
						this.recordEvent(37);
					}
														}
				var obj = {};
				obj.baseBox = this.getAdUnitBox();
							//	obj.baseBox = getOffset(getElById(this.adUnitContainerId));
													obj.animationDirection = this.expAnimDir;
				obj.animationSpeed = this.expAnimSpeed;
				obj.expansionOpen = this.expansionOpen;
				
				if(this.behaviourId != "" || this.behaviourId != "undefined")
					obj.transitionType = parseInt(this.behaviourId);						// hard code the value for testing
								
				var expRendered = this.renderExpansion();
				if(expRendered != false){
					if(!this.expInterceptorDomRef){
												var userHandlesExpClick = "";
						var eFlashClick = "";
						if(this.expansionType == "flash"){
							if(!hasFlashPlugin){
								eFlashClick = "";
							}else{
								eFlashClick = "";
							}
							if(eFlashClick){
								eFlashClick = parseInt(eFlashClick);
							}
						}
												if((userHandlesExpClick && this.expansionType == 'html') 
							|| (this.expansionType == 'flash' && (!eFlashClick && eFlashClick !== ""))){
							
							this.renderInterceptor('expansion');
							if(getElById(this.expInterceptorId)){
								this.expInterceptorDomRef = getElById(this.expInterceptorId);
							}
						}
											}else{
						this.expInterceptorDomRef.style.display = 'block';
					}
					this.expansionHasOpened = true;
					if(this.expansionHasLayout == 1) {
						postHtml5Message(this.getExpansionRef(),'openExpansion');
					}
					
										
										
					if(jvx_5f719d32df2bbSafeFrameSupported){						
												this.animate(obj);
											}else{
						this.animate(obj);
					}
				}
							}	
		},
		closeExpansion:function(autoClose, skipCloseEvent){	// Only animation applied to hide, expUnit is not deleted
			var that = this;
			if(this.expansionHasOpened){
																												if(!autoClose && !skipCloseEvent){
					this.recordEvent(47);
				}
								this.expansionOpen = false;
								if(!autoClose){
					if(this.autoExpandTimerRef != null){
						clearTimeout(that.autoExpandTimerRef);
					}
				}
				if(this.expansionHasLayout == 1) {
					postHtml5Message(this.getExpansionRef(),'closeExpansion');
				}

				var obj = {};
				obj.transitionType = parseInt(this.behaviourId);			// hard code the value for testing
								obj.animationDirection = this.expAnimDir;
								if(!this.clsExpAnimSpeed && this.clsExpAnimSpeed !== 0){
					obj.animationSpeed = this.expAnimSpeed;
				} else {
					// when close exp anim speed value is not ""
					obj.animationSpeed = "";
				}
				obj.baseBox = this.getAdUnitBox();
							//	obj.baseBox = getOffset(getElById(this.adUnitContainerId));
													obj.expansionOpen = this.expansionOpen;
				
								if(this.expInterceptorDomRef){		// hide expansion interceptor if exists. 
					this.expInterceptorDomRef.style.display = 'none';
				}
								this.animate(obj);
				
							}	
		},
		loadExpansion:function(){

		},
		/* Expansion code ends */

		onBaseMouseOver:function(){
								}, 
		onBaseMouseOut:function(){
					},
		onAdUnitMouseOut:function(){
			var that = this;
									clearTimeout(this.UIRTimer);
			if(!this.DwellRecorded){
            	this.recordDwellEvent(49, this.DwellElapsedTime);
            }
								},
		recordEvent:function(eventId,addnlParams){
							var rand = Math.random();
				var imgEl = document.createElement("img");
                var tempURL = "";
                var eventReportingURL = "https://evs.jivox.com/trk" + "/" + eventId + "/" + "128974/65c616660e0b0a/22/jvxSId_1601281330.6717";
                eventReportingURL += "/es_pId_63E14k";
                tempURL += "";
                                tempURL += this.apParamsInEventFormat ? this.apParamsInEventFormat : "";
                                tempURL = addnlParams ? (tempURL + "/" + addnlParams) : tempURL;
				tempURL = tempURL + "/jvxRandom=" + rand;
				//eventReportingURL = (eventId == 1) ? (eventReportingURL + ";https://googleads.g.doubleclick.net/dbm/clk?sa=L&ai=CJPDjJZ1xX_f2FamkzAbL3LTwDau_vapeoru1_bEL8O7_65ACEAEg08vOMGDV5dICoAGA7P2-AsgBCakCcta2SU-Dsz6oAwGqBNkBT9AGCQUvgfXdFJ9VZ5YlA9A4IvcI09KlHAI3eTVuWKoWUMliKTEl-m6PfsNsk6C_7aoeOQbRJFARYMPu0jtdZNtZrSne5qHjS0rFNnQYPfAb8fHYxfDLtLqcV5BrSIKNUePu8QhjNFB0ZUXKV_dfzqZ_pj1wKkZurKDRvtsv8eToKbC_r-YVSTiuVxRNaftOnbAh8lOnRQ0br_Z-lqoOm7BzfInTsUrBnwtxaibJ3xqzY2QtLs5Lrn8DV6Qf-o27ljvuhyfrrSvEFk_xoaYp7ViCCzwIGCQOZMAE54ibroID4AQDkAYBoAZNgAfok4LBAYgHAZAHAqgHjs4bqAfVyRuoB5PYG6gHugaoB_DZG6gH8tkbqAfs1RuoB6a-G6gH7NUbqAfz0RuoB5bYG6gHwtob2AcA0ggJCICAgBAQAhgN8ggbYWR4LXN1YnN5bi01NDQ0Nzg2MTkxMTcwMDA2gAoDmAsByAsBgAwBsBOAis0J0BMA2BMN2BQB&ae=1&num=1&cid=CAMSeQClSFh315iMKx2hflFO6ogmsQsnGxXrL9iY5iLW7zIAdNySeC4mTxCLPhePL1Old6LY6bep8zVC8yETO6mA3APLPkfvBXP7x9rPtaxEWcRIOInDLW290T3rGZcG6GaSZMvnODe8eoHcOpicOtXZKCAao1FRRZvUkXE&sig=AOD64_3xkpbmKd2S8ZCZwBe_wCQ5omhY1Q&client=ca-pub-5884294479391638&dbm_c=AKAmf-AcOU1x_Ri5Jdnhq4z54Lyy45eICfyqSdoUlnpYrI96uPNHyZ2nqVZBFd6NrZFjhuA2hCH2j5Tq0wYumlpVt4nd2sZtqEGEBkwP2hglLyd2MOVMQU2sDuwRXlWwg6EMffCCAJHpPAjR2KRfDE92xRtd9GVHOw&dbm_d=AKAmf-CEAYu8rO06Rnnn63Pg0JJy06rE_18KdcOA6oGEw6_QieI2EkKVZ8mr9G7Zhv3CXDKu5JvqZVMeyQAax2h2sJ6ZOqG--1kvUnRiaqoG2pxXT5DQD4trcsDG_g-1NMqOOAdOY3gdx8ozAFgHBev-tShKi-dAO-0N-jpYIa7ixRHcL2AHzDuvdnMS0h2XHD_vWeLNTpcnyngq8cIIQ8v5Q5Wopw1HxF89LNqKkEx0UtXuYt8Js8ToJi1cqt80noQ8ncdFpx_jpxpDFsIahg6WfIsPidMKy_TtLZ640imKgYT_IxxTe1mGsCmsDoLVmMgOb_Sxh1la_7Mgxsm8YNYHrMJUwUQnowVXZa6nUZdqKrV-6cV05zp4I7z7ypiDV8lqQuwbITFfhgwLtXmEoJMJ_d3T55TLVudMKK1Tu60EFIaofAtnOFIWS8QbOIwYp83vrEpI9vMPcZRnXu6LEMlaly7RRSDb-8veN1Kjuot_ueg1MfuezB3l56naSy1dXpxzCiRnkIRGNEDXTo42UcRFHfn-hEmNgNFKEgxyFywaVWUwJhz4kOOdhoUcQvxdpJL3Z3QvyIYs&adurl=https%3A%2F%2Fwww.nike.com%2F") : eventReportingURL;
									tempURL += "/es_cgName="+jvx_5f719d32df2bb.DYReportingKey;
                    if(jvx_5f719d32df2bb.DYSegmentName != ""){
                        tempURL += "/es_segName="+jvx_5f719d32df2bb.DYSegmentName;
                    }
								
								
				eventReportingURL += "/es_encParams_"+ btoa(tempURL);;
				imgEl.src = eventReportingURL;
									},
        
				recordUIREvent:function(eventId, elapsedTime){
			if(this.UIRRecorded){
				return;
			}
			this.recordEvent(eventId, elapsedTime);
			this.UIRRecorded = true;
					},
		recordDwellEvent:function(eventId, elapsedTime){
			var that = this;
			if(this.DwellRecorded){
				return;
			}
			clearTimeout(that.DwellTimer);
			if(elapsedTime > 0){
				var eventRecordParams = "es_et=" + elapsedTime;
				this.recordEvent(eventId, eventRecordParams);
			}
			clearInterval(this.DwellElapsedTimer);
			this.DwellElapsedTimer = null;
			this.DwellElapsedTime = 0;
			this.DwellRecorded = true;
			this.DwellTimer = null;
		},
				                						renderAdUnitContainer:function(){
						
						var cNode = createDivNode(this.adUnitContainerId);
			            												document.write('<div id="jvxScrRefNode_5f719d32df2bb" style="display:none;"></div>');	
				var jvxPNode = '';
				var jvxNode = getElById("jvxScrRefNode_5f719d32df2bb");
				pNode = (jvxNode)? (jvxPNode = jvxNode.parentNode) : document.body;
				if(jvxPNode) jvxPNode.removeChild(jvxNode);
																cNode.style.position = "relative";
			cNode.style.margin = "0 auto";
			
											cNode.style.width = this.baseWidth + setPixel(this.baseWidth);
				cNode.style.height = this.baseHeight + setPixel(this.baseHeight);
							
																						var auNode = '<div id="'+this.adUnitContainerId+'" style="position:relative;width:'+this.baseWidth+setPixel(this.baseWidth)+';height:'+this.baseHeight+setPixel(this.baseHeight)+';cursor:pointer;"></div>';
															document.write(auNode);
																		/* bgSkinUnit - align adUnit center portion in viewport */
								},
		        getInsertToNode:function(insertTo){
            var pNode = null;
			insertTo = (insertTo == 'adUnitContainer') ? this.adUnitContainerId : insertTo;
			if(insertTo == 'body'){
                pNode = document.body;
            } 
						else {
				pNode = getElById(insertTo); // get the node by id
				if(!pNode){
					pNode = document.querySelector(insertTo);
				}
				if(!pNode){
					if(getElByClass(insertTo))
						pNode = getElByClass(insertTo)[0]; // get the node by class
				}	
            }
            pNode = (pNode == null) ? document.body : pNode;
            return pNode;
        },
				renderBaseContainer:function(){
            				var insertBaseTo = this.insertBaseTo;
				var pNode = this.getInsertToNode(insertBaseTo); //parent node
				var cNode = createDivNode(this.baseContainerId); //child node
				cNode.style.backgroundColor = this.baseBgColor;
				
				/*Smooth responsive and stretch variables*/
								
												prependNode(cNode, pNode);
												if(insertBaseTo == 'adUnitContainer'){
					cNode.style.position = 'relative';
				} else {
					var box = getBox(getElById(this.adUnitContainerId));
					var t = box.top;
					var l = box.left;
					cNode.style.left = l + "px";
					cNode.style.top = t + "px";
					cNode.style.position = 'absolute';
				}
									},
								renderExpansionContainer:function(){
            var insertExpansionTo = this.insertExpansionTo;
            var pNode = this.getInsertToNode(insertExpansionTo); //parent node
            var cNode = createDivNode(this.expansionContainerId); //child node
			if(insertExpansionTo != "adUnitContainer" && (this.expansionType == "image" || this.expansionType == "flash"))
				cNode.style.cursor = "pointer";
			cNode.style.backgroundColor = this.expansionBgColor;
						cNode.style.zIndex = 1999998;
						if(this.insertExpansionAs == "fc"){
				prependNode(cNode, pNode);
			}else{
				pNode.appendChild(cNode);
			}
					},
				getClosestDim:function(unitArr, pWidth, pHeight){
						// COM: Setting winWidth = adSlotWidth, when there are multiple ad units and bpType='as'
							var winDim = getBrowserWindowProps();
				var currentWinWidth = winDim[0],
					currentWinHeight = winDim[1];
						
			var leastDiff = 10000; 
			var leastWidthDiff = 10000; 
			var	leastHeightDiff = 10000;
			var bestFitBannerDim = '';
			var diffArr = new Array();
			var cdwObj,cdhObj = {};
			var chkDiff = false;
			var smallestDiff = -1; 
			var smallestWidth, smallestDim = null;

			for(var auIndex in unitArr){
				var currentObjKey = unitArr[auIndex]['dimension'],
					specifiedWidthAvl = unitArr[auIndex].hasOwnProperty('specifiedWidth');
					
				var assetWidthVal = (specifiedWidthAvl) ? parseInt(unitArr[auIndex]['specifiedWidth']) :
									parseInt(currentObjKey.split('x')[0]);
								var assetWidth = assetWidthVal;
				var assetHeight = parseInt(currentObjKey.split('x')[1]);
								if(assetWidth == currentWinWidth) {
					leastDiff = 0;
					bestFitBannerDim = currentObjKey;
					break;
				} else if(assetWidth < currentWinWidth && (currentWinWidth - assetWidth) < leastDiff) {
					leastDiff = (currentWinWidth - assetWidth);
					bestFitBannerDim = currentObjKey;
				} 
				if(smallestWidth == null || assetWidth < smallestWidth) {
					smallestWidth = assetWidth;
					smallestDim = currentObjKey;
				}
							}
						if(bestFitBannerDim == '' && smallestDim != null) {
				bestFitBannerDim = smallestDim;
			}
			
			
			return bestFitBannerDim;
		},
				setBaseProperties:function(bestFitDim){
						var bestFitBase = {};
			for(var auIndex in this.responsiveBaseUnitArr) {
				bestFitBase = this.responsiveBaseUnitArr[auIndex];
				if(bestFitBase['dimension'] == bestFitDim)
					break;
			}
			if(bestFitBase) {
				this.baseHasLayout = bestFitBase['hasLayout'];
				this.baseBgType = '';
				this.baseBgURL = '';
				this.baseBgColor = '';
				if(this.baseHasLayout == 1) {
					this.baseType = 'html';
					this.baseURL = 'https://as.jivox.com/unit/layout_renderer.php?creativeUnitType=22&bDim=300x600&bUnitId=2200&siteId=65c616660e0b0a&campaignId=128974&es_pId=63E14k&isDynamic=1&ap_DataSignal1=40582625&ap_DataSignal2=ABAjH0jkoUcVSP6Wxi9RTnFFP7FG&ap_DataSignal3=257913009&ap_DataSignal4=11395931134&jvxVer=2&cMacro=https%3A%2F%2Fgoogleads.g.doubleclick.net%2Fdbm%2Fclk%3Fsa%3DL%26ai%3DCJPDjJZ1xX_f2FamkzAbL3LTwDau_vapeoru1_bEL8O7_65ACEAEg08vOMGDV5dICoAGA7P2-AsgBCakCcta2SU-Dsz6oAwGqBNkBT9AGCQUvgfXdFJ9VZ5YlA9A4IvcI09KlHAI3eTVuWKoWUMliKTEl-m6PfsNsk6C_7aoeOQbRJFARYMPu0jtdZNtZrSne5qHjS0rFNnQYPfAb8fHYxfDLtLqcV5BrSIKNUePu8QhjNFB0ZUXKV_dfzqZ_pj1wKkZurKDRvtsv8eToKbC_r-YVSTiuVxRNaftOnbAh8lOnRQ0br_Z-lqoOm7BzfInTsUrBnwtxaibJ3xqzY2QtLs5Lrn8DV6Qf-o27ljvuhyfrrSvEFk_xoaYp7ViCCzwIGCQOZMAE54ibroID4AQDkAYBoAZNgAfok4LBAYgHAZAHAqgHjs4bqAfVyRuoB5PYG6gHugaoB_DZG6gH8tkbqAfs1RuoB6a-G6gH7NUbqAfz0RuoB5bYG6gHwtob2AcA0ggJCICAgBAQAhgN8ggbYWR4LXN1YnN5bi01NDQ0Nzg2MTkxMTcwMDA2gAoDmAsByAsBgAwBsBOAis0J0BMA2BMN2BQB%26ae%3D1%26num%3D1%26cid%3DCAMSeQClSFh315iMKx2hflFO6ogmsQsnGxXrL9iY5iLW7zIAdNySeC4mTxCLPhePL1Old6LY6bep8zVC8yETO6mA3APLPkfvBXP7x9rPtaxEWcRIOInDLW290T3rGZcG6GaSZMvnODe8eoHcOpicOtXZKCAao1FRRZvUkXE%26sig%3DAOD64_3xkpbmKd2S8ZCZwBe_wCQ5omhY1Q%26client%3Dca-pub-5884294479391638%26dbm_c%3DAKAmf-AcOU1x_Ri5Jdnhq4z54Lyy45eICfyqSdoUlnpYrI96uPNHyZ2nqVZBFd6NrZFjhuA2hCH2j5Tq0wYumlpVt4nd2sZtqEGEBkwP2hglLyd2MOVMQU2sDuwRXlWwg6EMffCCAJHpPAjR2KRfDE92xRtd9GVHOw%26dbm_d%3DAKAmf-CEAYu8rO06Rnnn63Pg0JJy06rE_18KdcOA6oGEw6_QieI2EkKVZ8mr9G7Zhv3CXDKu5JvqZVMeyQAax2h2sJ6ZOqG--1kvUnRiaqoG2pxXT5DQD4trcsDG_g-1NMqOOAdOY3gdx8ozAFgHBev-tShKi-dAO-0N-jpYIa7ixRHcL2AHzDuvdnMS0h2XHD_vWeLNTpcnyngq8cIIQ8v5Q5Wopw1HxF89LNqKkEx0UtXuYt8Js8ToJi1cqt80noQ8ncdFpx_jpxpDFsIahg6WfIsPidMKy_TtLZ640imKgYT_IxxTe1mGsCmsDoLVmMgOb_Sxh1la_7Mgxsm8YNYHrMJUwUQnowVXZa6nUZdqKrV-6cV05zp4I7z7ypiDV8lqQuwbITFfhgwLtXmEoJMJ_d3T55TLVudMKK1Tu60EFIaofAtnOFIWS8QbOIwYp83vrEpI9vMPcZRnXu6LEMlaly7RRSDb-8veN1Kjuot_ueg1MfuezB3l56naSy1dXpxzCiRnkIRGNEDXTo42UcRFHfn-hEmNgNFKEgxyFywaVWUwJhz4kOOdhoUcQvxdpJL3Z3QvyIYs%26adurl%3D&r=1601281317359287&objectName=jvx_5f719d32df2bb';
											this.baseURL += '&jvxSessionId=1601281330.6717';
										if(bestFitBase['type'] == 'banner') {
						this.baseURL += '&base=1';
					}
															this.baseURL += '&loadLayout=0';
										this.baseBgType = bestFitBase['backgroundType'];
					this.baseBgURL = bestFitBase['url'];
                    this.baseURL += "&creativeResolveBeginTime="+Date.parse(creativeResolveBeginTime);
                    				} else {
					this.baseType = bestFitBase['backgroundType'];
					this.baseURL = bestFitBase['url'];
				}

				if(bestFitBase['backgroundColor'] != null && bestFitBase['backgroundColor'] != '') {
					this.baseBgColor = bestFitBase['backgroundColor'];
				} else {
					this.baseBgColor = '';
				}
				this.baseFallbackType = bestFitBase['fallbackType'];
				this.baseFallbackURL = bestFitBase['fallbackURL'];		
				this.baseFallbackFileName = bestFitBase['fallbackFileName'];

				//Todo: replace special characters, make sure that widget source is syntactically correct
 				this.baseFallbackWidgetSrc = bestFitBase['fallbackWidgetSrc'];
				
								this.baseWidth = bestFitDim.split('x')[0];
								this.baseHeight = bestFitDim.split('x')[1];
                
                                this.origBaseWidth = bestFitDim.split('x')[0];
                this.origBaseHeight = bestFitDim.split('x')[1];
                
				
								
				/*Smooth responsive and stretch variables*/
					
												this.baseDim = bestFitBase['dimension'];
				
							}
		},
		setExpandProperties:function(bestFitDim){
						var bestFitExpand = {};
			for(var auIndex in this.responsiveExpandUnitArr) {
				bestFitExpand = this.responsiveExpandUnitArr[auIndex];
				if(bestFitExpand['dimension'] == bestFitDim)
					break;
			}
			if(bestFitExpand) {
				this.expansionHasLayout = bestFitExpand['hasLayout'];
				this.expansionType = '';
				this.expansionURL = '';
				this.expansionBgType = '';
				this.expansionBgURL = '';
				this.expansionBgColor = '';
				if(this.expansionHasLayout == 1) {
					this.expansionType = 'html';
										var adUnitIdStr = '';
										this.expansionURL = 'https://as.jivox.com/unit/layout_renderer.php?creativeUnitType=22&bDim=300x600&&siteId=65c616660e0b0a&campaignId=128974&es_pId=63E14k&isDynamic=1&ap_DataSignal1=40582625&ap_DataSignal2=ABAjH0jkoUcVSP6Wxi9RTnFFP7FG&ap_DataSignal3=257913009&ap_DataSignal4=11395931134&jvxVer=2&cMacro=https%3A%2F%2Fgoogleads.g.doubleclick.net%2Fdbm%2Fclk%3Fsa%3DL%26ai%3DCJPDjJZ1xX_f2FamkzAbL3LTwDau_vapeoru1_bEL8O7_65ACEAEg08vOMGDV5dICoAGA7P2-AsgBCakCcta2SU-Dsz6oAwGqBNkBT9AGCQUvgfXdFJ9VZ5YlA9A4IvcI09KlHAI3eTVuWKoWUMliKTEl-m6PfsNsk6C_7aoeOQbRJFARYMPu0jtdZNtZrSne5qHjS0rFNnQYPfAb8fHYxfDLtLqcV5BrSIKNUePu8QhjNFB0ZUXKV_dfzqZ_pj1wKkZurKDRvtsv8eToKbC_r-YVSTiuVxRNaftOnbAh8lOnRQ0br_Z-lqoOm7BzfInTsUrBnwtxaibJ3xqzY2QtLs5Lrn8DV6Qf-o27ljvuhyfrrSvEFk_xoaYp7ViCCzwIGCQOZMAE54ibroID4AQDkAYBoAZNgAfok4LBAYgHAZAHAqgHjs4bqAfVyRuoB5PYG6gHugaoB_DZG6gH8tkbqAfs1RuoB6a-G6gH7NUbqAfz0RuoB5bYG6gHwtob2AcA0ggJCICAgBAQAhgN8ggbYWR4LXN1YnN5bi01NDQ0Nzg2MTkxMTcwMDA2gAoDmAsByAsBgAwBsBOAis0J0BMA2BMN2BQB%26ae%3D1%26num%3D1%26cid%3DCAMSeQClSFh315iMKx2hflFO6ogmsQsnGxXrL9iY5iLW7zIAdNySeC4mTxCLPhePL1Old6LY6bep8zVC8yETO6mA3APLPkfvBXP7x9rPtaxEWcRIOInDLW290T3rGZcG6GaSZMvnODe8eoHcOpicOtXZKCAao1FRRZvUkXE%26sig%3DAOD64_3xkpbmKd2S8ZCZwBe_wCQ5omhY1Q%26client%3Dca-pub-5884294479391638%26dbm_c%3DAKAmf-AcOU1x_Ri5Jdnhq4z54Lyy45eICfyqSdoUlnpYrI96uPNHyZ2nqVZBFd6NrZFjhuA2hCH2j5Tq0wYumlpVt4nd2sZtqEGEBkwP2hglLyd2MOVMQU2sDuwRXlWwg6EMffCCAJHpPAjR2KRfDE92xRtd9GVHOw%26dbm_d%3DAKAmf-CEAYu8rO06Rnnn63Pg0JJy06rE_18KdcOA6oGEw6_QieI2EkKVZ8mr9G7Zhv3CXDKu5JvqZVMeyQAax2h2sJ6ZOqG--1kvUnRiaqoG2pxXT5DQD4trcsDG_g-1NMqOOAdOY3gdx8ozAFgHBev-tShKi-dAO-0N-jpYIa7ixRHcL2AHzDuvdnMS0h2XHD_vWeLNTpcnyngq8cIIQ8v5Q5Wopw1HxF89LNqKkEx0UtXuYt8Js8ToJi1cqt80noQ8ncdFpx_jpxpDFsIahg6WfIsPidMKy_TtLZ640imKgYT_IxxTe1mGsCmsDoLVmMgOb_Sxh1la_7Mgxsm8YNYHrMJUwUQnowVXZa6nUZdqKrV-6cV05zp4I7z7ypiDV8lqQuwbITFfhgwLtXmEoJMJ_d3T55TLVudMKK1Tu60EFIaofAtnOFIWS8QbOIwYp83vrEpI9vMPcZRnXu6LEMlaly7RRSDb-8veN1Kjuot_ueg1MfuezB3l56naSy1dXpxzCiRnkIRGNEDXTo42UcRFHfn-hEmNgNFKEgxyFywaVWUwJhz4kOOdhoUcQvxdpJL3Z3QvyIYs%26adurl%3D&r=1601281317359287&objectName=jvx_5f719d32df2bb'+adUnitIdStr;
											this.expansionURL += '&jvxSessionId=1601281330.6717';
										this.expansionBgType = bestFitExpand['backgroundType'];
					this.expansionBgURL = bestFitExpand['url'];
                    				} else {
					this.expansionType = bestFitExpand['backgroundType'];
					this.expansionURL = bestFitExpand['url'];
				}
				
				var expURL = this.expansionURL;
				if(this.baseDim == "" && this.expansionHasLayout == 1){
					expURL = (expURL.indexOf("&fireViewabilityEvent=1") != -1) ? expURL : (expURL + "&fireViewabilityEvent=1");
				} else {
					expURL = (expURL.indexOf("&fireViewabilityEvent=0") != -1) ? expURL : (expURL + "&fireViewabilityEvent=0");
				}
								if(this.baseHasLayout == 1 && this.expansionHasLayout == 1){
					expURL = (expURL.indexOf("&fireCL=0") != -1) ? expURL : (expURL + "&fireCL=0");
				}
								
				if(this.baseHasLayout != 1 && this.expansionHasLayout == 1){
                    expURL = (expURL.indexOf("&creativeResolveBeginTime") != -1) ? expURL : (expURL + "&creativeResolveBeginTime="+Date.parse(creativeResolveBeginTime));
                }
				this.expansionURL = expURL;
				this.expansionBgColor = bestFitExpand['backgroundColor'];
				if(this.expansionBgColor == '' || this.expansionBgColor == null) {
					this.expansionBgColor = 'transparent';
				}

				this.expansionFallbackType = bestFitExpand['fallbackType'];
				this.expansionFallbackURL = bestFitExpand['fallbackURL'];
				this.expansionFallbackFileName = bestFitExpand['fallbackFileName'];

				//Todo: replace special characters, make sure that widget source is syntactically correct
				this.expansionFallbackWidgetSrc = bestFitExpand['fallbackWidgetSrc'];
				this.expansionWidth = bestFitDim.split('x')[0];
				this.expansionHeight = bestFitDim.split('x')[1];
								this.expDim = bestFitExpand['dimension'];
			}
		},
		onAdUnitMouseOver:function(e) {
			var that = this;			
						this.DwellRecorded = false;
			if(null == this.DwellElapsedTimer){
				this.DwellElapsedTimer = setInterval(function(){ ++that.DwellElapsedTime; }, 1000);
			}
			
			if(null == this.DwellTimer){
				var dwellTime = parseInt(60000) + 50; //adding 50ms to make sure setTimeOut is triggered after setInterval.
				this.DwellTimer = setTimeout(function(){that.recordDwellEvent(49, that.DwellElapsedTime); },dwellTime);
			}
			
			if(!this.UIRRecorded){
				this.UIRTimer = setTimeout(function(){that.recordUIREvent(48);},500);
			}
								},

		clickHandler:function(eventSrc){
			if(eventSrc){
				var eventSrcId = eventSrc.id;
				if(eventSrc.parentNode != null)
					var parentId = eventSrc.parentNode.id;
				if(eventSrcId == this.baseId || eventSrcId == this.base2Id){
										this.openClickThrough();
									} else if(eventSrcId == this.baseBgId) {
									} else if(eventSrcId == this.baseInterceptorId || eventSrcId == this.base2InterceptorId){
															this.openClickThrough();
									} else if(eventSrcId == this.expansionId){
											this.openClickThrough();
									} else if(eventSrcId == this.expInterceptorId){
											this.openClickThrough();
									} else if(eventSrcId == this.closeExpansionId){
					this.closeExpansion();
				} else if(eventSrcId == this.baseCloseId) {
					this.closeBase();
				} 
											}
		},
		mouseenterHandler:function(event){
			var eventSrc = event.target || event.srcElement;
			var fromEl = event.fromElement || event.relatedTarget;
			var toEl = event.toElement || event.relatedTarget;
			if(eventSrc){
				var eventSrcId = eventSrc.id;
				if(eventSrcId == this.baseContainerId || eventSrcId == this.baseContainerId+'0' || eventSrcId == this.countDownContainerId || eventSrcId == this.expansionContainerId || eventSrcId == this.closeExpansionId){
										var frmElId = (fromEl) ? fromEl.id : "";
					if(frmElId != this.expansionContainerId && frmElId != this.expansionId && frmElId != this.closeExpansionId
					 && frmElId != this.expInterceptorId && frmElId != this.expansionLoaderId){
						
						if(eventSrcId == this.baseContainerId || eventSrcId == this.baseContainerId+'0'){
							this.onBaseMouseOver();
						}
						if(this.expansionOpen){
							if(frmElId != this.baseContainerId && frmElId != this.baseContainerId+'0' && frmElId != this.baseId 
							 && frmElId != this.baseInterceptorId){
																this.onAdUnitMouseOver();
															}
						}else{
														this.onAdUnitMouseOver();
													}
					}
										
										this.allowExpToExpand = false;
									}
			}	
		},
		mouseleaveHandler:function(event){
			var eventSrc = event.target || event.srcElement;
						var fromEl = event.fromElement || event.relatedTarget;
						var toEl = event.toElement || event.relatedTarget;
			if(eventSrc){
				var eventSrcId = (eventSrc.id) ? eventSrc.id : "";
				if(eventSrcId == this.baseContainerId || eventSrcId == this.baseContainerId+'0' || eventSrcId == this.countDownContainerId || eventSrcId == this.expansionContainerId || eventSrcId == this.closeExpansionId){
				 
					var frmElId = (fromEl) ? fromEl.id : "";
					var toElId = (toEl) ? ((toEl.id) ? toEl.id : "") : "";
										if(eventSrcId == this.baseContainerId || eventSrcId == this.baseContainerId+'0'){
						this.onBaseMouseOut();
					}
										if((frmElId == this.expansionContainerId || frmElId == this.expansionId || frmElId == this.closeExpansionId 
					 || frmElId == this.expInterceptorId || frmElId == this.expansionLoaderId) && (toElId != this.baseContainerId && toElId != this.baseContainerId+'0' && toElId != this.baseId && toElId != this.baseInterceptorId)){
					 
												this.onAdUnitMouseOut();
											}else if((frmElId == this.baseContainerId || frmElId == this.baseContainerId+'0' || frmElId == this.baseId 
					 || frmElId == this.baseInterceptorId) && (toElId != this.expansionContainerId && toElId != this.expansionId && toElId != this.closeExpansionId && toElId != this.expansionLoaderId && toElId != this.expInterceptorId)){
						
												this.onAdUnitMouseOut();
											}
										
										this.allowExpToExpand = true;	// allows expansion to expand - tells whether the mouseout on adUnit happened really. #M-4891.
									}
			}
		},
		visibilityStateHandler:function(){
			if(document.visibilityState == "hidden"){
				// hasHidden = true;
			}else{
							}
		},
		onWindowResize:function(){
						if(this.leaveBehindOnVpOut && !this.isAdInOriginalState){		
			this.leaveBehindTheAd(this.leaveBehindOnVpOut,this.leaveBehindScalePer,this.leaveBehindXVal,this.leaveBehindYVal,'','1',true);
		}
																			        		},
		eventController:function(event){
			var eventSrc = event.target || event.srcElement;
			var eventType = event.type;
			if(eventType == 'click'){
				this.clickHandler(eventSrc);
			} 
						else if(eventType == 'resize'){
				this.onWindowResize();
			} else if(eventType == 'orientationchange'){
				this.onWindowResize();
			} else if(eventType == 'visibilitychange'){
				this.visibilityStateHandler();
			} else if(eventType == 'mouseenter'){
				this.mouseenterHandler(event);
			} else if(eventType == 'mouseleave'){
				this.mouseleaveHandler(event);
			}
					},
		delegateEvents:function(){
			var that = this;
						addEvent(getElById(this.baseContainerId), "mouseenter", that.listenerCallback, false);
			addEvent(getElById(this.baseContainerId), "mouseleave", that.listenerCallback, false);
							
														
			addEvent(document, "click", that.listenerCallback, false);
			addEvent(window, "resize", that.listenerCallback, false);
			addEvent(window, "orientationchange", that.listenerCallback, false);
						var browserName = this.browserName;
			if((browserName == 'Safari') || (browserName == 'iPhone') || (browserName == 'iPod') || (browserName == 'iPad')){
				addEvent(document, "visibilitychange", that.listenerCallback, false);
			}
		},
		listenerCallback:function(event) {
			jvx_5f719d32df2bb.eventController(event); 
		},
        removeEvents:function(){
			var that = this;
			var elArr = [{"el":window,"eventTypeArr":["resize","orientationchange","load"]},
						 {"el":document,"eventTypeArr":["click","mouseover","mouseout","visibilitychange"]}];
			var elLen = elArr.length;
            for(var i = 0;i < elLen;i++){
            	var eventLen = elArr[i]["eventTypeArr"].length;
				for(var j = 0;j < eventLen;j++){
					removeEvent(elArr[i]["el"],elArr[i]["eventTypeArr"][j],that.listenerCallback, false);
				}
			}
		},
                        onBaseReady:function(){
                                    if(this.baseHasLayout == 1 && this.baseURL){
                this.renderBase();
            }
                                },
                isLayoutURLReady:function(){
			        },
		getElById:function(id){
			return getElById(id);
		},
		createDivNode:function(id){
			return createDivNode(id);
		},
		appendNode:function(parentNode, childNode){
            return parentNode.appendChild(childNode);
		},
		addEvent:function(el, event, fn, capture){
            return addEvent(el, event, fn, capture);
		},
		autoExpand:function(){
                        this.openExpansion(true);
                        var self = this;
            this.autoExpandTimerRef = setTimeout(function(){self.closeExpansion(true);},7 * 1000);
                    },
                        queryStringToJSON:function(url) {
            if(!url || url.indexOf("?") == -1) return false;
            var queryString = url.split("?")[1];
            var pairs = queryString.split('&');        
            var result = {};
            pairs.forEach(function(pair) {
                pair = pair.split('=');
                result[pair[0]] = (pair[1] || '');
            });
                        return JSON.parse(JSON.stringify(result));
        },
                jsonToQueryString:function(obj){
            var str = "";
            for (var key in obj) {
              if (obj.hasOwnProperty(key)) {
                var val = obj[key];
                str += "&" + key + "=" + val;
              }
            }
                        return str.slice(1);
        },
                updateURLWithCJSData : function(qsJson,updateQs,base){
                        qsJson = jvxCopyObject(qsJson,updateQs);
            qsStr = this.jsonToQueryString(qsJson);
            if(base){
                this.baseURL = this.baseURL.split("?")[0] + "?" + qsStr;
            } else {
                this.expansionURL = this.expansionURL.split("?")[0] + "?" + qsStr;
            } 
        },
                jvxCallback: function(updateQs){
            var baseQsJson = this.baseURL ? this.queryStringToJSON(this.baseURL) : "";
            var expQsJson = this.expansionURL ? this.queryStringToJSON(this.expansionURL) : "";
            if(this.baseHasLayout == 1 && this.baseURL && baseQsJson) {
                this.updateURLWithCJSData(baseQsJson,updateQs,1);
            }
            if(this.expansionHasLayout == 1 && this.expansionURL && expQsJson){
                this.updateURLWithCJSData(expQsJson,updateQs,0);
            }
            this.onBaseReady();
        },
                
                        
                		init:function(){
						
						
						this.renderAdUnitContainer(); 
			            			            this.renderBaseContainer();
			
			
											this.renderBase();
                                								
			
			
						
						
												
		/*	
					*/	
								//	console.log("Load exp");
			
			 

			 
			
			
 			this.delegateEvents();
																		
													var visibilityThreshold = this.origBaseWidth * this.origBaseHeight > 242500 ? 0.3 : 0.5;
				if(!validateVal(this.baseHasLayout) || (this.baseDim == "" && !validateVal(this.expansionHasLayout)))
				adViewabilityDetectInit(visibilityThreshold);
					}
	};
	return CreativeUnit;
})();


var jvx_5f719d32df2bb = new CreativeUnit("_5f719d32df2bb");
jvx_5f719d32df2bb.DYReportingKey = "";
jvx_5f719d32df2bb.DYSegmentName = "";
	if(NonMraidTagInMraidEnv){
				jvx_5f719d32df2bb.recordEvent(75);
	}
    jvx_5f719d32df2bb.init();

(function(jvxObject){
    	var playerParamsMap = jvxObject.playerParamsMap;
    var jvxCallback = function(updateQs,criteoCallback){
                var modifiedApParams = {};
		if(!criteoCallback){
			jvxObject.cJsExecuted = 1;
			jvxObject.asyncTaskList['custom-pre-processing'] = 1;
			jvxObject.asyncCompletedTaskCount++;
		}
        if(updateQs){
                        for (var key in updateQs) {
              if (updateQs.hasOwnProperty(key)) {
                if(key.indexOf("ap_") == 0){
                    modifiedApParams[key] = updateQs[key];
                }
              }
            }
                        jvxObject.jvxCallback(modifiedApParams);
            var apParamsAll = jvxObject.apParamsArr;
                        apParamsAll = jvxCopyObject(apParamsAll,modifiedApParams);
                        for (var key in apParamsAll) {
              if (apParamsAll.hasOwnProperty(key)) {
                jvxObject.apParamsInEventFormat += "/" + key + "_" + apParamsAll[key]; 
              }
            }
        }
    };
	jvxObject.cJsExecuted = 0;
    var geoVal, geoRt, baseLang, geo_value, base_value, bwrLang, geoLang, converterID_Val, bestsellerID_Val;
var DS1 = playerParamsMap.ap_DataSignal1;
window["callPlatformFn"] = callPlatformFn;
var s = document.createElement("script");
	s.src = "https://traffick.jivox.com/jivox/serverAPIs/resolveDynamicData.php?var=geo:geo.country&ap_gdpr=0&callback=callPlatformFn";
	document.body.appendChild(s);	
function callPlatformFn(myObj){
		var geoVal_1 = myObj['geo:geo.country'];
		if(geoVal_1 == 'czechia'){
			geoVal = 'czech republic';
		}else{
			geoVal = geoVal_1;
		}
		function getDataResponse(geoData){
			geo_value = {'united kingdom':'english','germany':'german','france':'french','italy':'italian','spain':'spanish','netherlands':'dutch','canada':'english','australia':'english','poland':'polish','belgium':'dutch','sweden':'swedish','russia':'russian','chile':'spanish','mexico':'spanish','denmark':'danish','hungary':'hungarian','ireland':'english','switzerland':'german','new zealand':'english','norway':'norwegian','romania':'english','south africa':'english','austria':'german','portugal':'portuguese','czech republic':'czech','finland':'english','luxembourg':'french','slovenia':'english','bulgaria':'english','croatia':'english','egypt':'english','morocco':'french','puerto rico':'spanish','saudi arabia':'english','slovakia':'english','united arab emirates':'english','israel':'english','turkey':'turkish','greece':'greek'};
			
			var geoIndex = geo_value[geoData];
			if(geoIndex != undefined){
				geoRt = geoData;
				baseLang = geoIndex;
			}else{
				geoRt = "NA";
				baseLang = "NA";
			}
			
		function detectIE() {
			var ua = window.navigator.userAgent;
			var msie = ua.indexOf('MSIE ');
			if (msie > 0) {
				// IE 10 or older => return version number
				return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
			}
			var trident = ua.indexOf('Trident/');
			if (trident > 0) {
				// IE 11 => return version number
				var rv = ua.indexOf('rv:');
				return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
			}
			var edge = ua.indexOf('Edge/');
			if (edge > 0) {
			   // Edge (IE 12+) => return version number
			   return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
			}
			// other browser
			return false;
		}
		if(detectIE()){
			//If IE
			var bwrLanguages = window.navigator.language;
			var bwrLanguagesx = bwrLanguages.split(',');
		}else{
			// If Not IE
			var bwrLanguages = window.navigator.languages;
			var bwrLanguagesx = bwrLanguages.join(',').split(',');
		}		
		var bwrLanguage = bwrLanguagesx[0].replace("-","_");
		var bwrLang_value = {en_US:'english',en_AU:'english',en_CA:'english',en:'english',en_IN:'english',en_NZ:'english',en_ZA:'english',en_GB:'english',nl:'dutch',de:'german',de_AT:'german',de_DE:'german',de_LI:'german',de_CH:'german',es:'spanish',es_AR:'spanish',es_CL:'spanish',es_CO:'spanish',es_CR:'spanish',es_HN:'spanish',es_419:'spanish',es_MX:'spanish',es_PE:'spanish',es_ES:'spanish',es_US:'spanish',es_UY:'spanish',es_VE:'spanish',da:'danish',el:'greek',hu:'hungarian',it_CH:'italian',it_IT:'italian',it:'italian',fr:'french',fr_CA:'french',fr_FR:'french',fr_CH:'french',nb:'norwegian',nn:'norwegian',pl:'polish',ru:'russian',ca:'catalan',sv:'swedish',tr:'turkish',cs:'czech',pt:'portuguese',pt_BR:'portuguese',pt_PT:'portuguese'}
		
		var bwrLang_ = bwrLang_value[bwrLanguage];
		if(bwrLang_ != undefined){
			bwrLang = bwrLang_;
		}else{
			bwrLang = 'NA';
		}
		var geo_lang_ = geoRt+"_"+bwrLang;
		var geo_lang_val = {'switzerland_english':1,'switzerland_french':1,'switzerland_german':1,'switzerland_italian':1,'spain_spanish':1,'spain_catalan':1,'belgium_french':1,'belgium_german':1,'belgium_dutch':1,'czech republic_czech':1,'czech republic_english':1,'luxembourg_french':1,'luxembourg_english':1,'luxembourg_german':1,'united kingdom_english':1,'germany_german':1,'france_french':1,'italy_italian':1,'netherlands_dutch':1,'canada_english':1,'australia_english':1,'poland_polish':1,'sweden_swedish':1,'russia_russian':1,'chile_spanish':1,'denmark_danish':1,'mexico_spanish':1,'hungary_hungarian':1,'ireland_english':1,'new zealand_english':1,'norway_norwegian':1,'romania_english':1,'south africa_english':1,'austria_german':1,'portugal_portuguese':1,'finland_english':1,'slovenia_english':1,'bulgaria_english':1,'croatia_english':1,'egypt_english':1,'morocco_french':1,'puerto rico_spanish':1,'saudi arabia_english':1,'slovakia_english':1,'united arab emirates_english':1,'israel_english':1,'turkey_turkish':1,'greece_greek':1};
		
		if(geo_lang_val[geo_lang_] == 1){
			geoLang = geo_lang_;
		}else{
			geoLang = geoRt + "_"+baseLang;
		}
		if(geoRt == "NA"){
			geoLang = "NA_NA";
		}
		return geoLang;
	}
	
	var converterID = {26964030:1,26964031:1,26964022:1,26964023:1,28227002:1,28227004:1,28220571:1,28220572:1,12598632:1,12598893:1,12598896:1,12598898:1,12598900:1,12598902:1,12598917:1,12598919:1,12598922:1,12598928:1,12598930:1,12598932:1,12594761:1,12598903:1,12598912:1,12598914:1,34258974:1,34260817:1,34260869:1,34263917:1,34263965:1,34264538:1,34264837:1,34265785:1,34265840:1,34266491:1,34266539:1,34267387:1,34261999:1,34264498:1,34264608:1,34264655:1,34260869:1,34267387:1,34264498:1,38972117:1,38974196:1,38974880:1,38974980:1,36401334:1,36401349:1,36401097:1,36401112:1,36000599:1,36000614:1,36392745:1,36392760:1,36000653:1,36000668:1,36401469:1,36401684:1,34266548:1,34368026:1,34261998:1,34261993:1,34260825:1,34909227:1,34260869:1,34260829:1,34260827:1,34261997:1,36864122:1,36874391:1,36874406:1,36876649:1,37149697:1,37150449:1,37150464:1,37150479:1,40161973:1,40579606:1,40633030:1,40640511:1,40640626:1,40580428:1,40582072:1,40582993:1,40581051:1,40607848:1,40583472:1,40642266:1,40616583:1,40644412:1,40606316:1,40608869:1,40720075:1};
	if(converterID[DS1] == 1){
		converterID_Val = DS1;
	}else{
		converterID_Val = 'undefined';
	}
	var bestsellerID = {
		27813739:1,27813746:1,28219778:1,28220273:1,28220274:1,28220278:1,28220279:1,28220481:1,28220485:1,28220486:1,28220488:1,28220489:1,28220490:1,28220497:1,28220498:1,28220499:1,28220502:1,28220510:1,28220512:1,28220937:1,28220938:1,28220942:1,28220949:1,28220962:1,28220963:1,28220967:1,28220978:1,28220979:1,28223562:1,28223563:1,28223564:1,28223565:1,28223566:1,28223567:1,28226986:1,28226987:1,28226988:1,28226989:1,28226990:1,28226991:1,28226992:1,28226993:1,28226994:1,28227006:1,28227007:1,28227008:1,28227009:1,28227010:1,28227011:1,28227012:1,28227013:1,36000601:1,36000606:1,36000607:1,36000608:1,36000609:1,36000610:1,36000611:1,36000654:1,36000655:1,36000660:1,36000661:1,36000662:1,36000663:1,36000664:1,36000665:1,36392747:1,36392752:1,36392753:1,36392754:1,36392755:1,36392756:1,36392757:1,36401099:1,36401104:1,36401105:1,36401106:1,36401107:1,36401108:1,36401109:1,36401336:1,36401341:1,36401342:1,36401343:1,36401344:1,36401345:1,36401346:1,36401470:1,36401471:1,36401476:1,36401477:1,36401478:1,36401479:1,36401680:1,36401681:1
	};
	if(bestsellerID[DS1] == 1){
		bestsellerID_Val = "bestseller";
	}else{
		bestsellerID_Val = 'undefined';
	}
	var final_res = getDataResponse(geoVal);
	
	var jvxQueryString = {"ap_geoLang" : final_res, "ap_DataSignal7" : final_res , "ap_DataSignal8" : converterID_Val, "ap_bestsellerID" : bestsellerID_Val, "ap_gdpr":0};
	jvxCallback(jvxQueryString);
}    
    })(jvx_5f719d32df2bb);

/*! srcdoc-polyfill - v0.1.1 - 2013-03-01
* http://github.com/jugglinmike/srcdoc-polyfill/
* Copyright (c) 2013 Mike Pennisi; Licensed MIT */
(function(t,e){var c,n,o=t.srcDoc,r=!!("srcdoc"in e.createElement("iframe")),i={compliant:function(t,e){e&&t.setAttribute("srcdoc",e)},legacy:function(t,e){var c;t&&t.getAttribute&&(e?t.setAttribute("srcdoc",e):e=t.getAttribute("srcdoc"),e&&(c="javascript: window.frameElement.getAttribute('srcdoc');",t.setAttribute("src",c),t.contentWindow&&(t.contentWindow.location=c)))}},s=t.srcDoc={set:i.compliant,noConflict:function(){return t.srcDoc=o,s}};if(!r)for(s.set=i.legacy,n=e.getElementsByTagName("iframe"),c=n.length;c--;)s.set(n[c])})(this,this.document);

}




/* Jivox � 2020 */
