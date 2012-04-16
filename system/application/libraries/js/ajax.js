var ajax = {

	ajaxDoing : false, // true if ajax requesting
	ajaxDebug : true,
	ajaxController : 'ajax', // CI controller name
	ajaxMethod : null, // form, script, xml, null - AUTO
	ajaxTimeout : 60, // timeout sec
	ajaxQueue : [], // Queue requests. Used if sync
	ajaxSync : false, // synchron / asynchron load queue // FIX
	ajaxHP : 0, // AJAX history pointer

	
	// timeout control (timeout block control)
	tob : new Array(),
	

	/** HTML block loader
	* block - id block to output result & info about processing 
	* method - php method
	* param - php method param
	* directLink - link for error. If '' - do not out
	* arguments[4] - call back func
	* arguments[5] - load info. If null or '' - do not out
	* arguments[6] - timeout. If null or 0 get global
	* arguments[7] - loader method. If null or '' set AUTO 
	* arguments[8] - alternative block ID for loading information
	* arguments[9] - history
	* arguments[10]
	*/
	//var ajax.doLoad = function (block)
	doLoad : function(block)
	{   
		settings = jQuery.extend(
			{
				loadInfo : '',
				timeout : ajax.ajaxTimeout,
				loadMethod : ajax.ajaxMethod,
				infoBlock : block.block,
				callback : '',
				hist : true,
				method : 'sample',
				param : '',
				directLink : '',
				controller : ajax.ajaxController,
				file : ''
			}, block
		);	
		method = settings.method;
		param = settings.param;
		directLink = settings.directLink;
		callback = settings.callback;
		loadInfo = settings.loadInfo;
		timeout = settings.timeout;
		loadMethod = settings.loadMethod;
		hist = settings.hist;
		infoBlock = settings.infoBlock;
		controller = settings.controller;
		block = settings.block;
		file = settings.file;
//		alert(file);
		
		ajax.loader(
			controller,
			block, 
			method, 
			param, 
			directLink, 
			callback, 
			loadInfo, 
			timeout, 
			loadMethod, 
			infoBlock, 
			hist,
			file);
	},
	
//	start : function(controller, block, method, param, directLink, callback, loadInfo, timeout, loadMethod, infoBlock, hist)
//	{
//		setTimeout(function() { 
//					
////				alert(block+' '+method);
//			
//				ajax.loader(
//					controller,
//					block, 
//					method, 
//					param, 
//					directLink, 
//					callback, 
//					loadInfo, 
//					timeout, 
//					loadMethod, 
//					infoBlock, 
//					hist);
//			}, 0);		
//	},
	
	loader : function(controller, block, method, param, directLink, callback, loadInfo, timeout, loadMethod, infoBlock, hist, file)
	{
		var req = new JsHttpRequest();
		
		// double requested. cleaned timeout timer
		if (ajax.tob[block] != null)
		{
			ajax.ajaxDoing = false;
			clearTimeout(ajax.tob[block]);
			ajax.tob[block] = null;
		}
		
		timerID = setTimeout(function() { ajax.loadTimeOut( controller, block, method, param, directLink, callback, loadInfo, timeout, loadMethod, infoBlock, hist, file);}, (timeout * 1000));
		ajax.tob[block] = timerID;
		
		// 0 - uninit
		// 1 - loading
		// 2 - loaded
		// 3 - interactive
		// 4 - complite
		req.onreadystatechange = function()
		{	
			// HTML - HTML resp
			// JS - JS resp
			if (req.readyState == 4 && ajax.tob[block] != null)
			{
				if (hist == true)
				{
					dhtmlHistory.add("aj"+ajax.ajaxHP+(Math.random()*1000000), 
						{						
							controller : controller, 
							block : block, 
							method : method, 
							param : param, 
							directLink : directLink, 
							callback : callback, 
							loadInfo : loadInfo, 
							timeout : timeout, 
							loadMethod : loadMethod, 
							infoBlock : infoBlock,
							file : file
						}
						);
//					alert(block+' '+method);
					ajax.ajaxHP++;
					//alert('Добавлено в историю');
	/*				debug("A history change has occurred: "
	        			+ "newLocation=aj"
	        			+ ", historyData="+new Array(block, method, param, directLink, callback,
							loadInfo, timeout, loadMethod, infoBlock), 
			        	true);*/
				}
				if (req.responseJS != null)
				{
					if (req.responseJS.HTML != null)
					{
						// Write result to page element ($_RESULT become responseJS).
						$('#' + block).html(req.responseJS.HTML);
						if (block != infoBlock)
							$('#' + infoBlock).html('');
						//document.getElementById(block).innerHTML = req.responseJS.HTML;
					}
					if (req.responseJS.JS != null)
					{
						eval(req.responseJS.JS);
					}
					if (req.responseJS.HTML != null && callback != null && callback != '')
					{
						eval(callback)(req.responseJS, controller, block, method, param, directLink, callback, loadInfo, timeout, loadMethod, infoBlock, hist, file);
					}
				}
//						
	//			$('#' + infoBlock).append().html("<div style=\"border: dashed 1px red\">" + req.status + "</div>");
				if (ajax.ajaxDebug && req.responseText != "")
				{
					// Write debug information too.
					$('#' + infoBlock).append().html("<div style=\"border: dashed 1px red\">" + req.responseText + "</div>");
					
				}
				
				
				// for sync
				ajax.ajaxDoing = false;
				clearTimeout(ajax.tob[block]);
				ajax.tob[block] = null;
				
				if (block == 'sr')
					reinitialiseScrollPane();
			
				if (typeof pageTracker == 'object')
					pageTracker._trackPageview("/"+controller+"/"+method+"/"+param);
			}
		};
		// Allow caching (to avoid different server queries for 
		// identical input data). Caching is always disabled if
		// we are uploading a file.
		req.caching = false;
		// Prepare request object (automatically choose GET or POST).
		
		//alert(method+ " - " +controller + ' - ' + param);
		req.open(loadMethod, '/' + controller + '/' + method + "/?ctl=1", true);
		// Send data to backend.
//		alert (file);document.getElementById(file)
		req.send( {'method': method, 'param':  param, 'upl': file} );
		if (loadInfo != '')
			$('#' + infoBlock).html(loadInfo);	
	},
	
	loadTimeOut : function(controller, block, method, param, directLink, callback, loadInfo, timeout, loadMethod, infoBlock, hist, file)
	{
		ajax.ajaxDoing = false;
		ajax.tob[block] = null;
		
		if (directLink != '')
//			ajax.doLoad(
//			{
//				block : block,
//				method : method,
//				param : param,
//				directLink : directLink,
//				callback : callback,
//				loadInfo : loadInfo,
//				timeout : timeout,
//				loadMethod : loadMethod,
//				hist : hist,
//				infoBlock : block
//			});
			$('#' + infoBlock).html(a_loadError + " <a href=\"\" onclick=\"ajax.doLoad({"
				+'block : \''+block+'\','
				+'method : \''+method+'\','
				+'param : \''+param+'\','
				+'directLink : \''+directLink+'\','
				+'callback : \''+callback+'\','
				+'loadInfo : \''+loadInfo+'\','
				+'timeout : \''+timeout+'\','
				+'loadMethod : \''+loadMethod+'\','
				+'hist : '+hist+','
				+'infoBlock : \''+block+'\','
				+'file : \''+file
			+"'});return false;\">Reload.</a> <a href=\"" 
				+ directLink + "\">" + a_directLink + "</a>");
		else
			$('#' + infoBlock).html(a_loadError);
	},
	
	
	// Browser history control
	ajaxListener : function(newLocation, historyData) 
	{
		if (historyData != null && typeof(historyData) == 'object')
		{
			ajax.doLoad({
					controller : historyData.controller, 
					block : historyData.block, 
					method : historyData.method, 
					param : historyData.param, 
					directLink : historyData.directLink, 
					callback : historyData.callback, 
					loadInfo : historyData.loadInfo, 
					timeout : historyData.timeout, 
					loadMethod : historyData.loadMethod, 
					infoBlock : historyData.infoBlock,
					hist : false,
					file : historyData.file
				});
		}
	}
	
	/// for sync
	/*
	var doing = 'false';
	var arr = new Array();
	
	function queue__()
	{
		if (arr.length == 0)
		{
			$('#message').hide();
			return;
		}
		if (doing == 'false')
		{
			doing = 'true';
			tmp = arr[0];
			doLoad2(tmp[0], tmp[1], tmp[2], tmp[3], tmp[4]);
			tmp = arr.shift();
			$('#message').find("span").text(" ............ [" + arr.length + "]");
			query();
		}
		else
		{
			setTimeout(function() { query(); }, 100);
		}
	}
	
	function doLoad__(block, param, param2, param3, status)
	{
		tmp = new Array(block, param, param2, param3, status);
		arr.push(tmp);
		setTimeout(function() { queue(); }, 10);
	}
	
	function doLoadArr__(arr2)
	{
		arr = arr.concat(arr2);
		setTimeout(function() { queue(); }, 10);
	}
	*/	
};

$(document).ready(function()
{
	if (!$.browser.safari)
	{
		historyStorage.reset();
		dhtmlHistory.initialize();
		dhtmlHistory.addListener(ajax.ajaxListener);
	}
});

