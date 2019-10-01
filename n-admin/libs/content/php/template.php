<div id="templates">


  <div id="title" data-type="title">
    <textarea placeholder="<?php echo LANG["enterTitle"]?>">[[text]]</textarea>
  </div>


  <div class="elm" data-type="headline">
    <textarea>[[text]]</textarea>
  </div>


  <div class="elm" data-type="text">
    <textarea>[[text]]</textarea>
  </div>


  <div class="elm" data-type="gallery">
    <div class="nav"><button class="add"><i class="far fa-plus-square"></i></button></div>
    <div class="items">
    ((foreach item))
        <div class="item">
          <div class="nav">
            <div class="move"><button class="prev"><i class="fas fa-arrow-left"></i></button><button class="next"><i class="fas fa-arrow-right"></i></button></div>
            <input class="title" value="[[item.title]]">
          </div>
          <img src="[[item.thump]]" data-link="[[item.big]]">
        </div>
    ((/foreach))
    </div>
 </div>



</div>
