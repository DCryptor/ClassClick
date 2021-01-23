function showHide(element_id) {
    //Если элемент с id-шником element_id существует
    if (document.getElementById(element_id)) { 
        //Записываем ссылку на элемент в переменную obj
        var obj = document.getElementById(element_id); 
        //Если css-свойство display не block, то: 
        if (obj.style.display != "block") { 
            obj.style.display = "block"; //Показываем элемент
        }
        else obj.style.display = "none"; //Скрываем элемент
    }
    //Если элемент с id-шником element_id не найден, то выводим сообщение
    else alert("Элемент с id: " + element_id + " не найден!"); 
} 

function Hide(elementHide_id){
    if (document.getElementById(elementHide_id)) { 
        var object = document.getElementById(elementHide_id); 
    if (object.style.display == "block" || obj.style.display == "block")
        {   
            var jsVar = "<?php echo 'unset($_SESSION['message'])' ?>";
            object.style.display = "none";
        }
    }
}

function HideSubjects(elementHide_id){
    if (document.getElementById(elementHide_id)) { 
        var object = document.getElementById(elementHide_id); 
    if (object.style.display == "block" || obj.style.display == "block")
        {   
            object.style.display = "none";
        }
    }
}