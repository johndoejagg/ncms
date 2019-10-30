<div id="templates">


  <div class="elm title">
    <textarea placeholder="<?php echo LANG["enterTitle"]?>"></textarea>
  </div>


  <div class="elm headline">
    <textarea class="headline"><h[[var]]>[[val]]</h[[var]]></textarea>
  </div>


  <div class="elm text">
    <textarea class="editor">[[text]]</textarea>
  </div>


  <div class="elm quote">
    <textarea>[[text]]</textarea>
    <textarea>[[relation]]</textarea>
  </div>


  <div class="elm image">
    <img src="[[src]]">
    <textarea>[[title]]</textarea>
  </div>


  <div class="elm gallery">
    <div class="nav"><button class="add"><i class="far fa-plus-square"></i></button></div>
    <div class="items">
        <div class="item">
          <div class="nav">
            <div class="move"><button class="prev"><i class="fas fa-arrow-left"></i></button><button class="next"><i class="fas fa-arrow-right"></i></button></div>
            <input class="title" value="[[item.title]]">
          </div>
          <img src="[[item.thump]]" data-link="[[item.big]]">
        </div>
    </div>
 </div>



</div>
