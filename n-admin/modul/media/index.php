<script>

  var fileBrowser={
    dir:"",
    init:function(){
      fileBrowser.reloadList();
    },
    reloadList:function(){
      $.ajax("?m=media&no=1&f=api&a=list&dir="+fileBrowser.dir).done(function(list){fileBrowser.build(list)})
    },
    build:function(list){
      var entrys=list.split("\n");
      if(entrys[0].substr(0,5)=="error"){
        alert(entrys[0]);
      }else{
        fileBrowser.rebuildDirStructure(entrys[0].split("dir:")[1]);
        var html=[];
        for(var i=1; i<entrys.length; i++){
          html.push(fileBrowser.createElement(entrys[i]));
        }
        $("#fileBrowser .browser").html(html);

      }
    },
    createElement:function(name){
      if(name==".."||name.split(".").length==1){
        return "<div class='entry'><div class='icon folder'></div><div class='name'>"+name+"</div></div>";
      }else{
        var ext=name.split(".")[name.split(".").length-1];
        
      }
    },

    rebuildDirStructure:function(dir){
      alert("listing:"+dir)
      fileBrowser.dir=dir;
      var parts=dir.split("/");
      $("#fileBrowser .address").append("<span>upload<span>");
      for(var i=0; i<parts.length; i++){
        $("#fileBrowser .address").append("<span>"+parts[i]+"<span>");
      }
    }
  }



  $(document).ready(function(){
    fileBrowser.init();
  });
</script>
<div id="fileBrowser">
  <div class="nav">
    <span class="add"></span>
    <span class="addFolder"></span>
    <span class="delete"></span>
    <div class="address"></div>
  </div>
  <div class="browser"></div>
</div>
