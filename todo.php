
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Todo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/my-script.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        
</head>
<body>      
  <header class="header">
  <a href="index.php" class="exit">Exit</a>
    <div class="layout">
            <h1>Personal TODO LIST</h1>
    </div>

  </header>
    <?php  
    $host = "db3.ho.ua";
    $user = "rubygarage";
    $pass = "awdasd";
    $db="rubygarage";
    // Производим попытку подключения к серверу MySQL:
    $dbcnx=@mysql_connect($host, $user, $pass); 
    if (!$dbcnx) //если дескриптор равен 0, соединение не установлено 
    { 
    exit("<p>В настоящий момент сервер базы данных недоступен</p>"); 
    } 

// Выбираем базу данных:
mysql_select_db($db)//параметр в скобках ("имя базы, с которой соединяемся")
 or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");
      $result2 = mysql_query("SELECT projects FROM users WHERE id='".$_GET['id']."'"); 
      $arr=json_decode(mysql_fetch_array($result2)['projects']);
      //var_dump($arr[1]->task[0]->task_name);
      // var_dump($arr);
     ?>    
  <div class="layout">  
    <section class="lists"> 
    <?php if (isset($arr)) { ?>
        <?php foreach ($arr as $key => $data) { 
          ?>
           <?php if ($data->pr_name!=='') {
              echo '<article class="todo" data-list-id="2">
                 <div class="todo__header ">
                 <input class="todo__name" value="'.$data->pr_name.'"><a href="javascript:void(0)" class="delete_icon"></a></a>
                 </div>
                 <div class="todo__bar">
                   <a class="todo__new new" href="javascript:void(0)">ADD NEW TASK</a>
                 </div>
                 <div class="todo__list">
                   <table class="todo__table">
                     <tbody>';
                } ?>
              <?php foreach ($data->task as $key => $temp) { ?>   
                        <?php if ($temp->task_name!=='') {
                            echo ' <tr class="todo__item task" data-task-id="4">
                                      <td class="task__td task__td_checkbox">
                                        <div class="task__checkbox-holder">
                                          <input type="checkbox" class="task__checkbox"';if ( $temp->status == '1' ) echo "checked";echo '>
                                        </div>
                                      </td>
                                    
                                      <td class="task__td">
                                        <div class="task__name-holder">
                                        <input type="text" value="'.$temp->task_name.'" class="inline-edit" placeholder="Enter name of task">
                                    </div>
                                      </td>
                                      <td class="task__td">
                                      <a href="javascript:void(0)" class="removeitem"></a>
                                      <input type="text" value="'.$temp->date.'" class="datepicker todo__icon "><span style="float:right;padding:3px;">Deadline: </span>    
                                      </td>
                                    </tr>
                                    ';
                              } }

                                  echo '</tbody>
                                       </table>
                                     </div>
                                   </article>';
                              //}?>
                <?php }}?>
     <!--  <article class="todo" data-list-id="2">
       <div class="todo__header ">
       <input class="todo__name" value="New TODO List"><a href="javascript:void(0)" class="delete_icon"></a></a>
       </div>
       <div class="todo__bar">
         <a class="todo__new new" href="javascript:void(0)">ADD NEW TASK</a>
       </div>
     
       <div class="todo__list">
         <table class="todo__table">
           <tbody>
           <tr class="todo__item task" data-task-id="4">
        <td class="task__td task__td_checkbox">
          <div class="task__checkbox-holder">
            <input type="checkbox" class="task__checkbox">
          </div>
        </td>
      
        <td class="task__td">
          <div class="task__name-holder">
          <input type="text" value="" class="inline-edit" placeholder="Enter name of task">
      </div>
        </td>
        <td class="task__td">
        <a href="javascript:void(0)" class="removeitem"></a>
        <input type="text" class="datepicker todo__icon "><span style="float:right;padding:3px;">Deadline: </span>    
        </td>
      </tr>
      </tbody>
         </table>
       </div>
     </article> -->
     </section>
          <div class="new-todo">
            <button class="new-todo__button">Add TODO List</button>
            <button type="submit" class="save">Save</button>
            <input type="text" id="ident" value="<?php echo $_GET['id']; ?>" style="display:none;">
          </div>  



<script type="text/javascript">
  
  $("tbody").sortable({
    items: "> tr",
    appendTo: "parent",
    helper: "clone"
}).disableSelection();


$(function() {
    $( ".datepicker").datepicker();
  });
</script>
</body>
</html>
