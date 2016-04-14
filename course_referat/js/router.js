$(document).ready(function(){
    var self = this;
    
    function hideAllContentContainers(){
        if($("#contacts-container").css('display') != 'none')
            return $("#contacts-container").fadeOut("slow");
        if($("#jquery-overview-container").css('display') != 'none')
            return  $("#jquery-overview-container").fadeOut("slow");
    };
    
    function changeContent(srcId, targetId){
        $( "#" + srcId ).on("click", function(){
            $.when(hideAllContentContainers()).done(function(){
                $( "#" + targetId).fadeIn("slow");
            });
        });    
    }
    
	changeContent("contacts-link", "contacts-container");   
	changeContent("jquery-overview-link", "jquery-overview-container");   
           
       
    
});