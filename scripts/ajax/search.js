 var Search={};

Search.succesSearch=function(jsonData){
    var placeToAppend=$('#resultsearch');
    $(placeToAppend).show();
    $(placeToAppend).empty();
    for(var i=0;i<jsonData.length;i++){
        var rootElement=$('<div class="row" class="rootresult" style="margin-bottom:15px;"></div>');
        var imageUser=$('<img style="height:35px;width:35px;margin-left:15px;margin-right:8px;" src="'+jsonData[i]['photo']+'" class="photowhensearch">');
        var nomPrenom=$('<a href="http://localhost/projetDSI/view/sessionfriend.php?id='+jsonData[i]['id_user']+'"><strong class="nomprenomforsearch">'+jsonData[i]['nom_prenom']+'</strong></a>');
        $(placeToAppend).append($(rootElement).append(imageUser).append(nomPrenom));

           
    }

};


Search.getResults=function(champ){
    $.ajax({
        url:'http://localhost/projetDSI/controller/mains/search.php',
        type:'POST',
        dataType:'json',
        data:'content='+$(champ).val(),
        success:function(jsonData){
          console.log(jsonData);
          Search.succesSearch(jsonData);
        }
    });
};


