$(document).ready(function() {
  $(".url_ajax").click(function(){
    LoadAjaxContent($(this).attr('data-href'));
  });
});


function GetaContajax(id){
    LoadAjaxContentDash($('#'+id).attr('data-href'));
    $('.btnajax').removeClass('btnajax-select');
    $('#'+id).addClass('btnajax-select');
}


function LoadAjaxContentDash(url){
  LoaderConstAjax(url,1);
  $.ajax({
    mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
    url: url,
    type: 'GET',
    success: function(data) {
      $('#cont-ajax-dash').html(data);
      LoaderConstAjax(url,2);
      TopCero();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alerterror(errorThrown);
      LoaderConstAjax(url,2);
    },
    dataType: "html",
    async: false
  });
}

function LoadAjaxContent(url){
  LoaderConst(url,1);
  $.ajax({
    mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
    url: url,
    type: 'GET',
    success: function(data) {
      $('#ajax-content').html(data);
      LoaderConst(url,2);
      TopCero();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alerterror(errorThrown);
      LoaderConst(url,2);
    },
    dataType: "html",
    async: false
  });
}



function LoaderConst(id,type){
  id = CryptoJS.MD5(id);
  if(type==1)
  {
    $( "#content" ).before( '<div class="loader-cont" id="loader_'+id+'"><div class="reverse-spinner"></div></div>' );
  }
  else{
  	setTimeout(function(){ $( "#loader_"+id ).remove(); }, 1000);
  }
}

function LoaderConstAjax(id,type){
  id = CryptoJS.MD5(id);
  if(type==1)
  {
    $( "#ajax-content" ).before( '<div class="loader-cont" id="loader_'+id+'"><div class="reverse-spinner"></div></div>' );
  }
  else{
    setTimeout(function(){ $( "#loader_"+id ).remove(); }, 1000);
  }
}

function TopCero(){
    if($("#sidebarToggleTop").is(":visible"))
    {
      $('#sidebarToggleTop').trigger( "click" );
    }
}

function loadertooglebtn(element,tipo){
    var divloader = '<div id="loader-d" class="spinner-border text-primary m-1"></div>';
    if(tipo==1)
    {
        $("#"+element).parent().append(divloader);
        $("#"+element).hide();
    }
    else{
        $("#loader-d").remove();
        $("#"+element).show();
    }
    
}