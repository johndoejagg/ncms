<script>

  var fileBrowser={
    dir:"",
    init:function(){
      fileBrowser.reloadList();
    },
    reloadList:function(){
      $.ajax("?m=media&no=1&f=api&a=list&dir="+fileBrowser.dir,function(){alert("done")})
    }
  }



  $(document).ready(function(){
    fileBrowser.init();
  });
</script>
