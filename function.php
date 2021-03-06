<?php

//
// Content-box
//
function Content($num,$url,$text,$imagetag){
  $html = '
            <div class="content-box cont-image-'.$imagetag.'">
              <input type="hidden" value="'.$num.'" />
              <a href="'.$url.'" class="content-box-inner">
                <div class="content-box-link"></div>
              </a>
              <div class="content-box-lay">
                <a href="'.$url.'">'.$text.'</a>
              </div>
            </div>

  ';
  echo $html;
}


//
// Content-fixed
//
function ContentFixed($num,$text,$func,$color,$description,$imagetag){
  $html = '<div class="content-fixed content-fixed-num'.$num.'" style="background-color:'.$color.'">
          <div class="content-fixed-inner">
            <div class="content-fixed-image">
              <div class="content-fixed-image-inner">
                <div class="cont-fixed-image cont-image-'.$imagetag.'">

                </div>
              </div>
            </div>

            <div class="content-fixed-overview">
              <div class="content-fixed-title">
                <div class="content-fixed-title-inner">
                  <h3>'.$text.'</h3>
                </div>
              </div>
              <div class="content-fixed-func">
                <div class="content-fixed-func-inner">
                  <ul>
                    ';
              foreach ($func as $value) {
                  $html .= '<li>'.$value.'</li>';
              }
    $html .= '
                  </ul>
                </div>
              </div>
            </div>

          </div>
          <div class="content-fixed-description">
            <p>
            '.$description.'
            </p>
          </div>
        </div>
        ';
  echo $html;
}

//
// News-Content
//
function news($list){
  foreach ($list as $key => $value) {
    echo '<tr>';
    echo '<td class="time">'.$value["time"].'</td>';
    echo '<td class="data">'.$value["data"].'</td>';
    echo '</tr>';
  }
}

function functext($list){
  foreach ($list as $value) {
    echo '<li>'.$value.'</li>';
  }
}


//
// Image template
//
function imagecss($imagetag){
  echo '
      .cont-image-'.$imagetag.'{
        background: url(./images/'.$imagetag.'.jpg);
        background-size: cover;
        background-position:center;
      }
  ';
}

//
// ContentFirst　start
//
function ContentFirst($list){

  echo '<style>';
  foreach ($list as $value) {
    imagecss($value["imagetag"]);
  }

  echo '</style>';
  foreach ($list as $value) {
    ContentFixed($value['num'],$value['name'],$value["func"],$value["color"],$value["description"],$value["imagetag"]);
  }

  echo '
    <div class="content-first">
      <h3>Contents</h3>
      <div class="content-first-inner">
  ';
  foreach ($list as $value) {
    Content($value['num'],$value['url'],$value['name'],$value['imagetag']);
  }
  echo '</div></div>';
}

//
// SmartPhone
//
function smartphone(){
  echo '<h1 style="color:black; background-color: yellow; width: 20%; margin: 0 auto;">
    SmartPhone 用ページは工事中です。
    <br />
    しばらくお待ちください。
  </h1>';
  exit;
}



function VisitorsCount(){
  $dns = "mysql:host=127.0.0.1;dbname=Homepage_log;charset=utf8";
  $pdo = new PDO($dns,"testuser","");
  $agent = $_SERVER["HTTP_USER_AGENT"];
  $addr = $_SERVER["REMOTE_ADDR"];
  $sql = "insert into `Data_log` (`USER_AGENT`,`REMOTE_ADDR`,`Datetime`) values('".$agent."','".$addr."',now());";
  $stmh = $pdo -> prepare($sql);
  $stmh->execute();
}
 ?>
