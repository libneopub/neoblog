// Initialize Quill editor

var quill = new Quill("#editor", {
    modules: {
        'toolbar': [
            [{ 'size': [] }],
            [ 'bold', 'italic', 'underline', 'strike' ],
            [ 'image', 'link', 'blockquote', 'code-block',  ],
            [{ 'align': [] }],
            [ { 'header': '1' }, { 'header': '2' }],
            [{ 'list': 'ordered' }, { 'list': 'bullet'}],
            [{ 'script': 'super' }, { 'script': 'sub' }],
            
            ['clean']
        ]
    },
    placeholder: "Start typing to add content...",
    theme: "snow"
});

function submit_newpost() {
    document.querySelector("#content").value = JSON.stringify(quill.getContents());
    // Note posts do not have a title
    // document.querySelector("#title").value = document.querySelector(".title").innerHTML;
    document.querySelector("#tags").value = document.querySelector(".tags").value;

    document.querySelector(".form").submit();
}

function submit_update() {
    document.querySelector("#content").value = JSON.stringify(quill.getContents());

    document.querySelector(".form").submit();
}
