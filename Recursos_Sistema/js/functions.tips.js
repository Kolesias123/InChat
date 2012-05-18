/*!
 * InfoSmart JavaScript - Tips
 *
 * Archivo plugin para Tips de InfoSmart.
 *
 * Copyright © 2012 - InfoSmart and jQuery Techonology
 * http://www.infosmart.mx/
 * http://www.jquery.com/
 *
 * Requerimientos: jQuery, InfoSmart JavaScript Kernel.
*/

InfoTips = 
{
	_init: false,
	_ready: false,
	
	Init: function(settings) 
	{
		if(this._init)
			return;
		
		s = {
			id: 'data-title',
			background: '0, 0, 0, .8',
			color: 'white',
			size: '11',
			width: '200',
			clean: true,
			clearTime: 200
		};
		
		for(var param in settings)
			s[param] = settings[param];
		
		if(s.id == "")
			s.id = "data-title";
		
		$("*[" + s.id + "]").live("mousemove", function(e) 
		{
			T = $(this);
			Msg = T.attr(s.id);

			if(Msg == "" || Msg == undefined)
				return;
			
			if(this._ready)
			{
				Top = e.pageY;
				Left = e.pageX;

				$(".Info-tip").css("top", Top + 10);
				$(".Info-tip").css("left", Left + 10);

				return;
			}
					
			if(s.clean == true)
				Msg = Kernel.CleanText(Msg);
				
			Top = e.pageY;
			Left = e.pageX;
				
			$("#page").append('<div class="Info-tip">' + Msg + '</div>');
				
			$(".Info-tip").css("top", Top + 10);
			$(".Info-tip").css("left", Left + 10);
			$(".Info-tip").fadeIn("slow");
				
			if(s.background != "")
				$(".Info-tip").css("background", "rgba(" + s.background + ")");
				
			if(s.color != "")
				$(".Info-tip").css("color", s.color);
					
			if(s.size != "" && Kernel.IsNumeric(s.size))
				$(".Info-tip").css("font-size", s.size + "px");
			
			if(s.width != "")
				$(".Info-tip").css("max-width", s.width + "px");					
				
			this._ready = true;
		});
		
		$("*[" + s.id + "]").live("mouseleave", function() 
		{
			if(!this._ready)
				return;
				
			T = $(this);
					
			if(s.clearTime > 0)
			{
				setTimeout(function() {
					$(".Info-tip").fadeOut("slow", function() {						
						$(".Info-tip").remove();
					});
				}, s.clearTime);
			}
			else				
				$(".Info-tip").remove();
			
			this._ready = false;
		});

		this._init = true;
	},
	
	Destroy: function()
	{
		$(".Info-tip").remove();
	}
	
};