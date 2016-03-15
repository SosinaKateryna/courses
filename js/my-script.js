$( document ).ready(function() {
   var sCounter=0;
    jQuery('.layout').on('click', '.new', function(event) { 
            jQuery(this).closest('.todo__bar').parent('.todo').find('.todo__list > .todo__table').append("<tr class='todo__item task ui-sortable-handle' data-task-id=''><td class='task__td task__td_checkbox'><div class='task__checkbox-holder'><input type='checkbox' class='task__checkbox'></div></td><td class='task__td'><div class='task__name-holder'><input type='text' value='' class='inline-edit' placeholder='Enter name of task'></div></td><td class='task__td'><a href='javascript:void(0)' class='removeitem'></a><input type='text' class='datepicker todo__icon '><span style='float:right;padding:3px;'>Deadline: </span> </td></tr>");
    $( ".datepicker").datepicker();
    });


    jQuery('.layout').on('click', '.new-todo__button', function(event) { 
            sCounter++;            
            jQuery('.layout').find('.lists').append("<article class='todo' data-list-id><div class='todo__header'><input class='todo__name' value='New TODO List'><a href='javascript:void(0)' class='delete_icon'></a></div><div class='todo__bar'><a class='todo__new new' href='javascript:void(0)'>ADD NEW TASK</a></div><div class='todo__list'><table class='todo__table'><tbody></tbody></table></div></article>");
            $("tbody").sortable({
                items: "> tr",
                appendTo: "parent",
                helper: "clone"
            }).disableSelection();
    });


        jQuery('.layout').on('click', '.delete_icon', function(event) {
            jQuery(this).parent('.todo__header').parent('.todo').remove();
        });
        jQuery('.layout').on('click','.removeitem',function() {
                    jQuery(this).closest('.task').remove();         
                    console.log(jQuery(this).closest('.task'));
                      
        });


jQuery('.layout').on('click', '.save', function(event) {
        event.preventDefault();     
        var allprod = [];      
          jQuery('.layout > .lists > .todo').each(function(index,val) {
            var proj = {};
            proj.pr_name = jQuery(this).find('.todo__name').val();
            proj.task = [];   
            jQuery(this).find('.todo__item').each(function(index, val) {
                 var i = {};
                 i.task_name = jQuery(this).find('.inline-edit').val(); 
                if(jQuery(this).find('.task__checkbox')[0].checked){       
                    i.status =  '1';
                }else{
                    i.status = '0';
                }
                i.date = jQuery(this).find('.datepicker').val(); 
                proj.task.push(i);    
            });           
            allprod.push(proj);       
            }); 
              console.log(allprod); 
              var ident=jQuery('#ident').val(); 
              $.ajax({
              type: "POST",
              url: "insert_data.php",
              data:{id:ident, mas:JSON.stringify(allprod)},
              success: function(data) {
                  console.log('yes');
              }
          });         
        // console.log(allcats);
        // var data = {
        //     action : 'save_cap',
        //      posts : allcats       
        // };

        //  jQuery.post(ajaxurl, data, function(resp) {
        //     console.log(resp);
        //     jQuery('#la-saved').show();
        //     jQuery('#la-saved').delay(2000).fadeOut();
        // });
         
    });
  
   
});