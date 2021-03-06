<!-- подключение к базе данных, БД = programms -->
<?php
  require 'rb.php';
  R::setup( 'mysql:host=localhost;dbname=programms','tester', '123456789' );
  session_start();
?>
<!-- Start of document -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- every session has "code_name", which generate further. Now it doesn't carry any useful payload, but in future... -->
  <title>
    <?php
    if (isset($_SESSION['code_name'])){
      echo 'Server/'.$_SESSION['code_name'];
    }
    else{
      echo "Server";
    }
     ?>
  </title>
  <!-- connect some css-files with any styles. In future these files will edited -->
  <link rel="stylesheet" href="css/styles.css"> <!-- main style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> <!-- google font -->
  <link rel="stylesheet" href="css/main_window.css"> <!-- style for main_window -->



  <!--линки, присоединяющие основные code mirror файлы: -->
  <script src="codemirror/lib/codemirror.js"></script>
  <link rel="stylesheet" href="codemirror/lib/codemirror.css">
  <script src="codemirror/mode/markdown/markdown.js"></script>



  <!-- линки, присоединяющие различные языки-->
  <!-- More languags will be added in the next versions of Server -->
  <script src="codemirror/mode/python/python.js"></script>
  <script src="codemirror/mode/php/php.js"></script>
  <script src="codemirror/mode/clike/clike.js"></script>






  <!-- линки, присоединяющие различные темы-->
  <!-- Absolutley ready -->
 <link rel="stylesheet" href="codemirror/theme/3024-day.css">
 <link rel="stylesheet" href="codemirror/theme/3024-night.css">
 <link rel="stylesheet" href="codemirror/theme/abcdef.css">
 <link rel="stylesheet" href="codemirror/theme/ambiance.css">
 <link rel="stylesheet" href="codemirror/theme/base16-dark.css">
 <link rel="stylesheet" href="codemirror/theme/bespin.css">
 <link rel="stylesheet" href="codemirror/theme/base16-light.css">
 <link rel="stylesheet" href="codemirror/theme/blackboard.css">
 <link rel="stylesheet" href="codemirror/theme/cobalt.css">
 <link rel="stylesheet" href="codemirror/theme/colorforth.css">
 <link rel="stylesheet" href="codemirror/theme/dracula.css">
 <link rel="stylesheet" href="codemirror/theme/duotone-dark.css">
 <link rel="stylesheet" href="codemirror/theme/duotone-light.css">
 <link rel="stylesheet" href="codemirror/theme/eclipse.css">
 <link rel="stylesheet" href="codemirror/theme/elegant.css">
 <link rel="stylesheet" href="codemirror/theme/erlang-dark.css">
 <link rel="stylesheet" href="codemirror/theme/gruvbox-dark.css">
 <link rel="stylesheet" href="codemirror/theme/hopscotch.css">
 <link rel="stylesheet" href="codemirror/theme/icecoder.css">
 <link rel="stylesheet" href="codemirror/theme/isotope.css">
 <link rel="stylesheet" href="codemirror/theme/lesser-dark.css">
 <link rel="stylesheet" href="codemirror/theme/liquibyte.css">
 <link rel="stylesheet" href="codemirror/theme/lucario.css">
 <link rel="stylesheet" href="codemirror/theme/material.css">
 <link rel="stylesheet" href="codemirror/theme/mbo.css">
 <link rel="stylesheet" href="codemirror/theme/mdn-like.css">
 <link rel="stylesheet" href="codemirror/theme/midnight.css">
 <link rel="stylesheet" href="codemirror/theme/monokai.css">
 <link rel="stylesheet" href="codemirror/theme/neat.css">
 <link rel="stylesheet" href="codemirror/theme/neo.css">
 <link rel="stylesheet" href="codemirror/theme/night.css">
 <link rel="stylesheet" href="codemirror/theme/oceanic-next.css">
 <link rel="stylesheet" href="codemirror/theme/panda-syntax.css">
 <link rel="stylesheet" href="codemirror/theme/paraiso-dark.css">
 <link rel="stylesheet" href="codemirror/theme/paraiso-light.css">
 <link rel="stylesheet" href="codemirror/theme/pastel-on-dark.css">
 <link rel="stylesheet" href="codemirror/theme/railscasts.css">
 <link rel="stylesheet" href="codemirror/theme/rubyblue.css">
 <link rel="stylesheet" href="codemirror/theme/seti.css">
 <link rel="stylesheet" href="codemirror/theme/shadowfox.css">
 <link rel="stylesheet" href="codemirror/theme/solarized.css">
 <link rel="stylesheet" href="codemirror/theme/the-matrix.css">
 <link rel="stylesheet" href="codemirror/theme/tomorrow-night-bright.css">
 <link rel="stylesheet" href="codemirror/theme/tomorrow-night-eighties.css">
 <link rel="stylesheet" href="codemirror/theme/ttcn.css">
 <link rel="stylesheet" href="codemirror/theme/twilight.css">
 <link rel="stylesheet" href="codemirror/theme/vibrant-ink.css">
 <link rel="stylesheet" href="codemirror/theme/xq-dark.css">
 <link rel="stylesheet" href="codemirror/theme/xq-light.css">
 <link rel="stylesheet" href="codemirror/theme/yeti.css">
 <link rel="stylesheet" href="codemirror/theme/idea.css">
 <link rel="stylesheet" href="codemirror/theme/darcula.css">
 <link rel="stylesheet" href="codemirror/theme/zenburn.css">




</head>
<!-- Start of main body -->
<body>
  <!-- Start of header -->
  <header>
    <!-- Only name of projects. Now is "Server",but in next versions name can be changed -->
    <div class="header_logo_name">
      <p>Server</p>
    </div>
    <!--  Start of some labels. In plain language it is menu -->
    <nav class="my_nav">
      <div class="menu">
        <a href="">ABOUT</a>
        <a href="main_window.php">NEW CODE</a>
        <a href="">PROBLEMS?</a>
        <!-- Part of menu, which responsible for checking of logged status of user -->
        <?php
        if (isset($_SESSION['logged_user'])){
          echo  '<a href="user_menu.php" >'.$_SESSION['logged_user']->Login.'</a>';
        }
        else{
          echo '<a href="index.php">SIGN UP</a>';
          echo '<a href="LOG_IN.php">LOG IN</a>';
        }
        ?>


        <!-- <a href="SIGN_UP.php">SIGN UP</a> -->
        <!-- <a href="LOG_IN.php">LOG IN</a> -->
        <a href="" id="menu_icon" class="icon">&#9776;</a>  <!-- For adaptive site(future) -->
      </div>
    </nav>
  </header>
<!-- End of header -->

<!-- Start  of main part of main_window -->
  <main>


    <div class="main_window"  >
      <!-- form, which will be send with using post-method -->
   <form class="" action="main_window.php" method="post">

      <p>Окно ввода текста</p>  <!--Just text -->

      <!-- Window, where user can change or switch programming language -->
      <!-- !!!!Now this part of code doesn't use all PL, but it's will be added in future -->
      <!--
        How added programming language?
        1) Find this type of programming language in codemirror.net
        2) Understand, how work programming language in their site
        3) Import css file to main_window css-links
        4) Import name of programming language and return-value to this part of code

        <<option value="return-value">name_of_programming_language</option>
      -->

      <h5>Выбор языка:</h5>
      <select name="select_lang" id = "select_lang" onchange="selectLang()" >
        <?php
        function select_lang($lang){
          if ($lang == 'text/x-java')
            return 'Java';
          else if($lang == 'python')
            return 'Python';
          else if ($lang == 'text/x-c++src')
            return 'C++';
          else
            return 'Выберите язык';
        }
        $lang = $_POST['select_lang'];
        echo '<option value ="'.$lang.'">'.select_lang($lang).'</option>';
        ?>
        <option value="text/x-java"><h3>Java</h3></option>
        <option value="text/x-c++src"><h3>C++</h3></option>
        <option value="python"><h3>Python</h3></option>
      </select>

      <br>
      <!-- Window, where user can change or switch theme of programming "IDE" -->
      <!-- Absolutley ready -->
      <h5>Выбор темы:</h5>
      <select name="select_theme" id="select_theme" onchange="selectTheme()">
        <option selected>default</option>
        <option>3024-day</option>
        <option>3024-night</option>
        <option>abcdef</option>
        <option>ambiance</option>
        <option>base16-dark</option>
        <option>base16-light</option>
        <option>bespin</option>
        <option>blackboard</option>
        <option>cobalt</option>
        <option>colorforth</option>
        <option>darcula</option>
        <option>dracula</option>
        <option>duotone-dark</option>
        <option>duotone-light</option>
        <option>eclipse</option>
        <option>elegant</option>
        <option>erlang-dark</option>
        <option>gruvbox-dark</option>
        <option>hopscotch</option>
        <option>icecoder</option>
        <option>idea</option>
        <option>isotope</option>
        <option>lesser-dark</option>
        <option>liquibyte</option>
        <option>lucario</option>
        <option>material</option>
        <option>mbo</option>
        <option>mdn-like</option>
        <option>midnight</option>
        <option>monokai</option>
        <option>neat</option>
        <option>neo</option>
        <option>night</option>
        <option>oceanic-next</option>
        <option>panda-syntax</option>
        <option>paraiso-dark</option>
        <option>paraiso-light</option>
        <option>pastel-on-dark</option>
        <option>railscasts</option>
        <option>rubyblue</option>
        <option>seti</option>
        <option>shadowfox</option>
        <option>solarized dark</option>
        <option>solarized light</option>
        <option>the-matrix</option>
        <option>tomorrow-night-bright</option>
        <option>tomorrow-night-eighties</option>
        <option>ttcn</option>
        <option>twilight</option>
        <option>vibrant-ink</option>
        <option>xq-dark</option>
        <option>xq-light</option>
        <option>yeti</option>
        <option>zenburn</option>
      </select>



      <!-- Mini php code, which responsible for transfer code, when page was updated -->
      <?php
        if(isset($_POST['RUN_button']))
          $msg = htmlspecialchars($_POST['main_textarea']);
      ?>
        <!-- brrrrrrrr  -->
        <br>
        <!-- brrrrrrrr again -->
        <br>

        <!-- features, which responsible with  accounts. Will be implemented in next week -->
        <div class="folders">
          Здесь будут находиться папки, настройки и так далее
        </div>

        <!-- Main text_area, when user will be write programming code -->
        <!-- Main text_area edited by codemirror css- and js- files -->
        <!--Code from last unupdated page transfer to this "new" textarea  -->
        <div class="main_textarea_">
          <!-- <br> -->
            <textarea  name="main_textarea"   id="main_window" ><?php echo @$msg?></textarea>
          <br>

        </div>
        <!-- Console  -->
        <!-- In future -->
        <div class="things">
          <textarea name="console" class="console" id = "console"></textarea>
          <br>
        </div>

          <!-- BIG RUN BUTTON  -->
          <br>
          <div class="RUN_button">
            <input type="submit" name="RUN_button" value="run"  >
          </div>



        </form>
        <!-- End of POST-form -->
        <hr>

        <!-- main php code -->
        <!-- OK, go with GOD -->
        <?php
        if (isset($_POST['RUN_button'])){
          $name_of_file = 'test';   // Name of file. Now is "test", because Server in stage of development. In future name will be generated by user
          $msg = $_POST['main_textarea'];   //Msg from main_textarea
          $lang = $_POST['select_lang']; // Lang from lang
          $output = array(); // Just announcement of output variable

          /*
            How work compilation and start code (only now, in future, with account features will be diffirent)
            1) Choose of programming language ($lang = $_POST['select_lang'];)
            2) Open file name + extension of file (.cpp, .py, .java....)
            3) executable any commands on linux-bash(linux-terminal)
            4) necessarily write on bash-command "2>&1", so that error information write to output too
            5) display output information with using foreach


          */
          // Function for generate random 6-char name
          function RandomName(){
            $bytes = openssl_random_pseudo_bytes(6);
            $hex = bin2hex($bytes);
            return $hex;
          }

          if (!(isset($_SESSION['code_name'])))
            $_SESSION['code_name'] =  RandomName();
          // integration code to DATAbase, now its useless, in future i think, its will be useless too
          $code =  R::dispense('codes');
          $code->id_code = $_SESSION['code_name'];
          $code->text = $msg;
          $code->code_lang = $lang;
          if (isset($_SESSION['logged_user']))
            $code->user = $_SESSION['logged_user'];
          $code->input = '';
          $code->output = '';
          R::store($code);
        }

          if ($lang == 'text/x-c++src'){
            $name_of_file = $_SESSION['code_name'];
            $name_of_file = $name_of_file.'.cpp';
            $file = fopen($name_of_file, w);
            fwrite($file, $msg);
            //$output = array();
            system("./create_file.out ".$name_of_file." users/".$_SESSION['logged_user']->Login.'/'.$name_of_file);
            system("rm ".$name_of_file);
            exec("g++ users/".$_SESSION['logged_user']->Login.'/'.$name_of_file." -o"." users/".$_SESSION['logged_user']->Login."/a.out 2>&1", $output);
            //system("g++ ".$name_of_file." -o a.out", $output);
            exec("./users/".$_SESSION['logged_user']->Login."/a.out", $output);

            foreach ($output as $value) {
              echo $value."<br>";
            }
            /*if ($output == array()){
              exec("./users/".$_SESSION['logged_user']->Login."/a.out", $output);
              //print_r ($output);
              foreach ($output as $value) {
                echo $value."<br>";
              }
            }
            else{
              //print_r ($output);
              foreach ($output as $value) {
                echo $value."<br>";
              }
            }*/
          }

          elseif ($lang =="text/x-java") {
            $name_of_file = "Main.java";
            $file = fopen($name_of_file, w);
            fwrite($file, $msg);
            //$output = arraу();
            exec("javac ".$name_of_file, $output);
            if ($output == array()){
                exec("java Main", $output);
                print_r($output);
            }
            else{
              print_r($output);
            }
          }
          elseif ($lang == "python") {
            $name_of_file = $name_of_file.'.py';
            $file = fopen($name_of_file, w);
            fwrite($file, $msg);
            //$output = array();
            exec("python3.6 ".$name_of_file." 2>&1", $output);
            //print_r($output);

            foreach ($output as $value) {
              echo $value."<br>";
            }
          }

        // realy???????? button??????
        // oh f*ck
        else {
          echo "Кнопка не нажата, для копмиляции нажмите кнопку выше, в следующих версиях убрать эту надпись";
        }

        ?>



    </div>




  </main>

<!-- Scripts on JS -->
<!-- CopyPaste from codemirror -->
<script>
  var editor = CodeMirror.fromTextArea(document.getElementById("main_window"), {
    lineNumbers: true,  // показ нумерации строчек
    styleActiveLine: true, // не знаю, но надо узнать что это
    matchBrackets: true, //подсвечивать парные скобки
    mode: "text/x-java",   // изначальный язык
    indenUnit: 4, // размер табуляции
    viewportMangin: 50,
  });
  var input = document.getElementById("select_theme");
  function selectTheme() {
    var theme = input.options[input.selectedIndex].textContent;
    editor.setOption("theme", theme);
    location.hash = "#" + theme;
  }
  
  var choice = (location.hash && location.hash.slice(1)) ||
               (document.location.search &&
                decodeURIComponent(document.location.search.slice(1)));
  if (choice) {
    input.value = choice;
    editor.setOption("theme", choice);
  }
  CodeMirror.on(window, "hashchange", function() {
    var theme = location.hash.slice(1);
    if (theme) { input.value = theme; selectTheme(); }
  });


  function selectLang(){
    var lang = document.getElementById("select_lang").value;
    editor.setOption("mode", lang);
  }

editor.setSize(1100,500);

</script>
<!-- setSive is very important!!!!!!!!!!!! -->


  <script src="/js/scripts.js">  </script>
</body>
</html>
