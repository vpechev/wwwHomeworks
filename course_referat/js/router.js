$(document).ready(function(){
    var self = this;
    
    function hideAllContentContainers(){
        // if($("#contacts-container").css('display') != 'none') return $("#contacts-container").fadeOut("slow");
        return $(".allowed-hiding").fadeOut("slow");
    };
    
    function changeContent(srcId, targetId){
        $( "#" + srcId ).on("click", function(){
            $.when(hideAllContentContainers()).done(function(){
                $( "#" + targetId).fadeIn("slow");
            });
        });    
    }
    
    
    $("#home-link").on("click", function(){
        hideAllContentContainers();
    });

	changeContent("home-link", "home-container");   

	changeContent("contacts-link", "contacts-container");   
    changeContent("jquery-overview-link", "jquery-overview-container");   
    changeContent("jquery-installation-link", "jquery-installation-container");   
	changeContent("jquery-selectors-link", "jquery-selectors-container");   
	changeContent("jquery-properties-link", "jquery-properties-container");   
	changeContent("jquery-events-link", "jquery-events-container");   
	changeContent("jquery-chaining-link", "jquery-chaining-container");   
    changeContent("jquery-ajax-link", "jquery-ajax-container");
    changeContent("jquery-plugins-link", "jquery-plugins-container")
	changeContent("jquery-summary-link", "jquery-summary-container");

       
	changeContent("javascript-link", "common-javascript-container");   
	changeContent("ajax-link", "common-ajax-container");   
	changeContent("plugin-link", "common-plugin-container");   
	changeContent("dom-link", "common-dom-container");   
});