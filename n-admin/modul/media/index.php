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
        for(var i=1; i<entrys.length-1; i++){
          html.push(fileBrowser.createElement(entrys[i]));
        }
        $("#fileBrowser .browser").html(html.join(""));
        $("#fileBrowser .entry.folder").click(function(){
          fileBrowser.dir=fileBrowser.dir+"/"+$(this).find(".name").text();
          fileBrowser.reloadList();
        })
      }
    },
    createElement:function(name){
      if(name==".."||name.split(".").length==1){
        if(name!=".."){
          return "<div class='entry folder'><div class='icon'></div><div class='name'>"+name+"</div></div>";

        }else if(fileBrowser.dir!="")return "<div class='entry folder'><div class='icon'></div><div class='name'>"+name+"</div></div>";
      }else{
        var ext=name.split(".")[name.split(".").length-1];

      }
    },

    rebuildDirStructure:function(dir){
      fileBrowser.dir=dir;
      var parts=dir.split("/");
      $("#fileBrowser .address").html("");
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
<style>
  #fileBrowser .entry{
    display: inline-block;
    width: 200px;
    height:220px;
    position: relative;
    margin:0 15px 15px 0;
    border: 1px solid #ccc;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    cursor:pointer;
  }
  #fileBrowser .entry .name{
    position: absolute;
    width: 200px;
    bottom:0px;
    color:#fff;
    left:0px;
    padding:0 5px;
    background:rgba(0,0,0,0.7);
  }
</style>
<div id="fileBrowser">
  <div class="nav">
    <span class="add"></span>
    <span class="addFolder"></span>
    <span class="delete"></span>
    <div class="address"></div>
  </div>
  <div class="browser"></div>
</div>
