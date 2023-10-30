import Quill from "quill";
import "quill/dist/quill.snow.css";


window.addEventListener('load', function(){
    const toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        
        ['blockquote', 'code-block'],
        
        [{ 'header': 1 }, { 'header': 2 }],               
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        [{ 'script': 'sub' }, { 'script': 'super' }],      
        [{ 'indent': '-1' }, { 'indent': '+1' }],          
        [{ 'direction': 'rtl' }],                         
    
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        
        [{ 'color': [] }, { 'background': [] }],          
        [{ 'font': [] }],
        [{ 'align': [] }],
        
        ["image"],
        
        ['clean']  
    ];
    
    var attendee_info_editor = new Quill("#attendee_info_editor", {
        theme: "snow",
        modules: {
            syntax: true,
            toolbar: toolbarOptions
        },
    });
    
    var details_editor = new Quill("#details_editor", {
        theme: "snow",
        modules: {
            syntax: true,
            toolbar: toolbarOptions
        }
    });
    
    attendee_info_editor.getModule('toolbar').addHandler('image', () => {
        selectLocalImage(attendee_info_editor);
    });
    
    details_editor.getModule('toolbar').addHandler('image', () => {
        selectLocalImage(details_editor);
    });

    


    document.getElementById('submit_btn').onclick = function(){
        let attendee_contents = attendee_info_editor.root.innerHTML;
        let details_contents = details_editor.root.innerHTML;

        const attendee_info_div = document.getElementById("attendee_info");
        const details_editor_div = document.getElementById('details');

        attendee_info_div.innerText = attendee_contents ;
        details_editor_div.innerText = details_contents;

        const form = document.getElementById("form");
        form.submit();
    }
});



 






    
    



