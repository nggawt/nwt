@extends('dashboard.layout.admin_master')

@section('title')
 עורך דף
@endsection

@section('styles')
  <link href="{{ URL::to('dashboard/styles/color-picker.css') }}" rel="stylesheet" type="text/css">
  <!-- <link href="color-picker.min.css" rel="stylesheet"> -->

  <style type="text/css">
    /*.popup-kelly-color{
      position: relative;
      top: 0;
    }*/
  </style>
@endsection
<?php
  $icons = [
    [
      "name" => "גרור",
      "move" => "glyphicon glyphicon-move"
    ],
    [
      "name" => "כווץ",
      'e-resize' => "glyphicon glyphicon-resize-small"
    ],
    [
      'name' => 'מתח',
      'nesw-resize' => "glyphicon glyphicon-resize-full"
    ],
    [
      'name' => 'כווץ או מתח אופקי',
      'col-resize' => "glyphicon glyphicon-resize-horizontal"
    ],
    [
      'name' => 'כווץ או מתח אנכי',
      'row-resize' => "glyphicon glyphicon-resize-vertical"
    ],
    [
      'name' => 'תצוגה מקדימה',
      'full-screen' => "glyphicon glyphicon-fullscreen"
    ],
    [
      'name' => 'הסר',
      'remove' => "glyphicon glyphicon-remove"
    ],
    [
      'name' => 'סמן',
      'marker' => "glyphicon glyphicon-map-marker"
    ],
    [
      'name' => 'נעל',
      'lock' => "icon-lock"
    ],
    [
      'name' => 'שחרר נעילה',
      'unlock' => "icon-unlocked"
    ],
    [
      'name' => 'שכפל',
      'copy' => "glyphicon glyphicon-duplicate"
    ],
    [
      'name' => 'ישר אלמנט למטה',
      'align-bottom' => "glyphicon glyphicon-object-align-bottom"
    ],
    [
      'name' => 'ישר אלמנט למעלה',
      'align-top' => "glyphicon glyphicon-object-align-top"
    ],
    [
      'name' => 'ישר אלמנט לימין',
      'align-right' => "glyphicon glyphicon-object-align-right"
    ],
    [
      'name' => 'ישר אלמנט לשמאל',
      'align-left' => "glyphicon glyphicon-object-align-left"
    ],
    [
      'name' => 'ישר אלמנט אנכי',
      'align-vertical' => "glyphicon glyphicon-object-align-vertical"
    ],
    [
      'name' => 'ישר אלמנט אופקי',
      'align-horizontal' => "glyphicon glyphicon-object-align-horizontal"
    ]
  ];
  $arrayList = [
   "content_sections" => ["section","article","aside","header","nav","footer","hgroup","h1","h2","h3","h4","h5","h6","address"],
   "text_content" => ["blockquote","div","dd","dl","dt","figcaption","figure","hr","li","main","ol","p","pre","ul"],
   "inline_text" => ["a","b","br","code","em","i","mark","s","samp","small","span","strong","time"],
   "form" => ["button","datalist","fieldset","form","input","label","legend","meter","optgroup",
              "option","output","progress","select","textarea"],
   "tabe_content" => ["caption","col","colgroup","table","tbody","td","th","thead","tfoot","tr"],
   "image_multimedia" => ["area","audio","img","map","track","video"],
   "embedded_content" => ["embed","object","param","source"],
   "scripting" => ["canvas","noscript","script"]
  ];
  function createListItems($listElems){
    $elems = "";
    foreach($listElems as $key => $value){
      if($key === "Table content") $elems .= '<div class="clearfix"></div> ';
      $elems .= '<div class="col-sm-3"> ';
      $elems .= "<li><h4>$key</h4><hr></li> ";
      foreach($listElems[$key] as $resValue){
        $elems .= "<li><code data-type=\"$key\">$resValue</code></li> ";
      }
      $elems .= '</div>';
    }
    return $elems;
  }

  function createToolsSet($tools){
    $elem = "";
    foreach($tools as $tool){
      $key = key(array_except($tool,['name']));
      $elem .= "<div class='col-sm-6 tools-set'> ";
      $elem .= "<div class='row target'> ";
      $elem .= "<div class='col-sm-12 target-div'> ";
      $elem .= "<p class='p-target'> {$tool['name']} </p> ";
      $elem .= "</div> ";
      $elem .= "<div class='col-sm-12 cols'> ";
      $elem .= "<span id='span-target' class='$tool[$key]' data-type='$key' aria-hidden='true'></span> ";
      $elem .= "</div> </div> </div>";
      //$elem = key(array_except($tool,['name']));
    }
    return $elem;
  }
?>
@section('admin_nav')
  @include('dashboard.includes.user-profile')

<div class="tools col-sm-12">
    <!--**************first row********** -->
    
    <!--**************third row********** -->
    <h4>מוד</h4>
    <div class="row">
      <div class="col-sm-6 tools-set">
        <div class="row target">
            <div class="col-sm-12 target-div">
              <p class="p-target">
                <bold>נורמל מוד</bold>
              </p>
            </div>
            <div class="col-sm-12 cols"> 
              <span id="normal-mod" class="glyphicon glyphicon-unchecked" data-type="normal" aria-hidden="true"></span>
            </div>
        </div>
      </div>
      <div class="col-sm-6 tools-set">
        <div class="row target">
            <div class="col-sm-12 target-div">
              <p class="p-target">
                <bold>עריכת מוד</bold>
              </p>
            </div>
            <div class="col-sm-12 cols"> 
              <span id="normal-mod" class="glyphicon glyphicon-pencil" data-type="edit" aria-hidden="true"></span>
            </div>
        </div>
      </div>
    </div>
    <h4>כלי עריכה</h4>
    <hr>
    <div class="row">
      
      {!! createToolsSet($icons) !!}
    </div>
  <hr>
</div>
  
@endsection

@section('tools')

<div class="tools row">
    <!--**************first row********** -->
    <h4>כלי עריכת אובייקט</h4>
    <div class="col-sm-6">
        <div class="col-sm-2 tools-set">
          <div class="row">
            <div class="col-sm-12">
              <p>צור אלמנט</p>
            </div>
            <div class="col-sm-12 cols">
                
              <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               בחר אלמנט <span style="color: rgba(180,180,180,1);" class="caret"></span>
              </button>
              <ul class="dropdown-menu" style="text-align: center;width: 600px;right: 0;">

                {!! createListItems($arrayList) !!}

              </ul>
            </div>
          </div>
        </div>
        <!-- /*********** set 1 ****************/ -->
        <div class="col-sm-2 tools-set">
          <div class="row">
            <div class="col-sm-12">
              <p class="p-target">בחר גודל (רוחב וגובה)</p>

            </div>
            <div class="col-sm-12 cols">
                
              <input list="widthNheights" name="widthNheight" class="form-control" />
                <datalist id="widthNheights">
                  <option value="320x568">
                  <option value="320x480">
                  <option value="360x640">
                  <option value="480x800">
                  <option value="720x1280">
                  <option value="1024x768">
                  <option value="768x1024">
                  <option value="1280x720">
                  <option value="1280x800">
                  <option value="1280x1024">
                  <option value="1360x768">
                  <option value="1366x768">
                  <option value="1440x900">
                  <option value="1680x1050">
                  <option value="1600x900">
                  <option value="1920x1080">
                  <option value="1920x1200">
                </datalist>
            </div>
          </div>
        </div>
        <div class="col-sm-3 tools-set">
          <div class="row">
            <div class="col-sm-12">

              <p class="p-target">בחר צבע <span class="caret"></span></p>
            </div>
            <div class="col-sm-12 cols" style="height: 110%;direction: ltr; top: 40px; background: rgba(60,60,60,1);">
              <input style="margin: 15px 0;" type="text" name="color1" class="form-control" value="#xxx" />
              <input  type="color" name="color2" class="form-control" />
            </div>
          </div>
        </div>
        <div class="col-sm-2 tools-set">
          <div class="row">
            <div class="col-sm-12">
              <p class="p-target">שמור</p>
            </div>
            <div class="col-sm-12 cols">
              <button  type="button" name="color2" class="form-control">שמור</button>
            </div>
          </div>
        </div>
        <div class="col-sm-2 tools-set">
          <div class="row">
            <div class="col-sm-12">
              <p class="p-target">מחק הכל</p>
            </div>
            <div class="col-sm-12 cols">
              <button  type="button" name="color2" class="form-control btn btn-danger" onclick="clearStorag()">מחק הכל</button>
            </div>
          </div>
        </div>
    </div>
    <!-- <div class="col-sm-6">
      <p>kujkljoi;ji;odsf</p>
    </div> -->
</div>
@endsection

@section('scripts')
<!-- <script src="{{ URL::to('dashboard/scripts/interactsjs.js') }}"></script>  -->
<!-- <script src="{{ URL::to('dashboard/scripts/html5kellycolorpicker.min.js') }}"></script> -->

<script src="{{ URL::to('dashboard/scripts/page-creator.js') }}"></script> 
<!-- <script src="{{ URL::to('dashboard/scripts/interact.js') }}"></script>  -->
<!-- <script src="{{ URL::to('dashboard/scripts/html5kellycolorpicker.min.js') }}"></script> -->
<script>
  //var picker = new CP(document.getElementById('color-picker'));
  // var rgb;

 /* new KellyColorPicker({
      place : 'color-picker',
      input : 'color'
  });*/
   /*var colorPickerT = new KellyColorPicker({ 
       place : 'test-color-picker-triangle',    
       input : 'color', 
       size : 150, 
       color : '#ffffff',
       method : 'triangle',
       input_color : false, // or inputColor (sice v1.15)
       input_format : 'mixed', // or inputFormat (since v1.15)
       alpha : 1,
       alpha_slider : false, // or alphaSlider (since v1.15)
       colorSaver : false,
       userEvents : { change : function(self) {
          // set background color for 'input' to current color of color picker
          if(self.getCurColorHsv().v < 0.5){
              self.getInput().style.color = "#FFF";
          } else {
              self.getInput().style.color = "#000";
          }

          self.getInput().style.background = self.getCurColorHex();   
      }}
  });*/
  // attaches by class
        //var colorpickers = KellyColorPicker.attachToInputByClass('colorpicker', {alpha_slider : true, size : 200});
        // setTimeout(function() {colorpickers[1].destroy();}, 2000);
        // var elemCls = document.querySelector('popup-kelly-color');
        //console.log(colorpickers.getCanvas());



  // picker.on("drag", function(color) {
  //   this.target.value = '#' + color;
  // });

</script>
@endsection
                        