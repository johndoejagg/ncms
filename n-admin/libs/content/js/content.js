$(document).ready(function(){
  $("#content > nav").append($("#navextend"));
  $('#toggleRightSidebar').on('click', function () {
      $('.wrapper').toggleClass('rightsidebaractice');
  });
  content.build(contents, title);
});

var h={
  e:function(type,content,cl="",attr=""){
    return '<'+type+' class="'+cl+'" '+attr+'>'+content+"</"+type+">";
  },
  div:function(content, cl="",attr=""){
    return h.e("div",content,cl);
  },
  elm:function(content,cl="",nav=[]){
    return h.div((nav.length>0 ? h.nav(nav) : "")+h.div(content,"innner"),"_elm"+(cl!="" ? " "+cl : ""))
  },
  nav:function(elms){
    var c=[];
    for(var i=0; i<elms.length; i++){
      c.push(h.div(elms[i][0],elms[i][1]));
    }
    return h.div(c.join(""),"navbar");
  }
}

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
    },
    addElement:function(elm,i){
      switch (elm.type) {
        case "title":
          $("#contentbuilder").append(h.div(h.e("textarea",elm.val,"","placeholder='"+LANG.enterTitle+"'"),"main_title"));
          break;
        case "headline":
          $("#contentbuilder").append(h.elm(h.e("textarea",elm.val,"","placeholder='"+LANG.enterTitle+"'"),"headline",[["h1",""],["h2",""],["h3",""],["h4",""],["h5",""],["h6",""]]));
          break;
        default:
          console.log("Sorry, we are out of " + expr + ".");
      }

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
