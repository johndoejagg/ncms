$(document).ready(function(){
  $("#content > nav").append($("#navextend"));
  $('#toggleRightSidebar').on('click', function () {
      $('.wrapper').toggleClass('rightsidebaractice');
  });
  content.build(contents, title);
});



var content={

  contents:[],
  title:"",

  //start
  build:function(contents, title){
    content.contents=contents;
    content.title=title;
    content.builder.fill();
  },

  //builder
  builder:{
    fill:function(){
      content.builder.addElement({type:"title",val:content.title});
      for(var i=0; i<content.contents.length; i++){
        content.builder.addElement(content.contents[i],i);
      }
      tinymce.init({
       selector: 'textarea.editor',
       plugins:"link",
       toolbar1: 'undo redo | bold italic | link',
       menubar: false
     });

    },
    addElement:function(elm,i){
      $("#contentbuilder").append(content.builder.fillElement(elm));
    },
    fillElement:function(elm){
      var html=$("#templates .elm."+elm.type).html();
      for(var propertyName in elm) {
        html=html.split("[["+propertyName+"]]").join(elm[propertyName]);
        console.log(html);
      }
      return html;
    },
    addDialog:function(){

    }
  },

  data:{
    collect:function(){

    },
    save:function(){

    }
  }

}
