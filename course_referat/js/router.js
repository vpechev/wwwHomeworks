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

	changeContent("contacts-link", "contacts-container");   
    changeContent("jquery-overview-link", "jquery-overview-container");   
    changeContent("jquery-installation-link", "jquery-installation-container");   
	changeContent("jquery-selectors-link", "jquery-selectors-container");   
    
});