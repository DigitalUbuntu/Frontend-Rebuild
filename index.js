const btnAddElement = document.querySelector('.btn-add-element');
const elementsCover = document.querySelector('.elements');
btnAddElement.addEventListener('click', () => {
  const left = getOffset(btnAddElement).left;
  const top = getOffset(btnAddElement).top;
  const btnOffsetWidth = btnAddElement.offsetHeight;
  const topButton = top + btnOffsetWidth;
  elementsCover.style.display = 'block';
  elementsCover.style.top = topButton + 'px';
  elementsCover.style.left = left +'px';

  const elements = Array.from(document.querySelectorAll('.element'));
  elements.forEach(element => {
      element.addEventListener('click', addElements);
  });
});

const saveCourse = document.querySelector('.save-course');
saveCourse.addEventListener('click', e => {
    let formData = new FormData();  
    const courseTitle = document.querySelector('.course-title').value;
    const chapterTitle = document.querySelector('.chapter-title').value;
    console.log(courseTitle);
    // return;
    formData.append('course_title', courseTitle);
    formData.append('chapter_title', chapterTitle);
    const contents  = Array.from(document.querySelectorAll('.chapter-content'));
    let data = {};
    let fileIndex = 0;         
    contents.forEach((content, index) => {
        
        if(content.type !== 'file'){
            let keyContent = 'content_'+index;
            formData.append(keyContent, content.value);
           
        }else{
            console.log('file '+fileIndex);
            let keyFile = 'file_'+index;
            const fileupload = document.querySelectorAll('input[type="file"]');
            console.log(fileupload);
            formData.append(keyFile, fileupload[fileIndex].files[0]);
            fileIndex += 1;
           
        }
    });
    
    console.log("valuues begin");
        for (let value of formData.values()) {
            console.log(value);
         }
    console.log("valuues end");

    sendDataToServer(formData);

    
});


function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
      left: rect.left + window.scrollX,
      top: rect.top + window.scrollY
    };
}

function addElements(e){
    const element = e.currentTarget;
    const id = element.id;
    let chapter = btnAddElement.parentElement.parentElement.parentElement;
    const addElement = btnAddElement.parentElement.parentElement;
    switch (id) {
        case 'add-subtitle':
            chapter.insertBefore(creatTextInput(), addElement);
            elementsCover.style.display = 'none';
            element.removeEventListener('click', addElements);
            break;
        case 'add-text':
            chapter.insertBefore(creatTextAria(), addElement);
            elementsCover.style.display = 'none';
            element.removeEventListener('click', addElements);
            break;
        case 'add-file':
            chapter.insertBefore(creatFileInput(), addElement);
            elementsCover.style.display = 'none';
            element.removeEventListener('click', addElements);
            break;
        
        default:
            break;
    }
    
}

function creatTextInput(){
    let input = document.createElement('input');
    input.type = 'text';
    input.required = 'required';
    input.style.marginBottom = "15px";
    input.style.marginTop = "15px";
    input.classList.add('chapter-content');
    return input;
}



function creatTextAria(){
    let textarea = document.createElement('textarea');
    textarea.required = 'required';
    textarea.style.marginBottom = "15px";
    textarea.style.marginTop = "15px";
    textarea.classList.add('chapter-content');
    return textarea;
}

function creatFileInput(){
    let input = document.createElement('input');
    input.required = 'required';
    input.type = 'file';
    input.name = 'fileupload';
    input.id = 'fileupload';
    input.style.marginBottom = "15px";
    input.style.marginTop = "15px";
    input.classList.add('chapter-content');
    return input;
}

async function sendDataToServer(data) {
    const origin = window.location.origin;
    let url = origin + '/courses-du/upload.php';
    try {
        const responsePromise = await fetch(url, {
            method: "POST", 
            body: data
        });    
        const dataFromServer = await responsePromise.json();
        console.log(dataFromServer);
    } catch (error) {
        console.error(error)
    }
}
